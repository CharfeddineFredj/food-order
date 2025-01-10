<?php include('partials-user/menu_user.php'); ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
                $sql = "SELECT * from category where active='yes'";
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
                    <h3 class="float-text text-white"><?php echo $item['title']?></h3>
                    </div>
                    </a>


                  <?php
                } 
                ?>

           
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->




    <?php include('partials-user/footer_user.php'); ?>