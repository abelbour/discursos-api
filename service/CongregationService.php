<?php
require 'PersonService.php';

class CongregationService {

  private $db;

  function __construct() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $this->db = new PDO($config['url_sql']);
  }

	public function getCongregationByID($id){
		$results = $this->db->query("SELECT * FROM congregation where congregation_id = ".$id );              

		return $this->extractArrayBasic($results, array());
	}

	public function getCongregationByUserID($userID){
		$results = $this->db->query("SELECT c.* FROM congregation c join user_congregation uc on uc.congregation_id = c.congregation_id join user u on u.user_id = uc.user_id where u.user_id = " . $userID);
		return $this->extractArrayBasic($results, array());
	}

  public function getCongregationAndPersonByID($id){
    $dataCongregation = $this->getCongregationByID($id);
    $personService = new PersonService();
    $persons = $personService->getPersonByCongregationID($id);

    $dataCongregation[0]['persons'] = $persons;

    return $dataCongregation;
  }

  public function insertCongregation($json){
    try{
      $insert = "INSERT INTO congregation (name, address, description, time_meeting, size_id) VALUES ($json->name, $json->address, $json->description, $json->time_meeting, $json->size_id);";
      $results = $bd->exec($insert);
      return true;
    } catch(Exception $e){
      return false;
    }
    
  }

  public function updateCongregation($json){
    try{
      $insert = "UPDATE congregation SET name = $json->name, address = $json->address, description = $json->description, time_meeting = $json->time_meeting, size_id = $json->size_id WHERE congregation_id = $json->congregation_id;";
      $results = $bd->exec($insert);
      return true;
    } catch(Exception $e){
      return false;
    }
    
  }

  public function insertUserCongregation($json){
    try{
      $insert = "INSERT INTO user_congregation (user_id, congregation_id) VALUES ($json->user_id, $json->congregation_id);";
      $results = $bd->exec($insert);
      return true;
    } catch(Exception $e){
      return false;
    }
    
  }

  public function deleteCongregation($json){
    try{
      $insert = "DELETE FROM congregation WHERE congregation_id = $json->congregation_id;";
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

        $row[$i]['congregation_id'] = $res['congregation_id']; 
        $row[$i]['name'] = $res['name']; 
        $row[$i]['address'] = $res['address'];
        $row[$i]['description'] = $res['description'];
        $row[$i]['time_meeting'] = $res['time_meeting'];
        $row[$i]['size_id'] = $res['size_id']; 

        $i++; 

    }
     
      return $row;
  }
}

?>