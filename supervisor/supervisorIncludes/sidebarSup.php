<?php
$activeNav = $activeNav ?? '';
$userName = $userName ?? 'John Daniels';
$userInitials = $userInitials ?? 'JD';
$userRole = $userRole ?? 'Supervisor';

$normalizedActiveNav = strtolower(str_replace(['_', ' '], '-', (string) $activeNav));

$navItems = [
  ['id' => 'my-accounts', 'label' => 'My Accounts', 'icon' => 'bi-briefcase-fill', 'href' => 'myAccounts.php'],
  ['id' => 'task-approvals', 'label' => 'Task Approvals', 'icon' => 'bi-check-circle-fill', 'href' => 'taskapprovals.php'],
  ['id' => 'incident-report', 'label' => 'Incident Report', 'icon' => 'bi-exclamation-triangle-fill', 'href' => 'incidentReport.php'],
  ['id' => 'DTR', 'label' => 'DTR', 'icon' => 'bi-calendar-fill', 'href' => 'dtr-page.php'],
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

      <button
        class="btn btn-ghost sidebar-close d-md-none"
        type="button"
        data-bs-dismiss="offcanvas"
        aria-label="Close sidebar"
      >
        <span aria-hidden="true">✕</span>
      </button>
    </div>
  </div>

  <nav class="sup-sidebar__nav" aria-label="Supervisor navigation">
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
  </nav>

</aside>


