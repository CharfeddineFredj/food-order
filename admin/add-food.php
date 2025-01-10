<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
           <h1>Add Food</h1>
           <br><br>
           <?php  if(isset($_SESSION['noadd']))
            {
                echo $_SESSION['noadd'];
                unset($_SESSION['noadd']);
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
                       <td><input type="text" name="title" value="" placeholder="Title of the food." required="required"></td>
                    </tr>
                    <tr>
                       <td>Description :</td>
                       <td><textarea  name="description"  cols="30" rows="5" placeholder="Description of the food."></textarea></td>
                    </tr>
                    <tr>
                       <td>Price :</td>
                       <td><input type="number" name="price"></td>
                    </tr>
                    <tr>
                       <td>Select Image :</td>
                       <td><input type="file" name="image" value=""></td>
                    </tr>
                    <tr>
                       <td>Category :</td>
                       <td><select name='category'>
                     <?php 
                     $res = $cnx->query("SELECT * from category where active='yes' ");
                     if (!empty($res)){
                        while($etd = $res->fetch()){
                             $id= $etd['id'];
                             $title= $etd['title'];
                             ?>
                             <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                             <?php

                         }
                     }else{
                         ?>
                                 <option value="0">No Category Found</option>
                         <?php

                     }

                      ?>
                            </select>
                       </td>
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
                        <input type="submit" name="submit" value="Add Food" class="btn-secondar">
                        </td>
                    </tr>
</table>
</form>
        </div>
    </div>
   <?php
    if(isset($_POST['submit']))
    {
        
    $title =$_POST['title'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $category_id=$_POST['category'];

    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];
   
       }else{
           $featured="No";
       }
       if(isset($_POST['active'])){
           $active=$_POST['active'];
      
          }else{
              $active="No";
          }
          if(isset($_FILES['image']['name'])){
            $image_name= $_FILES['image']['name'];
            if($image_name !="") {
            //auto rename our image
            //get extension of our image(jpg,png ..........)
            $cc= explode('.',$image_name);
            $ext= end($cc);
            //rename the image
            $image_name="Food_Food_".rand(0000,9999).'.'.$ext;
            $source_path= $_FILES['image']['tmp_name'];
            $destination_path= "../images/category/".$image_name;
            $upload= move_uploaded_file($source_path,$destination_path);
            if($upload==false){
                $_SESSION['upload']="<div class='error'>Faild to Upload Image.</div>";
                header("location:add-food.php");
                //stop process
                die();
            }
        }
           }else{
            $image_name="";
           }
           

     $cnx1=$cnx->prepare("INSERT INTO food(title,description,price,image_name,category_id,featured,active) VALUES(?,?,?,?,?,?,?)");

    
    $params=array($title,$description,$price,$image_name,$category_id,$featured,$active);
   
    
    if ($cnx1->execute($params)){
        
    $_SESSION['add']="<div class='success'>Food Added Seccessfuly.</div>";
       header("Location:manage-food.php");
    }
  
    else{
   $_SESSION['noadd']="<div class='error'>Faild to Add Food.</div>";
       header("Location:add-food.php");
    }
    }
    ?>





    
     <?php include('partials/footer.php'); ?>