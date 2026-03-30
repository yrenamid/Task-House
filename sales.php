<?php
$pageTitle = 'Task House';
$activeNav = 'sales';
$additionalStylesheets = ['css/super-admin.css'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main sales-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-4">
    <section class="mb-4">
      <div class="d-flex flex-column flex-xl-row align-items-xl-center justify-content-between gap-3">
        <div>
          <h1 class="sales-title mb-1">Sales</h1>
          <p class="sales-subtitle mb-0">Manage company leads and track progress</p>
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 sales-header-controls">
          <div class="input-group sales-search-wrap">
            <span class="input-group-text sales-addon"><i class="bi bi-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control sales-control" placeholder="Search leads..." aria-label="Search leads" />
          </div>

          <button type="button" class="btn sales-btn sales-btn-secondary" data-bs-toggle="modal" data-bs-target="#salesClosedLostModal">Closed Lost</button>
          <button type="button" class="btn sales-btn sales-btn-primary d-inline-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#salesNewLeadModal">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            <span>New Lead</span>
          </button>
        </div>
      </div>
    </section>

    <section class="sales-table-panel mb-4">
      <div class="table-responsive sales-table-wrap d-none d-md-block">
        <table class="table align-middle mb-0 sales-table">
          <thead>
            <tr>
              <th scope="col" class="text-nowrap">
                <span class="d-inline-flex align-items-center gap-2">Client Name <i class="bi bi-chevron-expand"></i></span>
              </th>
              <th scope="col" class="text-nowrap">
                <span class="d-inline-flex align-items-center gap-2">Business Name <i class="bi bi-chevron-expand"></i></span>
              </th>
              <th scope="col" class="text-nowrap">
                <span class="d-inline-flex align-items-center gap-2">State <i class="bi bi-chevron-expand"></i></span>
              </th>
              <th scope="col" class="text-nowrap">Status</th>
              <th scope="col" class="text-nowrap">Notes</th>
              <th scope="col" class="text-nowrap">Last Contact</th>
              <th scope="col" class="text-nowrap">
                <span class="d-inline-flex align-items-center gap-2">Agent <i class="bi bi-chevron-expand"></i></span>
              </th>
              <th scope="col" class="text-nowrap">Company</th>
              <th scope="col" class="text-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Smith</td>
              <td>Tech Solutions Inc</td>
              <td>California</td>
              <td><span class="badge sales-status sales-status-new">New Lead</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Interested in enterprise solution. Follow up next week regarding pricing and implementation timeline.</div></td>
              <td>03/25/2026</td>
              <td>Sarah Johnson</td>
              <td>NRO Consultants</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>Emily Rodriguez</td>
              <td>Marketing Pro Agency</td>
              <td>New York</td>
              <td><span class="badge sales-status sales-status-initial">Initial Contact</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Discussed needs for CRM integration. Sending proposal by end of week.</div></td>
              <td>03/26/2026</td>
              <td>Michael Chen</td>
              <td>Tech Solutions Inc</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>David Kim</td>
              <td>Finance Corp</td>
              <td>Texas</td>
              <td><span class="badge sales-status sales-status-interview">Interview Set</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Meeting scheduled for next Monday at 2 PM to discuss requirements and timeline.</div></td>
              <td>03/24/2026</td>
              <td>Sarah Johnson</td>
              <td>Finance Corp</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>Jessica Williams</td>
              <td>Retail Solutions</td>
              <td>Florida</td>
              <td><span class="badge sales-status sales-status-proposal">Proposal Sent</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Proposal sent on 03/20. Awaiting feedback on pricing structure and delivery schedule.</div></td>
              <td>03/20/2026</td>
              <td>Robert Taylor</td>
              <td>NRO Consultants</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>Amanda Martinez</td>
              <td>Healthcare Systems</td>
              <td>Illinois</td>
              <td><span class="badge sales-status sales-status-won">Closed Won</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Deal closed! Implementation starts next month. Contract signed for 2-year agreement.</div></td>
              <td>03/27/2026</td>
              <td>Michael Chen</td>
              <td>Tech Solutions Inc</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>Jennifer Wilson</td>
              <td>E-commerce Plus</td>
              <td>Washington</td>
              <td><span class="badge sales-status sales-status-initial">Initial Contact</span></td>
              <td class="sales-notes-cell"><div class="sales-line-clamp">Interested in custom e-commerce platform. Scheduling demo for next week.</div></td>
              <td>03/26/2026</td>
              <td>Robert Taylor</td>
              <td>NRO Consultants</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                    <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="sales-mobile-list d-md-none">
        <article class="sales-mobile-card">
          <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
            <div>
              <h2 class="sales-mobile-name">John Smith</h2>
              <span class="badge sales-status sales-status-new">New Lead</span>
            </div>
            <div class="dropdown">
              <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
              </ul>
            </div>
          </div>
          <div class="sales-mobile-grid">
            <div><span>Business</span><strong>Tech Solutions Inc</strong></div>
            <div><span>State</span><strong>California</strong></div>
            <div><span>Agent</span><strong>Sarah Johnson</strong></div>
            <div><span>Company</span><strong>NRO Consultants</strong></div>
            <div><span>Last Contact</span><strong>03/25/2026</strong></div>
          </div>
          <p class="sales-mobile-notes sales-line-clamp mb-0">Interested in enterprise solution. Follow up next week regarding pricing and implementation timeline.</p>
        </article>

        <article class="sales-mobile-card">
          <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
            <div>
              <h2 class="sales-mobile-name">Emily Rodriguez</h2>
              <span class="badge sales-status sales-status-initial">Initial Contact</span>
            </div>
            <div class="dropdown">
              <button type="button" class="btn sales-action-btn" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Lead actions">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end dropdown-dark sales-dropdown">
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesNotesModal"><i class="bi bi-file-text me-2"></i>Notes</button></li>
                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#salesEditLeadModal"><i class="bi bi-pencil-square me-2"></i>Edit</button></li>
                <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#salesRemoveLeadModal"><i class="bi bi-trash me-2"></i>Remove</button></li>
              </ul>
            </div>
          </div>
          <div class="sales-mobile-grid">
            <div><span>Business</span><strong>Marketing Pro Agency</strong></div>
            <div><span>State</span><strong>New York</strong></div>
            <div><span>Agent</span><strong>Michael Chen</strong></div>
            <div><span>Company</span><strong>Tech Solutions Inc</strong></div>
            <div><span>Last Contact</span><strong>03/26/2026</strong></div>
          </div>
          <p class="sales-mobile-notes sales-line-clamp mb-0">Discussed needs for CRM integration. Sending proposal by end of week.</p>
        </article>
      </div>
    </section>
  </div>
</main>

<?php require __DIR__ . '/partials/modals/sales-new-lead-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/sales-notes-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/sales-edit-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/sales-remove-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/sales-closed-lost-modal.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
