<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "Clients";
require_once 'partials/init.php';
    if (isset($_GET['id']))
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
                          <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-4 font-weight-bold">
                                          ID
                                        </div>
                                        <div class="col-8">
                                            <?php echo $id;?>
                                        </div>
                                    </div>
                                </li>
                            <?php foreach ($client as $key=>$value) {
                                if (in_array(strtolower($key),['id', 'image'])) {
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
                        </ul>
                    </div>
                <a class="btn btn-success px-5 d-inline-block my-3 mx-auto" href="edit.php?id=<?php echo $id; ?>">Edit</a>
                </div>
            </div>

        <?php 
        } 
        else 
        {
            header("Location: clients.php");
            exit();
        }
    }

    else
    {?>
      <div class="container d-flex align-items-end flex-column " >
        <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <input type=text name="q" placeholder="Search">
        </form>
      </div>
      <?php
      
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
          $q=$_POST['q'];
          $query = $con->prepare("SELECT * FROM clients WHERE id=$q");
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