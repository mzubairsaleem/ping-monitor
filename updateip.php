<!doctype html>
<html>
	<head>
		<title>Ping Monitor Add IP</title>
	<link rel="icon" href="images/logo 02.png" type="image/png" />
   <link href="css/styles.css" type="text/css" rel="stylesheet" />
	<meta charset="utf-8">
	</head>
<?php
$con = mysql_connect("localhost" ,"root" , "" );//hostname, host username , host password
$db = mysql_select_db("ping" , $con);
$ipaddr = $_GET['ipaddr'];
$sql = "SELECT * FROM pingip WHERE ip = '$ipaddr'";
$res = mysql_query($sql);
$data = mysql_fetch_array($res);
$ip = $data['ip'];
$name = $data['name'];
$location = $data['location'];

if($_POST)
{
$ip = $_POST['ip'];
$name = $_POST['name'];
$location = $_POST['location'];
$sql = "UPDATE pingip SET ip = '$ip', name = '$name', location= '$location' WHERE ip = '$ipaddr' ";
$res = mysql_query($sql);
if(!$res)
{ ?>
<script type="text/javascript">
alert ("<?php echo mysql_error(); ?>");
</script>
<?php
}
else{
header('location:index.php');
}
}
?>
<body>
<div id="header">
<a href="index.php" alt="Go to Home"><div id="headimg">
    	<img src="images/GCUF_Logo.png" height="120px" width="120px"/>
    </div>
    <div id="title">    
        <h1 class="ping"> Ping Cheacking Monitor </h1>
        <h2 class="ping" id="up"> Government College Uniersity Faisalabad </h2>
    </div></a>
</div>
<div id="form" align="center">
	<fieldset id="fs">
    <legend id="label1">Update IP</legend>
    	<form enctype="multipart/form-data" method="post">
        <label for="ip">Device IP : </label><br>
        <input type="text" class="add" name="ip" placeholder="Add Ip Here .!" value="<?php echo $ip; ?>" autofocus /><br>
        <label for="name">Device Name : </label><br>
        <input type="text" class="add" name="name" placeholder="Device Name" value="<?php echo $name; ?>" /><br>
        <label for="location">Device Location</label><br>
        <input type="text" class="add" name="location" placeholder="Device Location.!" value="<?php echo $location; ?>" /><br>        
        <input type="submit" class="add sub" value="Update IP" />
		</form>
	</fieldset>
</div>
<div align="center">
<h5 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:16px;">Department of IT Services<br>Government College University Faisalabad</h5>
</div>
</body>
</html>