<?php include('partials-user/menu_user.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">     
        <?php
         
              $search=$_POST['search'];
         
        ?>
 <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>
            

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
        $param = "%{$search}%";
          $res = $cnx->prepare("SELECT * from food where title like ? or description like ?");
          $etd =array($param,$param);
          $res->execute($etd);
          
                // Extraire (fetch) toutes les lignes (enregistrement, rows)
                $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
                // var_dump($fd);
                if(empty($fd)){
                // Afficher un message si la liste est vide
                echo "<b class='error'>Food not found.</b>";
                }
                else
                foreach ($fd as $item){
                $id=$item['id'];
                $title=$item['title'];
                $price=$item['price'];
                $description=$item['description'];
                $image_name=$item['image_name'];
                ?>
              
                 <div class="food-menu-box">
                 <div class="food-menu-img">
                 <?php
                if($item['image_name']==""){
                    echo  "<div class='error'>Image not Aded</div>";
                
                }else{
                    echo "<img src=http://localhost/food-order/images/category/".$item['image_name'] ."  alt='Chicke Hawain Pizza' class='img-responsive img-curve'>";
                }

                  ?>
                 </div>
 
                 <div class="food-menu-desc">
                     <h4><?php echo $title;?></h4>
                     <p class="food-price"><?php echo $price;?></p>
                     <p class="food-detail">
                     <?php echo $description;?>
                     </p>
                     <br>
 
                     <a href="order.php" class="btn btn-primary">Order Now</a>
                 </div>
             </div>
             <?php
                }

            ?>

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-user/footer_user.php'); ?>