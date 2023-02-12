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
    <form action = "addpatient.php"method = "POST">

    <input type="text"placeholder='Enter P_id' name="P_id">
    <br><br>
    <input type="text" placeholder='Enter P_name' name ="P_name">
    <br><br>
    <input type="date" placeholder='Enter your date' name ="P_DOB">
    <br><br>
    <input type="text" placeholder='Enter your debt' name ="P_debt">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php 
    if (!empty($_POST['P_id'])&& !empty($_POST['P_name'])&& !empty($_POST['P_DOB'])&& !empty($_POST['P_debt'])):
        require'connect.php';
            $sql_insert="insert into patient values (:P_id,:P_name,:P_DOB,:P_debt)";

            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(':P_id',$_POST['P_id']);
            $stmt->bindParam(':P_name',$_POST['P_name']);
            $stmt->bindParam(':P_DOB',$_POST['P_DOB']);
            $stmt->bindParam(':P_debt',$_POST['P_debt']);

            if($stmt->execute()):
                $message = 'Sucessfully add new country';

                header("Location:/Hospital/senamedebtable2.php");

            else:
                    $message='Fail to add new country';
            endif;
            echo $message;
            $conn=null;
        endif;
        ?>