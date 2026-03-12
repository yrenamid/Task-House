<?php
$pageTitle = 'Task House';
$activeNav = 'leaves';
$additionalStylesheets = ['hr.css'];

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section class="container-fluid px-3 px-md-4 py-3 leaves-page" aria-label="Leave requests management">

    <div class="card leaves-header-card shadow-sm border-0 mb-3">
      <div class="card-body px-3 px-md-4 py-3 py-md-4">
        <div>
          <h1 class="h3 mb-2 text-white">Leaves</h1>
          <p class="mb-0 text-white-50">Review and manage employee leave requests.</p>
        </div>
      </div>
    </div>

    <div class="card leaves-tabs-container shadow-sm border-0">
      <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">

          <div class="leaves-tabs-bg rounded-3 p-2 d-inline-flex gap-2 flex-wrap">
            <ul class="nav leaves-tabs-nav m-0 p-0 gap-2 flex-nowrap" id="leavesTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link leaves-tab-btn active"
                  id="leaves-pending-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#pending-pane"
                  type="button"
                  role="tab"
                  aria-controls="pending-pane"
                  aria-selected="true"
                >
                  Pending <span class="leaves-tab-count ms-1">2</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link leaves-tab-btn"
                  id="leaves-approved-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#approved-pane"
                  type="button"
                  role="tab"
                  aria-controls="approved-pane"
                  aria-selected="false"
                >
                  Approved <span class="leaves-tab-count ms-1">2</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link leaves-tab-btn"
                  id="leaves-declined-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#declined-pane"
                  type="button"
                  role="tab"
                  aria-controls="declined-pane"
                  aria-selected="false"
                >
                  Declined <span class="leaves-tab-count ms-1">2</span>
                </button>
              </li>
            </ul>
          </div>

          <div class="leaves-search-wrap">
            <label for="leaveSearch" class="visually-hidden">Search employee name or notes</label>
            <div class="input-group leaves-search">
              <span class="input-group-text">
                <i class="bi bi-search"></i>
              </span>
              <input
                id="leaveSearch"
                type="text"
                class="form-control"
                placeholder="Search employee name or notes..."
              />
            </div>
          </div>

        </div>

        <div class="tab-content" id="leavesTabContent">

          <div
            class="tab-pane fade show active"
            id="pending-pane"
            role="tabpanel"
            aria-labelledby="leaves-pending-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 leaves-table-container">
              <table class="table leaves-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Date Submitted</th>
                    <th>Shift Date</th>
                    <th>Reason</th>
                    <th>Proof</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-white fw-medium">Alice Johnson</td>
                    <td class="leaves-text-secondary">Sick Leave</td>
                    <td class="leaves-text-secondary">03/05/2026</td>
                    <td class="leaves-text-secondary">03/10/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Medical appointment</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR001">
                        View Proof
                      </button>
                    </td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-leaves-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open leave actions">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end leaves-dropdown-menu">
                          <li><a class="dropdown-item text-success" href="#">Approve</a></li>
                          <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-white fw-medium">Bob Smith</td>
                    <td class="leaves-text-secondary">Vacation Leave</td>
                    <td class="leaves-text-secondary">03/04/2026</td>
                    <td class="leaves-text-secondary">03/15/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Family vacation</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR002">
                        View Proof
                      </button>
                    </td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-leaves-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open leave actions">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end leaves-dropdown-menu">
                          <li><a class="dropdown-item text-success" href="#">Approve</a></li>
                          <li><button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#declineModal">Decline</button></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="approved-pane"
            role="tabpanel"
            aria-labelledby="leaves-approved-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 leaves-table-container">
              <table class="table leaves-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Date Submitted</th>
                    <th>Shift Date</th>
                    <th>Reason</th>
                    <th>Proof</th>
                    <th>Leave Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-white fw-medium">Carol Williams</td>
                    <td class="leaves-text-secondary">Personal Leave</td>
                    <td class="leaves-text-secondary">03/03/2026</td>
                    <td class="leaves-text-secondary">03/08/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Personal matters</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR003">
                        View Proof
                      </button>
                    </td>
                    <td><span class="badge bg-success">Paid</span></td>
                  </tr>
                  <tr>
                    <td class="text-white fw-medium">David Brown</td>
                    <td class="leaves-text-secondary">Sick Leave</td>
                    <td class="leaves-text-secondary">03/02/2026</td>
                    <td class="leaves-text-secondary">03/07/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Flu symptoms</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR004">
                        View Proof
                      </button>
                    </td>
                    <td><span class="badge bg-secondary">Unpaid</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="declined-pane"
            role="tabpanel"
            aria-labelledby="leaves-declined-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 leaves-table-container">
              <table class="table leaves-table align-middle mb-0">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Date Submitted</th>
                    <th>Shift Date</th>
                    <th>Reason</th>
                    <th>Proof</th>
                    <th>Leave Status</th>
                    <th>Declined Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-white fw-medium">Emma Davis</td>
                    <td class="leaves-text-secondary">Emergency Leave</td>
                    <td class="leaves-text-secondary">03/01/2026</td>
                    <td class="leaves-text-secondary">03/06/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Family emergency</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR005">
                        View Proof
                      </button>
                    </td>
                    <td><span class="badge bg-danger-subtle text-danger-emphasis">Declined</span></td>
                    <td class="leaves-text-secondary">Insufficient documentation provided</td>
                  </tr>
                  <tr>
                    <td class="text-white fw-medium">Frank Miller</td>
                    <td class="leaves-text-secondary">Vacation Leave</td>
                    <td class="leaves-text-secondary">02/28/2026</td>
                    <td class="leaves-text-secondary">03/05/2026</td>
                    <td class="leaves-text-secondary leaves-col-notes">Beach trip</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-leaves-proof" data-bs-toggle="modal" data-bs-target="#proofModalLR006">
                        View Proof
                      </button>
                    </td>
                    <td><span class="badge bg-danger-subtle text-danger-emphasis">Declined</span></td>
                    <td class="leaves-text-secondary">Leave quota exceeded for this month</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>

  <div class="modal fade" id="proofModalLR001" tabindex="-1" aria-labelledby="proofModalLR001Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR001Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://images.pexels.com/photos/4641440/pexels-photo-4641440.jpeg" alt="Leave proof for Alice Johnson" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="proofModalLR002" tabindex="-1" aria-labelledby="proofModalLR002Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR002Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://images.pexels.com/photos/36374370/pexels-photo-36374370.jpeg" alt="Leave proof for Bob Smith" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="proofModalLR003" tabindex="-1" aria-labelledby="proofModalLR003Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR003Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://images.pexels.com/photos/36374370/pexels-photo-36374370.jpeg" alt="Leave proof for Carol Williams" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="proofModalLR004" tabindex="-1" aria-labelledby="proofModalLR004Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR004Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://images.pexels.com/photos/36374370/pexels-photo-36374370.jpeg" alt="Leave proof for David Brown" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="proofModalLR005" tabindex="-1" aria-labelledby="proofModalLR005Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR005Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F59%2Fa9%2F90%2F59a99073a10c9e26936ed464eedb6304.jpg&f=1&nofb=1&ipt=fd7d626c539d17a0e3f9b5247e757919f57281ccb698d9b1429044189fbff74e" alt="Leave proof for Emma Davis" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="proofModalLR006" tabindex="-1" aria-labelledby="proofModalLR006Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="proofModalLR006Label">Leave Proof</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F18%2Ff3%2F6d%2F18f36d3c70be9d4fae7256335d1cdf90.png&f=1&nofb=1&ipt=6966569368ea842146c32a0c5149936a836033694061bfe611c4bb605a60d706" alt="Leave proof for Frank Miller" class="img-fluid rounded" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content leaves-modal">
        <div class="modal-header">
          <h2 class="modal-title h5 mb-0" id="declineModalLabel">Decline Leave Request</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="declineReason" class="form-label">Decline Reason</label>
          <textarea id="declineReason" class="form-control leaves-textarea" rows="4" placeholder="Enter decline reason..."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-leaves-cancel" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Confirm Decline</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
