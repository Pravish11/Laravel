<?php 
	session_start();
	$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI']; 
	$_SESSION['workout_id']="";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{url('css/mystyle.css')}}">
	<title>Xtreme Fitness</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".coach_details").hide();
			$(".workout_details").hide();
			$(".time_label").hide();
			$(".time_slots").hide();
			$("#slot_label").hide();
			$("#dateLabel").hide();
			$('#timeLabel').hide();
			$(".date_time").hide();
			$(".requestMsg").hide();

			$("#type_select").on('change',function(){
				var cat=$(this).val();
				$(".requestMsg").hide();
				$.ajax({
					url:"getWorkout.php",
					method:"POST",
					data:{category:cat},
					error:function(xhr){
						alert(xhr.statusText);
					},
					success:function(data){
						$("#workoutNameSelect").html(data);
						$("#workoutNameSelect").prop("disabled",false);
					}
				});
				$.ajax({
					url:"getCoachName.php",
					method:"POST",
					data:{category:cat},
					error:function(xhr){
						alert(xhr.statusText);
					},
					success:function(data){
						$(".coach_select").html(data);
					}
				});
			});
			$('#workoutNameSelect').on('change',function(){
				var wid=$(this).val();
				$.ajax({
					url:"getWorkoutInformations.php",
					method:"POST",
					data:{id:wid},
					error:function(xhr){
						alert(xhr.statusText);
					},
					success:function(data){
						$(".workout_details").html(data);
						$(".workout_details").fadeIn();
						$(".coach_select").prop("disabled",false);
					}
				});
			});
			$('.coach_select').on('change',function(){
				var cid=$(this).val();
				$.ajax({
					url:"getCoachInformation.php",
					method:"POST",
					data:{email:cid},
					error:function(xhr){
						alert(xhr.statusText);
					},
					success:function(data){
						$(".coach_details").html(data);
						$(".workout_details").fadeIn();
						$(".coach_details").fadeIn();
					}
				});
				$.ajax({
					url:"getCoachPlanning.php",
					method:"POST",
					data:{email:cid},
					error:function(xhr){
						alert(xhr.statusText);
					},
					success:function(data){
						$(".available_dates").html(data);
						$(".time_btn").hide();
						$(".date_time").show();
						$(".time_label").fadeIn();
						//$(".available_dates").fadeIn();
						$("#btn1").show(700);
						$("#btn2").show(800);
						$("#btn2").show(900);
						$("#btn3").show(1000);
						$("#btn4").show(1100);
						$("#btn5").show(1200);
						$("#btn6").show(1300);
						$("#btn7").show(1400);
					}	
				});
			});
			$("#back_btn").click(function(){
				$(".time_slots").slideUp(1100);
				$("#slot_label").fadeOut(1200);
				$("button.unselect").show(1300);
				$(".clicked").addClass("unselect");
				$(".time_btn").removeClass("clicked");
				$(".time_btn").removeAttr("style");
			});
			$("#confirm_btn").click(function(){
				var wid=$("#workoutNameSelect").val();
				var cmail=$(".coach_select").val();
				var umail=$("input[name='user_mail']").val();
				var choseDate=$('.clicked').text();
				var choseTime=$(".select").parent().prev().prev().text()+"-"+$(".select").parent().prev().text()
				$.ajax({
					url:"storeBooking.php",
					method:"POST",
					data:{member_mail:umail,coach_mail:cmail,workout_id:wid,day:choseDate,time:choseTime},
					error:function(xhr)
					{
						alert(xhr.statusText);
					},
					success:function(data)
					{
						$(".date_time").slideUp(1200);
						$(".time_label").fadeOut(1400);
						$(".workout_details,.coach_details").fadeOut(1500);
						$(".coach_select").val("");
						$('#workoutNameSelect').val("");
						$(".coach_select,#workoutNameSelect").prop("disabled",true);
						$("#type_select").val("");
						$(".requestMsg").show(1600);
					}
				});

			});

		});
		function display(id)
		{
			var btnid="#btn"+id;
			var btn=$(btnid);
			var cmail="charles@gmail.com";
			var dateSelect=btn.text();
			$.ajax({
				url:"getCoachTime.php",
				method:"POST",
				data:{email:cmail,date:dateSelect},
				error:function(xhr)
				{
					alert(xhr.statusText);
				},
				success:function(data)
				{
					//alert(data);
					$(".slot_table tbody").html(data);
					btn.css({"background":"rgb(6,0,255)","color":"white"});
					btn.removeClass('unselect');
					btn.addClass("clicked");
					$('button.unselect').hide(1100);
					$("#slot_label").fadeIn(1200);
					$(".time_slots").slideDown(1300);
					$('html,body').animate({
						scrollTop:$(".time_slots").offset().top
					},1000);

				}
			});
			
		}
		function select(id)
		{
			var btnid="#slotBtn"+id;
			var btn=$(btnid);
			$(".select").text("select");
			$(".select").css("cursor","pointer");
			$(".slot_btn").removeClass("select");
			btn.addClass("select");
			btn.text("Selected");
			btn.css("cursor","default");
			$("#confirm_btn").prop("disabled",false);
		}
		function cancelBooking(id)
		{
			var cid="#cancel_btn"+id;
			var btn=$(cid);
			var w="#wid"+id;
			var wid=$(w).val();
			var c="#cid"+id;
			var cid=$(c).val();
			
		}
	</script>
	<style type="text/css">
		*{
			font-family: sans-serif;
			/*overflow-x: hidden;*/

		}
		.book_title{
			background: url(images/booking.jpg);
			background-position: center;
			background-size: cover;
			height: 800px;
			position: relative;
			margin-bottom: 10px;
		}
		.book_title h2{
			color: white;
			position: absolute;
			left: 30%;
			top: 50%;
			font-family: sans-serif;
			font-size: 30px;
		}

		.start_text{
			width: 500px;
			height: 200px;
			margin: auto;
			margin-bottom: 20px;
		}
		fieldset{
			boder: 2px solid;
			border-color: rgb(6,0,255);
			border-radius: 6px;
			margin: 20px 0;
			padding: 20px;
			min-height: 600px;
		}
		legend{
			font-weight: bold;
			color: black;
			margin: auto;
			padding: 0 20px;
			font-family: sans-serif;
			font-size: 25px;
			background: transparent;
		}	
		table{
			position: relative;
			left: 100px;
		}
		
		.form_col{
			padding-right: 200px;
		}
		.detail_col{
			padding-left: 50px;
		}
		.coach_details, .workout_details{
			display: inline-block;
		}
		label{
			font-size: 20px;
		}
		.form_col label{
			display: inline-block;
			margin-bottom: 60px;
		}
		.form_col select{
			width: 200px;
			height: 25px;
			position: relative;
			left: 10px;
			font-size: 18px;
			font-family: sans-serif;
			outline: none;
		}
		.workout_details,.coach_details{
			border: 2px solid black;
			border-radius: 6px;
			box-shadow: 5px 10px #88888888;
			margin-right: 20px ;
			height: 350px;
			padding: 10px;
		}
		.detail_col label{
			display: inline-block;
			margin-bottom: 25px ;
		}
		.detail_col input{
			font-size: 18px;
			font-family: sans-serif;
			border: none;
			outline: none;
		}
		.detail_col h3{
			text-align: center;
		}
		.detail_col a{
			font-size: 18px;
		}
		#workout_title{
			font-weight: bold;
			margin: auto;
			display: inline-block;
			margin-bottom: 10px;
		}
		.time_btn{
			width: 53px;
			height: 53px;
			font-size: 20px;
			font-weight: bold;
			color: black;
			font-family: sans-serif;
			margin-right: 90px;
			background: transparent;
			border: 2px solid rgb(6,0,255);
			border-radius: 6px;
			outline: none;	
			cursor: pointer;
			display: inline-block;

		}
		.date_time{
			border: 2px solid black;
			border-radius: 6px;
			padding: 10px 0 10px 300px;
			background: white;
			align-content: center;
		}
		
		.time_btn:hover{
			background: rgb(6, 0, 255,0.5);
			transition: 0.5s;
		}
		.slot_table{
			position: relative;
			left: 250px;
			border-spacing: 30px;
			font-size: 20px;
			font-family: sans-serif;
		}
		.slot_btn{
			height: 30px;
			width: 90px;
			background: transparent;
			border: 1px solid lightgreen;
			font-size: 18px;
			font-weight: bold;
			border-radius: 6px;
			cursor: pointer;
		}
		.slot_btn:hover{
			background: lightgreen;
		}
		.slot_btn:disabled{
			background: red;
			cursor: default;
			color: black;
		}
		.end_btn{
			height: 40px;
			width: 100px;
			font-size: 20px;
			font-weight: bold;
			border-radius: 6px;
			outline: none;
			cursor: pointer;
		}
		#confirm_btn{
			border:  2px solid green;
			display: inline-block;
			margin-left: 300px;

		}
		#confirm_btn:hover:enabled{
			background: blue;
			color: white;
		}
		#confirm_btn:disabled{
			cursor: default;
		}
		#back_btn{
			border: 2px solid black;
		}
		#back_btn:hover{
			background: black;
			color: white;
		}
		.select{
			background: lightgreen;
		}
		.status_table{
			font-size: 18px;
			position: relative;
			left: 200px;
		}
		.status_table td{
			padding-right: 30px;
			padding-left: 30px;
			padding-bottom: 10px;
			padding-top: 10px;
		}
		.status_table th{
			padding: 10px 10px;
		}
		.cancelBtn{
			outline: none;
			height: 30px;
			width: 80px;
			background: rgb(255, 0, 0);
			color: white;
			font-size: 18px;
			border-radius: 6px;
			cursor: pointer;
		}
		.status_table thead{
			background: black;
			color: white;
		}
		.status_table tr td:last-child{
			width: 350px;
		}
		.status_table tr:nth-child(even)
		{
			background: lightblue;
		}
		/*.type_select,.workout_select,.coach_select{
			position: relative;
			top: -65px;
		}
		.input_info{
			position: relative;
			top: -30px;

		}*/

	</style>
