<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION['id']="";
        header("location:index.php");
        ?>
    </body>
</html>
