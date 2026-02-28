<?php

$activeNav = $activeNav ?? '';
$userName = $userName ?? 'John Daniels';
$userInitials = $userInitials ?? 'JD';
$userRole = $userRole ?? 'Employee';
$normalizedActiveNav = strtolower(str_replace(['_', ' '], '-', (string) $activeNav));
$current = basename($_SERVER['PHP_SELF'] ?? '');
$isHrActive = in_array($current, ['codeofConduct.php', 'employeeHandbook.php'], true);
$sidebarBasePath = (string) ($sidebarBasePath ?? '');

$buildSidebarHref = static function (string $path) use ($sidebarBasePath): string {
  return $sidebarBasePath . ltrim($path, '/');
};

$employeeNavItems = [
  ['id' => 'welcome', 'label' => 'Welcome', 'icon' => 'bi-house-door-fill', 'href' => 'index.php'],
  ['id' => 'attendance', 'label' => 'Attendance', 'icon' => 'bi-calendar3', 'href' => 'attendance.php'],
  ['id' => 'my-tasks', 'label' => 'My Tasks', 'icon' => 'bi-card-checklist', 'href' => 'myTasks.php'],
];

$supervisorNavItems = [
  ['id' => 'my-accounts', 'label' => 'My Accounts', 'icon' => 'bi-briefcase-fill', 'href' => 'supervisor/myAccounts.php'],
  ['id' => 'task-approvals', 'label' => 'Task Approvals', 'icon' => 'bi-check-circle-fill', 'href' => 'supervisor/taskapprovals.php'],
  ['id' => 'incident-report', 'label' => 'Incident Report', 'icon' => 'bi-exclamation-triangle-fill', 'href' => 'supervisor/incidentReport.php'],
  ['id' => 'DTR', 'label' => 'DTR', 'icon' => 'bi-calendar-fill', 'href' => 'supervisor/dtr-page.php'],
];

$hrItems = [
  ['file' => 'codeofConduct.php', 'label' => 'Code of Conduct'],
  ['file' => 'employeeHandbook.php', 'label' => 'Employee Handbook'],
];

$allNavItems = array_merge($employeeNavItems, $supervisorNavItems);
?>
<aside
  id="sidebar"
  class="offcanvas offcanvas-start offcanvas-md text-bg-dark app-sidebar"
  tabindex="-1"
  aria-labelledby="sidebarLabel"
>
  <div class="sidebar-profile border-bottom border-stroke">
    <div class="d-flex align-items-center justify-content-between gap-2 p-3 p-lg-4">
      <div class="sidebar-profile-row d-flex align-items-center gap-3 min-w-0">
        <span class="sidebar-avatar" aria-hidden="true"><?= htmlspecialchars($userInitials, ENT_QUOTES, 'UTF-8') ?></span>
        <div class="sidebar-meta min-w-0">
          <div class="sidebar-name text-truncate"><?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></div>
          <div class="sidebar-role text-truncate"><?= htmlspecialchars($userRole, ENT_QUOTES, 'UTF-8') ?></div>
        </div>
      </div>
      <button class="btn btn-ghost sidebar-close d-md-none" type="button" data-bs-dismiss="offcanvas" aria-label="Close sidebar">
        <span aria-hidden="true">✕</span>
      </button>
    </div>
  </div>

  <nav class="sidebar-nav" aria-label="Primary">
    <?php foreach ($allNavItems as $item): ?>
      <?php $isActive = str_replace('-', '', $normalizedActiveNav) === str_replace('-', '', strtolower((string) $item['id'])); ?>
      <a
        class="sidebar-link<?= $isActive ? ' is-active' : '' ?>"
        href="<?= htmlspecialchars($buildSidebarHref((string) $item['href']), ENT_QUOTES, 'UTF-8') ?>"
        data-nav="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
        aria-current="<?= $isActive ? 'page' : 'false' ?>"
      >
        <i class="bi <?= htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8') ?> sidebar-icon" aria-hidden="true"></i>
        <span class="sidebar-label text-truncate"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
      </a>
    <?php endforeach; ?>


    <!-- Human Resources (collapsible) -->
    <a
      class="sidebar-link sidebar-link--collapsible <?= $isHrActive ? '' : 'collapsed' ?>"
      data-bs-toggle="collapse"
      href="#navHumanResources"
      role="button"
      aria-expanded="<?= $isHrActive ? 'true' : 'false' ?>"
      aria-controls="navHumanResources"
      aria-current="false"
    >
      <i class="bi bi-people sidebar-icon" aria-hidden="true"></i>
      <span class="sidebar-label text-truncate">Human Resources</span>
      <i class="bi bi-chevron-down nav-caret ms-auto" aria-hidden="true"></i>
    </a>

    <div class="collapse sidebar-sub <?= $isHrActive ? 'show' : '' ?>" id="navHumanResources">
      <?php foreach ($hrItems as $item): ?>
        <a
          class="sidebar-link sidebar-sub-link<?= $current === $item['file'] ? ' is-active' : '' ?>"
          href="<?= htmlspecialchars($buildSidebarHref((string) $item['file']), ENT_QUOTES, 'UTF-8') ?>"
          aria-current="<?= $current === $item['file'] ? 'page' : 'false' ?>"
        >
          <i class="bi bi-dot sidebar-icon" aria-hidden="true"></i>
          <span class="sidebar-label text-truncate"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>
</aside>

