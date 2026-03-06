<?php
$account = $selectedAccount ?? null;

if (!is_array($account)) {
	return;
}

$allocatedHours = (float) ($account['allocatedHours'] ?? 0);
$availableHours = (float) ($account['availableHours'] ?? 0);
$hoursUsed = max(0, $allocatedHours - $availableHours);
$hoursUsedPercentage = $allocatedHours > 0 ? ($hoursUsed / $allocatedHours) * 100 : 0;
$hoursUsedPercentage = max(0, min(100, $hoursUsedPercentage));
?>

<div class="project-notes-content p-3 p-lg-6">
	<div class="row g-3 mb-3 mb-lg-4">
		<div class="col">
			<div class="card pn-card h-100">
				<div class="card-body p-4">
					<div class="d-flex align-items-start gap-3">
						<div class="pn-icon-wrap">
							<i class="bi bi-briefcase pn-icon" aria-hidden="true"></i>
						</div>
						<div class="flex-grow-1 min-w-0">
							<div class="pn-label">Client Name</div>
							<div class="pn-value mt-1"><?= htmlspecialchars($account['clientFullName'], ENT_QUOTES, 'UTF-8') ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card pn-card h-100">
				<div class="card-body p-4">
					<div class="d-flex align-items-start gap-3">
						<div class="pn-icon-wrap">
							<i class="bi bi-envelope pn-icon" aria-hidden="true"></i>
						</div>
						<div class="flex-grow-1 min-w-0">
							<div class="pn-label">Client Email</div>
							<div class="pn-value-sm mt-1 text-truncate"><?= htmlspecialchars($account['clientEmail'], ENT_QUOTES, 'UTF-8') ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="card pn-card pn-hours-card mb-3 mb-lg-4">
		<div class="card-header pn-card-header">
			<h2 class="pn-card-title mb-0">Hours Remaining</h2>
		</div>
		<div class="card-body p-4">
			<div class="d-flex align-items-baseline gap-2 mb-3">
				<span class="pn-hours-left"><?= (int) $availableHours ?></span>
				<span class="pn-hours-total">/ <?= (int) $allocatedHours ?> hours</span>
			</div>

			<div class="mb-4">
				<div class="d-flex justify-content-between pn-usage-row mb-2">
					<span>Usage</span>
					<span><?= number_format($hoursUsedPercentage, 1) ?>% used</span>
				</div>
				<progress class="pn-usage-progress" max="100" value="<?= htmlspecialchars((string) round($hoursUsedPercentage, 2), ENT_QUOTES, 'UTF-8') ?>"></progress>
			</div>

			<div class="row g-3">
				<div class="col-12 col-sm-4">
					<div class="pn-mini-box pn-mini-box-muted">
						<div class="pn-mini-label">Allocated Hours</div>
                            <div class="pn-value mt-1"><?= (int) $allocatedHours ?> hours</div>					</div>
				</div>
				<div class="col-12 col-sm-4">
					<div class="pn-mini-box pn-mini-box-accent">
						<div class="pn-mini-label">Hours Used</div>
						<div class="pn-mini-value pn-mini-value-accent"><?= (int) $hoursUsed ?></div>
					</div>
				</div>
				<div class="col-12 col-sm-4">
					<div class="pn-mini-box pn-mini-box-accent">
						<div class="pn-mini-label">Hours Left</div>
						<div class="pn-mini-value pn-mini-value-accent"><?= (int) $availableHours ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card pn-card">
		<div class="card-header pn-card-header">
			<h2 class="pn-card-title mb-0">Project Notes</h2>
		</div>
		<div class="card-body p-4">
			<div class="pn-notes-box">
				<p class="pn-notes-text mb-0"><?= nl2br(htmlspecialchars($account['projectNotes'], ENT_QUOTES, 'UTF-8')) ?></p>
			</div>
		</div>
	</div>

	<div class="card pn-card mt-3 mt-lg-4">
		<div class="card-header pn-card-header d-flex justify-content-between align-items-center gap-2">
			<h2 class="pn-card-title mb-0">Call Logs</h2>
			<button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logCallModal">
				<i class="bi bi-telephone"></i> Log a Call
			</button>
		</div>
		<div class="card-body p-4">
			<div class="table-responsive">
				<table class="table table-bordered table-striped mb-0">
					<thead>
						<tr>
							<th>Description</th>
							<th>Date &amp; Time</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Client requested progress update call.</td>
							<td><?= date('M d, Y h:i A') ?></td>
						</tr>
						<tr>
							<td>Follow-up call regarding task timeline.</td>
							<td><?= date('M d, Y h:i A') ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php require __DIR__ . '/../modals/log-call-modal.php'; ?>
