
<?php include('../config/connexion.php');?>
<html lang="en">
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="login">
	  <h1 class="text-center">Sign In</h1>
    <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?> 
            <?php  if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?> 
            <?php if(isset($_SESSION['no-login-message'])){
           echo $_SESSION['no-login-message'];
           unset($_SESSION['no-login-message']);
            }
            ?>
            <br><br>   
  <form action="#" method="POST" class="text-center">
    Username:
    <input type="text" name="username" placeholder="Enter Username"  class="form-group" ><br><br>
    
	Password:
    <input type="password" name="password"  placeholder="Enter Password" class="form-group"><br><br>
     <input type="hidden" name="full_name">
     <input type="submit" name="submit" value="Login"  class="btn-primary"><br><br>
     <p class="text-center">No account?<a href="sign_up.php">Create one!</a></p>
</form>
</div>
</body>
</html>


<?php
   if(isset($_POST['submit']))
   {
    
$username = $_POST['username'];
$password = md5($_POST['password']);
// Vérifier que les codes d’accès sont corrects
$res = $cnx->prepare("SELECT * FROM user WHERE username= :username AND password= :password ");
// $etd =array($username,$password);
$res->execute([
    ':username' => $username,
    ':password' => $password
]);
 $fd =$res->fetch(PDO::FETCH_ASSOC);
 if($fd["usertype"]=="user"){
    
    $_SESSION['commande']=$fd;
    header('location:http://localhost/food-order/user/home.php');

 }elseif($fd["usertype"]=="admin"){
    $_SESSION['login']="<div class='success'>Login Seccessful.</div>";
    $_SESSION['username']=$username;
    header('location:http://localhost/food-order/admin/dashaboard.php');
     
 }else{
    $_SESSION['login']="<div class='error text-center'>Username or Password did no match</div>";
    header('Location:sign_in.php');
 }

   }
   ?>










