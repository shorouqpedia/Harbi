<?php
ob_start();
session_start();
$title = "maintenance";
$active = "clients";
require_once 'partials/init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $details='';
    $id = filter_var(intval($_POST['id']), FILTER_SANITIZE_NUMBER_INT); 
    for ($i=1;$i<6;$i++)
    {
        $n='name'.$i;
        $name = filter_var($_POST[$n], FILTER_SANITIZE_STRING);        
        if (!empty($name))
        {
            $details=$details.','.$name;
        }
        else
        {
            continue;
        }
    }
    if($details[0]==',')
        $details[0]='';
    if($details[count($details)-1])
        $details[count($details)-1]='';
    if(trim($details)=='')
    {
        header('Location:clients.php');
        ?> <h3>برجاء ادخال الصيانات</h3><?php 
        exit();
    }
    else
    {
        $q = $con->prepare("SELECT * FROM maintenance_history WHERE id=$id");
        $q->execute(array($id));
        
        if ($q->rowCount() > 0) 
        { 
            $maintenance = $q->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        
        $details=$maintenance['details'].','.$details;
        if($details[0]==',')
            $details[0]='';
        if($details[count($details)-1])
            $details[count($details)-1]='';

        $query = $con->prepare("UPDATE `maintenance_history` SET `details`='$details' WHERE id=$id ");
        $query->execute(array($details));
        if ($query->rowCount() > 0) 
        {
            ?><h3>Successfull</h3><?php                
            header('Location:maintain.php?id='.$maintenance['id']);
            exit();
        }
    }
}
else { ?>
    <div class="container pt-3 reg-form">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="registerForm" name="registerForm" enctype="multipart/form-data">

            <?php 
            $id=$_GET['id'];
            for ($i=1;$i<6;$i++)
            {
            $name='name'.$i;
            ?>
            <div class="form-group">
                <label for=<?php echo $name;?> class="control-label">
                    <?php echo $i.': ';?> </label>
                <input data-check="[^A-Za-z ]" id=<?php echo $name;?> name=<?php echo $name;?> type="text" class="form-control" placeholder="maintenance <?php echo $i;?> ">
            </div>
            <input hidden="TRUE" type="number" name="id" value=<?php echo $id ?> >
            <?php 
            }?>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="أضف الى الصيانات">
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