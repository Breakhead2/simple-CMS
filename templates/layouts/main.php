<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <!-- Font Awesome link -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script src="/js/main.js" defer></script>
    <link rel="stylesheet" href="/css/style.css?<?=rand(1, 1000000)?>">
</head>
<body>
<?=$menu?>
<?=$content?>
</body>
</html>