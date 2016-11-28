<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Advanced laboratory Systems</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">


</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<script src="js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.kwicks-1.5.1.pack.js" type="text/javascript"></script>

<script type="text/javascript">
	$().ready(function() {
		$('.slider').kwicks({
			max : 740,
			spacing : 1
		});
	});
</script>

</head>
        <script lang="javascript">
        function validation()
        {
          
                  var email = document.f.email.value;
                  var filter = /^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9\-\_\.])+\.([a-z]{2,4})$/;

                 if (filter.test(email)==false) 
                 {
                 
                    alert('Please provide a valid email address');
                    email.focus;
                    return false;
                 }
                 
                   
            var cont=document.f.contact.value;
            if(isNaN(cont) || cont.length<10)
                {
                    
                    alert("invalid contact");
                
                    return false;    
                }
                return true;
        }
        
        
    </script>
    <script lang="javascript">
        function validation()
        {
            
            if(document.f.pass.value!=document.f.repass.value)
                {
                   alert("password doesnt match");
                   return false;
                }
                
            var cont=document.f.contact.value;
            if(isNaN(cont) || cont.length<10)
                {
                    
                    alert("invalid contact");
                
                    return false;    
                }

                  var email = document.f.email.value;
                  var filter = /^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9\-\_\.])+\.([a-z]{2,4})$/;

                 if (filter.test(email)==false) 
                 {
                 
                    alert('Please provide a valid email address');
                    email.focus;
                    return false;
                 }
               
                return true;
        }
        
        
    </script>
<body>
<?php 
        session_start();
        if($_SESSION['id']=="")
        {
            header("location:index.html");
            
        }
        
        $a=$_SESSION['id'];
        
        ?>
<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="dochome.php" class="selected">Home</a></li>
                <li><a href="addpatient.php">Add Patient</a></li>
                <li><a href="viewpatient.php">View Patient</a></li>
                <li><a href="case.php">Assign Test</a></li>
              <li><a href="viewreport.php">View Report</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    	
    </div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title"><h1><a href="#">Laboratory</a></h1></div>
        <Center>   <h2>Add Patient </h2>
                <p>  <form name="f" method="post" action="" onsubmit="javascript:return validation();">
          <?php
          include 'datbaseconnect.php ';
           
          ?>
                        <table cellspacing="10px;" align="center" >
                
           <tr><td>FIRST NAME: </td> <td><input type="text" name="fname"></td> </tr>
           <tr><td>MIDDLE NAME: </td> <td><input type="text" name="mname"></td> </tr>
           <tr><td>LAST NAME: </td> <td><input type="text" name="lname"></td> </tr>
           <tr><td>AGE: </td> <td><input type="text" name="age"></td> </tr>
           <tr><td>GENDER: </td> <td><select name="sex"  style="width:100%;">
                    <option value="male"> MALE </option>
                    <option value="female">  FEMALE </option>
                 </select></td> </tr>
         
           <tr><td>ADDRESS: </td> <td><input type="text" name="addr"></td> </tr>
           <tr><td>PASSWORD:</td><td><input type="password" name="pass"></input></td></tr>
           <tr><td>RE-ENTER PASSWORD:</td><td><input type="password" name="repass"></input></td></tr>
           <tr><td>EMAIL:</td><td><input type="text" name="email" required></input></td></tr>
           <tr><td>CONTACT:</td><td><input type="text" name="contact" maxlength="10"></input></td></tr>
           </table> 
            <h1 align="center"><input type="submit" name="sub" value="Add Patient"></h1>
           
        </form>
      </div> </div> 
        
        
        <?php 
        if(isset($_REQUEST['sub'])){
            include 'datbaseconnect.php ' ;
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $age=$_POST['age'];
        $sex=$_POST['sex'];
        $addr=$_POST['addr'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $cont=$_POST['contact'];
           
                $qry="select * from tbl_patient where fname='$fname' and mname='$mname' and lname='$lname' ";
                $result=  mysql_query($qry);
                 if(mysql_num_rows($result)>0)
                {
//                     header("location:addpatient.php?msg=user already exist ");
                     ?>              
  <script>
          /*window.location.href="addpatient.php?msg=user already exist ";*/
          alert("Patient already exists");
  </script> 
    <?php  
                    
                }
                
             else{
                    
              
                    $query1="insert into tbl_patient (fname,mname,lname,age,sex,address,password,email,contact,doc) values ('$fname','$mname','$lname','$age','$sex','$addr','$pass','$email','$cont','$a')";
                    $result1= mysql_query($query1) or die(mysql_error());
                
               
                    if($result1)
                    {
                        $sql=  mysql_query("select max(id) as id from tbl_patient where doc='$a'");
                        $row=  mysql_fetch_assoc($sql);
                        $id=$row['id'];
                        echo "<script> alert('Patient added successfully. Patient id is: '. $id)</script>";
                        //echo 'inserted';
//                        header("location:addpatient.php?msg=successfully added");
                        ?>              
  <script>
//          window.location.href="addpatient.php?msg=successfuly added ";
//            alert("Patient added successfully. Patient id is: "<?php echo $id ?>);
  </script> 
    <?php  
                    }
                    else 
                    {
                        //echo 'inserssion error';
                    
//                         header("location:addpatient.php?msg=can not procceed the request");
                        ?>              
  <script>
          //window.location.href="addpatient.php?msg=can not procceed the request";
          alert("Can not procceed the request. Please try later");
  </script> 
    <?php  
                    }
                  }
   
        }
        
        
        if(isset($_GET['msg']))
        {
           // echo "<h3 align=center>status: ".$_GET['ans'];
            echo "<script lang='javascript'> alert ('{$_GET['msg']}') </script>" ;
        }
        
        ?>
        <!--<div id="slider_wrapper">
          
       
        	
		</div>-->
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->

<div id="tooplate_main_wrapper">
	<div id="tooplate_main">
            <div id="content">
        	
            <div class="post">
</p>
                    
                <div class="cleaner"></div>
            </div>
                </div>
    	<div id="content_top">
            <div class="post col_2 no_bottom float_l">
                
                <p></p>
                <div class="cleaner"></div>
            </div>
            <div class="post col_2 no_bottom float_r">
              
                <div class="cleaner"></div>
            </div>
            <div class="cleaner"></div>
        </div>
		<div id="content">
                
            <div class="col_3">
                
            </div>
            <div class="col_3 no_margin_right">
                
			</div>
            <div class="cleaner"></div>
        </div>
        <div id="sidebar">
                           
          
        </div> <!-- end of sidebar -->
        <div class="cleaner"></div>
    </div> <!-- end of main -->
</div> <!-- end of main wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
    	<div class="col_3">
        	    	</div>
        <div class="col_3">
        	
            
        </div>
        <div class="col_3 no_margin_right">
		
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer wrapper -->

</body>
</html>