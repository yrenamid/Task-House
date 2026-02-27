<?php
/**
 * Virtual Assistants Tab View
 * Displays list of VAs assigned to account with status, hours, and action buttons
 */

$vas = $accountVirtualAssistants ?? [];
$vaCount = count($vas);
$vaWorking = count(array_filter($vas, fn($va) => $va['currentStatus'] === 'Working'));
$vaIdle = count(array_filter($vas, fn($va) => $va['currentStatus'] === 'Idle'));
$totalHours = array_reduce($vas, fn($sum, $va) => $sum + (int)$va['allocatedHours'], 0);

$getStatusColor = function($status) {
	return match($status) {
		'Working' => 'va-status-working',
		'Idle' => 'va-status-idle',
		'Break' => 'va-status-break',
		default => 'va-status-default',
	};
};

$getStatusBgColor = function($status) {
	return match($status) {
		'Working' => 'bg-success',
		'Idle' => 'bg-warning',
		'Break' => 'bg-info',
		default => 'bg-secondary',
	};
};

$getInitials = function($name) {
	return implode('', array_map(fn($n) => $n[0], explode(' ', $name)));
};

$allVAs = $virtualAssistants ?? [];
$assignedVAIds = array_map(fn($va) => $va['id'], $vas);
$unassignedVAs = array_filter($allVAs, fn($va) => !in_array($va['id'], $assignedVAIds));
$unassignedVAs = array_values($unassignedVAs);
?>

<div class="tab-pane-wrap p-3 p-lg-4">
	<!-- Header & Top Controls -->
	<div class="va-header-controls mb-4">
		<div class="d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
			<!-- Header Section -->
			<div class="min-w-0">
				<h3 class="va-tab-title mb-1">Virtual Assistants</h3>
				<p class="va-tab-subtitle">
					<?= htmlspecialchars($vaCount) ?> VA<?= $vaCount !== 1 ? 's' : '' ?> assigned to this account
				</p>
			</div>

			<!-- Top Controls: Search & Add Button -->
			<div class="va-top-controls flex-shrink-0">
				<div class="d-flex flex-column flex-md-row gap-2">
					<div class="flex-grow-1">
						<input
							type="text"
							class="form-control va-search-input"
							placeholder="Search assigned VAs..."
							aria-label="Search Virtual Assistants"
						>
					</div>
					<button
						type="button"
						class="btn btn-primary btn-sm"
						data-bs-toggle="modal"
						data-bs-target="#addVaModal"
					>
						<i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
						Add New VA
					</button>
				</div>
			</div>
		</div>
	</div>

    	<!-- Team Summary Card -->
		<div class="card va-summary-card">
			<div class="card-body p-4">
				<h4 class="va-summary-title mb-4">Team Summary</h4>
				<div class="row g-3 text-center">
					<div class="col-6 col-md-6">
						<div class="va-stat-label">Total VAs</div>
						<div class="va-stat-value"><?= htmlspecialchars($vaCount) ?></div>
					</div>
					
					<div class="col-6 col-md-6">
						<div class="va-stat-label">Total Hours</div>
						<div class="va-stat-value va-stat-hours"><?= htmlspecialchars($totalHours) ?>h</div>
					</div>
				</div>
			</div>
		</div>

	

	<!-- Empty State -->
	<?php if ($vaCount === 0): ?>
		<div class="card va-empty-card">
			<div class="card-body va-empty-body">
				<div class="va-empty-icon">
					<i class="bi bi-people" aria-hidden="true"></i>
				</div>
				<p class="va-empty-text">No virtual assistants assigned to this account</p>
			</div>
		</div>
	<?php else: ?>
		<!-- VA Grid -->
		<div class="row g-3 mb-4 my-3">
			<?php foreach ($vas as $va): ?>
				<?php
				$vaId = htmlspecialchars($va['id'], ENT_QUOTES, 'UTF-8');
				$vaName = htmlspecialchars($va['name'], ENT_QUOTES, 'UTF-8');
				$vaStatus = htmlspecialchars($va['currentStatus'], ENT_QUOTES, 'UTF-8');
				$vaHours = (int)$va['allocatedHours'];
				$statusClass = $getStatusColor($va['currentStatus']);
				$statusBgClass = $getStatusBgColor($va['currentStatus']);
				$initials = $getInitials($va['name']);
				$modalId = 'removeVaModal_' . htmlspecialchars($va['id'], ENT_QUOTES, 'UTF-8');
				?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card va-card h-100">
						<div class="card-body p-4">
							<!-- VA Header -->
							<div class="d-flex align-items-start justify-content-between mb-4">
								<div class="d-flex align-items-center gap-3 min-w-0">
									<div class="va-avatar <?= $statusBgClass ?>">
										<?= htmlspecialchars($initials, ENT_QUOTES, 'UTF-8') ?>
									</div>
									<div class="min-w-0">
										<h4 class="va-name mb-1 text-truncate"><?= $vaName ?></h4>
										<p class="va-id text-truncate">ID: <?= $vaId ?></p>
									</div>
								</div>
								
								</span>
							</div>

							<!-- VA Info Sections -->
							<div class="space-y-3">
								<div class="va-info-box">
									<div class="d-flex align-items-center gap-2">
										<i class="bi bi-clock va-info-icon" aria-hidden="true"></i>
										<span class="va-info-label">Status</span>
									</div>
									<span class="badge <?= $statusClass ?> flex-shrink-0">
									<?= $vaStatus ?></span>
								</div>
								<div class="va-info-box">
									<div class="d-flex align-items-center gap-2">
										<i class="bi bi-clock va-info-icon" aria-hidden="true"></i>
										<span class="va-info-label">Allocated Hours</span>
									</div>
									<span class="va-info-value"><?= $vaHours ?>h</span>
								</div>

								<!-- Remove Button -->
								<button
									type="button"
									class="btn btn-outline-danger btn-sm w-100"
									data-bs-toggle="modal"
									data-bs-target="#<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>"
								>
									<i class="bi bi-person-dash me-2" aria-hidden="true"></i>
									Remove from Account
								</button>
							</div>
						</div>
					</div>

						<?php require __DIR__ . '/../modals/remove-va-modal.php'; ?>
				</div>
			<?php endforeach; ?>
		</div>

	
	<?php endif; ?>
</div>

	<?php require __DIR__ . '/../modals/add-va-modal.php'; ?>
