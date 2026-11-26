<?php
require_once 'db.php';
$pdo     = get_db();
$author  = $_POST['author']  ?? '';
$content = $_POST['content'] ?? '';
if ($author !== '' && $content !== '') {
    $stmt = $pdo->prepare("INSERT INTO posts (author, content) VALUES (?, ?)");
    $stmt->execute([$author, $content]);
}
header('Location: board.php');
exit;
