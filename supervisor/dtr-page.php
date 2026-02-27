<?php
require __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'DTR';

$selectedView = trim((string) ($_GET['view'] ?? ''));
if ($selectedView === 'attendance') {
	require __DIR__ . '/partials/pages/attendance-records.php';
	return;
}
if ($selectedView === 'clock-logs') {
	require __DIR__ . '/partials/pages/clock-logs.php';
	return;
}

$employees = $dtrEmployees ?? [];

$searchQuery = trim((string) ($_GET['search'] ?? ''));

$filteredEmployees = array_values(array_filter(
	$employees,
	static function (array $employee) use ($searchQuery): bool {
		if ($searchQuery === '') {
			return true;
		}

		return stripos((string) $employee['name'], $searchQuery) !== false;
	}
));

$getStatusBadgeClass = static function (string $status): string {
	return match ($status) {
		'Active' => 'dtr-status-badge dtr-status-active',
		'Idle' => 'dtr-status-badge dtr-status-idle',
		'On Break' => 'dtr-status-badge dtr-status-break',
		'Vacant' => 'dtr-status-badge dtr-status-vacant',
		default => 'dtr-status-badge dtr-status-default',
	};
};

require __DIR__ . '/supervisorIncludes/headerSup.php';
?>
<?php require __DIR__ . '/supervisorIncludes/sidebarSup.php'; ?>

<main class="app-main dtr-page">
	<?php require __DIR__ . '/supervisorIncludes/app-headerSup.php'; ?>

	<section class="dtr-header border-bottom">
		<div class="container-fluid px-3 px-lg-4 py-4">
			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
				<div>
					<h1 class="dtr-title mb-1">Daily Time Record (DTR)</h1>
					<p class="dtr-subtitle mb-0">Monitor employee attendance and work status</p>
				</div>
				<a href="dtr-page.php?view=clock-logs" class="btn dtr-clocklogs-btn">
					<i class="bi bi-eye me-2" aria-hidden="true"></i>View Clock Logs
				</a>
			</div>
		</div>
	</section>

	<section class="container-fluid px-3 px-lg-4 py-4">
		<form method="get" class="dtr-search-form" role="search">
			<label for="dtrSearch" class="visually-hidden">Search employee name</label>
			<div class="input-group dtr-search-group">
				<span class="input-group-text dtr-search-icon"><i class="bi bi-search" aria-hidden="true"></i></span>
				<input
					type="text"
					id="dtrSearch"
					name="search"
					class="form-control dtr-search-input"
					placeholder="Search employee name..."
					value="<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>"
				>
				<button type="submit" class="btn btn-light">Search</button>
			</div>
		</form>

		<div class="card border-0 shadow-sm d-none d-md-block dtr-table-card mt-4">
			<div class="table-responsive">
				<table class="table align-middle mb-0 dtr-table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Employee Name</th>
							<th scope="col" class="text-center">Action</th>
							<th scope="col" class="text-center">Work Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($filteredEmployees)): ?>
							<tr>
								<td colspan="4" class="text-center py-5 text-muted">No employees found</td>
							</tr>
						<?php else: ?>
							<?php foreach ($filteredEmployees as $index => $employee): ?>
								<tr class="dtr-row">
									<td class="text-nowrap"><?= (int) $index + 1 ?></td>
									<td class="text-nowrap fw-semibold"><?= htmlspecialchars((string) $employee['name'], ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-center">
										<a href="dtr-page.php?view=attendance&employee=<?= urlencode((string) $employee['id']) ?>" class="btn btn-sm dtr-attendance-btn">View Attendance</a>
									</td>
									<td class="text-center">
										<span class="<?= htmlspecialchars($getStatusBadgeClass((string) $employee['workStatus']), ENT_QUOTES, 'UTF-8') ?>">
											<?= htmlspecialchars((string) $employee['workStatus'], ENT_QUOTES, 'UTF-8') ?>
										</span>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="d-md-none mt-4">
			<?php if (empty($filteredEmployees)): ?>
				<div class="card border-0 shadow-sm dtr-mobile-empty">
					<div class="card-body text-center py-5 text-muted">No employees found</div>
				</div>
			<?php else: ?>
				<?php foreach ($filteredEmployees as $employee): ?>
					<article class="card border-0 shadow-sm dtr-mobile-card mb-3">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-start gap-3 mb-3">
								<div>
									<div class="small text-muted"><?= htmlspecialchars((string) $employee['id'], ENT_QUOTES, 'UTF-8') ?></div>
									<div class="fw-semibold dtr-mobile-name"><?= htmlspecialchars((string) $employee['name'], ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<span class="<?= htmlspecialchars($getStatusBadgeClass((string) $employee['workStatus']), ENT_QUOTES, 'UTF-8') ?>">
									<?= htmlspecialchars((string) $employee['workStatus'], ENT_QUOTES, 'UTF-8') ?>
								</span>
							</div>

							<a href="dtr-page.php?view=attendance&employee=<?= urlencode((string) $employee['id']) ?>" class="btn btn-sm dtr-attendance-btn w-100">View Attendance</a>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php require __DIR__ . '/supervisorIncludes/footerSup.php'; ?>
