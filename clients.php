<?php
require __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'clients';
$additionalStylesheets = ['css/admin.css'];
$currentNoteAuthor = 'John Daniels';
$defaultClientId = $clients[0]['id'] ?? '';

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main clients-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-4">
    <div class="mb-4">
      <h1 class="clients-page-title mb-2">Clients</h1>
      <p class="clients-page-meta mb-0">Manage clients, accounts, and points of contact.</p>
    </div>

    <div class="row g-4 align-items-start">
      <div class="col-12 col-lg-3">
        <div class="clients-panel p-3 p-xl-4">
          <div class="clients-search-wrap mb-3">
            <i class="bi bi-search clients-search-icon" aria-hidden="true"></i>
            <input
              type="text"
              class="form-control clients-search-input"
              placeholder="Search client..."
              aria-label="Search clients"
            />
          </div>

          <div class="clients-list" id="clientList" role="tablist" aria-label="Client list">
            <?php foreach ($clients as $client): ?>
              <?php
              $isActiveClient = $client['id'] === $defaultClientId;
              ?>
              <button
                type="button"
                class="clients-list-item<?= $isActiveClient ? ' active' : '' ?>"
                id="client-tab-<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8') ?>"
                data-bs-toggle="pill"
                data-bs-target="#client-pane-<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8') ?>"
                role="tab"
                aria-controls="client-pane-<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8') ?>"
                aria-selected="<?= $isActiveClient ? 'true' : 'false' ?>"
              >
                <span class="clients-list-row">
                  <span class="clients-list-name"><?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?></span>
                </span>
                <span class="clients-list-arrow" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-9">
        <div class="tab-content clients-tab-content" id="clientContent">
          <?php foreach ($clients as $client): ?>
            <?php
            $clientId = (string) $client['id'];
            $accountsForClient = $clientAccounts[$clientId] ?? [];
            $notesForClient = $clientNotes[$clientId] ?? [];
            $isActivePane = $clientId === $defaultClientId;
            ?>
            <section
              class="tab-pane fade<?= $isActivePane ? ' show active' : '' ?>"
              id="client-pane-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
              role="tabpanel"
              aria-labelledby="client-tab-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
              tabindex="0"
              data-client-pane="<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
            >
              <div class="d-flex flex-column gap-4">
                <div class="clients-card">
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                    <h2 class="clients-card-title">Client Information</h2>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <?php
                      $clientNameParts = preg_split('/\s+/', trim((string) $client['name'])) ?: [''];
                      $clientFirstName = $clientNameParts[0] ?? '';
                      $clientLastName = count($clientNameParts) > 1 ? implode(' ', array_slice($clientNameParts, 1)) : '';
                      ?>
                      <button
                        type="button"
                        class="clients-btn-outline"
                        data-bs-toggle="modal"
                        data-bs-target="#clientEditModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
                      >
                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                        Edit
                      </button>
                    </div>
                  </div>

                  <div class="row g-4">
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">Client Name</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">Business Name</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['businessName'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">Website</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['website'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">Telephone</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['telephone'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">Email</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['email'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                      <span class="clients-info-label">State</span>
                      <p class="clients-info-value"><?= htmlspecialchars($client['state'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                  </div>
                </div>

                <div class="clients-card clients-notes-card">
                  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                    <h2 class="clients-card-title">Client Notes</h2>
                    <button
                      type="button"
                      class="clients-btn-teal"
                      data-bs-toggle="modal"
                      data-bs-target="#clientAddNoteModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
                    >
                      <i class="bi bi-plus-lg" aria-hidden="true"></i>
                      Add Note
                    </button>
                  </div>

                  <div class="clients-notes-timeline" data-client-notes="<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>">
                    <?php foreach ($notesForClient as $note): ?>
                      <article class="clients-note-item">
                        <span class="clients-note-dot" aria-hidden="true"></span>
                        <div class="clients-note-card">
                          <p class="clients-note-text mb-3"><?= htmlspecialchars($note['text'], ENT_QUOTES, 'UTF-8') ?></p>
                          <div class="clients-note-meta">
                            <span class="clients-note-author">&mdash; <?= htmlspecialchars($note['author'], ENT_QUOTES, 'UTF-8') ?></span>
                            <span class="clients-note-time"><?= htmlspecialchars($note['timestamp'], ENT_QUOTES, 'UTF-8') ?></span>
                          </div>
                        </div>
                      </article>
                    <?php endforeach; ?>
                  </div>
                </div>

                <div class="clients-card">
                  <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-4">
                    <h2 class="clients-card-title mb-0">Accounts</h2>
                    <button
                      type="button"
                      class="clients-btn-teal"
                      data-bs-toggle="modal"
                      data-bs-target="#clientAddAccountModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
                    >
                      <i class="bi bi-plus-lg" aria-hidden="true"></i>
                      Add Account
                    </button>
                  </div>

                  <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
                    <div class="clients-search-wrap flex-grow-1">
                      <i class="bi bi-search clients-search-icon" aria-hidden="true"></i>
                      <input
                        type="text"
                        class="form-control clients-search-input"
                        placeholder="Search accounts..."
                        aria-label="Search accounts"
                      />
                    </div>
                  </div>

                  <div class="accounts-table-wrapper clients-table-wrap">
                    <div class="table-responsive">
                      <table class="table accounts-table clients-table" aria-label="Accounts for <?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?>">
                      <thead>
                        <tr>
                          <th scope="col">Account Name</th>
                          <th scope="col">Hours</th>
                          <th scope="col">Allocated Hours</th>
                          <th scope="col">Manager</th>
                          <th scope="col">Status</th>
                          <th scope="col" class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($accountsForClient as $account): ?>
                          <?php $isDeactivated = $account['status'] === 'Deactivated'; ?>
                          <tr
                            class="clients-account-row"
                            tabindex="0"
                            role="button"
                            data-account-id="<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8') ?>"
                            data-account-name="<?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?>"
                            data-client-id="<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>"
                          >
                            <td class="fw-medium"><?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= (int) $account['hours'] ?></td>
                            <td><?= (int) $account['allocatedHours'] ?></td>
                            <td><?= htmlspecialchars($account['manager'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                              <span class="clients-badge <?= $isDeactivated ? 'clients-badge-deactivated' : 'clients-badge-active' ?>">
                                <?= htmlspecialchars($account['status'], ENT_QUOTES, 'UTF-8') ?>
                              </span>
                            </td>
                            <td class="text-end">
                              <div class="dropdown d-inline-block clients-row-action">
                                <button
                                  class="clients-icon-btn dropdown-toggle clients-dropdown-toggle"
                                  type="button"
                                  data-bs-toggle="dropdown"
                                  aria-expanded="false"
                                  aria-label="Account actions"
                                >
                                  <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end clients-dropdown-menu">
                                  <li>
                                    <button
                                      type="button"
                                      class="dropdown-item clients-dropdown-item"
                                      data-bs-toggle="modal"
                                      data-bs-target="#clientPocListModal-<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    >
                                      View POC
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      type="button"
                                      class="dropdown-item clients-dropdown-item"
                                      data-bs-toggle="modal"
                                      data-bs-target="#clientHoursHistoryModal-<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    >
                                      Hours History
                                    </button>
                                  </li>
                                  <li>
                                    <button
                                      type="button"
                                      class="dropdown-item clients-dropdown-item"
                                      data-bs-toggle="modal"
                                      data-bs-target="#clientAddHoursModal-<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    >
                                      Add Hours
                                    </button>
                                  </li>
                                  <li>
                                    <?php if ($isDeactivated): ?>
                                      <button type="button" class="dropdown-item clients-dropdown-item text-success">Activate</button>
                                    <?php else: ?>
                                      <button
                                        type="button"
                                        class="dropdown-item clients-dropdown-item text-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#clientDeactivateModal-<?= htmlspecialchars($account['id'], ENT_QUOTES, 'UTF-8') ?>"
                                      >
                                        Deactivate
                                      </button>
                                    <?php endif; ?>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <?php foreach ($clients as $client): ?>
    <?php
    $clientId = (string) $client['id'];
    $clientNameParts = preg_split('/\s+/', trim((string) $client['name'])) ?: [''];
    $clientFirstName = $clientNameParts[0] ?? '';
    $clientLastName = count($clientNameParts) > 1 ? implode(' ', array_slice($clientNameParts, 1)) : '';
    ?>

    <div class="modal fade" id="clientAddNoteModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content clients-modal-content">
          <div class="modal-header clients-modal-header border-0">
            <div>
              <h2 class="modal-title clients-modal-title">Add Note</h2>
              <p class="clients-modal-subtitle mb-0">Create a note for <?= htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8') ?>.</p>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body clients-modal-body">
            <div class="mb-3">
              <label class="form-label clients-modal-label">Write a note...</label>
              <textarea class="form-control clients-modal-input clients-modal-textarea" rows="5" placeholder="Write a note..."></textarea>
            </div>
          </div>
          <div class="modal-footer clients-modal-footer border-0">
            <button type="button" class="btn btn-outline-light clients-modal-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="clients-btn-teal" data-bs-dismiss="modal">Save Note</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="clientEditModal-<?= htmlspecialchars($clientId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content clients-modal-content">
          <div class="modal-header clients-modal-header border-0">
            <h2 class="modal-title clients-modal-title">Edit Client</h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body clients-modal-body">
            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label class="form-label clients-modal-label">Firstname</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($clientFirstName, ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label clients-modal-label">Lastname</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($clientLastName, ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12">
                <label class="form-label clients-modal-label">Business</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($client['businessName'], ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12">
                <label class="form-label clients-modal-label">Website</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($client['website'], ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12">
                <label class="form-label clients-modal-label">Telephone</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($client['telephone'], ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12">
                <label class="form-label clients-modal-label">Email</label>
                <input type="email" class="form-control clients-modal-input" value="<?= htmlspecialchars($client['email'], ENT_QUOTES, 'UTF-8') ?>">
              </div>
              <div class="col-12">
                <label class="form-label clients-modal-label">State</label>
                <input type="text" class="form-control clients-modal-input" value="<?= htmlspecialchars($client['state'], ENT_QUOTES, 'UTF-8') ?>">
              </div>
            </div>
          </div>
          <div class="modal-footer clients-modal-footer border-0">
            <button type="button" class="clients-btn-teal" data-bs-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>

    <?php require __DIR__ . '/partials/modals/clientAddAccount.php'; ?>
  <?php endforeach; ?>

  <?php foreach ($clientAccounts as $clientAccountSet): ?>
    <?php foreach ($clientAccountSet as $account): ?>
      <?php
      $accountId = (string) $account['id'];
      $accountPocs = $clientAccountPocs[$accountId] ?? [];
      $hoursHistoryRecords = $clientHoursHistory[$accountId] ?? [];
      ?>

      <?php require __DIR__ . '/partials/modals/clientPocList.php'; ?>
      <?php require __DIR__ . '/partials/modals/client-add-hours.php'; ?>

      <?php require __DIR__ . '/partials/modals/client-hours-history.php'; ?>

      <div class="modal fade" id="clientDeactivateModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content clients-modal-content clients-warning-modal-content">
            <div class="modal-body clients-modal-body clients-warning-modal-body">
              <div class="clients-warning-icon-wrap" aria-hidden="true">
                <i class="bi bi-question-lg"></i>
              </div>
              <h2 class="clients-warning-title">Are you sure you want to Deactivate this account?</h2>
              <p class="clients-warning-subtitle mb-4"><?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?></p>
              <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                <button type="button" class="btn btn-primary clients-warning-btn" data-bs-dismiss="modal">OK</button>
                <button type="button" class="btn btn-danger clients-warning-btn" data-bs-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
