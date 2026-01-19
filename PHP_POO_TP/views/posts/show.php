<!doctype html>
<html>
<head><meta charset="utf-8"><title><?= htmlspecialchars($post['title']) ?></title></head>
<body>
<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><?= nl2br(htmlspecialchars($post['body'])) ?></p>
<p><a href="/posts">Back to list</a></p>
</body>
</html>