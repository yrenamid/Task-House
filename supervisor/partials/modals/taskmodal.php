<?php


if (!isset($task) || !isset($modalId)) {
	return;
}

$taskId = htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
$taskDescription = htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8');
$taskAccountName = htmlspecialchars((string) ($task['accountName'] ?? ($task['accountId'] ?? $task['description'] ?? '')), ENT_QUOTES, 'UTF-8');
$taskDelegator = htmlspecialchars($task['delegator'] ?? ($task['approvedBy'] ?? 'N/A'), ENT_QUOTES, 'UTF-8');
$taskDoer = htmlspecialchars($task['doer'] ?? 'Not assigned', ENT_QUOTES, 'UTF-8');
$taskStatus = htmlspecialchars($task['status'] ?? 'Complete', ENT_QUOTES, 'UTF-8');
$taskHours = (int)($task['hoursLeft'] ?? 0);
$taskInstructions = htmlspecialchars($task['instructions'] ?? '', ENT_QUOTES, 'UTF-8');
$taskNotes = htmlspecialchars($task['notes'] ?? 'No notes available', ENT_QUOTES, 'UTF-8');
$taskAttachments = $task['attachments'] ?? [];
$taskHistory = $task['history'] ?? [];
$fullDescription = htmlspecialchars($task['fullDescription'] ?? $task['description'], ENT_QUOTES, 'UTF-8');

$isCompletedTask = isset($task['approvedDate']);
$approvedBy = htmlspecialchars($task['approvedBy'] ?? '', ENT_QUOTES, 'UTF-8');
$workedHours = (int)($task['workedHours'] ?? 0);

$taskModalMode = $taskModalMode ?? 'edit';
$isEditable = $taskModalMode === 'edit';

$getStatusBadgeClass = function($status) {
	return match($status) {
		'Complete' => 'task-modal-badge-complete',
		'Working' => 'task-modal-badge-working',
		'For Approval' => 'task-modal-badge-approval',
		'Cancelled' => 'task-modal-badge-cancelled',
		default => 'task-modal-badge-default',
	};
};

$statusBadgeClass = $getStatusBadgeClass($task['status'] ?? 'Complete');

// Format date helper
$formatDate = function($dateString) {
	$timestamp = strtotime($dateString);
	if ($timestamp === false) {
		return $dateString;
	}
	return date('M d, Y h:i A', $timestamp);
};
?>

