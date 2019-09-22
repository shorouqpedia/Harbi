<?php
ob_start();
session_start();
$title = "Edit";
$active = "Edit";
require_once 'partials/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{   
            $id = filter_var(intval($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);        
            $license_no = filter_var($_POST['license_no'], FILTER_SANITIZE_STRING);
            $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
            $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            $chassis_no = filter_var($_POST['chassis_no'], FILTER_SANITIZE_STRING);
            $license_name = filter_var($_POST['license_name'], FILTER_SANITIZE_STRING);
            $KM_counter=filter_var($_POST['KM_counter'],FILTER_SANITIZE_STRING);

            $sql ="UPDATE clients SET `name`='$name' , `phone_no`='$phone' , `license_no`='$license_no' , `brand`='$brand' , `year`='$year' , `chassis_no`='$chassis_no' , `license_name`='$license_name' , `KM_counter`='$KM_counter' WHERE `id`=$id ";
            $query=$con->prepare($sql);
            $query->execute(array($id));
            if ($query->rowCount() > 0 ) 
            { 
                $adress='Location:clients.php?id='.$id;
                header($adress);
                ?> <h3>Successfull</h3><?php                
                exit();
            }
            else
            {
                echo 'there is nothing to Edit';
            }
}


if (isset($_GET['id']))
    {
        $id = filter_var(intval($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        $query = $con->prepare("SELECT * FROM clients WHERE id=?");
        $query->execute(array($id));
        
        if ($query->rowCount() > 0) 
        {
            $client = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            
        }

            ?>
    <div class="container pt-3 reg-form">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registerForm" name="registerForm" enctype="multipart/form-data">

            <div class="form-group">
                <label hidden="true" for="id" class="control-label">id</label>
                <input hidden="true" required data-check="[^A-Za-z ]" id="id" name="id" type="number" class="form-control" placeholder="client id" value="<?php echo $client['id'];?>">
            </div>

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input required data-check="[^A-Za-z ]" id="name" name="name" type="text" class="form-control" placeholder="client Name" value="<?php echo $client['name'];?>">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">Phone</label>
                <input required data-check="[^0-9\\+]" type="text" id="phone" placeholder="01xxxxxxxxx" value="<?php echo $client['phone_no'];?>" name="phone" class="form-control">
            </div>

            
             <div class="form-group">
                <label for="license_no" class="control-label">License number</label>
                <input  required name="license_no" type="text" class="form-control" value="<?php echo $client['license_no'];?>">
            </div>
            
             <div class="form-group">
                <label for="brand" class="control-label">Brand</label>
                <input required name="brand" type="text" class="form-control" value="<?php echo $client['brand'];?>">
            </div>
            
            <div class="form-group">
                <label for="year" class="control-label">year</label>
                <input required name="year" type="number" class="form-control" value="<?php echo $client['year'];?>"  value="2018">
            </div>
             
             <div class="form-group">
                <label for="chassis_no" class="control-label">chassis Number</label>
                <input required name="chassis_no" type="text" class="form-control" value="<?php echo $client['chassis_no'];?>" >
            </div>
            

            <div class="form-group">
                <label for="license_name" class="control-label">License Name</label>
                <input required name="license_name" type="text" class="form-control" value="<?php echo $client['chassis_no'];?>" >
            </div>

            <div class="form-group">
                <label for="KM_counter" class="control-label">KM_counter</label>
                <input required name="KM_counter" type="number" class="form-control" value="<?php echo $client['KM_counter'];?>">
            </div>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="تعديــل">
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
}
ob_end_flush();
?>