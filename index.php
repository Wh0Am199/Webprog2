<?php 
  session_start();
  require_once 'protected/config.php';
  require_once PROTECTED_DIR.'manager.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="public/css/stlye.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
  <div>
    <header><?php include_once PROTECTED_DIR.'header.php';?></header>
    <nav><?php require_once PROTECTED_DIR.'nav.php';?></nav>
    <content><?php require_once PROTECTED_DIR.'routing.php';?></content>
    <footer><?php include_once PROTECTED_DIR.'footer.php';?></footer>
  </div>
</body>
</html>