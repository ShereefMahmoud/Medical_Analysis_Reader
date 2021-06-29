<?php 
ob_start();
// connect with data base
require_once "conn.php"; 
//start session
session_start();

if (isset($_SESSION['id'])) {

  /* count analysis */
$sql_analysis="SELECT count(id) as total_analysis From analysis_info";
$result_analysis=mysqli_query($link,$sql_analysis);
$values_analysis=mysqli_fetch_assoc($result_analysis);
$num_rows_analysis=$values_analysis['total_analysis'];

/* count admin */
$sql_admin="SELECT count(id) as total_admin From admin";
$result_admin=mysqli_query($link,$sql_admin);
$values_admin=mysqli_fetch_assoc($result_admin);
$num_rows_admin=$values_admin['total_admin'];

/* count user */
$sql_user="SELECT count(UserId) as total_user From users";
$result_user=mysqli_query($link,$sql_user);
$values_user=mysqli_fetch_assoc($result_user);
$num_rows_user=$values_user['total_user'];

/* count feedback */
$sql_feedback="SELECT count(FeedbackId) as total_feedback From feedbacks";
$result_feedback=mysqli_query($link,$sql_feedback);
$values_feedback=mysqli_fetch_assoc($result_feedback);
$num_rows_feedback=$values_feedback['total_feedback']; 
  ?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="icon/bootstrap-icons.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name Of User', 'Num Of Scan'],
          <?php
           $sql="SELECT * From users ";
          if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)){
          echo"['".$row['email']."', ".$row['num_of_scan']."],";

        }
      }
    }
    ?>
          ]);

        var options = {
          title: 'Number Of Scan To Users',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
          ['Name Of Analysis', 'Total Analysis'],
          
          ['Analysis',    <?php echo $num_rows_analysis; ?>],
          ['Admins',      <?php echo $num_rows_admin; ?>],
          ['Users',  <?php echo $num_rows_user; ?>],
          ['Feedback', <?php echo $num_rows_feedback; ?>]
          
        ]);

        var options = {
          chart: {
            title: 'Medical Analysis',
            subtitle: 'Name Of Analysis, Total Analysis',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body class="background">
   <main>
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
  	<div class="sidebar_logo">
    <img src="image/logo.png">
    <br>
    <h5> Welcome Mr  <?php echo $_SESSION['user_name']; ?></h5>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white " ><i class="bi bi-speedometer"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a href="analysis.php" class="nav-link text-white " ><i class="bi bi-graph-up"></i> Manage Analysis </a>
      </li>
      <li class="nav-item">
        <a href="admin.php" class="nav-link text-white "><i class="bi bi-people-fill"></i> Manage Admins </a>
      </li>
      <li class="nav-item">
        <a href="user.php" class="nav-link text-white "><i class="bi bi-people-fill"></i> Manage Users</a>
      </li>
      <li class="nav-item">
        <a href="feedback.php" class="nav-link text-white "><i class="bi bi-chat-right-text-fill"></i> Manage Feedbacks </a>
      </li>
    </ul>
    <hr>

    <ul class="navbar_bottom">
        <li class="nav-item">
         <a href='edit-profile.php' class='nav-link text-white'><i class='bi bi-person-circle'></i> Profile</a>
        </li>
        <li class="nav-item">
        <a href="logout.php" class="nav-link text-white"><i class="bi bi-box-arrow-right"></i> Log Out </a>
        </li>
      </ul>
      <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</main>
<div>
  <?php
}else{
  header("Location:error-security.php");
}
  ?>