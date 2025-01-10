<?php include('partials/menu.php'); ?>
    <!-- main content section starts-->
    <div class="main-content">
        <div class="wrapper">
           <h1>Dashaboard</h1>
           <br><br>
           <?php  if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>
            <div class="col-4 text-center">
           <?php
               $sql5="select * from user where usertype='user'";
               $res = $cnx->query($sql5);
               $nbr =  $res->fetchAll();
               $nbr_etudiants = count($nbr);
               
               echo '<h1>'.$nbr_etudiants.'</h1>';
               ?>
               Total number of clients 
           </div>
          
           <div class="col-4 text-center">
           <?php
               $sql2="select * from food";
               $res = $cnx->query($sql2);
               $nbr =  $res->fetchAll();
               $nbr_etudiants = count($nbr);
               
               echo '<h1>'.$nbr_etudiants.'</h1>';
               ?>
               Foods
           </div>
           <div class="col-4 text-center">
           <?php
               $sql3="select * from commande";
               $res = $cnx->query($sql3);
               $nbr =  $res->fetchAll();
               $nbr_etudiants = count($nbr);
               
               echo '<h1>'.$nbr_etudiants.'</h1>';
               ?>
               Total Orders
           </div>
          
           <div class="col-4 text-center">
               <?php
                $sql4="SELECT SUM(total) as Total from commande where status='Delivered' and order_date ";
                $res = $cnx->query($sql4);
                $nbr =  $res->fetch();
                $total_revenue=$nbr['Total'];
               ?>
               
               <?php 
             echo   '<h1>';if($total_revenue ==null){
                 echo '<h1> $0 </h1>';
             }
             else{
                 echo '<h1>'.'$'.$total_revenue.'</h1>';
             }
               ?>
               Revenue Generated
           </div>
        <div class="clearfix"></div>
        </div>
    </div>
    <!-- main content section Ends -->
    <?php include('partials/footer.php'); ?>