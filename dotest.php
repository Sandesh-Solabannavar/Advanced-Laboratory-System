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

<div id="tooplate_top_wrapper">
    <div id="tooplate_top">
    <div id="tooplate_menu" class="ddsmoothmenu">
        <ul>
             <li><a href="labhome.php" >Home</a></li>
            <li><a href="adduser.php" >Add User</a></li>
            <li><a href="addtest.php" >Add Test</a>

            </li>
            <li><a href="viewtest.php" >View Test</a>

          </li>
          <li><a href="viewrequest.php" class="selected" >View Request</a></li>
          <li><a href="logout.php" >Logout</a></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of menu -->

</div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
    <div id="tooplate_header">

      <div id="site_title"> <h2><a href="index.php">LABORATORY</a></h2> </div><center>
  <?php 
        session_start();
        if($_SESSION['id']=="")
        {
            header("location:index.php");
            
        }
        $a=$_SESSION['id'];
        
        $l=$_SESSION['lab'];
        
        ?>
             
<form name="f1" method="post" action="" align="center">
    <?php 
   
    
    
   include 'datbaseconnect.php';
    $pid=$_GET['r']; 
    
            $query2="select * from tbl_patient where id='$pid'";
            $result2=  mysql_query($query2) or die(mysql_error());
    
            $row2=mysql_fetch_assoc($result2);
            $cont=$row2['contact'];
            
            $query="select * from tbl_casepaper,tbl_patient where tbl_casepaper.patientid='$pid' and tbl_casepaper.status='pending' and tbl_patient.id='$pid'";
            $result=  mysql_query($query) or die(mysql_error());
    
            ?><table>
    <tr><td>Patient Name:</td> <td><?php echo $row2['fname']; ?>&nbsp;&nbsp;<?php echo  $row2['lname']; ?></td></tr>
    <tr><td>Age:</td> <td><?php echo $row2['age']; ?></td></tr>
    <tr><td>Gender:</td> <td><?php echo $row2['sex']; ?></td></tr>
    </table>
    <h3 align="center"><input type="hidden" name="pid" value=" <?php echo " "; echo $pid; ?>" border="0"> </h3>
    <table align="center" border="1">
        <tr>
            <td>Test</td>
            <td>Min Value</td>
            <td>Max Value</td>
            <td>Cost</td>
            <td>Current Value</td>
        </tr>
        
    <?php
    $i=1;
    $t=1;
    $tot=0;
    while($row=mysql_fetch_assoc($result))
    {
    $query1="select * from tbl_test where name='{$row['tests']}' and lab='{$row['lab']}' ";
    $result1=  mysql_query($query1) or die(mysql_error());
    
    
        while($row1=mysql_fetch_assoc($result1))
        {
        
        
            
        ?>
        <tr>
                 
                 <td><?php echo "{$row['tests']}"?><input type='hidden' name="<?php echo 'test'.$t; ?>" value="<?php echo "{$row['tests']}"?>" readonly></td>
                 <td><?php echo "{$row1['min']}"?></td>
                 <td><?php echo "{$row1['max']}"?></td>
                 <td><?php echo "{$row1['amount']}"?><input type='hidden' name="cost" value="<?php echo "{$row1['amount']}"?>" readonly > </td>
                 <td><input type="text" size="10" name="<?php echo 'curr'.$i; ?>"  > </td>    
                 
        </tr>
        
        
        
   <?php
   
   $tot=$tot+$row1['amount'];
   }$i=$i+1;
    $t=$t+1;   
        }
   ?>
        <input type="hidden" name='current' value="<?php echo $i-1; ?>" >
        <input type="hidden" name='test' value="<?php echo $t-1; ?>" >
            <tr><td></td><td></td><td>Total:</td><td><?php echo $tot ?></td><td></td></tr>
</table>
        
          
        
    <h2 align="center"> <input type="submit" name="save" value="Save Report"> </h2>
</form>
        <?php 
        
        
        if(isset($_REQUEST['save']))
        {
            
       $c=$_POST['current'];
       $a=1; 
       
       $t=$_POST['test'];
       $b=1;   
       $i=0;
         while($c!=0 && $t!=0)
      {
           $current=$_POST['curr'.$a];
           $a=$a+1;
           $c=$c-1;
           
           $test=$_POST['test'.$b];
           $b=$b+1;
           $t=$t-1;
       
           
           $query="update tbl_casepaper set current='$current',status='done' where patientid='$pid' and tests='$test' and status='pending' ";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    $i=$i+1;
          }
       
       if($i>0){
            $ch = curl_init();
            $user="bhushan.dcs@gmail.com:9880917783";
            $receipientno="$cont";
            $senderID="TEST SMS";
            $msgtxt="Your report has been generated. You can now logon to check it. Thank you";
            curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
            $buffer = curl_exec($ch);
            if(empty ($buffer))
            { echo " buffer is empty "; }
            else
            { echo "<center>$msgtxt</center>"; }
            curl_close($ch);
            echo "<script>window.location.href='viewrequest.php'</script>";
       }
      
//       while($c!=0)
//       {
//           $current=$_POST['curr'.$a];
//           $a=$a+1;
//           $c=$c-1;
//       }
//       
//       while($t!=0)
//       {
//           $test=$_POST['test'.$b];
//           $b=$b+1;
//           $t=$t-1;
//       }
//       
//       
//       echo $current;
//       echo $test;
       
      
      
       
//            $total=0;
//            $query="select * from tbl_casepaper where patientid='$pid' and status='pending'";
//            $result=  mysql_query($query) or die(mysql_error());
//            while($row=mysql_fetch_assoc($result))
//            {
//                $query1="select * from tbl_test where name='{$row['tests']}' ";
//                $result1=  mysql_query($query1) or die(mysql_error());
//
//                
////                $query1="select sum(amount) as m from tbl_test where name='{$row['tests']}' ";
////                $result1=  mysql_query($query1) or die(mysql_error());
////                
//                
//                while($row1=mysql_fetch_assoc($result1))
//                {
//                    
//                    $amt=$row1['amount'];
//                    $total=$total+$amt;
//                    
//                } 
//                
//            }
//            $total;
       }
       
       
        if(isset($_GET['ans']))
        {
           // echo "<h3 align=center>status: ".$_GET['ans'];
            echo "<script lang='javascript'> alert ('{$_GET['ans']}') </script>" ;
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
