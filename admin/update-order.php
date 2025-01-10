<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
       
        <?php
            if(isset($_GET['id'])){
               $id=$_GET['id'];
               $sql= "SELECT * from commande where id=$id" ;
               $res = $cnx->query($sql);
               $fd =$res->fetchAll();
               foreach ($fd as $item){
                  $status=$item['status'];
                  
               }
            }else
        {
            header("location:manage-order.php");
        }
        ?>

      
        <form action="" method="post" enctype="multipart/form-data">
               <table  class="tbl-30">
                   <tr>
                       <td>Food name:</td>
                       <td><b><?php echo $item['food'];?></b></td>
                    </tr>
                    <tr>
                       <td>Price:</td>
                       <td>
                      <b>$ <?php echo $item['price'];?></b> 
                       </td>
                    </tr>
                    <tr>
                       <td>Qty:</td>
                       <td>
                           <input type="number" name="qty" value="<?php echo $item['qty'];?>">
                       </td>
                    </tr>
                    <tr>
                       <td>Status :</td>
                       <td>
                           <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";}  ?> vlaue="Ordered">Ordered</option> 
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> vlaue="On Delivery">On Delivery</option> 
                            <option <?php if($status=="Delivered"){echo "selected";} ?> vlaue="Delivered">Delivered</option>   
                            <option <?php if($status=="Cancelled"){echo "selected";} ?>  vlaue="Cancelled">Cancelled</option>     

                       </td>
                    </tr>
                    <tr>
                       <td>Customer name :</td>
                       <td><input type="text" name="customer_name" value="<?php echo $item['customer_name'];?>" ></td>
                    </tr> 
                    <tr>
                       <td>Customer contact :</td>
                       <td><input type="text" name="customer_contact" value="<?php echo $item['customer_contact'];?>" ></td>
                    </tr>
                    <tr>
                       <td>Customer Email :</td>
                       <td><input type="customer_email" name="customer_email" value="<?php echo $item['customer_email'];?>" ></td>
                    </tr>
                    <tr>
                    <td>Customer Address :</td>
                    <td><textarea name="customer_address" rows="5" cols="30"><?php echo $item['customer_address'];?></textarea></td>
                    </tr>
                    <tr>
                    <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="hidden" name="price" value="<?php echo $item['price'] ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondar">
                        </td>  
                    </tr>
                    
                    </table>
                    </form>

                    <?php
    if(isset($_POST['submit']))
    {
    $id=$_POST['id']; 
    $price =$_POST['price'];
    $qty =$_POST['qty'];
    $total= $price * $qty;
    $status=$_POST['status'];
    $customer_name=$_POST['customer_name'];
    $customer_contact=$_POST['customer_contact'];
    $customer_email=$_POST['customer_email'];
    $customer_address=$_POST['customer_address'];

    $q = "UPDATE commande SET qty='$qty', total='$total' , status='$status' , customer_name='$customer_name' ,customer_contact='$customer_contact' ,customer_email='$customer_email', customer_address='$customer_address'  WHERE id=$id";
    
    if($cnx->exec($q)){
        $_SESSION['update']="<div class='success'>Order Updated Seccessfuly.</div>";
        header("Location:manage-order.php");
    }else
    {
        $_SESSION['update']="<div class='error'>Faild to Updated Order</div>";
        header("location:manage-order.php");
    }

    }
   ?>







</div>
</div>
<?php include('partials/footer.php'); ?>