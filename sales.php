<?php
ob_start();
session_start();
$title = "Haitham Harbi";
$active = "sales";
require_once 'partials/init.php';
?>
<?php
    $query = $con->prepare("SELECT * FROM store");
    $query->execute(array());
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($products);
?>
<script>
    var data = JSON.parse('<?php echo $json; ?>');
    console.log(data);
    document.body.onload = function () {
        const resultsContainer = document.getElementById("results");
        searchKeys = (e) => {
            let query = e.target.value;
            resultsContainer.innerHTML = '';
            for (let i = 0; i < data.length; i++) {
                if (data[i].name.search(query) !== -1) {
                    console.log(data[i]);
                    resultsContainer.innerHTML += "<li data-index=" + i + "><span>" + data[i].name + "</span><span class='font-weight-bold'>" + data[i].price + "</span></li>";
                }
            }
        };
        document.getElementById("search").onkeyup = (e) => {
            searchKeys(e);
        };
        resultsContainer.addEventListener("click", function (e) {
            let target = e.target;
            let items = [];
            resultsContainer.childNodes.forEach( i => {
                if (i.nodeName !== '#text') {
                    items.push(i);
                }
            });
            console.log(items);
            while (items.indexOf(target) === -1) {
                target = target.parentElement;
            }
            console.log(target);
            let item = data[parseInt(target.getAttribute('data-index'))];
            document.getElementsByTagName("tbody")[0].innerHTML += "<tr>" +
                "<td>" + item.code + "</td>" +
                "<td>" + item.name + "</td>" +
                "<td>" + item.price + "</td>" +
                "</tr>";
        });
    };
</script>
    <style>
        #results li {
            cursor: pointer;
        }
    </style>
    <input type="text" name="search" id="search">
    <ul class="list-unstyled" id="results"></ul>
    <div class="container ">
        <div class="table-responsive-xl">
            <table style="text-align:center" dir="rtl" class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>كود المنتج</th>
                    <th>اسم المنتج</th>
                    <th>سعر المنتج</th>
                </tr>
                </thead>
                <tbody>
                <?php
//                foreach ($products as $product) {?>
<!--                    <tr>-->
<!--                        <td></td>-->
<!--                    </tr>-->
<!--                --><?php //} ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
ob_end_flush();
?>