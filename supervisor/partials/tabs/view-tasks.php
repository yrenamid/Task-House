<?php
/**
 * View Tasks Tab
 * Displays tasks assigned to the current account in a table format
 */

$tasks = $accountTasks ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_task_submit'])) {
	$newDescription = trim((string) ($_POST['task_description'] ?? ''));
	$billedHours = (int) ($_POST['billed_hours'] ?? 0);
	$billedMinutes = (int) ($_POST['billed_minutes'] ?? 0);
	$totalHours = max(0, $billedHours + (int) floor($billedMinutes / 60));

	$tasks[] = [
		'id' => 'NEW-' . (count($tasks) + 1),
		'description' => $newDescription !== '' ? $newDescription : 'New task',
		'delegator' => 'Supervisor',
		'doer' => null,
		'hoursLeft' => $totalHours,
		'status' => 'Unassigned',
	];
}

$allowedStatuses = ['Unassigned', 'Pending', 'Working', 'Paused'];
$tasks = array_values(array_filter($tasks, static function ($task) use ($allowedStatuses) {
	return in_array((string) ($task['status'] ?? 'Unassigned'), $allowedStatuses, true);
}));

$taskCount = count($tasks);

$getStatusColor = function($status) {
	return match($status) {
		'Complete' => 'task-status-complete',
		'Working' => 'task-status-working',
		'Pending' => 'task-status-pending',
		'Cancelled' => 'task-status-cancelled',
		default => 'task-status-default',
	};
};

$getStatusBgClass = function($status) {
	return match($status) {
		'Complete' => 'bg-success',
		'Working' => 'bg-info',
		'Pending' => 'bg-warning',
		'Cancelled' => 'bg-danger',
		default => 'bg-secondary',
	};
};
?>

<div class="tab-pane-wrap p-3 p-lg-4">
	<!-- Header & Add Button -->
	<div class="task-header-controls mb-4 d-flex justify-content-between align-items-center">
		<!-- Header Section -->
		<div class="min-w-0">
			<h3 class="task-tab-title mb-1">Active Tasks</h3>
			<p class="task-tab-subtitle">
				<?= htmlspecialchars($taskCount) ?> <?= $taskCount === 1 ? 'task' : 'tasks' ?> in progress
			</p>
		</div>

		<!-- Add Button -->
		<div class="task-top-controls flex-shrink-0">
				<div class="d-flex flex-column flex-md-row gap-2">
					<div class="flex-grow-1">
						<input
							type="text"
							class="form-control task-search-input"
							placeholder="Search Active Tasks"
							aria-label="Search Active Tasks"
						>
					</div>
					<button
						type="button"
						class="btn btn-primary btn-sm"
						data-bs-toggle="modal"
						data-bs-target="#addTaskModal"
					>
						<i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
						Add New Task
					</button>
				</div>
			</div>
	</div>

	<!-- Tasks Table -->
	<div class="card task-table-container">
		<?php if ($taskCount === 0): ?>
			<div class="task-empty-state">
				<p class="task-empty-text">No tasks found for this account</p>
			</div>
		<?php else: ?>
			<div class="table-responsive">
				<table class="table task-table mb-0">
					<thead>
						<tr class="task-table-header">
							<th class="task-col-id">Task ID</th>
							<th class="task-col-description">Description</th>
							<th class="task-col-delegator">Delegator</th>
							<th class="task-col-doer">Doer</th>
							<th class="task-col-hours text-end">Hours Left</th>
							<th class="task-col-status">Status</th>
							<th class="task-col-action text-end">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tasks as $task): ?>
							<?php
								$taskId = htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
								$taskDescription = htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8');
								$taskDelegator = htmlspecialchars($task['delegator'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
								$taskDoer = htmlspecialchars($task['doer'] ?? 'Unassigned', ENT_QUOTES, 'UTF-8');
								$taskStatus = htmlspecialchars($task['status'] ?? 'Unassigned', ENT_QUOTES, 'UTF-8');
								$taskHours = (int) ($task['hoursLeft'] ?? 0);
								$statusClass = $getStatusColor($task['status'] ?? 'Unassigned');
								$dropdownId = 'taskDropdown_' . htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
								$modalId = 'taskModal_' . htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
								$isUnassigned = ($task['status'] ?? 'Unassigned') === 'Unassigned' || empty($task['doer']);
								?>
								<tr class="task-table-row">
								<td class="task-col-id">
									<span class="task-id-badge"><?= $taskId ?></span>
								</td>
								<td class="task-col-description">
									<div class="task-description-text"><?= $taskDescription ?></div>
								</td>
								<td class="task-col-delegator">
									<span><?= $taskDelegator ?></span>
								</td>
								<td class="task-col-doer">
									<?php if ($task['doer'] === null): ?>
										<span class="task-doer-unassigned">Unassigned</span>
									<?php else: ?>
										<span><?= $taskDoer ?></span>
									<?php endif; ?>
								</td>
								<td class="task-col-hours text-end">
									<span class="task-hours-badge"><?= $taskHours ?>h</span>
								</td>
								<td class="task-col-status">
									<span class="badge <?= $statusClass ?>">
										<?= $taskStatus ?>
									</span>
								</td>
								<td class="task-col-action text-center">
									<div class="dropdown">
										<button
											type="button"
											class="btn btn-sm btn-link text-dark p-0"
											id="<?= htmlspecialchars($dropdownId, ENT_QUOTES, 'UTF-8') ?>"
											data-bs-toggle="dropdown"
											aria-expanded="false"
										>
											<i class="bi bi-three-dots-vertical " aria-hidden="true"></i>
										</button>
										<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="<?= htmlspecialchars($dropdownId, ENT_QUOTES, 'UTF-8') ?>">
											<li>
												<a class="dropdown-item" href="#<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>" data-bs-toggle="modal">
													View
												</a>
											</li>
											<?php if ($isUnassigned): ?>
												<li>
													<a class="dropdown-item" href="#">Assign to VA</a>
												</li>
												<li>
													<a class="dropdown-item" href="#">Do Task</a>
												</li>
											<?php else: ?>
												<li>
													<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addTimeModal">Add Time</a>
												</li>
											<?php endif; ?>
											<li><hr class="dropdown-divider"></li>
											<li>
												<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cancelTaskSupModal">Cancel</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>

							<!-- Include Task Modal -->
							<?php
							$modalId = 'taskModal_' . htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
							$taskModalMode = 'edit';
							require __DIR__ . '/../modals/taskmodal.php';
							?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php require __DIR__ . '/../modals/cancel-task-sup.php'; ?>

<?php require __DIR__ . '/../modals/add-task-modal.php'; ?>
