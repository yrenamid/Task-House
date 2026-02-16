<div id="break-section" class="card dash-card border-0 shadow-sm mt-4 overflow-hidden">
	<div class="panel-header panel-header--teal px-3 px-md-4 py-3">
		<div class="d-flex align-items-center gap-2">
			<i class="bi bi-cup-hot-fill"></i>
			<div class="fw-semibold">Break Management</div>
		</div>
	</div>

	<div class="card-body p-3 p-md-4">
		<form class="d-grid gap-3">

			<div>
				<label class="form-label fw-semibold app-muted">Select Break Type</label>
				<select class="form-select control-app">
					<option value="">Choose a break type...</option>
					<option value="15min">☕ 15 Minutes - Short Break</option>
					<option value="30min">☕ 30 Minutes - Coffee Break</option>
					<option value="1hour">🍽️ 1 Hour - Lunch Break</option>+
				</select>
			</div>

			<div class="info-box info-box--primary">
				<div class="small info-box-title--primary">
					<strong>Note:</strong> Timer goes here.
				</div>
				<div class="small mt-2 app-muted">
					Break timer start/stop.
				</div>
			</div>

			<button
				type="button"
				class="btn btn-lg btn-teal-app"
				
			>
				<i class="bi bi-play-fill me-2"></i>
				Start Break
			</button>
		</form>
	</div>
</div>
