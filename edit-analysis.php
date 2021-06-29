<?php include "header.php" ; ?>

<?php 

    if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:analysis.php");
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `analysis_info`  WHERE `id`='$id' LIMIT 1 ";
    $result = mysqli_query($link,$sql);
    $check = mysqli_num_rows($result);
    if(!$check)
    {
        header("Location:analysis.php");
    }
    $row = mysqli_fetch_assoc($result);

?>

<div class="admin-page" id="add">
			<h1>Update Analysis</h1>
			<div class="add_admin" style="height: 73vh; padding-top: 30px;">
					<form action="update-analysis.php" method="POST" >
                    <img src="image/analysis.png" style="background-color:rgba(198, 231, 248, 0.7); width: 150px; height: 150px; border-radius: 50%; margin-left: 35%;margin-top: -10px; margin-bottom: 20px;"/>

					<div class="input-group mb-3" >
  						<span class="input-group-text" id="inputGroup-sizing-default">Name Of Analysis</span>
  						<input placeholder="Enter The name Of Analysis From 3 : 20 Chars" type="text" name="analysisName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['name'] ?>" >
					</div>

					<div class="input-group mb-3" >
  						<span class="input-group-text">URL Of Analysis</span>
  						<input placeholder="Enter The Type Of Analysis From 3 : 20 Chars" type="text" name="analysisUrl" class="form-control"  value="<?php echo $row['url'] ?>">
					</div>

					<div class="input-group" style="height:140px">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Enter The Type Of Analysis From 15 : 150 Chars"><?php echo $row['details']  ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
					<button type="submit" name="submit" class="btn btn-primary" id="btn-save">Update</button>
					<a href="analysis.php"><button type="button" name="cancel" class="btn btn-danger" id="btn-cancel">Back</button></a>

					</form>

			</div>
	</div>

<?php include "footer.php" ; ?>