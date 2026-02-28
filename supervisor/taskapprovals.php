<?php
require __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'task-approvals';

$allowedStatuses = ['For Approval'];

$approvalsList = $taskApprovals ?? [];
foreach ($approvalsList as &$task) {
	$taskStatus = $task['status'] ?? 'Pending';
	if (!in_array($taskStatus, $allowedStatuses, true)) {
		$taskStatus = 'For Approval';
	}
	$task['status'] = $taskStatus;
}
unset($task);

$filteredApprovals = array_values(array_filter(
	$approvalsList,
	static fn(array $task): bool => ($task['status'] ?? '') === 'For Approval'
));

$forApprovalCount = count($filteredApprovals);

$formatDate = static function (string $dateString): string {
	$timestamp = strtotime($dateString);
	if ($timestamp === false) {
		return $dateString;
	}

	return date('M j, Y', $timestamp);
};

$formatTime = static function ($hours, $minutes): string {
	return sprintf('%dh %02dm', (int) $hours, (int) $minutes);
};

$getStatusBadgeClass = static function (string $status): string {
	return match ($status) {
		'For Approval' => 'task-approval-badge task-approval-badge-pending',
		'Approved' => 'task-approval-badge task-approval-badge-approved',
		'Pending' => 'task-approval-badge task-approval-badge-pending',
		'Do Over' => 'task-approval-badge task-approval-badge-do-over',
		default => 'task-approval-badge task-approval-badge-default',
	};
};

require __DIR__ . '/supervisorIncludes/headerSup.php';
?>
<?php
$sidebarBasePath = '../';
require __DIR__ . '/../includes/sidebar.php';
?>

