<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
           <h1>Add Admin</h1>
           <br><br>
           <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
            <br><br>
           <form action="" method="POST">
               <table  class="tbl-add-admin">
                   <tr>
                       <td>Full Name :</td>
                       <td><input type="text" name="full_name" value="" placeholder="Enter Your Name" required="required"></td>
                    </tr>
                    <tr>
                       <td>Username :</td>
                       <td><input type="text" name="username" value="" placeholder="Your Username" required="required"></td>
                    </tr>
                    <input type=hidden name="contact">
                    <input type=hidden name="email">
                    <input type=hidden name="address">
                    <tr>
                       <td>Password :</td>
                       <td><input type="password" name="password" value="" placeholder="Your password" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondar">
                        </td>
                    </tr>
</table>
</form>
        </div>
    </div>
   
    <?php 
    if(isset($_POST['submit']))
    {
        
    $full_name =$_POST['full_name'];
    $username =$_POST['username'];
    $password=md5($_POST['password']);
    $phone_number =$_POST['contact'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $usertype= "admin";
    $date_created= date("Y-m-d H:i:s",strtotime('+1 hours'));
 
    $cnx1=$cnx->prepare("INSERT INTO user(full_name, username, phone_number, email, address, password, usertype , date_created) VALUES(?,?,?,?,?,?,?,?)");
    $params=array($full_name,$username, $phone_number, $email, $address,$password,$usertype,$date_created);
    if ($cnx1->execute($params)){
    $_SESSION['add']="<div class='success'>Admin Added Seccessfuly.</div>";
       header("location:manage-admin.php");}
  
    else{
   $_SESSION['add']="<div class='error'>Faild to Add Admin.</div>";
       header("location:add-admin.php");
    }
    }
    
    ?>
     <?php include('partials/footer.php'); ?>