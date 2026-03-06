<div class="modal fade" id="addVaModal" tabindex="-1" aria-labelledby="addVaModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addVaModalLabel">Add Virtual Assistant</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<input
						type="text"
						class="form-control"
						placeholder="Search Virtual Assistants..."
						aria-label="Search available Virtual Assistants"
					>
				</div>

				<div class="va-modal-list">
					<?php if (empty($unassignedVAs)): ?>
						<div class="alert alert-info mb-0" role="alert">
							<i class="bi bi-info-circle me-2" aria-hidden="true"></i>
							All Virtual Assistants are already assigned to this account.
						</div>
					<?php else: ?>
						<div class="list-group list-group-flush">
							<?php foreach ($unassignedVAs as $unassignedVA): ?>
								<?php
								$unassignedVAId = htmlspecialchars($unassignedVA['id'], ENT_QUOTES, 'UTF-8');
								$unassignedVAName = htmlspecialchars($unassignedVA['name'], ENT_QUOTES, 'UTF-8');
								$unassignedVAEmail = htmlspecialchars($unassignedVA['email'] ?? 'no-email@example.com', ENT_QUOTES, 'UTF-8');
								?>
								<div class="list-group-item va-modal-row">
									<div class="d-flex justify-content-between align-items-center gap-3">
										<div class="min-w-0">
											<div class="va-modal-name"><?= $unassignedVAName ?></div>
											<small class="va-modal-email text-muted"><?= $unassignedVAEmail ?></small>
										</div>
										<button
											type="button"
											class="btn btn-sm btn-success flex-shrink-0"
											title="Add <?= $unassignedVAName ?> to this account"
										>
											<i class="bi bi-plus-circle me-1" aria-hidden="true"></i>
											Add
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>