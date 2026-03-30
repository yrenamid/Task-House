<?php
$taskDetails = [
  [
    'id' => 'TSK001',
    'date' => '03/20/2026',
    'accountName' => 'NRO Consultants',
    'projectName' => 'HR Management System',
    'doer' => 'Sarah Johnson',
    'approvedBy' => 'Michael Chen',
    'billedHours' => '8.5',
    'taskDescription' => 'Implemented dashboard UI with attendance tracking, user management, and reporting features. Fixed responsive layout issues.',
  ],
  [
    'id' => 'TSK002',
    'date' => '03/21/2026',
    'accountName' => 'Tech Solutions Inc',
    'projectName' => 'E-commerce Platform',
    'doer' => 'David Kim',
    'approvedBy' => 'Emily Rodriguez',
    'billedHours' => '6.0',
    'taskDescription' => 'Developed payment gateway integration and order processing workflow.',
  ],
  [
    'id' => 'TSK003',
    'date' => '03/22/2026',
    'accountName' => 'HR Department',
    'projectName' => 'Internal Tools',
    'doer' => 'Jessica Williams',
    'approvedBy' => 'Robert Taylor',
    'billedHours' => '7.5',
    'taskDescription' => 'Created employee onboarding module with document upload and verification system.',
  ],
  [
    'id' => 'TSK004',
    'date' => '03/23/2026',
    'accountName' => 'NRO Consultants',
    'projectName' => 'Analytics Dashboard',
    'doer' => 'Amanda Martinez',
    'approvedBy' => 'Michael Chen',
    'billedHours' => '9.0',
    'taskDescription' => 'Built real-time analytics charts and data visualization components.',
  ],
  [
    'id' => 'TSK005',
    'date' => '03/24/2026',
    'accountName' => 'Tech Solutions Inc',
    'projectName' => 'Mobile App Backend',
    'doer' => 'Christopher Lee',
    'approvedBy' => 'Emily Rodriguez',
    'billedHours' => '8.0',
    'taskDescription' => 'Developed REST API endpoints for user authentication and profile management.',
  ],
  [
    'id' => 'TSK006',
    'date' => '03/25/2026',
    'accountName' => 'Finance Corp',
    'projectName' => 'Reporting System',
    'doer' => 'Sarah Johnson',
    'approvedBy' => 'Jennifer Wilson',
    'billedHours' => '10.0',
    'taskDescription' => 'Implemented automated report generation with PDF export functionality and email notifications.',
  ],
  [
    'id' => 'TSK007',
    'date' => '03/26/2026',
    'accountName' => 'HR Department',
    'projectName' => 'Attendance System',
    'doer' => 'David Kim',
    'approvedBy' => 'Robert Taylor',
    'billedHours' => '6.5',
    'taskDescription' => 'Enhanced attendance tracking with geolocation and biometric integration.',
  ],
];
?>

<?php foreach ($taskDetails as $task): ?>
  <?php
  $modalId = 'taskDetailsModal' . $task['id'];
  $labelId = $modalId . 'Label';
  ?>
  <div class="modal fade task-modal" id="<?= htmlspecialchars($modalId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-labelledby="<?= htmlspecialchars($labelId, ENT_QUOTES, 'UTF-8') ?>" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content task-modal-content">
        <div class="modal-header task-modal-header">
          <h2 class="modal-title task-modal-title" id="<?= htmlspecialchars($labelId, ENT_QUOTES, 'UTF-8') ?>">Task Details</h2>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body task-modal-body">
          <div class="row g-3">
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Task ID</label>
              <div class="task-readonly"><?= htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Date</label>
              <div class="task-readonly"><?= htmlspecialchars($task['date'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Account Name</label>
              <div class="task-readonly"><?= htmlspecialchars($task['accountName'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Project Name</label>
              <div class="task-readonly"><?= htmlspecialchars($task['projectName'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Doer</label>
              <div class="task-readonly"><?= htmlspecialchars($task['doer'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label task-control-label">Approved By</label>
              <div class="task-readonly"><?= htmlspecialchars($task['approvedBy'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12">
              <label class="form-label task-control-label">Billed Hours</label>
              <div class="task-readonly task-readonly-strong"><?= htmlspecialchars($task['billedHours'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
            <div class="col-12">
              <label class="form-label task-control-label">Task Description</label>
              <div class="task-readonly task-readonly-description"><?= htmlspecialchars($task['taskDescription'], ENT_QUOTES, 'UTF-8') ?></div>
            </div>
          </div>
        </div>
        <div class="modal-footer task-modal-footer">
          <button type="button" class="btn task-btn task-btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
