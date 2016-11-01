<?php
require_once '../vendor/autoload.php';

Use Carneiro\Login\Login;
Use Carneiro\Session\SessionController;

session_start();

$sessionControl = new SessionController();

if (!$sessionControl->isLoggedIn($_SESSION))  
{
	echo "<pre>You have no Access</pre>";
	echo "<a href='../index.php'>Back to Index</a>";
	die();	
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HelloFresh Test</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <div class="container ui-widget">
        <h2>Search</h2>
        <br/>
        <form>
        	<label for="query">Type the Name or E-mail</label>
        	<input id="query" type="text" />
        </form>
        <br />
        <a href='Logout.php'>LogOut</a>

    </div>


    
  
</body>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
	    $( "#query" ).autocomplete({
			source: function (request, response) {
			    $.ajax({
				  type: "POST",
				  url:"../api/SearchUserAPI.php",
				  data: request,
				  success: response,
				  dataType: 'json'
				});
			}
	    });

    });
</script>

</html>
