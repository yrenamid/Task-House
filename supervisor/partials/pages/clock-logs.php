<?php
require __DIR__ . '/../../mockData.php';

$pageTitle = 'Clock Logs';
$activeNav = 'DTR';

$logs = $clockLogs ?? [];
$selectedDate = trim((string) ($_GET['date'] ?? 'all'));

$availableDates = [];
foreach ($logs as $logItem) {
	$dateValue = (string) ($logItem['date'] ?? '');
	if ($dateValue !== '') {
		$availableDates[$dateValue] = $dateValue;
	}
}
krsort($availableDates);

$filteredLogs = array_values(array_filter(
	$logs,
	static function (array $log) use ($selectedDate): bool {
		if ($selectedDate === 'all') {
			return true;
		}

		return ((string) ($log['date'] ?? '')) === $selectedDate;
	}
));

$formatDate = static function (string $dateValue, string $format): string {
	$timestamp = strtotime($dateValue);
	if ($timestamp === false) {
		return $dateValue;
	}

	return date($format, $timestamp);
};

$getLogTypeClass = static function (string $logType): string {
	return match ($logType) {
		'Clock In' => 'clock-logs-type-badge clock-logs-type-in',
		'Clock Out' => 'clock-logs-type-badge clock-logs-type-out',
		default => 'clock-logs-type-badge clock-logs-type-default',
	};
};

require __DIR__ . '/../../supervisorIncludes/headerSup.php';
?>
<?php require __DIR__ . '/../../supervisorIncludes/sidebarSup.php'; ?>

<main class="app-main clock-logs-page">
	<?php require __DIR__ . '/../../supervisorIncludes/app-headerSup.php'; ?>

	<section class="clock-logs-header border-bottom">
		<div class="container-fluid px-3 px-lg-4 py-4">
			<div class="d-flex align-items-center gap-3 mb-3">
				<a href="dtr-page.php" class="btn btn-sm clock-logs-back-btn">
					<i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Back
				</a>
			</div>

		<div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between gap-3">
			<div>
				<h1 class="clock-logs-title mb-1">Clock Logs</h1>
				<p class="clock-logs-subtitle mb-0">View all employee clock in and clock out entries</p>
			</div>

			<form method="get" class="clock-logs-filter-form d-flex align-items-center gap-2 flex-shrink-0">

					<select id="clockLogsDate" name="date" class="form-select clock-logs-date-select">
						<option value="all" <?= $selectedDate === 'all' ? 'selected' : '' ?>>All Dates</option>
						<?php foreach ($availableDates as $dateOption): ?>
							<option value="<?= htmlspecialchars($dateOption, ENT_QUOTES, 'UTF-8') ?>" <?= $selectedDate === $dateOption ? 'selected' : '' ?>>
								<?= htmlspecialchars($formatDate($dateOption, 'M d, Y'), ENT_QUOTES, 'UTF-8') ?>
							</option>
						<?php endforeach; ?>
					</select>
					<button type="submit" class="btn btn-light">Filter</button>
				</form>
			</div>
		</div>
	</section>

	<section class="container-fluid px-3 px-lg-4 py-4">
		<div class="card border-0 shadow-sm d-none d-md-block clock-logs-table-card">
			<div class="table-responsive">
				<table class="table align-middle mb-0 clock-logs-table">
					<thead>
						<tr>
							<th scope="col">Employee Name</th>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
							<th scope="col" class="text-center">Log Type</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($filteredLogs)): ?>
							<tr>
								<td colspan="4" class="text-center py-5 text-muted">No clock logs found</td>
							</tr>
						<?php else: ?>
							<?php foreach ($filteredLogs as $index => $log): ?>
								<tr class="clock-logs-row <?= $index % 2 === 0 ? 'clock-logs-row-even' : 'clock-logs-row-odd' ?>">
									<td class="text-nowrap fw-semibold"><?= htmlspecialchars((string) ($log['employeeName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-nowrap"><?= htmlspecialchars($formatDate((string) ($log['date'] ?? ''), 'F d, Y'), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-nowrap fw-medium"><?= htmlspecialchars((string) ($log['time'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-center">
										<span class="<?= htmlspecialchars($getLogTypeClass((string) ($log['logType'] ?? '')), ENT_QUOTES, 'UTF-8') ?>">
											<?= htmlspecialchars((string) ($log['logType'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
										</span>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="d-md-none">
			<?php if (empty($filteredLogs)): ?>
				<div class="card border-0 shadow-sm clock-logs-mobile-empty">
					<div class="card-body text-center py-5 text-muted">No clock logs found</div>
				</div>
			<?php else: ?>
				<?php foreach ($filteredLogs as $index => $log): ?>
					<article class="card border-0 shadow-sm clock-logs-mobile-card mb-3 <?= $index % 2 === 0 ? 'clock-logs-mobile-even' : 'clock-logs-mobile-odd' ?>">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-start gap-3 mb-3">
								<div>
									<div class="fw-semibold clock-logs-mobile-name"><?= htmlspecialchars((string) ($log['employeeName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
									<div class="small clock-logs-mobile-date"><?= htmlspecialchars($formatDate((string) ($log['date'] ?? ''), 'M d, Y'), ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<span class="<?= htmlspecialchars($getLogTypeClass((string) ($log['logType'] ?? '')), ENT_QUOTES, 'UTF-8') ?>">
									<?= htmlspecialchars((string) ($log['logType'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
								</span>
							</div>

							<div class="d-flex align-items-center justify-content-between text-sm">
								<span class="clock-logs-mobile-time-label">Time:</span>
								<span class="clock-logs-mobile-time-value"><?= htmlspecialchars((string) ($log['time'] ?? ''), ENT_QUOTES, 'UTF-8') ?></span>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php require __DIR__ . '/../../supervisorIncludes/footerSup.php'; ?>