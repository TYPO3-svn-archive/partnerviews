<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php print 'Hallo ' . $this['label']; ?>

<?php $this->printFormTagStart('partnerviews_form'); ?>
	<table>
	<tr>
		<td>%%%label%%%:</td>
		<td><?php print $this['label']?> %%%automatically_set%%%</td>
	</tr>
	<?php if ($this['type'] == "1") : ?>
	<tr>
		<td>%%%org_name%%%</td>
		<td><input type="text" name="partnerviews[org_name]" value="<?php print $this['org_name']?>"></td>
	</tr>
	<tr>
		<td>%%%org_type%%%</td>
		<td>
			<select name="partnerviews[org_type]" style="width: 100px;">
			<?php foreach ($this['orgTypes'] as $org_type){
				print '<option value = "' . $org_type['uid'] . '" ';
				if ($org_type['uid'] == $this['org_type']) print ' selected';
				print '>' . $org_type['ot_descr_short'] . '</option>';
			}?>
			</select>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ($this['type'] == "0"): ?>
	<tr>
		<td>%%%first_name%%% / %%%middle_name%%%</td>
		<td>
			<input size="20" type="text" name="partnerviews[first_name]" value="<?php print $this['first_name']; ?>" /> /
			<input size="20" type="text" name="partnerviews[middle_name]" value="<?php print $this['middle_name']; ?>" />
		</td>
	</tr>
	<tr>
		<td> %%%last_name_prefix%%% / %%%last_name%%%</td>
		<td>
			<input size="5" type="text" name="partnerviews[last_name_prefix]" value="<?php print $this['last_name_prefix']; ?>" />
			<input size="20" type="text" name="partnerviews[last_name]" value="<?php print $this['last_name']; ?>" />
	</tr>
	<tr>
		<td>%%%maiden_name%%% / %%%general_suffix%%%</td>
		<td>
			<input size="20" type="text" name="partnerviews[maiden_name]" value="<?php print $this['maiden_name']; ?>" />
			<input size="20" type="text" name="partnerviews[general_suffix]" value="<?php print $this['general_suffix']; ?>" />
	</td>
	</tr>
	<tr>
		<td>%%%title%%% / %%%initials%%% / %%%gender%%%</td>
		<td><select name="partnerviews[title]" style="width: 100px;">
			<option value=""></option>
			<?php foreach ($this['resultTitles'] as $titles){
				print '<option value = "' . $titles['uid'] . '" ';
				if ($titles['uid'] == $this['title']) print ' selected';
				print '>' . $titles['ti_descr_short'] . '</option>';
			}?>
			</select>
			/ <input size="5" type="text" name="partnerviews[initials]" value="<?php print $this['initials']; ?>" /> /
			<select name="partnerviews[gender]" style="width: 100px;">
			<option value=""></option>
			<option value="0" <?php if ($this['gender'] == "0") print ' selected="selected"'; ?>>%%%unknown%%%</option>
			<option value="1" <?php if ($this['gender'] == "1") print ' selected="selected"'; ?>>%%%male%%%</option>
			<option value="2" <?php if ($this['gender'] == "2") print ' selected="selected"'; ?>>%%%female%%%</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>%%%letter_title%%%</td>
		<td><input size="40" type="text" name="partnerviews[letter_title]" value="<?php print $this['letter_title']; ?>" /></td>
	</tr>
	<tr>
		<td>%%%nationality%%% / %%%mother_tongue%%% / %%%preferred_language%%%</td>
		<td>
			<select name="partnerviews[nationality]" style="width: 100px;">
			<option value=""></option>
			<?php foreach ($this['resultCountries'] as $countries){
				print '<option value = "' . $countries['uid'] . '" ';
				if ($countries['uid'] == $this['nationality']) print ' selected';
				print '>' . $countries['cn_short_en'] . '</option>';
			}?>
			</select> /
			<select name="partnerviews[mother_tongue]" style="width: 100px;">
			<option value=""></option>
			<?php foreach ($this['resultLanguages'] as $languages){
				print '<option value = "' . $languages['uid'] . '" ';
				if ($languages['uid'] == $this['mother_tongue']) print ' selected';
				print '>' . $languages['lg_name_en'] . '</option>';
			}?>
			</select> /
			<select name="partnerviews[preferred_language]" style="width: 100px;">
			<option value=""></option>
			<?php foreach ($this['resultLanguages'] as $languages){
				print '<option value = "' . $languages['uid'] . '" ';
				if ($languages['uid'] == $this['preferred_language']) print ' selected';
				print '>' . $languages['lg_name_en'] . '</option>';
			}?>
			</select>

	</tr>
	<tr>
		<td>%%%birth_date%%% (YYYY-MM-dd) / %%%birth_place%%%</td>
		<td>
			<input size="10" type="text" name="partnerviews[birth_date]" value="<?php if ($this['birth_date'] <> "0") print $this['birth_date']; ?>" />
			<input size="30" type="text" name="partnerviews[birth_place]" value="<?php print $this['birth_place']; ?>" />
		</td>
	</tr>
	<tr>
		<td>%%%death_date%%% (YYYY-MM-dd) / %%%death_place%%%</td>
		<td>
			<input size="10" type="text" name="partnerviews[death_date]" value="<?php if ($this['death_date'] <> "0") print $this['death_date']; ?>" />
			<input size="30" type="text" name="partnerviews[death_place]" value="<?php print $this['death_place']; ?>" />
		</td>
	</tr>

	<?php endif; ?>
	<?php if ($this['type'] == "0" || $this['type'] == "1") : ?>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td>%%%street%%% %%%street_number%%%</td>
		<td>
			<input size="30" type="text" name="partnerviews[street]" value ="<?php print $this['street']?>">
			<input size="3" type="text" name="partnerviews[street_number]" value ="<?php print $this['street_number']?>"">
		</td>
	</tr>
	<tr>
		<td>%%%postal_code%%% %%%locality%%%</td>
		<td>
			<input size="7" type="text" name="partnerviews[postal_code]" value ="<?php print $this['postal_code']?>">
			<input size="30" type="text" name="partnerviews[locality]" value ="<?php print $this['locality']?>"">
		</td>
	</tr>
	<tr>
		<td>%%%admin_area%%% / %%%country%%%</td>
		<td>
			<input size="7" type="text" name="partnerviews[admin_area]" value ="<?php print $this['admin_area']?>"> /
			<select name="partnerviews[country]" style="width: 150px;">
			<option value=""></option>
			<?php foreach ($this['resultCountries'] as $countries){
				print '<option value = "' . $countries['uid'] . '" ';
				if ($countries['uid'] == $this['country']) print ' selected';
				print '>' . $countries['cn_short_en'] . '</option>';
			}?>
			</select>
		</td>
	</tr>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td>%%%po_number%%%</td>
		<td>
			<input size="7" type="text" name="partnerviews[po_number]" value="<?php print $this['po_number']; ?>" />
			<input type="checkbox" name="partnerviews[po_no_number]" value="1" <?php if ($this['po_no_number'] == "1") {print ' checked="checked"';} ?> /> %%%po_no_number%%%
		</td>
	</tr>
	<tr>
		<td>%%%po_postal_code%%% %%%po_locality%%%</td>
		<td>
			<input size="7" type="text" name="partnerviews[po_postal_code]" value ="<?php print $this['po_postal_code']?>">
			<input size="30" type="text" name="partnerviews[po_locality]" value ="<?php print $this['po_locality']?>"">
		</td>
	</tr>
	<tr>
		<td>%%%po_admin_area%%% / %%%po_country%%%</td>
		<td>
			<input size="7" type="text" name="partnerviews[po_admin_area]" value ="<?php print $this['po_admin_area']?>"> /
			<select name="partnerviews[po_country]" style="width: 150px;">
			<option value=""></option>
			<?php foreach ($this['resultCountries'] as $countries){
				print '<option value = "' . $countries['uid'] . '" ';
				if ($countries['uid'] == $this['po_country']) print ' selected';
				print '>' . $countries['cn_short_en'] . '</option>';
			}?>
			</select>
		</td>
	</tr>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td valign="top">%%%remarks%%%</td>
		<td><textarea cols="30" rows="5" wrap="hard" name="partnerviews[remarks]"><?php print $this['remarks']; ?></textarea></td>
	</tr>
	<?php else : ?>
	<tr><td>%%%wrong_type%%%</td></tr>
	<?php endif; ?>
	</table>
	<input type="submit" value="%%%select%%%" name="partnerviews[action][select]" />
	<input type="submit" value="%%%preview%%%" name="partnerviews[action][preview]" />
</form>

