<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
            $id = $_GET['id'];
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
                       <td>Username :</td>
                       <td><input type="text" name="username" value="<?php echo $ad['username'];?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondar">
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
    $full_name =$_POST['full_name'];
    $username =$_POST['username'];
    $q = "UPDATE user SET full_name='$full_name', username='$username' WHERE id=$id";
    if($cnx->exec($q)){
        $_SESSION['update']="<div class='success'>Admin Updated Seccessfuly.</div>";
        header("Location:manage-admin.php");
    }else
    {
        $_SESSION['update']="Faild to Updated Admin";
        header("location:update-admin.php");
    }

    }
   ?>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>