<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <?php if (!IsUserLoggedIn()) :?>
      	<a class="navbar-brand" href="index.php?page=login">Profile</a>
      <?php else:?>
      	<a class="navbar-brand" href="index.php?page=profile"><?=$_SESSION['lastName']?> <?=$_SESSION['firstName']?></a>
      <?php endif;?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=vehicles">Showroom</a></li>
        <li><a href="mailto:balintb99@gmail.com?subject=New customer message from:">Contact</a></li>
      </ul>

      <?php if (!IsUserLoggedIn()) :?>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php?page=register">Register</a></li>
	      </ul>
  	  <?php else:?>
		  <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul>
  	  <?php endif;?>

  	  <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
		  <ul class="nav navbar-nav navbar-right">
	        <li><a href="index.php?page=addVehicle">Add Vehicle</a></li>
	      </ul>
	  <?php endif;?>

    </div>
  </div>
</nav>