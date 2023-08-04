<!DOCTYPE html>
<html>
<head>
  <title>Hotel Manager Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="admin.css">
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
      <li><a href="check_in.php"><i class="fas fa-sign-in-alt"></i> Check-In/Check-Out</a></li>
      <li><a href="category.php"><i class="fas fa-list"></i> Room Category List</a></li>
      <li><a href="site_settings.php"><i class="fas fa-cogs"></i> Site Settings</a></li>
    </ul>
  </div>
  <!-- Main Content -->
  <div class="content">
    <div class="box">
      <h2>Total Staffs</h2>
      <p class="number">100</p>
    </div>
    <div class="box">
      <h2>Annual Revenue</h2>
      <p class="currency">$1,000,000</p>
    </div>
    <div class="box">
      <h2>Occupancy Rate</h2>
      <p class="percentage">78%</p>
      <p class="description">The current occupancy rate of the hotel. Keep an eye on it for better resource management.</p>
    </div>
    <div class="box">
      <h2>Guest Feedback</h2>
      <p class="rating">4.5/5</p>
      <p class="description">Based on the latest guest feedback, the hotel is rated 4.5 out of 5. Continuously improve to achieve excellence.</p>
    </div>
  </div>
</body>

<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
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
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>	
</html>
