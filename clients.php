<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "clients";
require_once 'partials/init.php';
if(isset($_POST['balance']))
{
  
}
if(isset($_GET['id']))
{
    if (isset($_GET['id']) && !isset($_GET['balance']))
    {
        $id = filter_var(intval($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        $query = $con->prepare("SELECT * FROM clients WHERE id=?");
        $query->execute(array($id));
        
        if ($query->rowCount() > 0) 
        {
            $client = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            ?>
            <div class="container pb-5">
                <div class="row">
                    <div class="card col-12">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($client as $key=>$value) {
                                if (in_array(strtolower($key),['balance'])) {
                                    continue;
                                }
                                ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 font-weight-bold">
                                            <?php echo ucfirst($key);?>
                                        </div>
                                        <div class="col-8">
                                            <?php echo $value;?>
                                        </div>
                                    </div>
                                </li>
                            <?php }?>
                            <li class="list-group-item">
                              <div class="row">
                                <div class="col-4 font-weight-bold">
                                  <p style="text-shadow: 0 0 20px purple;color:purple;margin-bottom: 0px;"><?php echo "الرصيـــد" ;?></p>
                                </div>
                                <div class="col-8">
                                  <a href="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id?>&balance=1"><?php echo $client['balance'] ?> </a>
                                </div>
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="form-control btn btn-success" style="margin-top:10px;" href="edit.php?id=<?php echo $id; ?>">تعديـل البيـانـات</a>
                
                <form action="maintain.php" method="GET">
                <input type="text" hidden="TRUE" name="cid" value="<?php echo $id; ?>">

                <button type="submit" class="form-control btn btn-success" style="margin-top:10px;height: 38px;">سجـل الصيــانات</button>
            </div>

        <?php 
        } 
        else 
        {
            header("Location: clients.php");
            exit();
        }
    }
    else if (isset($_GET['id']) && isset($_GET['balance']))
    {?>
      <div class="container pt-3 reg-form">
        <form class="col-12 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
              id="balance" name="balance" enctype="multipart/form-data">
          <pre style='color:red'>* اضف المبلغ بالسالب ليكون العميل مدين </pre>
          <div class="form-group">
            <label for="balance" class="control-label">أضف الى الرصيد</label>
            <input required id="balance" name="balance" type="number" class="form-control" placeholder="0.00" value="0.00">
          </div>
          <div class="form-group mb-5">
            <input type="submit" class="form-control btn btn-success" value="تأكيـــد">
          </div>

        </form>
      </div>
    <?PHP }
}
    else
    {?>
      <div class="container d-flex align-items-end flex-column " >
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type=text name="qid" placeholder="Search by customer ID">
        </form>
      </div>
      <!-- <div class="container d-flex align-items-end flex-column " >
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type=text name="qlicense" placeholder="Search by license no">
        </form>
      </div>  -->
      <?php 
    
        if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['qid']))
        {
          $q=$_POST['qid'];
          $query = $con->prepare("SELECT * FROM clients WHERE id=$q");
        }
        else if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['qlicense']))
        {
          $q=$_POST['qlicense'];
          $query = $con->prepare("SELECT * FROM clients WHERE license_no=$q");
        }
        else  
        {
            $query = $con->prepare("SELECT * FROM clients");
            ?><h2 class="text-center">All clients</h2><?php

        }
        $query->execute(array());
        if ($query->rowCount() > 0) { ?>
            <div class="container ">
                <div class="row py-2">
                    <?php
                    $clients = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-12 py-5 d-flex align-items-center">   
                        <div class="card " style="width:69rem;">
                              <ul class="list-group ">
                              <?php foreach ($clients as $client) { ?>
                                <li class="lead font-weight-bold list-group-item">
                                      <div class="row no-gutters justify-content-between">
                                                                              
                                         <div> <?php echo $client['id']; ?> <a href="clients.php?id=<?php
                                          echo $client['id']; ?> " style=' padding-left: 25px;'>
                                              <?php echo $client['name']; ?>
                                          </a></div>

                                          <div>
                                              <?php echo $client['brand']; ?>
                                          </div>
                                         

                                      </div>
                                </li>
                              <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        else { ?>
            <div class="container py-5 mb-5 text-center">
                <div class="alert alert-warning py-1">
                    <h2 class="h1 pb-5">No clients Registered</h2>
                </div>
            </div>

            <?php  
        }

    }
    
ob_end_flush();
?>