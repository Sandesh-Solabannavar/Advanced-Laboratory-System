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
</head>
<body>

<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                 <li><a href="adminhome.php" >Home</a></li>
                <li><a href="addlab.php" class="selected" >Add Lab</a></li>
                <li><a href="viewlab.php" >View Lab</a>
                    
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
                       <center><h2>Add Laboratory </h2></center>

        <form name="f" method="post" action="" onsubmit="javascript:return validation();">
            <h5 align="center">
                 <table cellspacing="15px;" align="center">
                     <tr><td align="right">LAB NAME:</td><td><input type="text" name="lname" required></input></td></tr>
                     <tr><td align="right">LAB ADMIN:</td><td><input type="text" name="admin" required></input></td></tr>
                     <tr><td align="right">PASSWORD:</td><td><input type="password" name="pass" required></input></td></tr>
                     <tr><td align="right">EMAIL:</td><td><input type="text" name="email" required></input></td></tr>
                     <tr><td align="right">CONTACT:</td><td><input type="text" name="contact" maxlength="10" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (event.keyCode>47 && event.keyCode<58 && event.shiftKey==false) 
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode==46) )"></input></td></tr>
                     <tr><td align="right">ADDRESS:</td><td><textarea cols="19" rows="4" name="addr"></textarea></td></tr>
                </table>
            </h5>
            <h1 align="center"><input type="submit" name="sub" value="Add Laboratory"></h1>
        </form>
        <!--<div id="slider_wrapper">
		</div>-->
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->

<div id="tooplate_main_wrapper">
	<div id="tooplate_main"><center>
            <div id="content">
        	
            <div class="post">
        <?php 
        if(isset($_REQUEST['sub'])){
            include 'datbaseconnect.php ';
            
            $lname= $_POST['lname'];
            $admin= $_POST['admin'];
            $pass= $_POST['pass'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $addr=$_POST['addr'];
            
        $res=mysql_query("select * from tbl_lab where labname='$lname'");
        if(mysql_num_rows($res)>0){
            echo " <script> alert ('Laboratory already present'); </script>";
        }
        else{
            $query="insert into tbl_lab (labname,admin,password,email,contact,address) values ('$lname','$admin','$pass','$email','$contact','$addr' )";
            $result= mysql_query($query) or die(mysql_error()) ;
        if($result){
            echo " <script> alert ('Laboratory Added'); </script>";
        }
        else {
                echo "<script> alert ('error in insersion, check your details'); </script>";
             }
        }
        }
        
        ?> </p>
                    
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
</html><?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
