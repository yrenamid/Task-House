<?php
require_once __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'va-utilization';

$selectedMonth = 'March';
$selectedYear = (string) ((int) date('Y'));
$billingType = 'all';

$daysInMonth = 31;

$getHourClass = static function (float $hours): string {
	if ($hours <= 0) {
		return 'va-heat-0';
	}

	if ($hours <= 2) {
		return 'va-heat-1';
	}

	if ($hours <= 5) {
		return 'va-heat-2';
	}

	if ($hours <= 8) {
		return 'va-heat-3';
	}

	return 'va-heat-4';
};

$assetBasePath = 'assets';
$additionalStylesheets = ['css/supervisor.css', 'css/manager.css'];
$bodyClass = 'supervisor-layout manager-layout';
require __DIR__ . '/includes/header.php';
?>
<?php
$sidebarBasePath = '../';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main manager-page">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid py-4 manager-page va-utilization-page">
		<section class="card border-0 shadow-sm manager-panel-card mb-4">
			<div class="card-body p-3 p-lg-4">
				<div class="row g-3 align-items-center justify-content-between">
					<div class="col-12 col-xl-5">
						<h1 class="manager-page-title mb-1">VA Utilization</h1>
						<p class="manager-page-subtitle mb-0">Track daily utilization and total hours per VA</p>
					</div>
					<div class="col-12 col-xl-7">
						<div class="d-flex flex-wrap align-items-end gap-2 gap-lg-3 justify-content-xl-end">
							<div class="filter-month">
								<label class="visually-hidden" for="vaMonth">Month</label>
								<select class="form-select form-select-sm va-filter-select" id="vaMonth" aria-label="Select month">
									<?php foreach ($months as $month): ?>
										<option value="<?= htmlspecialchars($month, ENT_QUOTES, 'UTF-8') ?>"<?= $selectedMonth === $month ? ' selected' : '' ?>>
											<?= htmlspecialchars($month, ENT_QUOTES, 'UTF-8') ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="filter-year">
								<label class="visually-hidden" for="vaYear">Year</label>
								<select class="form-select form-select-sm va-filter-select" id="vaYear" aria-label="Select year">
									<?php foreach ($years as $year): ?>
										<option value="<?= (int) $year ?>"<?= $selectedYear === (string) $year ? ' selected' : '' ?>>
											<?= (int) $year ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="filter-billable">
								<label class="visually-hidden" for="vaBillingType">Billing Filter</label>
								<select class="form-select form-select-sm va-filter-select" id="vaBillingType" aria-label="Select billing filter">
									<option value="all"<?= $billingType === 'all' ? ' selected' : '' ?>>All</option>
									<option value="billable"<?= $billingType === 'billable' ? ' selected' : '' ?>>Billable</option>
									<option value="billable-non-billable"<?= $billingType === 'billable-non-billable' ? ' selected' : '' ?>>Billable/Non-Billable</option>
								</select>
							</div>

							<div>
								<button type="button" class="btn btn-primary btn-sm px-3" aria-label="Search" title="Search">
									<i class="bi bi-search" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="row g-4 mb-4">
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-body">
						<div class="va-summary-icon va-summary-icon--blue"><i class="bi bi-people" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Total VAs</p>
						<p class="h3 mb-0" data-number><?= (int) $totalVAs ?></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-body">
						<div class="va-summary-icon va-summary-icon--purple"><i class="bi bi-clock" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Total Hours</p>
						<p class="h3 mb-0" data-number><?= htmlspecialchars(number_format($totalHours, 2), ENT_QUOTES, 'UTF-8') ?></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-body">
						<div class="va-summary-icon va-summary-icon--green"><i class="bi bi-currency-dollar" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Billable Hours</p>
						<p class="h3 mb-0" data-number><?= htmlspecialchars(number_format($billableHours, 2), ENT_QUOTES, 'UTF-8') ?></p>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-body">
						<div class="va-summary-icon va-summary-icon--amber"><i class="bi bi-calendar-event" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Non-Billable Hours</p>
						<p class="h3 mb-0" data-number><?= htmlspecialchars(number_format($nonBillableHours, 2), ENT_QUOTES, 'UTF-8') ?></p>
					</div>
				</div>
			</div>
		</div>

		<section class="card border-0 shadow-sm manager-panel-card mb-4">
			<div class="card-header manager-panel-header border-0 d-flex justify-content-between align-items-center">
				<h2 class="h5 mb-0"><?= htmlspecialchars($selectedMonth, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($selectedYear, ENT_QUOTES, 'UTF-8') ?></h2>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-dark table-bordered align-middle mb-0 va-utilization-table">
						<thead>
							<tr>
								<th scope="col" class="va-sticky-col va-name-header">VA Name</th>
								<?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
									<th scope="col" class="text-center"><?= $day ?></th>
								<?php endfor; ?>
								<th scope="col" class="text-end">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($mockVAData as $va): ?>
								<tr>
									<th scope="row" class="va-sticky-col">
										<div class="fw-semibold text-white"><?= htmlspecialchars((string) ($va['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
										<div class="small text-secondary"><?= htmlspecialchars((string) ($va['role'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
									</th>
									<?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
										<?php $hours = (float) (($va['dailyHours'][$day] ?? 0)); ?>
										<td class="text-center <?= htmlspecialchars($getHourClass($hours), ENT_QUOTES, 'UTF-8') ?>">
											<?= $hours > 0 ? htmlspecialchars(number_format($hours, $hours === (float) ((int) $hours) ? 0 : 2), ENT_QUOTES, 'UTF-8') : '' ?>
										</td>
									<?php endfor; ?>
									<td class="text-end fw-semibold" data-number><?= htmlspecialchars(number_format((float) ($va['total'] ?? 0), 2), ENT_QUOTES, 'UTF-8') ?></td>
								</tr>
							<?php endforeach; ?>
							<tr class="va-grand-total-row">
								<th scope="row" class="va-sticky-col">Grand Total</th>
								<?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
									<?php
									$dayTotal = 0.0;
									foreach ($mockVAData as $vaRow) {
										$dayTotal += (float) (($vaRow['dailyHours'][$day] ?? 0));
									}
									?>
									<td class="text-center" data-number><?= $dayTotal > 0 ? htmlspecialchars(number_format($dayTotal, 1), ENT_QUOTES, 'UTF-8') : '' ?></td>
								<?php endfor; ?>
								<td class="text-end fw-bold" data-number><?= htmlspecialchars(number_format($totalHours, 2), ENT_QUOTES, 'UTF-8') ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>

		<section class="card border-0 shadow-sm manager-panel-card">
			<div class="card-body p-3 p-lg-4">
				<h3 class="h6 mb-3">Hour Intensity Legend</h3>
				<div class="d-flex flex-wrap align-items-center gap-3">
					<div class="d-flex align-items-center gap-2"><span class="va-legend-box va-heat-0"></span><span class="small text-secondary">0 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="va-legend-box va-heat-1"></span><span class="small text-secondary">1–2 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="va-legend-box va-heat-2"></span><span class="small text-secondary">3–5 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="va-legend-box va-heat-3"></span><span class="small text-secondary">6–8 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="va-legend-box va-heat-4"></span><span class="small text-secondary">9+ hours</span></div>
				</div>
			</div>
		</section>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
