<?php include('../config/connexion.php'); ?>
<?php
// Récupérer l'id à supprimer
$id = $_GET['id'];
// Supprimer l'enregistrement
$sql=$cnx->exec("DELETE FROM category WHERE id=$id");
if($sql){
$_SESSION['delet']="<div class='success'>Category Deleted Seccessfuly.</div>";
header("location:manage-category.php");
}
else{
$_SESSION['delet']="<div class='error'>Faild to Delet Category. Try again Later.</div>";
 header("location:manage-category.php");
 }
// Redirection à la page principale
?>

