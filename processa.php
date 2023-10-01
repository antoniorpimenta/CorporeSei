
Código para ler os dados e exibir em uma tabela HTML: processa.php

<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet; //classe responsável pela manipulação da planilha


function readData($arquivo){

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

%$spreadsheet = $reader->load($arquivo);
$sheet_count = $spreadsheet->getSheetCount();

for ($i=0 ; $i < $sheet_count ; $i++) {
    $sheet = $spreadsheet->getSheet($i);

    // processa os dados da planilha
}
$sheet = $spreadsheet->getActiveSheet();

//Coluna - Retira o título(2)

echo '<table border="1" cellpadding="8" style="margin-left:100px;">';
foreach ($sheet->getRowIterator(2) as $row) {
    $cellInterator = $row->getCellIterator();
    $cellInterator->setIterateOnlyExistingCells(false);

    echo '<tr>';
    //Linha
    foreach ($cellInterator as $cell) {
        if(!is_null($cell)){
            $value = $cell->getCalculatedValue();
            echo "<td> $value </td>";
        }
    }
    echo '</tr>';
}
echo "</table>";
}

$dados = $_FILES['arquivo'];

var_dump($dados);


$route = $_FILES['arquivo']['tmp_name'];
readData($route);
//$route = 'spreadsheet1.xlsx';
if(!empty($route)){


}else{
    echo "null";
}


?>
Re