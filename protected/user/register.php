<?php
  $query = "SELECT username FROM users";
  require_once DATABASE_CONTROLLER;
  $uname = getRecord($query);

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $registerData = [

      'username' => $_POST['username'],
      'firstname' => $_POST['firstname'],
      'lastname' => $_POST['lastname'],
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'confirmpassword' => $_POST['confirmpassword'],
      'address' => $_POST['address'],
      'additionaladdress' => $_POST['additionaladdress'],
      'birthdate' => $_POST['birthdate'],
      'city' => $_POST['city'],
      'state' => $_POST['state'],
      'zip' => $_POST['zip']

    ];

    if (empty($registerData['username']) || empty($registerData['firstname']) || empty($registerData['lastname']) || empty($registerData['email']) || empty($registerData['password']) || empty($registerData['confirmpassword']) || empty($registerData['address']) || empty($registerData['birthdate']) || empty($registerData['city']) || empty($registerData['state']) || empty($registerData['zip'])) {
      echo "<h1>Missing data!</h1>";
    } else if(!filter_var($registerData['email'], FILTER_VALIDATE_EMAIL)) {
      echo "<h1>Wrong email format!</h1>";
    } else if ($registerData['password'] != $registerData['confirmpassword']) {
      echo "<h1>Your passwords don't match!</h1>";
    } else if ($uname == $registerData['username']) {
      echo "<h1>This username is already in use!</h1>";
    } else if (!UserRegister($registerData['username'], $registerData['firstname'], $registerData['lastname'], $registerData['email'], $registerData['password'], $registerData['address'], $registerData['additionaladdress'], $registerData['birthdate'], $registerData['city'], $registerData['state'], $registerData['zip'])) {
      echo "<h1>Error while register you in the system!</h1>";
    }

    $registerData['password'] = $registerData['confirmpassword'] = "";

  }
?>

<form method="POST">
  <div class="col-sm-12">
      <h4><small>Register to start buying cars immediately</small></h4>
      <hr>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Username</label>
      <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
    </div>
    <div class="form-group col-md-3">
      <label>First Name</label>
      <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstname">
    </div>
    <div class="form-group col-md-3">
      <label>Last Name</label>
      <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password" name="confirmpassword">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Additional details of address</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, floor etc..." name="additionaladdress">
  </div>
  <div class="form-group col-md-6">
   <label>Birth Date</label>
   <input type="date" name="birthdate" max="3000-12-31" 
          min="1000-01-01" class="form-control">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state">
        <option selected>Choose...</option>
        <option>Bács-Kiskun</option>
        <option>Baranya</option>
        <option>Békés</option>
        <option>Borsod-Abaúj-Zemplén</option>
        <option>Csongrád</option>
        <option>Fejér</option>
        <option>Győr-Moson-Sopron</option>
        <option>Hajdú-Bihar</option>
        <option>Heves</option>
        <option>Jász-Nagykun-Szolnok</option>
        <option>Komárom-Esztergom</option>
        <option>Nógrád</option>
        <option>Pest</option>
        <option>Somogy</option>
        <option>Szabolcs-Szatmár-Bereg</option>
        <option>Tolna</option>
        <option>Vas</option>
        <option>Veszprém</option>
        <option>Zala</option>
      </select>
    </div>
    <div class="form-group col-md-1">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="zip">
    </div>
  </div>
  <div class="form-group col-md-2">
    <br><br><hr>
    <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
  </div>
</form>