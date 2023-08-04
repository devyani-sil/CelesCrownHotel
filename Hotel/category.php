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
    <?php include('db.php');?>
    <div class="container-fluid " >
	
	<div class="col-lg-12">
	<div class="row justify-content-center">


<!-- Table Panel -->
<div class="col-md-8">
<form action="" id="manage-category">
<div class="card">
<div class="card-body">

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Img</th>
            <th class="text-center">Room</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
<tbody>
<?php 
// PHP code to update the room category price
if (isset($_POST['id']) && isset($_POST['price'])) {
  $id = $_POST['id'];
  $price = $_POST['price'];
  $updateQuery = "UPDATE room_category SET room = JSON_SET(room, '$.price', '$price') WHERE id = $id";
  mysqli_query($con, $updateQuery);
 
  echo "2";
  exit;
}


                    $i = 1;
                    $cats = $con->query("SELECT * FROM room_category order by id asc");
                    while($row=$cats->fetch_assoc()):
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>

                        <td class="text-center">
										<img src="<?php echo isset($row['cover_img']) ? $row['cover_img'] :'' ?>" alt="room" id="cimg">
						</td>
                        <td class="">
                            <p>Name : <b><?php echo $row['roomtype'] ?></b></p>
                            <p>Price : <b><?php echo "$".number_format($row['price'],2) ?></b></p>
                        </td>
                        <td class="text-center">
                        <button class="btn btn-sm btn-primary edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['roomtype'] ?>" data-price="<?php echo $row['price'] ?>" data-cover_img="<?php echo $row['cover_img'] ?>">Edit</button>
                            <button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>

                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Room Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="edit_id" value="" />
          <div class="form-group">
            <label for="edit_name">Room Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" required />
          </div>
          <div class="form-group">
            <label for="edit_price">Price</label>
            <input type="number" step="0.01" class="form-control" id="edit_price" name="edit_price" required />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div> 
</div>  
</div></form>  </div>  
<style>
	img#cimg,.cimg{
		max-height: 12vh;
		max-width: 8vw;
	}
	td{
		vertical-align: middle !important;
	}
</style>

<!-- Existing HTML code... -->

<script>
  function deleteCategory(id) {
    var confirmation = confirm("Do you really want to delete this room category?");
    if (confirmation) {
      $.ajax({
        url: 'delete_category.php', 
        method: 'POST',
        data: { id: id },
        success: function(response) {
          if (response == 1) {
            location.reload();
          } else {
            alert("Failed to delete room category. Please try again.");
          }
        }
      });
    }
  }

  $(document).on('click', '.delete_cat', function() {
    var id = $(this).data('id');
    deleteCategory(id);
  });

  function editCategory(id, name, price) {
    $('#edit_id').val(id);
    $('#edit_name').val(name);
    $('#edit_price').val(price);
    $('#editModal').modal('show');
  }
  function saveChanges() {
    var id = $('#edit_id').val();
    var name = $('#edit_name').val();
    var price = $('#edit_price').val();

    $.ajax({
      url: 'save_changes.php', 
      method: 'POST',
      data: { id: id, name: name, price: price },
      success: function(response) {
        if (response == 1) {
          location.reload();
        } else {
          alert("Failed to save changes. Please try again.");
        }
      }
    });
  }

  $(document).on('click', '.edit_cat', function() {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var price = $(this).data('price');
    editCategory(id, name, price);
  });
</script>				
</body>
</html>

