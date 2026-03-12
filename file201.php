<?php
require_once __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'file-201';
$additionalStylesheets = ['hr.css'];

$employees = $file201Employees ?? [];
$jobTitles = $file201JobTitles ?? [];
$jobTypes = $file201JobTypes ?? [];
$employmentStatuses = $file201EmploymentStatuses ?? [];
$genders = $file201Genders ?? [];
$civilStatuses = $file201CivilStatuses ?? [];

$activeEmployees = array_values(array_filter(
  $employees,
  static fn(array $employee): bool => (string) ($employee['status'] ?? '') === 'Active'
));

$inactiveEmployees = array_values(array_filter(
  $employees,
  static fn(array $employee): bool => (string) ($employee['status'] ?? '') === 'Inactive'
));

$selectedEmployee = $activeEmployees[0] ?? [];

$h = static fn(?string $value): string => htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
$nameOf = static fn(array $employee): string => trim(((string) ($employee['firstName'] ?? '')) . ' ' . ((string) ($employee['lastName'] ?? '')));
$formatDate = static function (?string $date): string {
  if (!$date) {
    return '-';
  }

  $dateObj = date_create($date);
  return $dateObj ? date_format($dateObj, 'm/d/Y') : '-';
};

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section class="container-fluid px-3 px-md-4 py-3 file201-page" aria-label="Employees 201 File View">

    <div class="card file201-panel border-0 mb-3">
      <div class="card-body px-3 px-md-4 py-3 py-md-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <div>
            <h1 class="h3 mb-2 text-white">Employees 201 File</h1>
            <p class="mb-0 text-muted">Manage employee records, identification details, and employment data.</p>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-file201-secondary" type="button" data-bs-toggle="modal" data-bs-target="#inactiveModal">
              <i class="bi bi-people me-1"></i> Inactive Employees
            </button>
            <button class="btn btn-file201-primary" type="button" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
              <i class="bi bi-person-plus me-1"></i> Add New Employee
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="card file201-panel border-0 mb-3">
      <div class="card-body px-3 px-md-4 py-3">
        <form>
          <div class="file201-search-wrap">
            <label for="search201" class="visually-hidden">Search employee</label>
            <div class="input-group file201-search">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input id="search201" type="text" class="form-control" placeholder="Search employee name, ID, email, or phone..." />
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card file201-panel border-0 position-relative">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-identification" checked>
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-contact">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-personal">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-employment">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-accounts">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-compensation">
      <input class="file201-tab-input" type="radio" name="file201-tab" id="tab-credits">

      <div class="card-header border-bottom-0 px-3 px-md-4 py-3 pb-2">
        <div class="file201-tabs-wrapper">
          <div class="file201-tabs-scroll" role="navigation" aria-label="Employee table tabs">
            <ul class="nav nav-pills file201-tabs flex-nowrap mb-0">
              <li class="nav-item"><label class="nav-link" for="tab-identification">Identification</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-contact">Contact Information</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-personal">Personal Information</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-employment">Employment Details</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-accounts">Account Numbers</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-compensation">Compensation &amp; Benefits</label></li>
              <li class="nav-item"><label class="nav-link" for="tab-credits">Credit Balance</label></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive file201-tab-pane tab-identification">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Employee #</th>
                <th>Username</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr>
                  <td style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#identiModal"><?= $h($nameOf($employee)) ?></td>
                  <td style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#identiModal"><?= $h((string) ($employee['employeeNumber'] ?? '-')) ?></td>
                  <td style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#identiModal"><?= $h((string) ($employee['username'] ?? '-')) ?></td>
                  <td>
                    <div class="d-inline-flex align-items-center gap-2 position-relative z-3">
                      <span>........</span>
                      <button class="btn btn-sm btn-file201-secondary py-0 px-2" type="button" data-bs-toggle="modal" data-bs-target="#identiModal" aria-label="Open employee identification details">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-contact">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Contact #</th>
                <th>Work Email</th>
                <th>Personal Email</th>
                <th>Present Address</th>
                <th>Permanent Address</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#contactModal">
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td><?= $h((string) ($employee['contactNumber'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['workEmail'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['personalEmail'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['presentAddress'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['permanentAddress'] ?? '-')) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-personal">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Birth Date</th>
                <th>Birth Place</th>
                <th>Gender</th>
                <th>Civil Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#personalModal">
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td><?= $h($formatDate((string) ($employee['birthDate'] ?? ''))) ?></td>
                  <td><?= $h((string) ($employee['birthPlace'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['gender'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['civilStatus'] ?? '-')) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-employment">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Start Date <i class="bi bi-arrow-down-up ms-1"></i></th>
                <th>Job Title</th>
                <th>Job Type</th>
                <th>Employment Status <i class="bi bi-arrow-down-up ms-1"></i></th>
                <th>Regularization Date <i class="bi bi-arrow-down-up ms-1"></i></th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#empModal">
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td><?= $h($formatDate((string) ($employee['startDate'] ?? ''))) ?></td>
                  <td><?= $h((string) ($employee['jobTitle'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['jobType'] ?? '-')) ?></td>
                  <td><span class="badge file201-badge-status"><?= $h((string) ($employee['employmentStatus'] ?? '-')) ?></span></td>
                  <td><?= $h($formatDate((string) ($employee['regularizationDate'] ?? ''))) ?></td>
                  <td><span class="badge file201-badge-active">Active</span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-accounts">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>SSS</th>
                <th>HDMF</th>
                <th>PHIC</th>
                <th>Tax</th>
                <th>Payroll</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#accNumModal">
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td><?= $h((string) ($employee['sss'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['hdmf'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['phic'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['tax'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['payroll'] ?? '-')) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-compensation">
          <table class="table table-borderless file201-table align-middle mb-0">
            <colgroup>
              <col style="width:22%">
              <col style="width:13%">
              <col style="width:13%">
              <col style="width:13%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:10%">
              <col style="width:9%">
            </colgroup>
            <thead>
              <tr>
                <th rowspan="2" class="text-nowrap">Employee Name</th>
                <th colspan="3" class="text-center file201-comp-group">Earnings</th>
                <th colspan="4" class="text-center file201-comp-group border-start border-secondary-subtle">Government Contributions</th>
              </tr>
              <tr>
                <th class="text-end fw-semibold text-primary">Salary (&#8369;) <i class="bi bi-arrow-down-up ms-1"></i></th>
                <th class="text-end">Attendance<br><small class="text-muted">Bonus (&#8369;)</small></th>
                <th class="text-end">VB Rate (&#8369;)</th>
                <th class="text-end border-start border-secondary-subtle">SSS<br><small class="text-muted">Contribution (&#8369;)</small></th>
                <th class="text-end">HDMF<br><small class="text-muted">Contribution (&#8369;)</small></th>
                <th class="text-end">PHIC<br><small class="text-muted">Contribution (&#8369;)</small></th>
                <th class="text-end">COOP<br><small class="text-muted">Contribution (&#8369;)</small></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#compBenModal">
                  <td class="text-nowrap"><?= $h($nameOf($employee)) ?></td>
                  <td class="text-end fw-semibold text-primary"><?= number_format((float) ($employee['salary'] ?? 0), 2) ?></td>
                  <td class="text-end"><?= number_format((float) ($employee['attendanceBonus'] ?? 0), 2) ?></td>
                  <td class="text-end"><?= number_format((float) ($employee['vbRate'] ?? 0), 2) ?></td>
                  <td class="text-end border-start border-secondary-subtle"><?= number_format((float) ($employee['sssContribution'] ?? 0), 2) ?></td>
                  <td class="text-end"><?= number_format((float) ($employee['hdmfContribution'] ?? 0), 2) ?></td>
                  <td class="text-end"><?= number_format((float) ($employee['phicContribution'] ?? 0), 2) ?></td>
                  <td class="text-end"><?= number_format((float) ($employee['coopContribution'] ?? 0), 2) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="table-responsive file201-tab-pane tab-credits">
          <table class="table table-borderless file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th class="text-center" colspan="3">Immediate Leave</th>
                <th class="text-center" colspan="3">Planned Leave</th>
              </tr>
              <tr>
                <th></th>
                <th class="text-center">Accrued</th>
                <th class="text-center">Used</th>
                <th class="text-center">Balance</th>
                <th class="text-center">Accrued</th>
                <th class="text-center">Used</th>
                <th class="text-center">Balance</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activeEmployees as $employee): ?>
                <?php
                  $immediateBalance = (float) ($employee['immediateLeaveAccrued'] ?? 0) - (float) ($employee['immediateLeaveUsed'] ?? 0);
                  $plannedBalance = (float) ($employee['plannedLeaveAccrued'] ?? 0) - (float) ($employee['plannedLeaveUsed'] ?? 0);
                ?>
                <tr style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#creditBalModal">
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td class="text-center"><?= number_format((float) ($employee['immediateLeaveAccrued'] ?? 0), 0) ?></td>
                  <td class="text-center"><?= number_format((float) ($employee['immediateLeaveUsed'] ?? 0), 0) ?></td>
                  <td class="text-center text-info fw-semibold"><?= number_format($immediateBalance, 0) ?></td>
                  <td class="text-center"><?= number_format((float) ($employee['plannedLeaveAccrued'] ?? 0), 0) ?></td>
                  <td class="text-center"><?= number_format((float) ($employee['plannedLeaveUsed'] ?? 0), 0) ?></td>
                  <td class="text-center text-info fw-semibold"><?= number_format($plannedBalance, 0) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require __DIR__ . '/partials/modals/file201-identi-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-contact-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-personal-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-emp-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-accNum-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-compBen-modal.php'; ?>
<?php require __DIR__ . '/partials/modals/file201-creditBal-modal.php'; ?>

<?php require __DIR__ . '/partials/modals/file201-inactive-modal.php'; ?>

<?php require __DIR__ . '/partials/modals/file201-add-modal.php'; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
