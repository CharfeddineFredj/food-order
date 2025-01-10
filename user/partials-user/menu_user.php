<?php include('../config/connexion.php');?>
<?php
if(!isset($_SESSION['commande']))
{
$_SESSION['no-login-message']="<div class='error text-center'>Please login to access your account Panel.</div>";
 header("Location:http://localhost/food-order/vue/sign_in.php");    
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
  
    <link rel="stylesheet" href="../css/style.css">
   
    
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="home.php" title="Logo">
                    <img src="../images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                <?php {
                        echo '<li  style="color: orange;">'.$_SESSION['commande']['full_name'].'</li>';
                      }
                    ?>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                    <a  href="history.php">History of your orders</a> 
                    </li>
                    <li>
                    <a  href="profile.php">Profile</a> 
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                
                    <li>
                    <a   href="logout_user.php">Logout</a> 
                    </li>
                    
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
 