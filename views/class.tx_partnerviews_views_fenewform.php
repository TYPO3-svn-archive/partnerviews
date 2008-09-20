<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2007 Elmr Hinz
 *  Contact: elmar.hinz@team-red.net
 *  All rights reserved
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
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 ***************************************************************/

/**
 * Depends on:
 *
 * @author Elmr Hinz <elmar.hinz@team-red.net>
 * @package TYPO3
 * @subpackage bananas
 */

/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 */

class tx_partnerviews_views_fenewform extends tx_lib_phpTemplateEngine {

	public function preset() {
		$this->set('url', 'http://');
	}

	public function printFormTagStart($id) {
		$action = '';
		$method = 'post';
		printf('<form id="%s" action="%s" method="%s">', $id, $action, $method);
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bananas/views/class.tx_bananas_views_form.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bananas/views/class.tx_bananas_views_form.php']);
}
?>
