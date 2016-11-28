<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
     <link rel="stylesheet" type="text/css" href="new.css">
    <body>
        <?php
                include 'datbaseconnect.php';
                    $query="delete from tbl_adddoc where id='{$_GET['r']}'";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    if(mysql_affected_rows()>0)
                    {
                        echo "<script>window.location.href='viewdoctor.php'</script>";
                    }
                    else
                    {
                        echo"error";
                }
        ?>
        <h1 align="center"> <input type="button" value="back" Onclick="window.location.href='viewdoc.php'"></input>
        </h1>   
    </body>
</html>
