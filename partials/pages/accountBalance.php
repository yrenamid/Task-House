<?php
require_once __DIR__ . '/../modals/add-hours-modal.php';

if (!function_exists('renderAccountBalancePage')) {
	function renderAccountBalancePage(array $accountBalances): void
	{
		$selectedAccountName = (string) ($accountBalances[0]['accountName'] ?? 'TechCorp Inc.');
		?>
		<section class="manager-account-balance-page">
			<div class="manager-account-balance-header mb-4">
				<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
					<div>
						<h2 class="manager-account-balance-title mb-1">Accounts Remaining Balance</h2>
						<p class="manager-account-balance-subtitle mb-0">Manage account hours and balances</p>
					</div>
					<div class="manager-account-balance-search-wrap">
						<div class="input-group manager-account-balance-search-group">
							<span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
							<input type="text" class="form-control" placeholder="Search account..." aria-label="Search account">
						</div>
					</div>
				</div>
			</div>

			<div class="d-none d-md-block">
				<div class="card border-0 shadow-sm manager-panel-card manager-account-balance-table-card">
					<div class="table-responsive">
						<table class="table align-middle mb-0 manager-account-balance-table">
							<thead>
								<tr>
									<th scope="col">Account Name</th>
									<th scope="col" class="text-end">Budget Hours</th>
									<th scope="col" class="text-end">Actual Hours</th>
									<th scope="col" class="text-end">Available Hours</th>
									<th scope="col" class="text-end">Assigned Hours</th>
									<th scope="col" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (empty($accountBalances)): ?>
									<tr>
										<td colspan="6" class="text-center py-5 manager-account-balance-empty">No accounts found</td>
									</tr>
								<?php else: ?>
									<?php foreach ($accountBalances as $account): ?>
										<tr>
											<td class="fw-semibold"><?= htmlspecialchars((string) ($account['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
											<td class="text-end"><?= (int) ($account['budgetHours'] ?? 0) ?>h</td>
											<td class="text-end"><?= (int) ($account['actualHours'] ?? 0) ?>h</td>
											<td class="text-end fw-semibold"><?= (int) ($account['availableHours'] ?? 0) ?>h</td>
											<td class="text-end"><?= (int) ($account['assignedHours'] ?? 0) ?>h</td>
											<td class="text-center">
												<button type="button" class="btn btn-sm manager-account-balance-action-btn" data-bs-toggle="modal" data-bs-target="#addHoursModal">Add Hours</button>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="d-md-none manager-account-balance-mobile-list">
				<?php if (empty($accountBalances)): ?>
					<div class="card border-0 manager-account-balance-mobile-card">
						<div class="card-body text-center py-5 manager-account-balance-empty">No accounts found</div>
					</div>
				<?php else: ?>
					<?php foreach ($accountBalances as $account): ?>
						<div class="card border-0 manager-account-balance-mobile-card mb-3">
							<div class="card-body">
								<h3 class="manager-account-balance-mobile-name mb-3"><?= htmlspecialchars((string) ($account['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></h3>
								<div class="row g-3 mb-3">
									<div class="col-6">
										<div class="manager-account-balance-mobile-label">Budget Hours</div>
										<div class="manager-account-balance-mobile-value"><?= (int) ($account['budgetHours'] ?? 0) ?>h</div>
									</div>
									<div class="col-6">
										<div class="manager-account-balance-mobile-label">Actual Hours</div>
										<div class="manager-account-balance-mobile-value"><?= (int) ($account['actualHours'] ?? 0) ?>h</div>
									</div>
									<div class="col-6">
										<div class="manager-account-balance-mobile-label">Available Hours</div>
										<div class="manager-account-balance-mobile-value fw-semibold"><?= (int) ($account['availableHours'] ?? 0) ?>h</div>
									</div>
									<div class="col-6">
										<div class="manager-account-balance-mobile-label">Assigned Hours</div>
										<div class="manager-account-balance-mobile-value"><?= (int) ($account['assignedHours'] ?? 0) ?>h</div>
									</div>
								</div>
								<button type="button" class="btn w-100 manager-account-balance-action-btn" data-bs-toggle="modal" data-bs-target="#addHoursModal">Add Hours</button>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

			<?php renderAddHoursModal($selectedAccountName); ?>
		</section>
		<?php
	}
}
