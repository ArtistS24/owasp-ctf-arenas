<?php
require_once 'db.php';
setcookie('session_token', 'BRIGHT-2024-s3Ss10N-9kRm', 0, '/');
$pdo    = get_db();
$result = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts  = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Board — BrightBoard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #0d1117; color: #e6edf3; min-height: 100vh; }
        header { background: #161b22; border-bottom: 1px solid #30363d; padding: 14px 40px; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 18px; font-weight: 700; color: #7c3aed; }
        nav a { color: #8b949e; text-decoration: none; margin-left: 28px; font-size: 14px; }
        nav a:hover { color: #e6edf3; }
        .main { max-width: 720px; margin: 50px auto; padding: 0 20px; }
        h2 { font-size: 24px; color: #e6edf3; margin-bottom: 28px; }
        .post { background: #161b22; border: 1px solid #30363d; border-radius: 8px; padding: 20px 24px; margin-bottom: 16px; }
        .post-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .post-author { font-weight: 600; color: #7c3aed; font-size: 14px; }
        .post-time { color: #484f58; font-size: 12px; }
        .post-content { color: #c9d1d9; font-size: 14px; line-height: 1.6; }
        .divider { border: none; border-top: 1px solid #21262d; margin: 36px 0; }
        h3 { font-size: 18px; color: #e6edf3; margin-bottom: 20px; }
        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; color: #8b949e; font-size: 13px; margin-bottom: 6px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px 14px; background: #161b22; border: 1px solid #30363d; border-radius: 6px; color: #e6edf3; font-size: 14px; font-family: inherit; outline: none; resize: vertical; }
        .form-group input:focus, .form-group textarea:focus { border-color: #7c3aed; }
        .form-group textarea { min-height: 90px; }
        .submit-btn { background: #7c3aed; color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 500; cursor: pointer; }
        .submit-btn:hover { background: #6d28d9; }
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
    <h2>Message Board</h2>
    <?php foreach ($posts as $row): ?>
    <div class="post">
        <div class="post-header">
            <span class="post-author"><?php echo $row['author']; ?></span>
            <span class="post-time"><?php echo $row['created_at']; ?></span>
        </div>
        <div class="post-content"><?php echo $row['content']; ?></div>
    </div>
    <?php endforeach; ?>
    <hr class="divider">
    <h3>Post an Announcement</h3>
    <form action="post.php" method="POST">
        <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="author" placeholder="e.g. jsmith" required>
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="content" placeholder="Write your announcement here..." required></textarea>
        </div>
        <button type="submit" class="submit-btn">Post</button>
    </form>
</div>
<footer>&copy; 2024 BrightBoard Internal Hub</footer>
</body>
</html>
