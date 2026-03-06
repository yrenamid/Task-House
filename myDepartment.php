<?php
require_once __DIR__ . '/mockData.php';
require_once __DIR__ . '/partials/pages/accountBalance.php';

$pageTitle = 'Task House';
$activeNav = 'my-department';

$supervisors = $departmentSupervisors ?? [];

$departmentTasksSource = $departmentTasks ?? [];
$departmentVirtualAssistantsSource = $departmentVirtualAssistants ?? [];
$departmentCompletedTasksSource = $departmentCompletedTasks ?? [];

$myAccountsTasksSource = $tasks ?? [];
$myAccountsVirtualAssistantsSource = $virtualAssistants ?? [];
$myAccountsCompletedTasksSource = $completedTasks ?? [];

$selectedSupervisorId = trim((string) ($_GET['supervisor'] ?? ''));
$selectedAccountId = trim((string) ($_GET['account'] ?? ''));

$findById = static function (array $items, string $id): ?array {
	if ($id === '') {
		return null;
	}

	foreach ($items as $item) {
		if ((string) ($item['id'] ?? '') === $id) {
			return $item;
		}
	}

	return null;
};

$filterByAccountId = static function (array $items, string $accountId): array {
	if ($accountId === '') {
		return [];
	}

	return array_values(array_filter(
		$items,
		static fn(array $item): bool => (string) ($item['accountId'] ?? '') === $accountId
	));
};

$pickString = static function (array $item, array $keys, string $default = ''): string {
	foreach ($keys as $key) {
		if (array_key_exists($key, $item) && $item[$key] !== null && $item[$key] !== '') {
			return (string) $item[$key];
		}
	}

	return $default;
};

$normalizeTaskStatus = static function (string $status): string {
	return match ($status) {
		'Working', 'In Progress' => 'Working',
		'Done', 'Completed', 'Complete' => 'Complete',
		'For Approval' => 'Pending',
		'Cancelled', 'Canceled' => 'Cancelled',
		default => 'Pending',
	};
};

$normalizeVaStatus = static function (string $status): string {
	return match ($status) {
		'Active' => 'Working',
		'Inactive' => 'Idle',
		default => $status,
	};
};

$selectedSupervisor = $findById($supervisors, $selectedSupervisorId);

$selectedSupervisorAccounts = $selectedSupervisor['accounts'] ?? [];

$selectedAccount = $findById($selectedSupervisorAccounts, $selectedAccountId);

$johnDanielsSupervisor = current(array_values(array_filter(
	$supervisors,
	static fn(array $supervisor): bool => (string) ($supervisor['name'] ?? '') === 'John Daniels'
)));
$johnDanielsSupervisorId = is_array($johnDanielsSupervisor) ? (string) ($johnDanielsSupervisor['id'] ?? '') : '';

$isJohnDanielsAccount = $johnDanielsSupervisorId !== '' && $selectedSupervisorId === $johnDanielsSupervisorId;

$activeTab = trim((string) ($_GET['tab'] ?? 'project-notes'));
$allowedTabs = ['project-notes', 'history', 'view-vas', 'view-tasks'];
$activeTab = in_array($activeTab, $allowedTabs, true) ? $activeTab : 'project-notes';

$activeView = trim((string) ($_GET['view'] ?? 'department'));
$allowedViews = ['department', 'account-balance'];
$activeView = in_array($activeView, $allowedViews, true) ? $activeView : 'department';


$tasksSource = $isJohnDanielsAccount ? $myAccountsTasksSource : $departmentTasksSource;
$virtualAssistantsSource = $isJohnDanielsAccount ? $myAccountsVirtualAssistantsSource : $departmentVirtualAssistantsSource;
$completedTasksSource = $isJohnDanielsAccount ? $myAccountsCompletedTasksSource : $departmentCompletedTasksSource;

$hasSelectedAccount = $selectedAccountId !== '' && is_array($selectedAccount);

$accountTasksRaw = $hasSelectedAccount ? $filterByAccountId($tasksSource, $selectedAccountId) : [];
$accountVirtualAssistants = $hasSelectedAccount ? $filterByAccountId($virtualAssistantsSource, $selectedAccountId) : [];
$accountCompletedTasksRaw = $hasSelectedAccount ? $filterByAccountId($completedTasksSource, $selectedAccountId) : [];

