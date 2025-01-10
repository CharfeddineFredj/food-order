
<?php 
 if(!isset($_SESSION['username']))
{
$_SESSION['no-login-message']="<div class='error text-center'>Please login to access Admin Panel.</div>";
 header("Location:http://localhost/food-order/vue/sign_in.php");    
 }
 ?>