<?php
$pageTitle = 'Task House';
$activeNav = 'myTasks';

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-3">
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-3">
      <div>
        <h2 class="m-0 fw-bold">My Tasks</h2>
        <p class="mt-1 mb-0 app-muted">Manage and track your work assignments</p>
      </div>

      <button
        type="button"
        class="btn btn-teal-app px-4 py-3 d-inline-flex align-items-center gap-2"
        data-bs-toggle="modal"
        data-bs-target="#addTaskModal"
      >
        <i class="bi bi-plus-lg"></i>
        <span>Add New Task</span>
      </button>
    </div>

    <!-- Summary -->
    <div class="row g-3 g-md-4">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card dash-card border-0 shadow-sm h-100">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between mb-3">
              <div class="stat-ico stat-ico--warning"><i class="bi bi-clock"></i></div>
            </div>
            <div class="text-uppercase dash-label">Pending</div>
            <div class="dash-value" data-number>2</div>
            <div class="small app-muted">This shift</div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card dash-card border-0 shadow-sm h-100">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between mb-3">
              <div class="stat-ico stat-ico--primary"><i class="bi bi-play-fill"></i></div>
            </div>
            <div class="text-uppercase dash-label">Working</div>
            <div class="dash-value" data-number>1</div>
            <div class="small app-muted">In progress</div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card dash-card border-0 shadow-sm h-100">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between mb-3">
              <div class="stat-ico stat-ico--success"><i class="bi bi-check-circle-fill"></i></div>
            </div>
            <div class="text-uppercase dash-label">Complete</div>
            <div class="dash-value" data-number>2</div>
            <div class="small app-muted">This week</div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card dash-card border-0 shadow-sm h-100">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between mb-3">
              <div class="stat-ico stat-ico--danger"><i class="bi bi-x-lg"></i></div>
            </div>
            <div class="text-uppercase dash-label">Cancelled</div>
            <div class="dash-value" data-number>0</div>
            <div class="small app-muted">This week</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Current Shift Tasks -->
    <div class="card dash-card border-0 shadow-sm mt-4 overflow-hidden">
      <div class="panel-header panel-header--primary px-3 px-md-4 py-3">
        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
          <div>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-card-checklist"></i>
              <div class="fw-semibold">Current Shift Tasks</div>
            </div>
            <div class="tasks-panel-sub">Active tasks assigned for today’s shift</div>
          </div>

          <!-- Table Search -->
          <div class="w-100 w-md-auto mt-2 mt-md-0" style="max-width: 220px;">
            <div class="input-group input-group-sm">
              <span class="input-group-text bg-dark text-secondary border-secondary">
                <i class="bi bi-search"></i>
              </span>
              <input
                type="text"
                class="form-control form-control-sm bg-dark text-light border-secondary"
                placeholder="Search tasks..."
                aria-label="Search tasks"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive tasks-table-wrap">
        <table class="table table-dark table-hover align-middle mb-0 tasks-table">
          <thead>
            <tr>
              <th scope="col">Task ID</th>
              <th scope="col">Deadline</th>
              <th scope="col">Account</th>
              <th scope="col">Description</th>
              <th scope="col">Approver</th>
              <th scope="col">Status</th>
              <th scope="col">Billed Hours</th>
              <th scope="col">Worked Hours</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="td-number">TS-001</td>
              <td class="td-number">2/25/2026</td>
              <td class="fw-semibold">Acme Corporation</td>
              <td><div class="task-desc">Complete Q1 financial review and prepare presentation for stakeholders</div></td>
              <td class="td-muted">Sarah Johnson</td>
              <td>
                <span class="task-badge task-badge--working">
                  <i class="bi bi-play-fill"></i>
                  <span>Working</span>
                </span>
              </td>
              <td class="td-number">4h 30m</td>
              <td class="td-number">1h 30m</td>
              <td class="text-center">
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Task actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                        <i class="bi bi-eye me-2"></i>
                        View
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pauseWorkingTask">
                        <i class="bi bi-pause-circle me-2"></i>
                        Pause
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                        <i class="bi bi-pencil-square me-2"></i>
                        Update
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                      </button>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <button type="button" class="dropdown-item text-success">
                        <i class="bi bi-check2-all me-2"></i>
                        Done
                      </button>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr>
               <td class="td-number">TS-002</td>
              <td class="td-number">2/30/2026</td>
              <td class="fw-semibold">TechStart Inc.</td>
              <td><div class="task-desc">Develop new feature for mobile application dashboard</div></td>
              <td class="td-muted">Michael Chen</td>
              <td>
                <span class="task-badge task-badge--pending">
                  <i class="bi bi-clock"></i>
                  <span>Pending</span>
                </span>
              </td>
              <td class="td-number">8h 00m</td>
              <td class="td-number">4h 10m</td>
              <td class="text-center">
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Task actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                        <i class="bi bi-eye me-2"></i>
                        View
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item text-primary">
                        <i class="bi bi-play me-2"></i>
                        Start
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                        <i class="bi bi-pencil-square me-2"></i>
                        Update
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                      </button>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <button type="button" class="dropdown-item text-success">
                        <i class="bi bi-check2-all me-2"></i>
                        Done
                      </button>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>

            <tr>
               <td class="td-number">TS-003</td>
              <td class="td-number">2/19/2026</td>
              <td class="fw-semibold">Global Solutions Ltd.</td>
              <td><div class="task-desc">Client meeting and requirements gathering session</div></td>
              <td class="td-muted">Emily Rodriguez</td>
              <td>
                <span class="task-badge task-badge--pending">
                  <i class="bi bi-clock"></i>
                  <span>Pending</span>
                </span>
              </td>
              <td class="td-number">2h 15m</td>
              <td class="td-number">25m</td>
              <td class="text-center">
                <div class="dropdown">
                  <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Task actions">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                        <i class="bi bi-eye me-2"></i>
                        View
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item text-primary">
                        <i class="bi bi-play me-2"></i>
                        Start
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                        <i class="bi bi-pencil-square me-2"></i>
                        Update
                      </button>
                    </li>
                    <li>
                      <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                        <i class="bi bi-x-circle me-2"></i>
                        Cancel
                      </button>
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                      <button type="button" class="dropdown-item text-success">
                        <i class="bi bi-check2-all me-2"></i>
                        Done
                      </button>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="px-3 px-md-4 py-3 panel-footer">
        <div class="small app-muted">Showing <span class="fw-semibold text-white">3</span> active tasks</div>
      </div>
    </div>

    <!-- Completed Tasks -->
    <div class="card dash-card border-0 shadow-sm mt-4 overflow-hidden completed-card">
      <div class="panel-header panel-header--teal px-3 px-md-4 py-3">
        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
          <div>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-check-all"></i>
              <div class="fw-semibold">Completed Tasks</div>
            </div>
            <div class="tasks-panel-sub">Tasks that have been submitted for approval</div>
          </div>

          <!-- Table Search -->
          <div class="w-100 w-md-auto mt-2 mt-md-0" style="max-width: 220px;">
            <div class="input-group input-group-sm">
              <span class="input-group-text bg-dark text-secondary border-secondary">
                <i class="bi bi-search"></i>
              </span>
              <input
                type="text"
                class="form-control form-control-sm bg-dark text-light border-secondary"
                placeholder="Search tasks..."
                aria-label="Search tasks"
              />
            </div>
          </div>
        </div>
      </div>
    

      <!-- Tabs -->
      <div class="completed-tabs border-bottom border-stroke">
        <ul class="nav nav-tabs px-2 px-md-3" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="completed-approved-tab"
              data-bs-toggle="tab"
              data-bs-target="#completed-approved"
              type="button"
              role="tab"
              aria-controls="completed-approved"
              aria-selected="true"
            >
              Approved
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="completed-pending-tab"
              data-bs-toggle="tab"
              data-bs-target="#completed-pending"
              type="button"
              role="tab"
              aria-controls="completed-pending"
              aria-selected="false"
            >
              Pending Approval
            </button>
          </li>
        </ul>
      </div>

      <div class="tab-content">
        <!-- Approved tab -->
        <div class="tab-pane fade show active" id="completed-approved" role="tabpanel" aria-labelledby="completed-approved-tab" tabindex="0">
          <div class="table-responsive tasks-table-wrap ">
            <table class="table table-dark table-hover align-middle mb-0 tasks-table completed-table">
              <thead>
                <tr>
                  <th scope="col">Task ID</th>
                  <th scope="col">Deadline</th>
                  <th scope="col">Account</th>
                  <th scope="col">Description</th>
                  <th scope="col">Approver</th>
                  <th scope="col">Status</th>
                  <th scope="col">Billed Hours</th>
                  <th scope="col">Submitted on</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="td-number">T-001</td>
                  <td class="td-number">2/7/2026</td>
                  <td class="fw-semibold">Acme Corporation</td>
                  <td><div class="task-desc td-muted">Q1 Financial Review</div></td>
                  <td class="td-muted">Sarah Johnson</td>
                     <td>
                    <span class="task-badge task-badge--approved">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Approved</span>
                    </span>
                  </td>
                  <td class="td-number">04:35</td>
                  <td class="td-number">Feb 8, 2026 2:30 PM</td>
               
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>
                       
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="td-number">T-002</td>
                  <td class="td-number">2/11/2026</td>
                  <td class="fw-semibold">TechStart Inc.</td>
                  <td><div class="task-desc td-muted">Website Redesign Phase 1</div></td>
                  <td class="td-muted">Michael Chen</td>
                   <td>
                    <span class="task-badge task-badge--approved">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Approved</span>
                    </span>
                  </td>
                  <td class="td-number">05:20</td>
                  <td class="td-number">Feb 10, 2026 4:45 PM</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>
                        
                      </ul>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="td-number">T-003</td>
                  <td class="td-number">2/12/2026</td>
                  <td class="fw-semibold">GlobalNet Solutions</td>
                  <td><div class="task-desc td-muted">Client Onboarding Documentation</div></td>
                  <td class="td-muted">Emily Rodriguez</td>
                   <td>
                    <span class="task-badge task-badge--approved">
                      <i class="bi bi-check-circle-fill"></i>
                      <span>Approved</span>
                    </span>
                  </td>
                  <td class="td-number">02:50</td>
                  <td class="td-number">Feb 11, 2026 10:20 AM</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>
                        
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="px-3 px-md-4 py-3 panel-footer">
            <div class="small app-muted">Showing <span class="fw-semibold text-white">3</span> approved tasks</div>
          </div>
        </div>

        <!-- Pending tab -->
        <div class="tab-pane fade" id="completed-pending" role="tabpanel" aria-labelledby="completed-pending-tab" tabindex="0">
          <div class="table-responsive tasks-table-wrap">
            <table class="table table-dark table-hover align-middle mb-0 tasks-table completed-table">
              <thead>
                <tr>
                  <th scope="col">Task ID</th>
                  <th scope="col">Deadline</th>
                  <th scope="col">Account</th>
                  <th scope="col">Description</th>
                  <th scope="col">Approver</th>
                  <th scope="col">Status</th>
                  <th scope="col">Billed Hours</th>
                  <th scope="col">Submitted on</th>
                  <th scope="col" class="text-center">Actions</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td class="td-number">T-004</td>
                  <td class="td-number">2/16/2026</td>
                  <td class="fw-semibold">BrightPath Marketing</td>
                  <td><div class="task-desc td-muted">Marketing Campaign Analysis</div></td>
                  <td class="td-muted">James Wilson</td>
                   <td>
                    <span class="task-badge task-badge--approval-pending">
                      <i class="bi bi-clock"></i>
                      <span>Pending</span>
                    </span>
                  </td>
                  <td class="td-number">06:09</td>
                  <td class="td-number">Feb 12, 2026 9:15 AM</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>
                        
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Submission
                          </button>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                          <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                          </button>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="td-number">T-005</td>
                  <td class="td-number">2/16/2026</td>
                  <td class="fw-semibold">DataFlow Systems</td>
                  <td><div class="task-desc td-muted">Database Migration Testing</div></td>
                  <td class="td-muted">Sarah Johnson</td>
                   <td>
                    <span class="task-badge task-badge--approval-pending">
                      <i class="bi bi-clock"></i>
                      <span>Pending</span>
                    </span>
                  </td>
                  <td class="td-number">07:21</td>
                  <td class="td-number">Feb 12, 2026 11:00 AM</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>
                        
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Submission
                          </button>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                          <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                          </button>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="td-number">T-006</td>
                  <td class="td-number">2/16/2026</td>
                  <td class="fw-semibold">SecureTech Inc.</td>
                  <td><div class="task-desc td-muted">Security Audit Report</div></td>
                  <td class="td-muted">Michael Chen</td>
                  <td>
                    <span class="task-badge task-badge--approval-pending">
                      <i class="bi bi-clock"></i>
                      <span>Pending</span>
                    </span>
                  </td>
                  <td class="td-number">05:11</td>
                  <td class="td-number">Feb 11, 2026 3:30 PM</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Completed task actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTaskModal">
                            <i class="bi bi-eye me-2"></i>
                            View Details
                          </button>
                        </li>

                        <li>
                          <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Submission
                          </button>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                          <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#cancelTaskModal">
                            <i class="bi bi-x-circle me-2"></i>
                            Cancel
                          </button>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="px-3 px-md-4 py-3 panel-footer">
            <div class="small app-muted">Showing <span class="fw-semibold text-white">3</span> pending tasks</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals -->

  <?php require __DIR__ . '/includes/addtaskmodal.php'; ?>

  <?php require __DIR__ . '/includes/viewtaskmodal.php'; ?>

  <?php require __DIR__ . '/includes/updatetaskmodal.php'; ?>

  <?php require __DIR__ . '/includes/canceltaskmodal.php'; ?>
  

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>

