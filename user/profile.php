<?php include('partials-user/menu_user.php'); ?>
<link rel="stylesheet" href="../css/user.css">
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
           <h1>Profile</h1>
           <br>
            <?php  
        
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
            
          
           <br><br>
           
            <?php
            $sql = "SELECT * from user where usertype='user'";
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
                // $sn=1;
                // foreach ($les_admin as $item) {
           echo '<tr>';
             echo '<td>'. $_SESSION['commande']['id'].'</td>';
             echo '<td>'. $_SESSION['commande']['full_name'].'</td>';
             echo '<td>'. $_SESSION['commande']['username'].'</td>';
             echo '<td>'. $_SESSION['commande']['phone_number'].'</td>';
             echo '<td>'. $_SESSION['commande']['email'].'</td>';
             echo '<td>'. $_SESSION['commande']['address'].'</td>';
             echo '<td>'. $_SESSION['commande']['date_created'].'</td>';
             echo '<td>';
                echo "<a class='btn-primary' href='update_password_user.php?id=". $_SESSION['commande']['id']."'>Change Password</a>";
                echo "<a class='btn-secondary' href='update-user.php?id=" . $_SESSION['commande']['id']."'>Update User</a>"; 
            echo '</td>';
           echo '</tr>';
         }
         echo '</table>';
        ?>
        </div>
    </div>
    <!-- main content section Ends -->
    
    <?php include('partials-user/footer_user.php'); ?>


 
 