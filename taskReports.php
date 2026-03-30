<?php
$pageTitle = 'Task House';
$activeNav = 'task-reports';
$additionalStylesheets = ['css/super-admin.css'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/mockData.php';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main task-reports-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-4">
    <section class="mb-4">
      <h1 class="task-reports-title mb-1">Task Reports</h1>
      <p class="task-reports-subtitle mb-0">View and manage submitted task reports</p>
    </section>

    <section class="task-reports-filter-panel mb-4">
      <div class="d-flex flex-column flex-xl-row gap-3 align-items-stretch align-items-xl-end">
        <div class="d-flex flex-column flex-md-row flex-grow-1 gap-3">
          <div class="task-control-group">
            <label class="form-label task-control-label" for="dateFrom">From</label>
            <input id="dateFrom" type="date" class="form-control task-control-input" aria-label="From date" />
          </div>
          <div class="task-control-group">
            <label class="form-label task-control-label" for="dateTo">To</label>
            <input id="dateTo" type="date" class="form-control task-control-input" aria-label="To date" />
          </div>
        </div>

        <div class="task-control-group task-search-group">
          <label class="form-label task-control-label" for="taskSearch">Search</label>
          <div class="input-group">
            <span class="input-group-text task-control-addon"><i class="bi bi-search" aria-hidden="true"></i></span>
            <input id="taskSearch" type="text" class="form-control task-control-input" placeholder="Search reports..." aria-label="Search reports" />
          </div>
        </div>

        <div class="d-flex flex-wrap gap-2 task-action-group">
          <button type="button" class="btn task-btn task-btn-secondary d-inline-flex align-items-center gap-2">
            <i class="bi bi-download" aria-hidden="true"></i>
            <span>Export</span>
          </button>
          <button type="button" class="btn task-btn task-btn-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#adminAddReportModal">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            <span>Add Report</span>
          </button>
        </div>
      </div>
    </section>

    <section class="task-reports-table-panel mb-4">
      <div class="table-responsive task-reports-table-wrap">
        <table class="table align-middle mb-0 task-reports-table">
          <thead>
            <tr>
              <th scope="col">Task ID</th>
              <th scope="col">Date</th>
              <th scope="col">Account Name</th>
              <th scope="col">Project Name</th>
              <th scope="col">Tasks</th>
              <th scope="col" class="text-end">Billed Hours</th>
              <th scope="col">Doer</th>
              <th scope="col">Approved By</th>
            </tr>
          </thead>
          <tbody>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK001" role="button" tabindex="0" aria-label="Open details for task TSK001">
              <td class="task-col-id">TSK001</td>
              <td>03/20/2026</td>
              <td class="task-col-strong">Wack N Stack</td>
              <td class="task-col-strong">-</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Implemented dashboard UI with attendance tracking, user management, and reporting features. Fixed responsive layout issues.</div></td>
              <td class="text-end task-col-hours">8.5</td>
              <td>Sarah Johnson</td>
              <td>Michael Chen</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK002" role="button" tabindex="0" aria-label="Open details for task TSK002">
              <td class="task-col-id">TSK002</td>
              <td>03/21/2026</td>
              <td class="task-col-strong">Next Wave Services</td>
              <td class="task-col-strong">E-commerce Platform</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Developed payment gateway integration and order processing workflow.</div></td>
              <td class="text-end task-col-hours">6.0</td>
              <td>David Kim</td>
              <td>Emily Rodriguez</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK003" role="button" tabindex="0" aria-label="Open details for task TSK003">
              <td class="task-col-id">TSK003</td>
              <td>03/22/2026</td>
              <td class="task-col-strong">HR OJT</td>
              <td class="task-col-strong">Internal Tools</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Created employee onboarding module with document upload and verification system.</div></td>
              <td class="text-end task-col-hours">7.5</td>
              <td>Jessica Williams</td>
              <td>Robert Taylor</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK004" role="button" tabindex="0" aria-label="Open details for task TSK004">
              <td class="task-col-id">TSK004</td>
              <td>03/23/2026</td>
              <td class="task-col-strong">Mahalo Consulting</td>
              <td class="task-col-strong">Analytics Dashboard</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Built real-time analytics charts and data visualization components.</div></td>
              <td class="text-end task-col-hours">9.0</td>
              <td>Amanda Martinez</td>
              <td>Michael Chen</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK005" role="button" tabindex="0" aria-label="Open details for task TSK005">
              <td class="task-col-id">TSK005</td>
              <td>03/24/2026</td>
              <td class="task-col-strong">NRD Consultants</td>
              <td class="task-col-strong">Mobile App Backend</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Developed REST API endpoints for user authentication and profile management.</div></td>
              <td class="text-end task-col-hours">8.0</td>
              <td>Christopher Lee</td>
              <td>Emily Rodriguez</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK006" role="button" tabindex="0" aria-label="Open details for task TSK006">
              <td class="task-col-id">TSK006</td>
              <td>03/25/2026</td>
              <td class="task-col-strong">Security Marketing King</td>
              <td class="task-col-strong">Reporting System</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Implemented automated report generation with PDF export functionality and email notifications.</div></td>
              <td class="text-end task-col-hours">10.0</td>
              <td>Sarah Johnson</td>
              <td>Jennifer Wilson</td>
            </tr>
            <tr class="task-report-row" data-bs-toggle="modal" data-bs-target="#taskDetailsModalTSK007" role="button" tabindex="0" aria-label="Open details for task TSK007">
              <td class="task-col-id">TSK007</td>
              <td>03/26/2026</td>
              <td class="task-col-strong">HR OJT</td>
              <td class="task-col-strong">Attendance System</td>
              <td class="task-col-tasks"><div class="task-line-clamp">Enhanced attendance tracking with geolocation and biometric integration.</div></td>
              <td class="text-end task-col-hours">6.5</td>
              <td>David Kim</td>
              <td>Robert Taylor</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="task-reports-pagination d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 px-3 px-md-4 py-3">
        <p class="mb-0 task-pagination-text">Showing 1 to 7 of 7 results</p>
        <div class="d-flex gap-2">
          <button type="button" class="btn task-btn task-btn-secondary disabled" aria-disabled="true">Previous</button>
          <button type="button" class="btn task-btn task-btn-secondary disabled" aria-disabled="true">Next</button>
        </div>
      </div>
    </section>

  </div>
</main>

<?php require __DIR__ . '/partials/modals/admin-add-report.php'; ?>
<?php require __DIR__ . '/partials/modals/admin-task-details.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
