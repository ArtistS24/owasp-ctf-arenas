<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile — BrightBoard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #0d1117; color: #e6edf3; min-height: 100vh; }
        header { background: #161b22; border-bottom: 1px solid #30363d; padding: 14px 40px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #7c3aed; }
        nav a { color: #8b949e; text-decoration: none; margin-left: 28px; font-size: 14px; }
        nav a:hover { color: #e6edf3; }
        .main { max-width: 600px; margin: 80px auto; padding: 0 20px; text-align: center; }
        .avatar { width: 80px; height: 80px; background: rgba(124,58,237,0.2); border: 2px solid #7c3aed; border-radius: 50%; margin: 0 auto 24px; display: flex; align-items: center; justify-content: center; font-size: 32px; }
        .welcome-text { font-size: 28px; color: #e6edf3; margin-bottom: 10px; }
        .welcome-text span { color: #7c3aed; }
        .sub { color: #8b949e; font-size: 15px; margin-bottom: 32px; }
        .info-box { background: #161b22; border: 1px solid #30363d; border-radius: 8px; padding: 20px 28px; text-align: left; }
        .info-box p { color: #8b949e; font-size: 13px; margin-bottom: 6px; }
        .info-box p span { color: #c9d1d9; }
        footer { text-align: center; padding: 60px 20px 20px; color: #484f58; font-size: 12px; }
    </style>
</head>
<body>
<header>
    <span class="logo">BrightBoard</span>
    <nav>
        <a href="index.php">Home</a>
        <a href="search.php">Search</a>
        <a href="board.php">Message Board</a>
        <a href="welcome.php?name=Guest">Profile</a>
    </nav>
</header>
<div class="main">
    <div class="avatar">&#128100;</div>
    <div class="welcome-text">Hello, <span id="username"></span>!</div>
    <p class="sub">You are viewing your BrightBoard profile page.</p>
    <div class="info-box">
        <p>Platform: <span>BrightBoard Internal Hub</span></p>
        <p>Access Level: <span>Standard Employee</span></p>
        <p>Status: <span>Active</span></p>
    </div>
</div>
<footer>&copy; 2024 BrightBoard Internal Hub</footer>
<script>
    var params = new URLSearchParams(window.location.search);
    var name = params.get('name') || 'Guest';
    document.getElementById('username').innerHTML = name;
</script>
</body>
</html>
