<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrightBoard — Internal Hub</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #0d1117; color: #e6edf3; min-height: 100vh; }
        header { background: #161b22; border-bottom: 1px solid #30363d; padding: 14px 40px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #7c3aed; }
        nav a { color: #8b949e; text-decoration: none; margin-left: 28px; font-size: 14px; }
        nav a:hover { color: #e6edf3; }
        .hero { text-align: center; padding: 80px 20px 60px; background: linear-gradient(180deg, #161b22 0%, #0d1117 100%); }
        .hero-badge { display: inline-block; background: rgba(124,58,237,0.15); border: 1px solid rgba(124,58,237,0.4); color: #a78bfa; font-size: 12px; padding: 4px 14px; border-radius: 20px; margin-bottom: 20px; letter-spacing: 1px; text-transform: uppercase; }
        .hero h1 { font-size: 46px; color: #e6edf3; font-weight: 700; margin-bottom: 14px; }
        .hero h1 span { color: #7c3aed; }
        .hero p { color: #8b949e; font-size: 16px; max-width: 520px; margin: 0 auto; line-height: 1.6; }
        .cards { display: flex; gap: 20px; justify-content: center; padding: 48px 40px 80px; flex-wrap: wrap; }
        .card { background: #161b22; border: 1px solid #30363d; border-radius: 10px; padding: 32px 28px; width: 230px; text-align: center; transition: border-color 0.2s; }
        .card:hover { border-color: #7c3aed; }
        .card-icon { font-size: 28px; margin-bottom: 14px; }
        .card h3 { color: #e6edf3; font-size: 16px; margin-bottom: 8px; }
        .card p { color: #8b949e; font-size: 13px; margin-bottom: 20px; line-height: 1.5; }
        .btn { display: inline-block; background: #7c3aed; color: #fff; padding: 9px 22px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 500; }
        .btn:hover { background: #6d28d9; }
        footer { text-align: center; padding: 20px; color: #484f58; font-size: 12px; border-top: 1px solid #21262d; }
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
<div class="hero">
    <div class="hero-badge">Internal Platform</div>
    <h1>Welcome to <span>BrightBoard</span></h1>
    <p>Your company's internal communications hub. Search announcements, share updates, and stay connected with your team.</p>
</div>
<div class="cards">
    <div class="card">
        <div class="card-icon">&#128269;</div>
        <h3>Search</h3>
        <p>Find announcements and posts by keyword.</p>
        <a href="search.php" class="btn">Search Posts</a>
    </div>
    <div class="card">
        <div class="card-icon">&#128203;</div>
        <h3>Message Board</h3>
        <p>Read and post company-wide announcements.</p>
        <a href="board.php" class="btn">View Board</a>
    </div>
    <div class="card">
        <div class="card-icon">&#128100;</div>
        <h3>Profile</h3>
        <p>View your personalized welcome page.</p>
        <a href="welcome.php?name=Guest" class="btn">My Profile</a>
    </div>
</div>
<footer>&copy; 2024 BrightBoard Internal Hub &mdash; For authorized employees only</footer>
</body>
</html>
