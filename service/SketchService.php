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

	public function insertSketch($json){
		try{
	      $insert = "INSERT INTO sketch (title, sketch_number) VALUES ($json->title, $json->sketch_number)";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }
	}

	public function updateSketch($json){
		try{
	      $insert = "UPDATE sketch SET title = $json->title, sketch_number = $json->sketch_number WHERE sketch_number = $json->sketch_number";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }
	}

	public function deleteSketch($sketch_number){
		try{
	      $insert = "DELETE FROM sketch WHERE sketch_number = $sketch_number";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }
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