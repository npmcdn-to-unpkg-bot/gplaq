<?php
/**
 * Created by PhpStorm.
 * User: 34604014
 * Date: 25/05/2016
 * Time: 14:43
 */

$texto = $_POST['lista'];
$lista_de_objetos = array();
$dados = explode("\n", $texto);
$i=0;

function checarObjeto($obj){

    $cdd = rtrim(substr($obj, 11, 13));
    if($cdd == "FU1") {
        return  rtrim($obj);
    }
}

$qtde = count($dados);

for ($i=0;$i<$qtde;$i++){
    if(checarObjeto($dados[$i])){
        $lista_de_objetos[] = checarObjeto($dados[$i]);
    }

}

  ?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Objetos</th>
    </tr>
    </thead>
    <tboby>
        <?php foreach( $lista_de_objetos as $row ) { ?>
            <tr>
                <td><?php echo( $row ); ?></td>
            </tr>
        <?php } ?>
    </tboby>

</table>
</body>
</html>