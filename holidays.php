<?php
$pageTitle             = 'Task House';
$activeNav             = 'holidays';
$additionalStylesheets = ['hr.css'];

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section class="container-fluid px-3 px-md-4 py-3" aria-label="Holidays">

    <div class="card holidays-header-card shadow-sm border-0 mb-4">
      <div class="card-body px-3 px-md-4 py-3 py-md-4">
        <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
          <div>
            <h1 class="h3 fw-semibold mb-2 text-white">Holidays</h1>
            <p class="mb-0 holidays-header-subtitle">View Philippine holidays and plan ahead for upcoming non-working days.</p>
          </div>
          <div class="holidays-month-badge text-center px-4 py-2 rounded-3 flex-shrink-0">
            <span class="holidays-month-badge-text fw-medium">April 2026</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-3 mb-4">

      <div class="col-12 col-md-4">
        <div class="card holidays-overview-card shadow-sm border-0 h-100">
          <div class="card-body px-4 py-4">
            <div class="d-flex align-items-center gap-3">
              <div class="holidays-overview-icon holidays-overview-icon--blue">
                <i class="bi bi-calendar-event fs-5"></i>
              </div>
              <div>
                <div class="holidays-overview-number">4</div>
                <div class="holidays-overview-label">Holidays This Month</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card holidays-overview-card shadow-sm border-0 h-100">
          <div class="card-body px-4 py-4">
            <div class="d-flex align-items-center gap-3">
              <div class="holidays-overview-icon holidays-overview-icon--red">
                <i class="bi bi-gift fs-5"></i>
              </div>
              <div>
                <div class="holidays-overview-number">3</div>
                <div class="holidays-overview-label">Regular Holidays</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="card holidays-overview-card shadow-sm border-0 h-100">
          <div class="card-body px-4 py-4">
            <div class="d-flex align-items-center gap-3">
              <div class="holidays-overview-icon holidays-overview-icon--orange">
                <i class="bi bi-stars fs-5"></i>
              </div>
              <div>
                <div class="holidays-overview-number">1</div>
                <div class="holidays-overview-label">Special Non-Working Days</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row g-4">

      <!-- ── Left: Calendar ──────────────────────────────────── -->
      <div class="col-12 col-lg-8">
        <div class="card holidays-calendar-card shadow-sm border-0">
          <div class="card-body p-3 p-md-4">

            <!-- Calendar header -->
            <div class="d-flex align-items-center justify-content-between mb-4">
              <button class="btn holidays-cal-nav-btn" type="button" aria-label="Previous month" disabled>
                <i class="bi bi-chevron-left"></i>
              </button>
              <h2 class="h5 fw-semibold mb-0 holidays-cal-title">April 2026</h2>
              <button class="btn holidays-cal-nav-btn" type="button" aria-label="Next month" disabled>
                <i class="bi bi-chevron-right"></i>
              </button>
            </div>

            <!-- Day-of-week headers -->
            <div class="holidays-cal-grid mb-2">
              <div class="holidays-cal-dow">Sun</div>
              <div class="holidays-cal-dow">Mon</div>
              <div class="holidays-cal-dow">Tue</div>
              <div class="holidays-cal-dow">Wed</div>
              <div class="holidays-cal-dow">Thu</div>
              <div class="holidays-cal-dow">Fri</div>
              <div class="holidays-cal-dow">Sat</div>
            </div>

            <div class="holidays-cal-grid">

              <div class="holidays-calendar-day holidays-calendar-day--empty"></div>
              <div class="holidays-calendar-day holidays-calendar-day--empty"></div>
              <div class="holidays-calendar-day holidays-calendar-day--empty"></div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">1</span>
              </div>

              <div class="holidays-calendar-day holidays-calendar-day--holiday">
                <span class="holidays-cal-day-num">2</span>
                <span class="holidays-cal-dot holidays-cal-dot--regular"></span>
              </div>

              <div class="holidays-calendar-day holidays-calendar-day--holiday">
                <span class="holidays-cal-day-num">3</span>
                <span class="holidays-cal-dot holidays-cal-dot--regular"></span>
              </div>

              <div class="holidays-calendar-day holidays-calendar-day--holiday">
                <span class="holidays-cal-day-num">4</span>
                <span class="holidays-cal-dot holidays-cal-dot--special"></span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">5</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">6</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">7</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">8</span>
              </div>

              <div class="holidays-calendar-day holidays-calendar-day--holiday">
                <span class="holidays-cal-day-num">9</span>
                <span class="holidays-cal-dot holidays-cal-dot--regular"></span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">10</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">11</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">12</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">13</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">14</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">15</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">16</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">17</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">18</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">19</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">20</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">21</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">22</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">23</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">24</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">25</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">26</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">27</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">28</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">29</span>
              </div>

              <div class="holidays-calendar-day">
                <span class="holidays-cal-day-num">30</span>
              </div>

            </div>

            <div class="holidays-cal-legend mt-4 pt-4">
              <div class="d-flex flex-wrap gap-4">
                <div class="d-flex align-items-center gap-2">
                  <span class="holidays-cal-dot holidays-cal-dot--regular holidays-cal-dot--lg"></span>
                  <span class="holidays-legend-text">Regular Holiday</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <span class="holidays-cal-dot holidays-cal-dot--special holidays-cal-dot--lg"></span>
                  <span class="holidays-legend-text">Special Non-Working Holiday</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-12 col-lg-4">
        <div class="d-flex flex-column gap-4">

          <div class="card holidays-next-card shadow border-0">
            <div class="card-body p-4">
              <div class="d-flex align-items-start gap-3">
                <i class="bi bi-calendar3 holidays-next-icon flex-shrink-0 mt-1"></i>
                <div>
                  <div class="holidays-next-label mb-1">Next Holiday</div>
                  <div class="holidays-next-title mb-2">Apr 2 — Maundy Thursday</div>
                  <span class="badge holidays-badge-regular">Regular Holiday</span>
                </div>
              </div>
            </div>
          </div>


          <div class="card holidays-list-card shadow-sm border-0">
            <div class="card-body p-4">
              <h3 class="h6 fw-semibold holidays-list-heading mb-4">Holiday List for April</h3>

              <div class="holidays-list-item">
                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                  <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                    <div class="holidays-list-date-badge flex-shrink-0">
                      <span class="holidays-list-date-text">Apr 2</span>
                    </div>
                    <span class="holidays-list-name">Maundy Thursday</span>
                  </div>
                  <span class="badge holidays-badge-regular holidays-list-type-badge align-self-start align-self-sm-center">Regular</span>
                </div>
              </div>

              <div class="holidays-list-item">
                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                  <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                    <div class="holidays-list-date-badge flex-shrink-0">
                      <span class="holidays-list-date-text">Apr 3</span>
                    </div>
                    <span class="holidays-list-name">Good Friday</span>
                  </div>
                  <span class="badge holidays-badge-regular holidays-list-type-badge align-self-start align-self-sm-center">Regular</span>
                </div>
              </div>

              <div class="holidays-list-item">
                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                  <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                    <div class="holidays-list-date-badge flex-shrink-0">
                      <span class="holidays-list-date-text">Apr 4</span>
                    </div>
                    <span class="holidays-list-name">Black Saturday</span>
                  </div>
                  <span class="badge holidays-badge-special holidays-list-type-badge align-self-start align-self-sm-center">Special</span>
                </div>
              </div>

              <div class="holidays-list-item holidays-list-item--last">
                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                  <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                    <div class="holidays-list-date-badge flex-shrink-0">
                      <span class="holidays-list-date-text">Apr 9</span>
                    </div>
                    <span class="holidays-list-name">Araw ng Kagitingan</span>
                  </div>
                  <span class="badge holidays-badge-regular holidays-list-type-badge align-self-start align-self-sm-center">Regular</span>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>

  </section>

  <?php require __DIR__ . '/includes/footer.php'; ?>
</main>
