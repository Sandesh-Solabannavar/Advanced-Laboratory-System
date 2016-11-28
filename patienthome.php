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
<body>
 <?php 
        session_start();
        if($_SESSION['id']=="")
        {
            header("location:index.html");
            
        }
        
        
        
        $a=$_SESSION['name'];
        
        $pid=$_SESSION['id'];
        
        ?>
<div id="tooplate_top_wrapper">
	<div id="tooplate_top">
    	<div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                 <li><a href="#p">&nbsp;</a></li>
                <li><a href="#" >&nbsp;</a></li>
                <li><a href="#" >&nbsp;</a>
                    
                </li>
                <li><a href="#">&nbsp;</a>
                    
              </li>
              <li><a href="#" >&nbsp;</a></li>
              <li><a href="logout.php" >Logout</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of menu -->
    	
    </div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
	<div id="tooplate_header">
    
    	<div id="site_title"><h1><a href="#">Leather Shop Template</a></h1></div>
        
        <div id="slider_wrapper">
            <ul class="slider horizontal" >
                <li id="slide_1"><img src="images/slider/01.jpg" alt="Slider 1" /></li>
                <li id="slide_2"><img src="images/slider/02.jpg" alt="Slider 2" /></li>
                <li id="slide_3"><img src="images/slider/03.jpg" alt="Slider 3" /></li>
                <li id="slide_4"><img src="images/slider/04.jpg" alt="Slider 4" /></li>
                <li id="slide_5"><img src="images/slider/05.jpg" alt="Slider 5" /></li>
            </ul>
		</div>
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->

<div id="tooplate_main_wrapper">
	<div id="tooplate_main">
    	<div id="content_top">
                <center>
                
              <h2 align="center"> Your Test Reports Are: </h2>  </br>
        
<table align="center" border="1" width="50%">
        <tr>
            <td>Test</td>
            <td>Min Value</td>
            <td>Max Value</td>
            <td>Current Value</td>
        </tr>
        
    <?php
            include 'datbaseconnect.php';
    $i=1;
    $t=1;
    $tot=0;
     $query="select * from tbl_casepaper where patientid='{$_SESSION['id']}' and status='done'";
            $result=  mysql_query($query) or die(mysql_error());
    
    while($row=mysql_fetch_assoc($result))
    {
    $query1="select * from tbl_test where name='{$row['tests']}' and lab='{$row['lab']}' ";
    $result1=  mysql_query($query1) or die(mysql_error());
    
    
        while($row1=mysql_fetch_assoc($result1))
        {
        
        
            
        ?>
        <tr>
                 
                 <td><?php echo $row['tests']?><input type='hidden' name="<?php echo 'test'.$t; ?>" value="<?php echo "{$row['tests']}"?>" readonly></td>
                 <td><?php echo $row1['min']?></td>
                 <td><?php echo $row1['max']?></td>
                 <td><?php echo $row['current'] ?></td>    
                 
        </tr>
        
        
        
   <?php
   
   $tot=$tot+$row1['amount'];
   }$i=$i+1;
    $t=$t+1;   
        }
   ?>
</table><br/><br/>

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