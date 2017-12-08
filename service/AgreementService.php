<?php
require 'TimeLapseService.php';

class AgreementService {

	function __construct() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $this->db = new PDO($config['url_sql']);
  	}
	
	public function getAgreementByID($id){
		$results = $this->db->query("SELECT * FROM agreement where agreement_id = ".$id );              

		return $this->extractArrayBasic($results, array());
	}

	public function getAgreementByCongregationAndTimeLapse($congregation, $timeLapse){
		$results = $this->db->query("SELECT * from agreement where congregation_id = ".$congregation." and time_lapse_id = " . $timeLapse);
		return $this->extractArrayBasic($results, array());
	}

	public function getAgreementInTimeLapse($timeLapse){
		$results = $this->db->query("SELECT * from agreement where time_lapse_id = " . $timeLapse);
		return $this->extractArrayBasic($results, array());
	}

	public function insertAgreement($json){
      try{
          $insert = "INSERT INTO agreement (congregation_id, person_id, time_lapse_id) VALUES ($json->congregation_id, $json->person_id, $json->time_lapse_id);";
          $results = $bd->exec($insert);
          return true;
        } catch(Exception $e){
          return false;
        }
    }

    public function updateAgreement($json){
      try{
          $insert = "UPDATE  agreement SET congregation_id = $json->congregation_id , person_id = $json->person_id, time_lapse_id  = $json->time_lapse_id WHERE agreement_id = $json->agreement_id;";
          $results = $bd->exec($insert);
          return true;
        } catch(Exception $e){
          return false;
        }
    }

    public function deleteAgreement($json){
      try{
          $insert = "DELETE FROM agreement WHERE agreement_id = $json->agreement_id;";
          $results = $bd->exec($insert);
          return true;
        } catch(Exception $e){
          return false;
        }
    }

	function extractArrayBasic($queryResult, $row){
		$personService = new PersonService();
		$congregationService = new CongregationService();
		$timeLapseService = new TimeLapseService();
	    $i = 0; 

	    if(is_null($queryResult) || empty($queryResult)){
	      return array("status"=>400, "message"=>"query not found");
	    }

	    foreach ($queryResult as $res) { 

	        $row[$i]['agreement_id'] = $res['agreement_id']; 
	        $row[$i]['congregation'] = $congregationService->getCongregationByID($res['congregation_id']); 
	        $row[$i]['person'] = $personService->getPersonByID($res['person_id']);
	        $row[$i]['time_lapse'] = $timeLapseService->getTimeLapseByID($res['time_lapse_id']);

	        $i++; 

	    }
     
      	return $row;
  }
}