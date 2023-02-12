<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ans select name</title>
</head>
<body>
<?php


// {
    $strP_name=$_GET["P_name"];
// }

require "connect.php";
$sql = "SELECT patient.P_id, patient.P_name, permissions.P_UserName FROM patient, permissions
        WHERE patient.P_id = permissions.P_CID and patient.P_name = '".$strP_name."'";
        echo $sql;
// $params = array($strP_name);
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสผู้ป่วย</th>
    <td width="240"><?php echo $result["P_id"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อผู้ป่วย</th>
    <td><?php echo $result["P_name"]; ?></td>
  </tr>

  <tr>
    <th width="130">email</th>
    <td><?php echo $result["P_UserName"]; ?></td>
  </tr>
 

 
  </table>
<?php
$conn = null;
?>
</body>
</html>