<?php
$pageTitle             = 'Task House';
$activeNav             = 'holidays';
$additionalStylesheets = ['hr.css'];

require __DIR__ . '/holidaysData.php';

$today = new DateTimeImmutable('today');
$currentYear = (int) $today->format('Y');
$currentMonth = (int) $today->format('n');

$selectedYear = isset($_GET['year']) ? (int) $_GET['year'] : $currentYear;
$selectedMonth = isset($_GET['month']) ? (int) $_GET['month'] : $currentMonth;

if ($selectedYear < 1970 || $selectedYear > 2100) {
  $selectedYear = $currentYear;
}

if ($selectedMonth < 1 || $selectedMonth > 12) {
  $selectedMonth = $currentMonth;
}

$monthStart = DateTimeImmutable::createFromFormat('!Y-n-j', $selectedYear . '-' . $selectedMonth . '-1');
if (!$monthStart) {
  $monthStart = DateTimeImmutable::createFromFormat('!Y-n-j', $currentYear . '-' . $currentMonth . '-1');
}

$daysInMonth = (int) $monthStart->format('t');
$firstDayOfWeek = (int) $monthStart->format('w');
$displayMonth = $monthStart->format('F');
$displayMonthYear = $monthStart->format('F Y');

$prevMonth = $monthStart->modify('-1 month');
$nextMonth = $monthStart->modify('+1 month');

$prevMonthUrl = '?month=' . $prevMonth->format('n') . '&year=' . $prevMonth->format('Y');
$nextMonthUrl = '?month=' . $nextMonth->format('n') . '&year=' . $nextMonth->format('Y');

$holidaysThisMonth = array_values(array_filter($holidays, static function (array $holiday) use ($selectedYear, $selectedMonth): bool {
  $holidayDate = DateTimeImmutable::createFromFormat('!Y-m-d', $holiday['date']);

  return $holidayDate
    && (int) $holidayDate->format('Y') === $selectedYear
    && (int) $holidayDate->format('n') === $selectedMonth;
}));

usort($holidaysThisMonth, static function (array $a, array $b): int {
  return strcmp($a['date'], $b['date']);
});

$holidayByDay = [];
foreach ($holidaysThisMonth as $holiday) {
  $holidayDate = DateTimeImmutable::createFromFormat('!Y-m-d', $holiday['date']);
  if ($holidayDate) {
    $holidayByDay[(int) $holidayDate->format('j')] = $holiday;
  }
}

$regularCount = count(array_filter($holidaysThisMonth, static function (array $holiday): bool {
  return $holiday['type'] === 'regular';
}));

$specialCount = count(array_filter($holidaysThisMonth, static function (array $holiday): bool {
  return $holiday['type'] === 'special';
}));

$totalCount = count($holidaysThisMonth);

