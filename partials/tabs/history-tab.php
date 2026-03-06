<?php

$completedTasks = $accountCompletedTasks ?? [];
$completedCount = count($completedTasks);
$showDeleteAction = (bool) ($historyAllowDeleteAction ?? false);

$formatDate = static function ($dateString) {
	if (empty($dateString)) {
		return 'N/A';
	}
	$timestamp = strtotime((string) $dateString);
	if ($timestamp === false) {
		return htmlspecialchars((string) $dateString, ENT_QUOTES, 'UTF-8');
	}
	return date('M j, Y', $timestamp);
};
?>


<div class="tab-pane-wrap p-3 p-lg-4">
	<div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
		<div class="history-header mb-0">
			<h3 class="history-title mb-1">Task History</h3>
			<p class="history-subtitle mb-0">
				<?= (int) $completedCount ?> completed <?= $completedCount === 1 ? 'task' : 'tasks' ?>
			</p>
		</div>

		<div class="w-100" style="max-width: 340px;">
			<div class="input-group">
				<input
					type="text"
					class="form-control"
					placeholder="Search history..."
					aria-label="Search history"
				>
				<button class="btn btn-primary" type="button" aria-label="Search history">
					<i class="bi bi-search" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</div>



	<div class="card history-table-card">
		<?php if ($completedCount === 0): ?>
			<div class="history-empty-state">
				<div class="history-empty-icon">
					<i class="bi bi-check-circle" aria-hidden="true"></i>
				</div>
				<p class="history-empty-text mb-0">No completed tasks yet</p>
			</div>
		<?php else: ?>
			<div class="table-responsive">
				<table class="table history-table mb-0">
					<thead>
						<tr>
							<th scope="col">Task ID</th>
							<th scope="col">Approved Date</th>
							<th scope="col">Completed Date</th>
							<th scope="col" class="history-col-description">Description</th>
							<th scope="col" class="text-center">Worked Hours</th>
							<th scope="col">Doer</th>
							<th scope="col">Approved By</th>
							<?php if ($showDeleteAction): ?>
								<th scope="col" class="text-center">Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($completedTasks as $task): ?>
							<?php
							$modalId = 'historyTaskModal_' . htmlspecialchars((string) ($task['id'] ?? ''), ENT_QUOTES, 'UTF-8');
							$deleteModalId = 'historyDeleteModal_' . htmlspecialchars((string) ($task['id'] ?? ''), ENT_QUOTES, 'UTF-8');
							$taskId = htmlspecialchars((string) ($task['id'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							$approvedDate = $formatDate($task['approvedDate'] ?? '');
							$completedDate = $formatDate($task['completedDate'] ?? '');
							$description = htmlspecialchars((string) ($task['description'] ?? 'No description'), ENT_QUOTES, 'UTF-8');
							$workedHours = (int) ($task['workedHours'] ?? 0);
							$doer = htmlspecialchars((string) ($task['doer'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							$approvedBy = htmlspecialchars((string) ($task['approvedBy'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							?>
							<tr class="history-table-row">
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
									<span class="history-task-id"><?= $taskId ?></span>
								</td>
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>"><?= $approvedDate ?></td>
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>"><?= $completedDate ?></td>
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
									<div class="history-description"><?= $description ?></div>
								</td>
								<td class="text-center" role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
									<span class="history-hours"><?= $workedHours ?>h</span>
								</td>
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>"><?= $doer ?></td>
								<td role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>"><?= $approvedBy ?></td>
								<?php if ($showDeleteAction): ?>
									<td class="text-center">
										<button
											type="button"
											class="btn btn-outline-danger btn-sm"
											data-bs-toggle="modal"
											data-bs-target="#<?= $deleteModalId ?>"
											aria-label="Delete task from history"
										>
											<i class="bi bi-trash" aria-hidden="true"></i>
										</button>

										<div class="modal fade" id="<?= $deleteModalId ?>" tabindex="-1" aria-labelledby="<?= $deleteModalId ?>Label" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="<?= $deleteModalId ?>Label">Delete Task</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														Are you sure you want to delete this task from history?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Confirm Delete</button>
													</div>
												</div>
											</div>
										</div>
									</td>
								<?php endif; ?>
							</tr>

							<?php
							$taskModalMode = 'readonly';
							require __DIR__ . '/../modals/taskmodal.php';
							?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
	</div>

</div>
