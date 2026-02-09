<?php

$activeNav = $activeNav ?? '';
$navClass = fn($key) => $activeNav === $key ? 'nav-item active' : 'nav-item';
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
 

 

  </nav>
</aside>
