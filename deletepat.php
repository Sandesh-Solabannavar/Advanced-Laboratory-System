<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
     <link rel="stylesheet" type="text/css" href="new.css">
    <body>
        <script lang="javascript">
        function validation()
        {
            
            
               var cont=document.f.contact.value;
            if(isNaN(cont) || cont.length<10)
                {
                    
                    alert("invalid contact");
                
                    return false;    
                }
                return true;
        }
    </script>
        
        <?php
                include 'datbaseconnect.php';
                $query="select * from tbl_lab where id='{$_GET['r']}'";
                $result=  mysql_query($query);
                $row=mysql_fetch_assoc($result);
                
                
                if($result)
                {
                    $query="delete from tbl_patient where id='{$_GET['r']}'";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    if(mysql_affected_rows()>0)
                    {
                        header("location:viewpatient.php");
                    }
                    else
                    {
                        echo"error";
                    }
                }
        ?>
        <h1 align="center"> <input type="button" value="back" Onclick="window.location.href='viewpatient.php'"></input>
        </h1>   
    </body>
</html>