<div class="modal fade" id="<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content task-modal-content">
			<!-- Modal Header -->
			<div class="modal-header task-modal-header">
				<div class="flex-grow-1">
						<h5 class="modal-title task-modal-title"><?= $taskAccountName ?></h5>
					<p class="task-modal-id">Task ID: <span><?= $taskId ?></span></p>
				</div>
				<?php if (!$isCompletedTask): ?>
					<span class="badge <?= $statusBadgeClass ?> ms-3">
						<?= $taskStatus ?>
					</span>
				<?php endif; ?>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<!-- Modal Tabs Navigation -->
			<ul class="nav nav-tabs task-modal-tabs" role="tablist">
				<li class="nav-item" role="presentation">
					<button
						class="nav-link task-modal-tab-btn active"
						id="tab-description-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						data-bs-toggle="tab"
						data-bs-target="#content-description-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						type="button"
						role="tab"
						aria-selected="true"
					>
						Description
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button
						class="nav-link task-modal-tab-btn"
						id="tab-instructions-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						data-bs-toggle="tab"
						data-bs-target="#content-instructions-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						type="button"
						role="tab"
						aria-selected="false"
					>
						Instructions
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button
						class="nav-link task-modal-tab-btn"
						id="tab-attachments-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						data-bs-toggle="tab"
						data-bs-target="#content-attachments-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						type="button"
						role="tab"
						aria-selected="false"
					>
						Attachments
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button
						class="nav-link task-modal-tab-btn"
						id="tab-notes-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						data-bs-toggle="tab"
						data-bs-target="#content-notes-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						type="button"
						role="tab"
						aria-selected="false"
					>
						Notes
					</button>
				</li>
				<li class="nav-item" role="presentation">
					<button
						class="nav-link task-modal-tab-btn"
						id="tab-history-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						data-bs-toggle="tab"
						data-bs-target="#content-history-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						type="button"
						role="tab"
						aria-selected="false"
					>
						History
					</button>
				</li>
			</ul>

			<!-- Modal Body with Tab Content -->
			<div class="modal-body task-modal-body">
				<div class="tab-content task-modal-tab-content">
					<!-- Description Tab -->
					<div
						class="tab-pane fade show active"
						id="content-description-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						role="tabpanel"
					>
						<div class="task-modal-section">
							<div class="d-flex justify-content-between align-items-start gap-2 mb-2">
								<h6 class="task-modal-section-title mb-0">Full Description</h6>
								<?php if ($isEditable): ?>
									<button
										type="button"
										class="btn btn-sm btn-outline-primary"
										data-bs-toggle="collapse"
										data-bs-target=".desc-toggle-<?= $taskId ?>"
									>
										Edit
									</button>
								<?php endif; ?>
							</div>
							<div class="task-modal-description-box">
								<div class="collapse show desc-toggle-<?= $taskId ?>" id="descView-<?= $taskId ?>">
									<div class="border rounded p-3 bg-light text-wrap text-break">
										<?= htmlspecialchars($task['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>
									</div>
								</div>
								<?php if ($isEditable): ?>
									<div class="collapse desc-toggle-<?= $taskId ?>" id="descEdit-<?= $taskId ?>">
										<div class="mb-3">
											<textarea class="form-control w-100" id="descTextarea-<?= $taskId ?>" rows="4"><?= htmlspecialchars_decode($fullDescription, ENT_QUOTES) ?></textarea>
										</div>
										<div class="d-flex gap-2 mt-2">
											<button
												type="button"
												class="btn btn-sm btn-primary"
												data-bs-toggle="collapse"
												data-bs-target=".desc-toggle-<?= $taskId ?>"
											>
												Save
											</button>
											<button
												type="button"
												class="btn btn-sm btn-outline-secondary"
												data-bs-toggle="collapse"
												data-bs-target=".desc-toggle-<?= $taskId ?>"
											>
												Cancel
											</button>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="row g-3 task-modal-details-grid">
							<div class="col-12 col-sm-6">
								<div class="task-modal-field-card">
									<label class="task-modal-field-label">Delegator</label>
									<p class="task-modal-field-value">
										<?= $isCompletedTask ? $approvedBy : $taskDelegator ?>
									</p>
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="task-modal-field-card">
									<label class="task-modal-field-label">Doer</label>
									<p class="task-modal-field-value">
										<?= $task['doer'] === null ? '<span class="text-muted">Not assigned</span>' : $taskDoer ?>
									</p>
								</div>
							</div>
							<?php if (!$isCompletedTask): ?>
								<div class="col-12 col-sm-6">
									<div class="task-modal-field-card">
										<label class="task-modal-field-label">Hours Left</label>
										<p class="task-modal-field-value task-modal-field-value-accent">
											<?= $taskHours ?> hours
										</p>
									</div>
								</div>
							<?php else: ?>
								<div class="col-12 col-sm-6">
									<div class="task-modal-field-card">
										<label class="task-modal-field-label">Worked Hours</label>
										<p class="task-modal-field-value task-modal-field-value-accent">
											<?= $workedHours ?> hours
										</p>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- Instructions Tab -->
					<div
						class="tab-pane fade"
						id="content-instructions-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						role="tabpanel"
					>
						<div class="task-modal-section">
							<div class="task-modal-instructions-box">
								<div class="task-modal-instructions-header">
									<i class="bi bi-file-text me-2" aria-hidden="true"></i>
									<h6 class="mb-0">
										<?= $isCompletedTask ? 'Original Instructions' : 'Supervisor Instructions' ?>
									</h6>
								</div>
								<div class="task-modal-instructions-content">
									<?php if ($isCompletedTask): ?>
										<p class="text-muted mb-0">Instructions are only available for active tasks.</p>
									<?php else: ?>
										<?php if ($isEditable): ?>
											<button
												type="button"
												class="btn btn-sm btn-outline-success mb-3"
												data-bs-toggle="collapse"
												data-bs-target="#instructionForm-<?= $taskId ?>"
											>
												<i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
												Add Instruction
											</button>
											<div id="instructionForm-<?= $taskId ?>" class="collapse mb-3">
												<textarea
													class="form-control mb-2"
													id="instructionTextarea-<?= $taskId ?>"
													rows="3"
													placeholder="Add instruction..."
												></textarea>
												<button
													type="button"
													class="btn btn-sm btn-primary"
													data-bs-toggle="collapse"
													data-bs-target="#instructionForm-<?= $taskId ?>,#instructionPreview-<?= $taskId ?>"
												>
													Save Instruction
												</button>
											</div>
										<?php endif; ?>
										<div id="instructionList-<?= $taskId ?>" class="d-grid gap-2">
											<?php if (trim($taskInstructions) !== ''): ?>
												<div class="border rounded p-3 bg-white">
													<?= nl2br($taskInstructions) ?>
												</div>
											<?php else: ?>
												<p class="text-muted mb-0">No instructions available.</p>
											<?php endif; ?>
											<div class="collapse" id="instructionPreview-<?= $taskId ?>">
												<div class="border rounded p-3 bg-white">
													New instruction added (preview)
												</div>
											</div>
										</div>
										<?php if ($isEditable): ?>
											<div class="task-modal-instructions-footer">
												<p class="text-muted mb-0">
													<i class="bi bi-info-circle me-2" aria-hidden="true"></i>
													Only supervisors can edit these instructions
												</p>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Attachments Tab -->
					<div
						class="tab-pane fade"
						id="content-attachments-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						role="tabpanel"
					>
						<div class="task-modal-section">
							<?php if ($isEditable): ?>
								<button
									type="button"
									class="btn btn-sm btn-outline-secondary mb-3"
									data-bs-toggle="collapse"
									data-bs-target="#attachmentForm-<?= $taskId ?>"
								>
									<i class="bi bi-paperclip me-2" aria-hidden="true"></i>
									Add Attachment
								</button>
								<div id="attachmentForm-<?= $taskId ?>" class="collapse mb-3">
									<input
										type="file"
										class="form-control mb-2"
										id="attachmentInput-<?= $taskId ?>"
									>
									<button
										type="button"
										class="btn btn-sm btn-primary"
										data-bs-toggle="collapse"
										data-bs-target="#attachmentForm-<?= $taskId ?>,#attachmentPreview-<?= $taskId ?>"
									>
										Upload
									</button>
								</div>
							<?php endif; ?>
							<div id="attachmentList-<?= $taskId ?>">
								<?php if (!empty($taskAttachments) && count($taskAttachments) > 0): ?>
									<div class="task-modal-attachments-list">
										<?php foreach ($taskAttachments as $index => $attachment): ?>
											<div class="task-modal-attachment-item">
												<div class="task-modal-attachment-icon">
													<i class="bi bi-paperclip" aria-hidden="true"></i>
												</div>
												<span class="task-modal-attachment-name">
													<?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?>
												</span>
												<span class="task-modal-attachment-action">View</span>
											</div>
										<?php endforeach; ?>
									</div>
								<?php else: ?>
									<div class="task-modal-empty-state">
										<div class="task-modal-empty-icon">
											<i class="bi bi-paperclip" aria-hidden="true"></i>
										</div>
										<p class="task-modal-empty-text">No attachments</p>
									</div>
								<?php endif; ?>
								<div class="collapse" id="attachmentPreview-<?= $taskId ?>">
									<div class="task-modal-attachment-item">
										<div class="task-modal-attachment-icon">
											<i class="bi bi-paperclip" aria-hidden="true"></i>
										</div>
										<span class="task-modal-attachment-name">New attachment (preview)</span>
										<span class="task-modal-attachment-action">View</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Notes Tab -->
					<div
						class="tab-pane fade"
						id="content-notes-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						role="tabpanel"
					>
						<div class="task-modal-section">
							<div class="task-modal-notes-box">
								<h6 class="task-modal-notes-title">Task Notes</h6>
								<div class="mb-3">
									<textarea class="form-control w-100 text-start" rows="4" <?= $isEditable ? '' : 'readonly' ?>><?= htmlspecialchars_decode($taskNotes, ENT_QUOTES) ?></textarea>
								</div>
							</div>
						</div>
					</div>

					<!-- History Tab -->
					<div
						class="tab-pane fade"
						id="content-history-<?= htmlspecialchars($taskId, ENT_QUOTES, 'UTF-8') ?>"
						role="tabpanel"
					>
						<div class="task-modal-section">
							<?php if (!$isCompletedTask && !empty($taskHistory) && count($taskHistory) > 0): ?>
								<div class="task-modal-timeline">
									<?php foreach ($taskHistory as $index => $entry): ?>
										<div class="task-modal-timeline-item">
											<div class="task-modal-timeline-dot"></div>
											<div class="task-modal-timeline-content">
												<div class="task-modal-history-card">
													<div class="task-modal-history-action">
														<?= htmlspecialchars($entry['action'], ENT_QUOTES, 'UTF-8') ?>
													</div>
													<div class="task-modal-history-user">
														by <?= htmlspecialchars($entry['user'], ENT_QUOTES, 'UTF-8') ?>
													</div>
													<div class="task-modal-history-timestamp">
														<?= htmlspecialchars($formatDate($entry['timestamp']), ENT_QUOTES, 'UTF-8') ?>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php else: ?>
								<div class="task-modal-empty-state">
									<p class="task-modal-empty-text">No history available</p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer task-modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<?php if ($isEditable): ?>
					<button type="button" class="btn btn-primary">Save Changes</button>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
