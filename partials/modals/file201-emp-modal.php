<div class="modal fade" id="empModal" tabindex="-1" aria-labelledby="empModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content file201-modal card border-0">
      <div class="card-header d-flex justify-content-between align-items-start p-4">
        <div>
          <h2 class="h5 mb-1 text-white" id="empModalLabel">Employment Details</h2>
          <p class="mb-0 text-muted"><?= htmlspecialchars(((string) ($selectedEmployee['firstName'] ?? '')) . ' ' . ((string) ($selectedEmployee['lastName'] ?? '')), ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <button type="button" class="btn btn-sm btn-file201-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="card-body p-4">
        <div class="row g-3">
          <div class="col-12 col-md-6"><label class="form-label">Start Date</label><input class="form-control" type="text" value="<?= htmlspecialchars($formatDate((string) ($selectedEmployee['startDate'] ?? '')), ENT_QUOTES, 'UTF-8') ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">Job Title</label><input class="form-control" type="text" value="<?= htmlspecialchars((string) ($selectedEmployee['jobTitle'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">Job Type</label><input class="form-control" type="text" value="<?= htmlspecialchars((string) ($selectedEmployee['jobType'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">Employment Status</label><input class="form-control" type="text" value="<?= htmlspecialchars((string) ($selectedEmployee['employmentStatus'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" /></div>
          <div class="col-12 col-md-6"><label class="form-label">Regularization Date</label><input class="form-control" type="text" value="<?= htmlspecialchars($formatDate((string) ($selectedEmployee['regularizationDate'] ?? '')), ENT_QUOTES, 'UTF-8') ?>" /></div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2 p-4"><button type="button" class="btn btn-file201-primary">Submit</button></div>
    </div>
  </div>
</div>
