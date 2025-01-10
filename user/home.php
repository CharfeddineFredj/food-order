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
    <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
                <?php 
                $sql = "SELECT * from category where active='yes' and featured='yes' Limit 3 ";
                // 2. Lancer la requête
                $res = $cnx->query($sql);
                // Extraire (fetch) toutes les lignes (enregistrement, rows)
                $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
                if(empty($fd)){
                // Afficher un message si la liste est vide
                echo "<b>Category not Added.</b>";
                }
                else
                foreach ($fd as $item) {
                    ?>
                   <a href="<?php echo 'http://localhost/food-order/user/' ?>category-foods.php?category_id=<?php echo $item['id'];?>">
                    <div class="box-3 float-container">
                 <?php
                  echo "<img src=http://localhost/food-order/images/category/".$item['image_name'] ."  alt='Pizza' class='img-responsive img-curve'>";
                 //<img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve"> ?>
                    <h3 class="float-text text-white"><?php echo $item['title'];?></h3>
                    </div>
                    </a>



                  <?php
                } 
                ?>
                  




           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                $sql = "SELECT * from food where active='yes' and featured='yes' Limit 6 ";
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

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->



    <?php include('partials-user/footer_user.php'); ?>