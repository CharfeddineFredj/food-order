
<?php include('../config/connexion.php'); ?>
<?php
// Récupérer l'id à supprimer
// $id = $_GET['id'];
$id = $_SESSION['commande']['id'];


// Supprimer l'enregistrement
$sql=$cnx->exec("DELETE FROM user WHERE id=$id ");
if($sql){
$_SESSION['delet']="<div class='success'>Admin Deleted Seccessfuly.</div>";
header("location:http://localhost/food-order/vue/sign_in.php");
}
else{
$_SESSION['delet']="<div class='error'>Faild to Delet Admin. Try again Later.</div>";
 header("location:http://localhost/food-order/vue/sign_in.php");
 }
// Redirection à la page principale
?>