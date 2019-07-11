<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "Clients";
require_once 'partials/init.php';
    if (false) //(isset($_GET['action']) && $_GET['action'] === 'client') 
    {
        $license_no = filter_var(intval($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        $query = $con->prepare("SELECT * FROM clients WHERE license_no=?");
        $query->execute(array($license_no));
        
        if ($query->rowCount() > 0) 
        {
            $client = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            ?>
            <div class="container pb-5">
                <div class="row">
                    <div class="card col-12">
                        <div class="row justify-content-center align-items-center no-gutters">
                            <img src="<?php echo $client['image'];?>" class="border-dark border rounded-circle my-3 card-img-top" style="max-width:18rem;" alt="client Image">
                        </div>
                        <ul class="list-group list-group-flush">
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
    {
        
        {
            $query = $con->prepare("SELECT * FROM client");
        }
        $query->execute(array());
        if ($query->rowCount() > 0) { ?>


            <center>
                <h2>All clients</h2>
            </center> 
        
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
                                         

                                          <a href="http://localhost/harbi/search.php?action=client&id=<?php 
                                          echo $client['license_no']; ?> ">

                                              <?php echo $client['name']; ?>
                                          </a>

                                          <div>
                                              <?php echo $client['brand']; ?>
                                          </div>
                                         
                                          <div>
                                              <?php echo $client['year']; ?>
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