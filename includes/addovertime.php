<div class="modal fade" id="addOvertimeModal" tabindex="-1" aria-labelledby="addOvertimeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content modal-app ot-modal">
			<div class="modal-header panel-header panel-header--teal">
				<div class="d-flex align-items-center gap-2">
					<i class="bi bi-clock-fill"></i>
					<h5 class="modal-title fw-bold" id="addOvertimeModalLabel">Add Overtime</h5>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<div class="info-box info-box--primary mb-4">
					<div class="row g-3">
						<div class="col-12 col-md-6">
							<div class="text-uppercase" style="letter-spacing:.08em; font-size:.75rem; opacity:.8;">Work Date</div>
							<div class="fw-semibold">—</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="text-uppercase" style="letter-spacing:.08em; font-size:.75rem; opacity:.8;">Scheduled Shift</div>
							<div class="fw-semibold" style="font-family:Bahnschrift, system-ui;">—</div>
						</div>
					</div>
				</div>

				<div class="mb-4">
					<h6 class="fw-bold mb-3">Overtime Details</h6>

					<div class="mb-3">
						<label class="form-label fw-semibold app-muted">Overtime Type <span class="text-danger">*</span></label>
						<div class="ot-type row g-2">
							<div class="col-12 col-sm-6">
								<input class="btn-check" type="radio" name="overtimeType" id="otBefore" autocomplete="off">
								<label class="btn w-100 ot-type-btn" for="otBefore">
									<div class="d-flex align-items-center gap-2">
										<span class="ot-dot" aria-hidden="true"></span>
										<span class="small">Before Shift</span>
									</div>
								</label>
							</div>
							<div class="col-12 col-sm-6">
								<input class="btn-check" type="radio" name="overtimeType" id="otAfter" autocomplete="off" checked>
								<label class="btn w-100 ot-type-btn" for="otAfter">
									<div class="d-flex align-items-center gap-2">
										<span class="ot-dot" aria-hidden="true"></span>
										<span class="small">After Shift</span>
									</div>
								</label>
							</div>
					
						</div>
						<div class="form-text app-muted">Select when the overtime occurred relative to your scheduled shift.</div>
					</div>

					<div class="row g-3">
						<div class="col-12 col-sm-6">
							<label class="form-label fw-semibold app-muted"><i class="bi bi-clock me-2"></i>Overtime Time In <span class="text-danger">*</span></label>
							<input type="time" class="form-control control-app" />
						</div>
						<div class="col-12 col-sm-6">
							<label class="form-label fw-semibold app-muted"><i class="bi bi-clock me-2"></i>Overtime Time Out <span class="text-danger">*</span></label>
							<input type="time" class="form-control control-app" />
						</div>
					</div>

					<div class="mt-3">
						<label class="form-label fw-semibold app-muted">Total Overtime Hours (Auto-calculated)</label>
						<div class="ot-total control-app rounded-3 px-3 py-2">
							<div class="fw-bold" style="color: var(--teal); font-family:Bahnschrift, system-ui; font-size:1.2rem;">0h 00m</div>
						</div>
					</div>
				</div>

				<div class="mb-4">
					<label class="form-label fw-semibold app-muted"><i class="bi bi-file-text me-2"></i>Reason for Overtime <span class="text-danger">*</span></label>
					<textarea rows="4" class="form-control control-app" placeholder="Please provide a detailed reason for the overtime request..."></textarea>
					<div class="d-flex gap-2 mt-2">
						<i class="bi bi-exclamation-circle" style="color:rgba(42,108,246,.95);"></i>
						<div class="small app-muted">Minimum 20 characters required.</div>
					</div>
				</div>

				<div class="ot-summary info-box mb-0">
					<div class="d-flex align-items-center gap-2 mb-3" style="color:rgba(0,184,159,.95);">
						<i class="bi bi-calendar3"></i>
						<div class="fw-bold">Overtime Summary</div>
					</div>
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="small app-muted">Overtime Date:</div>
						<div class="fw-semibold">—</div>
					</div>
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="small app-muted">Overtime Time Range:</div>
						<div class="fw-semibold" style="font-family:Bahnschrift, system-ui;">—</div>
					</div>
					<div class="d-flex justify-content-between align-items-center pt-2" style="border-top:1px solid rgba(0,184,159,.30);">
						<div class="small app-muted">Total Overtime Hours:</div>
						<div class="fw-bold" style="color: var(--teal); font-family:Bahnschrift, system-ui; font-size:1.1rem;">0h 00m</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-teal-app" data-bs-dismiss="modal">
					<i class="bi bi-check-circle-fill me-2"></i>
					Submit Overtime
				</button>
			</div>
		</div>
	</div>
</div>
