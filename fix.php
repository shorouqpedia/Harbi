<?php
ob_start();
session_start();
$title = "maintenance";
$active = "clients";
require_once 'partials/init.php';
//if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    
    $id=$_GET['id'];
    $q=$con->prepare("SELECT * from clients WHERE id=$id");
    $q->execute(array($id));
    if ($q->rowCount() > 0) 
    {
        $client = $q->fetchAll(PDO::FETCH_ASSOC)[0];
        $KM_counter=$client['KM_counter'];
    }
    $name = $KM_counter;
    //$check=mysqli_query($con,"SELECT * from maintenance_history WHERE name='$name'");
    //$checkrows=mysqli_num_rows($check);
    if(TRUE)//($checkrows>0) 
    { 
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
        echo "لقد تمت الصيانه لهذا العداد برجاء مراجعة عداد الكيلو";
    }
}
?>

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