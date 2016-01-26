<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/registerQ', 'Logger#quickRegister', 'quickRegister'],
		['GET|POST', '/register', 'Logger#register', 'register'],
		['GET|POST', '/auth', 'Logger#log', 'log'],
		['GET', '/logout', 'Logger#logout', 'logout'],
		['GET', '/profile', 'User#profile', 'profile'],
		['GET', '/forget', 'Logger#forgetpassword', 'forget'],
		['GET', '/mail', 'Mail#mail', 'mail'],
		['GET', '/deleteaccount', 'User#deleteaccount', 'deleteAccount'],
		['GET', '/', 'Logger#veriftoken', 'verifToken'],
		// ['GET|POST', '/connect-with-facebook', 'Facebooklogin#login', 'facebooklogin'],
		// ['GET|POST', '/fb-callback', 'Facebooklogin#fbcallback', 'fbcallback'],
	);