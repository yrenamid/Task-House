<div class="modal fade" id="compBenModal" tabindex="-1" aria-labelledby="compBenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content file201-modal card border-0">
      <div class="card-header d-flex justify-content-between align-items-start p-4">
        <div>
          <h2 class="h5 mb-1 text-white" id="compBenModalLabel">Compensation & Benefits</h2>
          <p class="mb-0 text-muted"><?= htmlspecialchars(((string) ($selectedEmployee['firstName'] ?? '')) . ' ' . ((string) ($selectedEmployee['lastName'] ?? '')), ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <button type="button" class="btn btn-sm btn-file201-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="card-body p-4">
        <div class="row g-3">
          <div class="col-12 col-md-6"><label class="form-label">Salary</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['salary'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">Attendance Bonus</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['attendanceBonus'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">VB Rate</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['vbRate'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">SSS Contribution</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['sssContribution'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">HDMF Contribution</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['hdmfContribution'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">PHIC Contribution</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['phicContribution'] ?? 0), 2) ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">COOP Contribution</label><input class="form-control" type="text" value="PHP <?= number_format((float) ($selectedEmployee['coopContribution'] ?? 0), 2) ?>" /></div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2 p-4"><button type="button" class="btn btn-file201-primary">Submit</button></div>
    </div>
  </div>
</div>
