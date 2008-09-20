<?php

/**
 * A most minimalistic controller of the lib/div type
 *
 * This is just a hello world example.
 * For a minimal practical example see the extension Bananas (bananas).
 * For a bigger practical example see the extension Elmar's FAQ (efaq).
 */
class tx_partnerviews_controllers_list extends tx_lib_controller {

	/**
	 * Example controller method
	 *
	 * This controller creates the model and loads it.
	 * Then the view is created and the data is piped to the view.
	 * The view is rendered and the result is finally returned.
	 *
	 * IMPORTANT:
	 *
	 * The controller ($this) has to be set to all controlled objects!!!
	 * That is done implicitly by the method tx_lib_controller::makeInstance();
	 *
	 * Please have a look at:
	 *
	 * tx_lib_controller::makeInstance()
	 * tx_lib_object::tx_lib_object()
	 *
	 * @return  string   The rendered result.
	 * @see     tx_lib_controller::makeInstance()
	 * @see     tx_lib_object::tx_lib_object()
	 */
	var $defaultDesignator = 'tx_partnerviews_controllers_list';
	var $defaultAction = 'listAction';
	
	function listAction() {
		$actionPipe = $this->makeInstance('tx_partnerviews_models_list');
		$actionPipe->load();
		$actionPipe = $this->makeInstance('tx_partnerviews_views_list', $actionPipe);
		$actionPipe->castList('resultList', 'tx_partnerviews_views_list', 'tx_partnerviews_views_list');
		$actionPipe->render($this->configurations['listTemplate'], TRUE);
		return $actionPipe->get('result');
	}

}
	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/controllers/class.tx_partnerviews_controllers_list.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/controllers/class.tx_partnerviews_controllers_list.php']);
	}
?>
