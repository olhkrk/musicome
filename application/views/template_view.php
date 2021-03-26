<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Musicome</title>
    <script type="text/javascript" src="/js/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/musicpages.css" />
    <link rel="icon" type="image/ico" href="/media/image/f/a/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/carousel.js"></script>
    <script type="text/javascript" src="/js/carousel-vertical.js"></script>
</head>
<body>
<?php include 'application/views/header_view.php'; ?>
<div class="content">
    <?php include 'application/views/'.$content_view; ?>
</div>
</body>
</html>
