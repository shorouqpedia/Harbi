<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "Clients";
require_once 'partials/init.php';

        $license_no = filter_var(intval($_GET['id']), FILTER_SANITIZE_NUMBER_INT);
        echo $license_no;
        $query = $con->prepare("SELECT * FROM client WHERE license_no=?");
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



ob_end_flush();
?>