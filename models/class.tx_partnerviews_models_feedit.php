<?php
/*
 * Created on 08.09.2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class tx_partnerviews_models_feedit extends tx_lib_processor {

 	var $keyOfTotalResultCount = 'totalResultCount';
 	var $keyOfTotalResultCountOrgTypes = 'totalResultCountOrgTypes';
	var $keyOfResultList = 'resultList';
	var $keyOfPartnerResult = 'partnerData';
	var $keyOfOrgTypes = 'orgTypes';
	var $keyOfResultCountries = 'resultCountries';
	var $keyOfResultLanguages = 'resultLanguages';
	var $keyOfResultTitles = 'resultTitles';
	
	public function load() {
		$fe_userid = (integer) $GLOBALS['TSFE']->fe_user->user['uid'];
		$pid = (integer) array_pop(tx_div::toListArray($this->controller->context->getData('pages')));
		$fields = '*';
		$tables = 'tx_partner_main';
		$groupBy = null;
		$orderBy = 'org_name DESC';
		$where = 'hidden = 0 AND deleted = 0 ';
		$where .= ' AND pid=' . $pid . '  AND fe_user='. $fe_userid . ' AND fe_user <> "0" ';
		$limit = (integer) $this->controller->parameters['offset'];
		$limit .= ', ' . (integer) $this->controller->configurations['resultsPerView'];

		// query
		$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy, $limit);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);
		if($result) {
			$list = array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) $list[] = $row;
			$this->setFor('keyOfResultList', $list); // Result list is created as an array. tx_lib_object would work as well.
		}

		// query total results
		$query = $GLOBALS['TYPO3_DB']->SELECTquery('count(*)', $tables, $where, $groupBy, $orderBy);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);
		if($result) {
			$row = $GLOBALS['TYPO3_DB']->sql_fetch_row($result);
			$this->setFor('keyOfTotalResultCount', current($row));
		}
	}

	public function loadPartnerData(){
		if ($this['preview']<>"1"){
			$pid = (integer) array_pop(tx_div::toListArray($this->controller->context->getData('pages')));
			$fields = '*';
			$tables = 'tx_partner_main';
			$groupBy = null;
			$orderBy = 'org_name DESC';
			$where = 'hidden = 0 AND deleted = 0 AND uid=' . $this['uid'] . ' ';
			$where .= ' AND pid=' . $pid . ' ';
			$limit = (integer) $this->controller->parameters['offset'];
			$limit .= ', ' . (integer) $this->controller->configurations['resultsPerView'];
			// query
			$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy, $limit);
			$result = $GLOBALS['TYPO3_DB']->sql_query($query);

			if($result) {
				$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result);
				$keys = array_keys($row);
				foreach ($keys as $oneKey){
					$this->set($oneKey, $row[$oneKey]);
				}
			}

		}
	}

	public function loadOrgTypes(){
		$fields = '*';
		$tables = 'tx_partner_val_org_types';
		$groupBy = null;
		$orderBy = 'ot_descr_short ASC';
		$where = null;
		//$where = ' AND pid = ' . $pid . ' ';

		// query
		//$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);

		if($result) {
			$listOrgTypes = array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) $listOrgTypes[] = $row;
			$this->setFor('keyOfOrgTypes', $listOrgTypes); // Result list is created as an array. tx_lib_object would work as well.
		} else {
			print "Kein Ergebnis";
			print $query;
		}
	}

	public function loadCountries(){
		$fields = '*';
		$tables = 'static_countries';
		$groupBy = null;
		$orderBy = 'cn_short_en ASC';
		$where = null;
		//$where = ' AND pid = ' . $pid . ' ';

		// query
		//$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);

		if($result) {
			$listCountries = array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) $listCountries[] = $row;
			$this->setFor('keyOfResultCountries', $listCountries); // Result list is created as an array. tx_lib_object would work as well.
		} else {
			print $query;
		}
	}

	public function loadLanguages(){
		$fields = '*';
		$tables = 'static_languages';
		$groupBy = null;
		$orderBy = 'lg_name_en ASC';
		$where = null;
		//$where = ' AND pid = ' . $pid . ' ';

		// query
		//$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);

		if($result) {
			$listLanguages = array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) $listLanguages[] = $row;
			$this->setFor('keyOfResultLanguages', $listLanguages); // Result list is created as an array. tx_lib_object would work as well.
		} else {
			print $query;
		}
	}

	public function loadTitles(){
		$fields = '*';
		$tables = 'tx_partner_val_titles';
		$groupBy = null;
		$orderBy = 'ti_descr_short ASC';
		$where = null;
		//$where = ' AND pid = ' . $pid . ' ';

		// query
		//$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$query = $GLOBALS['TYPO3_DB']->SELECTquery($fields, $tables, $where, $groupBy, $orderBy);
		$result = $GLOBALS['TYPO3_DB']->sql_query($query);

		if($result) {
			$listTitles = array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) $listTitles[] = $row;
			$this->setFor('keyOfResultTitles', $listTitles); // Result list is created as an array. tx_lib_object would work as well.
		} else {
			print $query;
		}
	}

	public function update() {
		$this->createLabel();
		foreach($this->selectHashArray('label, org_name, org_type, first_name, middle_name, last_name, title, letter_title, last_name_prefix, maiden_name, general_suffix, initials, birth_date, birth_place, death_date, death_place, gender, nationality, mother_tongue, preferred_language, street, street_number, postal_code, locality, country, po_number, po_no_number, po_postal_code, po_locality, po_admin_area, po_country, remarks') as $key => $value) {
			$updateArray[$key] = htmlspecialchars($value);
		}
		$updateArray['tstamp'] = time();
		$where = 'uid = ' . $this['uid'] . ' ';
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_partner_main',  $where, $updateArray);
	}

	public function insert() {
		$this->createLabel();
		foreach($this->selectHashArray('type, label, org_name, org_type, first_name, middle_name, last_name, title, letter_title, last_name_prefix, maiden_name, general_suffix, initials, birth_date, birth_place, death_date, death_place, gender, nationality, mother_tongue, preferred_language, street, street_number, postal_code, locality, country, po_number, po_no_number, po_postal_code, po_locality, po_admin_area, po_country, remarks') as $key => $value) {
			$insertArray[$key] = htmlspecialchars($value);
		}
		$insertArray['tstamp'] = $insertArray['crdate'] = time();
		$insertArray['status'] = "1";
		$insertArray['fe_user'] = (integer) $GLOBALS['TSFE']->fe_user->user['uid'];
		$insertArray['pid'] = (integer) array_pop(tx_div::toListArray($this->controller->context->getData('pages')));
		$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_partner_main', $insertArray);
		$this['uid'] = mysql_insert_id();
	}

	function createLabel(){
		if ($this['type'] == "0"){
			$this['label'] = $this['last_name'] . ', ' . $this['first_name'] . ' - ' . $this['locality'];
		}
		if ($this['type'] == "1"){
			$this['label'] = $this['org_name'] . ' - ' . $this['locality'];
		}
		
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bananas/models/class.tx_partnerviews_models_feedit.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bananas/models/class.tx_partnerviews_models_feedit.php']);
}
?>
