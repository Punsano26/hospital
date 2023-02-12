<html> <head>
<title> Hospital selectname</title>
</head>
<body>
<?php
require "connect.php";
$sql = "SELECT * FROM patient";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ป่วย </th>
    <th width="140"> <div align="center">ชื่อผู้ป่วย </th>
    <th width="120"> <div align="center">วันที่ </th>
    <th width="70"> <div align="center">ยอดหนี้ </th>
  </tr>

<?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

  <tr>
    

  

   <td><?php echo $result["P_id"]; ?></div></td>
    <td>   
    <a href="senamedebttable2.php?P_name=<?php echo $result["P_name"];?>">
                      <?php echo $result["P_name"]; ?>
    </a>     
    </td>
    <td><?php echo $result["P_DOB"]; ?></div></td>
    <td><?php echo $result["P_debt"]; ?></td>
    
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