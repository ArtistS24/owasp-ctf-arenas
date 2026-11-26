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

$rows     = [];
$error    = null;
$searched = false;

if (isset($_GET['id']) && $_GET['id'] !== '') {
    $searched = true;
    $id    = $_GET['id'];
    $query = "SELECT id, username, department, role FROM users WHERE id=$id";
    try {
        $res = $conn->query($query);
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $rows[] = $row;
            }
        }
    } catch (mysqli_sql_exception $e) {
        $error = "SQL Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="color-scheme" content="light">
  <title>CorpNet - Employee Directory</title>
  <style>
    :root { color-scheme: light; }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; forced-color-adjust: none; }
    html { background: #f0f2f5 !important; }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #f0f2f5 !important;
      color: #111827 !important;
      display: flex; justify-content: center;
      min-height: 100vh; padding: 40px 24px;
    }
    .wrapper { width: 100%; max-width: 560px; }
    .logo { text-align: center; margin-bottom: 28px; }
    .logo-icon {
      width: 48px; height: 48px;
      background: #1a56db !important;
      border-radius: 10px;
      display: inline-flex; align-items: center; justify-content: center;
      margin-bottom: 12px;
    }
    .logo-icon svg { width: 26px; height: 26px; fill: white !important; }
    .logo h1 { font-size: 20px; font-weight: 600; color: #111827 !important; }
    .logo p  { font-size: 13px; color: #6b7280 !important; margin-top: 2px; }
    .card {
      background: #ffffff !important;
      border-radius: 12px; padding: 28px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.08), 0 4px 16px rgba(0,0,0,0.06);
      margin-bottom: 16px;
    }
    .card h2 { font-size: 16px; font-weight: 600; color: #111827 !important; margin-bottom: 16px; }
    .search-row { display: flex; gap: 10px; }
    input[type=text] {
      flex: 1; padding: 10px 14px;
      border: 1px solid #d1d5db !important; border-radius: 8px;
      font-size: 14px; color: #111827 !important; background: #ffffff !important;
      outline: none;
    }
    input[type=text]:focus {
      border-color: #1a56db !important;
      box-shadow: 0 0 0 3px rgba(26,86,219,0.12);
    }
    input[type=submit] {
      padding: 10px 20px;
      background: #1a56db !important; color: #ffffff !important;
      border: none; border-radius: 8px;
      font-size: 14px; font-weight: 600; cursor: pointer; white-space: nowrap;
    }
    input[type=submit]:hover { background: #1648c0 !important; }
    .error {
      background: #fef2f2 !important; border: 1px solid #fecaca !important;
      color: #b91c1c !important; font-size: 12px;
      padding: 10px 14px; border-radius: 8px; margin-top: 16px;
      font-family: monospace; word-break: break-all;
    }
    .no-result {
      color: #6b7280 !important; font-size: 13px;
      padding: 16px 0; text-align: center;
    }
    table { width: 100%; border-collapse: collapse; margin-top: 16px; }
    th {
      background: #f9fafb !important; color: #374151 !important;
      font-size: 11px; font-weight: 600; text-transform: uppercase;
      letter-spacing: 0.05em; padding: 10px 12px;
      border-bottom: 1px solid #e5e7eb !important; text-align: left;
    }
    td {
      padding: 10px 12px; font-size: 13px; color: #111827 !important;
      border-bottom: 1px solid #f3f4f6 !important;
    }
    td:first-child { font-family: monospace; color: #6b7280 !important; }
    tr:last-child td { border-bottom: none !important; }
    tr:hover td { background: #f9fafb !important; }
    .back-link {
      text-align: center; font-size: 13px; color: #6b7280 !important;
    }
    .back-link a { color: #1a56db !important; text-decoration: none; }
    .back-link a:hover { text-decoration: underline; }
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
      <p>Employee Directory</p>
    </div>

    <div class="card">
      <h2>Search by Employee ID</h2>
      <form method="GET" action="search.php">
        <div class="search-row">
          <input type="text" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>" placeholder="Enter employee ID (e.g. 1)">
          <input type="submit" value="Search">
        </div>
      </form>

      <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
      <?php elseif ($searched && empty($rows)): ?>
        <div class="no-result">No employee found with that ID.</div>
      <?php elseif (!empty($rows)): ?>
        <table>
          <thead>
            <tr><th>ID</th><th>Username</th><th>Department</th><th>Role</th></tr>
          </thead>
          <tbody>
            <?php foreach ($rows as $r): ?>
            <tr>
              <td><?= htmlspecialchars((string)$r['id']) ?></td>
              <td><?= htmlspecialchars((string)$r['username']) ?></td>
              <td><?= htmlspecialchars((string)$r['department']) ?></td>
              <td><?= htmlspecialchars((string)$r['role']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>

    <div class="back-link"><a href="index.php">&larr; Back to Portal</a></div>
    <div class="footer">&copy; 2024 CorpNet Systems. All rights reserved.</div>
  </div>
</body>
</html>
