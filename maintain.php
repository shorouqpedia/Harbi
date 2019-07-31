<?php
ob_start();
session_start();
$title = "maintenance";
$active = "maintenance";
require_once 'partials/init.php';

    if (isset($_GET['id']))
    {
        $id = filter_var(intval($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        $query = $con->prepare("SELECT * FROM maintenance_history WHERE id=?");
        $query->execute(array($id));
        
        if ($query->rowCount() > 0) 
        { 
            $maintenance = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            if(empty($maintenance['details']))
            {?>
                <div class="container py-5 mb-5 text-center">
                    <div class="alert alert-warning py-1">
                        <h2 class="h1 pb-5">there's no maintaining yet please add</h2>
                    </div>
                    <a class="form-control btn btn-success" href="maintenance.php?id=<?php echo $maintenance['id']?>">
                                أضــف صيـانات 
                            </a>

                </div>
            <?php
            }
            else{
            ?>
            <h4 class="text-center">
                صيانات بتاريخ <?php echo $maintenance['date'] ?></h4>
            <div class="container ">
                <div class="row py-2">
                    <?php
                    $x=explode(',', $maintenance['details'] );
                    ?>
                    <div class="col-12 py-5 d-flex align-items-center">     
                        <div class="card " style="width:69rem;">
                            <ul class="list-group ">
                            <?php for ($i=0;$i<count($x);$i++) { ?>
                                <li class="lead font-weight-bold list-group-item">
                                    <div class="row no-gutters justify-content-between">        
                                        <div>
                                            <?php
                                            echo ($i+1).': ';

                                            echo $x[$i];
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                            <a class="form-control btn btn-success" href="maintenance.php?id=<?php echo $maintenance['id']?>">
                                أضــف صيـانات أخرى
                            </a>

            </div>
        <?php 
        }} 
        else 
        {
            header("Location: clients.php");
            exit();
        }
    }
    else if($_GET['cid'])
    {
        $id=$_GET['cid'];

        ?>


        <?php
        {
            $query = $con->prepare("SELECT * FROM maintenance_history WHERE `cid`=$id ");
            ?><h2 class="text-center">History of All Maintenace</h2><?php
        }
        $query->execute(array());

        if ($query->rowCount() > 0) { ?>
            <div class="container ">
                <div class="row py-2">
                    <?php
                    $maintainings = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-12 py-5 d-flex align-items-center">
                        <div class="card " style="width:69rem;">
                            <ul class="list-group ">
                                <?php foreach ($maintainings as $maintaining) {
                                    $m_id=$maintaining['id'];
                                 ?>
                                    <li class="lead font-weight-bold list-group-item">
                                        <div class="row no-gutters justify-content-between">
                                        <div>
                                            <a href='maintain.php?id=<?php echo $m_id ?>' style=' padding-left: 15px;'>
                                                <?php echo $maintaining['name']." KM" . " صيانة الـ "; ?>
                                            </a>
                                        </div>
                                        <div>
                                            <?php echo $maintaining['date']; ?>
                                        </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
        <a class="form-control btn btn-success" href="fix.php?id=<?php echo $id; ?>"> أضف الى الصيانات </a>
            </div>
        <?php }
        else 
        { ?>
            <div class="container py-5 mb-5 text-center">
                <div class="alert alert-warning py-1">
                    <h2 class="h1 pb-5">No maintainings yet</h2>
                </div>
                <a class="form-control btn btn-success" href="fix.php?id=<?php echo $id; ?>"> أضف الى الصيانات </a>

            </div>
            <?php  
        }
    }
    else
    {
        header('localhost/clients.php');
        exit();
    }
    
ob_end_flush();
?>