<?php

class PersonService extends SQLite3  {
	
	function __construct() {
        $this->open('congregation.db');
  	}

	public function getPersonByID($id){
		$results = $this->query("SELECT * FROM person where person_id = ".$id );              

		return extractArray($results, array());
	}

	public function getPersonByName($id){
		$results = $this->query("SELECT * FROM person where name = ".$id );              

		return extractArray($results, array());
	}

	public function getPersonByCongregationID($id){
		$results = $this->query("SELECT * FROM person where congregation_id = ".$id );              

		return extractArray($results, array());
	}

	private function extractArrayBasic($queryResult, $row){
    $i = 0; 

     while($res = $queryResult->fetchArray()){ 

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