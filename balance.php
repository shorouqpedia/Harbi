<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "clients";
require_once 'partials/init.php';
$client_id = $_GET['id'];
$c_balance=0;


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST['client_id'];
    $balance = floatval($_POST['balance']);
    $comment = $_POST['comment'];
    $query = $con->prepare('INSERT INTO client_balance (client_id, balance_change, comment) VALUES(?,?,?)');
    $query->execute(array(
        $id,
        $balance,
        $comment
    ));
        header("location:" . $_SERVER['PHP_SELF'] . "?id=" . $id);
}
$query = $con->prepare("SELECT * FROM client_balance WHERE client_id=?");
$query->execute(array($client_id));
$logs = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($logs as $log) {
    $val = floatval($log['balance_change']);
    $c_balance=$c_balance+$val;
}
$query = $con->prepare("UPDATE clients SET balance = ? WHERE id=?");
$query->execute(array($c_balance, $client_id));

if ($client_id) {
?>
    <div class="container pt-3">
        <form class="mx-auto col-12 mb-4 col-sm-10 col-md-8 col-xl-6" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <span class="text-danger font-weight-bold d-block mb-1">* اضف المبلغ بالسالب ليكون العميل مدين </span>
            <div class="form-row align-items-end">
                <div class="col">
                    <label for="balance" class="text-right d-block control-label">القيمة</label>
                    <input required id="balance" name="balance" type="number" class="form-control" placeholder="0.00" value="0.00">
                </div>
                <div class="col" style="min-width: 250px">
                    <label for="comment" class="text-right d-block control-label">ملاحظات</label>
                    <input id="comment" name="comment" type="text" class="form-control" placeholder="ملاحظات..." />
                </div>
                <input type="hidden" value="<?php echo $client_id;?>" name="client_id">
                <div class="col">
                    <input type="submit" class="form-control btn btn-success" value="تأكيـــد">
                </div>
            </div>

        </form>
        <?php
            $query = $con->prepare("SELECT balance FROM clients WHERE id=?");
            $query->execute(array($client_id));
            $balance = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        ?>
        <div class="p-2 border bg-light text-center">
            <span>
                اجمالي الرصيد:
            </span>
            <span class="font-weight-bold">
                <?php echo $balance['balance'];?>
            </span>
        </div>
        <div class="table-responsive-xl">
            <table style="text-align:center" dir="rtl" class="table table-hover table-bordered">
                <?php
                $query = $con->prepare("SELECT * FROM client_balance WHERE client_id=?");
                $query->execute(array($client_id));
                $logs = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>القيمة</th>
                        <th>التاريخ</th>
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($logs as $log) {
                    $val = floatval($log['balance_change']);
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td class="font-weight-bold <?php echo $val > 0 ? 'text-success' : 'text-danger';?>"><?php echo $val > 0 ? "+" . $val : $val;?></td>
                      <td><?php echo date('h:iA - D, d M Y', time($log['date']));?></td>
                      <td><?php echo $log['comment'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
    echo "<h1 style='text-align:center;'>Not Authorized!</h1>";
}
ob_end_flush();
?>
