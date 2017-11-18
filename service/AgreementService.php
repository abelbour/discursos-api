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

	function extractArrayBasic($queryResult, $row){
		$personService = new PersonService();
		$congregationService = new CongregationService();
		$timeLapseService = new TimeLapseService();
	    $i = 0; 

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