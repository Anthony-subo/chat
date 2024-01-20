<?php
$strValue = "This is my first cookie";
setcookie ("mycookie", $strValue);
echo $strValue;
?>
<!DOCTYPE html PUBLIC "=//W3C//DTD XHMTL 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhmtl" xml:lang="en">
<head><title>PHP Script using Cookies</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head> 
<body>
<?php
echo "<p> A cookie has been set. </p>";
?>
</body> 
</html