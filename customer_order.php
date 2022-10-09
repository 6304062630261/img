<?php include "connect.php"?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body >
<br><br><br>
<table border="1" align=center><tr>
<?php
$stmt = $pdo->prepare("SELECT customer.name_cus, customer.surname_cus, po.id_product, po.qty_product
FROM customer JOIN po
ON customer.username_cus = po.username_cus
");
$stmt->execute();
?>
<tr>
<th>name_cus</th><th>surname_cus</th><th>id_product</th><th>QTY_Product</th></tr>
<?php

while ($row = $stmt->fetch()) {
?>

<tr>
<td><?=$row ["name_cus"]?><br></td>
<td><?=$row ["surname_cus"]?><br></td>
<td><?=$row ["id_product"]?><br></td>
<td><?=$row ["qty_product"]?><br></td>

</tr>
<?php } ?>


</body>
</html>