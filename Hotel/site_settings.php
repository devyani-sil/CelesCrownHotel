<!DOCTYPE html>
<html>
<head>
  <title>Hotel Manager Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.css">
  <script src = "jquery-3.7.0.min.js"></script>
</head>
<body>

 <!-- Top Navigation -->
 <div class="topnav">
    <a href="logout.php">Logout</a>
  </div>
  <!-- Sidebar -->
  <div class="admin">
  <div class="sidebar">
    <h2>Administrator</h2>
    <ul>
      <li><a href="admin.php"><i class="fas fa-home"></i> Home</a></li>
      <!-- <li><a href="booked.php"><i class="fas fa-book"></i> Booked</a></li> -->
      <li><a href="check_in.php"><i class="fas fa-sign-in-alt"></i> Check-In/Check-Out</a></li>
      <!-- <li><a href="check_out.php"><i class="fas fa-sign-out-alt"></i> Check-Out</a></li> -->
      <li><a href="category.php"><i class="fas fa-list"></i> Room Category List</a></li>
      <!-- <li><a href="#"><i class="fas fa-bed"></i> Rooms</a></li> -->
      <li><a href="site_settings.php"><i class="fas fa-cogs"></i> Site Settings</a></li>
    </ul>
  </div>

<?php
include 'db.php';
$qry = $con->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="card col-lg-8">
		<div class="card-body ">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">Hotel Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['hotel_name']) ? $meta['hotel_name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Hotel email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Hotel Contact</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">Hotel About Content</label>
					<textarea name="about" class="text-jqte"><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">Image</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
		</div>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
  
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.min.js"></script> 
<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	$('.text-jqte').jqte();

	$('#manage-settings').submit(function(e){
    e.preventDefault();
    start_load();
    $.ajax({
      url: 'ajax.php?action=save_settings',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      error: function(err){
        console.log(err);
        alert_toast('An error occurred while saving the data.', 'error');
      },
      success: function(resp){
        console.log(resp);
        if(resp == 1){
          alert_toast('Data successfully saved.', 'success');
          setTimeout(function(){
            location.reload();
          }, 1000);
        } else {
          alert_toast('Failed to save data. Please try again.', 'error');
        }
      }
    });
  });


	window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
</script>
<style>
	
</style>
</div>
</body>
</html>