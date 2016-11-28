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
        $pid=$_POST['pid'];
        
        $_SESSION['name']=$_POST['name'];
        $_SESSION['id']=$_POST['pid'];
        
        $sql="select * from tbl_patient where fname='$u' and password='$p' and id='$pid'";
        $result=  mysql_query($sql);
        
        if(mysql_num_rows($result)>0){
            $row=mysql_fetch_assoc($result);
            
            if($row['fname']==$u && $row['password']==$p && $row['id']==$pid)
            {
                $_SESSION['id']=$pid;
              header("location:patienthome.php");
              
                  
            }
            else{
               header("location:patientlogin.php?ans=incorrect username/password");
            }
                      }
        
        else{
            header("location:patient.php?ans=failed to loging check your details");
        }
        
        ?>
    </body>
</html>
