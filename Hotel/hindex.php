<?php
require('db.php');
$error='';
session_start();
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="select * from login where username='$username' and password='$password'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){
    $row=mysqli_fetch_assoc($res);
    $_SESSION['ROLE']= $row['role'];
    $_SESSION['IS_LOGIN']= 'yes';

    if($row['role']==1){
      header('location: hindex.php');
      exit;
    }
    if($row['role']==2){
      header('location: admin.php');
      exit;
    }

  }
  else{
    $error='please enter correct login details';
  }
  

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>

    <link rel="stylesheet" href="index.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html" id="logo"><span>C</span>elestial <span>C</span>rown <img src="images/logo copy.png"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span><i class="fa-solid fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link active" href="#home">
            <i class="fas fa-home"></i>
            <div>Home</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#packages">
        <i class="fas fa-hotel"></i>
            <div>Packages</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#about">
            <i class="fas fa-info-circle"></i>
            <div>About</div>
        </a>
    </li>
</ul>

            
            <form class="d-flex">
            <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#userLoginModal">
      User/Admin Login
    </button>
           <a class="nav-link" href="#" id="languageModalBtn">
                <div>IN|ENG|INR
                </div>
            </a>
            </form>
          </div>
        </div>
      </nav>

  <!-- User Login Modal -->
  <div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="userLoginModalLabel" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userLoginModalLabel">User Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
          Welcome back !!! login to continue
            <div class="form-group">
              
              <label for="username">Username</label>
              <input type="username" class="form-control" name="username" placeholder="Username" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password "required = "required">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <?php echo $error?>
          </form>
        </div>
      </div>
    </div>
  </div>

  
<!-- in|eng|inr -->
      <div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="languageModalLabel">Choose State, Language, and Currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="countrySelect" class="form-label">Select State:</label>
                            <select class="form-select" id="countrySelect">
                                <option value="india">Chhattisgarh</option>
                                <option value="usa">Gujrat</option>
                                <option value="uae">Madhya Pradesh</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="languageSelect" class="form-label">Select Language:</label>
                            <select class="form-select" id="languageSelect">
                                <option value="english">English</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="currencySelect" class="form-label">Select Currency:</label>
                            <select class="form-select" id="currencySelect">
                                <option value="inr">INR</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <section id="home" class="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="hotel-view-img"></div>
                <h2 class="home-title">Find Your Stay</h2>
                <div class="facilities-header">
                        <h3>Facilities:
                    
                    <div class="quote-container">
                        <span id="quote"></span>
                    </div>
                    </h3></div>
            </div>
            
        </div>
    </div>
</section>

<div class="search-box">
  <div class="search-box-table">
    <label for="destination">Where are you going?</label>
    <input type="text" id="destination" placeholder="Enter a destination">
  </div>
  <div class="search-box-table">
    <label for="check-in">Check-in date</label>
    <input type="date" id="check-in">
  </div>
  <div class="search-box-table">
    <label for="check-out">Check-out date</label>
    <input type="date" id="check-out">
  </div>
  <div class="search-box-table">
    <label for="adults">Adults</label>
    <div class="select-container">
      <select id="adults">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
  </div>
  <div class="search-box-table">
    <label for="children">Children</label>
    <div class="select-container">
      <select id="children">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </div>
  </div>
  <div class="search-box-table">
    <label for="rooms">Rooms</label>
    <div class="select-container">
      <select id="rooms">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
    </div>
  </div>
  <!-- <a input type="button" class="search-button" href="#packages">Search</a> -->
  <button class="search-button" >Search</button>
</div>

<section class="packages" id="packages">
      <div class="container">
        
        <div class="main-txt">
          <h1><span>P</span>ackages</h1>
        </div>

        <div class="row" style="margin-top: 30px;">
        
        <?php
require('db.php');
$query = "SELECT MIN(id) AS min_id, roomtype, image, sdescription, price FROM rooms GROUP BY roomtype";
$result = mysqli_query($con, $query);
$check = mysqli_num_rows($result) > 0;

