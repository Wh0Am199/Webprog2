<?php
  require_once DATABASE_CONTROLLER;

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addVehicle'])) {

    if (isset($_POST['vehicleimg'])) {
      
      $addData = [
            'vehicleimg' => $_POST['vehicleimg'],
            'brand' => $_POST['brand'],
            'type' => $_POST['type'],
            'platenumber' => $_POST['platenumber'],
            'fueltype' => $_POST['fueltype'],
            'manufDate' => $_POST['manufDate'],
            'price' => $_POST['price']
          ];

          $picture_tmp = $_FILES['vehicleimg']['tmp_name'];
          $picture_name = $_FILES['vehicleimg']['name'];
          $picture_type = $_FILES['vehicleimg']['type'];

          $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

          if(in_array($picture_type, $allowed_type)) {
              $path = PUBLIC_DIR.'db_images/'.$picture_name;

              if (empty($addData['brand']) || empty($addData['type']) || empty($addData['platenumber']) || empty($addData['fueltype']) || empty($addData['manufDate']) || empty($addData['price'])) {
                echo "<h1>Missing data!</h1>";
              } else {

                $query = "INSERT INTO vehicles (image, brand, carType, plateNumber, fuelType, manufacturingDate, price) VALUES (:image, :brand, :carType, :plateNumber, :fuelType, :manufacturingDate, :price)";
                $params = [
                  ':image' => $path,
                  ':brand' => $addData['brand'],
                  ':carType' => $addData['type'],
                  ':plateNumber' => $addData['platenumber'],
                  ':fuelType' => $addData['fueltype'],
                  ':manufacturingDate' => $addData['manufDate'],
                  ':price' => $addData['price']
                ];

                if (!executeDML($query, $params)) {
                    echo '<h1><font color="red">Error while inserting vehicle!</font></h1>';
                }
                else{
                    move_uploaded_file($picture_tmp, $path);
                }     

              }                        
          }
        }
      
    }

    

  
?>


<form method="POST" enctype="multipart/form-data">
  <div class="col-sm-12">
      <h4><small>Insert a new car to the showroom!</small></h4>
      <hr>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Image of the car</label>
      <input type="file" name="vehicleimg">
    </div>
    <div class="form-group col-md-3">
      <label>Brand</label>
      <input type="text" class="form-control" id="inputBrand" placeholder="Car Brand" name="brand">
    </div>
    <div class="form-group col-md-3">
      <label>Type</label>
      <input type="text" class="form-control" id="inputType" placeholder="Type of the car" name="type">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPlateNumber">Platenumber</label>
      <input type="text" class="form-control" id="inputPlateNumber" placeholder="Platenumber" name="platenumber">
    </div>
    <div class="form-group col-md-4">
      <label for="inputFuelType">Fuel Type</label>
      <select id="inputFuelType" class="form-control" name="fueltype">
        <option selected>Choose...</option>
        <option>Gasoline</option>
        <option>Diesel</option>
        <option>Gas</option>
        <option>Bio-Diesel</option>
        <option>Electric</option>
        <option>Hybrid</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputManufDate">Manufacturing Date</label>
      <input type="text" class="form-control" id="inputManufDate" placeholder="yyyy" name="manufDate">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPrice">Price</label>
      <input type="text" class="form-control" id="inputPrice" placeholder="1000 €" name="price">
    </div>
    <div class="form-group col-md-2">
      <button type="submit" class="btn btn-primary btn-block" name="addVehicle">Add Vehicle</button>
    </div>
  </div>
</form>