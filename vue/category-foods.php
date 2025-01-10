<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            if(isset($_GET['category_id'])){
            $category_id=$_GET['category_id'];
           $sql= "SELECT title from category where id='$category_id'" ;
           $res = $cnx->query($sql);
           $fd =$res->fetchAll();
           foreach ($fd as $item){
           $category_title=$item['title'];

            }
        }else
        {
            header("location:home.php");
        }



            ?>
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        <?php
         $sql= "SELECT * from food where category_id='$category_id' ";
         $res = $cnx->query($sql);
                // Extraire (fetch) toutes les lignes (enregistrement, rows)
         $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
                if(empty($fd)){
                // Afficher un message si la liste est vide
                echo "<b>Food not available.</b>";
                }
                else
                foreach ($fd as $item) {
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
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-detail">
                     <?php echo $description;?>
                    </p>
                    <br>

                    <a class='btn btn-primary' href="<?php echo 'http://localhost/food-order/vue/' ?>order.php?food_id=<?php echo $item['id'];?>">Order Now</a>
                </div>
                </div>
                <?php
                }
                ?>

        

            

            

          

          


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>