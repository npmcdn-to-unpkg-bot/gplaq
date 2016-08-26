<?php
include '../vendor/autoload.php';

function tabelaEnem()
{
    $arquivo = fopen ('D:enem.csv', 'r');
    $con = mysqli_connect("localhost","root","", "gplac");

    while(!feof($arquivo)) {
        $linha = fgets($arquivo, 1035);

        $dados = explode(';', $linha);

        if ($dados[0] != 'Objeto' && !empty($linha)) {

            $dma = explode('/',$dados[1]);

            $query = sprintf("INSERT INTO enem (codigo, dataprevista, rota, ordem, destinatario, logradouro, bairro, cidade, uf, sabatina) VALUES ('%s', '%s', '%s', %d, '%s', '%s', '%s', '%s', '%s', '%s')",

                mysqli_real_escape_string($con, $dados[0]),
                mysqli_real_escape_string($con, date($dma[2].'-'.$dma[1].'-'.$dma[0])),
                mysqli_real_escape_string($con, $dados[2]),
                mysqli_real_escape_string($con, $dados[3]),
                mysqli_real_escape_string($con, $dados[4]),
                mysqli_real_escape_string($con, $dados[5]),
                mysqli_real_escape_string($con, $dados[6]),
                mysqli_real_escape_string($con, $dados[7]),
                mysqli_real_escape_string($con, $dados[8]),
                mysqli_real_escape_string($con, $dados[9])
//            mysqli_real_escape_string($con, $dados[10])
            );
            mysqli_query($con, $query);
        }
    }

    fclose($arquivo);

}
function tabelaEnemInterior()
{
    $arquivo = fopen ('D:\enem2016.csv', 'r');
    $con = mysqli_connect("localhost","root","", "gplac");

    while(!feof($arquivo)) {
        $linha = fgets($arquivo, 1035);

        $dados = explode(';', $linha);

        if ($dados[0] != 'Objeto' && !empty($linha)) {

            $dma = explode('/',$dados[1]);

            $query = sprintf("INSERT INTO interior (codigo, dataprevista, codigoretorno, nomerota, destinatario, logradouro, bairro, cep, cidade, sabatina, provaespecial, peso) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d)",

                mysqli_real_escape_string($con, $dados[0]),
                mysqli_real_escape_string($con, date($dma[2].'-'.$dma[1].'-'.$dma[0])),
                mysqli_real_escape_string($con, $dados[2]),
                mysqli_real_escape_string($con, $dados[4]),
                mysqli_real_escape_string($con, $dados[5]),
                mysqli_real_escape_string($con, $dados[6]),
                mysqli_real_escape_string($con, $dados[7]),
                mysqli_real_escape_string($con, $dados[8]),
                mysqli_real_escape_string($con, $dados[9]),
                mysqli_real_escape_string($con, $dados[10]),
                mysqli_real_escape_string($con, $dados[11]),
                mysqli_real_escape_string($con, $dados[12])
            );
            mysqli_query($con, $query);
        }
    }

    fclose($arquivo);

}
function tabelaOrdem()
{
    $arquivo = fopen ('D:enem.csv', 'r');
    $con = mysqli_connect("localhost","root","", "gplac");

    while(!feof($arquivo)) {
        $linha = fgets($arquivo, 1024);

        $dados = explode(';', $linha);

        if ($dados[0] != 'Objeto' && !empty($linha)) {


            $query = sprintf("INSERT INTO ordem (id, escola, endereco, bairro) VALUES (%d, '%s', '%s', '%s')",
                mysqli_real_escape_string($con, $dados[3]),
                mysqli_real_escape_string($con, $dados[4]),
                mysqli_real_escape_string($con, $dados[5]),
                mysqli_real_escape_string($con, $dados[6])
            );
            mysqli_query($con, $query);
        }
    }

    fclose($arquivo);

}
function tabelaRotas()
{
    $arquivo = fopen ('D:enem.csv', 'r');
    $con = mysqli_connect("localhost","root","", "gplac");

    while(!feof($arquivo)) {
        $linha = fgets($arquivo, 1024);

        $dados = explode(';', $linha);

        if ($dados[0] != 'Objeto' && !empty($linha)) {


            $query = sprintf("INSERT INTO rota (id) VALUES (%d)",
                mysqli_real_escape_string($con, $dados[2])
            );
            mysqli_query($con, $query);
        }
    }

    fclose($arquivo);

}

/*
 * Informe a função aqui *****
 */