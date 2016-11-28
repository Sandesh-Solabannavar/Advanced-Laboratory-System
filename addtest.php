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
</head>
<body>

<div id="tooplate_top_wrapper">
    <div id="tooplate_top">
    <div id="tooplate_menu" class="ddsmoothmenu">
        <ul>
             <li><a href="labhome.php" >Home</a></li>
            <li><a href="adduser.php"  >Add User</a></li>
            <li><a href="addtest.php" class="selected">Add Test</a>

            </li>
            <li><a href="viewtest.php" >View Test</a>

          </li>
          <li><a href="viewrequest.php" >View Request</a></li>
          <li><a href="logout.php" >Logout</a></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of menu -->

</div> <!-- end of top -->
</div> <!-- end of top wrapper -->
  <?php 
        session_start();
        if($_SESSION['id']=="")
        {
            header("location:index.php");
            
        }
        $a=$_SESSION['id'];
        
        $l=$_SESSION['lab'];
        
        ?>

<div id="tooplate_header_wrapper">
    <div id="tooplate_header">

        <div id="site_title"><h1><a href="#">Laboratory</a></h1></div><center>
 <h2>Add Test </h2>
 <p> <form name="f" method="post" action="" onsubmit="javascript:return validate();" >
            <h5 align="center"> <TABLE align="center">
              <input type="hidden" name="lab" value="<?php echo $l; ?>"/>
                 <tr> <td>TEST NAME:</td><td><input type="text" name="test" required></input></td></tr>
                  <tr><td>MAX VALUE:</td><td><input type="text" name="max"></input></td></tr>
                  <tr><td>MIN VALUE:</td><td><input type="text" name="min"></input></td></tr>
                <tr><td>AMOUNT:</td><td><input type="text" name="amount" maxlength="10"></input></td></tr>
          </table> </h5>
            <h1 align="center"><input type="submit" name="sub" value="submit"></h1>
           
        </form>
      </div> </div> 
        
        
        <?php 
        if(isset($_REQUEST['sub'])){
            include 'datbaseconnect.php ';
            
            $test= $_POST['test'];
            $max= $_POST['max'];
            $min=$_POST['min'];
            $amount=$_POST['amount'];
            $l=$_POST['lab'];
            $res=mysql_query("select * from tbl_test where lab='$l' and name='$test'");
        if(mysql_num_rows($res)>0){
            echo " <script> alert ('Test already added'); </script>";
        }else{
        $query="insert into tbl_test values ('$l','$test','$max','$min','$amount')";
        $result= mysql_query($query) or die(mysql_error()) ;
        if($result){
            echo " <script> alert ('Test added successfully'); </script>";
        }
        else {
                echo "<script> alert ('Error in insersion, please try later'); </script>";
             }
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
</html><?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
?>
