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
    function validate(){
        if(isNaN(document.f.max.value)){
            alert("Invalid maximum value");
            return false;
        }
         if(isNaN(document.f.min.value)){
            alert("Invalid minimun value");
            return false;
        }
         if(isNaN(document.f.amount.value)){
            alert("Invalid amount");
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
 <?php
                include 'datbaseconnect.php ';
                $query="select * from tbl_test where name='{$_GET['r']}' and lab='{$_SESSION['lab']}'";
                $result=  mysql_query($query) or die(mysql_error());
                $row=mysql_fetch_assoc($result);
                
                echo"
                <form name='f' action='' method='post' onsubmit='javascript:return validate();'>
                <table align='center'>
                <tr><td>Test:</td><td><input type='text' name='name' value='{$row['name']}' readonly/></td></tr>
                <tr><td>Maximum:</td><td><input type='text' name='max' value='{$row['max']}'/></td></tr>
                <tr><td>Minimum:</td><td><input type='text' name='min' value='{$row['min']}'/></td></tr>
                <tr><td>Amount:</td><td><input type='text' name='amount' value='{$row['amount']}' /></td></tr>
                </table>
                <h1 align='center'><input type='submit' name='sub' value='Update' /> </h1>
                </form>";
                
                if(isset($_REQUEST['sub']))
                {
                    $query="update tbl_test set max='{$_POST['max']}',min='{$_POST['min']}', amount='{$_POST['amount']}' where lab='{$_SESSION['lab']}' and name='{$_POST['name']}'";
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
                        echo"<script> alert ('Error in updation. Please try later'); </script>";
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
            <h2>Add User </h2>
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