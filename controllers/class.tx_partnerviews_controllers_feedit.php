<?php
/**
 *
 * This class is the controller for FE-Editing of partner-extension-records.
 *
 * PHP version 5
 *
 * Copyright (c) 2007 Marcus Schwemer
 *
 * LICENSE:
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package    TYPO3
 * @subpackage partnerviews
 * @author     Marcus Schwemer <schwemer@netzwerkberatung.de>
 * @copyright  2007 Marcus Schwemer
 * @license    http://www.opensource.org/licenses/lgpl-license.php GPL
 * @version
 * @since      0.1
 */

class tx_partnerviews_controllers_feedit extends tx_lib_controller {

	/**
	 *
	 * This controller creates the model and loads it and provides the
	 * neccessary action pipes.
	 * @return  string   The rendered result.
	 */
	var $defaultAction = 'selectAction';

	/**
	 * Loads the available records belonging to the fe-user
	 * ans renders a selection page
	 *
	 * @param none
	 * @return viod
	 */
	function selectAction() {
		$actionPipe = $this->makeInstance('tx_partnerviews_models_feedit');
		$actionPipe->load();
		$actionPipe = $this->makeInstance('tx_partnerviews_views_feeditlist', $actionPipe);
		$actionPipe->castList('resultList', 'tx_partnerviews_views_feeditlist', 'tx_partnerviews_views_feeditlist');
		$fe_userid = (integer) $GLOBALS['TSFE']->fe_user->user['uid'];
		if ($fe_userid <> "0"){ 
			$actionPipe->render($this->configurations['feEditListTemplate'], TRUE);
		} else {
			$actionPipe->render($this->configurations['feLoginTemplate'], TRUE);
		}
		$actionPipe = $this->makeInstance('tx_lib_translator', $actionPipe);
		$actionPipe->translate();
		return $actionPipe->get('result');
	}

	function feeditAction(){
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor');
		$actionPipe->loadSession();
		$actionPipe->receiveParameters();
		$actionPipe = $this->makeInstance('tx_partnerviews_models_feedit', $actionPipe);
		$actionPipe->loadPartnerData();
		$actionPipe->castList('partnerData', 'tx_lib_phpTemplateEngine', 'tx_lib_phpTemplateEngine');
		$actionPipe->loadOrgTypes();
		$actionPipe->loadCountries();
		$actionPipe->loadLanguages();
		$actionPipe->loadTitles();
		$actionPipe = $this->makeInstance('tx_partnerviews_views_feeditform', $actionPipe);
		$actionPipe->render($this->configurations['feEditFormTemplate'], TRUE);
		$actionPipe = $this->makeInstance('tx_lib_translator', $actionPipe);
		$actionPipe->translate();
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor', $actionPipe);
		$actionPipe->storeSession();

		return $actionPipe->get('result');

	}

	function previewAction(){
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor');
		$actionPipe->loadSession();
		$actionPipe->receiveParameters();
		$actionPipe = $this->makeInstance('tx_partnerviews_views_feeditpreview', $actionPipe);
		$actionPipe->render($this->configurations['feEditPreviewTemplate'], TRUE);
		$actionPipe = $this->makeInstance('tx_lib_translator', $actionPipe);
		$actionPipe->translate();
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor', $actionPipe);
		$actionPipe->storeSession();

		return $actionPipe->get('result');
	}

	function storeAction(){
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor');
		$actionPipe->loadSession();
		$actionPipe->receiveParameters();
		$actionPipe = $this->makeInstance('tx_partnerviews_models_feedit', $actionPipe);
		$actionPipe->update();
		$actionPipe->loadPartnerData();
		$actionPipe->castList('partnerData', 'tx_lib_phpTemplateEngine', 'tx_lib_phpTemplateEngine');
		$actionPipe->loadOrgTypes();
		$actionPipe = $this->makeInstance('tx_partnerviews_views_feeditstore', $actionPipe);
		$actionPipe->render($this->configurations['feEditStoreTemplate'], TRUE);
		$actionPipe = $this->makeInstance('tx_lib_translator', $actionPipe);
		$actionPipe->translate();
		$actionPipe = $this->makeInstance('tx_lib_sessionProcessor', $actionPipe);
		$actionPipe->storeSession();

		return $actionPipe->get('result');

	}

}

	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/controllers/class.tx_partnerviews_controllers_list.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/partnerviews/controllers/class.tx_partnerviews_controllers_list.php']);
	}
?>
