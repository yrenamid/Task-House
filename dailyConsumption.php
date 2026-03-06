<?php
require_once __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'daily-consumption';

$selectedMonth = 'March';
$selectedYear = (string) ((int) date('Y'));
$selectedAccountType = 'All Accounts';

$daysInMonth = 31;
$days = range(1, $daysInMonth);

$highestAccountName = (string) ($highestAccount['accountName'] ?? '');
$highestAccountDisplayName = $highestAccountName;
if (strlen($highestAccountDisplayName) > 15) {
	$highestAccountDisplayName = substr($highestAccountDisplayName, 0, 15) . '...';
}

$assetBasePath = 'assets';
$additionalStylesheets = ['css/manager.css'];
$bodyClass = 'manager-layout';
require __DIR__ . '/includes/header.php';
?>
<?php
$sidebarBasePath = '';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main manager-page">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid py-4 manager-page daily-consumption-page">
		<section class="card manager-panel-card shadow-sm border-0 mb-4">
			<div class="card-body p-3 p-lg-4">
				<div class="row g-3 align-items-center justify-content-between">
					<div class="col-12 col-xl-6">
						<h1 class="manager-page-title mb-1">Daily Accounts Consumption</h1>
						<p class="manager-page-subtitle mb-0">Monitor daily hours consumed per managed account</p>
					</div>
					<div class="col-12 col-xl-6">
						<div class="d-flex flex-wrap align-items-center gap-2 gap-lg-3 justify-content-xl-end">
							<div>
								<label class="visually-hidden" for="dcMonth">Month</label>
								<select class="form-select form-select-sm dc-filter-select" id="dcMonth" aria-label="Select month">
									<?php foreach ($months as $month): ?>
										<option value="<?= htmlspecialchars($month, ENT_QUOTES, 'UTF-8') ?>"<?= $month === $selectedMonth ? ' selected' : '' ?>>
											<?= htmlspecialchars($month, ENT_QUOTES, 'UTF-8') ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div>
								<label class="visually-hidden" for="dcYear">Year</label>
								<select class="form-select form-select-sm dc-filter-select" id="dcYear" aria-label="Select year">
									<?php foreach ($years as $year): ?>
										<option value="<?= (int) $year ?>"<?= (string) $year === $selectedYear ? ' selected' : '' ?>>
											<?= (int) $year ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div>
								<label class="visually-hidden" for="dcAccountType">Account type</label>
								<select class="form-select form-select-sm dc-filter-select" id="dcAccountType" aria-label="Select account type">
									<?php foreach ($accountTypes as $accountType): ?>
										<option value="<?= htmlspecialchars($accountType, ENT_QUOTES, 'UTF-8') ?>"<?= $accountType === $selectedAccountType ? ' selected' : '' ?>>
											<?= htmlspecialchars($accountType, ENT_QUOTES, 'UTF-8') ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<button type="button" class="btn btn-primary btn-sm px-3 dc-search-btn" aria-label="Search" title="Search">
								<i class="bi bi-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="row g-4 mb-4">
			<div class="col-md-6 col-lg-3">
				<div class="card manager-panel-card shadow-sm border-0 h-100">
					<div class="card-body">
						<div class="dc-summary-icon dc-summary-icon--blue"><i class="bi bi-people" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Total Accounts</p>
						<p class="h3 mb-0" data-number><?= (int) $totalAccounts ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="card manager-panel-card shadow-sm border-0 h-100">
					<div class="card-body">
						<div class="dc-summary-icon dc-summary-icon--purple"><i class="bi bi-clock" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Total Hours This Month</p>
						<p class="h3 mb-0" data-number><?= htmlspecialchars(number_format($totalHoursThisMonth, 2), ENT_QUOTES, 'UTF-8') ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="card manager-panel-card shadow-sm border-0 h-100">
					<div class="card-body">
						<div class="dc-summary-icon dc-summary-icon--amber"><i class="bi bi-award" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Highest Consuming Account</p>
						<p class="h6 mb-1 text-white text-truncate" title="<?= htmlspecialchars($highestAccountName, ENT_QUOTES, 'UTF-8') ?>">
							<?= htmlspecialchars($highestAccountDisplayName, ENT_QUOTES, 'UTF-8') ?>
						</p>
						<p class="small text-secondary mb-0" data-number><?= htmlspecialchars(number_format((float) ($highestAccount['total'] ?? 0), 2), ENT_QUOTES, 'UTF-8') ?> hrs</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="card manager-panel-card shadow-sm border-0 h-100">
					<div class="card-body">
						<div class="dc-summary-icon dc-summary-icon--green"><i class="bi bi-graph-up" aria-hidden="true"></i></div>
						<p class="text-muted mb-1 small">Average Daily Consumption</p>
						<p class="h3 mb-1" data-number><?= htmlspecialchars(number_format($averageDailyConsumption, 2), ENT_QUOTES, 'UTF-8') ?></p>
						<p class="small text-secondary mb-0">hours per day</p>
					</div>
				</div>
			</div>
		</div>

		<section class="card manager-panel-card shadow-sm border-0 mb-4">
			<div class="card-header dc-table-header border-0">
				<h2 class="h5 mb-0"><?= htmlspecialchars($selectedMonth, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($selectedYear, ENT_QUOTES, 'UTF-8') ?></h2>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-dark table-bordered align-middle mb-0 dc-consumption-table">
						<thead>
							<tr>
								<th scope="col" class="dc-account-col">Account Names</th>
								<?php foreach ($days as $day): ?>
									<th scope="col" class="text-center dc-day-col"><?= (int) $day ?></th>
								<?php endforeach; ?>
								<th scope="col" class="text-end dc-total-col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($mockAccountData as $account): ?>
								<tr>
									<th scope="row" class="dc-account-col">
										<div class="fw-semibold text-white text-truncate" title="<?= htmlspecialchars((string) ($account['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
											<?= htmlspecialchars((string) ($account['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
										</div>
									</th>
									<?php foreach ($days as $day): ?>
										<?php
										$hours = (float) (($account['dailyHours'][$day] ?? 0));
										$intensityClass = 'intensity-0';

										if ($hours == 0) {
											$intensityClass = 'intensity-0';
										} elseif ($hours <= 3) {
											$intensityClass = 'intensity-low';
										} elseif ($hours <= 6) {
											$intensityClass = 'intensity-medium';
										} elseif ($hours <= 9) {
											$intensityClass = 'intensity-high';
										} else {
											$intensityClass = 'intensity-very-high';
										}

										$hoursDisplay = '0';
										if ($hours > 0) {
											if ($hours == (float) ((int) $hours)) {
												$hoursDisplay = (string) ((int) $hours);
											} else {
												$hoursDisplay = number_format($hours, 2);
											}
										}
										?>
										<td class="text-center dc-day-col <?= htmlspecialchars($intensityClass, ENT_QUOTES, 'UTF-8') ?>">
											<span class="<?= $hours == 0 ? 'text-muted' : 'text-light' ?>" data-number><?= htmlspecialchars($hoursDisplay, ENT_QUOTES, 'UTF-8') ?></span>
										</td>
									<?php endforeach; ?>
									<td class="text-end fw-bold dc-total-col" data-number><?= htmlspecialchars(number_format((float) ($account['total'] ?? 0), 2), ENT_QUOTES, 'UTF-8') ?></td>
								</tr>
							<?php endforeach; ?>
							<tr class="dc-grand-total-row">
								<th scope="row" class="dc-account-col fw-bold">Grand Total</th>
								<?php foreach ($days as $day): ?>
									<?php
									$dayTotal = 0.0;
									foreach ($mockAccountData as $account) {
										$dayTotal += (float) (($account['dailyHours'][$day] ?? 0));
									}

									$dayTotalDisplay = '0';
									if ($dayTotal > 0) {
										$dayTotalDisplay = number_format($dayTotal, 1);
									}
									?>
									<td class="text-center dc-day-col" data-number><?= htmlspecialchars($dayTotalDisplay, ENT_QUOTES, 'UTF-8') ?></td>
								<?php endforeach; ?>
								<td class="text-end fw-bold dc-total-col" data-number><?= htmlspecialchars(number_format($totalHoursThisMonth, 2), ENT_QUOTES, 'UTF-8') ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>

		<section class="card manager-panel-card shadow-sm border-0">
			<div class="card-body p-3 p-lg-4">
				<h3 class="h6 mb-3">Hour Intensity Legend</h3>
				<div class="d-flex flex-wrap align-items-center gap-3">
					<div class="d-flex align-items-center gap-2"><span class="dc-legend-box intensity-0"></span><span class="small text-secondary">0 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="dc-legend-box intensity-low"></span><span class="small text-secondary">1-3 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="dc-legend-box intensity-medium"></span><span class="small text-secondary">4-6 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="dc-legend-box intensity-high"></span><span class="small text-secondary">7-9 hours</span></div>
					<div class="d-flex align-items-center gap-2"><span class="dc-legend-box intensity-very-high"></span><span class="small text-secondary">10+ hours</span></div>
				</div>
			</div>
		</section>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
