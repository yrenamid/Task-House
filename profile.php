<?php
$pageTitle = 'Task House';
$activeNav = '';
require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main profile-page">
  <?php require __DIR__ . '/includes/app-header.php'; ?>

  <section class="container-fluid px-3 px-md-4 py-3 py-lg-4">
    <div class="mb-3 mb-lg-4">
      <h1 class="profile-page-title mb-1">Update Profile</h1>
      <p class="profile-page-subtitle mb-0">Manage your personal information</p>
    </div>

    <div class="card profile-card border-0 shadow-sm">
      <div class="card-header profile-card-header border-0">
        <h2 class="h5 mb-0 text-white">Profile Information</h2>
      </div>

      <div class="card-body p-3 p-md-4 p-lg-4">
        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4 pb-4 border-bottom border-stroke">
          <div class="profile-photo-wrap position-relative">
            <div class="profile-photo-placeholder rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person-fill" aria-hidden="true"></i>
            </div>
            <label for="photoInput" class="btn profile-photo-button rounded-circle" aria-label="Change photo">
              <i class="bi bi-camera-fill" aria-hidden="true"></i>
            </label>
            <input id="photoInput" class="visually-hidden" type="file" accept="image/*" aria-label="Select profile photo">
          </div>

          <div class="flex-grow-1 text-center text-md-start">
            <h3 class="h4 mb-1 text-white">John Daniels</h3>
            <p class="mb-1 profile-meta">Senior Software Engineer</p>
            <p class="mb-0 profile-meta-small">Employee ID: EMP-2026-0423</p>
          </div>
        </div>

        <div class="pt-4">
          <h3 class="h5 text-white mb-4">Personal Information</h3>

          <div class="mb-4">
            <p class="profile-meta-small mb-3">View-only fields</p>

            <div class="row g-3 g-lg-4">
              <div class="col-12 col-md-6">
                <label class="form-label profile-label-muted" for="employeeId">Employee ID</label>
                <input id="employeeId" type="text" class="form-control profile-input profile-input-readonly" value="EMP-2026-0423" readonly>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label-muted" for="fullName">Full Name</label>
                <input id="fullName" type="text" class="form-control profile-input profile-input-readonly" value="John Daniels" readonly>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label-muted" for="companyEmail">Company Email Address</label>
                <input id="companyEmail" type="email" class="form-control profile-input profile-input-readonly" value="john.daniels@company.com" readonly>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label-muted" for="department">Department</label>
                <input id="department" type="text" class="form-control profile-input profile-input-readonly" value="IT" readonly>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label-muted" for="role">Role</label>
                <input id="role" type="text" class="form-control profile-input profile-input-readonly" value="Web Developer" readonly>
              </div>
            </div>
          </div>

          <div class="mb-2">
            <p class="profile-meta-small mb-3">Editable fields</p>

            <div class="row g-3 g-lg-4">
              <div class="col-12 col-md-6">
                <label class="form-label profile-label" for="personalEmail">Personal Email Address <span>*</span></label>
                <input id="personalEmail" type="email" class="form-control profile-input" value="john.daniels@gmail.com" placeholder="example@gmail.com">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label" for="contactNumber">Contact Number <span>*</span></label>
                <input id="contactNumber" type="tel" class="form-control profile-input" value="+1 (555) 123-4567">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label" for="permanentAddress">Permanent Address <span>*</span></label>
                <textarea id="permanentAddress" class="form-control profile-input" rows="3" placeholder="Enter permanent address">123 Oak Street, Apartment 4B, Springfield, IL 62701</textarea>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label profile-label" for="currentAddress">Current Address <span>*</span></label>
                <textarea id="currentAddress" class="form-control profile-input" rows="3" placeholder="Enter current address">456 Pine Avenue, Unit 202, Chicago, IL 60601</textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="pt-4 mt-4 border-top border-stroke">
          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-lock-fill profile-lock-icon" aria-hidden="true"></i>
            <h3 class="h5 text-white mb-0">Account Credentials</h3>
          </div>

          <div class="row g-3 g-lg-4">
            <div class="col-12">
              <label class="form-label profile-label" for="username">Username <span>*</span></label>
              <input id="username" type="text" class="form-control profile-input" value="john.daniels" placeholder="Enter username">
            </div>

            <div class="col-12">
              <div class="profile-note-box">
                <strong>Password Update:</strong> Enter current password before setting a new one. New password should be at least 8 characters.
              </div>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label profile-label" for="currentPassword">Current Password</label>
              <input id="currentPassword" type="password" class="form-control profile-input" placeholder="Enter current password">
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label profile-label" for="newPassword">New Password <span>*</span></label>
              <input id="newPassword" type="password" class="form-control profile-input" placeholder="Enter new password">
              <p class="profile-meta-small mt-1 mb-0">Minimum 8 characters</p>
            </div>

            <div class="col-12">
              <label class="form-label profile-label" for="confirmPassword">Confirm New Password <span>*</span></label>
              <input id="confirmPassword" type="password" class="form-control profile-input" placeholder="Confirm new password">
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end pt-4 mt-4 border-top border-stroke">
          <button type="button" class="btn btn-teal-app profile-save-btn">
            <i class="bi bi-check-lg" aria-hidden="true"></i>
            <span>Save Changes</span>
          </button>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
