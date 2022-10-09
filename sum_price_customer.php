<?php include "connect.php"?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body >
<br><br><br>
<table border="1" align=center><tr>
<?php
$stmt = $pdo->prepare("SELECT customer.name_cus, customer.surname_cus, po.date_order, SUM(po.qty_product * product.price_product) AS sum_price FROM customer 
JOIN po ON customer.username_cus = po.username_cus 
JOIN product ON po.id_product = product.id_product 
GROUP BY po.date_order, customer.name_cus, customer.surname_cus;
");
$stmt->execute();
?>
<tr>
<th>ชื่อสมาชิก</th><th>นามสกุลสมาชิก</th><th>วันที่่สั่งซื้อสินค้า:</th><th>ราคารวมสินค้า:</th></tr>
<?php

while ($row = $stmt->fetch()) {
?>

<tr>
<td><?=$row ["name_cus"]?><br></td>
<td><?=$row ["surname_cus"]?><br></td>
<td><?=$row ["date_order"]?><br></td>
<td><?=$row ["sum_price"]?><br></td>

</tr>
<?php } ?>


</body>
</html>