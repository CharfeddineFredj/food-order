<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
           <h1>Manage Category</h1>
           <br>
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
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['update']))
            {

                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['upload']))
            {

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['failed-remove']))
            {

                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
            ?>
            <br><br>
           <a href="add-category.php" class="btn-primary">Add Category</a>
           <br><br><br>
           <?php
            $sql = "SELECT * from category ";
            // 2. Lancer la requête
            $res = $cnx->query($sql);
            // Extraire (fetch) toutes les lignes (enregistrement, rows)
            $cat =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
            if(empty($cat)){
            // Afficher un message si la liste est vide
            echo "<b>No Category Added</b>";
            }
            else
            {
          echo '<table border=2 class="tbl">';
           echo '<tr>';
            echo    '<th>S.N.</th>';
            echo   '<th>Title</th>';
            echo  '<th>Image</th>';
            echo   '<th>Featured</th>';
            echo   '<th>Active</th>';
            echo   '<th>Actions</th>';
            echo '</tr>';
            $sn=1;
            foreach ($cat as $item) {
                echo '<tr>';
            echo '<td>'.$sn++.'</td>';
           echo  '<td>'.$item['title'].'</td>';
           echo  '<td>';if($item['image_name']!=""){
            
            echo "<img src=http://localhost/food-order/images/category/". $item['image_name'] ." width = 70px>";
           }
           
           else{
            echo  "<div class='error'>Image not Aded</div>";
           }
           echo '</td>';
           echo  '<td>'.$item['featured'].'</td>';
           echo  '<td>'.$item['active'].'</td>';
           echo  '<td>';
           echo "<a class='btn-secondary' href='update-Category.php?id=" . $item['id']."'>Update Category</a>";
           echo "<a class='btn-danger' href='delete-category.php?id=" . $item['id']."'>Delet Category </a>";
           echo '</td>';
           echo '</tr>';
            }
           
         echo  '</table>';
        }
        ?>
        </div>
    </div>
<?php include('partials/footer.php'); ?>