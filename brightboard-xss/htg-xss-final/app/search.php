<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search — BrightBoard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #0d1117; color: #e6edf3; min-height: 100vh; }
        header { background: #161b22; border-bottom: 1px solid #30363d; padding: 14px 40px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #7c3aed; }
        nav a { color: #8b949e; text-decoration: none; margin-left: 28px; font-size: 14px; }
        nav a:hover { color: #e6edf3; }
        .main { max-width: 700px; margin: 60px auto; padding: 0 20px; }
        h2 { font-size: 24px; color: #e6edf3; margin-bottom: 28px; }
        .search-wrap { display: flex; gap: 10px; margin-bottom: 30px; }
        .search-wrap input { flex: 1; padding: 11px 16px; font-size: 15px; background: #161b22; border: 1px solid #30363d; border-radius: 6px; color: #e6edf3; outline: none; }
        .search-wrap input:focus { border-color: #7c3aed; }
        .search-wrap button { background: #7c3aed; color: #fff; border: none; padding: 11px 22px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; }
        .results-info { color: #8b949e; font-size: 14px; margin-bottom: 16px; padding: 12px 16px; background: #161b22; border: 1px solid #30363d; border-radius: 6px; }
        .no-results { color: #484f58; font-size: 14px; }
        footer { text-align: center; padding: 40px 20px 20px; color: #484f58; font-size: 12px; }
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
    <h2>Search Posts</h2>
    <form action="search.php" method="GET">
        <div class="search-wrap">
            <input type="text" name="q" value="<?php echo $_GET['q'] ?? ''; ?>" placeholder="Search announcements...">
            <button type="submit">Search</button>
        </div>
    </form>
    <?php if (isset($_GET['q']) && $_GET['q'] !== ''): ?>
        <div class="results-info">
            Showing results for: <?php echo $_GET['q']; ?>
        </div>
        <p class="no-results">No posts matched your search.</p>
    <?php endif; ?>
</div>
<footer>&copy; 2024 BrightBoard Internal Hub</footer>
</body>
</html>
