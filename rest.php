<?php
/**
 * Created by PhpStorm.
 * User: Fabiano
 * Date: 29/05/2016
 * Time: 19:11
 */
//use GPLAC\Unidade;

include 'vendor/autoload.php';

if(!$_POST){
	$_POST =  file_get_contents ( "php://input" );
}
$_POST = json_decode ($_POST, true);


/**
 * Recebe a classe e o metodo desejado
 */
$classe = "\GPLAC\\".$_POST['classe'];

$metodo = $_POST['metodo'];
$ob = $_POST['data'];

$control = new $classe();

$control->$metodo();

//$dao = new \GPLAC\EnemDAO();
//$sabado = $dao->gerarPainel('2016-11-05');
//$domingo = $dao->gerarPainel('2016-11-06');
//echo '<pre>';
//var_dump(array('sabado'=>$sabado, 'domingo'=>$domingo));
