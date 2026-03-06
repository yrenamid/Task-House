<?php
if (!isset($approvalTask, $doOverModalId)) {
	return;
}

$taskId = (string) ($approvalTask['id'] ?? '');
$taskDoer = (string) ($approvalTask['doer'] ?? 'the assigned doer');
?>
<div class="modal fade" id="<?= htmlspecialchars($doOverModalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-labelledby="<?= htmlspecialchars($doOverModalId, ENT_QUOTES, 'UTF-8') ?>Label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content task-approval-modal task-approval-modal-do-over">
			<div class="modal-header">
				<div>
					<h5 class="modal-title" id="<?= htmlspecialchars($doOverModalId, ENT_QUOTES, 'UTF-8') ?>Label">Request Do Over</h5>
					<p class="mb-0 task-approval-modal-subtitle">Provide a reason for requesting this task to be redone</p>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form method="post" action="#">
				<div class="modal-body">
					<label for="doOverReason-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>" class="form-label task-approval-input-label">
						Reason for Do Over <span class="task-approval-required">*</span>
					</label>
					<textarea
						id="doOverReason-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						class="form-control task-approval-do-over-textarea"
						name="do_over_reason"
						placeholder="Explain what needs to be corrected or improved..."
						required
					></textarea>
					
				</div>

				<div class="modal-footer task-approval-modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Submit Do Over</button>
				</div>
			</form>
		</div>
	</div>
</div>
