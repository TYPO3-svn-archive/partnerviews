<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::addStaticFile('partnerviews', 'configuration', 'Partner-Views'); // ($extKey, $path, $title)
t3lib_extMgm::addPlugin(array('Partner-Views: List', 'tx_partnerviews_controllers_list'));  // array($title, $pluginKey)
t3lib_extMgm::addPlugin(array('Partner-Views: FE-New', 'tx_partnerviews_controllers_fenew'));  // array($title, $pluginKey)
t3lib_extMgm::addPlugin(array('Partner-Views: FE-Edit', 'tx_partnerviews_controllers_feedit'));  // array($title, $pluginKey)

?>
