<?php
require __DIR__ . '/../../mockData.php';

$pageTitle = 'Attendance Records';
$activeNav = 'DTR';

$employees = $dtrEmployees ?? [];
$logs = $clockLogs ?? [];
$selectedEmployeeId = trim((string) ($_GET['employee'] ?? ''));

$selectedEmployee = null;
foreach ($employees as $employeeItem) {
	if ((string) ($employeeItem['id'] ?? '') === $selectedEmployeeId) {
		$selectedEmployee = $employeeItem;
		break;
	}
}

$selectedEmployeeName = (string) ($selectedEmployee['name'] ?? 'All Employees');

$employeeLogs = array_values(array_filter(
	$logs,
	static function (array $log) use ($selectedEmployeeName, $selectedEmployeeId): bool {
		if ($selectedEmployeeId === '' || $selectedEmployeeName === 'All Employees') {
			return true;
		}

		return ((string) ($log['employeeName'] ?? '')) === $selectedEmployeeName;
	}
));

$attendanceRowsByDate = [];
foreach ($employeeLogs as $log) {
	$dateValue = (string) ($log['date'] ?? '');
	if ($dateValue === '') {
		continue;
	}

	if (!isset($attendanceRowsByDate[$dateValue])) {
		$dayStamp = strtotime($dateValue);
		$attendanceRowsByDate[$dateValue] = [
			'day' => $dayStamp !== false ? date('D', $dayStamp) : '-',
			'scheduleIn' => '-',
			'scheduleOut' => '-',
			'scheduleBreak' => '-',
			'attendanceIn' => '-',
			'attendanceOut' => '-',
			'tardiness' => '-',
			'undertime' => '-',
			'break' => '-',
			'shiftHours' => '-',
			'overtime' => '-',
		];
	}

	$logType = (string) ($log['logType'] ?? '');
	$timeValue = (string) ($log['time'] ?? '-');

	if ($logType === 'Clock In' && $attendanceRowsByDate[$dateValue]['attendanceIn'] === '-') {
		$attendanceRowsByDate[$dateValue]['attendanceIn'] = $timeValue;
		$attendanceRowsByDate[$dateValue]['scheduleIn'] = $timeValue;
	}

	if ($logType === 'Clock Out') {
		$attendanceRowsByDate[$dateValue]['attendanceOut'] = $timeValue;
		$attendanceRowsByDate[$dateValue]['scheduleOut'] = $timeValue;
	}
}

krsort($attendanceRowsByDate);
$attendanceRows = array_values($attendanceRowsByDate);

$formatDateTime = static function (string $dateValue, string $timeValue): string {
	if ($dateValue === '' || $timeValue === '' || $timeValue === '-') {
		return '-';
	}

	$timestamp = strtotime($dateValue . ' ' . $timeValue);
	if ($timestamp === false) {
		return '-';
	}

	return date('F j, Y g:i A', $timestamp);
};

require __DIR__ . '/../../supervisorIncludes/headerSup.php';
?>
<?php
$sidebarBasePath = '../../../';
require __DIR__ . '/../../../includes/sidebar.php';
?>

<main class="app-main attendance-records-page">
	<?php require __DIR__ . '/../../supervisorIncludes/app-headerSup.php'; ?>

	<section class="clock-logs-header border-bottom">
		<div class="container-fluid px-3 px-lg-4 py-4">
			<div class="d-flex align-items-center gap-3 mb-3">
				<a href="dtr-page.php" class="btn btn-sm clock-logs-back-btn">
					<i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Back
				</a>
			</div>

			<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-3">
				<div>
					<h1 class="clock-logs-title mb-1">Attendance Records</h1>
					<p class="clock-logs-subtitle mb-0">View attendance details for <?= htmlspecialchars($selectedEmployeeName, ENT_QUOTES, 'UTF-8') ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid px-3 px-lg-4 py-4">
		<div class="card border-0 shadow-sm attendance-records-table-card overflow-hidden">
			<div class="table-responsive attendance-table-wrap">
				<table class="table table-dark table-hover align-middle mb-0 attendance-table">
					<thead>
						<tr>
							<th scope="col" rowspan="2" class="text-center th-narrow">#</th>
							<th scope="col" colspan="4" class="text-center th-group">Schedule</th>
							<th scope="col" colspan="2" class="text-center th-group">Attendance</th>
							<th scope="col" rowspan="2" class="text-center th-narrow">Tardiness</th>
							<th scope="col" rowspan="2" class="text-center th-narrow">Undertime</th>
							<th scope="col" rowspan="2" class="text-center th-narrow">Break</th>
							<th scope="col" rowspan="2" class="text-center th-narrow">Shift Hours</th>
							<th scope="col" rowspan="2" class="text-center th-narrow">Overtime</th>
						</tr>
						<tr>
							<th scope="col" class="text-center">Day</th>
							<th scope="col" class="text-center">In</th>
							<th scope="col" class="text-center">Out</th>
							<th scope="col" class="text-center">Break</th>
							<th scope="col" class="text-center">In</th>
							<th scope="col" class="text-center">Out</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($attendanceRows)): ?>
							<tr>
								<td colspan="13" class="att-td text-center py-5">No attendance records found</td>
							</tr>
						<?php else: ?>
							<?php foreach ($attendanceRows as $index => $row): ?>
								<?php $sourceDate = array_keys($attendanceRowsByDate)[$index] ?? ''; ?>
								<tr>
									<td class="att-td text-center fw-semibold"><?= (int) $index + 1 ?></td>
									<td class="att-td text-center fw-semibold"><?= htmlspecialchars((string) ($row['day'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="att-td text-center"><div class="cell-primary td-number td-muted"><?= htmlspecialchars($formatDateTime((string) $sourceDate, (string) ($row['scheduleIn'] ?? '-')), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number td-muted"><?= htmlspecialchars($formatDateTime((string) $sourceDate, (string) ($row['scheduleOut'] ?? '-')), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number td-muted"><?= htmlspecialchars((string) ($row['scheduleBreak'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number td-muted"><?= htmlspecialchars($formatDateTime((string) $sourceDate, (string) ($row['attendanceIn'] ?? '-')), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number td-muted"><?= htmlspecialchars($formatDateTime((string) $sourceDate, (string) ($row['attendanceOut'] ?? '-')), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number"><?= htmlspecialchars((string) ($row['tardiness'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number"><?= htmlspecialchars((string) ($row['undertime'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number"><?= htmlspecialchars((string) ($row['break'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number"><?= htmlspecialchars((string) ($row['shiftHours'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									<td class="att-td text-center"><div class="cell-primary td-number"><?= htmlspecialchars((string) ($row['overtime'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></div></td>
									
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</main>

<?php require __DIR__ . '/../../supervisorIncludes/footerSup.php'; ?>
