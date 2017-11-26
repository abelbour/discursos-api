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

    public function insertTimeLapse($json){
      try{
          $insert = "INSERT INTO time_lapse (date_from, date_to) VALUES ($json->date_from, $json->date_to);";
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

	        $row[$i]['time_lapse_id'] = $res['time_lapse_id']; 
	        $row[$i]['date_from'] = $res['date_from'];
	        $row[$i]['date_to'] = $res['date_to'];

	        $i++; 

	    }
     
      return $row;
  }
}  	