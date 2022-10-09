<?php include "connect.php"?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<table border="1"><tr>
<?php
$stmt = $pdo->prepare("SELECT  customer.name_cus, customer.surname_cus, customer.address_cus, po.date_order, SUM(po.qty_product * product.price_product) AS sum_price, po.payment_status 
FROM customer JOIN po ON customer.username_cus = po.username_cus JOIN product ON po.id_product = product.id_product 
GROUP BY customer.name_cus, customer.surname_cus, customer.address_cus, po.date_order
");
$stmt->execute();
?>
<tr>
<th>ชื่อสมาชิก</th><th>นามสกุลสมาชิก</th><th>ที่อยู่สมาชิก:</th><th>วันที่่สั่งซื้อสินค้า:</th><th>ราคารวมสินค้า:</th><th>สถานะการจ่ายเงิน:</th></tr>
<?php

while ($row = $stmt->fetch()) {
?>

<tr>
<td><?=$row ["name_cus"]?><br></td>
<td><?=$row ["surname_cus"]?><br></td>
<td><?=$row ["address_cus"]?><br></td>
<td><?=$row ["date_order"]?><br></td>
<td><?=$row ["sum_price"]?><br></td>
<td><?=$row ["payment_status"]?><br></td>
</tr>
<?php } ?>


</body>
</html>