</head>
<body>
	<div class="book_title">
	<?php 
	$activemenu="";
	?>
    @include('menu');
	<h2>BOOK YOUR PERSONAL COACHING SESSION NOW!</h2>
	</div>
	<div class="start_text"><h2 style="text-align: center; font-family: sans-serif; font-size: 200%;">Do you need help?</h2>
		<p style="color:#545454; font-size: 20px; text-align: center; font-family:Helvetica;">Extreme Fitness comprises of professional coaches ready and waiting to help you achieve your goal.</p>
	</div>
	<br><br><br>
	<input type="hidden" name="user_mail" value="">
	
			<h2 style="text-align: center;">Bookings Status:</h2>
			<table class="status_table" cellspacing="0">
				<thead>
					<th>Workout Name</th>
					<th>Coach Name</th>
					<th>Date</th>
					<th>Time</th>
					<th>Status</th>
					<th>Action</th>
					<th>Coach Message</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $workouts['name']; ?> <input type="hidden" <?php echo "id=wid".$c; ?> value="<?php echo $workout_id; ?>" name=""></td>
						<td><?php echo $coach['firstname']." ".$coach['lastname']; ?><input type="hidden" <?php echo "id=cid".$c; ?> value="<?php echo $coach_mail; ?>" name=""></td>
						<td><?php echo $row['day']; ?></td>
						<td><?php echo $row['time_range']; ?></td>

							<td><span style="font-weight: bold;">Pending</span></td>
							<td><button type="button" class="cancelBtn" <?php echo "id=cancel_btn".$c; ?> onclick="cancelBooking(<?php echo $c; ?>)" >Cancel</button></td>
						
								<td><span style="color: green; font-weight: bold;">Accepted</span></td>
								<td><button type="button" class="cancelBtn" <?php echo "id=cancel_btn".$c; ?> onclick="cancelBooking(<?php echo $c; ?>)">Cancel</button></td>
							
								<td><span style="color: red; font-weight: bold;">Rejected</span></td>
								<td><button type="button" class="cancelBtn" <?php echo "id=cancel_btn".$c; ?> onclick="cancelBooking(<?php echo $c; ?>)">Remove</button></td>
						<td><?php echo $row['coach_message']; ?></td>
					</tr>
				</tbody>
			</table>
		
		<div class="booking_form">
			<fieldset>
				<legend>Bookings</legend>
				<table class="form_table">
					<tr>
						<td class="form_col">
							<label>Type of workout:</label>
							
									<select class="type_select" id="type_select"  >
									<option value="yoga" <?php if($wResult['category']=='yoga') {echo ' selected';} ?>>Yoga</option>
									<option value="body building" <?php if($wResult['category']=='body building') {echo ' selected';} ?>>Body-Building</option>
									<option value="circuit training" <?php if($wResult['category']=='circuit training') {echo ' selected'; }?>>Circuit Training</option>
									<option value="weight loss" <?php if($wResult['category']=='weight loss') {echo ' selected';} ?>>Weight Loss</option>
									<option value="body sculpturing" <?php if($wResult['category']=='body sculpturing') {echo ' selected';} ?>>Body Sculpturing</option>
									<option value="recovery" <?php if($wResult['category']=='recovery') {echo ' selected';} ?>>Recovery</option>
									<option value="all rounder" <?php if($wResult['category']=='all rounder') {echo ' selected';} ?>>All Rounder</option>
									<option value="cycling" <?php if($wResult['category']=='cycling') {echo ' selected';} ?>>Cycling</option>
									<option value="hiit" <?php if($wResult['category']=='hiit') {echo ' selected';} ?>>Hiit</option>
									<option value="cross fit" <?php if($wResult['category']=='cross fit') {echo ' selected';} ?>>Cross Fit</option>
									</select><br>
									<label>Workout Name:</label>
									<select class="workout_select" id="workoutNameSelect">
									<option value="<?php echo $wResult['workout_id']; ?>" selected><?php echo $wResult['name']; ?></option>
									</select><br>
									<label>Coach Name:</label>
									<select class="coach_select">
										<option value="" selected>Coach Name</option>
									
										<option value="<?php echo $email; ?>"><?php echo $name; ?></option>
										 </select><br> 
							
									<select class="type_select" id="type_select"  >
										<option value="" selected>Choose a type</option>
										<option value="yoga">Yoga</option>
										<option value="body building">Body-Building</option>
										<option value="circuit training">Circuit Training</option>
										<option value="weight loss">Weight Loss</option>
										<option value="body sculpturing">Body Sculpturing</option>
										<option value="recovery">Recovery</option>
										<option value="all rounder">All Rounder</option>
										<option value="cycling">Cycling</option>
										<option value="hiit">Hiit</option>
										<option value="cross fit">Cross Fit</option>
									</select><br>
									<label>Workout Name:</label>
									<select class="workout_select" id="workoutNameSelect" disabled>
									<option value="" selected>Workout Name</option>
									</select><br>
									<label>Coach Name:</label>
									<select class="coach_select" disabled>
										<option value="" selected>Coach Name</option>
									</select><br>
								

							<label>Workout Name:</label>
							<select class="workout_select" id="workoutNameSelect" disabled>
								<option value="" selected>Workout Name</option>
							</select><br>

							<label>Coach Name:</label>
							<select class="coach_select" disabled>
								<option value="" selected>Coach Name</option>
							</select><br> -->
						</td>
						<td class="detail_col">
							<div class="workout_details">
								<h3>Workout Informations:</h3>
								<label>Name:</label>
								<input class='input_info' type="text" name="" value="<?php echo $wResult['name']; ?>"><br>
								<label>Category:</label>
								<input class='input_info' style='text-transform: capitalize;' type="text" value="<?php echo $wResult['category']; ?>" name=""><br>
								<label>By Coach:</label>
								<input class='input_info' type="" value="<?php echo $cname; ?>" name=""><br>
								<label>Likes:</label>
								<input class='input_info' type="" value="<?php echo $wResult['likes']; ?>" name=""><br>
								<?php $_SESSION['workout_id']=$wResult['workout_id']; ?>
								<a href="workout.php?referer=bookings">More Details</a>
							</div>
							<div class="coach_details">
								<h3>Coach Informations:</h3>
								<label>Name:</label>
								<input class='input_info' type="" value="Kevin Moonesawmy" name=""><br>
								<label>Speciality:</label>
								<input class='input_info' type="" value="Body-Building" name=""><br>
								<label>Gender:</label>
								<input class='input_info' type="" value="Male" name=""><br>
								<label>Tel No:</label>
								<input class='input_info' type="" value="51234567" name=""><br>
								<a href="trainers.php">Know more about our coaches</a>
							</div>
						</td>
					</tr>
				</table>
				<div class="requestMsg">
				<h3 style='text-align: center;' id="sentMsg">Booking Request Sent! Our coach will give a response a soon as possible.<br>Please refresh the page to see booking status.</h3>
				<a href="bookings.php" style="position: relative; left: 48%; font-size:20px" id="refresh">Refresh</a>
				</div>
				<h2 class="time_label" style="text-align: center;">Choose your date and time:</h2>
				<h3 class="time_label" style="text-align: center;">(Weekly Schedule)</h3>
				<div class="date_time">

					<div class="available_dates">
					</div>
					<label id="slot_label" style="font-weight: bold; position: relative; left:275px; top: -40px;font-size: 23px;">Choose your time slot(s)</label>
					<div class="time_slots">
						<table class="slot_table">
							<thead>
								<th>FROM</th>
								<th>TO</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn" disabled>Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
								<tr>
									<td>09:00</td><td>10:00</td><td><button type="button" class="slot_btn">Select</button></td>
								</tr>
							</tbody>
						</table>
						<button type="button" class="end_btn" id="confirm_btn" disabled>Request</button>
						<button type="button" class="end_btn" id="back_btn">Back</button>
						<p style="font-size: 18px;"><span style="font-weight: bold; color:red;">NOTE:</span>Our trainers reserve the right to refuse your booking request depending on lunch times and number of already booked sessions pertaining to your selected day.</p>
					</div>
				</div>
				
			</fieldset>
		</div>
</body>
</html>