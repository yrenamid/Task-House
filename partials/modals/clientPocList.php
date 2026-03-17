<div class="modal fade" id="clientPocListModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content clients-modal-content">
      <div class="modal-header clients-modal-header border-0">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 w-100">
          <div class="modal-header-text">
            <h5 class="modal-title clients-modal-title mb-0">POC List</h5>
            <small class="clients-modal-subtitle"><?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?></small>
          </div>
          <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-success btn-sm d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#clientAddPocModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>">
              <i class="bi bi-plus-lg" aria-hidden="true"></i>
              <span>Add POC</span>
            </button>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <div class="modal-body clients-modal-body">
        <div class="clients-search-wrap mb-4">
          <i class="bi bi-search clients-search-icon" aria-hidden="true"></i>
          <input type="text" class="form-control clients-search-input" placeholder="Search POC..." aria-label="Search point of contacts" />
        </div>
        <div class="clients-modal-table-wrap table-responsive">
          <table class="clients-table clients-modal-table mb-0">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col" class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($accountPocs)): ?>
                <tr><td colspan="2" class="clients-modal-empty">No contacts found</td></tr>
              <?php else: ?>
                <?php foreach ($accountPocs as $poc): ?>
                  <tr>
                    <td><?= htmlspecialchars($poc['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="text-end">
                      <button type="button" class="clients-icon-btn clients-icon-btn-danger" data-bs-toggle="modal" data-bs-target="#clientPocDeleteModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>-<?= htmlspecialchars((string) $poc['id'], ENT_QUOTES, 'UTF-8') ?>" aria-label="Delete contact">
                        <i class="bi bi-trash3" aria-hidden="true"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="clientAddPocModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content clients-modal-content">
      <div class="modal-header clients-modal-header border-0 d-flex justify-content-between align-items-start flex-wrap gap-2">
        <div class="modal-header-text">
          <h2 class="modal-title clients-modal-title mb-0">Add POC</h2>
          <p class="clients-modal-subtitle mb-0">Select an employee to add as POC</p>
        </div>
        <div class="d-flex align-items-center gap-2 ms-auto flex-shrink-0">
          <button type="button" class="clients-btn-outline btn-sm" data-bs-toggle="modal" data-bs-target="#clientPocListModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" data-bs-dismiss="modal">
            <i class="bi bi-arrow-left" aria-hidden="true"></i>
            Back
          </button>
          <button type="button" class="btn-close btn-close-white mt-1" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>
      <div class="modal-body clients-modal-body">
        <div class="clients-search-wrap mb-3">
          <i class="bi bi-search clients-search-icon" aria-hidden="true"></i>
          <input type="text" class="form-control clients-search-input" placeholder="Search employee..." aria-label="Search employees" />
        </div>
        <div class="clients-modal-table-wrap table-responsive">
          <table class="clients-table clients-modal-table mb-0">
            <thead>
              <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">Department</th>
                <th scope="col" class="text-end">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>James Anderson</td><td>Operations</td><td class="text-end"><button type="button" class="clients-btn-outline">Add</button></td></tr>
              <tr><td>Patricia Martinez</td><td>Client Services</td><td class="text-end"><button type="button" class="clients-btn-outline">Add</button></td></tr>
              <tr><td>Christopher Davis</td><td>Support</td><td class="text-end"><button type="button" class="clients-btn-outline">Add</button></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php foreach ($accountPocs as $poc): ?>
  <div class="modal fade" id="clientPocDeleteModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>-<?= htmlspecialchars((string) $poc['id'], ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content clients-modal-content clients-warning-modal-content">
        <div class="modal-body clients-modal-body clients-warning-modal-body">
          <div class="clients-warning-icon-wrap" aria-hidden="true">
            <i class="bi bi-exclamation-lg"></i>
          </div>
          <h2 class="clients-warning-title">Delete this point of contact?</h2>
          <p class="clients-warning-subtitle mb-4"><?= htmlspecialchars($poc['name'], ENT_QUOTES, 'UTF-8') ?></p>
          <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
            <button type="button" class="btn btn-danger clients-warning-btn" data-bs-dismiss="modal">Delete</button>
            <button type="button" class="btn btn-outline-light clients-warning-btn" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
