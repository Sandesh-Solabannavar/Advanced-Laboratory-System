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
        
        //$a=$_SESSION['id'];
        $doc=$_SESSION['id'];
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
        <form method="post" name="f" action="">
        <?php
            
             
             $doc=$_SESSION['id'];
             $lab=$_SESSION['lab'];
             $pid=$_SESSION['pid'];
             $fname=$_SESSION['fname'];
             $lname=$_SESSION['lname'];
  
          include 'datbaseconnect.php';
         
          
          $query10="select * from tbl_test where lab='$lab'";
          $result10= mysql_query($query10); 
          
          ?>
            <h2>TESTS TO BE DONE</h2>
           Select Test: <select  name="test" style="width:100px;">
                 <?php while($row10=mysql_fetch_assoc($result10))
                        { ?>
                    <option value="<?php echo "{$row10['name']}"?>">   <?php echo "{$row10['name']}"?> </option>
                 
                <?php } ?>
           </select>
               <input type="submit" name="add" value="ADD">
               <br/>
             <input type="submit" name="save" value="SAVE"><br/><br/>
            
            <?php 
        
        
        $query3="select * from tbl_temp where pid='$pid' ";
        $result3= mysql_query($query3);
        if(mysql_num_rows($result3)>0){
 ?>
           
                 <h4>Tests</h4>
        <table align="center" border="1" Width="20%">
             <?php 
            while($row=mysql_fetch_assoc($result3))
            {?>
            <tr align="center">
                
<!--                 <td><?php // echo "{$row['pid']}"?></td>
                 <td><?php //echo "{$row['date']}"?></td>-->
                 <td><?php echo "{$row['test']}"?></td>
<!--                 <td><?php //echo "{$row['doc']}"?></td>
                 <td><?php// echo "{$row['lab']}"?></td>-->
            </tr>
<?php }
        }?>

        </table>

<?php  
       
   if(isset($_REQUEST['add'])){
            include 'datbaseconnect.php';
            
            $test=$_POST['test'];
            $query1= "insert into tbl_temp (pid,date,test,doc,lab) values ('$pid',NOW(),'$test','$doc','$lab' )";
            $result1= mysql_query($query1) or die(mysql_error()) ;
            
            if($result1){
//                header("location:case2.php");  
                ?>              
  <script>
          window.location.href="case2.php";
  </script> 
    <?php  
                        }
                        else {
                                echo "<script> alert ('error in insersion, check your details'); </script>";
                             }
       }
    
   ?>
            
            
            
            <?php 
            
    if(isset($_REQUEST['save'])){
            
            include 'datbaseconnect.php';
  
            $query= "select * from tbl_temp ";
            $result= mysql_query($query) or die(mysql_error()) ;
            
            
            while($row=mysql_fetch_assoc($result))
            {
                
            $query1= "insert into tbl_casepaper (patientid,date,tests,doc,lab,current,status) 
                                       values ('{$row['pid']}',NOW(),'{$row['test']}','{$row['doc']}','{$row['lab']}','0','pending' )";
            
            $result1= mysql_query($query1) or die(mysql_error()) ;
            
            }
            
            
//            $query1= "insert into tbl_temp (pid,date,test,doc,lab) 
//                                       values ('$pid',NOW(),'$test','$doc','$lab' )";
//            $result1= mysql_query($query1) or die(mysql_error()) ;
//            
            if($result1){
            $query2= "delete from tbl_temp";
            
            $result2= mysql_query($query2) or die(mysql_error()) ;
            if($result2){
//                          header("location:case.php?msg=record saved"); 
                ?>              
  <script>
          window.location.href="case.php?msg=record saved";
  </script> 
    <?php  
                        }
 
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