<ul>
	<li><a href="{{urlFor('home')}}">Home</a></li>
	{%if auth %}
		your Srujanakura ID Number  is <h5>{{ auth.sru_id}}</h5>
	{%else%}
		<li><a href="{{urlFor('register')}}">SinIn | Login</a></li>
	{%endif%}
	
	

</ul>