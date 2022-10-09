<?php include "connect.php"?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body >
<br><br><br>
<table border="1" align=center><tr>
<?php
$stmt = $pdo->prepare("SELECT ROW_NUMBER()
OVER (ORDER BY po.date_order, po.time_order, po.username_cus, po.id_product)
row_order, po.date_order, po.username_cus FROM po 
GROUP BY po.date_order, po.time_order, po.username_cus;
");
$stmt->execute();
?>
<tr>
<th>row_order</th><th>date_order</th><th>username_cus</th></tr>
<?php

while ($row = $stmt->fetch()) {
?>

<tr>
<td><?=$row ["row_order"]?><br></td>
<td><?=$row ["date_order"]?><br></td>
<td><?=$row ["username_cus"]?><br></td>

</tr>
<?php } ?>


</body>
</html>