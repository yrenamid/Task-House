<div class="modal fade task-modal" id="adminAddReportModal" tabindex="-1" aria-labelledby="adminAddReportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content task-modal-content">
      <div class="modal-header task-modal-header">
        <h2 class="modal-title task-modal-title" id="adminAddReportModalLabel">Add New Report</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body task-modal-body">
        <div class="row g-3">
          <div class="col-12">
            <label class="form-label task-control-label" for="modalReportDate">Date</label>
            <input id="modalReportDate" type="date" class="form-control task-control-input" />
          </div>
          <div class="col-12">
            <label class="form-label task-control-label" for="modalReportAccount">Account Name</label>
            <select id="modalReportAccount" class="form-select task-control-input">
              <option selected>Select account...</option>
              <?php foreach ($adminAccountName as $account): ?>
                <option><?php echo htmlspecialchars($account); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-12">
            <label class="form-label task-control-label" for="modalTaskDescription">Task Description</label>
            <textarea id="modalTaskDescription" class="form-control task-control-input" rows="4" placeholder="Describe the tasks completed..."></textarea>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label task-control-label" for="modalTaskDoer">Doer</label>
            <select id="modalTaskDoer" class="form-select task-control-input">
              <option selected>Select doer...</option>
              <option>Sarah Johnson</option>
              <option>Michael Chen</option>
              <option>Emily Rodriguez</option>
              <option>David Kim</option>
              <option>Jessica Williams</option>
              <option>Robert Taylor</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label task-control-label" for="modalTaskApprover">Approver</label>
            <select id="modalTaskApprover" class="form-select task-control-input">
              <option selected>Select approver...</option>
              <option>Michael Chen</option>
              <option>Emily Rodriguez</option>
              <option>Robert Taylor</option>
              <option>Jennifer Wilson</option>
              <option>Amanda Martinez</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label task-control-label" for="modalTaskHours">Hours</label>
            <input id="modalTaskHours" type="number" class="form-control task-control-input" placeholder="0" min="0" max="24" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label task-control-label" for="modalTaskMinutes">Minutes</label>
            <input id="modalTaskMinutes" type="number" class="form-control task-control-input" placeholder="0" min="0" max="59" />
          </div>
        </div>
      </div>
      <div class="modal-footer task-modal-footer">
        <button type="button" class="btn task-btn task-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn task-btn task-btn-primary">Submit Report</button>
      </div>
    </div>
  </div>
</div>
