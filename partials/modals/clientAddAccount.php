<div class="modal fade" id="clientAddAccountModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content clients-modal-content" data-bs-theme="dark">
      <div class="modal-header clients-modal-header border-0">
        <div>
          <h2 class="modal-title clients-modal-title">Add Account</h2>
          <p class="clients-modal-subtitle mb-0">Creating an account for <?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body clients-modal-body">
        <form>
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label clients-modal-label">Account Name</label>
              <input type="text" class="form-control clients-modal-input" placeholder="Enter account name">
            </div>

            <div class="col-12 col-md-6">
              <label for="clientAccountHours" class="form-label clients-modal-label">Hours</label>
              <input type="number" id="clientAccountHours" class="form-control clients-modal-input" min="0" placeholder="0">
            </div>

            <div class="col-12 col-md-6">
              <label for="clientAccountMinutes" class="form-label clients-modal-label">Minutes</label>
              <input type="number" id="clientAccountMinutes" class="form-control clients-modal-input" min="0" max="59" placeholder="0">
            </div>

            <div class="col-12">
              <span class="form-label d-block clients-modal-label mb-2">Billing Type</span>
              <div class="d-flex flex-wrap gap-3 clients-billing-options">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="clientBillingType-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingPayment-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" checked>
                  <label class="form-check-label" for="clientBillingPayment-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">Payment</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="clientBillingType-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingCredit-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">
                  <label class="form-check-label" for="clientBillingCredit-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">Credit</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="clientBillingType-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" id="clientBillingFreeHours-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">
                  <label class="form-check-label" for="clientBillingFreeHours-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">Free Hours</label>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label for="clientHourlyRate" class="form-label clients-modal-label">Hourly Rate</label>
              <input type="number" id="clientHourlyRate" class="form-control clients-modal-input" min="0" step="0.01" placeholder="0.00">
            </div>

            <div class="col-12 col-md-6">
              <label for="clientGrossRevenue" class="form-label clients-modal-label">Gross Revenue</label>
              <input type="number" id="clientGrossRevenue" class="form-control clients-modal-input" min="0" step="0.01" placeholder="0.00">
            </div>

            <div class="col-12">
              <label class="form-label clients-modal-label">Manager</label>
              <select class="form-select clients-modal-input" name="clientAccountManager-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">
                <option selected disabled>Select a manager</option>
                <?php foreach ($clientManagerOptions as $managerOption): ?>
                  <option value="<?= htmlspecialchars($managerOption, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($managerOption, ENT_QUOTES, 'UTF-8') ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer clients-modal-footer border-0">
        <button type="button" class="clients-btn-teal" data-bs-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>