<?php
/**
 * Created by PhpStorm.
 * User: 80540384
 * Date: 22/08/2016
 * Time: 13:37
 */
/** Error reporting */


namespace GPLAC;

class DownLoadExcel{

    protected $objeto;
    protected $dao;

    public function __construct()
    {
        $this->objeto = new Objeto();
        $this->dao = new ObjetoDAO();
    }

    function download(){


        $lista_de_objetos = $this->dao->listarDoDia();

        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('America/Manaus');

        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        $objPHPExcel = new \PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Fabiano Costa")
            ->setLastModifiedBy("Fabiano Costa")
            ->setTitle("Gerenciador de LC-AO GPLAQ")
            ->setSubject("Gerenciador de LC-AO GPLAQ")
            ->setDescription("SISTEMA Gerenciador de LC-AO GPLAQ")
            ->setKeywords("Gerenciador de LC-AO GPLAQ")
            ->setCategory("Correios");


        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Codigo')
            ->setCellValue('B1', 'Unidade')
            ->setCellValue('C1', 'Data de Lançamento');

        $linha = 2;
        $qtde=0;
        while ($qtde < count($lista_de_objetos)) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$linha, $lista_de_objetos[$qtde]->codigo)
                ->setCellValue('B'.$linha, $lista_de_objetos[$qtde]->identificador->nomeunidade)
                ->setCellValue('C'.$linha, date("d/m/Y", strtotime($lista_de_objetos[$qtde]->data_lancamento)));
            $qtde = $qtde+1;
            $linha = $linha+1;
        }

        $objPHPExcel->getActiveSheet()->setTitle('LC-AO');
        $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
        $nome = date('dmY');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="planilha.xlsx"');
        header("Content-Disposition: attachment;filename='".$nome.".xlsx'");
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $objWriter->save('php://output');
        exit;

    }


}
include '../vendor/autoload.php';
$excel = new DownLoadExcel();
$excel->download();
