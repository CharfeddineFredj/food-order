<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
           <h1>Add category</h1>
           <br><br>
           <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            ?>
            <br><br>
           <form action="" method="POST" enctype="multipart/form-data">
               <table  class="tbl-30">
                   <tr>
                       <td>Title :</td>
                       <td><input type="text" name="title" value="" placeholder="category title"></td>
                    </tr>
                    <tr>
                       <td>Select Image :</td>
                       <td><input type="file" name="image" value=""></td>
                    </tr>
                    <tr>
                       <td>Featured :</td>
                       <td><input type="radio" name="featured" value="yes">Yes
                           <input type="radio" name="featured" value="No">No
                       </td>
                    </tr>
                    <tr>
                       <td>Active :</td>
                       <td><input type="radio" name="active" value="yes">yes
                           <input type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondar">
                        </td>
                    </tr>
</table>
</form>
        </div>
    </div>
    <?php include('partials/footer.php'); ?>
    <?php 
    if(isset($_POST['submit']))
    {   
    $title =$_POST['title'];
    if(isset($_POST['featured'])){
     $featured=$_POST['featured'];

    }else{
        $featured="NO";
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
   
       }else{
           $active="NO";
       }
       if(isset($_FILES['image']['name'])){
        $image_name= $_FILES['image']['name'];
        if($image_name !="") {
        //auto rename our image
        //get extension of our image(jpg,png ..........)
        $cc= explode('.',$image_name);
         $ext= end($cc);
        $image_name="Food_Category_".rand(00,99).'.'.$ext;
        $source_path= $_FILES['image']['tmp_name'];
        $destination_path= "../images/category/".$image_name;
        $upload= move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['upload']="<div class='error'>Faild to Upload Image.</div>";
            header("location:add-category.php");
            //stop process
            die();
        }
    }
       }else{
           $image_name="";
       }

    

    // 2. Exécuter la requête SQL
    $cnx1=$cnx->prepare("INSERT INTO category(title,image_name,featured,active) VALUES(?,?,?,?)");
    $params=array($title,$image_name,$featured,$active);
    if ($cnx1->execute($params)){
    $_SESSION['add']="<div class='success'>Category Added Seccessfuly.</div>";
       header("location:manage-category.php");}
  
    else{
   $_SESSION['add']="<div class='error'>Faild to Add Category.</div>";
       header("location:add-category.php");
    }
    }
    
    ?>