<main class="app-main task-approvals-page">
	<?php require __DIR__ . '/supervisorIncludes/app-headerSup.php'; ?>

	<section class="task-approvals-header border-bottom">
		<div class="container-fluid px-3 px-lg-4 py-4">
			<div class="d-flex flex-column flex-xl-row gap-3 gap-xl-4 align-items-xl-center justify-content-xl-between">
				<div>
					<h1 class="task-approvals-title mb-1">Task Approvals</h1>
					<p class="task-approvals-subtitle mb-0">
						Review and approve submitted tasks
						<?php if ($forApprovalCount > 0): ?>
							<span class="task-approvals-pending">· <?= (int) $forApprovalCount ?> pending</span>
						<?php endif; ?>
					</p>
				</div>

				<form class="row g-2 g-sm-3 task-approvals-filters w-100 w-xl-auto ms-xl-auto justify-content-end">
					<div class="col-12 col-sm-7 col-xl-auto">
						<label for="taskApprovalSearch" class="visually-hidden">Search tasks</label>
						<div class="input-group task-approvals-search-group">
							<span class="input-group-text"><i class="bi bi-search"></i></span>
							<input
								type="text"
								id="taskApprovalSearch"
								class="form-control"
								placeholder="Search tasks..."
								value=""
							>
						</div>
					</div>

				</form>
			</div>
		</div>
	</section>

	<section class="container-fluid px-3 px-lg-4 py-4">
		<div class="card task-approvals-card shadow-sm border-0">
			<div class="card-body p-0">
				<?php if (empty($filteredApprovals)): ?>
					<div class="task-approvals-empty text-center py-5 px-3">
						<div class="task-approvals-empty-icon mx-auto mb-3"><i class="bi bi-file-earmark-text"></i></div>
						<h2 class="h5 mb-1">No tasks pending approval</h2>
						<p class="mb-0">Submitted tasks will appear here.</p>
					</div>
				<?php else: ?>
					<div class="table-responsive d-none d-md-block">
						<table class="table table-hover align-middle mb-0 task-approvals-table">
							<thead>
								<tr>
									<th scope="col">Task ID</th>
									<th scope="col">Date</th>
									<th scope="col">Account Name</th>
									<th scope="col">Project Name</th>
									<th scope="col" class="task-col-description">Task Description</th>
									<th scope="col">Doer</th>
									<th scope="col" class="text-end">Billed</th>
									<th scope="col" class="text-end">Worked</th>
									<th scope="col">Status</th>
									<th scope="col" class="text-end">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filteredApprovals as $task): ?>
									<?php
									$taskId = (string) $task['id'];
									$viewModalId = 'viewTaskApprovalModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
									$approveModalId = 'approveTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
									$doOverModalId = 'doOverTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
									?>
									<tr>
										<td class="fw-semibold text-nowrap"><?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?></td>
										<td><?= htmlspecialchars($formatDate((string) $task['date']), ENT_QUOTES, 'UTF-8') ?></td>
										<td><?= htmlspecialchars((string) $task['accountName'], ENT_QUOTES, 'UTF-8') ?></td>
										<td><?= htmlspecialchars((string) $task['projectName'], ENT_QUOTES, 'UTF-8') ?></td>
										<td>
											<span class="task-approval-description text-truncate d-inline-block" title="<?= htmlspecialchars((string) $task['description'], ENT_QUOTES, 'UTF-8') ?>">
												<?= htmlspecialchars((string) $task['description'], ENT_QUOTES, 'UTF-8') ?>
											</span>
										</td>
										<td><?= htmlspecialchars((string) $task['doer'], ENT_QUOTES, 'UTF-8') ?></td>
										<td class="text-end"><?= htmlspecialchars($formatTime($task['billedHours'], $task['billedMinutes']), ENT_QUOTES, 'UTF-8') ?></td>
										<td class="text-end"><?= htmlspecialchars($formatTime($task['workedHours'], $task['workedMinutes']), ENT_QUOTES, 'UTF-8') ?></td>
										<td>
											<span class="<?= htmlspecialchars($getStatusBadgeClass((string) $task['status']), ENT_QUOTES, 'UTF-8') ?>">
												<?= htmlspecialchars((string) $task['status'], ENT_QUOTES, 'UTF-8') ?>
											</span>
										</td>
										<td class="text-end">
											<div class="dropdown">
												<button class="btn btn-sm btn-outline-secondary task-approvals-action-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="bi bi-three-dots-vertical"></i>
												</button>
												<ul class="dropdown-menu dropdown-menu-end">
													<li>
														<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($viewModalId, ENT_QUOTES, 'UTF-8') ?>">View Task</button>
													</li>
													<?php if (($task['status'] ?? '') === 'For Approval'): ?>
														<li>
															<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>">Approve Task</button>
														</li>
														<li><hr class="dropdown-divider"></li>
														<li>
															<button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($doOverModalId, ENT_QUOTES, 'UTF-8') ?>">Do Over</button>
														</li>
													<?php endif; ?>
												</ul>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="d-md-none p-3 task-approvals-mobile-list">
						<?php foreach ($filteredApprovals as $task): ?>
							<?php
							$taskId = (string) $task['id'];
							$viewModalId = 'viewTaskApprovalModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
							$approveModalId = 'approveTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
							$doOverModalId = 'doOverTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
							?>
							<article class="task-approval-mobile-card border rounded-3 p-3 mb-3">
								<div class="d-flex justify-content-between align-items-start gap-2 mb-2">
									<div>
										<div class="fw-semibold"><?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?></div>
										<div class="small text-muted"><?= htmlspecialchars($formatDate((string) $task['date']), ENT_QUOTES, 'UTF-8') ?></div>
									</div>
									<span class="<?= htmlspecialchars($getStatusBadgeClass((string) $task['status']), ENT_QUOTES, 'UTF-8') ?>">
										<?= htmlspecialchars((string) $task['status'], ENT_QUOTES, 'UTF-8') ?>
									</span>
								</div>

								<div class="mb-2">
									<div class="small text-muted">Account</div>
									<div class="fw-medium"><?= htmlspecialchars((string) $task['accountName'], ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<div class="mb-2">
									<div class="small text-muted">Project</div>
									<div><?= htmlspecialchars((string) $task['projectName'], ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<div class="mb-2">
									<div class="small text-muted">Task Description</div>
									<div><?= htmlspecialchars((string) $task['description'], ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<div class="d-flex justify-content-between border-top pt-2 mt-2">
									<div>
										<div class="small text-muted">Doer</div>
										<div><?= htmlspecialchars((string) $task['doer'], ENT_QUOTES, 'UTF-8') ?></div>
									</div>
									<div class="text-end">
										<div class="small text-muted">Billed / Worked</div>
										<div class="fw-medium">
											<?= htmlspecialchars($formatTime($task['billedHours'], $task['billedMinutes']), ENT_QUOTES, 'UTF-8') ?> /
											<?= htmlspecialchars($formatTime($task['workedHours'], $task['workedMinutes']), ENT_QUOTES, 'UTF-8') ?>
										</div>
									</div>
								</div>

								<div class="d-flex flex-wrap gap-2 mt-3">
									<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($viewModalId, ENT_QUOTES, 'UTF-8') ?>">View Task</button>
									<?php if (($task['status'] ?? '') === 'For Approval'): ?>
										<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>">Approve</button>
										<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($doOverModalId, ENT_QUOTES, 'UTF-8') ?>">Do Over</button>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php foreach ($filteredApprovals as $task): ?>
		<?php
		$taskId = (string) $task['id'];
		$approvalTask = $task;
		$viewModalId = 'viewTaskApprovalModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
		$approveModalId = 'approveTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
		$doOverModalId = 'doOverTaskModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $taskId);
		?>
		<?php
		$modalId = $viewModalId;
		$taskModalMode = 'readonly';
		require __DIR__ . '/partials/modals/taskmodal.php';
		unset($modalId, $taskModalMode);
		?>
		<?php require __DIR__ . '/partials/modals/approve-task-modal.php'; ?>
		<?php require __DIR__ . '/partials/modals/do-over-modal.php'; ?>
	<?php endforeach; ?>
</main>

<?php require __DIR__ . '/supervisorIncludes/footerSup.php'; ?>