$selectedAccount = is_array($selectedAccount) ? [
	'id' => (string) ($selectedAccount['id'] ?? ''),
	'accountName' => (string) ($selectedAccount['name'] ?? ''),
	'clientFullName' => (string) ($selectedAccount['clientName'] ?? ''),
	'clientEmail' => (string) ($selectedAccount['email'] ?? ''),
	'allocatedHours' => (float) ($selectedAccount['assignedHours'] ?? $selectedAccount['allocatedHours'] ?? 0),
	'availableHours' => (float) ($selectedAccount['hoursLeft'] ?? $selectedAccount['availableHours'] ?? 0),
	'projectNotes' => (string) ($selectedAccount['projectNotes'] ?? 'No project notes available for this account yet.'),
] : null;


$accountTasks = array_map(static function (array $task) use ($pickString, $normalizeTaskStatus): array {
	$status = $normalizeTaskStatus((string) ($task['status'] ?? 'Pending'));
	return [
		'id' => (string) ($task['id'] ?? ''),
		'description' => $pickString($task, ['title', 'description']),
		'delegator' => (string) ($task['delegator'] ?? 'Supervisor'),
		'doer' => $pickString($task, ['assignedTo', 'doer']),
		'hoursLeft' => (int) ($task['hoursLeft'] ?? 8),
		'status' => $status,
		'accountId' => (string) ($task['accountId'] ?? ''),
	];
}, $accountTasksRaw);

$accountVirtualAssistants = array_map(static function (array $va) use ($pickString, $normalizeVaStatus): array {
	$status = $normalizeVaStatus($pickString($va, ['currentStatus', 'status'], 'Active'));
	return [
		'id' => (string) ($va['id'] ?? ''),
		'name' => (string) ($va['name'] ?? ''),
		'email' => (string) ($va['email'] ?? ''),
		'currentStatus' => $status,
		'allocatedHours' => (int) ($va['allocatedHours'] ?? 40),
		'accountId' => (string) ($va['accountId'] ?? ''),
	];
}, $accountVirtualAssistants);


$accountCompletedTasks = array_map(static function (array $task) use ($pickString): array {
	$completedDate = (string) ($task['completedDate'] ?? '');

	return [
		'id' => (string) ($task['id'] ?? ''),
		'approvedDate' => (string) ($task['approvedDate'] ?? $completedDate),
		'completedDate' => $completedDate,
		'description' => $pickString($task, ['title', 'description']),
		'workedHours' => (int) ($task['workedHours'] ?? 4),
		'doer' => $pickString($task, ['completedBy', 'doer'], 'N/A'),
		'approvedBy' => (string) ($task['approvedBy'] ?? 'Supervisor'),
		'accountId' => (string) ($task['accountId'] ?? ''),
	];
}, $accountCompletedTasksRaw);

