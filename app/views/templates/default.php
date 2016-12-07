<!DOCTYPE html>
<html>
<head>
	<title>Website | {%block title %} {% endblock %} </title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</head>
<body>
{%include 'templates/partials/message.php' %} 
{%include 'templates/partials/nav.php' %} 
 <body>
      <div class="container">
      {%block content%} 
		{%endblock%}
      </div>
 </body>

</body>
</html>