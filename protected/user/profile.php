<?php
	
	require_once DATABASE_CONTROLLER;
	$query = "SELECT address, additionalAddress, birthDate, city, state, zip FROM users WHERE uid = :id";
	$params = [
		':id' => $_SESSION['uid']
	];

	$user = getRecord($query, $params);

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUser'])) {
		$updateData = [

		  'firstname' => $_POST['firstname'],
		  'lastname' => $_POST['lastname'],
		  'address' => $_POST['address'],
		  'birthdate' => $_POST['birthdate'],
		  'city' => $_POST['city'],
		  'state' => $_POST['state'],
		  'zip' => $_POST['zip']

		];

		if (empty($updateData['firstname']) || empty($updateData['lastname']) || empty($updateData['address']) || empty($updateData['birthdate']) || empty($updateData['city']) || empty($updateData['state']) || empty($updateData['zip'])) {
		  echo "<h1>Missing data!</h1>";
		} else {

			$query = "UPDATE users SET firstName = :firstName, lastName = :lastName, address = :address, birthDate = :birthDate, city = :city, state = :state, zip = :zip WHERE uid = :id";
			$params = [
				':firstName' => $updateData['firstname'],
				':lastName' => $updateData['lastname'],
				':address' => $updateData['address'],
				':birthDate' => $updateData['birthdate'],
				':city' => $updateData['city'],
				':state' => $updateData['state'],
				':zip' => $updateData['zip'],
				':id' => $_SESSION['uid']
			];

			if (!executeDML($query, $params)) {
				echo "<h1>Error while updating data!</h1>";
			}
			else {
				header ('Location: index.php?page=home');
			}

		}

  	}
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
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="<?=$user['address']?>">
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
    <div class="form-group col-md-2">
      <br>
      <button type="submit" class="btn btn-primary btn-block" name="editUser">Edit</button>
    </div>
  </div>
</form>