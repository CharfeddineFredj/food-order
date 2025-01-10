<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
           <h1>Manage Uers</h1>
           <br>
            <?php  
            if(isset($_SESSION['delet']))
            {
                echo $_SESSION['delet'];
                unset($_SESSION['delet']);
            }
            ?>
           <br><br>
            <?php
            $sql = "SELECT * from user where usertype='user' ";
            // 2. Lancer la requête
            $res = $cnx->query($sql);
            // Extraire (fetch) toutes les lignes (enregistrement, rows)
            $les_admin =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
            if(empty($les_admin)){
            // Afficher un message si la liste est vide
            echo "<b>No Admin Added</b>";
            }
            else
            {
                echo '<table border=2 class="tbl">';

                echo '<tr>';
                echo '<th>S.N.</th>';
                echo '<th>Full Name</th>';
                echo '<th>Username</th>';
                echo '<th>Phone Number</th>';
                echo '<th>Email</th>';
                echo '<th>Address</th>';
                echo '<th>Date Created</th>';
                echo '<th>Actions</th>';
                echo  '</tr>';
                $sn=1;
                foreach ($les_admin as $item) {
           echo '<tr>';
             echo '<td>'. $sn++.'</td>';
             echo '<td>'. $item['full_name'].'</td>';
             echo '<td>'. $item['username'].'</td>';
             echo '<td>'. $item['phone_number'].'</td>';
             echo '<td>'. $item['email'].'</td>';
             echo '<td>'. $item['address'].'</td>';
             echo '<td>'. $item['date_created'].'</td>';
             echo '<td>';
                echo "<a class='btn-danger' href='delet-user.php?id=" . $item['id']."'>Delet User </a>";
            echo '</td>';
           echo '</tr>';
         }
         echo '</table>';
        } ?>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>



 