$nextHoliday = null;
foreach ($holidaysThisMonth as $holiday) {
  $holidayDate = DateTimeImmutable::createFromFormat('!Y-m-d', $holiday['date']);

  if ($holidayDate && $holidayDate >= $today) {
    $nextHoliday = $holiday;
    break;
  }
}

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
            <span class="holidays-month-badge-text fw-medium"><?= htmlspecialchars($displayMonthYear, ENT_QUOTES, 'UTF-8') ?></span>
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
                <div class="holidays-overview-number"><?= $totalCount ?></div>
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
                <div class="holidays-overview-number"><?= $regularCount ?></div>
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
                <div class="holidays-overview-number"><?= $specialCount ?></div>
                <div class="holidays-overview-label">Special Non-Working Days</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row g-4">

      <div class="col-12 col-lg-8">
        <div class="card holidays-calendar-card shadow-sm border-0">
          <div class="card-body p-3 p-md-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
              <a class="btn holidays-cal-nav-btn" href="<?= htmlspecialchars($prevMonthUrl, ENT_QUOTES, 'UTF-8') ?>" aria-label="Previous month">
                <i class="bi bi-chevron-left"></i>
              </a>
              <h2 class="h5 fw-semibold mb-0 holidays-cal-title"><?= htmlspecialchars($displayMonthYear, ENT_QUOTES, 'UTF-8') ?></h2>
              <a class="btn holidays-cal-nav-btn" href="<?= htmlspecialchars($nextMonthUrl, ENT_QUOTES, 'UTF-8') ?>" aria-label="Next month">
                <i class="bi bi-chevron-right"></i>
              </a>
            </div>

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
              <?php for ($empty = 0; $empty < $firstDayOfWeek; $empty++): ?>
                <div class="holidays-calendar-day holidays-calendar-day--empty"></div>
              <?php endfor; ?>

              <?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
                <?php
                $holidayForDay = $holidayByDay[$day] ?? null;
                $isHoliday = $holidayForDay !== null;
                $dotClass = '';

                if ($isHoliday) {
                    $dotClass = $holidayForDay['type'] === 'regular' ? 'holidays-cal-dot--regular' : 'holidays-cal-dot--special';
                }
                ?>
                <div class="holidays-calendar-day<?= $isHoliday ? ' holidays-calendar-day--holiday' : '' ?>">
                  <span class="holidays-cal-day-num"><?= $day ?></span>
                  <?php if ($isHoliday): ?>
                    <span class="holidays-cal-dot <?= $dotClass ?>"></span>
                  <?php endif; ?>
                </div>
              <?php endfor; ?>

              <?php
              $renderedCells = $firstDayOfWeek + $daysInMonth;
              $trailingEmptyCells = (7 - ($renderedCells % 7)) % 7;
              ?>
              <?php for ($empty = 0; $empty < $trailingEmptyCells; $empty++): ?>
                <div class="holidays-calendar-day holidays-calendar-day--empty"></div>
              <?php endfor; ?>

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
                  <?php if ($nextHoliday !== null): ?>
                    <?php
                    $nextHolidayDate = DateTimeImmutable::createFromFormat('!Y-m-d', $nextHoliday['date']);
                    $isRegularHoliday = $nextHoliday['type'] === 'regular';
                    ?>
                    <div class="holidays-next-title mb-2"><?= htmlspecialchars($nextHolidayDate ? $nextHolidayDate->format('M j') : '', ENT_QUOTES, 'UTF-8') ?> — <?= htmlspecialchars($nextHoliday['name'], ENT_QUOTES, 'UTF-8') ?></div>
                    <span class="badge <?= $isRegularHoliday ? 'holidays-badge-regular' : 'holidays-badge-special' ?>"><?= $isRegularHoliday ? 'Regular Holiday' : 'Special Non-Working Holiday' ?></span>
                  <?php else: ?>
                    <div class="holidays-next-title mb-2">No holiday for this month</div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>


          <div class="card holidays-list-card shadow-sm border-0">
            <div class="card-body p-4">
              <h3 class="h6 fw-semibold holidays-list-heading mb-4">Holiday List for <?= htmlspecialchars($displayMonth, ENT_QUOTES, 'UTF-8') ?></h3>

              <?php if (empty($holidaysThisMonth)): ?>
                <div class="holidays-list-item holidays-list-item--last">
                  <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                    <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                      <span class="holidays-list-name">No holidays listed for this month.</span>
                    </div>
                  </div>
                </div>
              <?php else: ?>
                <?php foreach ($holidaysThisMonth as $index => $holiday): ?>
                  <?php
                  $holidayDate = DateTimeImmutable::createFromFormat('!Y-m-d', $holiday['date']);
                  $isLastHoliday = $index === array_key_last($holidaysThisMonth);
                  $isRegularHoliday = $holiday['type'] === 'regular';
                  ?>
                  <div class="holidays-list-item<?= $isLastHoliday ? ' holidays-list-item--last' : '' ?>">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 holidays-list-row">
                      <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0 flex-nowrap holidays-list-main">
                        <div class="holidays-list-date-badge flex-shrink-0">
                          <span class="holidays-list-date-text"><?= htmlspecialchars($holidayDate ? $holidayDate->format('M j') : '', ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <span class="holidays-list-name"><?= htmlspecialchars($holiday['name'], ENT_QUOTES, 'UTF-8') ?></span>
                      </div>
                      <span class="badge <?= $isRegularHoliday ? 'holidays-badge-regular' : 'holidays-badge-special' ?> holidays-list-type-badge align-self-start align-self-sm-center"><?= $isRegularHoliday ? 'Regular' : 'Special' ?></span>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>

            </div>
          </div>

        </div>
      </div>

    </div>

  </section>

  <?php require __DIR__ . '/includes/footer.php'; ?>
</main>
