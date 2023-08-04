<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="room.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</nav>
<?php
if (isset($_GET['roomtype'])) {
    $selectedRoomType = $_GET['roomtype'];
} else {
    header("Location: hindex.php");
    exit(); 
}
?>

<?php
require('db.php');

$selectedRoomType = isset($_GET['roomtype']) ? $_GET['roomtype'] : '';
$selectedRoomType = mysqli_real_escape_string($con, $selectedRoomType);

// Query to retrieve all details for the selected roomtype
$query = "SELECT * FROM rooms WHERE roomtype = '$selectedRoomType'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $roomDetails = mysqli_fetch_assoc($result);
   
} else {
    header("Location: hindex.php");
    exit(); 
}
?>


<img src="<?php echo $roomDetails['image']; ?>" alt="room" class="room-image">


<h3 class="room-type"><?php echo $roomDetails['roomtype']; ?></h3>
<p class="room-details"><?php echo $roomDetails['description']; ?></p>
<p class="room-details">Other Conveniences: <?php echo $roomDetails['conveniences']; ?></p>
<p class="room-details"><strong>Size: </strong><?php echo $roomDetails['size']; ?></p>
<p class="room-details"><strong>Signature Feature: </strong> <?php echo $roomDetails['sigfeature']; ?></p>
<p class="room-details"><strong>Occupancy Details: </strong><?php echo $roomDetails['occupancy']; ?></p>
<h6 class="room-details">Price: <strong>Rs. <?php echo $roomDetails['price']; ?></strong></h6>

<button class="check-availability-btn" onclick="checkAvailability('<?php echo htmlspecialchars($roomDetails['roomtype']); ?>')">Check Availability</button>
<div id="bookingBtn"></div>

    <!-- JavaScript function checkAvailability -->
    <script>
    function checkAvailability(roomtype) {
        $.ajax({
            url: 'availability.php',
            method: 'POST',
            data: {
                roomtype: roomtype
            },
            success: function(response) {
                //  alert(response);
                var availableCount = parseInt(response);
                if (availableCount > 0) {
                    alert('Availability status for ' + roomtype + ': ' + availableCount + ' room(s) available');
                    var bookButton = '<button data-toggle="modal" data-target="#userLoginModal"  style="display: block; margin: 0 auto; background-color: #ffa500; border: none; padding: 10px 20px; cursor: pointer;">Book Now</button>';
                    $('#bookingBtn').html(bookButton);

                } else {
                    alert('No rooms available for ' + roomtype);
                    $('#bookingBtn').html('');
                }
            },
            error: function() {
                alert('Error occurred while checking availability.');
            }
        });
    }
    function showModal() {
    $('#userLoginModal').modal('show');
}

</script>

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
          Book Your Dream Stay: Just a Few Steps Away!  
            <div class="form-group">
              
              <label for="fullName">Full Name: </label>
              <input type="text" class="form-control" name="fullname" placeholder="Full name" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="email">Email Address: </label>
              <input type="email" class="form-control" name="email" placeholder="email" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number: </label>
              <input type="phone" class="form-control" name="phone" placeholder="Phone Number" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="checkin">Check-in Date: </label>
              <input type="date" class="form-control" name="checkin" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="checkout">Check-out Date: </label>
              <input type="date" class="form-control" name="checkout" required = "required" autofocus="autofocus">
            </div>
            <div class="form-group">
              <label for="numAdults">Number of Adults: </label>
              <input type="number" class="form-control" name="numAdults" required min="1" value="1">
            </div>
            <div class="form-group">
              <label for="numAdults">Number of Children: </label>
              <input type="number" class="form-control" name="numChildren" required min="0" value="0">
            </div>
    

            <button type="submit" name="submit" class="btn btn-warning btn-block">Submit Booking</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>

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

<script src="script.js"></script>

</body>
</html>