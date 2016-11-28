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
        
        $sql="select * from tbl_adddoc where name='$u' and password='$p'";
        $result=  mysql_query($sql);
        
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            
            if($row['name']==$u && $row['password']==$p)
            {
                $_SESSION['id']=$u;
              header("location:dochome.php");
              
                  
            }
            else{
               header("location:doctor.php?ans=incorrect username/password");
            }
                      }
        
        else{
            header("location:doctor.php?ans=failed to loging check your details");
        }
        
        ?>
    </body>
</html>
