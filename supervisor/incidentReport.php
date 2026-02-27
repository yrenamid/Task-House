<?php
require __DIR__ . '/mockData.php';

$pageTitle = 'Task House';
$activeNav = 'incident-report';

$categoryList = ['Absent', 'Overtime', 'Late', 'Undertime'];
$reasonList = ['Health', 'Errand', 'Emergency', 'Other'];
$imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

$uploadDirectory = __DIR__ . '/../uploads/incidents';
$uploadPublicPathPrefix = '../uploads/incidents/';

$incidents = $incidentReports ?? [];
$employeeOptions = $incidentEmployees ?? [];

$formData = [
	'notificationDate' => '',
	'incidentDate' => '',
	'employee' => '',
	'category' => '',
	'reason' => '',
	'otherReason' => '',
	'attachment' => '',
];

$formError = '';
$formSuccess = '';

$isViewableAttachment = static function (?string $attachment) use ($imageExtensions): bool {
	if (!is_string($attachment) || trim($attachment) === '') {
		return false;
	}

	$attachment = trim($attachment);
	$isUrl = filter_var($attachment, FILTER_VALIDATE_URL) !== false;
	$path = (string) (parse_url($attachment, PHP_URL_PATH) ?? $attachment);
	$extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

	if ($isUrl) {
		if ($extension === '') {
			return true;
		}

		return in_array($extension, $imageExtensions, true);
	}

	return in_array($extension, $imageExtensions, true);
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$formData['notificationDate'] = trim((string) ($_POST['notificationDate'] ?? ''));
	$formData['incidentDate'] = trim((string) ($_POST['incidentDate'] ?? ''));
	$formData['employee'] = trim((string) ($_POST['employee'] ?? ''));
	$formData['category'] = trim((string) ($_POST['category'] ?? ''));
	$formData['reason'] = trim((string) ($_POST['reason'] ?? ''));
	$formData['otherReason'] = trim((string) ($_POST['otherReason'] ?? ''));

	$attachmentValue = '';
	$uploadError = '';
	if (isset($_FILES['attachment']) && is_array($_FILES['attachment'])) {
		$fileErrorCode = (int) ($_FILES['attachment']['error'] ?? UPLOAD_ERR_NO_FILE);
		$uploadedName = (string) ($_FILES['attachment']['name'] ?? '');
		$tmpName = (string) ($_FILES['attachment']['tmp_name'] ?? '');

		if ($fileErrorCode === UPLOAD_ERR_OK && $uploadedName !== '') {
			$fileNameWithoutExt = pathinfo($uploadedName, PATHINFO_FILENAME);
			$fileExtension = strtolower(pathinfo($uploadedName, PATHINFO_EXTENSION));
			$safeBaseName = preg_replace('/[^a-zA-Z0-9_-]/', '-', (string) $fileNameWithoutExt);
			if (!is_string($safeBaseName) || trim($safeBaseName) === '') {
				$safeBaseName = 'attachment';
			}

			$storedFileName = sprintf('%s-%s-%s', $safeBaseName, date('YmdHis'), substr(md5(uniqid('', true)), 0, 6));
			if ($fileExtension !== '') {
				$storedFileName .= '.' . $fileExtension;
			}

			if (!is_dir($uploadDirectory)) {
				if (!mkdir($uploadDirectory, 0775, true) && !is_dir($uploadDirectory)) {
					$uploadError = 'Unable to create uploads directory.';
				}
			}

			if ($uploadError === '') {
				$destinationPath = rtrim($uploadDirectory, '/\\') . DIRECTORY_SEPARATOR . $storedFileName;
				if ($tmpName !== '' && is_uploaded_file($tmpName) && move_uploaded_file($tmpName, $destinationPath)) {
					$attachmentValue = $uploadPublicPathPrefix . $storedFileName;
				} else {
					$uploadError = 'Failed to save uploaded attachment.';
				}
			}
		} elseif ($fileErrorCode !== UPLOAD_ERR_NO_FILE) {
			$uploadError = 'Attachment upload failed. Please try again.';
		}
	}

	$resolvedReason = $formData['reason'] === 'Other' ? $formData['otherReason'] : $formData['reason'];

	if (
		$formData['notificationDate'] === '' ||
		$formData['incidentDate'] === '' ||
		$formData['employee'] === '' ||
		$formData['category'] === '' ||
		$formData['reason'] === ''
	) {
		$formError = 'Please complete all required fields.';
	} elseif ($uploadError !== '') {
		$formError = $uploadError;
	} elseif ($formData['reason'] === 'Other' && $formData['otherReason'] === '') {
		$formError = 'Please specify the reason when selecting Other.';
	} elseif (!in_array($formData['category'], $categoryList, true)) {
		$formError = 'Invalid category selected.';
	} elseif (!in_array($formData['employee'], $employeeOptions, true)) {
		$formError = 'Invalid employee selected.';
	} else {
		$nextIdNumber = count($incidents) + 1;
		$newIncident = [
			'id' => sprintf('INC-%03d', $nextIdNumber),
			'timestamp' => date('Y-m-d H:i:s'),
			'notificationDate' => $formData['notificationDate'],
			'incidentDate' => $formData['incidentDate'],
			'employee' => $formData['employee'],
			'category' => $formData['category'],
			'reason' => $resolvedReason,
			'attachment' => $attachmentValue !== '' ? $attachmentValue : null,
		];

		array_unshift($incidents, $newIncident);
		$formSuccess = 'Incident added successfully.';
		if ($attachmentValue !== '') {
			$formSuccess .= ' Attachment uploaded to local folder.';
		}

		$formData = [
			'notificationDate' => '',
			'incidentDate' => '',
			'employee' => '',
			'category' => '',
			'reason' => '',
			'otherReason' => '',
			'attachment' => '',
		];
	}
}

