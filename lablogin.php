<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab login</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="tooplate_style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<!-- Arquivos utilizados pelo jQuery lightBox plugin -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
<!-- / fim dos arquivos utilizados pelo jQuery lightBox plugin -->

<!-- Ativando o jQuery lightBox plugin -->
<script type="text/javascript">
$(function() {
    $('#map a').lightBox();
});
</script>

</head>
<body class="subpage">

<div id="tooplate_wrapper">
	<div id="tooplate_header">
    	
        <div id="site_title"><h2><a href="index.html">LABORATORY</a></h2></div>
        
        <div class="cleaner"></div>
    </div>
    
    <div id="tooplate_menu">
        <ul>
            <li><a href="index.html" >Home</a></li>
            <li><a href="labmenu.php">Laboratory</a></li>
            <li><a href="labmenu.php">Back</a></li>
            
        </ul>     	
        
        	
        
    </div> <!-- end of tooplate_menu -->
    
    <div id="tooplate_middle_subpage">
     
        <form name="f1" method="post" action="lablogin1.php" align="center">
            <h5 align="center">     
            <table border="2" align="center" >
               
                
         <?php
          include 'datbaseconnect.php ';
          $query="select * from tbl_lab";
          $result= mysql_query($query); 
           session_start();
          ?>
                
          <tr><td>LAB NAME: </td> <td><select name="lname"  style="max-width:100%;">
               <option value="0">SELECT LAB NAME</option>
          <?php while($row=mysql_fetch_assoc($result))
          { ?>
               <option value="<?php echo "{$row['labname']}"?>">   <?php echo "{$row['labname']}"?></option>
          <?php } ?>
                  </select></td> </tr>
          <tr><td>POSITION: </td> <td><select name="pos"  style="max-width:100%;">
                    <option value="admin"> ADMIN </option>
                    <option value="user">  USER </option>
                 </select></td> </tr>
           <tr> <td>NAME: </td> <td><input type="text" name="name" placeholder="user name" required></td> </tr>
           <tr><td>PASSWORD:</td><td><input type="password" name="pass" placeholder="password" required></input></td></tr>
           </table> 
            </h5>
            <p><input type="submit" value="Sign In"></p>

          

        </form>
      
        <?php 
        if(isset($_GET['ans']))
        {
           // echo "<h3 align=center>status: ".$_GET['ans'];
            echo "<script lang='javascript'> alert ('{$_GET['ans']}') </script>" ;
        }
        ?>
        
    
    </div>
        
        
</div> <!-- end of wrapper -->

<div id="tooplate_cr_wrapper">
	<div id="tooplate_cr">
    	
        

    </div> <!-- end of footer wrapper -->
</div> <!-- end of footer -->

</body>
</html>