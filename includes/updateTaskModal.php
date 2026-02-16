<!-- Update Task Modal (shared include) -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content modal-app update-task-modal">
      <div class="modal-header panel-header panel-header--teal">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-pencil-square"></i>
          <h5 class="modal-title fw-bold" id="updateTaskModalLabel">Update Task</h5>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Success message -->
        <div class="alert alert-success d-none update-task-success" role="alert">
          <i class="bi bi-check-circle me-2"></i>
          Task updated successfully!
        </div>

        <form id="updateTaskForm" class="update-task-form" action="" method="post" target="updateTaskSink">
          <div class="row g-3">
            <div class="col-12">
              <label for="updAccountName" class="form-label fw-semibold">
                Client/Account <span class="text-danger">*</span>
              </label>
              <input
                id="updAccountName"
                name="accountName"
                type="text"
                class="form-control control-app"
                placeholder="Enter client or account name"
                required
              />
            </div>

            <div class="col-12">
              <label for="updApprover" class="form-label fw-semibold">
                Approver <span class="text-danger">*</span>
              </label>
              <input
                id="updApprover"
                name="approver"
                type="text"
                class="form-control control-app"
                placeholder="Enter approver name"
                required
              />
            </div>

            <div class="col-12">
              <label for="updDescription" class="form-label fw-semibold">
                Task Description <span class="text-danger">*</span>
              </label>
              <textarea
                id="updDescription"
                name="description"
                rows="4"
                class="form-control control-app update-task-textarea"
                placeholder="Enter detailed task description"
                required
              ></textarea>
            </div>

            <div class="col-12">
              <label class="form-label fw-semibold">
                Estimated Duration <span class="text-danger">*</span>
              </label>
              <div class="row g-3">
                <div class="col-6">
                  <div class="form-text update-task-help">Hours</div>
                  <input
                    id="updHours"
                    name="hours"
                    type="number"
                    min="0"
                    max="24"
                    step="1"
                    inputmode="numeric"
                    class="form-control control-app text-center"
                    placeholder="0"
                    required
                  />
                </div>
                <div class="col-6">
                  <div class="form-text update-task-help">Minutes</div>
                  <input
                    id="updMinutes"
                    name="minutes"
                    type="number"
                    min="0"
                    max="59"
                    step="1"
                    inputmode="numeric"
                    class="form-control control-app text-center"
                    placeholder="00"
                    required
                  />
                </div>
              </div>
            </div>
          </div>
        </form>

        <iframe title="update task submission" name="updateTaskSink" class="d-none"></iframe>
      </div>

      <div class="modal-footer d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-teal-app" form="updateTaskForm">
          <i class="bi bi-check-lg me-2"></i>
          Save Changes
        </button>
      </div>
    </div>
  </div>
</div>
