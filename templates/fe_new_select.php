<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $this->printFormTagStart('partnerviews'); ?>
<table>
<tr>
	<td><input type="radio" id="partnerviews_radio1" name="partnerviews[type]" value="0"/> </td>
	<td valign="middle">%%%person%%%</td>
</tr>
<tr>
	<td><input type="radio" id="partnerviews_radio2" name="partnerviews[type]" value="1"/> </td>
	<td valign="middle">%%%organisation%%%</td>
</tr>
</table>
	<input type="submit" value="%%%create%%%" name="partnerviews[action][feedit]" />
</form>
