<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php print $this['resultBrowserWidget']; ?>
<?php if($this['totalResultCount'] > 0): ?>

<?php $this->printFormTagStart('partnerviews'); ?>
<table>
<?php foreach($this['resultList'] as $entry):
	if ($entry['label'] <> "") :
?>
<tr>
	<td><input type="radio" id="partnerviews_radio1" name="partnerviews[uid]" value="<?php print $entry['uid'] ?>"/> </td>
	<td valign="middle">
	<?php $entry->printAsText('label'); ?>
	</td>
</tr>
<?php endif; endforeach; ?>
</table>
	<input type="submit" value="%%%edit%%%" name="partnerviews[action][feedit]" />
</form>
<?php else:  ?>
	Leider keine Ergebnisse, oder sie sind nicht angemeldet ...
<?php endif; ?>