$assetBasePath = 'assets';
$additionalStylesheets = ['css/supervisor.css', 'css/manager.css'];
$bodyClass = 'supervisor-layout manager-layout';
require __DIR__ . '/includes/header.php';
?>
<?php
$sidebarBasePath = '../';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main manager-department-page">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid px-3 px-lg-4 py-4">
		<section class="manager-header-section mb-4">
			<div class="manager-header-content p-3 p-lg-4">
				<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
					<div>
						<h1 class="manager-page-title mb-1">My Department</h1>
						<p class="manager-page-subtitle mb-0">Manage supervisors and their assigned accounts</p>
					</div>
					<?php if ($activeView === 'account-balance'): ?>
						<a href="myDepartment.php" class="btn manager-balance-btn">Back to Department</a>
					<?php else: ?>
						<a href="myDepartment.php?view=account-balance" class="btn manager-balance-btn">Account Balance</a>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php if ($activeView === 'account-balance'): ?>
			<?php renderAccountBalancePage($accountBalances ?? []); ?>
		<?php else: ?>
		<div class="row g-2">
			<div class="col-12 col-lg-4">
				<section class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-header manager-panel-header border-0">
						<h2 class="h5 mb-1">POC Names</h2>
						<p class="mb-0 small text-muted">Supervisors and their accounts</p>
					</div>
					<div class="card-body p-0">
						<div class="accordion manager-accordion" id="departmentAccordion">
							<?php foreach ($supervisors as $supervisor): ?>
								<?php
								$supervisorId = (string) ($supervisor['id'] ?? '');
								$collapseId = 'collapse-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $supervisorId);
								$headingId = 'heading-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $supervisorId);
								$accountRows = $supervisor['accounts'] ?? [];
								$isExpanded = $supervisorId === $selectedSupervisorId;
								?>
								<div class="accordion-item manager-accordion-item">
									<h2 class="accordion-header" id="<?= htmlspecialchars($headingId, ENT_QUOTES, 'UTF-8') ?>">
										<button
											class="accordion-button manager-accordion-button manager-supervisor-row-button<?= $isExpanded ? '' : ' collapsed' ?>"
											type="button"
											data-bs-toggle="collapse"
											data-bs-target="#<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>"
											aria-expanded="<?= $isExpanded ? 'true' : 'false' ?>"
											aria-controls="<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>"
										>
											<div class="manager-supervisor-row-content">
												<div class="manager-supervisor-row-details">
													<div class="accounts-name"><?= htmlspecialchars((string) ($supervisor['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
													<small class="accounts-client">Supervisor</small>
												</div>
												<div class="manager-supervisor-row-meta">
													<div class="accounts-available"><?= count($accountRows) ?></div>
													<small class="accounts-allocated">Accounts</small>
												</div>
											</div>
											<div class="progress accounts-progress manager-supervisor-progress">
												<div
													class="progress-bar bg-success"
													role="progressbar"
													style="width: 100%"
													aria-valuenow="100"
													aria-valuemin="0"
													aria-valuemax="100"
												></div>
											</div>
										</button>
									</h2>
									<div
										id="<?= htmlspecialchars($collapseId, ENT_QUOTES, 'UTF-8') ?>"
										class="accordion-collapse collapse<?= $isExpanded ? ' show' : '' ?>"
										aria-labelledby="<?= htmlspecialchars($headingId, ENT_QUOTES, 'UTF-8') ?>"
									>
										<div class="accordion-body p-0 manager-accounts-dropdown">
											<div class="accounts-header border-bottom">
												<div class="row g-2 accounts-header-grid">
													<div class="col-6">Account Name</div>
													<div class="col-3 text-end">Available</div>
													<div class="col-3 text-end">Allocated</div>
												</div>
											</div>

											<div class="accounts-list overflow-auto">
												<?php if (empty($accountRows)): ?>
													<div class="accounts-empty">No accounts found</div>
												<?php else: ?>
													<div class="list-group list-group-flush">
														<?php foreach ($accountRows as $row): ?>
															<?php
															$rowAccountId = (string) ($row['id'] ?? '');
															$isActiveRow = $rowAccountId === $selectedAccountId;
															$allocatedHours = (float) ($row['allocatedHours'] ?? 0);
															$availableHours = (float) ($row['availableHours'] ?? 0);
															$percent = $allocatedHours > 0 ? max(0, min(100, ($availableHours / $allocatedHours) * 100)) : 0;
															$rowHref = 'myDepartment.php?' . http_build_query([
																'supervisor' => $supervisorId,
																'account' => $rowAccountId,
																'tab' => $activeTab,
															]);
															?>
															<a
																href="<?= htmlspecialchars($rowHref, ENT_QUOTES, 'UTF-8') ?>"
																class="list-group-item list-group-item-action accounts-item py-3<?= $isActiveRow ? ' account-selected active' : '' ?>"
																aria-current="<?= $isActiveRow ? 'true' : 'false' ?>"
															>
																<div class="d-flex justify-content-between align-items-start gap-3">
																	<div class="min-w-0">
																		<div class="accounts-name text-truncate"><?= htmlspecialchars((string) ($row['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
																		<small class="accounts-client d-block text-truncate text-muted"><?= htmlspecialchars((string) ($supervisor['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?></small>
																	</div>
																	<div class="text-end">
																		<div class="accounts-available"><?= (int) $availableHours ?>h</div>
																		<small class="accounts-allocated text-muted">of <?= (int) $allocatedHours ?>h</small>
																	</div>
																</div>
																<div class="progress mt-2 accounts-progress">
																	<div
																		class="progress-bar bg-success"
																		role="progressbar"
																		style="width: <?= htmlspecialchars((string) round($percent, 2), ENT_QUOTES, 'UTF-8') ?>%"
																		aria-valuenow="<?= htmlspecialchars((string) round($percent, 2), ENT_QUOTES, 'UTF-8') ?>"
																		aria-valuemin="0"
																		aria-valuemax="100"
																	></div>
																</div>
															</a>
														<?php endforeach; ?>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			</div>

			<div class="col-12 col-lg-8">
				<section class="card border-0 shadow-sm manager-panel-card h-100">
					<div class="card-body p-0 p-lg-0">
						<?php if ($selectedAccount !== null): ?>
							<div class="account-details-shell overflow-auto">
								<div class="card shadow-sm rounded-3 mb-4 manager-account-summary-card">
									<div class="card-body p-3">
										<h2 class="account-details-title mb-1"><?= htmlspecialchars((string) ($selectedAccount['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></h2>
										<p class="account-details-subtitle mb-1">Account ID: <?= htmlspecialchars((string) ($selectedAccount['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
										<p class="account-details-subtitle mb-0">Client: <?= htmlspecialchars((string) ($selectedAccount['clientFullName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
									</div>
								</div>

								<nav class="account-tabs-nav mb-4" aria-label="Account detail tabs">
									<?php
									$tabItems = [
										'project-notes' => ['label' => 'Project Notes', 'icon' => 'bi-file-text'],
										'view-tasks' => ['label' => 'View Tasks', 'icon' => 'bi-list-task'],
										'view-vas' => ['label' => 'View VAs', 'icon' => 'bi-people'],
										'history' => ['label' => 'History', 'icon' => 'bi-clock-history'],
									];
									$tabCounts = [
										'view-tasks' => ['label' => 'View Tasks', 'icon' => 'bi-list-task'],
										'view-vas' => count($accountVirtualAssistants),
									];
									?>
									<ul class="nav nav-tabs flex-nowrap overflow-auto account-tabs-list" role="tablist">
										<?php foreach ($tabItems as $tabKey => $tabMeta): ?>
											<?php
											$isActiveTab = $activeTab === $tabKey;
											$tabHref = 'myDepartment.php?' . http_build_query([
														'supervisor' => $selectedSupervisorId,
												'account' => $selectedAccountId,
												'tab' => $tabKey,
											]);
											?>
											<li class="nav-item" role="presentation">
												<a class="nav-link account-tab-link d-inline-flex align-items-center gap-2<?= $isActiveTab ? ' active' : '' ?>" href="<?= htmlspecialchars($tabHref, ENT_QUOTES, 'UTF-8') ?>" role="tab" aria-selected="<?= $isActiveTab ? 'true' : 'false' ?>">
													<i class="bi <?= htmlspecialchars((string) ($tabMeta['icon'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
													<span><?= htmlspecialchars((string) ($tabMeta['label'] ?? ''), ENT_QUOTES, 'UTF-8') ?></span>
													<?php if (($tabCounts[$tabKey] ?? 0) > 0): ?>
														<span class="account-tab-badge ms-2"><?= (int) $tabCounts[$tabKey] ?></span>
													<?php endif; ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>

								<div class="account-tab-content">
									<?php if ($activeTab === 'project-notes'): ?>
										<?php require __DIR__ . '/partials/tabs/project-notes.php'; ?>
									<?php elseif ($activeTab === 'view-tasks'): ?>
										<?php require __DIR__ . '/partials/tabs/view-tasks.php'; ?>
									<?php elseif ($activeTab === 'view-vas'): ?>
										<?php require __DIR__ . '/partials/tabs/view-va.php'; ?>
									<?php else: ?>
										<?php $historyAllowDeleteAction = true; ?>
										<?php require __DIR__ . '/partials/tabs/history-tab.php'; ?>
										<?php unset($historyAllowDeleteAction); ?>
									<?php endif; ?>
								</div>
							</div>
						<?php else: ?>
							<div class="account-details-empty">
								<div class="account-details-empty-icon"><i class="bi bi-file-text" aria-hidden="true"></i></div>
								<h3 class="account-details-empty-title">No Account Selected</h3>
								<p class="account-details-empty-text mb-0">Select an account from the list to view details</p>
							</div>
						<?php endif; ?>
					</div>
				</section>
			</div>
		</div>
		<?php endif; ?>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
