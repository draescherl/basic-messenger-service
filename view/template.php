<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?= $title ?></title>

    <!-- favicon -->
    <link rel="icon" href="static/img/logos/favicon.ico">

    <!-- CSS -->
    <link href="static/css/bootstrap.css" type="text/css" rel="stylesheet" media="screen, projection"/>
    <link href="static/css/style.css" type="text/css" rel="stylesheet" media="screen, projection"/>

    <?php if (isset($style)): ?>
    <?= $style ?>
    <?php endif ?>
</head>
<body>
    
    <div class="site-container">
        <header class="site-header">
            
        </header>

        <main class="site-content">
            <!-- Display page content -->
            <?= $content ?>
        </main>

        <footer class="site-footer">
            
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="static/js/bootstrap.js"></script>

    <?php if (isset($style)): ?>
    <?= $script ?>
    <?php endif ?>
</body>
</html>