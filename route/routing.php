<?php 
	//вычислить маршрут из адресной строки
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$psth = explode('/', $host) [$num];

	if($path == '' OR $path == 'index' OR $path == 'index.php') {
		$response = Controller::StartSite();
	}
	elseif($path == 'all') {
		$response = Controller::AllNews();
	}
	elseif($psth == 'category' and isset($_GET['id'])) {
		$response = Controller::NewsByCAtID($_Get['id']);
	}
	elseif($path == 'news' and isset($_GET['id'])) {
		$response = Controller::NewsByID($_GET['id']);
	}
	else{
		$response = Controller::error404();
	}
?>