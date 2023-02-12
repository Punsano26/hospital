<?php
$count=0;
require "connect.php";


if(isset($_GET["P_name"]))

{

    $P_name = $_GET["P_name"];
    echo "<br>"."P_name =".$P_name;
    $sql="SELECT * 
            FROM patient, permissions 
            WHERE patient.P_id = permissions.P_CID AND P_name Like CONCAT('%', :P_name, '%')";

    echo "<br>" . "sql=".$sql."<br>";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(':P_name',$_GET['P_name']);
    $stmt->execute();
   // $result=$stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($result);
?>
    <table width="300" border="1">
  <tr>
    <th width="325">ชื่อผู้ป่วย</th>
    <th width="130">ยอดหนี้</th>
    <th width="130">อีเมล</th>
  </tr>

 
<?php
    //echo "<br>******************<br>";

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //echo $row['P_name']. '&nbsp' . $row['P_debt'] ."<br>";
        
        
?>
  <tr>
    <td><?php echo $result["P_name"]; ?></div></td>
    <td><?php echo $result["P_debt"]; ?></div></td>
    <td><?php echo $result["P_UserName"]; ?></div></td>
  </tr>

<?php
        
    }
    $count++;
    //echo "count ... ".$count;
    if($count==0)
    echo "<br> No data ... <br>";

}

?>


 
  </table>
<?php
$conn = null;
?>