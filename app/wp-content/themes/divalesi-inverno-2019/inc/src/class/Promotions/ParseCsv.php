<?php
namespace Divalesi\Promotions;

class ParseCsv 
{
    private $path_csv;
    private $structure;
    private $header;
    private $handler;

    public function __construct($path){
        $this->path_csv = $path;
        $this->structure = array();
    }

    /**
     * * Set the header that going to use as array keys
     */
    private function setHeader(){
        $this->handler = fopen($this->path_csv, "r");
        $this->header = explode(",",fgets($this->handler));
    }

    /**
     * * Generate a array with the promoitions rules (decribed in $path_csv)
     * @return array $this->structure - promotions rules as array structure
     */
    public function data(){
        $this->setHeader();

		while ($data_row = fgetcsv($this->handler,1000, ",")) {
            for ($i=0; $i < count($this->header) - 1; $i++) { 
                $key = trim(strtolower($this->header[$i]));

                if(!isset($this->structure[$data_row[4]])){
                    $this->structure[$data_row[4]] = array();
                }

                if(!isset($this->structure[$data_row[4]][$key])){
					$this->structure[$data_row[4]][$key] = array();
				}

                if($data_row[$i] !== ""){
                    array_push($this->structure[$data_row[4]][$key],$data_row[$i]);
                }
            }	
            
		}

        fclose($this->handler);

        return $this->structure;
    }
}