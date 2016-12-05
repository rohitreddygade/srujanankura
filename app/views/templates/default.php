<!DOCTYPE html>
<html>
<head>
	<title>Website | {%block title %} {% endblock %} </title>
</head>
<body>
{%include 'templates/partials/nav.php' %} 
{%block content%} 
{%endblock%}
</body>
</html>