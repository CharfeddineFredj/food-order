<?php include('partials-user/menu_user.php'); ?>
<link rel="stylesheet" href="../css/user.css">
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper1">
         <h1>Manage Order</h1>
           <br> <br>
           <?php 
            if(isset($_SESSION['delet']))
            {
                echo $_SESSION['delet'];
                unset($_SESSION['delet']);
            }
           ?> <br><br>
           <?php
            $sql = "SELECT * from commande where id_user = :id order by order_date desc ";
            // 2. Lancer la requête
            $res = $cnx->prepare($sql);
            $res->execute([
               'id' => $_SESSION['commande']['id'],
            ]);
       
           
              
         echo  '<table border=2  class="tbl1">';
            echo '<tr>';
               echo '<th>S.N.</th>';
               echo '<th>Food</th>';
               echo '<th>Price</th>';
               echo '<th>Qty</th>' ;
               echo '<th>Total</th>';
               echo '<th>Order Date</th>';
               echo '<th>Status</th>';

               
               // echo '<th>Actions</th>';

           echo '</tr>';
           echo '<tr>';
          // $sn=1;
             {
               while($fd =$res->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                echo '<td>'.$fd['id'].'</td>'; 
                echo  '<td>'.$fd['food'].'&nbsp'.'</td>';
                echo  '<td>'.$fd['price'].'&nbsp'.'</td>';
                echo  '<td>'.$fd['qty'].'</td>';
                echo  '<td>'.$fd['total'].'</td>';
                echo  '<td>'.$fd['order_date'].'</td>';
                echo  '<td>';if($fd['status']=='Ordered'){
                     echo "<label>".$fd['status']."</label>";
                 }
                 elseif($fd['status']=='On Delivery'){
                        echo "<label style='color: orange;'>".$fd['status']."</label>" ;
                 }elseif($fd['status']=='Delivered'){
                    echo "<label style='color: #2ed573;'>".$fd['status']."</label>" ;
               }elseif($fd['status']=='Cancelled'){
                echo "<label style='color: red;'>".$fd['status']."</label>" ;
           }
                 
                echo '</td>';
            
                
           echo '</tr>';
        
            }
           echo '</table>';
        }
           ?>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials-user/footer_user.php'); ?>