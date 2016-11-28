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
        <h2><center>View Labs</center></h2>
        <?php 
        include 'datbaseconnect.php ';
        $query="select * from tbl_lab";
        $result= mysql_query($query);
        ?>
            <h5 align="center">
        <table align="center" border="2" cellspacing="2" cellpadding="2">
             <tr>
                 <td> LAB ID </td>
                 <td> NAME </td>
                 <td> EMAIL </td>
                 <td> CONTACT </td>
                 <td> ADDRESS </td>
                 <td> EDIT </td>
                 <td> DELETE </td>
            </tr>
            <?php 
            while($row=mysql_fetch_assoc($result))
            {?>
            <tr>
                 <td><?php echo "{$row['id']}"?></td>
                 <td><?php echo "{$row['labname']}"?></td>
                 <td><?php echo "{$row['email']}"?></td>
                 <td><?php echo "{$row['contact']}"?></td>
                 <td><?php echo "{$row['address']}"?></td>
                 <td align="center"> <a href="editlab.php?r=<?php echo "{$row['id']}" ?>"> edit </a></td>
                 <td align="center"> <a href="deletelab.php?r=<?php echo "{$row['id']}"?>" onclick="return confirm('Do you want to delete')"> delete </a></td>
            </tr>
       <?php }?>
        </table>
                
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