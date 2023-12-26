<?php

class Core
{


	/**
	 * @param array $routes array associativo contendo as rodas do site.
	 * @return void étodo funcional sem retorno.
	 */
	public function run ($routes)
	{

		// Variável url para testar o padrão regex definido.
		$url = '/';

		$_GET['url'] = 'users/1'; // Para testar as requisições $_GET['users]

		// Definido no .htaccess a chave $_GET['url] se estiver vazio nada será incrementado.
		isset($_GET['url']) ? $url .= $_GET['url'] : '';

		foreach($routes as $path => $controller)
		{

			$pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#'; // A cerquilha é o limitador

			if(preg_match($pattern, $url, $matches))
			{
				array_shift($matches);
				[$currentController, $action] = explode('@', $controller);

				require_once __DIR__ . "/../controllers/$currentController.php";

				$newController = new $currentController();
				$newController->$action();
			}

		}
	}

}