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

  private function extractArrayBasic($queryResult, $row){
    $i = 0; 

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