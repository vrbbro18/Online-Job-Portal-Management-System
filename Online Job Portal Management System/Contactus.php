<?php

include_once('inc/header.php');
require_once('inc/connection.php');
?>



    
    <link rel="stylesheet" href="style/stylef.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    
     

    <section>

<div class="contact">
  <div class="contact_a">
  <h3>Contact Us</h3>
  <div class="par">
  <p>Provides a convenient way for users to reach out with inquiries, feedback, or any issues they may encounter while using the <br> job portal</p></div>
</div>


<div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Surkhet, NP12</div>
            <div class="text-two">Birendranagar 06</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+94 779 65887</div>
           
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">codinglab@gmail.com</div>
            <div class="text-two">info.codinglab@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          <p> typically includes essential information and features to facilitate effective communication.</p>
          <form action="connect.php" method="post">
            <div class="input-box">
              <input type="text" class="form-control" name="name" placeholder="Enter your name" />
            </div>
            <div class="input-box">
              <input type="text" class="form-control" name="email" placeholder="Enter your email" />
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Enter your message"class="form-control" name="message" ></textarea>
            </div>
            <div class="submit">
              <input type="submit" name="submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
      
                   

</section>

<?php include_once('inc/footer.php'); ?>
                   


                   <!-- Footer Code -->

    
