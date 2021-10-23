<?php

class Core{

    public function start($urlGet){
			if (isset($urlGet['metodo'])) {
				$acao = $urlGet['metodo'];
			} else {
				$acao = 'index';
			}

			if (isset($urlGet['pg'])) {
				$controller = ucfirst($urlGet['pg'].'Controller');
			} else {
				$controller = 'HomeController';
			}
			

			if (!class_exists($controller)) {
				$controller = 'ErroController';
			}


			
			call_user_func_array(array(new $controller, $acao), array());

		}

}