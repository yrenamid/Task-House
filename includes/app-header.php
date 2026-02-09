<?php


$pageTitleText = $pageTitleText ?? 'Welcome';
$userName = $userName ?? 'John Doe';
$userInitials = $userInitials ?? 'JD';
?>
<header class="app-header">
  <div class="header-left">
    <button
      class="btn btn-ghost header-icon d-md-none"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#sidebar"
      aria-controls="sidebar"
      aria-label="Open sidebar"
    >
      <i class="bi bi-list fs-3"></i>
    </button>

    <div class="page-title d-none d-md-block"><?= htmlspecialchars($pageTitleText, ENT_QUOTES, 'UTF-8') ?></div>
  </div>

  <div class="header-right">
    

    <div class="dropdown d-none d-md-block">
      <button class="btn btn-ghost profile-chip dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="avatar"><?= htmlspecialchars($userInitials, ENT_QUOTES, 'UTF-8') ?></span>
        <span class="ms-2 d-none d-lg-inline"><?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?></span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><hr class="dropdown-divider" /></li>
        <li><a class="dropdown-item" href="#">Logout</a></li>
      </ul>
    </div>

    <div class="dropdown d-md-none">
      <button class="btn btn-ghost header-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Open menu">
        <span aria-hidden="true">⋮</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end dropdown-dark">
        <li><button class="dropdown-item" type="button">Profile</button></li>
        <li><button class="dropdown-item" type="button">Settings</button></li>
        <li><hr class="dropdown-divider" /></li>
        <li><button class="dropdown-item" type="button">Logout</button></li>
      </ul>
    </div>
  </div>
</header>
