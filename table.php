<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "clients";
require_once 'partials/init.php';
?>
<div class="container ">
  <div class="table-responsive-xl">
        <table style="text-align:center" dir="rtl" class="table table-hover table-bordered">
        <?php
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
          <thead>
          <tr>
            <th scope="col" style="width: 5%;">#</th>
            <th scope="col" style="width: 15%;">الكود</th>
            <th scope="col" style="width: 35%;">اسم المنتج</th>
            <th scope="col" style="width: 15%;">الكمية المتاحة</th>
            <th scope="col" style="width: 15%;">سعر المنتج</th>
            <th scope="col" style="width: 15%;"> اسم المخزن</th>
          </tr>
          </thead>
          <tbody>
            <?php
            foreach ($products as $product) {?>
              <tr>
                  <th scope="row"></th>
                  <td><?php echo $product['code'];?></td>
                  <td><?php echo $product['name'];?></td>
                  <td><?php echo $product['quantity'];?></td>
                  <td><?php echo $product['price'];?></td>
                  <td><?php echo $product['store_type'];?></td>
              </tr>
          <?php}?>
          </tbody>
      </table>
    </div>
</div>
<?php
ob_end_flush();
?>