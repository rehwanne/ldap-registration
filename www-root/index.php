<!doctype>
<title>Milliways reg</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<form method="POST" action="reg.php">
	<input placeholder="username" required="required" name="username" type="text" pattern="[a-zA-Z0-9_-]{3,}" />
	<input placeholder="password" required="required" name="password" type="password" />
	<input placeholder="password repeat" required="required" name="password2" type="password" />
	<input type="submit" />
</form>
