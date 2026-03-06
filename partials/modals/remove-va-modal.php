<?php
if (!isset($modalId, $vaName, $va) || !is_array($va)) {
	return;
}
?>
<div class="modal fade" id="<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-labelledby="<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>Label">Remove Virtual Assistant</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Are you sure you want to remove <strong><?= $vaName ?></strong> from this account?
				This action cannot be undone and will unassign all their pending tasks.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<form method="post" style="display:inline;">
					<input type="hidden" name="vaId" value="<?= htmlspecialchars($va['id'], ENT_QUOTES, 'UTF-8') ?>">
					<button type="submit" name="action" value="removeVa" class="btn btn-danger">
						Remove VA
					</button>
				</form>
			</div>
		</div>
	</div>
</div>