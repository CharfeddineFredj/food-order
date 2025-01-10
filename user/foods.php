<?php include('partials-user/menu_user.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                $sql = "SELECT * from food where active='yes'";
                // 2. Lancer la requête
                $res = $cnx->query($sql);
                // Extraire (fetch) toutes les lignes (enregistrement, rows)
                $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
                if(empty($fd)){
                // Afficher un message si la liste est vide
                echo "<b>Food not available.</b>";
                }
                else
                foreach ($fd as $item) {
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
                    <h4><?php echo $item['title']?></h4>
                    <p class="food-price">$<?php echo $item['price']?></p>
                    <p class="food-detail">
                                 <?php echo $item['description']?>
                    </p>
                    <br>

                    <a class='btn btn-primary' href="<?php echo 'http://localhost/food-order/user/' ?>order.php?food_id=<?php echo $item['id'];?>">Order Now</a>
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
   