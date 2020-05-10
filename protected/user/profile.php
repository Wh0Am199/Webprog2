<?php
	
	require_once DATABASE_CONTROLLER;
	$query = "SELECT address, additionalAddress, birthDate, city, state, zip FROM users WHERE uid = :id";
	$params = [
		':id' => $_SESSION['uid']
	];

	$user = getRecord($query, $params);


?>


<form method="POST">
  <div class="col-sm-12">
      <h4><small>THIS IS YOUR PROFILE: <?=$_SESSION['lastName']?> <?=$_SESSION['firstName']?></small></h4>
      <hr>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label>First Name</label>
      <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="firstname" value="<?=$_SESSION['firstName']?>">
    </div>
    <div class="form-group col-md-3">
      <label>Last Name</label>
      <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lastname" value="<?=$_SESSION['lastName']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="<?=$_SESSION['email']?>">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="<?=$user['address']?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Additional details of address</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, floor etc..." name="additionaladdress" value="<?=$user['additionalAddress']?>">
  </div>
  <div class="form-group col-md-6">
   <label>Birth Date</label>
   <input type="date" name="birthdate" max="3000-12-31" 
          min="1000-01-01" class="form-control" value="<?=$user['birthDate']?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="city" value="<?=$user['city']?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" name="state" value="<?=$user['state']?>">
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
      <input type="text" class="form-control" id="inputZip" name="zip" value="<?=$user['zip']?>">
    </div>
  </div>
</form>