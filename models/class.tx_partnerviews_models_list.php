<?php

/**
 */

class tx_partnerviews_models_list extends tx_lib_processor {
	var $keyOfTotalResultCount = 'totalResultCount';
	var $keyOfResultList = 'resultList';

	function load() {
		$pid = (integer) array_pop(tx_div::toListArray($this->controller->context->getData('pages')));
		$fields = '*';
		$tables = 'tx_partner_main';
		$groupBy = null;
		$orderBy = 'org_name DESC';
		$where = 'hidden = 0 AND deleted = 0 ';
		$where .= ' AND pid=' . $pid . ' ';
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

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/models/class.tx_partnerviews_models_list.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/models/class.tx_partnerviews_models_list.php']);
}
?>
