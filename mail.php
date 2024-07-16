<?php
include ("PHPMailer/src/Exception.php");
include ("PHPMailer/src/OAuth.php");
include ("PHPMailer/src/POP3.php");
include ("PHPMailer/src/PHPMailer.php");
include ("PHPMailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table style="border-color: rgb(19, 119, 233);" border="2px"  align="center">
        <form method="POST" >
        <tr>
            <th >Email: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtemail" required > </th>
        </tr>
        <tr>
            <th >Subject: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtsubject" ></th>
        </tr>
        <tr>
            <th >Body: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtbody" ></th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input style="border-radius: 10px; background-color: rgb(249, 190, 231); margin-left: -50px; padding: 10px 25px 10px 25px;" type="submit" name="txtsub" value="SUBMIT"></th>

        </tr>
        </form>     
</table>
<?php
    $mail = new PHPMailer(true);
    if(isset($_POST['txtsub'])) {
        if(empty($_POST['txtemail']) || (empty($_POST['txtsubject'])) || (empty($_POST['txtbody']))) {
            echo "<script> alert('Thông tin không được để trống')</script>";
        } 
        else {
            try{
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lanxjng@gmail.com';
                $mail->Password = 'zgtwwshwqddnwotx';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('lanxjng@gmail.com');
                $mail->addAddress($_POST['txtemail'], 'Thu Van');
                $mail->isHTML(true);
                $mail->Subject = $_POST['txtsubject'];
                $mail->Body = $_POST['txtbody'];
                //$mail->AltBody = 'Nhưng rất lười học';
                $mail->send();
                echo "<script> alert('Email has been sent')</script>";
            }
            catch(Exception $e){
                echo 'Message could not be sent. Mailer Eror: ', $mail->ErorInfo;
            }
        }
        
    }
    
    ?>

</body>
</html>
<!-- vanyellow1211@gmail.com -->