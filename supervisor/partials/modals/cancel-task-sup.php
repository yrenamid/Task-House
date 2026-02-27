<div class="modal fade" id="addTimeModal" tabindex="-1" aria-labelledby="addTimeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content modal-app">
			<div class="modal-header panel-header">
				<h5 class="modal-title fw-bold" id="addTimeModalLabel">Add Time</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label fw-semibold">Task Description</label>
					<input type="text" class="form-control" value="Selected task" readonly>
				</div>
				<div class="row g-3">
					<div class="col-12 col-md-6">
						<label class="form-label fw-semibold">Hours</label>
						<input type="number" class="form-control" min="0">
					</div>
					<div class="col-12 col-md-6">
						<label class="form-label fw-semibold">Minutes</label>
						<input type="number" class="form-control" min="0" max="59">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="cancelTaskSupModal" tabindex="-1" aria-labelledby="cancelTaskSupModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content modal-app">
			<div class="modal-header panel-header panel-header--danger">
				<div class="d-flex align-items-center gap-2">
					<i class="bi bi-x-circle"></i>
					<h5 class="modal-title fw-bold" id="cancelTaskSupModalLabel">Cancel Task</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="info-box tasks-warn-box mb-3">
					<div class="fw-semibold">This action cannot be undone.</div>
					<div class="small app-muted mt-1">Please provide a reason for cancellation.</div>
				</div>

				<label class="form-label fw-semibold app-muted">Reason</label>
				<textarea rows="5" class="form-control control-app" placeholder="Enter cancellation reason..."></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Confirm Cancel</button>
			</div>
		</div>
	</div>
</div>
