<?php include('partials-user/menu_user.php');?>
<?php
if(!isset($_SESSION['commande']))
{
$_SESSION['no-login-message']="<div class='error text-center'>Please login to access your account Panel.</div>";
 header("Location:sign_in.php");    
 }
 ?>



<?php if(isset($_GET['food_id'])){

            $food_id=$_GET['food_id'];
            $sql= "SELECT * from food where id='$food_id'" ;
            $res = $cnx->query($sql);
            $fd =$res->fetchAll();
            foreach ($fd as $item){
            
            }
            
            }else
        {
            header("location:home.php");
        }
        ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

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
                        <h3><?php echo $item['title']?></h3>
                        <input type="hidden" name="food" value="<?php echo $item['title']?>"> 
                        <p class="food-price">$<?php echo $item['price']?></p>
                        <input type="hidden" name="price" value="<?php echo $item['price']?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="name" placeholder="Enter your name" class="input-responsive" >

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="xxxxxxxx" class="input-responsive" >

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="fradjcharf@gmail.com" class="input-responsive" >

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="rue 312, sehloul, sousse" class="input-responsive" ></textarea>
                    
                    <input type="submit" name="save" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
        </div>
    </section>
    <?php
     if(isset($_POST['save']))
    {
    // if(!isset($_SESSION['order_item'])) 
    // $_SESSION['item']=[];
    // $id=$_POST['id'];
    $food =$item['title'];
    $price =$item['price'];
    $qty =$_POST['qty'];
    $total =$price * $qty;
    $order_date= date("y-m-d H:i:s");
    $status= "Ordered";
    $customer_name =$_POST['name'];
    $customer_contact =$_POST['contact'];	
    $customer_email =$_POST['email'];
    $customer_address =$_POST['address'];
   
    // array_push($_SESSION['item'],
    // [
    // 'title_order'=>$item['title'],
    // 'price_order'=>$price,
    // 'qty_order'=>$qty,
    // 'total_order'=>$total,
    // 'date_order'=>$order_date,
    // 'status_order'=>$status,
    // 'name_order'=> $customer_name,
    // 'contact_order'=>$customer_contact,
    // 'email_order'=>$customer_email,
    // 'address_order'=>$customer_address
    
    
    // ]);
    // echo $_SESSION['item']['title_order'];die;
    $cnx1=$cnx->prepare("INSERT INTO commande(food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address, id_user) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $params=array($food,$price,$qty,$total,$order_date,$status,$customer_name,$customer_contact,$customer_email,$customer_address,$_SESSION['commande']['id']);
    
    if ($cnx1->execute($params)){
        $_SESSION['order']="<div class='success'>Food order Seccessfuly.</div>";
           header("location:home.php");
        }
      
        else{
       $_SESSION['order']="<div class='error'>Faild to order food.</div>";
           header("location:home.php");
        }   
    }

        ?>

    <?php include('partials-user/footer_user.php'); ?>