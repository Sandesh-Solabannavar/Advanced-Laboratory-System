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
 <script lang="javascript">
        function validation()
        {
                            
            var cont=document.f.contact.value;
            if(isNaN(cont) || cont.length<10)
                {
                    
                    alert("invalid contact");
                
                    return false;    
                }
//                
//                var e=document.f.email.value;
//                e=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-z]{2,4})+$/;
//                if(!e){
//                    alert("invalid email");
//                    return false;
//                }
                
                  

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.f.email.value;
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
      return false;
   }  
                return true;
        }
        
        
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
    

<body>

<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                 <li><a href="#" >Home</a></li>
                <li><a href="addlab.php" >Add Lab</a></li>
                <li><a href="viewlab.php" class="selected">View Lab</a>
                    
                </li>
                <li><a href="adddoctor.php" >Add Doctor</a>
                    
              </li>
              <li><a href="viewdoctor.php" >View Doctor</a></li>
              <li><a href="logout.php" >Logout</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    	
    </div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title"><h1><a href="#">Laboratory</a></h1></div>
        <h2><center>Lab Details</center></h2>
       <?php
                include 'datbaseconnect.php ';
                $query="select * from tbl_lab where id='{$_GET['r']}'";
                $result=  mysql_query($query);
                $row=mysql_fetch_assoc($result);
                
                echo"
                <form name='f' action='' method='post' onsubmit='javascript:return validation();'>
                <table align='center'>
                <tr><td>Lab ID:</td><td><input type='text' name='id' value='{$row['id']}' readonly /></td></tr>
                <tr><td>Lab Name:</td><td><input type='text' name='lname' value='{$row['labname']}'/></td></tr>
                <tr><td>Username:</td><td><input type='text' name='admin' value='{$row['admin']}'/></td></tr>
                <tr><td>Password:</td><td><input type='text' name='pass' value='{$row['password']}'/></td></tr>
                <tr><td>Email:</td><td><input type='text' name='email' value='{$row['email']}' /></td></tr>
                <tr><td>Contact:</td><td><input type='text' name='contact' value='{$row['contact']}'  /></td></tr>
                <tr><td>Address:</td><td><textarea cols='19' name='addr'>{$row['address']}</textarea></td></tr>
                </table>
                <h1 align='center'><input type='submit' name='sub' value='update' /> </h1>
                </form> 
                ";
                
                if(isset($_REQUEST['sub']))
                {
                     $id= $_POST['id'];
                    
                    $query="update tbl_lab set labname='{$_POST['lname']}',admin='{$_POST['admin']}',password='{$_POST['pass']}', email='{$_POST['email']}',contact='{$_POST['contact']}', address='{$_POST['addr']}' where id='$id' ";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    if(mysql_affected_rows()>0)
                    {
                        echo "<script>window.location.href='viewlab.php'</script>";
                      
                    }else{
                        echo "Record cannot be modified";
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