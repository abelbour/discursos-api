<?php

class SketchService {

	private $db;
	
	function __construct() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $this->db = new PDO($config['url_sql']);
  	}

	public function getSketchByNumber($number){
		$results = $this->db->query("SELECT * FROM sketch where sketch_number = ".$number );              

		return $this->extractArrayBasic($results, array());
	}

	public function getSketchsByPersonID($personId){
		$results = $this->db->query("SELECT s.* FROM sketch s join person_sketch sp on sp.sketch_id = s.sketch_id where sp.person_id = ".$personId );              

		return $this->extractArrayBasic($results, array());
	}

	private function extractArrayBasic($queryResult, $row){
    $i = 0; 

    if(is_null($queryResult) || empty($queryResult)){
      return array("status"=>400, "message"=>"query not found");
    }

     foreach ($queryResult as $res) { 
          $row[$i]['sketch_id'] = $res['sketch_id']; 
          $row[$i]['title'] = $res['title']; 
          $row[$i]['sketch_number'] = $res['sketch_number']; 

          $i++;
      }

      return $row;
  }
}