<html> <head>
<title> Udsanee-Display customer in table</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT patient.P_id, patient.P_name, patient.P_debt, permissions.P_UserName FROM patient, permissions
        WHERE patient.P_id=permissions.P_CID 
        AND patient.P_debt BETWEEN 1000 AND 3000";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ป่วย </th>
    <th width="140"> <div align="center">ชื่อผู้ป่วย </th>
    <th width="90"> <div align="center">ยอดหนี้ </th>
    <th width="140"> <div align="center">อีเมล </th>
    
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    <td>   
        <?php echo $result["P_id"]; ?>
         
    </td>

    <td>
        <?php echo $result["P_name"]; ?>
    </td>
    
    <td>
        <?php echo $result["P_debt"]; ?>
    </td>

    <td>
        <?php echo $result["P_UserName"]; ?>
    </td>
  </tr>

<?php
  }
?>

</table>

<?php
$conn = null;
?>
</body>  
</html>