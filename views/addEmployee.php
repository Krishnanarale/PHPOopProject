<?php $title = "Add Employee";
include '../views/commonFiles/header.php'; ?>
<!-- Page start here -->
<div>
	<div class="panel panel-primary">
		<div class="panel-heading">Add Employee</div>
		<div class="panel-body">
			<form id="employeeForm" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="firstName">First Name:</label>
					<input type="text" class="form-control" id="firstName" name="firstName">
				</div>
				<div class="form-group">
					<label for="lastName">Last Name:</label>
					<input type="text" class="form-control" id="lastName" name="lastName">
				</div>
				<div class="form-group">
					<label for="gender">Gender:</label>
					<div class="radio radio-inline">
						<label class="radio-inline"><input type="radio" id="gender" name="gender" value="male">Male</label>
						<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
					</div>
				</div>
				<div class="form-group">
					<label for="dateOfBirth">Date Of Birth:</label>
					<input type="text" class="form-control wid" id="dateOfBirth" name="dateOfBirth" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="phone">Phone Number:</label>
					<input type="text" class="form-control" id="phone" name="phone">
				</div>
				<div class="form-group">
					<label for="languages">Language:</label>
					<div class="checkbox checkbox-inline">
						<label class="checkbox-inline"><input type="checkbox" value="C" id="languages" name="languages[]">C</label>
						<label class="checkbox-inline"><input type="checkbox" value="PHP" name="languages[]">PHP</label>
						<label class="checkbox-inline"><input type="checkbox" value="JavaScript" name="languages[]">JavaScript</label>
					</div>
				</div>
				<div class="form-group">
					<label for="photo">Photo:</label>
					<input type="file" class="form-control wid" id="photo" name="photo">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>	
		</div>
	</div>
</div>
<!-- Page stop here -->
<!-- JavaScript starts here -->
<script type="text/javascript">
	$(document).ready(function () {
		$("ul li").removeClass('active');
		$("ul li:nth-child(2)").addClass('active');
		$("#dateOfBirth").datepicker({
			changeMonth: true,
      		changeYear: true,
      		dateFormat: 'yy-mm-dd'
		});
		$('#employeeForm').submit(function (e) {
			e.preventDefault(); 
			let formData = new FormData(this);
			$.ajax({
				url: '../controller/Employees.php',
				data: formData,
				type: 'POST',
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function(res){
					if (res.status == 'success') {
						window.location.replace("../index.php");
					}
				},
				error: function(err){
					console.log(err);
				}
			});
		});
	});
</script>
<!-- JavaScript ends here -->
<?php include '../views/commonFiles/footer.php'; ?>