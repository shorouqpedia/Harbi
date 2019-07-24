<?php
ob_start();
session_start();
$title = "maintenance";
$active = "clients";
require_once 'partials/init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $id = filter_var(intval($_POST['id']), FILTER_SANITIZE_NUMBER_INT); 
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);        
    $query = $con->prepare("INSERT INTO `maintenance_history` (`cid`,`name`) VALUES (?,?)");
    $query->execute(array($id,$name));
    if ($query->rowCount() > 0) 
    {
        ?><h3>Successfull</h3><?php                
        header('Location:maintain.php?cid='.$id);
        exit();
    }
}
else { ?>
    <div class="container pt-3 reg-form align-items-center">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="registerForm" name="registerForm" enctype="multipart/form-data">

            <?php 
            $id=$_GET['id'];
            ?>
            <div class="form-group">
                <label for='name' class="control-label">
                    Name
                </label>
                <input data-check="[^A-Za-z ]" id=name name=name type="text" class="form-control" placeholder="maintenance name">
            </div>
            <input hidden="TRUE" type="number" name="id" value=<?php echo $id ?> >
            <?php 
            }?>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="Submit">
            </div>

        </form>
    </div>

    <script src="validation.js"></script>
	<script>
		document.body.onload = function () {
			var selectBox = $("#countrySelect");
			selectBox.on('change', function () {
				if ($(this).val() === 'egypt') {
					$("#state").removeClass('d-none');
				} else {
					$('#state').addClass('d-none');
				}
			});
		}
	</script>
    <?php

ob_end_flush();
?>