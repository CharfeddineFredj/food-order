<?php include('partials-user/menu_user.php'); ?>

<link rel="stylesheet" href="../css/user.css">
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
        <h1>Update User</h1>
        <br><br>
        <?php
           $id = $_SESSION['commande']['id'];
            $q = "SELECT * FROM user WHERE id=$id";
            $res = $cnx->query($q);
            $ad = $res->fetch(); 
        ?>
           <form action="" method="post">
               <table  class="tbl-30">
                   <tr>
                       <td>Full Name :</td>
                       <td><input type="text" name="full_name" value="<?php echo $ad['full_name'];?>"></td>
                    </tr>
                   
                    <tr>
                       <td>Phone_number:</td>
                       <td><input type="tel" name="phone_number" value="<?php echo $ad['phone_number'];?>"></td>
                    </tr>
                    <tr>
                       <td>Email :</td>
                       <td><input type="email" name="email" value="<?php echo $ad['email'];?>"></td>
                    </tr>
                    <tr>
                    <td>Address:</td>
                   <td><textarea name="address" rows="2" cols="50" placeholder="rue 312, sehloul, sousse" class="input-responsive" ><?php echo $ad['address']?></textarea></td>
                     </tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User" class="btn-secondar">
                        </td>
                    </tr>
</table>
</form>
        </div>
    </div>
    <?php
    if(isset($_POST['submit']))
    {
    $id =$_SESSION['commande']['id'];
    $full_name =$_SESSION['commande']['full_name'] =$_POST['full_name'];
    $phone_number =$_SESSION['commande']['phone_number']=$_POST['phone_number'];
    $email =$_SESSION['commande']['email']=$_POST['email'];
    $address =$_SESSION['commande']['address']=$_POST['address'];
    $q ="UPDATE user SET full_name='$full_name',phone_number='$phone_number',email='$email',address='$address' WHERE id=$id";
    if($cnx->exec($q)){
        $_SESSION['update']="<div class='success'>User Updated Seccessfuly.</div>";
        header("Location:profile.php");
    }else
    {
        $_SESSION['update']="Faild to Updated User";
        header("location:update-user.php");
    }

    }
   ?>
    <!-- main content section Ends -->
    <?php include('partials-user/footer_user.php'); ?>