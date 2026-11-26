<?php
function get_db() {
    $db_path = '/var/www/html/data/posts.db';
    $is_new  = !file_exists($db_path);

    $pdo = new PDO('sqlite:' . $db_path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($is_new) {
        $pdo->exec("CREATE TABLE posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            author  TEXT NOT NULL,
            content TEXT NOT NULL,
            created_at DATETIME DEFAULT (datetime('now'))
        )");
        $pdo->exec("INSERT INTO posts (author, content) VALUES
            ('admin',     'Welcome to BrightBoard! This is the official internal communications hub for all company announcements.'),
            ('jsmith',    'Reminder: Q3 performance reviews are due by end of this week. Please submit via the HR portal.'),
            ('mwilliams', 'The new VPN client has been deployed. Contact IT support if you experience any connection issues.')
        ");
    }

    return $pdo;
}
