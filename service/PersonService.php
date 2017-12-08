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

	public function insertPerson($json){
	    try{
	      $insert = "INSERT INTO person (name, phone, email, congregation_id, person_type_id) VALUES ($json->name, $json->phone, $json->email, $json->congregation_id, $json->person_type_id);";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }    
	}

	public function insertPersonSketch($json){
	    try{
	      $insert = "INSERT INTO person_sketch (person_id, sketch_id) VALUES ($json->person_id, $json->sketch_id);";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }    
	}

	public function updatePerson($json){
	    try{
	      $insert = "UPDATE person SET name = $json->name, phone = $json->phone, email = $json->email, congregation_id = $json->congregation_id, person_type_id = $json->person_type_id  WHERE person_id = $json->person_id;";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }    
	}

	public function deletePerson($json){
	    try{
	      $insert = "DELETE person WHERE person_id = $json->person_id;";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }    
	}

	public function deletePersonSketch($person_id, $sketch_id){
	    try{
	      $insert = "DELETE person_sketch WHERE person_id = $person_id AND sketch_id = $sketch_id;";
	      $results = $bd->exec($insert);
	      return true;
	    } catch(Exception $e){
	      return false;
	    }    
	}

	public function extractArrayBasic($queryResult, $row){
    $i = 0; 

    if(is_null($queryResult) || empty($queryResult)){
      return array("status"=>400, "message"=>"query not found");
    }

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