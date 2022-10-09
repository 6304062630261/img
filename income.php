<?php include "connect.php"?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body >
<br><br><br>
<table border="1" align=center><tr>
<?php
$stmt = $pdo->prepare("SELECT po.date_order, SUM(po.qty_product * product.price_product) AS income FROM customer JOIN po ON customer.username_cus = po.username_cus JOIN product ON po.id_product = product.id_product GROUP BY po.date_order;
");
$stmt->execute();
?>
<tr>
<th>วันที่่สั่งซื้อสินค้า</th><th>รายได้</th></tr>
<?php

while ($row = $stmt->fetch()) {
?>

<tr>
<td><?=$row ["date_order"]?><br></td>
<td><?=$row ["income"]?><br></td>


</tr>
<?php } ?>


</body>
</html>