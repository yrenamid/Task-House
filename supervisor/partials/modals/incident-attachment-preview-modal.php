<?php
if (!isset($attachmentModalId, $incidentId, $attachment) || $attachment === '') {
	return;
}
?>
<div class="modal fade" id="<?= htmlspecialchars($attachmentModalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title fs-5">Attachment Preview · <?= htmlspecialchars($incidentId, ENT_QUOTES, 'UTF-8') ?></h2>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
				<img src="<?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?>" alt="Attachment preview for <?= htmlspecialchars($incidentId, ENT_QUOTES, 'UTF-8') ?>" class="img-fluid rounded incident-preview-image">
			</div>
		</div>
	</div>
</div>