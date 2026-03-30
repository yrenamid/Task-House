<div class="modal fade sales-modal" id="salesNotesModal" tabindex="-1" aria-labelledby="salesNotesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content sales-modal-content">
      <div class="modal-header sales-modal-header">
        <h2 class="modal-title sales-modal-title" id="salesNotesModalLabel">John Smith - Notes</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body sales-modal-body">
        <div class="row g-3 mb-3">
          <div class="col-12 col-md-6"><label class="form-label sales-label">Client Name</label><div class="sales-readonly">John Smith</div></div>
          <div class="col-12 col-md-6"><label class="form-label sales-label">Phone</label><div class="sales-readonly">(555) 123-4567</div></div>
          <div class="col-12 col-md-6"><label class="form-label sales-label">Business Name</label><div class="sales-readonly">Tech Solutions Inc</div></div>
          <div class="col-12 col-md-6"><label class="form-label sales-label">State</label><div class="sales-readonly">California</div></div>
          <div class="col-12 col-md-6"><label class="form-label sales-label">Email</label><div class="sales-readonly">john.smith@techsolutions.com</div></div>
          <div class="col-12 col-md-6"><label class="form-label sales-label">Website</label><div class="sales-readonly">www.techsolutions.com</div></div>
        </div>

        <div class="mb-3">
          <label class="form-label sales-label" for="salesStatus">Status</label>
          <select id="salesStatus" class="form-select sales-control">
            <option selected>New Lead</option>
            <option>Initial Contact</option>
            <option>Interview Set</option>
            <option>Proposal Sent</option>
            <option>Closed Won</option>
            <option>Closed Lost</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label sales-label" for="salesAddNote">Add Note</label>
          <textarea id="salesAddNote" rows="3" class="form-control sales-control" placeholder="Enter your note..."></textarea>
          <button type="button" class="btn sales-btn sales-btn-primary mt-2">Add Note</button>
        </div>

        <div>
          <label class="form-label sales-label">Note History</label>
          <div class="sales-note-history">
            <div class="sales-note-item">
              <p class="mb-1">Initial contact made via email</p>
              <small>03/20/2026 10:30 AM</small>
            </div>
            <div class="sales-note-item">
              <p class="mb-1">Interested in enterprise solution. Follow up next week.</p>
              <small>03/25/2026 02:15 PM</small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer sales-modal-footer">
        <button type="button" class="btn sales-btn sales-btn-primary">Save</button>
        <button type="button" class="btn sales-btn sales-btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
