<html>
<head>
<title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css"></link>
  </head>
  <body>
<?php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,"root","");
if(!$db_server)die("unable to connect mysql server".mysql_error());
mysql_select_db($db_database)
or
die("unable to select db".mysql_error());
echo <<<_end

<form action="task1_entry.php" method="post">
<div class="form">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name" name="name">
    <small id="nameHelp" class="form-text text-muted">We will never share your details with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="phone_number">Phone number</label>
    <input type="number" class="form-control" id="exampleInputPhone_number" placeholder="Enter Phone number" name="phone_number">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="exampleInputCity" placeholder="Enter city" name="city">
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="exampleInputCountry" placeholder="Enter country" name="country">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email" name="email">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
_end;
if(isset($_POST['name'])&&isset($_POST['phone_number'])&&isset($_POST['city'])&&isset($_POST['country'])&&isset($_POST['email']))
{
	$name=($_POST['name']);
    $phone_number=($_POST['phone_number']);
    $city=($_POST['city']);
    $country=($_POST['country']);
	$email=($_POST['email']);
    add_user($name,$phone_number,$city,$country,$email);
}
function add_user($n,$p,$c,$co,$e)
{
	$query="insert into entry values('$n','$p','$c','$co','$e')";
    $result=mysql_query($query);
	if(!$result) die("input un not run".mysql_error());
}
?>
	
</body>
</html>	
