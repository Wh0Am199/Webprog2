<?php
	require_once DATABASE_CONTROLLER;

	if (array_key_exists('id', $_GET) && !empty($_GET['id'])) {
		
		$query = "SELECT id, image, brand, carType, plateNumber, fuelType, manufacturingDate, price FROM vehicles WHERE id = :id";
		$params = [
			':id' => $_GET['id']
		];

		$vehicle = getRecord($query, $params);

		if(IsUserLoggedIn()){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editVehicle'])) {
		     
		      $updateData = [
		            'brand' => $_POST['brand'],
		            'type' => $_POST['type'],
		            'platenumber' => $_POST['platenumber'],
		            'fueltype' => $_POST['fueltype'],
		            'manufDate' => $_POST['manufDate'],
		            'price' => $_POST['price']
		          ];
		    }

		    if (empty($updateData['brand']) || empty($updateData['type']) || empty($updateData['platenumber']) || empty($updateData['manufDate']) || empty($updateData['price'])) {
		    	echo "<h1>Missing data!</h1>";
		    } else if ($updateData['price'] < 0) {
		    	echo "<h1>Price can't be a negative number!</h1>";
		    } else if ($updateData['manufDate'] < 0) {
		    	echo "<h1>Manufacturing Date can't be a negative number!</h1>";
		    } else {
		    	$query = "UPDATE vehicles SET brand = :brand, carType = :carType, plateNumber = :plateNumber, fuelType = :fuelType, manufacturingDate = :manufacturingDate, price = :price WHERE id = :id";
		    	$params = [
		    		':brand' => $updateData['brand'],
	                ':carType' => $updateData['type'],
	                ':plateNumber' => $updateData['platenumber'],
	                ':fuelType' => $updateData['fueltype'],
	                ':manufacturingDate' => $updateData['manufDate'],
	                ':price' => $updateData['price'],
	                ':id' => $_GET['id']
		    	];

		    	if (!executeDML($query, $params)) {
		    		echo "<h1>Error while updating data!</h1>";
		    	}
		    	else {
		    		header ("Location: index.php?page=vehicleProfile&id=".$_GET['id']."");
		    	}
		    }	
		}
	}


	
?>

<form method="POST">
  <div class="col-sm-12">
      <center><img src='<?php echo $vehicle['image']?>' widht="400" height="400"></center>
      <hr>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Brand</label>
      <input type="text" class="form-control" id="inputBrand" placeholder="Car Brand" name="brand" value='<?=$vehicle['brand']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
    </div>
    <div class="form-group col-md-4">
      <label>Type</label>
      <input type="text" class="form-control" id="inputType" placeholder="Type of the car" name="type" value='<?=$vehicle['carType']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPlateNumber">Platenumber</label>
      <input type="text" class="form-control" id="inputPlateNumber" placeholder="Platenumber" name="platenumber" value='<?=$vehicle['plateNumber']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
    </div>
    <div class="form-group col-md-4">
      <label for="inputFuelType">Fuel Type</label>
      <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) :?>
      	<select id="inputFuelType" class="form-control" name="fueltype">
	        <option selected>Choose...</option>
	        <option>Gasoline</option>
	        <option>Diesel</option>
	        <option>Gas</option>
	        <option>Bio-Diesel</option>
	        <option>Electric</option>
	        <option>Hybrid</option>
      	</select>
      <?php else :?>
      	<input type="text" class="form-control" id="inputFuelType" name="platenumber" value='<?=$vehicle['fuelType']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
      <?php endif;?>
    </div>
    <div class="form-group col-md-4">
      <label for="inputManufDate">Manufacturing Date</label>
      <input type="text" class="form-control" id="inputManufDate" placeholder="yyyy" name="manufDate" value='<?=$vehicle['manufacturingDate']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPrice">Price</label>
      <input type="text" class="form-control" id="inputPrice" placeholder="1000 €" name="price" value='<?=$vehicle['price']?>' <?php echo !IsUserLoggedIn() ? 'readonly' : ''?>>
    </div>
	<?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) :?>
	    <div class="form-group col-md-2">
	      <br>
	      <button type="submit" class="btn btn-primary btn-block" name="editVehicle">Edit Vehicle</button>
	    </div>
	<?php endif;?>
  </div>
</form>