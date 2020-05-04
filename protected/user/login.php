<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    $loginData = [

      'username' => $_POST['username'],
      'password' => $_POST['password']
    ];

    if (empty($loginData['username']) || empty($loginData['password'])) {
      echo "<h1>Missing data!</h1>";
    } else if (!UserLogin($loginData['username'], $loginData['password'])) {
      echo "<h1>Login failed!</h1>";
    }
    
  }
?>

<form method="POST">
  <div class="form-group row">
    <label for="inputUsername" class="col-sm-1 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-1 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="signin">Sign in</button>
    </div>
  </div>
</form>