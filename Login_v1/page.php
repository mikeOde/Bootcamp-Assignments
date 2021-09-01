<?php 
  session_start(); 
  include("connection.php");

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: index.html");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    <div class="content">
          <!-- notification message -->
          <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
              <h3>
              <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);
              ?>
              </h3>
          </div>
          <?php endif ?>
    
        <!-- logged in user information -->
        <?php  if (isset($_SESSION['email'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
    </div>
</body>