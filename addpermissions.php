<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add patient</title>
</head>
<body>
    <h1>Add patient</h1>
    <form action = "addpermissions.php" method = "POST">

    <input type="text"placeholder='Enter P_CID' name="P_CID">
    <br><br>
    <input type="text" placeholder='Enter email' name ="P_UserName">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php 
    if (!empty($_POST['P_CID'])&& !empty($_POST['P_UserName'])):
        require'connect.php';
            $sql_insert="insert into permissions values (:P_CID,:P_UserName)";

            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(':P_CID',$_POST['P_CID']);
            $stmt->bindParam(':P_UserName',$_POST['P_UserName']);
            

            if($stmt->execute()):
                $message = 'Sucessfully add new country';

                header("Location:/Hospital/senamedebttable.php");

            else:
                    $message='Fail to add new country';
            endif;
            echo $message;
            $conn=null; 
        endif; 
        ?>