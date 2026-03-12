<div class="modal fade" id="inactiveModal" tabindex="-1" aria-labelledby="inactiveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content file201-modal card border-0">
      <div class="card-header d-flex justify-content-between align-items-start p-4">
        <div>
          <h2 class="h5 mb-1 text-white" id="inactiveModalLabel">Inactive Employees</h2>
          <p class="mb-0 text-muted"><?= number_format(count($inactiveEmployees)) ?> inactive employee(s)</p>
        </div>
        <button type="button" class="btn btn-sm btn-file201-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>

      <div class="card-body p-4">
        <form class="row g-2 align-items-center mb-3">
          <div class="col-12 col-lg-5">
            <div class="input-group file201-search">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Search inactive employees" />
            </div>
          </div>
          <div class="col-auto"><button type="button" class="btn btn-file201-secondary">Search</button></div>
          <div class="col-auto"><button type="button" class="btn btn-outline-light">Clear</button></div>
        </form>

        <div class="table-responsive">
          <table class="table file201-table align-middle mb-0">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>Job Title</th>
                <th>Job Type</th>
                <th>Employment Status</th>
                <th>Regularization Date</th>
                <th>Effective Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($inactiveEmployees as $employee): ?>
                <tr>
                  <td><?= $h($nameOf($employee)) ?></td>
                  <td><?= $h($formatDate((string) ($employee['startDate'] ?? ''))) ?></td>
                  <td><?= $h((string) ($employee['jobTitle'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['jobType'] ?? '-')) ?></td>
                  <td><?= $h((string) ($employee['employmentStatus'] ?? '-')) ?></td>
                  <td><?= $h($formatDate((string) ($employee['regularizationDate'] ?? ''))) ?></td>
                  <td><?= $h($formatDate((string) ($employee['effectiveDate'] ?? ''))) ?></td>
                  <td><span class="badge file201-badge-inactive">Inactive</span></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
