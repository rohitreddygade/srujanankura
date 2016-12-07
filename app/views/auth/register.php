{%extends 'templates/default.php' %}
{% block title %} 
{%endblock%}
{% block content %}

<div class="row">
	<div class="col s6">
		<center>
			<h1>New User</h1>
			<form action="{{ urlFor('register.post')}}" method="post" autocomplete="off">
				<div>
					<input type="text" name="email" id="email" placeholder="Email" {% if request.post('email')%}value="{{request.post('email')}}"{%endif%}><br>
					{% if errors.first('email')%} {{errors.first('email')}} {%endif%}
					<input type="password" name="password" id="password" placeholder="Password " ><br>
					{% if errors.first('password')%} {{errors.first('password')}} {%endif%}
					<input type="password" name="password_again" id="password_again" placeholder="Password Again"><br>
					{% if errors.first('password_again')%} {{errors.first('password_again')}} {%endif%}					
					<input type="text" name="first_name" id="first_name" placeholder="First Name"{% if request.post('first_name')%}value="{{request.post('first_name')}}"{%endif%}><br>
					 {% if errors.first('first_name')%} {{errors.first('first_name')}} {%endif%}					
					<input type="text" name="last_name" id="last_name" placeholder="Last Name"{% if request.post('last_name')%}value="{{request.post('last_name')}}"{%endif%}><br>
					{% if errors.first('last_name')%} {{errors.first('last_name')}} {%endif%}					
					<input type="text" name="college_name" id="college_name" placeholder="College Name"{% if request.post('college_name')%}value="{{request.post('college_name')}}"{%endif%}>
					{% if errors.first('college_name')%} {{errors.first('college_name')}} {%endif%}	<br>			
					<input type="text" name="college_id" id="college_id" placeholder="College ID Number"{% if request.post('college_id')%}value="{{request.post('college_id')}}"{%endif%}>
					{% if errors.first('college_id')%} {{errors.first('college_id')}} {%endif%}	<br><br>			
					  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    					<i class="material-icons left">cloud</i>
  					 </button>
				</div>
			</form>
		</center>
	</div>
	<div class="col s6">
		<center>
			<h1>Existing User</h1>
		<form action="{{ urlFor('login')}}" method="post" >
			<input type="text" name="email" id="email" placeholder="Email or SRU Id" {% if req.post('email')%}value="{{req.post('email')}}"{%endif%}><br>
					{% if errors.first('email')%} {{errors.first('email')}} {%endif%}
					<input type="password" name="password" id="password" placeholder="Password " ><br>
					{% if errors.first('password')%} {{errors.first('password')}} {%endif%}<br>
			<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    					<i class="material-icons left">cloud</i>
  					 </button>
		</form>
		</center>
	</div>
</div>
{% endblock %}