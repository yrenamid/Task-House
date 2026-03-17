<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="login-page">
    <div class="geometric-accent-1"></div>
    <div class="geometric-accent-2"></div>
    <div class="geometric-accent-3"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-form-panel">
                <div class="form-container">
                    <h1 class="form-title">Welcome back</h1>
                    <p class="form-subtitle">Sign in to access your dashboard</p>

                    <form class="login-form" method="GET" action="index.php">
                        <div class="input-group-icon">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="username" 
                                placeholder="Enter your username"
                                required
                            >
                        </div>

                        <div class="input-group-icon">
                            <span class="icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password" 
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                id="remember" 
                                name="remember"
                            >
                            <label class="form-check-label" for="remember">
                                Remember me?
                            </label>
                        </div>

                        <button type="submit" class="btn-login">
                            Log In
                        </button>

                        <p class="helper-text">
                            Need help? Contact your administrator
                        </p>
                    </form>
                </div>
            </div>

            <div class="brand-panel">
                <div class="brand-content">
                    <h2 class="brand-heading">
                        <span class="brand-line">Attendance, tasks,</span>
                        <span class="brand-line">and schedules</span>
                        <span class="brand-line">all in one place.</span>
                    </h2>
                </div>

                <div class="brand-footer">
                    <div class="brand-logo">
                        <div class="brand-logo-inner">
                            <i class="fas fa-check brand-logo-icon"></i>
                        </div>
                    </div>
                    <div class="brand-info">
                        <h3>Task House</h3>
                        <p>Workforce Management System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
