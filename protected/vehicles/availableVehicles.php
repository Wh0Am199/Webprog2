<?php
  require_once DATABASE_CONTROLLER;
  $query = "SELECT id, image, brand, carType, plateNumber, fuelType, manufacturingDate, price FROM vehicles";
  $vehicles = getList($query);
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Brand</th>
      <th scope="col">Car Type</th>
      <th scope="col">Plate Number</th>
      <th scope="col">Fuel Type</th>
      <th scope="col">Manufacturing Date</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vehicles as $v): ?>  
      <tr>
        <td><?php echo "<img src=".$v['image']." height='200' width='200' "?></td>
        <td><?php echo "<a href='?page=vehicleProfile&id=".$v['id']."'>".$v['brand']."</a>"?></td>
        <td><?=$v['carType']?></td>
        <td><?=$v['plateNumber']?></td>
        <td><?=$v['fuelType']?></td>
        <td><?=$v['manufacturingDate']?></td>
        <td><?=$v['price']?> $</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>