<?php
require __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'myAccounts';

$searchValue = trim($_GET['search'] ?? '');
$selectedAccountId = $_GET['account'] ?? null;

$filteredAccounts = array_values(array_filter($accounts, static function (array $account) use ($searchValue): bool {
	if ($searchValue === '') {
		return true;
	}

	$needle = mb_strtolower($searchValue);
	$accountName = mb_strtolower($account['accountName']);
	$clientName = mb_strtolower($account['clientFullName']);

	return str_contains($accountName, $needle) || str_contains($clientName, $needle);
}));

$selectedAccount = null;
if ($selectedAccountId !== null) {
	foreach ($accounts as $accountItem) {
		if ($accountItem['id'] === $selectedAccountId) {
			$selectedAccount = $accountItem;
			break;
		}
	}
}
$activeTab = $_GET['tab'] ?? 'project-notes';
$allowedTabs = ['project-notes', 'view-tasks', 'view-vas', 'history'];
if (!in_array($activeTab, $allowedTabs, true)) {
	$activeTab = 'project-notes';
}

$isMobileAccountsView = $selectedAccount === null;
$isMobileDetailsView = $selectedAccount !== null;

$baseQuery = [];
if ($searchValue !== '') {
	$baseQuery['search'] = $searchValue;
}
$backToAccountsHref = empty($baseQuery) ? 'myAccounts.php' : ('?' . http_build_query($baseQuery));

$accountTasks = [];
$accountVirtualAssistants = [];
$accountCompletedTasks = [];
if ($selectedAccountId !== null) {
	$accountTasks = array_values(array_filter($tasks, static fn(array $task): bool => $task['accountId'] === $selectedAccountId));
	$accountVirtualAssistants = array_values(array_filter($virtualAssistants, static fn(array $va): bool => $va['accountId'] === $selectedAccountId));
	$accountCompletedTasks = array_values(array_filter($completedTasks, static fn(array $history): bool => $history['accountId'] === $selectedAccountId));
}

require __DIR__ . '/supervisorIncludes/headerSup.php';
?>
<?php
$sidebarBasePath = '../';
require __DIR__ . '/../includes/sidebar.php';
?>

