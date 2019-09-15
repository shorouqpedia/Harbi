<?php
ob_start();
session_start();
$title = "maintenance";
$active = "clients";
require_once 'partials/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $name=$_POST['km'];
    $id=$_POST['id'];
    $query = $con->prepare("INSERT INTO `maintenance_history` (`cid`,`name`) VALUES ($id,$name)");
    $query->execute(array($id,$name));
    if ($query->rowCount() > 0)
    {
        ?><h3>Successfull</h3><?php                
        header('Location:maintain.php?cid='.$id);
        exit();
    }
}
else
{   
    $id=$_GET['id'];
?>
    <div class="container pt-3 reg-form">
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="maintain" name="maintain" enctype="multipart/form-data">
            <div class="form-group">
                <label for="km" class="control-label"> current KM counter </label>
                <input id='km' name='km' type="number" class="form-control" placeholder='eg: 1000' ">
            </div>
            <input hidden="TRUE" type="number" name="id" value=<?php echo $id ?> >
            <?php 
            ?>
            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value='تم'>
            </div>
        </form>
    </div>
<?php }?> 

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