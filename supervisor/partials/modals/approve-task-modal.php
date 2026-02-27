<?php
if (!isset($approvalTask, $approveModalId)) {
	return;
}

$currentAccountName = (string) ($approvalTask['accountName'] ?? '');
$currentBilledHours = (int) ($approvalTask['billedHours'] ?? 0);
$currentBilledMinutes = (int) ($approvalTask['billedMinutes'] ?? 0);
$currentWorkedHours = (int) ($approvalTask['workedHours'] ?? 0);
$currentWorkedMinutes = (int) ($approvalTask['workedMinutes'] ?? 0);
$currentDescription = (string) ($approvalTask['description'] ?? '');

$accountOptions = $accounts ?? [];
?>
<div class="modal fade" id="<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-labelledby="<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>Label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content task-approval-modal task-approval-modal-approve">
			<div class="modal-header">
				<div>
					<h5 class="modal-title" id="<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>Label">Approve Task</h5>
					<p class="mb-0 task-approval-modal-subtitle">Review and finalize task details before approval</p>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<div class="task-approval-note d-flex align-items-start gap-3 mb-4">
					<i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>
					<p class="mb-0">Note: Finalize the Task, Billed Hours &amp; Worked Hours before approving the task.</p>
				</div>

				<div class="row g-4">
					<div class="col-12 col-md-6">
						<label class="form-label task-approval-input-label" for="accountName-<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>">Account Name</label>
						<select class="form-select" id="accountName-<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>">
							<?php foreach ($accountOptions as $account): ?>
								<?php $optionName = (string) ($account['accountName'] ?? ''); ?>
								<option value="<?= htmlspecialchars($optionName, ENT_QUOTES, 'UTF-8') ?>"<?= $optionName === $currentAccountName ? ' selected' : '' ?>>
									<?= htmlspecialchars($optionName, ENT_QUOTES, 'UTF-8') ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="col-12 col-md-6"></div>

					<div class="col-12 col-md-6">
						<label class="form-label task-approval-input-label">Billed Hours</label>
						<div class="row g-2">
							<div class="col-6">
								<input type="number" min="0" class="form-control text-center" value="<?= (int) $currentBilledHours ?>">
								<div class="task-approval-input-hint text-center">Hours</div>
							</div>
							<div class="col-6">
								<input type="number" min="0" max="59" class="form-control text-center" value="<?= (int) $currentBilledMinutes ?>">
								<div class="task-approval-input-hint text-center">Minutes</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6">
						<label class="form-label task-approval-input-label">Worked Hours</label>
						<div class="row g-2">
							<div class="col-6">
								<input type="number" min="0" class="form-control text-center" value="<?= (int) $currentWorkedHours ?>">
								<div class="task-approval-input-hint text-center">Hours</div>
							</div>
							<div class="col-6">
								<input type="number" min="0" max="59" class="form-control text-center" value="<?= (int) $currentWorkedMinutes ?>">
								<div class="task-approval-input-hint text-center">Minutes</div>
							</div>
						</div>
					</div>

					<div class="col-12">
						<label class="form-label task-approval-input-label" for="taskDescription-<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>">Task Description</label>
						<textarea id="taskDescription-<?= htmlspecialchars($approveModalId, ENT_QUOTES, 'UTF-8') ?>" class="form-control task-approval-description-input" rows="5" placeholder="Enter task description..."><?= htmlspecialchars($currentDescription, ENT_QUOTES, 'UTF-8') ?></textarea>
					</div>
				</div>
			</div>

			<div class="modal-footer task-approval-modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Approve Task</button>
			</div>
		</div>
	</div>
</div>
