<?php

$completedTasks = $accountCompletedTasks ?? [];
$completedCount = count($completedTasks);
$totalWorkedHours = array_reduce(
	$completedTasks,
	static fn($sum, $item) => $sum + (int) ($item['workedHours'] ?? 0),
	0
);
$averageWorkedHours = $completedCount > 0 ? round($totalWorkedHours / $completedCount, 1) : 0;

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
	<div class="history-header mb-4">
		<h3 class="history-title mb-1">Task History</h3>
		<p class="history-subtitle mb-0">
			<?= (int) $completedCount ?> completed <?= $completedCount === 1 ? 'task' : 'tasks' ?>
		</p>
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
							<th scope="col" class="text-end">Worked Hours</th>
							<th scope="col">Doer</th>
							<th scope="col">Approved By</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($completedTasks as $task): ?>
							<?php
							$modalId = 'historyTaskModal_' . htmlspecialchars((string) ($task['id'] ?? ''), ENT_QUOTES, 'UTF-8');
							$taskId = htmlspecialchars((string) ($task['id'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							$approvedDate = $formatDate($task['approvedDate'] ?? '');
							$completedDate = $formatDate($task['completedDate'] ?? '');
							$description = htmlspecialchars((string) ($task['description'] ?? 'No description'), ENT_QUOTES, 'UTF-8');
							$workedHours = (int) ($task['workedHours'] ?? 0);
							$doer = htmlspecialchars((string) ($task['doer'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							$approvedBy = htmlspecialchars((string) ($task['approvedBy'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
							?>
							<tr class="history-table-row" role="button" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
								<td>
									<span class="history-task-id"><?= $taskId ?></span>
								</td>
								<td><?= $approvedDate ?></td>
								<td><?= $completedDate ?></td>
								<td>
									<div class="history-description"><?= $description ?></div>
								</td>
								<td class="text-end">
									<span class="history-hours"><?= $workedHours ?>h</span>
								</td>
								<td><?= $doer ?></td>
								<td><?= $approvedBy ?></td>
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
