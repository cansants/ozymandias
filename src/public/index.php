<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

//$app = new \Slim\App;
$app = new \Slim\App(["settings" => $config]);

// Snippet from PHP Share: http://www.phpshare.org

function formatSizeUnits($bytes){
  
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

// Get container
$container = $app->getContainer();
/*
$container['view'] = new \Slim\Views\PhpRenderer( $templatesPath ,[
	//'cache' => __DIR__ . '../cache'
	'cache' => $cachePath
]);
*/
// Register component on container
$container['view'] = function ($container) {

		//$templatesPath = __DIR__.'/../templates';
		$templatesPath = '/home/pi/traspas/Slim/src/templates';
		//$cachePath = __DIR__.'/../cache';
		$cachePath = '/home/pi/traspas/Slim/src/cache';

    $view = new \Slim\Views\Twig($templatesPath, [
        'cache' => false,
				'debug' => true,
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

		$view->addExtension(new \Twig_Extension_Debug());


    return $view;
};

//$app->view->setTemplatesDirectory('/home/pi/traspas/Slim/src/templates');

// Home Path
$app->get('/', function (Request $request, Response $response) {

	//echo "2 Default GET route";
	$contador=0;
	$total = count(glob("/home/pi/traspas/default/*.jpg"));
	$compress = count(glob("/home/pi/traspas/compressed/*.jpg"));
	$contador = $total - $compress;

	//$contador = 0;
	//$basePath = $request->getUri()->getBasePath();
	//$response = $this->view->render($response, "home.phtml", ["contador" => $contador ]);

	$response = $this->view->render($response, 'index.twig', [
			'title' 			=> 'Ozymandias',
			'contador' 	=> $contador,
	]);

	return $response;
})->setName('home');

$app->get('/comparador', function (Request $request, Response $response) {
	$imagenes = glob("/home/pi/traspas/compressed/*.jpg");
	$total = count($imagenes);

	$originalesPath = '/home/pi/traspas/default/';
	$compressPath = '/home/pi/traspas/compressed/';

	$seleccion = [
		str_replace( $compressPath, '', $imagenes[ rand(0,$total) ]),
		str_replace( $compressPath, '', $imagenes[ rand(0,$total) ]),
		str_replace( $compressPath, '', $imagenes[ rand(0,$total) ]),
	];

	$datos = [];

	foreach ( $seleccion as $imagen ){

		$original = [
			'filesize' => formatSizeUnits(filesize($originalesPath.$imagen)),
			'exif' => exif_read_data($originalesPath.$imagen),
		];

		$comprimida = [
			'filesize' => formatSizeUnits(filesize($compressPath.$imagen)),
			'exif' => exif_read_data($compressPath.$imagen),
		];

		$datos[ $imagen ] = [
			'original' => $original,
			'comprimida' => $comprimida,
		];

	}

	//$response->getBody()->write("<pre>".print_r($seleccion,1)."<pre>");

	$response = $this->view->render($response, 'comparador.twig', [
			'title' 			=> 'Ozymandias',
			'seleccion' => $seleccion,
			'datos' => $datos,
	]);

	return $response;
})->setName('comparador');

$app->get('/cover/{calidad}/{imagen}', function (Request $request, Response $response,  $args) {
//$app->get('/cover/{data:\w+}', function($request, $response, $args) {
	
	$calidad = $request->getAttribute('calidad', 'default');
	$filename = $request->getAttribute('imagen');
	
	//$data = $args['data'];
	
	//$image = @file_get_contents("http://localhost/main/media/image/p/$data");
	$image = @file_get_contents("/home/pi/traspas/".$calidad."/$filename");
	
	if($image === FALSE) {
		$handler = $this->notFoundHandler;
		return $handler($request, $response);
	}
	
	$response->write($image);
	return $response->withHeader('Content-Type', FILEINFO_MIME_TYPE);
	
	
})->setName('cover');

$app->get('/hello/{name}', function (Request $request, Response $response) {

    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    $tickets = array();

    $response = $this->view->render($response, "home.phtml", ["tickets" => $tickets]);

    return $response;
});


$app->run();
