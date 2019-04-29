<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>The Library</title>
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
  <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
</head>
<body>
  <main class="container">
    <?php
      if (!isset($_GET['page'])) {
        $page = 'home';
      } else {
        $page = $_GET['page'];
      }

      require('nav.php');

      require('router.php');
    ?>
  </main>
</body>
</html>
