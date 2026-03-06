<?php

if (!function_exists('renderAddHoursModal')) {
	function renderAddHoursModal(?string $selectedAccountName = null): void
	{
		$accountName = trim((string) ($selectedAccountName ?? 'TechCorp Inc.'));
		if ($accountName === '') {
			$accountName = 'TechCorp Inc.';
		}
		?>
		<div class="modal fade manager-add-hours-modal" id="addHoursModal" tabindex="-1" aria-labelledby="addHoursModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content manager-dark-modal">
					<div class="modal-header border-0">
						<h5 class="modal-title" id="addHoursModalLabel">Add Hours</h5>
						<button type="button" class="btn-close manager-dark-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="manager-add-hours-description mb-4">Add additional hours to the account balance.</p>

						<div class="mb-3">
							<label class="form-label" for="accountName">Account Name</label>
							<input
								type="text"
								id="accountName"
								class="form-control manager-add-hours-input manager-add-hours-input-disabled"
								value="<?= htmlspecialchars($accountName, ENT_QUOTES, 'UTF-8') ?>"
								disabled
							>
						</div>

						<div class="row g-3 mb-3">
							<div class="col-md-6">
								<label class="form-label" for="hours">Hours</label>
								<input type="number" id="hours" class="form-control manager-add-hours-input" min="0" placeholder="0">
							</div>
							<div class="col-md-6">
								<label class="form-label" for="minutes">Minutes</label>
								<input type="number" id="minutes" class="form-control manager-add-hours-input" min="0" max="59" placeholder="0">
							</div>
						</div>

						<fieldset>
							<legend class="form-label mb-2">Status</legend>
							<div class="form-check mb-2">
								<input class="form-check-input" type="radio" name="addHoursStatus" id="statusPayment" checked>
								<label class="form-check-label" for="statusPayment">Payment</label>
							</div>
							<div class="form-check mb-2">
								<input class="form-check-input" type="radio" name="addHoursStatus" id="statusCredit">
								<label class="form-check-label" for="statusCredit">Credit</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="addHoursStatus" id="statusFreeHours">
								<label class="form-check-label" for="statusFreeHours">Free Hours</label>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer border-0">
						<button type="button" class="btn btn-outline-secondary manager-add-hours-exit-btn" data-bs-dismiss="modal">Exit</button>
						<button type="button" class="btn manager-account-balance-action-btn manager-add-hours-save-btn">Save</button>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