$searchQuery = trim((string) ($_GET['search'] ?? ''));

$filteredIncidents = array_values(array_filter(
	$incidents,
	static function (array $incident) use ($searchQuery): bool {
		if ($searchQuery === '') {
			return true;
		}

		$employee = (string) ($incident['employee'] ?? '');
		return stripos($employee, $searchQuery) !== false;
	}
));

$formatDate = static function (string $dateString, string $format): string {
	$timestamp = strtotime($dateString);
	if ($timestamp === false) {
		return $dateString;
	}

	return date($format, $timestamp);
};

$getCategoryBadgeClass = static function (string $category): string {
	return match ($category) {
		'Absent' => 'incident-category-badge incident-category-absent',
		'Overtime' => 'incident-category-badge incident-category-overtime',
		'Late' => 'incident-category-badge incident-category-late',
		'Undertime' => 'incident-category-badge incident-category-undertime',
		default => 'incident-category-badge incident-category-default',
	};
};

require __DIR__ . '/supervisorIncludes/headerSup.php';
?>
<?php require __DIR__ . '/supervisorIncludes/sidebarSup.php'; ?>

<main class="app-main incident-report-page">
	<?php require __DIR__ . '/supervisorIncludes/app-headerSup.php'; ?>

	<section class="incident-report-header border-bottom">
		<div class="container-fluid px-3 px-lg-4 py-4 py-lg-5">
			<div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between gap-3">
				<div>
					<h1 class="incident-report-title mb-1">Incident Report</h1>
					<p class="incident-report-subtitle mb-0">Track and manage employee incidents</p>
				</div>
				<button type="button" class="btn incident-add-btn" data-bs-toggle="modal" data-bs-target="#addIncidentModal">
					<i class="bi bi-plus-lg me-2"></i>Add Incident
				</button>
			</div>

			<form method="get" class="mt-4">
				<div class="incident-search-wrap input-group">
					<span class="input-group-text"><i class="bi bi-search"></i></span>
					<input
						type="text"
						name="search"
						class="form-control"
						placeholder="Search employee..."
						value="<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>"
					>
					<button type="submit" class="btn btn-light">Search</button>
				</div>
			</form>
		</div>
	</section>

	<section class="container-fluid px-3 px-lg-4 py-4">
		<?php if ($formSuccess !== ''): ?>
			<div class="alert alert-success" role="alert">
				<?= htmlspecialchars($formSuccess, ENT_QUOTES, 'UTF-8') ?>
			</div>
		<?php endif; ?>

		<?php if ($formError !== ''): ?>
			<div class="alert alert-danger" role="alert">
				<?= htmlspecialchars($formError, ENT_QUOTES, 'UTF-8') ?>
			</div>
		<?php endif; ?>

		<div class="card incident-table-card border-0 shadow-sm d-none d-md-block">
			<div class="table-responsive">
				<table class="table table-hover align-middle mb-0 incident-table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Timestamp</th>
							<th scope="col">Notification Date</th>
							<th scope="col">Incident Date</th>
							<th scope="col">Employee</th>
							<th scope="col">Category</th>
							<th scope="col">Reason</th>
							<th scope="col">Attachment</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($filteredIncidents)): ?>
							<tr>
								<td colspan="8" class="text-center py-5 text-muted">No incidents found</td>
							</tr>
						<?php else: ?>
							<?php foreach ($filteredIncidents as $incident): ?>
								<?php
								$incidentId = (string) ($incident['id'] ?? '');
								$attachment = (string) ($incident['attachment'] ?? '');
								$attachmentModalId = 'incidentAttachmentModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $incidentId);
								?>
								<tr>
									<td class="fw-semibold text-nowrap"><?= htmlspecialchars($incidentId, ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-nowrap"><?= htmlspecialchars($formatDate((string) ($incident['timestamp'] ?? ''), 'M d, Y H:i'), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-nowrap"><?= htmlspecialchars($formatDate((string) ($incident['notificationDate'] ?? ''), 'M d, Y'), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="text-nowrap"><?= htmlspecialchars($formatDate((string) ($incident['incidentDate'] ?? ''), 'M d, Y'), ENT_QUOTES, 'UTF-8') ?></td>
									<td class="fw-medium text-nowrap"><?= htmlspecialchars((string) ($incident['employee'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
									<td>
										<span class="<?= htmlspecialchars($getCategoryBadgeClass((string) ($incident['category'] ?? '')), ENT_QUOTES, 'UTF-8') ?>">
											<?= htmlspecialchars((string) ($incident['category'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
										</span>
									</td>
									<td class="incident-reason-cell"><?= htmlspecialchars((string) ($incident['reason'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
									<td>
										<?php if ($attachment !== ''): ?>
											<?php if ($isViewableAttachment($attachment)): ?>
												<button type="button" class="incident-attachment-link incident-attachment-trigger" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($attachmentModalId, ENT_QUOTES, 'UTF-8') ?>">
													<img src="<?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?>" alt="Incident attachment preview" class="incident-attachment-thumb me-2">
													<span><i class="bi bi-image me-1"></i>Preview</span>
												</button>
											<?php else: ?>
												<span class="incident-attachment-link"><i class="bi bi-paperclip me-1"></i><?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?></span>
											<?php endif; ?>
										<?php else: ?>
											<span class="text-muted">—</span>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="d-md-none">
			<?php if (empty($filteredIncidents)): ?>
				<div class="card border-0 shadow-sm">
					<div class="card-body text-center py-5 text-muted">No incidents found</div>
				</div>
			<?php else: ?>
				<?php foreach ($filteredIncidents as $incident): ?>
					<?php
					$incidentId = (string) ($incident['id'] ?? '');
					$attachment = (string) ($incident['attachment'] ?? '');
					$attachmentModalId = 'incidentAttachmentModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $incidentId);
					?>
					<article class="card border-0 shadow-sm incident-mobile-card mb-3">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-start gap-3 mb-3">
								<div>
									<div class="fw-semibold"><?= htmlspecialchars((string) ($incident['employee'] ?? ''), ENT_QUOTES, 'UTF-8') ?></div>
									<div class="small text-muted"><?= htmlspecialchars($incidentId, ENT_QUOTES, 'UTF-8') ?></div>
								</div>
								<span class="<?= htmlspecialchars($getCategoryBadgeClass((string) ($incident['category'] ?? '')), ENT_QUOTES, 'UTF-8') ?>">
									<?= htmlspecialchars((string) ($incident['category'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
								</span>
							</div>

							<div class="incident-mobile-meta">
								<div class="d-flex justify-content-between gap-3 mb-2">
									<span class="text-muted">Notification Date:</span>
									<span><?= htmlspecialchars($formatDate((string) ($incident['notificationDate'] ?? ''), 'M d, Y'), ENT_QUOTES, 'UTF-8') ?></span>
								</div>
								<div class="d-flex justify-content-between gap-3 mb-2">
									<span class="text-muted">Incident Date:</span>
									<span><?= htmlspecialchars($formatDate((string) ($incident['incidentDate'] ?? ''), 'M d, Y'), ENT_QUOTES, 'UTF-8') ?></span>
								</div>
								<div class="d-flex justify-content-between gap-3">
									<span class="text-muted">Reason:</span>
									<span class="text-end"><?= htmlspecialchars((string) ($incident['reason'] ?? ''), ENT_QUOTES, 'UTF-8') ?></span>
								</div>
							</div>

							<?php if ($attachment !== ''): ?>
								<?php if ($isViewableAttachment($attachment)): ?>
									<button type="button" class="mt-3 incident-attachment-link incident-attachment-trigger" data-bs-toggle="modal" data-bs-target="#<?= htmlspecialchars($attachmentModalId, ENT_QUOTES, 'UTF-8') ?>">
										<img src="<?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?>" alt="Incident attachment preview" class="incident-attachment-thumb me-2">
										<span><i class="bi bi-image me-1"></i>Preview attachment</span>
									</button>
								<?php else: ?>
									<div class="mt-3 incident-attachment-link"><i class="bi bi-paperclip me-1"></i><?= htmlspecialchars($attachment, ENT_QUOTES, 'UTF-8') ?></div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>

	<?php foreach ($filteredIncidents as $incident): ?>
		<?php
		$incidentId = (string) ($incident['id'] ?? '');
		$attachment = (string) ($incident['attachment'] ?? '');
		$attachmentModalId = 'incidentAttachmentModal-' . preg_replace('/[^a-zA-Z0-9_-]/', '', $incidentId);
		?>
		<?php if ($attachment !== '' && $isViewableAttachment($attachment)): ?>
			<?php require __DIR__ . '/partials/modals/incident-attachment-preview-modal.php'; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</main>

<?php require __DIR__ . '/partials/modals/add-incident-modal.php'; ?>

<?php require __DIR__ . '/supervisorIncludes/footerSup.php'; ?>
