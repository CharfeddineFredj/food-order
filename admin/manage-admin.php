<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
           <h1>Manage Admin</h1>
           <br>
            <?php  if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delet']))
            {
                echo $_SESSION['delet'];
                unset($_SESSION['delet']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['pwd-no-match']))
            {
                echo $_SESSION['pwd-no-match'];
                unset($_SESSION['pwd-no-match']);
            }
            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }

            
            ?>
            <br><br><br>
           <a href="add-admin.php" class="btn-primary">Add Admin</a>
           <br><br><br>
            <?php
            $sql = "SELECT * from user where usertype='admin' ";
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
                echo '<th>Actions</th>';
                echo  '</tr>';
                $sn=1;
                foreach ($les_admin as $item) {
           echo '<tr>';
             echo '<td>'. $sn++.'</td>';
             echo '<td>'. $item['full_name'].'</td>';
             echo '<td>'. $item['username'].'</td>';
             echo '<td>';
                echo "<a class='btn-primary' href='update-password.php?id=" . $item['id']."'>Change Password</a>";
                echo "<a class='btn-secondary' href='update-admin.php?id=" . $item['id']."'>Update Admin</a>";
                echo "<a class='btn-danger' href='delete-admin.php?id=" . $item['id']."'>Delet Admin </a>";
            echo '</td>';
           echo '</tr>';
         }
         echo '</table>';
        } ?>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>



 