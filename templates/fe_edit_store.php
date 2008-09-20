<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>


<?php $this->printFormTagStart('partnerviews_form'); ?>

<table>
<tr>
	<td>Org Name</td>
	<td valign="middle">
		<?php print $this['org_name']; ?>
	</td>
</tr>
</table>
	<input type="submit" value="%%%editmore%%%" name="partnerviews[action][select]" />
</form>

