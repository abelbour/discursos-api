<?php

class TimeLapseService {

  private $db;

	function __construct() {

        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $this->db = new PDO($config['url_sql']);
  	}

  	public function getTimeLapseByID($id){
  		$results = $this->db->query("SELECT * FROM time_lapse where time_lapse_id = ".$id );              

		  return $this->extractArrayBasic($results, array());
  	}

  	public function getTimeLapseCurrent(){
  		$results = $this->db->query("SELECT * FROM time_lapse ORDER BY time_lapse_id DESC LIMIT 3" );              

		  return $this->extractArrayBasic($results, array())[2];
  	}

  	public function getTimeLapseLast(){
  		$results = $this->db->query("SELECT * FROM time_lapse ORDER BY time_lapse_id DESC LIMIT 3" );              

		  return $this->extractArrayBasic($results, array())[1];
  	}

  	public function getTimeLapseNext(){
  		$results = $this->db->query("SELECT * FROM time_lapse ORDER BY time_lapse_id DESC LIMIT 3" );              
		  return $this->extractArrayBasic($results, array())[0];
  	}

  	private function extractArrayBasic($queryResult, $row){
	    $i = 0; 

	    foreach ($queryResult as $res) { 

	        $row[$i]['time_lapse_id'] = $res['time_lapse_id']; 
	        $row[$i]['date_from'] = $res['date_from'];
	        $row[$i]['date_to'] = $res['date_to'];

	        $i++; 

	    }
     
      return $row;
  }
}  	