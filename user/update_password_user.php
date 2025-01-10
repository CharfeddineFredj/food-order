<?php include('partials-user/menu_user.php'); ?>
<link rel="stylesheet" href="../css/user.css">
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php 
        if (isset($_GET['id'])){
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="POST">
               <table  class="tbl-30">
                   <tr>
                       <td>Current Password :</td>
                       <td><input type="password" name="current_password" value="" placeholder="Current Password" ></td>
                    </tr>
                    <tr>
                       <td>New Password :</td>
                       <td><input type="password" name="new_password" value="" placeholder="New Password" ></td>
                    </tr>
                    <tr>
                       <td>Confirm Password :</td>
                       <td><input type="password" name="confirm_password" value="" placeholder="Confirm Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondar">
                        </td>
                    </tr>
                    </table>
        </form>
        </div>
        </div>
        <?php
        if(isset($_POST['submit']))
    {
    $id=$_POST['id']; 
    $current_password =md5($_POST['current_password']);
    $new_password =md5($_POST['new_password']);
    $confirm_password =md5($_POST['confirm_password']);
    $res = $cnx->query(" SELECT * from user where id=$id and password='$current_password' ");
    $etd = $res->fetch();
    if($etd){
              if(($new_password==$confirm_password)&&($new_password<>$current_password )){
                
               $res1=$cnx->query(" UPDATE user SET password='$new_password' where id=$id ");
               if($res1)
               {
                $_SESSION['change-pwd']="<div class='success'>Password change.</div>";
                header("location:profile.php");
               }else
               {
                $_SESSION['change-pwd']="<div class='error'>Password no change.</div>";
                header("location:profile.php");
               }
                  
              }else
              {
                $_SESSION['pwd-no-match']="<div class='error'>Password did no match.</div>";
                header("location:profile.php");
              }
    }else  {
        $_SESSION['pwd-no-match']="<div class='error'> user not found or current password </div>";
        header("location:profile.php");
      }





}
    ?>
    <!-- main content section Ends -->
    <?php include('partials-user/footer_user.php'); ?>