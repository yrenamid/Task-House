<?php

$activeNav = $activeNav ?? '';
$navClass = fn($key) => $activeNav === $key ? 'nav-item active' : 'nav-item';
$current = basename($_SERVER['PHP_SELF'] ?? '');
$isHrActive = in_array($current, ['codeofConduct.php', 'employeeHandbook.php'], true);
?>
<aside
  id="sidebar"
  class="offcanvas offcanvas-start offcanvas-md text-bg-dark app-sidebar"
  tabindex="-1"
  aria-labelledby="sidebarLabel"
>
  <div class="sidebar-top">
    <a class="brand" href="index.php" aria-label="Task House Home">
      <span class="brand-badge" aria-hidden="true"></span>
      <span id="sidebarLabel" class="brand-text">Task House</span>
    </a>
    <button class="btn btn-ghost sidebar-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close sidebar">
      <span aria-hidden="true">✕</span>
    </button>
  </div>

  <nav class="sidebar-nav" aria-label="Primary">
    <a class="<?= $navClass('welcome') ?>" href="index.php" data-nav="welcome">
     <i class="bi bi-house-door-fill"></i> 
      <span>Welcome</span>
    </a>


    <a class="<?= $navClass('attendance') ?>" href="attendance.php" data-nav="attendance">
      <i class="bi bi-calendar3"></i>
      <span>Attendance</span>
    </a>

    <a class="<?= $navClass('myTasks') ?>" href="myTasks.php" data-nav="myTasks">
      <i class="bi bi-card-checklist"></i>
      <span>My Tasks</span>
    </a>


    <!-- Human Resources (collapsible) -->
    <a
      class="nav-item <?= $isHrActive ? '' : 'collapsed' ?>"
      data-bs-toggle="collapse"
      href="#navHumanResources"
      role="button"
      aria-expanded="<?= $isHrActive ? 'true' : 'false' ?>"
      aria-controls="navHumanResources"
    >
      <i class="bi bi-people"></i>
      <span class="col">Human Resources</span>
      <i class="bi bi-chevron-down nav-caret"></i>
    </a>

    <div class="collapse nav-sub <?= $isHrActive ? 'show' : '' ?>" id="navHumanResources">
      <a class="nav-item nav-item-sub <?= $current === 'codeofConduct.php' ? 'active' : '' ?>" href="codeofConduct.php">
        <i class="bi bi-dot"></i>
        <span class="col">Code of Conduct</span>
      </a>

      <a class="nav-item nav-item-sub <?= $current === 'employeeHandbook.php' ? 'active' : '' ?>" href="employeeHandbook.php">
        <i class="bi bi-dot"></i>
        <span class="col">Employee Handbook</span>
      </a>
    </div>
  </nav>
</aside>

