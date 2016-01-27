<?php
	
	$w_routes = array(
		['GET', '/[:passwordError]', 'Default#home', 'home'],
		['GET|POST', '/registerQ', 'Logger#quickRegister', 'quickRegister'],
		['GET|POST', '/register', 'Logger#register', 'register'],
		['GET|POST', '/auth', 'Logger#log', 'log'],
		['GET', '/logout', 'Logger#logout', 'logout'],
		['GET', '/profile', 'User#profile', 'profile'],
		['GET', '/forget', 'Logger#forgetpassword', 'forget'],
		['GET', '/mail/[:token]/[:id]', 'Mail#mail', 'mail'],
		['GET', '/deleteaccount', 'User#deleteaccount', 'deleteAccount'],
		['GET', '/veriftoken', 'Logger#veriftoken', 'verifToken'],
		// ['GET|POST', '/connect-with-facebook', 'Facebooklogin#login', 'facebooklogin'],
		// ['GET|POST', '/fb-callback', 'Facebooklogin#fbcallback', 'fbcallback'],
	);