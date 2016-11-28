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
            
            
               var cont=document.f.contact.value;
            if(isNaN(cont) || cont.length<10)
                {
                    
                    alert("invalid contact");
                
                    return false;    
                }
                return true;
        }
    </script>
<body>

<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                 <li><a href="#" >Home</a></li>
                <li><a href="addlab.php"  >Add Lab</a></li>
                <li><a href="viewlab.php" >View Lab</a>
                    
                </li>
                <li><a href="adddoctor.php" >Add Doctor</a>
                    
              </li>
              <li><a href="viewdoctor.php" class="selected">View Doctor</a></li>
              <li><a href="logout.php" >Logout</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    	
    </div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title"><h1><a href="#">Laboratory</a></h1></div><center>
        <h2>View Details </h2>
         <?php
                include 'datbaseconnect.php ';
                $query="select * from tbl_patient where id='{$_GET['r']}'";
                $result=  mysql_query($query);
                $row=mysql_fetch_assoc($result);
                
                echo"
                <form name='f' action='' method='post' onsubmit='javascript:return validation();'>
                <table align='center' cellspacing='10px;'>
                <tr><td>ID:</td><td><input type='text' name='id' value='{$row['id']}' readonly /></td></tr>
                <tr><td>First Name:</td><td><input type='text' name='fname' value='{$row['fname']}'/></td></tr>
                <tr><td>Middle Name:</td><td><input type='text' name='mname' value='{$row['mname']}'/></td></tr>
                <tr><td>Last Name:</td><td><input type='text' name='lname' value='{$row['lname']}'/></td></tr>
                <tr><td>Age:</td><td><input type='text' name='age' value='{$row['age']}'/></td></tr>
                <tr><td>Gender:</td><td><input type='text' name='sex' value='{$row['sex']}'/></td></tr>
                <tr><td>Email:</td><td><input type='text' name='email' value='{$row['email']}' /></td></tr>
                <tr><td>Contact:</td><td><input type='text' name='contact' value='{$row['contact']}'  /></td></tr>
                <tr><td>Address:</td><td><input type='text' name='addr' value='{$row['address']}'  /></td></tr>
                </table>
                <h1 align='center'><input type='submit' name='sub' value='Update' /> </h1>
                </form> 
                ";
                
                if(isset($_REQUEST['sub']))
                {
                     $id= $_POST['id'];
                    
                    $query="update tbl_patient set fname='{$_POST['fname']}',mname='{$_POST['mname']}',lname='{$_POST['lname']}',
                                                   age='{$_POST['age']}',sex='{$_POST['sex']}', email='{$_POST['email']}',
                                                   contact='{$_POST['contact']}', address='{$_POST['addr']}' where id='$id' ";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    if(mysql_affected_rows()>0)
                    {
//                        header("location:viewlabs.php");
                        ?>              
  <script>
          window.location.href="viewpatient.php";
  </script> 
    <?php  
                    }
                    else
                    {
                        echo"<script> alert ('error in editing'); </script>";
                    }
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
                
                <p>   </p>
                    
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