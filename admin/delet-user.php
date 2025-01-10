
<?php include('../config/connexion.php'); ?>
<?php
// Récupérer l'id à supprimer
$id = $_GET['id'];

// Supprimer l'enregistrement
$sql=$cnx->exec("DELETE FROM user WHERE id=$id ");
if($sql){
$_SESSION['delet']="<div class='success'>User Deleted Seccessfuly.</div>";
header("location:manage-user.php");
}
else{
$_SESSION['delet']="<div class='error'>Faild to Delet User. Try again Later.</div>";
 header("location:manage-user.php");
 }
// Redirection à la page principale
?>