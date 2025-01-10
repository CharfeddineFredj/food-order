<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper1">
         <h1>Manage Order</h1>
           <br> <br>
           <?php 
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
           ?> <br><br>
           <?php
            $sql = "SELECT * from commande order by id desc ";
            // 2. Lancer la requête
            $res = $cnx->query($sql);
            // Extraire (fetch) toutes les lignes (enregistrement, rows)
            $fd =$res->fetchAll(); // Ceci est un tableau de tableaux associatifs
            if(empty($fd)){
            // Afficher un message si la liste est vide
            echo "<b>No commande Added</b>";
            }
            else
            {
         echo  '<table border=2  class="tbl1">';
            echo '<tr>';
               echo '<th>S.N.</th>';
               echo '<th>Food&nbsp&nbsp</th>';
               echo '<th>Price</th>';
               echo '<th>Qty&nbsp</th>' ;
               echo '<th>Total &nbsp</th>';
               echo '<th>Order Date</th>';
               echo '<th>Status &nbsp&nbsp&nbsp</th>';
               echo '<th>Customer Name</th>';
               echo '<th>Customer Contact</th>';
               echo '<th>Customer Email</th>';
               echo '<th>Customer Address</th>';
               echo '<th>Actions</th>';

           echo '</tr>';
           echo '<tr>';
           $sn=1;
            foreach ($fd as $item) {
                echo '<tr>';
                echo '<td>'.$sn++.'</td>'; 
                echo  '<td>'.$item['food'].'&nbsp'.'</td>';
                echo  '<td>'.$item['price'].'&nbsp'.'</td>';
                echo  '<td>'.$item['qty'].'</td>';
                echo  '<td>'.$item['total'].'</td>';
                echo  '<td>'.$item['order_date'].'</td>';
                echo  '<td>';if($item['status']=='Ordered'){
                     echo "<label>".$item['status']."</label>";
                 }
                 elseif($item['status']=='On Delivery'){
                        echo "<label style='color: orange;'>".$item['status']."</label>" ;
                 }elseif($item['status']=='Delivered'){
                    echo "<label style='color: #2ed573;'>".$item['status']."</label>" ;
               }elseif($item['status']=='Cancelled'){
                echo "<label style='color: red;'>".$item['status']."</label>" ;
           }
                 
                echo '</td>';
                echo  '<td>'.$item['customer_name'].'</td>';
                echo  '<td>'.$item['customer_contact'].'</td>';
                echo  '<td>'.$item['customer_email'].'</td>';
                echo  '<td>'.$item['customer_address'].'</td>';
                
            echo '<td>';
            echo "<a class='btn-secondary' href='update-order.php?id=" .$item['id']."'>Update Order</a>";
            echo "<a class='btn-danger' href='delet-order.php?id=" .$item['id']."'>Delet Order</a>";
            echo '</td>';
           echo '</tr>';
        
            }
           echo '</table>';
        }
           ?>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>