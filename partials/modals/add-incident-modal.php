<div class="modal fade" id="addIncidentModal" tabindex="-1" aria-labelledby="addIncidentModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg incident-modal-dialog">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h2 class="modal-title fs-5" id="addIncidentModalLabel">Add Incident</h2>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body incident-modal-body">
					<div class="row g-3">
						<div class="col-12">
							<label for="notificationDate" class="form-label">Notification Date</label>
							<input
								type="date"
								class="form-control"
								id="notificationDate"
								name="notificationDate"
								value="<?= htmlspecialchars($formData['notificationDate'], ENT_QUOTES, 'UTF-8') ?>"
								required
							>
						</div>

						<div class="col-12">
							<label for="incidentDate" class="form-label">Incident Date</label>
							<input
								type="date"
								class="form-control"
								id="incidentDate"
								name="incidentDate"
								value="<?= htmlspecialchars($formData['incidentDate'], ENT_QUOTES, 'UTF-8') ?>"
								required
							>
						</div>

						<div class="col-12">
							<label for="employee" class="form-label">Employee Name</label>
							<select class="form-select" id="employee" name="employee" required>
								<option value="">Select employee</option>
								<?php foreach ($employeeOptions as $employeeName): ?>
									<option value="<?= htmlspecialchars((string) $employeeName, ENT_QUOTES, 'UTF-8') ?>" <?= $formData['employee'] === $employeeName ? 'selected' : '' ?>>
										<?= htmlspecialchars((string) $employeeName, ENT_QUOTES, 'UTF-8') ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="col-12">
							<label for="category" class="form-label">Category</label>
							<select class="form-select" id="category" name="category" required>
								<option value="">Select category</option>
								<?php foreach ($categoryList as $category): ?>
									<option value="<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>" <?= $formData['category'] === $category ? 'selected' : '' ?>>
										<?= htmlspecialchars($category, ENT_QUOTES, 'UTF-8') ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="col-12">
							<label for="reason" class="form-label">Reason</label>
							<select class="form-select" id="reason" name="reason" required>
								<option value="">Select reason</option>
								<?php foreach ($reasonList as $reason): ?>
									<option value="<?= htmlspecialchars($reason, ENT_QUOTES, 'UTF-8') ?>" <?= $formData['reason'] === $reason ? 'selected' : '' ?>>
										<?= htmlspecialchars($reason, ENT_QUOTES, 'UTF-8') ?>
									</option>
								<?php endforeach; ?>
							</select>
						</div>

						<?php if ($formData['reason'] === 'Other'): ?>
							<div class="col-12">
								<label for="otherReason" class="form-label">Specify Reason</label>
								<input
									type="text"
									class="form-control"
									id="otherReason"
									name="otherReason"
									placeholder="Enter specific reason"
									value="<?= htmlspecialchars($formData['otherReason'], ENT_QUOTES, 'UTF-8') ?>"
									required
								>
							</div>
						<?php endif; ?>

						<div class="col-12">
							<label for="attachment" class="form-label">Attachment</label>
							<input type="file" class="form-control" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg">
							<div class="form-text">PDF, DOC, or image files</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn incident-submit-btn">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>