<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
           <h1>Manage Food</h1>
           <br> <br>
           <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            ?>

           <br><br>
           <a href="add-food.php" class="btn-primary">Add Food</a>
           <br> <br> <br>
           <?php
            $sql = "SELECT * from food ";
            // 2. Lancer la requête
            $res = $cnx->query($sql);
            // Extraire (fetch) toutes les lignes (enregistrement, rows)
            $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
            if(empty($fd)){
            // Afficher un message si la liste est vide
            echo "<b>No Food Added</b>";
            }
            else
            {
           echo '<table border=2 class="tbl">';
           echo '<tr>';
           echo  '<th>S.N.</th>';
           echo  '<th>Title</th>';
           echo  '<th>Description</th>';
           echo  '<th>Price</th>';
           echo  '<th>Image</th>';
           echo  '<th>Featured</th>';
           echo  '<th>Active</th>';
           echo  '<th>Actions</th>';
           echo '</tr>';
            $sn=1;
            foreach ($fd as $item) {
                echo '<tr>';
                echo '<td>'.$sn++.'</td>'; 
                echo  '<td>'.$item['title'].'</td>';
                echo  '<td>'.$item['description'].'</td>';
                echo  '<td>'.$item['price'].'</td>';
                echo  '<td>';if($item['image_name']!=""){
            
                    echo "<img src=http://localhost/food-order/images/category/".$item['image_name'] ." width = 60px>";
                   }
                   
                   else{
                    echo  "<div class='error'>Image not Aded</div>";
                   }
                   echo '</td>';
                   echo  '<td>'.$item['featured'].'</td>';
                   echo  '<td>'.$item['active'].'</td>';
                   echo  '<td>';
                   echo "<a class='btn-secondary' href='update-food.php?id=" .$item['id']."'>Update Food</a>";
                   echo "<a class='btn-danger' href='delete-food.php?id=" .$item['id']."'>Delet Food </a>";
                   echo '</td>';
                   echo '</tr>';
            }
           
            echo  '</table>';
        }
        ?>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>