<?php

require 'PersonService.php';

class CongregationService extends SQLite3 {

  function __construct() {
        $this->open('congregation.db');
  }

	public function getCongregationByID($id){
		$results = $this->query("SELECT * FROM congregation where congregation_id = ".$id );              

		return extractArrayBasic($results, array());
	}

	public function getCongregationByUserID($userID){
		$results = $this->query("SELECT * FROM congregation where user_id = " . $userID);
		return extractArrayBasic($results, array());
	}

  public function getCongregationAndPersonByID($id){
    $dataCongregation = extractArrayBasic(getCongregationByID($id), array());

    $personService = new PersonService();
    $persons = $personService->getPersonByCongregationID($id);

    $dataCongregation[0]['persons'] = $persons;

    return $dataCongregation;
  }

  private function extractArrayBasic($queryResult, $row){
    $i = 0; 

     while($res = $queryResult->fetchArray()){ 

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