<?php
$pageTitle = 'Task House';
$activeNav = 'attendance-overview';
$additionalStylesheets = ['css/super-admin.css'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main attendance-overview-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-4">
    <section class="mb-4">
      <div class="d-flex flex-column flex-xl-row align-items-xl-center justify-content-between gap-3">
        <div>
          <h1 class="attendance-overview-title mb-1">Attendance Overview</h1>
          <p class="attendance-overview-subtitle mb-0">Monitor employee attendance and time logs</p>
        </div>

        <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2 attendance-overview-controls">
          <div class="attendance-control-date">
            <div class="input-group" role="group" aria-label="Attendance date picker">
              <span class="input-group-text" aria-hidden="true"><i class="bi bi-calendar3"></i></span>
              <input type="date" class="form-control" aria-label="Date (mm/dd/yyyy)" />
            </div>
          </div>

          <div class="input-group attendance-control-search">
            <span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Search employee..." aria-label="Search employee" />
          </div>

          <div class="input-group attendance-control-filter">
            <span class="input-group-text"><i class="bi bi-funnel" aria-hidden="true"></i></span>
            <select class="form-select" aria-label="Filter status">
              <option selected>All Status</option>
              <option>Present</option>
              <option>Late</option>
              <option>Rest Day</option>
            </select>
          </div>
        </div>
      </div>
    </section>

    <section class="row g-3 g-md-4 mb-4">
      <div class="col-12 col-md-6 col-xl-4">
        <article class="card attendance-stat-card h-100 border-0 shadow-sm">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <p class="attendance-stat-label mb-2">Present</p>
                <p class="attendance-stat-value mb-0">10</p>
              </div>
              <span class="attendance-stat-icon attendance-stat-icon-present" aria-hidden="true">
                <i class="bi bi-person-check-fill"></i>
              </span>
            </div>
          </div>
        </article>
      </div>

      <div class="col-12 col-md-6 col-xl-4">
        <article class="card attendance-stat-card h-100 border-0 shadow-sm">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <p class="attendance-stat-label mb-2">Rest Day</p>
                <p class="attendance-stat-value mb-0">2</p>
              </div>
              <span class="attendance-stat-icon attendance-stat-icon-rest" aria-hidden="true">
                <i class="bi bi-calendar-x-fill"></i>
              </span>
            </div>
          </div>
        </article>
      </div>

      <div class="col-12 col-md-6 col-xl-4">
        <article class="card attendance-stat-card h-100 border-0 shadow-sm">
          <div class="card-body p-3 p-md-4">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <p class="attendance-stat-label mb-2">Late</p>
                <p class="attendance-stat-value mb-0">4</p>
              </div>
              <span class="attendance-stat-icon attendance-stat-icon-late" aria-hidden="true">
                <i class="bi bi-clock-fill"></i>
              </span>
            </div>
          </div>
        </article>
      </div>
    </section>

    <section class="attendance-table-shell">
      <div class="table-responsive">
        <table class="table align-middle mb-0 attendance-overview-table">
          <thead>
            <tr>
              <th scope="col">Employee</th>
              <th scope="col">Prescribed In</th>
              <th scope="col">Prescribed Out</th>
              <th scope="col">Punch In</th>
              <th scope="col">Punch Out</th>
              <th scope="col">Label</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Sarah Johnson</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">08:00 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td></td>
              <td></td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Michael Chen</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">09:00 AM</td>
              <td class="attendance-time-cell">06:00 PM</td>
              <td class="attendance-time-cell">09:01 AM</td>
              <td class="attendance-time-cell">06:00 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Emily Rodriguez</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">08:00 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td class="attendance-time-cell">07:35 AM</td>
              <td class="attendance-time-cell">05:15 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">David Kim</div>
                  </div>
                </div>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><span class="badge attendance-label-badge attendance-label-rd">RD</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Jessica Williams</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">08:00 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td class="attendance-time-cell">08:05 AM</td>
              <td class="attendance-time-cell">05:20 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Robert Taylor</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">08:00 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td class="attendance-time-cell">07:55 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Amanda Martinez</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">09:00 AM</td>
              <td class="attendance-time-cell">06:00 PM</td>
              <td class="attendance-time-cell">08:59 AM</td>
              <td class="attendance-time-cell">06:05 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Christopher Lee</div>
                  </div>
                </div>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><span class="badge attendance-label-badge attendance-label-rd">RD</span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Nicole Brown</div>
                  </div>
                </div>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div>
                    <div class="attendance-employee-name">Daniel Anderson</div>
                  </div>
                </div>
              </td>
              <td class="attendance-time-cell">08:00 AM</td>
              <td class="attendance-time-cell">05:00 PM</td>
              <td class="attendance-time-cell">08:02 AM</td>
              <td class="attendance-time-cell">05:05 PM</td>
              <td><span class="badge attendance-label-badge attendance-label-n">N</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="attendance-table-pagination d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 px-3 px-md-4 py-3">
        <p class="mb-0 attendance-pagination-text">Showing 1-10 of 12 records</p>
        <div class="d-flex flex-wrap align-items-center gap-2">
          <button type="button" class="btn attendance-btn attendance-btn-outline disabled" aria-disabled="true">Previous</button>
          <button type="button" class="btn attendance-btn attendance-btn-active">1</button>
          <button type="button" class="btn attendance-btn attendance-btn-outline">2</button>
          <button type="button" class="btn attendance-btn attendance-btn-outline">Next</button>
        </div>
      </div>
    </section>
  </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
