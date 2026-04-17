<div id="break-section" class="card dash-card border-0 shadow-sm mt-4 overflow-hidden">
	<div class="panel-header panel-header--teal px-3 px-md-4 py-3">
		<div class="d-flex align-items-center gap-2">
			<i class="bi bi-cup-hot-fill"></i>
			<div class="fw-semibold">Break Management</div>
		</div>
	</div>

	<div class="card-body my-2 p-3 p-md-4">
		<form class="row w-100 g-3 gap-3 align-items-end align-items-md-stretch flex-column flex-md-row flex-md-nowrap">

			<div class="col-12 col-md d-flex flex-column">
				<label class="form-label fw-semibold app-muted small mb-2">Select Break Type</label>
				<select class="form-select form-select-sm control-app w-100">
					<option value="">Choose a break type...</option>
					<option value="15min">☕ 15 Minutes - Short Break</option>
					<option value="30min">☕ 30 Minutes - Coffee Break</option>
					<option value="1hour">🍽️ 1 Hour - Lunch Break</option>
				</select>
			</div>

			<div class="col-12 col-md-3 col-lg-3 mt-2 mt-md-0 d-flex">
				<div class="info-box info-box--primary px-3 py-2 d-flex flex-column justify-content-center h-100 text-center w-100">
				<div class="small info-box-title--primary app-muted fw-semibold mb-1">
					Break Timer
				</div>
				<div class="fw-semibold fs-5 lh-1">
					00:00:00
				</div>
				</div>
			</div>

			<div class="col-12 col-md-auto d-grid d-md-flex mt-2 mt-md-0">
				<button
					type="button"
					class="btn fw-semibold btn-teal-app h-100 d-flex align-items-center justify-content-center"
					data-bs-toggle="modal"
					data-bs-target="#breakModal"
					aria-label="Start Break"
				>
					<i class="bi bi-play-fill me-2"></i>
					Start Break
				</button>
			</div>
		</form>
	</div>
</div>

<!-- ===== Break Modal ===== -->
<div 
	class="modal fade" 
	id="breakModal" 
	tabindex="-1" 
	aria-labelledby="breakModalTitle" 
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content break-modal-content">
			<div class="modal-header break-modal-header border-0 pb-0">
				<h5 class="modal-title fw-bold" id="breakModalTitle">
					<i class="bi bi-cup-hot-fill me-2"></i>Break Timer
				</h5>
				<button 
					type="button" 
					class="btn-close btn-close-white" 
					data-bs-dismiss="modal" 
					aria-label="Close"
				></button>
			</div>

			<div class="modal-body break-modal-body d-flex flex-column align-items-center justify-content-center py-4 py-md-5">
				<div class="break-timer-display text-center mb-4">
					<div class="break-timer-value fw-bold display-4 mb-2">
						<span id="breakTimerDisplay">00:00:00</span>
					</div>
					<p class="app-muted small mb-0">Break Duration</p>
				</div>

				<div class="break-status-info text-center mb-4 w-100">
					<div class="alert alert-info-custom border-0 mb-0 px-3 py-2">
						<p class="mb-0 small">
							<i class="bi bi-info-circle me-2"></i>
							Your break time is being tracked
						</p>
					</div>
				</div>
			</div>


			<div class="modal-footer break-modal-footer border-0 pt-0 d-flex justify-content-center">
				<button 
					type="button" 
					class="btn btn-success btn-lg fw-semibold d-flex align-items-center justify-content-center px-4"
					data-bs-dismiss="modal"
					aria-label="Back to Work"
				>
					<i class="bi bi-check-circle-fill me-2"></i>
					Back to Work
				</button>
			</div>
		</div>
	</div>
</div>
