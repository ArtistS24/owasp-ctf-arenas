<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

$conn = null;
for ($i = 0; $i < 10; $i++) {
    $conn = @new mysqli($host, $user, $pass, $db);
    if (!$conn->connect_error) break;
    sleep(1);
}

$message = "";
$row     = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $query    = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    try {
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            $message = "Invalid username or password.";
        }
    } catch (mysqli_sql_exception $e) {
        $message = "SQL Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="color-scheme" content="light">
  <title>CorpNet - Employee Portal</title>
  <style>
    :root { color-scheme: light; }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; forced-color-adjust: none; }
    html { background: #f0f2f5 !important; }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #f0f2f5 !important;
      color: #111827 !important;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .wrapper { width: 100%; max-width: 420px; padding: 24px; }
    .logo { text-align: center; margin-bottom: 32px; }
    .logo-icon {
      width: 48px; height: 48px;
      background: #1a56db !important;
      border-radius: 10px;
      display: inline-flex; align-items: center; justify-content: center;
      margin-bottom: 12px;
    }
    .logo-icon svg { width: 26px; height: 26px; fill: white !important; }
    .logo h1 { font-size: 20px; font-weight: 600; color: #111827 !important; }
    .logo p { font-size: 13px; color: #6b7280 !important; margin-top: 2px; }
    .card {
      background: #ffffff !important;
      border-radius: 12px; padding: 32px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.08), 0 4px 16px rgba(0,0,0,0.06);
    }
    .card h2 { font-size: 17px; font-weight: 600; color: #111827 !important; margin-bottom: 6px; }
    .card .subtitle { font-size: 13px; color: #6b7280 !important; margin-bottom: 24px; }
    label { display: block; font-size: 13px; font-weight: 500; color: #374151 !important; margin-bottom: 6px; }
    input[type=text], input[type=password] {
      width: 100%; padding: 10px 14px;
      border: 1px solid #d1d5db !important; border-radius: 8px;
      font-size: 14px; color: #111827 !important; background: #ffffff !important;
      margin-bottom: 18px; outline: none;
    }
    input[type=text]:focus, input[type=password]:focus {
      border-color: #1a56db !important;
      box-shadow: 0 0 0 3px rgba(26,86,219,0.12);
    }
    input[type=submit] {
      width: 100%; padding: 11px;
      background: #1a56db !important; color: #ffffff !important;
      border: none; border-radius: 8px;
      font-size: 14px; font-weight: 600; cursor: pointer;
    }
    input[type=submit]:hover { background: #1648c0 !important; }
    .error {
      background: #fef2f2 !important; border: 1px solid #fecaca !important;
      color: #b91c1c !important; font-size: 12px;
      padding: 10px 14px; border-radius: 8px; margin-top: 16px;
      font-family: monospace; word-break: break-all;
    }
    .dashboard {
      background: #f0fdf4 !important; border: 1px solid #bbf7d0 !important;
      border-radius: 8px; margin-top: 16px; overflow: hidden;
    }
    .dashboard-header {
      background: #15803d !important; color: #ffffff !important;
      padding: 10px 16px; font-size: 13px; font-weight: 600;
    }
    .dashboard-body { padding: 14px 16px; }
    .info-row {
      display: flex; justify-content: space-between;
      padding: 6px 0; border-bottom: 1px solid #dcfce7 !important;
      font-size: 13px;
    }
    .info-row:last-child { border-bottom: none !important; }
    .info-label { color: #166534 !important; font-weight: 500; }
    .info-value { color: #111827 !important; font-family: monospace; }
    .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #9ca3af !important; }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="logo">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2a5 5 0 1 1 0 10A5 5 0 0 1 12 2zm0 12c5.33 0 8 2.67 8 4v2H4v-2c0-1.33 2.67-4 8-4z"/>
        </svg>
      </div>
      <h1>CorpNet</h1>
      <p>Employee Portal</p>
    </div>

    <div class="card">
      <h2>Sign in to your account</h2>
      <p class="subtitle">Use your corporate credentials to continue.</p>

      <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">
        <input type="submit" value="Sign In">
      </form>

      <?php if ($row): ?>
        <div class="dashboard">
          <div class="dashboard-header">Access Granted &mdash; Welcome, <?= htmlspecialchars($row['username']) ?></div>
          <div class="dashboard-body">
            <div class="info-row">
              <span class="info-label">Department</span>
              <span class="info-value"><?= htmlspecialchars($row['department']) ?></span>
            </div>
            <div class="info-row">
              <span class="info-label">Role</span>
              <span class="info-value"><?= htmlspecialchars($row['role']) ?></span>
            </div>
            <div class="info-row">
              <span class="info-label">Access Code</span>
              <span class="info-value"><?= htmlspecialchars($row['access_code']) ?></span>
            </div>
          </div>
        </div>
        <div style="margin-top:12px;text-align:center;">
          <a href="search.php" style="display:inline-block;padding:9px 20px;background:#1a56db;color:#fff;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;">Employee Directory &rarr;</a>
        </div>
      <?php elseif ($message): ?>
        <div class="error"><?= htmlspecialchars($message) ?></div>
      <?php endif; ?>
    </div>

    <div class="footer">&copy; 2024 CorpNet Systems. All rights reserved.</div>
  </div>
</body>
</html>
