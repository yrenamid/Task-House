<?php
require_once __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'delegated-tasks';

$statusFilter = (string) ($_GET['status'] ?? 'all');
$searchQuery = (string) ($_GET['q'] ?? '');

$departmentTaskSource = $departmentTasks ?? [];

$accountNameById = [];
$supervisorByAccountId = [];
foreach (($accounts ?? []) as $account) {
	$accountId = (string) ($account['id'] ?? '');
	if ($accountId !== '') {
		$accountNameById[$accountId] = (string) ($account['accountName'] ?? $accountId);
	}
}

foreach (($departmentSupervisors ?? []) as $supervisor) {
	$supervisorName = (string) ($supervisor['name'] ?? 'Supervisor');
	foreach (($supervisor['accounts'] ?? []) as $account) {
		$accountId = (string) ($account['id'] ?? '');
		if ($accountId !== '') {
			$accountNameById[$accountId] = (string) ($account['name'] ?? ($accountNameById[$accountId] ?? $accountId));
			$supervisorByAccountId[$accountId] = $supervisorName;
		}
	}
}

$normalizeStatus = static function (string $status): string {
	return match ($status) {
		'In Progress', 'Working' => 'Working',
		'Pending', 'For Approval' => 'Pending',
		'Done', 'Complete', 'Completed' => 'Done',
		'Unassigned', 'Unassign' => 'Unassign',
		'Pause' => 'Pause',
		default => 'Pending',
	};
};

$formatTaskDate = static function (?string $date): string {
	if ($date === null || $date === '') {
		return 'N/A';
	}

	$timestamp = strtotime($date);
	if ($timestamp === false) {
		return $date;
	}

	return date('M j, Y', $timestamp);
};

$displayDelegatedTasks = array_map(
	static function (array $task) use ($accountNameById, $supervisorByAccountId, $normalizeStatus, $formatTaskDate): array {
		$taskId = (string) ($task['id'] ?? '');
		$accountId = (string) ($task['accountId'] ?? '');
		$doer = (string) ($task['assignedTo'] ?? ($task['doer'] ?? 'Unassigned'));
		$status = $normalizeStatus((string) ($task['status'] ?? 'Pending'));
		$delegator = (string) ($supervisorByAccountId[$accountId] ?? ($task['delegator'] ?? 'Supervisor'));

		return [
			'id' => $taskId,
			'date' => $formatTaskDate((string) ($task['dueDate'] ?? '')),
			'accountName' => (string) ($accountNameById[$accountId] ?? $accountId),
			'taskDescription' => (string) ($task['title'] ?? ($task['description'] ?? 'No description')),
			'delegator' => $delegator,
			'doer' => $doer,
			'status' => $status,
			'description' => (string) ($task['title'] ?? ($task['description'] ?? 'No description')),
			'accountId' => $accountId,
			'instructions' => (string) ($task['instructions'] ?? 'No instructions available.'),
			'notes' => (string) ($task['notes'] ?? 'No notes available.'),
			'hoursLeft' => (int) ($task['hoursLeft'] ?? 0),
			'attachments' => is_array($task['attachments'] ?? null) ? $task['attachments'] : [],
			'history' => is_array($task['history'] ?? null) ? $task['history'] : [],
		];
	},
	$departmentTaskSource
);

$totalDelegatedFromDepartment = count($displayDelegatedTasks);

