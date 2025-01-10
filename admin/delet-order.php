<?php include('../config/connexion.php'); ?>
<?php
// Récupérer l'id à supprimer
$id = $_GET['id'];
// Supprimer l'enregistrement
$cnx1=$cnx->prepare("DELETE FROM commande WHERE id=?");
$etd =array($id);
if($cnx1->execute($etd)){
$_SESSION['delet']="<div class='success'>Admin Deleted Seccessfuly.</div>";
header("location:manage-order.php");
}
else{
$_SESSION['delet']="<div class='error'>Faild to Delet Admin. Try again Later.</div>";
 header("location:manage-order.php");
 }
// Redirection à la page principale
?>