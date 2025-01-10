<?php include('../config/connexion.php'); ?>
<?php
session_destroy();
header("Location:http://localhost/food-order/vue/home.php");
?>