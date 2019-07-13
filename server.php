
<?php
session_start();
echo $_SERVER['REQUEST_METHOD'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
     <input type="text" name="input" value="input" />
    <input type="submit" name="upvote" value="Upvote" />
</form>

</body>
</html>