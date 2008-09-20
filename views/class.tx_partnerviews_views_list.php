<?php

/**
 * A most minimalistic view of the lib/div type
 *
 * This is just a hello world example.
 * For a minimal practical example see the extension Bananas (bananas).
 * For a bigger practical example see the extension Elmar's FAQ (efaq).
 */
class tx_partnerviews_views_list extends tx_lib_phpTemplateEngine {

	function registerToArray($registerKey, $arrayKey) {
		$this->set($arrayKey, $this->controller->get($registerKey));
	}


}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/views/class.tx_partnerviews_views_list.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/views/class.tx_partnerviews_views_list.php']);
}
?>
