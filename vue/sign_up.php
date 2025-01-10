<?php include('../config/connexion.php');?>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/admin.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="login">
	  <h1 class="text-center">Sign Up</h1>   
      <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>    
  <form action="" method="POST" class="text-center">
    Full name:
    <input type="text" name="full_name" placeholder="Enter Full Name"   required>
    Username:
    <input type="text" name="username" placeholder="Enter Username"   required><br><br>
    Phone number:
    <input type="tel" name="contact" placeholder="xxxxxxxx" class="input-responsive" >
    Email:
    <input type="email" name="email" placeholder="fradjcharf@gmail.com" class="input-responsive" ><br>
    Address:<br>
    <textarea name="address" rows="2" cols="50" placeholder="rue 312, sehloul, sousse" class="input-responsive" ></textarea><br>
	Password:<br>
    <input type="password" name="password"  placeholder="Enter Password"  required><br><br>

     <input type="submit" name="submit" value="Login"  class="btn-primary"><br><br>
	 <p class="text-center">Already a member?<a href="sign_in.php">Log in</a></p>
</form>
<?php
     if(isset($_POST['submit']))
    {
    $full_name =$_POST['full_name'];
    $username =$_POST['username'];
    $phone_number =$_POST['contact'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $password =md5($_POST['password']);
    $usertype= "user";
    $date_created= date("Y-m-d H:i:s",strtotime('+1 hours'));
    $cnx1=$cnx->prepare("INSERT INTO user(full_name, username, phone_number, email, address, password, usertype, date_created) VALUES(?,?,?,?,?,?,?,?)");
    $params=array($full_name,$username, $phone_number, $email, $address,$password,$usertype,$date_created);
    
    if ($cnx1->execute($params)){
        $_SESSION['add']="<div class='success'>Account Add Seccessfuly.</div>";
           header("location:sign_in.php");
        }
      
        else{
       $_SESSION['add']="<div class='error'>Faild to Add Account.</div>";
           header("location:sign_up.php");
        } 


    }
    ?>
</div>
</body>
</html>














