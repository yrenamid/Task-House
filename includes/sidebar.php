<?php

$activeNav = $activeNav ?? '';
$userName = $userName ?? 'John Daniels';
$userInitials = $userInitials ?? 'JD';
$userRole = $userRole ?? 'Employee';
$normalizedActiveNav = strtolower(str_replace(['_', ' '], '-', (string) $activeNav));
$current = basename($_SERVER['PHP_SELF'] ?? '');
$isHrActive = in_array($current, ['codeofConduct.php', 'employeeHandbook.php'], true);

$navItems = [
  ['id' => 'welcome', 'label' => 'Welcome', 'icon' => 'bi-house-door-fill', 'href' => 'index.php'],
  ['id' => 'attendance', 'label' => 'Attendance', 'icon' => 'bi-calendar3', 'href' => 'attendance.php'],
  ['id' => 'my-tasks', 'label' => 'My Tasks', 'icon' => 'bi-card-checklist', 'href' => 'myTasks.php'],
];

$hrItems = [
  ['file' => 'codeofConduct.php', 'label' => 'Code of Conduct'],
  ['file' => 'employeeHandbook.php', 'label' => 'Employee Handbook'],
];
?>
<aside
  id="sidebar"
  class="offcanvas offcanvas-start offcanvas-md text-bg-dark app-sidebar sup-sidebar"
  tabindex="-1"
  aria-labelledby="sidebarLabel"
>
  <div class="sup-sidebar__profile border-bottom border-stroke">
    <div class="d-flex align-items-center justify-content-between gap-2 p-3 p-lg-4">
      <div class="sup-sidebar__profile-row d-flex align-items-center gap-3 min-w-0">
        <span class="sup-sidebar__avatar" aria-hidden="true"><?= htmlspecialchars($userInitials, ENT_QUOTES, 'UTF-8') ?></span>
        <div class="sup-sidebar__meta min-w-0">
          <div class="sup-sidebar__name text-truncate"><?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></div>
          <div class="sup-sidebar__role text-truncate"><?= htmlspecialchars($userRole, ENT_QUOTES, 'UTF-8') ?></div>
        </div>
      </div>
      <button class="btn btn-ghost sidebar-close d-md-none" type="button" data-bs-dismiss="offcanvas" aria-label="Close sidebar">
        <span aria-hidden="true">✕</span>
      </button>
    </div>
  </div>

  <nav class="sup-sidebar__nav" aria-label="Primary">
    <?php foreach ($navItems as $item): ?>
      <?php $isActive = str_replace('-', '', $normalizedActiveNav) === str_replace('-', '', $item['id']); ?>
      <a
        class="sup-sidebar__link<?= $isActive ? ' is-active' : '' ?>"
        href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') ?>"
        data-nav="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
        aria-current="<?= $isActive ? 'page' : 'false' ?>"
      >
        <i class="bi <?= htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8') ?> sup-sidebar__icon" aria-hidden="true"></i>
        <span class="sup-sidebar__label text-truncate"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
      </a>
    <?php endforeach; ?>


    <!-- Human Resources (collapsible) -->
    <a
      class="sup-sidebar__link nav-item <?= $isHrActive ? '' : 'collapsed' ?>"
      data-bs-toggle="collapse"
      href="#navHumanResources"
      role="button"
      aria-expanded="<?= $isHrActive ? 'true' : 'false' ?>"
      aria-controls="navHumanResources"
      aria-current="false"
    >
      <i class="bi bi-people sup-sidebar__icon" aria-hidden="true"></i>
      <span class="sup-sidebar__label text-truncate">Human Resources</span>
      <i class="bi bi-chevron-down nav-caret ms-auto" aria-hidden="true"></i>
    </a>

    <div class="collapse nav-sub <?= $isHrActive ? 'show' : '' ?>" id="navHumanResources">
      <?php foreach ($hrItems as $item): ?>
        <a
          class="sup-sidebar__link nav-item-sub<?= $current === $item['file'] ? ' is-active' : '' ?>"
          href="<?= htmlspecialchars($item['file'], ENT_QUOTES, 'UTF-8') ?>"
          aria-current="<?= $current === $item['file'] ? 'page' : 'false' ?>"
        >
          <i class="bi bi-dot sup-sidebar__icon" aria-hidden="true"></i>
          <span class="sup-sidebar__label text-truncate"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>
</aside>

