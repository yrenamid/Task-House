<!-- View Task Modal (shared include) -->
<div class="modal fade" id="viewTaskModal" tabindex="-1" aria-labelledby="viewTaskModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content modal-app view-task-modal">
			<div class="modal-header panel-header panel-header--primary">
				<div class="d-flex align-items-center gap-2">
					<i class="bi bi-eye"></i>
					<h5 class="modal-title fw-bold" id="viewTaskModalLabel">View Task Details</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<div class="row g-4">
					<div class="col-12">
						<div class="view-task-label">
							<i class="bi bi-person"></i>
							<span>Client/Account</span>
						</div>
						<div class="view-task-box">—</div>
					</div>

					<div class="col-12">
						<div class="view-task-label">
							<i class="bi bi-person-check"></i>
							<span>Approver</span>
						</div>
						<div class="view-task-box">—</div>
					</div>

					<div class="col-12">
						<div class="view-task-label">
							<i class="bi bi-file-earmark-text"></i>
							<span>Task Description</span>
						</div>
						<div class="view-task-box view-task-box--desc">—</div>
					</div>

					<div class="col-12">
						<div class="view-task-label">
							<i class="bi bi-clock"></i>
							<span>Estimated Duration</span>
						</div>
						<div class="row g-3">
							<div class="col-6">
								<div class="view-task-sub">Hours</div>
								<div class="view-task-box view-task-num" data-number>—</div>
							</div>
							<div class="col-6">
								<div class="view-task-sub">Minutes</div>
								<div class="view-task-box view-task-num" data-number>—</div>
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="view-task-label">
							<i class="bi bi-check-circle"></i>
							<span>Current Status</span>
						</div>
						<div>
							<span class="task-badge task-badge--pending">
								<i class="bi bi-clock"></i>
								<span>Pending</span>
							</span>
						</div>
					</div>

					<!-- Cancellation Reason (show when status is Cancelled) -->
					<div class="col-12 d-none">
						<div class="info-box tasks-warn-box view-task-cancel">
							<div class="view-task-label text-danger">
								<i class="bi bi-x-circle"></i>
								<span>Cancellation Reason</span>
							</div>
							<div class="view-task-cancel-text">—</div>
						</div>
					</div>

					<div class="col-12">
						<div class="view-task-sub">Created On</div>
						<div class="view-task-created">—</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
