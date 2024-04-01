<?php require_once('inc/connection.php'); ?>
<?php

  $gig_list = "";

    //getting the list of gigs
    
    $query = "SELECT * FROM creat_a_gig WHERE is_deleted = 0 ORDER BY id";
    $gigs  = mysqli_query($conn, $query);
    
    if($gigs)
    {
      while ($gig = mysqli_fetch_assoc($gigs))
      {
        $gig_list .=  "<tr>";
        $gig_list .=  "<td>{$gig['title']}</td>";
        $gig_list .=  "<td>{$gig['category']}</td>";
        $gig_list .=  "<td>{$gig['description']}</td>";
        $gig_list .=  "<td>{$gig['delivery_time']}</td>";
        $gig_list .=  "<td>{$gig['number_of_revisions']}</td>";
        $gig_list .=  "<td>{$gig['gig_extras']}</td>";
        $gig_list .=  "<td>{$gig['basic_price']}</td>";
        $gig_list .=  "<td>{$gig['standered_price']}</td>";
        $gig_list .=  "<td>{$gig['premium_price']}</td>";
        $gig_list .=  "<td><a href=\"update.php?gig_id={$gig['id']}\"><button>Edit</button></a></td>";
        $gig_list .=  "<td><a href=\"delete.php?gig_id={$gig['id']}\"><button>Delete</button></a></td>";
        $gig_list .=  "</td>";
      }
    }
    else
    {
      echo "database query failed";
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gig list</title>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/giglist.css">
     
    
    <scrip src="https://kit.fontawesome.com/59873e9268.js" crossorigin="anonymous"></script>
  </head>
  <body>
  
</div>

    <nav>
      <label class="logo">ATJ.COM</label>
      <ul>
        <li><a id="navbutton" href="#">Home</a></li>
        <li><a id="navbutton" href="#Employer">Employer</a></li>
        <li><a id="navbutton" class="active" href="jobseekerprofile.php">User</a></li>
        <li><a id="navbutton" href="#Admin">Admin</a></li>
        <li><a id="navbutton" href="#Feedback">Feedback</a></li>
        <li><a id="navbutton" href="#Login">Logout</a></li>
      </ul>
      <form class="search-form">
  <input type="text" placeholder ="Search">
  <button>Search</button>
</form>
</nav>
   <br>





                   <!-- Header Code -->
<section>



<a href=creatgig.php><button type="button" class="addnewgig" >+ Add New Gig</button> </a>
<main>
  <h1>-GIG LIST-</h1>
<table class="gigtable" >
  <tr>
    <th>Title</th>
    <th>Category</th>
    <th>Description</th>
    <th>Delevery Time</th>
    <th>Number Of Revisions</th>
    <th>Gig Extras</th>
    <th>Basic Price</th>
    <th>Standered Price</th>
    <th>Premium Price</th>
    <th>Edit</th>
    <th>Delete</th>

  </tr>

      <?php echo $gig_list; ?>

</table>

</main>

</section>


                    <!-- Footer Code -->

	<br><br><br>
    <footer>
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. </p>
            <div class="social">
              <a href="#"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              <a href="#"><span class="fab fa-instagram"></span></a>
              <a href="#"><span class="fab fa-pinterest"></span></a>
            </div>
          </div>
        </div>

        <div class="center box">
          <h2>More info</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Kaduwela , Colombo 07</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">+94 778542146</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">abc@example.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </footer>

  </body>
</html>

<?php mysqli_close($connection); ?>