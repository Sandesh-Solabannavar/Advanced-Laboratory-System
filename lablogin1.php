<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="new.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        include 'datbaseconnect.php' ;
        session_start();
        $l=$_POST['lname'];
        $u=$_POST['name'];
        $p=$_POST['pass'];
        $pos=$_POST['pos'];
        
        $_SESSION['lab']=$_POST['lname'];
        
        $sql="select * from tbl_lab where admin='$u' and password='$p' and labname='$l'";
        $result=  mysql_query($sql) or die(mysql_error());
        
        $sql1="select * from tbl_labusers where name='$u' and password='$p' and labname='$l' ";
        $result1=  mysql_query($sql1) or die(mysql_error());
        
        
        if(mysql_num_rows($result)>0)
            {
            $row=mysql_fetch_assoc($result);
            
            if($row['admin']==$u && $row['password']==$p && $row['labname']==$l)
            {
                $_SESSION['id']=$u;
                
                header("location:labhome.php?l= <?php echo $l ?>");
                                
            }
            else
                {
                    header("location:laboratory.php?ans=incorrect username/password or access denied ");
                }
             }

            else if(mysql_num_rows($result1)>0)
            {
            $row1=mysql_fetch_assoc($result1);
            
            if($row1['name']==$u && $row1['password']==$p && $row1['labname']==$l)
            {
                $_SESSION['id']=$u;
                
                header("location:labhome.php?l= <?php echo $l ?>");
                                
            }
            
            else
                {
                    header("location:laboratory.php?ans=incorrect username/password or access denied ");
                }
             }
        
             
             
        else{
            header("location:laboratory.php?ans=failed, check your details");
        }
        
        ?>
    </body>
</html>
