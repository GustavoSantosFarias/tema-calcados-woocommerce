<?php
namespace Divalesi\Promotions;

class ParseCsv 
{
    private $path_csv;
    private $structure;

    public function __construct($path){
        $this->path_csv = $path;
        $this->structure = array();
    }

    public function data(){
        $handle = fopen($this->path_csv, "r");
        
        //VALORES DA PRIMEIRA LINHA DA TABELA (CHAVES)
        $header = explode(",",fgets($handle));

		while ($data_row = fgetcsv($handle,1000, ",")) {
			//DEFINE UM ARRAY COM CHAVE (VALORES DO ARRAY $HEADER) E VALOR (VALORES DAS LINHAS ARMAZENADAS EM $DATA_ROW)

            for ($i=0; $i < count($header) - 1; $i++) { 
                $index = trim(strtolower($header[$i]));

                if(!isset($this->structure[$data_row[4]])){
                    $this->structure[$data_row[4]] = array();
                }

                if(!isset($this->structure[$data_row[4]][$index])){
					$this->structure[$data_row[4]][$index] = array();
				}

                if($data_row[$i] !== ""){
                    array_push($this->structure[$data_row[4]][$index],$data_row[$i]);
                }
            }	
            
		}

        fclose($handle);

        return $this->structure;
    }
}