<?php
ob_start();
session_start();
$title = "Register";
$active = "register";
require_once 'partials/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        
        $license_no = filter_var($_POST['license_no'], FILTER_SANITIZE_STRING);
    
        if (!checkDB('client', 'license_no', $license_no)) 
        {   

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $phone = filter_var(intval($_POST['phone']), FILTER_SANITIZE_NUMBER_INT);        
            $license_no = filter_var($_POST['license_no'], FILTER_SANITIZE_STRING);
            $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
            $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
            $chassis_no = filter_var($_POST['chassis_no'], FILTER_SANITIZE_STRING);
            $license_name = filter_var($_POST['license_name'], FILTER_SANITIZE_STRING);
            $KM_counter=filter_var($_POST['KM_counter'],FILTER_SANITIZE_STRING);


            $query = $con->prepare("INSERT INTO `client`(`name`, `phone_no`, `license_no`, `brand`, `year`, `chassis_no`, `license_name`, `KM_counter`) VALUES (?,?,?,?,?,?,?,?)");

            $query->execute(array($name, $phone, $license_no, $brand, $year, $chassis_no ,
                $license_name, $KM_counter));

            if ($query->rowCount() > 0) 
            {
                ?> <h3>Successfull</h3><?php                
                header('Location:client.php');
                exit();
            }
        }
        else 
            ?> <h3>already exist</h3><?php 
}
else { ?>
    <div class="container pt-3 reg-form">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="registerForm" name="registerForm" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input required data-check="[^A-Za-z ]" id="name" name="name" type="text" class="form-control" placeholder="client Name">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">Phone</label>
                <input required data-check="[^0-9\\+]" type="text" id="phone" placeholder="01xxxxxxxxx" name="phone" class="form-control">
            </div>

            
             <div class="form-group">
                <label for="license_no" class="control-label">License number</label>
                <input required name="license_no" type="text" class="form-control" placeholder="رقم اللوحات">
            </div>
            
             <div class="form-group">
                <label for="brand" class="control-label">Brand</label>
                <input required name="brand" type="text" class="form-control" placeholder="eg: Benneli caffenero sport">
            </div>
            
            <div class="form-group">
                <label for="year" class="control-label">year</label>
                <input required name="year" type="number" class="form-control" placeholder="eg: 2018" value="2018">
            </div>
             
             <div class="form-group">
                <label for="chassis_no" class="control-label">chassis Number</label>
                <input required name="chassis_no" type="text" class="form-control" placeholder="رقم الشاسيـــه">
            </div>
            

            <div class="form-group">
                <label for="license_name" class="control-label">License Name</label>
                <input required name="license_name" type="text" class="form-control" placeholder="License Name">
            </div>

            <div class="form-group">
                <label for="KM_counter" class="control-label">KM_counter</label>
                <input required name="KM_counter" type="number" class="form-control" placeholder="eg:1200">
            </div>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="Sign Up">
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