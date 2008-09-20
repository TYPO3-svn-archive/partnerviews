<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php /* Template to be called by tx_partnerviews_views_list. */ ?>

Hallo Welt!!
<?php print $this['resultBrowserWidget']; ?>
<?php if($this['resultList']->isNotEmpty()): ?>
	<ul>
<?php endif; ?>

<?php foreach($this['resultList'] as $entry):	?>
	<li>
			<?php $entry->printAsText('org_name'); ?><br />
			<?php $entry->printAsText('street'); ?>
		<?php $entry->printAsDate('tstamp'); ?>
	</li>
<?php endforeach; ?>

<?php if($this->isNotEmpty()): ?>
	</ul>
<?php endif; ?>
