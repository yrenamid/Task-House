<?php
$pageTitle = 'Task House';
$pageTitleText = 'Welcome';
$activeNav = 'welcome';

$now = new DateTime('now', new DateTimeZone('Asia/Manila'));
$todayLong = $now->format('l, F j, Y');
$timeNow = $now->format('g:i A');

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section id="viewWelcome" aria-label="Welcome View">
    <div class="container-fluid px-3 px-md-4 py-3">
      <div class="hero-card">
        <div class="hero-content">
          <h1 class="hero-title">Good morning, John!</h1>
          <div class="hero-sub">Here’s what’s happening with your shift today.</div>
          <div class="hero-date">
            <div class="hero-date-label">Today’s Date</div>
            <div class="hero-date-value"><?= htmlspecialchars($todayLong, ENT_QUOTES, 'UTF-8') ?> • <?= htmlspecialchars($timeNow, ENT_QUOTES, 'UTF-8') ?></div>
          </div>
        </div>
      </div>

      <div class="row g-3 mt-3">
        <div class="col-12 col-lg-6">
          <div class="card dash-card border-0 shadow-sm h-100">
            <div class="card-body p-3 p-md-4">
              <div class="d-flex align-items-start gap-3">
                <div class="dash-icon rounded-circle flex-shrink-0 bg-primary-ink">
                  <i class="bi bi-check-circle-fill"></i>
                </div>

                <div>
                  <div class="text-uppercase dash-label">Active Tasks</div>
                  <div class="dash-value">24</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="card dash-card border-0 shadow-sm h-100">
            <div class="card-body p-3 p-md-4">
              <div class="d-flex align-items-start gap-3">
                <div class="dash-icon rounded-circle flex-shrink-0 bg-success-ink">
                  <i class="bi bi-clock-fill"></i>
                </div>

                <div>
                  <div class="text-uppercase dash-label">Clocked in at</div>
                  <div class="dash-value">8:00 PM</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-3 mt-3">
        <div class="col-12 col-lg-6">
          <div class="card dash-card border-0 shadow-sm h-10">
            <div class="card-body p-3 p-md-4">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-lightbulb dash-tip-icon"></i>
                <div>
                  <div class="mb-2 dash-card-title">Tip of the Day</div>
                  <blockquote class="mb-0 dash-quote">
                    “Break large tasks into smaller ones to improve focus and completion speed.”
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-6">
          <div class="card dash-card border-0 shadow-sm h-100">
            <div class="card-body p-3 p-md-4">
              <div class="mb-3 dash-card-title">Reminders</div>
              <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                <li class="d-flex align-items-start gap-2">
                  <i class="bi bi-check2-square dash-list-icon"></i>
                  <span>Clock out before leaving the office</span>
                </li>
                <li class="d-flex align-items-start gap-2">
                  <i class="bi bi-check2-square dash-list-icon"></i>
                  <span>Update task status before shift ends</span>
                </li>
                <li class="d-flex align-items-start gap-2">
                  <i class="bi bi-check2-square dash-list-icon"></i>
                  <span>Mark rest days correctly to avoid attendance issues</span>
                </li>
                <li class="d-flex align-items-start gap-2">
                  <i class="bi bi-check2-square dash-list-icon"></i>
                  <span>Always start your break using the system</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
