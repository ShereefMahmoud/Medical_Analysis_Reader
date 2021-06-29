<?php include "header.php" ; ?>

<!-- content of dashboard page -->

    <div class="content">
		<h1>Dashboard</h1>

			<a href="analysis.php"><div class="categ">
				<img src="image/analysis.png" style="background-color:rgba(0, 204, 189, 0.5);"/>
				<h1><?php echo $num_rows_analysis; ?></h1>
				<p style="color:#22948f;">Total Analysis </p>
			</div></a>

			<a href="admin.php"><div class="categ">
				<img src="image/admin.png" style="background-color:rgba(255, 255, 255, 0.5);"/>
				<h1><?php echo $num_rows_admin; ?></h1>
				<p style="color:#a3a7a9;">Total Admins </p>
			</div></a>

			<a href="user.php"><div class="categ">
				<img src="image/user.png" style="background-color:rgba(198, 231, 248,0.7);" />
				<h1><?php echo $num_rows_user; ?></h1>
				<p style="color:#c6e7f8;">Total Users </p>
			</div></a>

			<a href="feedback.php"><div class="categ">
				<img src="image/feedback.png" style="background-color:rgba(128, 128, 241, 0.5);"/>
				<h1><?php echo $num_rows_feedback; ?></h1>
				<p style="color:#5f64b1;">Total Feedbacks </p>
			</div></a>
	</div>

		<div class="charts">
	        <div id="columnchart_material" ></div>
	        <div id="donutchart" ></div>
		</div>

	

  
<?php include "footer.php"; ?>



