<?php
ob_start();
session_start();
$title = "Notes";
$active = "clients";
require_once 'partials/init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $id = filter_var(intval($_POST['id']), FILTER_SANITIZE_NUMBER_INT); 
    $note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);
    if(trim($note)=='')
    {
        header('Location:clients.php');
        ?> <h3>برجاء ادخال الملاحظات</h3><?php
        exit();
    }
    else
    {
        $query = $con->prepare('INSERT INTO notes (cid, note) VALUES(?,?)');
        $query->execute(array(
        $id,
        $note
        ));

	$redirect_url = str_replace('addnote', 'clients', $_SERVER['PHP_SELF']) . "?id=" . $id; 
        header("location:" . $redirect_url);        
    }
}
else { ?>
    <div class="container pt-3 reg-form">
        
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="addNote" name="addNote" enctype="multipart/form-data">

            <?php 
            $id=$_GET['id'];
            {
            $name='note';
            ?>
            <div class="form-group">
                <label for=<?php echo $name;?> class="control-label">1 : </label>
                <input data-check="[^A-Za-z ]" id=<?php echo $name;?> name=<?php echo $name;?> type="text" class="form-control" placeholder="Note">
            </div>
            <input hidden="TRUE" type="number" name="id" value=<?php echo $id ?> >
            <?php 
            }?>

            <div class="form-group mb-5">
                <input type="submit" class="form-control btn btn-success" value="أضف الى الملاحظات">
            </div>

        </form>
    </div>

    <script src="validation.js"></script>
	
    <?php
}
ob_end_flush();
?>
