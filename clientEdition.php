<!-- table -->
<!-- 
  <div class="container ">
            <?php  $clients = $query->fetchAll(PDO::FETCH_ASSOC);?>

              <div class="table-responsive-xl">
                <table style="text-align:center" dir="rtl" class="table table-hover table-bordered">
                <?php
                    $products = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                  <thead>
                  <tr>
                    <th scope="col" style="width: 5%;">رقم العميل</th>
                    <th scope="col" style="width: 15%;"> اسم العميل </th>
                    <th scope="col" style="width: 35%;"> الاسكوتر </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($clients as $client) {?>
                      <tr>
                          <th scope="row"><?php echo $client['id'];?></th>
                          <td>
                            <a href="clients.php?id=<?php echo $client['id']; ?>">
                                <?php echo $client['name'];?>
                            </a></td>
                          <td><?php echo$client['brand'];?></td>
                      </tr>
                  <?php}?>
                  </tbody>
              </table>
            </div>
            </div> -->