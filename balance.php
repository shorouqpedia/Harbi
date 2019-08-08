<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "clients";
require_once 'partials/init.php';
?>
<div class="container ">
  <div class="row py-2">
    <div class="col-12 py-5 d-flex align-items-center">
      <div class="card " style="width:69rem;">
        <ul class="list-group ">
          <li class="lead font-weight-bold list-group-item " style="font-family: initial;">
            <div class="row no-gutters justify-content-between">
                <div>
                  التـــاريخ
                </div>
                  الرصيد
                <div>
                  النوع
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush();
?>