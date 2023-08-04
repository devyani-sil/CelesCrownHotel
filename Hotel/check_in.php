<!DOCTYPE html>
<html>
<head>
  <title>Hotel Manager Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="admin.css">
  <script src="jquery-3.7.0.min.js"></script>
  
</head>
<body>

<!-- Top Navigation -->
<div class="topnav">
    <a href="logout.php">Logout</a>
  </div>
  <div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2">
      <div class="admin">
        <div class="sidebar">
          <h2>Administrator</h2>
          <ul>
            <li><a href="admin.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="check_in.php"><i class="fas fa-sign-in-alt"></i> Check-In/Check-Out</a></li>
            <li><a href="category.php"><i class="fas fa-list"></i> Room Categories</a></li>
            <li><a href="site_settings.php"><i class="fas fa-cogs"></i> Site Settings</a></li>
          </ul>
        </div>
      </div>
    </div>


 <div class="col-md-10">
<div class ="main-content" style="background-color: #F2EAF2;">
  <!-- Main Content -->
  <?php
require('db.php');
$cat_name = array();


$cat = $con->query("SELECT * FROM room_category ORDER BY roomtype ASC");
while ($row = $cat->fetch_assoc()) {
    $cat_name[$row['id']] = $row['roomtype'];
}

$where = '';
if (isset($_GET['category_id']) && $_GET['category_id'] != 'all') {
    $category_id = $_GET['category_id'];
    $where .= "WHERE category_id = '$category_id'";
}

if (isset($_GET['status']) && $_GET['status'] != 'all') {
    $status = $_GET['status'];
    if (!empty($where)) {
        $where .= " AND status = '$status'";
    } else {
        $where .= "WHERE status = '$status'";
    }
}

$query = "SELECT * FROM room_no $where ORDER BY id ASC";
$rooms = $con->query($query);
?>

