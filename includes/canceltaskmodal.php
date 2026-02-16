   <!-- Cancel Task Modal -->
    <div class="modal fade" id="cancelTaskModal" tabindex="-1" aria-labelledby="cancelTaskModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content modal-app">
          <div class="modal-header panel-header panel-header--danger">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-x-circle"></i>
              <h5 class="modal-title fw-bold" id="cancelTaskModalLabel">Cancel Task</h5>
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
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Back</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <i class="bi bi-x-lg me-2"></i>
              Cancel Task
            </button>
          </div>
        </div>
      </div>
    </div>