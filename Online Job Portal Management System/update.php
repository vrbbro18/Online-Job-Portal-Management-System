<?php

require_once('include/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_GET['gig_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $deliverytime = $_POST['deliverytime'];
    $numberofrevisions = $_POST['numberofrevisions'];
    $tags = $_POST['tags'];
    $gigextras = $_POST['gigextras'];
    $basicprice = $_POST['basicprice'];
    $standeredprice = $_POST['standeredprice'];
    $premiumprice = $_POST['premiumprice'];

    // Prepare and bind the SQL statement
    $stmt = $connection->prepare("UPDATE creat_a_gig SET title = ?, category = ?, description = ?, delivery_time = ?, number_of_revisions = ?, tags = ?, gig_extras = ?, basic_price = ?, standered_price = ?, premium_price = ? WHERE id = ?");
    $stmt->bind_param("ssssisssssi", $title, $category, $description, $deliverytime, $numberofrevisions, $tags, $gigextras, $basicprice, $standeredprice, $premiumprice, $id);

    if ($stmt->execute()) {
        echo "<div id='alertBox' class='alert success'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> Data saved successfully.
        </div>";
        header("Location: giglist.php");
    } else {
        echo "<div id='alertBox' class='alert error'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            <strong>Alert!</strong> Data saved unsuccessfully.
        </div>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$connection->close();

// Retrieve the gig_id from the query string
$gig_id = $_GET['gig_id'] ?? '';

?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update gig</title>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/update.css">
     
    
    <script src="https://kit.fontawesome.com/59873e9268.js" crossorigin="anonymous"></script>

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
   <br><br><br>





                   <!-- Header Code -->

 <section id="sec"  >

 <a href=giglist.php><button type="button" class="giglist">Gig List</button> </a>

  <h1>-Update Gig-</h1>


  <form action="update.php?gig_id=<?php echo $gig_id; ?>" class="gigform" method="post">


    <div class="gform">
    <div>Title:- <input type="text" placeholder="Title" class="title" name="title" required></div><br>

    <div>Category:-
        <select class="category" name="category" required>
          <option selected="selected">Choose One</option>
          <option>Writing and Translation</option>
          <option>Graphic Design and Illustration</option>
          <option>Digital Marketing</option>
          <option>Video and Animation</option>
          <option>Music and Audio</option>
          <option>Programming and Tech</option>
          <option>Business</option>
          <option>Lifestyle</option>
          <option>Data Entry and Admin</option>
          <option>Other</option>
        </div>
    </select><br><br>
    
    <div>Description:- <input type="text" placeholder="Description" name="description" class="description" required></div><br>


    <div>Delivery time:-
        <select class="deliverytime" name="deliverytime" required>
          <option selected="selected">Choose One</option>
          <option>1 Business Days</option>
          <option>2 Business Days</option>
          <option>3 Business Days</option>
          <option>4 Business Days</option>
          <option>5 Business Days</option>
          <option>6 Business Days</option>
          <option>7 Business Days</option>
        </div>
    </select><br><br>
    
    <div>Number Of Revisions:- <input type="text" placeholder="Number Of Revisions" name="numberofrevisions" class="noofrevisions" required></div><br>
    
    <div>Tags(Keywords):- <input type="text" placeholder="Tags" name="tags" class="tags" required></div><br>
    
    <div>Gig Extras:- <input type="text" placeholder="Gig Extras" name="gigextras" class="gigextras" required></div><br>
    
    <div id="pricing">Pricing</div><br><br> <div>Basic:-<input type="text" name="basicprice" placeholder="Basic Price" class="basic" required></div><br>
    <div>Standered:-<input type="text" placeholder="Standered Price" name="standeredprice" class="standered" required></div><br>

    <div>Premium:-<input type="text" placeholder="Premium Price" name="premiumprice" class="premium" required></div><br>

    <div><input type="submit" name="submit" class="submit"></div>
    
    </div>
    </form>
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