if ($check) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-4 py-3 py-md-0 my-3">
            <div class="card">
                <img src="<?php echo $row['image'] ?>" alt="room" onclick="showRoomDetails('<?php echo $row['roomtype']; ?>')">
                <div class="card-body">
                    <h3><?php echo $row['roomtype'] ?></h3>
                    <p><?php echo $row['sdescription'] ?></p>
                    <div class="star">
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star checked"></i>
                        <i class="fa-solid fa-star "></i>
                        <i class="fa-solid fa-star "></i>
                    </div>
                    <h6>Price: <strong>Rs.<?php echo $row['price'] ?></strong></h6>
                    <a href="#" id="bookNowButton-<?php echo $row['roomtype']; ?>" onclick="checkAvailability('<?php echo $row['roomtype']; ?>')">Book Now</a>
                </div>
            </div>
        </div>
        <?php
    }
}
$availabilityQuery = "SELECT roomtype, COUNT(*) AS available_count FROM rooms LEFT JOIN checked ON rooms.id = checked.roomid WHERE CURDATE() NOT BETWEEN date_in AND date_out OR checked.id IS NULL GROUP BY roomtype";

$availabilityResult = mysqli_query($con, $availabilityQuery);
$availability = array();

if ($availabilityResult && mysqli_num_rows($availabilityResult) > 0) {
  while ($row = mysqli_fetch_assoc($availabilityResult)) {
      $availability[$row['roomtype']] = $row['available_count'];
  }
}
?>

<!-- JavaScript function to show room availability status -->
<script>
    function checkAvailability(roomtype) {
  
        var availableCount = <?php echo json_encode($availability); ?>[roomtype] || 0;
        var message = availableCount > 0 ? "Availability status for " + roomtype + ": " + availableCount + " room(s) available" : "No rooms available for " + roomtype;
        alert(message);
        var bookNowButton = document.getElementById("bookNowButton-" + roomtype);
        if (bookNowButton) {
            bookNowButton.innerText = "Book Now (" + availableCount + " Available)";
        }
    }

    // JavaScript function to open a new page with more details for the selected roomtype
    function showRoomDetails(roomtype) {
       
        window.open('room_details.php?roomtype=' + encodeURIComponent(roomtype), '_blank');
    }
</script>
    </section>

    <section class="about" id="about">
  <div class="container">

    <div class="main-txt">
      <h1>About <span>Us</span></h1>
    </div>

    <div class="row" style="margin-top: 50px;">

      <div class="col-md-6 py-3 py-md-0">
        <div class="card">
          <img src="https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2022/04/12/1329/MUMGH-P0765-Inner-Courtyard-Hotel-Exterior-Evening.jpg/MUMGH-P0765-Inner-Courtyard-Hotel-Exterior-Evening.16x9.jpg" alt="">
        </div>
      </div>

      <div class="col-md-6 py-3 py-md-0">
        <h2>Welcome to a World of Luxury</h2>
        <p>Step into a world of unparalleled luxury and warm hospitality at Celestial Crown. Situated in the heart of Chhattisgarh, our hotel is a haven of tranquility amidst the bustling city.Indulge in the perfect blend of contemporary elegance and personalized service, as we cater to your every need. Our thoughtfully designed rooms and suites offer a sanctuary of comfort and relaxation.</p>
        <div class="additional-content hidden">
          <p>Experience the breathtaking views of the city skyline from our premium rooms. Pamper yourself with our top-notch spa and wellness services. Enjoy delicious cuisine and refreshing drinks at our in-house restaurants and bars. Whether you are on a business trip or a leisurely vacation, Travel Around promises an unforgettable stay.</p>
        </div>
        <button id="about-btn" onclick="toggleAdditionalContent()">Read More...</button>
      </div>
    </div>
  </div>
</section>

    <footer id="footer">
      <h1><span>C</span>elestial <span>C</span>rown</h1>
      <p>Discover Unmatched Luxury & Comfort.Your Perfect Stay Awaits</p>
      <div class="social-links">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-pinterest-p"></i>
      </div>
      <div class="credit">
        <p>Designed By <a href="#">Devyani</a></p>
      </div>
      <div class="copyright">
        <p>&copy;The Indian Hotels Company Limited. All Rights Reserved</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      document.getElementById('languageModalBtn').addEventListener('click', function () {
          var myModal = new bootstrap.Modal(document.getElementById('languageModal'));
          myModal.show();
      });

    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        navLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const targetId = link.getAttribute("href");
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: "smooth" });
                }
            });
        });
    });

  </script>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>