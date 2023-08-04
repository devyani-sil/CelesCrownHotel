<?php 
include('db.php');
	$rid = $_GET['rid'];
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$qry = $conn->query("SELECT * FROM checked where id =".$id);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k]=$v;
		}
	}
	$calc_days = abs(strtotime($meta['date_out']) - strtotime($meta['date_in'])) ; 
 $calc_days =floor($calc_days / (60*60*24)  );
 $cat = $conn->query("SELECT * FROM room_category");
$cat_arr = array();
while($row = $cat->fetch_assoc()){
	$cat_arr[$row['id']] = $row;
}
}
?>
<div class="container-fluid">
	
	<form action="save_check_in.php" id="checkInForm">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<?php if(isset($_GET['id'])):
			$rooms = $con->query("SELECT * FROM room_no where status =0 or id = $rid order by id asc");
		 ?>

		<div class="form-group">
			<label for="name">Room</label>
			<select name="rid" id="" class="custom-select browser-default">
				
				<?php while($row=$rooms->fetch_assoc()): ?>
				<option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $rid ? "selected": '' ?>><?php echo $row['room'] . " | ". ($cat_arr[$row['category_id']]['name']) ?></option>
				<?php endwhile; ?>
			</select>
			
		</div>

		<?php else: ?>
		<input type="hidden" name="rid" value="<?php echo isset($_GET['rid']) ? $_GET['rid']: '' ?>">
		<?php endif; ?>


		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="contact_no">Contact #</label>
			<input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo isset($meta['contact_no']) ? $meta['contact_no']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="date_in">Check-in Date</label>
			<input type="date" name="date_in" id="date_in" class="form-control" value="<?php echo isset($meta['date_in']) ? date("Y-m-d",strtotime($meta['date_in'])): date("Y-m-d") ?>" required>
		</div>
		<div class="form-group">
			<label for="date_in_time">Check-in Date</label>
			<input type="time" name="date_in_time" id="date_in_time" class="form-control" value="<?php echo isset($meta['date_in']) ? date("H:i",strtotime($meta['date_in'])): date("H:i") ?>" required>
		</div>
		<div class="form-group">
			<label for="days">Days of Stay</label>
			<input type="number" min ="1" name="days" id="days" class="form-control" value="<?php echo isset($meta['date_in']) ? $calc_days: 1 ?>" required>
		</div>
	</form>
</div>