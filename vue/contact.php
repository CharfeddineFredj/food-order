
<?php include('partials-front/menu.php'); ?>
  <head>
    <head><link rel="stylesheet" href="../css/contact.css"></head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  </head>
  <?php  if(isset($_SESSION['Add']))
            {
                echo $_SESSION['Add'];
                unset($_SESSION['Add']);
            }
            ?>
   
 <br><br>
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>rue 312, sehloul, sousse</div>
        <div><i class="fas fa-envelope"></i>fradjcharf@gmail.com</div>
        <div><i class="fas fa-phone"></i>50989069</div>
        <div><i class="fas fa-clock"></i>Mon - Fri 8:00 AM to 5:00 PM</div>
      </div>
      <div class="contact-form">
        <h2>Contact Us</h2>
        <form class="contact" action="" method="POST">
         <input type="text" name="name" class="text-box" placeholder="Your Name" required>
         <input type="text" name="phone" class="text-box" placeholder="Your Phone Number" required>
         <input type="email" name="email" class="text-hh" placeholder="Your Email" required>
         <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
   <?php if(isset($_POST['submit']))
    {
      $name=$_POST['name'];

      $header='Reclamation of '.$name."\n";
      //$header.='Content-Type:text/html; charset="UTF-8"'."\n";
      //$header.='Content-Transfer-Encoding: 8bit';
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $message=$_POST['message'];
      $cordonner="Name: ".$name." Phone Number: ".$phone." Email: ".$email." Message : ".$message;
      
        
        if( mail("charf09181998@gmail.com",$header,$cordonner) ){
          
          $_SESSION['Add']="<div class='success text-center' >Email Sent Successfully.</div>";
          header("location:contact.php"); 
         }
        else 
        {
          $_SESSION['Add']="<div class='error text-center'>Email is not Sent.</div>";
          header("location:contact.php"); 
        }
        

    }
  

   ?>

    <?php include('partials-front/footer.php'); ?>


      