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
            header("location:index.php");
            
        }
        $a=$_SESSION['id'];
        
        $l=$_SESSION['lab'];
        
        ?>
<div id="tooplate_top_wrapper">
    <div id="tooplate_top">
    <div id="tooplate_menu" class="ddsmoothmenu">
        <ul>
             <li><a href="labhome.php" >Home</a></li>
            <li><a href="adduser.php">Add User</a></li>
            <li><a href="addtest.php" >Add Test</a>

            </li>
            <li><a href="viewtest.php" class="selected">View Test</a>

          </li>
          <li><a href="viewrequest.php" >View Request</a></li>
          <li><a href="logout.php" >Logout</a></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of menu -->

</div> <!-- end of top -->
</div> <!-- end of top wrapper -->

<div id="tooplate_header_wrapper">
    <div id="tooplate_header">

    <div id="site_title"><h1><a href="#">Laboratory</a></h1></div>
<h2><center>View Tests</center></h2>
        <?php 
        include 'datbaseconnect.php ';
        $query="select * from tbl_test where lab='$l'";
        $result= mysql_query($query);
        ?>
            <h5 align="center">
        <table align="center" border="2" cellspacing="2" cellpadding="2">
             <tr>
                 <td> Test NAME </td>
                 <td> Max Value </td>
                 <td> Min Value </td>
                 <td> Amount </td>
                 <td> EDIT </td>
                 <td> DELETE </td>
            </tr>
            <?php 
            while($row=mysql_fetch_assoc($result))
            {?>
            <tr>
                
                 <td><?php echo "{$row['name']}"?></td>
                 <td><?php echo "{$row['max']}"?></td>
                 <td><?php echo "{$row['min']}"?></td>
                 <td><?php echo "{$row['amount']}"?></td>
                 <td align="center"> <a href="edittest.php?r=<?php echo "{$row['name']}" ?>"> Edit </a></td>
                 <td align="center"> <a href="viewtest.php?r=<?php echo "{$row['name']}" ?>">Delete </a></td>
            </tr>
       <?php }?>
        </table>
    <!--<div id="slider_wrapper">



            </div>-->
</div> <!-- end of header -->
</div> <!-- end of header wrapper -->
 <?php
 if(isset($_REQUEST['r']))
                {
                    $query="delete from tbl_test where lab='{$_SESSION['lab']}' and name='{$_GET['r']}'";
                    $result=  mysql_query($query) or die(mysql_error()); 
                    if(mysql_affected_rows()>0)
                    {
//                        header("location:viewlabs.php");
                        ?>              
  <script>
          window.location.href="viewtest.php";
  </script> 
    <?php  
                    }
                    else
                    {
                        echo"<script> alert ('Error in deletion. Please try later'); </script>";
                    }
                }
        ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_main">
        <div id="content">

        <div class="post">
            <p> </p>

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