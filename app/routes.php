<?php
	
	$w_routes = array(

		['GET|POST', '/', 'Default#home', 'home'],
		['GET', '/help', 'Default#help', 'help'],

		// user
		['GET|POST', '/registerQ', 'Logger#quickRegister', 'quickRegister'],
		['GET|POST', '/register', 'Logger#register', 'register'],
		['GET|POST', '/auth', 'Logger#log', 'log'],
		['GET', '/logout', 'Logger#logout', 'logout'],
		['GET', '/profile', 'User#profile', 'profile'],
		['GET|POST', '/forget', 'Logger#forgetpassword', 'forget'],
		
		['GET|POST', '/confirmation/[:token]/[:id]', 'Mail#mailConfirmationAccount', 'mailAccount'],
		['GET|POST', '/passwordRecovery/[:token]/[:id]', 'Mail#mailPasswordRecovery', 'mailPassword'],
		['GET|POST', '/regenerateMailAccount/[:token]/[:id]', 'Mail#regenerateMailAccount', 'regenerateMailAccount'],
		
		['GET', '/deleteaccount', 'User#deleteaccount', 'deleteAccount'],
		['GET', '/veriftoken', 'Logger#veriftoken', 'verifToken'],
		['GET', '/userhome', 'User#userhome', 'userhome'],
		['GET|POST', '/changePassword/[:id]', 'User#changepassword', 'changepassword'],
		['GET|POST', '/controlPassword/[:id]', 'User#controlChangePassword', 'controlChangePassword'],
		['GET|POST', '/profileModify', 'User#profilmodify', 'profilmodify'],
		['GET|POST', '/control', 'User#controlProfilModify', 'controlProfilModify'],
		['GET|POST', '/uploadUser', 'User#uploaduserpicture', 'uploadUserPicture'],

		// recherche (2 routes différentes si le user est connecté (home_user) ou non (home_nolog) )
		['GET', '/recherche/', 'Search#search', 'home_user'],
		['GET', '/recherche/', 'Search#search', 'home_nolog'],
		['GET', '/autocompletion/', 'Search#completedSearch', 'completed_search'],

		// file upload
		['GET|POST', '/telechargement/video/','File#uploadFiles','upload_files' ],
		['POST', '/telechargement/video/add','File#addFiles','add_files' ],


		// pour abonnement
		['GET|POST', '/abonnement/','Upgrade#upgrade','upgrade' ],
	);