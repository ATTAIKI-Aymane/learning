<!doctype html>
<html>
<head><meta charset="utf-8"><title>Posts</title></head>
<body>
<h1>Posts</h1>
<ul>
<?php foreach ($posts as $p): ?>
    <li><strong><?= htmlspecialchars($p['title']) ?></strong>: <?= htmlspecialchars($p['body']) ?></li>
<?php endforeach; ?>
</ul>
</body>
</html>