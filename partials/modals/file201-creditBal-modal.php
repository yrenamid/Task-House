<?php
$immediateBalanceModal = (float) ($selectedEmployee['immediateLeaveAccrued'] ?? 0) - (float) ($selectedEmployee['immediateLeaveUsed'] ?? 0);
$plannedBalanceModal = (float) ($selectedEmployee['plannedLeaveAccrued'] ?? 0) - (float) ($selectedEmployee['plannedLeaveUsed'] ?? 0);
?>
<div class="modal fade" id="creditBalModal" tabindex="-1" aria-labelledby="creditBalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content file201-modal card border-0">
      <div class="card-header d-flex justify-content-between align-items-start p-4">
        <div>
          <h2 class="h5 mb-1 text-white" id="creditBalModalLabel">Credit Balance</h2>
          <p class="mb-0 text-muted"><?= htmlspecialchars(((string) ($selectedEmployee['firstName'] ?? '')) . ' ' . ((string) ($selectedEmployee['lastName'] ?? '')), ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <button type="button" class="btn btn-sm btn-file201-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="card-body p-4">
        <div class="row g-3">
          <div class="col-12"><h3 class="h6 text-white">Immediate Leave</h3></div>
          <div class="col-12 col-md-4"><label class="form-label">Accrued</label><input class="form-control" type="text" value="<?= number_format((float) ($selectedEmployee['immediateLeaveAccrued'] ?? 0), 0) ?>" /></div>
          <div class="col-12 col-md-4"><label class="form-label">Used</label><input class="form-control" type="text" value="<?= number_format((float) ($selectedEmployee['immediateLeaveUsed'] ?? 0), 0) ?>" /></div>
          <div class="col-12 col-md-4"><label class="form-label">Balance</label><input class="form-control" type="text" value="<?= number_format($immediateBalanceModal, 0) ?>" /></div>
          <div class="col-12 mt-3"><h3 class="h6 text-white">Planned Leave</h3></div>
          <div class="col-12 col-md-4"><label class="form-label">Accrued</label><input class="form-control" type="text" value="<?= number_format((float) ($selectedEmployee['plannedLeaveAccrued'] ?? 0), 0) ?>" /></div>
          <div class="col-12 col-md-4"><label class="form-label">Used</label><input class="form-control" type="text" value="<?= number_format((float) ($selectedEmployee['plannedLeaveUsed'] ?? 0), 0) ?>" /></div>
          <div class="col-12 col-md-4"><label class="form-label">Balance</label><input class="form-control" type="text" value="<?= number_format($plannedBalanceModal, 0) ?>" /></div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end gap-2 p-4"><button type="button" class="btn btn-file201-primary">Submit</button></div>
    </div>
  </div>
</div>
