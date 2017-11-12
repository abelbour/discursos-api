<?php

class SketchService  extends SQLite3 {
	
	function __construct() {
        $this->open('congregation.db');
  	}

	public function getSketchByNumber($number){
		$results = $this->query("SELECT * FROM sketch where sketch_number = ".$number );              

		return extractArray($results, array());
	}

	private function extractArrayBasic($queryResult, $row){
    $i = 0; 

     while($res = $queryResult->fetchArray()){ 
          $row[$i]['sketch_id'] = $res['sketch_id']; 
          $row[$i]['title'] = $res['title']; 
          $row[$i]['sketch_number'] = $res['sketch_number']; 

          $i++;
      }

      return $row;
  }
}