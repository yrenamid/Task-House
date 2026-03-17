<div class="modal fade" id="clientAddHoursModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content clients-modal-content">
      <div class="modal-header clients-modal-header border-0">
        <h2 class="modal-title clients-modal-title">Add Hours</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body clients-modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label clients-modal-label">Account name</label>
            <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?>" readonly>
          </div>

          <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
              <label class="form-label clients-modal-label">Hours</label>
              <input type="number" class="form-control clients-modal-input" min="0" placeholder="0">
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label clients-modal-label">Minutes</label>
              <input type="number" class="form-control clients-modal-input" min="0" max="59" placeholder="00">
            </div>
          </div>

          <fieldset class="mb-3">
            <legend class="form-label clients-modal-label mb-2">Billing Type</legend>
            <div class="d-flex flex-wrap gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="clientAddHoursBillingType-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingTypePayment-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" checked>
                <label class="form-check-label" for="clientBillingTypePayment-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">Payment</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="clientAddHoursBillingType-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingTypeCredit-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">
                <label class="form-check-label" for="clientBillingTypeCredit-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">Credit</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="clientAddHoursBillingType-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingTypeFreeHours-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">
                <label class="form-check-label" for="clientBillingTypeFreeHours-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">Free Hours</label>
              </div>
            </div>
          </fieldset>

          <div class="mb-3">
            <label class="form-label clients-modal-label d-block">Set Balance Alert</label>
            <div class="row g-3">
              <div class="col-12 col-md-6">
                <input type="number" class="form-control clients-modal-input" min="0" placeholder="0">
              </div>
              <div class="col-12 col-md-6">
                <input type="number" class="form-control clients-modal-input" min="0" max="59" placeholder="00">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label clients-modal-label">Hourly Rate</label>
            <input type="number" class="form-control clients-modal-input" min="0" step="0.01" placeholder="10.00">
          </div>

          <div class="mb-3">
            <label class="form-label clients-modal-label">Gross Revenue</label>
            <input type="text" class="form-control clients-modal-input" placeholder="Gross Revenue" readonly>
          </div>

          <div>
            <label class="form-label clients-modal-label">Notes</label>
            <textarea class="form-control clients-modal-input clients-modal-textarea" rows="4" placeholder="Write notes..."></textarea>
          </div>
        </form>
      </div>

      <div class="modal-footer clients-modal-footer border-0">
        <button type="button" class="btn btn-outline-light clients-modal-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="clients-btn-teal">Save</button>
      </div>
    </div>
  </div>
</div>
