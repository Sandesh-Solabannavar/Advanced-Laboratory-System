<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		error_reporting(E_ALL ^ E_DEPRECATED);
        $con=  mysql_connect('localhost', 'root', '');
        mysql_select_db('lab', $con) or die(mysql_error());
        ?>
    </body>
</html>
