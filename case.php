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
    
<body>
  <?php 
        session_start();
        if($_SESSION['id']=="")
        {
            header("location:index.html");
            
        }
        
        $a=$_SESSION['id'];
       // $doc=$_SESSION['id'];
        ?>
<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
             <ul>
                <li><a href="dochome.php">Home</a></li>
                <li><a href="addpatient.php">Add Patient</a></li>
                <li><a href="viewpatient.php">View Patient</a></li>
                <li><a href="case.php" class="selected">Assign Test</a></li>
              <li><a href="viewreport.php">View Report</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    	
    </div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title"><h1><a href="#">Laboratory</a></h1></div><center><br/><br/>
        <form name="f1" method="post" action="">
            <h5 align="center"> Patient-ID:<input type="text" name="id" placeholder="Enter patient ID"> 
          <input type="submit" name="sub" value="enter"></a> </h5>
        </form> 
          
          
        <?php 
        if(isset($_REQUEST['sub'])){
        include 'datbaseconnect.php';
        $id=$_POST['id'];
        
        
        $query3="select * from tbl_patient where id='$id' ";
        $result3= mysql_query($query3);
        
        date_default_timezone_set("Asia/Calcutta");

 ?>
           
        <form name="xyz" action="" method="post" align="center">
            <h5 align="right">DATE:<input type="text" name="date1" value="<?php echo date("d-m-Y"); ?>" readonly="true"></h5>
        <table align="center" cellspacing="10">
            <?php 
            while($row=mysql_fetch_assoc($result3))
            {
                $n=$row['fname']." ".$row['mname']." ".$row['lname'];
                ?>
            
            <tr><td><font size="3" color="brown">Patient ID:</td><td><font size="3" color="yellow"><?php echo $id ?><input type="hidden" name="id" value="<?php echo $id ?>" readonly="true" size="10" style="border:none;"></td></tr>
            <tr><td><font size="3" color="brown">Name:</td><td><font size="3" color="yellow"><?php echo $n ?><input type="hidden" name="fname" value="<?php echo $n ?>" readonly="true" size="10" style="border:none;"></td>
                <tr><td><font size="3" color="brown">Gender:</td><td><font size="3" color="yellow"><?php echo "{$row['sex']}"?></td></tr>
                <tr><td><font size="3" color="brown">Age:</td><td><font size="3" color="yellow"><?php echo "{$row['age']}"?>-years </td></tr>
                <tr><td><font size="3" color="brown">Contact:</td><td><font size="3" color="yellow"><?php echo "{$row['contact']}"?></td></tr>
                 
                 
            </tr></table><br/>
          
        
<?php }  
          
          $_SESSION['pid']=$id;
          
          
        $query3="select * from tbl_patient where id='$id' ";
        $result3= mysql_query($query3);
        $row=mysql_fetch_assoc($result3);
          
         
          
            $query9="select * from tbl_lab";
            $result9= mysql_query($query9); 
           
          ?>
                
          <H5 ALIGN="center" > LAB NAME: <select ALIGN="left" name="lab"  style="max-width:100%;">
               <option value="0">SELECT LAB NAME</option>
          <?php while($row9=mysql_fetch_assoc($result9))
          { ?>
               <option value="<?php echo "{$row9['labname']}"?>">   <?php echo "{$row9['labname']}"?></option>
          <?php 
          } 
          ?> </select>
          &nbsp; <input type="submit" name="test" value="Do Test"></a> </h5>
        
        </form>  
          
<?php
        }
        
        if (isset($_REQUEST['test'])){
          
          $_SESSION['lab']=$_POST['lab'];
          $_SESSION['fname']=$_POST['fname'];
          $_SESSION['lname']=$_POST['lname'];
          
//       header("location:case2.php"); 
          ?>              
  <script>
          window.location.href="case2.php";
  </script> 
    <?php  
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