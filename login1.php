<!DOCTYPE html>
<html>
    <head>
        <title>login </title>
    </head>
    <body>
        <?php
       include 'datbaseconnect.php';
        
        session_start();
        $u=$_POST['name'];
        $p=$_POST['pass'];
        
        $sql="select * from tbl_admin where name='$u' and password='$p'";
        $result=  mysql_query($sql);
        
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            
            if($row['name']==$u && $row['password']==$p)
            {
                $_SESSION['id']=$u;
              header("location:adminhome.php");
            }
            else{
               header("location:admin.php?ans=incorrect username/password");
            }
                      }
        else{
            header("location:admin.php?ans=failed to loging check your details");
        }
        
        ?>
    </body>
</html>
