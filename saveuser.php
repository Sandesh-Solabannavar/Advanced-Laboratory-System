 <?php 
            include 'datbaseconnect.php ' ;
        $name=$_POST['name'];
        $lname=$_POST['lname'];
        $pos=$_POST['pos'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $cont=$_POST['contact'];
           
                $qry="select * from `tbl_labusers` where name='$name' and labname='$lname' ";
                $result=  mysql_query($qry);
                 if(mysql_num_rows($result)>0)
                {
//                     header("location:adduser.php?msg=already request has been sent");
                     ?>              
  <script>
          window.location.href="adduser.php?msg=user alredy exists";
  </script> 
    <?php  
                    
                }
                
             else{
                    
              
                    $query1="insert into tbl_labusers (name,position,labname,password,email,contact) values ('$name','$pos','$lname','$pass','$email','$cont')";
                    $result1= mysql_query($query1);
                
               
                    if($result1)
                    {
                        //echo 'inserted';
//                        header("location:adduser.php?msg=request sent");
                        ?>              
  <script>
          window.location.href="adduser.php?msg=User added successfully";
  </script> 
    <?php  
                    }
                    else 
                    {
                        //echo 'inserssion error';
                    
//                         header("location:adduser.php?msg=can not procceed the request");
                                     ?>              
  <script>
          window.location.href="adduser.php?msg=can not procceed the request";
  </script> 
    <?php  
                    }
        }
?>
