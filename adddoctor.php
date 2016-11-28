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
                
            if(document.f.pass.value!=document.f.repass.value){
                alert("Please check the passwords");
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
                <li><a href="addlab.php" >Add Lab</a></li>
                <li><a href="viewlab.php" >View Lab</a>
                    
                </li>
                <li><a href="adddoctor.php" class="selected">Add Doctor</a>
                    
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
        <Center>   <h2>Add Doctor </h2>
                <p> <form name="f" method="post" action="" onsubmit="javascript:return validation();">
          <TABLE cellspacing="10px;"align="center">
              
                  <tr><td>NAME:</td><td><input type="text" name="name" required></input></td></tr>
                  <tr><td>PASSWORD:</td><td><input type="password" name="pass"></input></td></tr>
                  <tr><td>RE-ENTER PASSWORD:</td><td><input type="password" name="repass"></input></td></tr>
                  <tr><td>EMAIL:</td><td><input type="text" name="email" required></input></td></tr>
                  <tr><td>CONTACT:</td><td><input type="text" name="contact" maxlength="10" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false) 
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode==46) )"></input></td></tr>
          </table>
            <h1 align="center"><input type="submit" name="sub" value="submit"></h1>
           
        </form>
      </div> </div> 
        
        
        <?php 
        if(isset($_REQUEST['sub'])){
            include 'datbaseconnect.php ';
            
            $name= $_POST['name'];
            $pass= $_POST['pass'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            
        
        
        $query="insert into tbl_adddoc(name,password,email,contact) values ('$name','$pass','$email','$contact')";
        $result= mysql_query($query) or die(mysql_error()) ;
        if($result){
            echo " <script> alert ('Doctor added successfully'); </script>";
        }
        else {
                echo "<script> alert ('error in insersion, check your details'); </script>";
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