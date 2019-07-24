<?php
ob_start();
session_start();
$title = "Add items";
$active = "add items";
require_once 'partials/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{    
        //if (!checkDB('clients', 'license_no', $license_no)) 
        {   

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
            $quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_STRING);


            $query = $con->prepare("INSERT INTO `items`(`name`, `price`, `quantity`) VALUES (?,?,?)");

            $query->execute(array($name, $price, $quantity));

            if ($query->rowCount() > 0) 
            {
                ?> <h3>Successfull</h3><?php                
                header('Location:client.php');
                exit();
            }
        }
}
else { ?>
    <div class="container pt-3 reg-form">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="registerForm" name="registerForm" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name" class="control-label">Item Name</label>
                <input required data-check="[^A-Za-z ]" id="name" name="name" type="text" class="form-control" placeholder="Item Name">
            </div>

            
            <div class="form-group">
                <label for="price" class="control-label">Price per one piece</label>
                <input required id="price" name="price" type="number" class="form-control" placeholder="eg: 100LE" >
            </div>

            <div class="form-group">
                <label for="quantity" class="control-label">Quantity</label>
                <input required id="quantity" name="quantity" type="number" class="form-control" placeholder="eg:10 pieces">
            </div>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="Add To Items">
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