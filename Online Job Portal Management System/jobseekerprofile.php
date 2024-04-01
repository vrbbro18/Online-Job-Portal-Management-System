
 <?php
  require_once('inc/connection.php');
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Job Seeker Profile</title>
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style\stylesprofile.css">
     
    
    <script src="https://kit.fontawesome.com/59873e9268.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

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

  <a href=creatgig.php><button type="button" class="gig">Creat a gig</button> </a>
  <a href=giglist.php><button type="button" class="giglist">Gig List</button> </a>

<div class="buttons">
    <li><a href="#Wish list" span class="fa-solid fa-heart fa-2xl" style="color: #ffffff;"></a> Wish list</li>
    <li><a href="#Following" span class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></a> Following</li>
    <li><a href="#Viewed" span class="fa-solid fa-eye fa-2xl" style="color: #ffffff;"></a> Viewed</li>
    <li><a href="#My CV" span class="fa-solid fa-file fa-2xl" style="color: #ffffff;"></a> My CV</li>
    <li><a href="#share" span class="fa-solid fa-share fa-2xl" style="color: #ffffff;"></a> Share</li>
    <li><a href="#Notifications" span class="fa-solid fa-bell fa-2xl" style="color: #ffffff;"></a> Notifications</li>


</div>
<br>

            <!--candidates ID-->
   <div class="card">         
<h3 class="id1">Candidate's ID: ATJ01 | 001</h3><br>

<!--candidate's profile picture-->


<img class="profile_pic" src="images\profile-pic.png"><br>
<div class="dee">
  <div class="name">Janith Wijethunga</div><br>
  <div class="mail">janithwije255@gmail.com</div>
</div>
<br><br>
<a href="jobseekereditprofile.php"><button type="button" class="editprofile" >Edit Profile</button></a>
</div>
<!--bio and description-->

<div class="bio">

    <div class="bio1">Bio:- </div><br>
    <div class="des">Janith is an accomplished IT specialist with a Bachelor's degree in Computer Science. With expertise in system administration, network management, and cybersecurity, Janith has made significant contributions throughout his career. He excels in managing complex IT infrastructures, troubleshooting technical issues, and developing software solutions. Janith's strong analytical skills and proactive approach to problem-solving enable him to optimize system performance and deliver projects on time. He is highly regarded for his ability to extract valuable insights from data, driving data-driven decision-making for organizations. Janith's dedication to staying current with the latest technological advancements showcases his commitment to delivering exceptional results in the field of IT. His passion for technology, coupled with his detail-oriented mindset, makes him a valuable asset in any IT environment. Janith's collaborative nature and ability to work effectively in cross-functional teams further enhance his contributions.</div>
    
</div>
<div class="hr"><hr></div>

<div class="details">
  <div>Name:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Janith Wijethunga</div><br><br>
  <div>Email:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;janithwije255@gmail.com</div><br><br>
  <div>Address:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Kumara road, maharagama</div><br><br>
  <div>Phone Number:&emsp;&nbsp;&emsp;0775624189</div><br><br>
  <div>Gender:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Male</div><br><br>
  <div>Date Of Birth:&emsp;&nbsp;&emsp;&emsp;2000/06/09</div><br>
</div>
<br><br>

<img id="Badge1" src="images/badge1.png">
<img id="Badge2" src="images/badge2.png">
<img id="Badge3" src="images/badge3.png">




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
