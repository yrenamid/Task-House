<?php
$pageTitle = 'Task House';
$activeNav = 'attendance';

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid px-3 px-md-4 py-3">
		<div class="mb-3">
			<h2 class="m-0 fw-bold">Attendance Overview</h2>
			<p class="mt-1 mb-0 app-muted">Track your attendance records and working hours</p>
		</div>

		<?php require __DIR__ . '/includes/breaksection.php'; ?>

		<div class="row g-3 g-md-4 mt-2">
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card dash-card border-0 shadow-sm h-100">
					<div class="card-body p-3 p-md-4">
						<div class="d-flex align-items-start justify-content-between mb-3">
							<div class="stat-ico stat-ico--success"><i class="bi bi-check-circle-fill"></i></div>
						</div>
						<div class="text-uppercase dash-label">Days Worked</div>
						<div class="dash-value" data-number>22</div> 
						<div class="small app-muted">This month</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card dash-card border-0 shadow-sm h-100">
					<div class="card-body p-3 p-md-4">
						<div class="d-flex align-items-start justify-content-between mb-3">
							<div class="stat-ico stat-ico--danger"><i class="bi bi-x-circle-fill"></i></div>
						</div>
						<div class="text-uppercase dash-label">Absences</div>
						<div class="dash-value" data-number>1</div>
						<div class="small app-muted">This month</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card dash-card border-0 shadow-sm h-100">
					<div class="card-body p-3 p-md-4">
						<div class="d-flex align-items-start justify-content-between mb-3">
							<div class="stat-ico stat-ico--warning"><i class="bi bi-exclamation-triangle-fill"></i></div>
						</div>
						<div class="text-uppercase dash-label">Late Entries</div>
						<div class="dash-value" data-number>2</div>
						<div class="small app-muted">This month</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-6 col-lg-3">
				<div class="card dash-card border-0 shadow-sm h-100">
					<div class="card-body p-3 p-md-4">
						<div class="d-flex align-items-start justify-content-between mb-3">
							<div class="stat-ico stat-ico--primary"><i class="bi bi-clock-fill"></i></div>
						</div>
						<div class="text-uppercase dash-label">Total Hours</div>
						<div class="dash-value" data-number>176</div>
						<div class="small app-muted">This month</div>
					</div>
				</div>
			</div>
		</div>


		<div id="records" class="card dash-card border-0 shadow-sm mt-4 overflow-hidden">
			<div class="panel-header panel-header--primary px-3 px-md-4 py-3">
				<div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
					<div class="d-flex align-items-center gap-2">
						<i class="bi bi-calendar3"></i>
						<div class="fw-semibold">Attendance Records</div>
					</div>
					<div class="small" style="opacity:.9;">Last 7 days</div>
				</div>
			</div>

			<div class="table-responsive"> <!-- Demo Data -->
				<table class="table table-dark table-hover align-middle mb-0 attendance-table">
					<thead>
						<tr>
							<th class="py-3 px-3 px-md-4">Date</th>
							<th class="py-3 px-3 px-md-4 d-none d-md-table-cell">Day</th>
							<th class="py-3 px-3 px-md-4">Clock In</th>
							<th class="py-3 px-3 px-md-4">Clock Out</th>
							<th class="py-3 px-3 px-md-4 d-none d-lg-table-cell">Total Hours</th>
							<th class="py-3 px-3 px-md-4">Status</th>
							<th class="py-3 px-3 px-md-4 d-none d-lg-table-cell">Late By</th>
							<th class="py-3 px-3 px-md-4 text-end">Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="py-3 px-3 px-md-4 fw-semibold">Jan 30, 2026</td>
							<td class="py-3 px-3 px-md-4 d-none d-md-table-cell td-muted">Friday</td>
							<td class="py-3 px-3 px-md-4 td-muted td-number">08:00 AM</td>
							<td class="py-3 px-3 px-md-4 td-muted td-number">05:00 PM</td>
							<td class="py-3 px-3 px-md-4 d-none d-lg-table-cell td-number">9h 00m</td>
							<td class="py-3 px-3 px-md-4">
								<span class="badge rounded-pill d-inline-flex align-items-center gap-2 px-3 py-2 bg-success-subtle text-success-emphasis"><i class="bi bi-check-circle-fill"></i>Present</span>
							</td>
							<td class="py-3 px-3 px-md-4 d-none d-lg-table-cell td-muted">-</td>
							<td class="py-3 px-3 px-md-4 text-end">
								<div class="dropdown">
									<button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="bi bi-three-dots-vertical"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end dropdown-dark">
										<li>
											<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addOvertimeModal">
												<i class="bi bi-plus-circle me-2" style="color:#2FB833;"></i>
												Add Overtime
											</button>
										</li>
										<li>
											<button type="button" class="dropdown-item">
												<i class="bi bi-moon-stars me-2" style="color:#8ea0ff;"></i>
												Mark as Rest Day
											</button>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td class="py-3 px-3 px-md-4 fw-semibold">Jan 29, 2026</td>
							<td class="py-3 px-3 px-md-4 d-none d-md-table-cell td-muted">Thursday</td>
							<td class="py-3 px-3 px-md-4 td-muted td-number">08:15 AM</td>
							<td class="py-3 px-3 px-md-4 td-muted td-number">05:30 PM</td>
							<td class="py-3 px-3 px-md-4 d-none d-lg-table-cell td-number">9h 15m</td>
							<td class="py-3 px-3 px-md-4">
								<span class="badge rounded-pill d-inline-flex align-items-center gap-2 px-3 py-2 bg-warning-subtle text-warning-emphasis"><i class="bi bi-exclamation-triangle-fill"></i>Late</span>
							</td>
							<td class="py-3 px-3 px-md-4 d-none d-lg-table-cell td-muted">15 min</td>
							<td class="py-3 px-3 px-md-4 text-end">
								<div class="dropdown">
									<button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="bi bi-three-dots-vertical"></i>
									</button>
									<ul class="dropdown-menu dropdown-menu-end dropdown-dark">
										<li>
											<button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addOvertimeModal">
												<i class="bi bi-plus-circle me-2" style="color:#2FB833;"></i>
												Add Overtime
											</button>
										</li>
										<li>
											<button type="button" class="dropdown-item">
												<i class="bi bi-moon-stars me-2" style="color:#8ea0ff;"></i>
												Mark as Rest Day
											</button>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>


			<?php require __DIR__ . '/includes/addovertime.php'; ?>

			<div class="px-3 px-md-4 py-3 panel-footer">
				<div class="small app-muted">
					Showing <span class="fw-semibold" style="color: var(--text);">2</span> recent records
				</div>
			</div>
		</div>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>

