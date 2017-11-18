<?php

class PersonService {
	
	private $db;

	function __construct() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $this->db = new PDO($config['url_sql']);
  	}

	public function getPersonByID($id){
		$results = $this->db->query("SELECT * FROM person where person_id = ".$id );              

		return $this->extractArrayBasic($results, array());
	}

	public function getPersonByName($id){
		$results = $this->db->query("SELECT * FROM person where name like '%".$id."%'" );              

		return $this->extractArrayBasic($results, array());
	}

	public function getPersonByCongregationID($id){
		$results = $this->db->query("SELECT * FROM person where congregation_id = ".$id );              

		return $this->extractArrayBasic($results, array());
	}

	public function getPersonAndSketchByID($id){
		$persons = $this->extractArrayBasic(getPersonByID($id), array());

		$sketchs = $sckechService->getSketchsByPersonID($id);
		$persons[0]['sketchs'] = $sketchs;

		return $persons;
	}

	public function extractArrayBasic($queryResult, $row){
    $i = 0; 

     foreach ($queryResult as $res) {
 		  $row[$i]['person_id'] = $res['person_id']; 
          $row[$i]['name'] = $res['name']; 
          $row[$i]['phone'] = $res['phone'];
          $row[$i]['email'] = $res['email'];
          $row[$i]['congregation_id'] = $res['congregation_id'];
          $row[$i]['person_type_id'] = $res['person_type_id'];
          $i++;
     }

      return $row;
  }
}