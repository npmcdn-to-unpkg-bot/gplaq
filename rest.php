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