<main class="app-main accounts-page">
	<?php require __DIR__ . '/supervisorIncludes/app-headerSup.php'; ?>

	<div class="container-fluid px-3 px-md-0 overflow-hidden">
		<div class="row g-0 vh-100 accounts-layout accounts-content-row flex-nowrap">
		<div class="col-12 col-md-4 col-lg-3 accounts-panel border-end vh-100 d-flex flex-column<?= $isMobileDetailsView ? ' d-none d-md-flex' : ' d-flex' ?>">
			<div class="accounts-search-wrap border-bottom">
				<form method="get" class="accounts-search-form" role="search">
					<label for="accountsSearch" class="visually-hidden">Search accounts</label>
					<i class="bi bi-search accounts-search-icon" aria-hidden="true"></i>
					<input
						type="text"
						id="accountsSearch"
						name="search"
						class="form-control accounts-search-input"
						placeholder="Search accounts..."
						value="<?= htmlspecialchars($searchValue, ENT_QUOTES, 'UTF-8') ?>"
					>
					<?php if ($selectedAccountId !== null): ?>
						<input type="hidden" name="account" value="<?= htmlspecialchars($selectedAccountId, ENT_QUOTES, 'UTF-8') ?>">
					<?php endif; ?>
					<input type="hidden" name="tab" value="<?= htmlspecialchars($activeTab, ENT_QUOTES, 'UTF-8') ?>">
				</form>
			</div>

			<div class="accounts-header border-bottom">
				<div class="row g-2 accounts-header-grid">
					<div class="col-6">Account Name</div>
					<div class="col-3 text-end">Available</div>
					<div class="col-3 text-end">Allocated</div>
				</div>
			</div>

			<div class="accounts-list flex-grow-1 overflow-auto">
				<?php if (empty($filteredAccounts)): ?>
					<div class="accounts-empty">No accounts found</div>
				<?php else: ?>
					<div class="list-group list-group-flush">
					<?php foreach ($filteredAccounts as $account): ?>
						<?php
						$isSelected = $selectedAccountId === $account['id'];
						$allocatedHours = (float) $account['allocatedHours'];
						$availableHours = (float) $account['availableHours'];
						$percent = $allocatedHours > 0 ? max(0, min(100, ($availableHours / $allocatedHours) * 100)) : 0;

						$query = [
							'search' => $searchValue,
							'account' => $account['id'],
							'tab' => $activeTab,
						];
						$href = '?' . http_build_query($query);
						?>
						<a
							href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"
							class="list-group-item list-group-item-action accounts-item py-3<?= $isSelected ? ' account-selected active' : '' ?>"
							aria-current="<?= $isSelected ? 'true' : 'false' ?>"
						>
							<div class="d-flex justify-content-between align-items-start gap-3">
								<div class="min-w-0">
									<div class="accounts-name text-truncate"><?= htmlspecialchars($account['accountName'], ENT_QUOTES, 'UTF-8') ?></div>
									<small class="accounts-client d-block text-truncate text-muted"><?= htmlspecialchars($account['clientFullName'], ENT_QUOTES, 'UTF-8') ?></small>
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

		<section class="col-12 col-md-8 col-lg-9 project-notes-pane vh-100 d-flex flex-column<?= $isMobileAccountsView ? ' d-none d-md-flex' : ' d-flex' ?>">
			<?php if ($selectedAccount !== null): ?>
				<div class="account-details-shell p-3 py-3 overflow-auto">
					<a href="<?= htmlspecialchars($backToAccountsHref, ENT_QUOTES, 'UTF-8') ?>" class="btn btn-outline-secondary btn-sm d-md-none mb-3">← Back to Accounts</a>
					<div class="card shadow-sm rounded-3 mb-4">
						<div class="card-body bg-dark p-3">
							<h2 class="account-details-title mb-1"><?= htmlspecialchars($selectedAccount['accountName'], ENT_QUOTES, 'UTF-8') ?></h2>
							<p class="account-details-subtitle mb-1">Account ID: <?= htmlspecialchars($selectedAccount['id'], ENT_QUOTES, 'UTF-8') ?></p>
							<p class="account-details-subtitle mb-0">Client: <?= htmlspecialchars($selectedAccount['clientFullName'], ENT_QUOTES, 'UTF-8') ?></p>
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
							'view-tasks' => count($accountTasks),
							'view-vas' => count($accountVirtualAssistants),
						];
						?>
						<ul class="nav nav-tabs flex-nowrap overflow-auto account-tabs-list" role="tablist">
							<?php foreach ($tabItems as $tabKey => $tabMeta): ?>
								<?php
								$isActiveTab = $activeTab === $tabKey;
								$tabQuery = [
									'search' => $searchValue,
									'account' => $selectedAccountId,
									'tab' => $tabKey,
								];
								$tabHref = '?' . http_build_query($tabQuery);
								?>
								<li class="nav-item" role="presentation">
									<a class="nav-link account-tab-link d-inline-flex align-items-center gap-2<?= $isActiveTab ? ' active' : '' ?>" href="<?= htmlspecialchars($tabHref, ENT_QUOTES, 'UTF-8') ?>" role="tab" aria-selected="<?= $isActiveTab ? 'true' : 'false' ?>">
										<i class="bi <?= htmlspecialchars($tabMeta['icon'], ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true"></i>
										<span><?= htmlspecialchars($tabMeta['label'], ENT_QUOTES, 'UTF-8') ?></span>
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
							<?php require __DIR__ . '/partials/tabs/history-tab.php'; ?>
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
		</section>
		</div>
	</div>
</main>

<?php require __DIR__ . '/supervisorIncludes/footerSup.php'; ?>
