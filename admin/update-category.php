<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
            $id = $_GET['id'];
            $q = "SELECT * FROM category WHERE id=$id";
            $res = $cnx->query($q);
            $ad = $res->fetch(); 
            $current_image=$ad['image_name'];
            $featured=$ad['featured'];
            $active=$ad['active'];
        ?>
           <form action="" method="post" enctype="multipart/form-data">
               <table  class="tbl-30">
                   <tr>
                       <td>Title :</td>
                       <td><input type="text" name="title" value="<?php echo $ad['title'];?>"></td>
                    </tr>
                    <tr> 
                       <td>Image Current :</td>
                       <td> 
                           <?php
                       if($current_image != ""){
                        echo "<img src=http://localhost/food-order/images/category/". $ad['image_name'] ." width = 70px>";

                       }else{
                        echo "<div class='error'>Image Not Add.</div>";
                       }
                       ?></td>
                    </tr>
                    <tr>
                       <td>New Image :</td>
                       <td><input type="file" name="image" value=""></td>
                    </tr>
                    <tr>
                       <td>Featured :</td>
                       <td><input <?php if($featured=="yes"){echo "checked";}?> type="radio" name="featured" value="yes">Yes
                           <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                       </td>
                    </tr>
                    <tr>
                       <td>Active :</td>
                       <td><input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">yes
                           <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondar">
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
    $title =$_POST['title'];
    $current_image=$_POST['current_image'];
    $featured =$_POST['featured'];
    $active =$_POST['active'];
    if(isset($_FILES['image']['name'])){
      
        $image_name = $_FILES['image']['name'];
        if($image_name !="") {
            $cc= explode('.',$image_name);
            $ext= end($cc);
            $image_name="Food_Category_".rand(000,999).'.'.$ext;
            $source_path= $_FILES['image']['tmp_name'];
            $destination_path= "../images/category/".$image_name;
            $upload = move_uploaded_file($source_path,$destination_path);
            if($upload==false){
                $_SESSION['upload']="<div class='error'>Faild to Upload Image.</div>";
                header("location:manage-category.php");
                //stop process
                die();
            }
            if($current_image !=""){
                $remove_path="../images/category/".$current_image;

                $remove = unlink($remove_path);
                if($remove==false){
                    $_SESSION['failed-remove']="<div class='error'>Faild to remove current Image.</div>";
                    header("location:manage-category.php");
                    die();
                }
            }
            
        }
            else{

                $image_name = $current_image;
            }
    }else{

         $image_name = $current_image;
    }
    $q = "UPDATE category SET title='$title', image_name='$image_name',featured='$featured',active='$active' WHERE id=$id";
    if($cnx->exec($q)){
        $_SESSION['update']="<div class='success'>Category Updated Seccessfuly.</div>";
        header("Location:manage-category.php");
    }else
    {
        $_SESSION['update']="<div class='error'>Faild to Updated Ctegory</div>";
        header("location:manage-category.php");
    }

    }
   ?>
      <?php include('partials/footer.php'); ?>