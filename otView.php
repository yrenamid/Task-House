<?php
$pageTitle        = 'Task House';
$activeNav        = 'overtime';
$additionalStylesheets = ['hr.css'];

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section class="container-fluid px-3 px-md-4 py-3 ot-page" aria-label="Overtime requests management">

    <div class="card ot-panel shadow-sm border-0 mb-3">
      <div class="card-body px-3 px-md-4 py-3 py-md-4">
        <div>
          <h1 class="h3 mb-2 text-white">Overtime</h1>
          <p class="mb-0 text-white-50">Review and manage overtime requests submitted by employees.</p>
        </div>
      </div>
    </div>

    <div class="card ot-panel shadow-sm border-0">
      <div class="card-body p-3 p-md-4">

        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">

          <div class="ot-tabs-bg rounded-3 p-2 d-inline-flex gap-2 flex-wrap">
            <ul class="nav ot-tabs m-0 p-0 gap-2 flex-nowrap" id="otTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link ot-tabs__btn active"
                  id="ot-pending-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#ot-pending-pane"
                  type="button"
                  role="tab"
                  aria-controls="ot-pending-pane"
                  aria-selected="true"
                >
                  Pending <span class="ot-tab-count ms-1">3</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link ot-tabs__btn"
                  id="ot-approved-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#ot-approved-pane"
                  type="button"
                  role="tab"
                  aria-controls="ot-approved-pane"
                  aria-selected="false"
                >
                  Approved <span class="ot-tab-count ms-1">3</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link ot-tabs__btn"
                  id="ot-declined-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#ot-declined-pane"
                  type="button"
                  role="tab"
                  aria-controls="ot-declined-pane"
                  aria-selected="false"
                >
                  Declined <span class="ot-tab-count ms-1">2</span>
                </button>
              </li>
            </ul>
          </div>

          <div class="ot-search-wrap">
            <label for="otSearch" class="visually-hidden">Search VA name or notes</label>
            <div class="input-group ot-search">
              <span class="input-group-text">
                <i class="bi bi-search"></i>
              </span>
              <input
                id="otSearch"
                type="text"
                class="form-control"
                placeholder="Search VA name or notes..."
              />
            </div>
          </div>

        </div>

        <div class="tab-content" id="otTabContent">

          <div
            class="tab-pane fade show active"
            id="ot-pending-pane"
            role="tabpanel"
            aria-labelledby="ot-pending-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 ot-table-wrap">
              <table class="table ot-table align-middle mb-0">
                <thead>
                  <tr>
                    <th class="text-center" style="width:3.5rem;">#</th>
                    <th>VA Name</th>
                    <th>Shift Date</th>
                    <th>Excess Hours</th>
                    <th>Total Overtime</th>
                    <th>Type</th>
                    <th>Reason / Notes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center text-secondary">1</td>
                    <td class="text-white fw-medium">Rachel Bustilang</td>
                    <td class="text-light-secondary">Mar 8, 2026</td>
                    <td class="text-light-secondary">0:15</td>
                    <td class="text-white fw-semibold">4.00h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Year-end report preparation and documentation</td>
                  </tr>
                  <tr>
                    <td class="text-center text-secondary">2</td>
                    <td class="text-white fw-medium">Jenrill Jun Barlit</td>
                    <td class="text-light-secondary">Mar 7, 2026</td>
                    <td class="text-light-secondary">0:30</td>
                    <td class="text-white fw-semibold">4.50h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Client presentation preparation and meeting follow-up</td>
                  </tr>
                  <tr>
                    <td class="text-center text-secondary">3</td>
                    <td class="text-white fw-medium">Maria Santos</td>
                    <td class="text-light-secondary">Mar 9, 2026</td>
                    <td class="text-light-secondary">0:45</td>
                    <td class="text-white fw-semibold">3.75h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Urgent customer support escalation</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="ot-approved-pane"
            role="tabpanel"
            aria-labelledby="ot-approved-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 ot-table-wrap">
              <table class="table ot-table align-middle mb-0">
                <thead>
                  <tr>
                    <th class="text-center" style="width:3.5rem;">#</th>
                    <th>VA Name</th>
                    <th>Shift Date</th>
                    <th>Excess Hours</th>
                    <th>Total Overtime</th>
                    <th>Type</th>
                    <th>Reason / Notes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center text-secondary">1</td>
                    <td class="text-white fw-medium">Renz Montañ Bassons</td>
                    <td class="text-light-secondary">Mar 6, 2026</td>
                    <td class="text-light-secondary">1:00</td>
                    <td class="text-white fw-semibold">5.00h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Emergency system maintenance and server updates</td>
                  </tr>
                  <tr>
                    <td class="text-center text-secondary">2</td>
                    <td class="text-white fw-medium">John Cruz</td>
                    <td class="text-light-secondary">Mar 5, 2026</td>
                    <td class="text-light-secondary">0:30</td>
                    <td class="text-white fw-semibold">4.50h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Project deadline completion</td>
                  </tr>
                  <tr>
                    <td class="text-center text-secondary">3</td>
                    <td class="text-white fw-medium">Sarah Lee</td>
                    <td class="text-light-secondary">Mar 4, 2026</td>
                    <td class="text-light-secondary">0:20</td>
                    <td class="text-white fw-semibold">3.33h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Training session extension</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="ot-declined-pane"
            role="tabpanel"
            aria-labelledby="ot-declined-tab"
            tabindex="0"
          >
            <div class="table-responsive rounded-3 ot-table-wrap">
              <table class="table ot-table align-middle mb-0">
                <thead>
                  <tr>
                    <th class="text-center" style="width:3.5rem;">#</th>
                    <th>VA Name</th>
                    <th>Shift Date</th>
                    <th>Excess Hours</th>
                    <th>Total Overtime</th>
                    <th>Type</th>
                    <th>Reason / Notes</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center text-secondary">1</td>
                    <td class="text-white fw-medium">David Garcia</td>
                    <td class="text-light-secondary">Mar 3, 2026</td>
                    <td class="text-light-secondary">0:10</td>
                    <td class="text-white fw-semibold">2.00h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Document processing</td>
                  </tr>
                  <tr>
                    <td class="text-center text-secondary">2</td>
                    <td class="text-white fw-medium">Anna Rivera</td>
                    <td class="text-light-secondary">Mar 2, 2026</td>
                    <td class="text-light-secondary">0:15</td>
                    <td class="text-white fw-semibold">2.50h</td>
                    <td><span class="ot-type-badge">Overtime</span></td>
                    <td class="text-light-secondary ot-col-notes">Insufficient justification provided</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