<!-- HTML Content -->
<div class="container-fluid">
    <div class="col-lg-10  ">
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-2 custom-right-align">
                <div class="card">
                    <div class="card-body">
                        <form id="filter">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label">Category</label>
                                    <select class="custom-select browser-default" name="category_id">
                                        <option value="all" <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == 'all') ? 'selected' : '' ?>>All</option>
                                        <?php
                                        foreach ($cat_name as $id => $category) {
                                            $selected = (isset($_GET['category_id']) && $_GET['category_id'] == $id) ? 'selected' : '';
                                            echo "<option value='$id' $selected>$category</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Status</label>
                                    <select class="custom-select browser-default" name="status">
                                        <option value="all" <?php echo (isset($_GET['status']) && $_GET['status'] == 'all') ? 'selected' : '' ?>>All</option>
                                        <option value="0" <?php echo (isset($_GET['status']) && $_GET['status'] == '0') ? 'selected' : '' ?>>Available</option>
                                        <option value="1" <?php echo (isset($_GET['status']) && $_GET['status'] == '1') ? 'selected' : '' ?>>Unavailable</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button class="btn btn-block btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Data Table -->
        <div class="row mt-3">
            <div class="col-md-10 offset-md-2 custom-right-align">
                <div class="card">
                    <div class="card-body">
                    <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Room</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        while ($row = $rooms->fetch_assoc()):
        ?>
        <tr>
        <td class="text-center"><?php echo $i++; ?></td>
        <td class="text-center"><?php echo $cat_name[$row['category_id']]; ?></td>
        <td><?php echo $row['room']; ?></td>
        <td class="text-center">
            <?php if ($row['status'] == 0): ?>
                <button class="btn btn-sm  available-button">Available</button>
            <?php else: ?>
                <button class="btn btn-sm btn-danger unavailable-button" data-room-id="<?php echo $row['id']; ?>">Unavailable</button>
            <?php endif; ?>
        </td>
        <td class="text-center">
            <?php if ($row['status'] == 0): ?>
                <button class="btn btn-sm btn-success check_in" type="button" data-id="<?php echo $row['id']; ?>">Check-in</button>
            <?php else: ?>
                <button class="btn btn-sm btn-warning checkout" type="button" data-id="<?php echo $row['id']; ?>">Checkout</button>
            <?php endif; ?>
        </td>
    </tr>
        <?php endwhile; ?>
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div> 

<!-- JavaScript -->
<script>
    $('.check_in').click(function () {
        var roomId = $(this).attr("data-id");
        $.ajax({
            url: "manage_check_in.php?rid=" + roomId,
            method: "GET",
            success: function (response) {
                $("#checkInModal .modal-body").html(response);
                $("#checkInModal").modal("show");
            },
            error: function () {
                alert("Failed to load Check-in form.");
            }
        });
    });

    $(document).on('click', '#saveCheckInBtn', function () {
       
        var formData = $('#checkInForm').serialize();
        $.ajax({
            url: "save_check_in.php", 
            method: "POST",
            data: formData,
            success: function (resp) {
                alert(resp+"Aa");
                console.log(resp)
                if (resp === "success") {
                    alert("Data successfully saved");
                   
                    $("#checkInModal").modal("hide");
                } 
            },
            error: function () {
                alert("Failed to save data."+resp);
            }
        });
    });

    function fetchCustomerData(roomId) {
        $.ajax({
            url: "fetch_customer_data.php",
            method: "GET",
            data: { room_id: roomId },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#customerName").text(data.name);
                $("#contactNo").text(data.contact_no);
                $("#roomNo").text(data.room);
                $("#roomCategory").text(data.roomtype);
                $("#checkInDateTime").text(data.date_in + " " + data.time_in);
                $("#checkOutDateTime").text(data.date_out + " " + data.time_out);
                $("#daysOfStay").text(data.days_stay);
                $("#totalAmount").text(data.total_amount);

                $("#customerDetailsModal").modal("show");
            },
            error: function () {
                alert("Failed to fetch customer data.");
            },
        });
    }

    $(document).on('click', '.unavailable-button', function () {
        var roomId = $(this).attr("data-room-id");
        fetchCustomerData(roomId);
    });

    $(document).on('click', '.checkout', function () {
        var roomId = $(this).attr("data-id");
        $("#confirmCheckoutBtn").attr("data-room-id", roomId); 
        $("#checkoutConfirmModal").modal("show");
    });

    $("#confirmCheckoutBtn").click(function () {
        console.log("yes button clicked");
        var roomId = $(this).attr("data-room-id");

        $.ajax({
            url: "checkout_room.php",
            method: "POST",
            data: { room_id: roomId },
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    $("#checkoutConfirmModal").modal("hide");
                    var statusCell = $("button[data-id='" + roomId + "']").closest("tr").find("td.text-center");
                    statusCell.html('<span class="badge badge-success">Available</span>');
                    alert("Checked out successfully!");
                } else {
                    alert("Failed to check out.");
                }
            },
            error: function () {
                alert("Failed to check out.");
            },
        });
    });

    $("#cancelCheckoutBtn").click(function () {
        $("#checkoutConfirmModal").modal("hide");
    });

    $(".modal").on("hidden.bs.modal", function () {
        $("#checkInForm")[0].reset();
    });
</script>

<!-- HTML Content -->
<div class="modal fade" id="checkInModal" tabindex="-1" role="dialog" aria-labelledby="checkInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkInModalLabel">Check In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="checkInForm">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact #</label>
                        <input type="text" name="contact_no" id="contact_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="checkin_date">Check-in Date</label>
                        <input type="date" name="date_in" id="date_in" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="checkin_time">Check-in Time</label>
                        <input type="time" name="date_in" id="date_in" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="days_stay">Days of Stay</label>
                        <input type="number" min="1" name="days_stay" id="days_stay" class="form-control" value="1" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCheckInBtn">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- HTML Content -->
<div class="modal fade" id="customerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="customerDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerDetailsModalLabel">Customer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="customerName"></span></p>
                <p><strong>Contact #:</strong> <span id="contactNo"></span></p>
                <p><strong>Room No:</strong> <span id="roomNo"></span></p>
                <p><strong>Room Category:</strong> <span id="roomCategory"></span></p>
                <p><strong>Check-in Date/Time:</strong> <span id="checkInDateTime"></span></p>
                <p><strong>Check-out Date/Time:</strong> <span id="checkOutDateTime"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="checkoutConfirmModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutConfirmModalLabel">Confirm Checkout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Do you really want to check out?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="confirmCheckoutBtn">Yes</button>
      </div>
    </div>
  </div>
</div>
  
</body>
</html>