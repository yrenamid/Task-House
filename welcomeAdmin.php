<?php
$pageTitle = 'Task House';
$activeNav = 'welcome-admin';
$additionalStylesheets = ['css/super-admin.css'];

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sidebar.php';
?>

<main class="app-main welcome-admin-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <div class="container-fluid px-3 px-md-4 py-4">
    <section class="mb-4">
      <div class="d-flex flex-column flex-xl-row align-items-xl-center justify-content-between gap-3">
        <div>
          <h1 class="welcome-admin-title mb-1">Superadmin Dashboard</h1>
          <p class="welcome-admin-subtitle mb-0">System overview and management controls</p>
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2 welcome-admin-header-controls">
          <div class="welcome-admin-date-card">
            <small class="d-block">Today</small>
            <strong>03/27/2026</strong>
          </div>
        </div>
      </div>
    </section>

    <section class="welcome-dashboard-section">
      <div class="row g-3 g-xl-4">
        <div class="col-12 col-sm-6 col-xl-3">
          <article class="welcome-stat-card h-100">
            <div class="welcome-stat-icon welcome-stat-icon-blue"><i class="bi bi-people-fill" aria-hidden="true"></i></div>
            <div>
              <div class="welcome-stat-value">248</div>
              <div class="welcome-stat-label">Total Employees</div>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
          <article class="welcome-stat-card h-100">
            <div class="welcome-stat-icon welcome-stat-icon-green"><i class="bi bi-person-check-fill" aria-hidden="true"></i></div>
            <div>
              <div class="welcome-stat-value">187</div>
              <div class="welcome-stat-label">Active Users Today</div>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
          <article class="welcome-stat-card h-100">
            <div class="welcome-stat-icon welcome-stat-icon-yellow"><i class="bi bi-kanban-fill" aria-hidden="true"></i></div>
            <div>
              <div class="welcome-stat-value">34</div>
              <div class="welcome-stat-label">Total Active Projects</div>
            </div>
          </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
          <article class="welcome-stat-card h-100">
            <div class="welcome-stat-icon welcome-stat-icon-red"><i class="bi bi-graph-up-arrow" aria-hidden="true"></i></div>
            <div>
              <div class="welcome-stat-value">59</div>
              <div class="welcome-stat-label">Total Leads</div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="welcome-dashboard-section">
      <h2 class="welcome-section-title">Quick Actions</h2>
      <div class="row g-3 g-xl-4">
        <div class="col-12 col-sm-6 col-xl-3">
          <a class="welcome-action-card" href="file201.php">
            <span class="welcome-action-icon"><i class="bi bi-person-plus-fill" aria-hidden="true"></i></span>
            <span class="welcome-action-label">Add Employee</span>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <a class="welcome-action-card" href="holidays.php">
            <span class="welcome-action-icon"><i class="bi bi-star-fill" aria-hidden="true"></i></span>
            <span class="welcome-action-label">Survey & Ratings</span>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <a class="welcome-action-card" href="attendanceOverview.php">
            <span class="welcome-action-icon"><i class="bi bi-calendar3" aria-hidden="true"></i></span>
            <span class="welcome-action-label">View Attendance</span>
          </a>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <a class="welcome-action-card" href="sales.php">
            <span class="welcome-action-icon"><i class="bi bi-bar-chart-line-fill" aria-hidden="true"></i></span>
            <span class="welcome-action-label">Sales / Leads</span>
          </a>
        </div>
      </div>
    </section>

    <section class="welcome-dashboard-section">
      <h2 class="welcome-section-title">Admin Tips</h2>
      <div class="welcome-tips-callout">
        <p class="welcome-tip-line"><i class="bi bi-lightbulb-fill" aria-hidden="true"></i><span>Ensure all employees log attendance daily.</span></p>
        <p class="welcome-tip-line"><i class="bi bi-lightbulb-fill" aria-hidden="true"></i><span>Review pending reports weekly.</span></p>
        <p class="welcome-tip-line mb-0"><i class="bi bi-lightbulb-fill" aria-hidden="true"></i><span>Keep employee records updated.</span></p>
      </div>
    </section>
  </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>