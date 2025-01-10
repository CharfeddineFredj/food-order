<?php include('../config/connexion.php');
      include('login_check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Order website - Home page</title>
    <link rel="stylesheet" href="../css/admin.css">
    
</head>
<body>
    <!-- menu section starts -->
    <div class="menu text-center">
        <div class="wrapper">
        <ul>
            <li><a href="dashaboard.php">Dashaboard</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-user.php">Users</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </div>
    <!-- menu section Ends -->