$assetBasePath = 'assets';
$additionalStylesheets = ['css/supervisor.css', 'css/manager.css'];
$bodyClass = 'supervisor-layout manager-layout';
require __DIR__ . '/includes/header.php';
?>
<?php
$sidebarBasePath = '../';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main manager-page delegated-tasks-page">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid py-4 manager-page">
		<div class="card manager-card manager-panel-card shadow-sm border-0 delegated-tasks-card">
			<div class="card-header delegated-tasks-header border-0 p-3 p-lg-4">
				<div class="row g-3 align-items-center justify-content-between">
					<div class="col-12 col-lg-5">
						<h1 class="manager-page-title mb-1">Delegated Tasks</h1>
						<p class="manager-page-subtitle mb-0">View and manage tasks delegated to team members</p>
					</div>
					<div class="col-12 col-lg-7">
						<form method="get" class="d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
							<label class="visually-hidden" for="statusFilter">Status</label>
							<select id="statusFilter" name="status" class="form-select form-select-sm delegated-filter-control delegated-status-filter" aria-label="Status filter">
								<option value="all"<?= $statusFilter === 'all' ? ' selected' : '' ?>>All Statuses</option>
								<option value="Working"<?= $statusFilter === 'Working' ? ' selected' : '' ?>>Working</option>
								<option value="Pause"<?= $statusFilter === 'Pause' ? ' selected' : '' ?>>Pause</option>
								<option value="Pending"<?= $statusFilter === 'Pending' ? ' selected' : '' ?>>Pending</option>
								<option value="Done"<?= $statusFilter === 'Done' ? ' selected' : '' ?>>Done</option>
								<option value="Unassign"<?= $statusFilter === 'Unassign' ? ' selected' : '' ?>>Unassign</option>
							</select>

							<label class="visually-hidden" for="delegatedSearch">Search</label>
							<input
								type="text"
								id="delegatedSearch"
								name="q"
								class="form-control form-control-sm delegated-filter-control delegated-search-input"
								placeholder="Search here..."
								value="<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>"
							>

							<button type="submit" class="btn btn-primary btn-sm px-3 delegated-search-btn" aria-label="Search">
								<i class="bi bi-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
			</div>

			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-dark table-hover align-middle mb-0 delegated-tasks-table">
						<thead>
							<tr>
								<th scope="col">Date <i class="bi bi-arrow-down-up ms-1" aria-hidden="true"></i></th>
								<th scope="col">Account Name <i class="bi bi-arrow-down-up ms-1" aria-hidden="true"></i></th>
								<th scope="col">Tasks</th>
								<th scope="col">Delegator <i class="bi bi-arrow-down-up ms-1" aria-hidden="true"></i></th>
								<th scope="col">Doer <i class="bi bi-arrow-down-up ms-1" aria-hidden="true"></i></th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php if (empty($displayDelegatedTasks)): ?>
								<tr>
									<td colspan="6" class="text-center py-5 text-secondary">No delegated tasks found</td>
								</tr>
							<?php else: ?>
								<?php foreach ($displayDelegatedTasks as $task): ?>
									<?php
									$taskModalId = 'delegatedTaskModal_' . preg_replace('/[^a-zA-Z0-9_-]/', '', (string) ($task['id'] ?? ''));
									switch ((string) ($task['status'] ?? 'Pending')) {
										case 'Done':
											$badgeClass = 'badge-done';
											break;
										case 'Unassign':
											$badgeClass = 'badge-unassign';
											break;
										case 'Working':
											$badgeClass = 'badge-working';
											break;
										case 'Pause':
											$badgeClass = 'badge-pause';
											break;
										case 'Pending':
										default:
											$badgeClass = 'badge-pending';
											break;
									}
									?>
									<tr class="delegated-task-row" role="button" tabindex="0" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($taskModalId, ENT_QUOTES, 'UTF-8') ?>">
										<td class="text-nowrap"><?= htmlspecialchars((string) ($task['date'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
										<td><?= htmlspecialchars((string) ($task['accountName'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
										<td>
											<div class="delegated-task-desc text-truncate" title="<?= htmlspecialchars((string) ($task['taskDescription'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
												<?= htmlspecialchars((string) ($task['taskDescription'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
											</div>
										</td>
										<td><?= htmlspecialchars((string) ($task['delegator'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
										<td><?= htmlspecialchars((string) ($task['doer'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
										<td>
											<span class="badge rounded-pill <?= htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8') ?>">
												<?= htmlspecialchars((string) ($task['status'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
											</span>
										</td>
									</tr>

									<?php
									$modalId = $taskModalId;
									$taskModalMode = 'readonly';
									require __DIR__ . '/partials/modals/taskmodal.php';
									?>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="card-footer delegated-tasks-footer border-0 px-3 px-lg-4 py-3">
				<p class="mb-0 small text-secondary">
					Showing <?= count($displayDelegatedTasks) ?> of <?= $totalDelegatedFromDepartment ?> delegated tasks
				</p>
			</div>
		</div>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
