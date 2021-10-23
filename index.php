<?php


require_once './Core/core.php';
require_once './Controller/HomeController.php';
require_once './Controller/ProdutosController.php';
require_once './vendor/autoload.php';
require_once './Model/Conexao.php';
require_once './Model/Banco.php';


$template = file_get_contents('./Template/index.html');

ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplPronto;