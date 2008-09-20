<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>
%%%check_data%%%
<table>
<?php if ($this['type'] == "1") : ?>
	<tr>
		<td>%%%org_name%%%</td>
		<td><?php print $this['org_name']?></td>
	</tr>
	<tr>
		<td>%%%org_type%%%</td>
		<td>
			<?php foreach ($this['orgTypes'] as $org_type){
				if ($org_type['uid'] == $this['org_type']) print $org_type['ot_descr_short'];
			}?>
		</td>
	</tr>
	<?php endif; ?>
	<?php if ($this['type'] == "0"): ?>
	<tr>
		<td>%%%first_name%%% / %%%middle_name%%%</td>
		<td><?php print $this['first_name'];  print $this['middle_name']; ?></td>
	</tr>
	<tr>
		<td> %%%last_name_prefix%%% / %%%last_name%%%</td>
		<td><?php print $this['last_name_prefix'];  print $this['last_name']; ?></td>
	</tr>
	<tr>
		<td>%%%maiden_name%%% / %%%general_suffix%%%</td>
		<td><?php print $this['maiden_name'];  print $this['general_suffix']; ?></td>
	</tr>
	<tr>
		<td>%%%title%%% / %%%initials%%% / %%%gender%%%</td>
		<td>
			<?php foreach ($this['resultTitles'] as $titles){
				if ($titles['uid'] == $this['title']) print $org_type['ti_descr_short'];
			}?>
			</select>
			/ <?php print $this['initials']; ?> /
			<?php if ($this['gender'] == "0") print '%%%unknown%%%'; ?>
			<?php if ($this['gender'] == "1") print '%%%male%%%'; ?>
			<?php if ($this['gender'] == "2") print '%%%female%%%'; ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>%%%letter_title%%%</td>
		<td><?php print $this['letter_title']; ?></td>
	</tr>
	<tr>
		<td>%%%nationality%%% / %%%mother_tongue%%% / %%%preferred_language%%%</td>
		<td>
			<?php
			foreach ($this['resultCountries'] as $countries){
				if ($countries['uid'] == $this['nationality']) print $countries['cn_short_en'];
			}
			print ' / ';
			foreach ($this['resultLanguages'] as $languages){
				if ($languages['uid'] == $this['mother_tongue']) print $languages['lg_name_en'];
			}
			print ' / ';
			foreach ($this['resultLanguages'] as $languages){
				if ($languages['uid'] == $this['preferred_language']) print $languages['lg_name_en'];
			}?>
	</tr>
	<tr>
		<td>%%%birth_date%%% (YYYYMMDD) / %%%birth_place%%%</td>
		<td>
			<?php if ($this['birth_date'] <> "0") print $this['birth_date']; ?>
			<?php print $this['birth_place']; ?>
		</td>
	</tr>
	<tr>
		<td>%%%death_date%%% (YYYYMMDD) / %%%death_place%%%</td>
		<td>
			<?php if ($this['death_date'] <> "0") print $this['death_date']; ?>
			<?php print $this['death_place']; ?>
		</td>
	</tr>

	<?php endif; ?>
	<?php if ($this['type'] == "0" || $this['type'] == "1") : ?>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td>%%%street%%% %%%street_number%%%</td>
		<td>
			<?php print $this['street']?>
			<?php print $this['street_number']?>
		</td>
	</tr>
	<tr>
		<td>%%%postal_code%%% %%%locality%%%</td>
		<td>
			<?php print $this['postal_code']?>
			<?php print $this['locality']?>
		</td>
	</tr>
	<tr>
		<td>%%%admin_area%%% / %%%country%%%</td>
		<td>
			<?php print $this['admin_area']?>
			<?php foreach ($this['resultCountries'] as $countries){
				if ($countries['uid'] == $this['country']) print $countries['cn_short_en'];
			}?>
		</td>
	</tr>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td>%%%po_number%%%</td>
		<td>
			<?php print $this['po_number']; ?>
			<?php if ($this['po_no_number'] == "1") {print '%%%po_no_number%%%';} ?>
		</td>
	</tr>
	<tr>
		<td>%%%po_postal_code%%% %%%po_locality%%%</td>
		<td>
			<?php print $this['po_postal_code'];?>
			<?php print $this['po_locality'];?>
		</td>
	</tr>
	<tr>
		<td>%%%po_admin_area%%% / %%%po_country%%%</td>
		<td>
			<?php print $this['po_admin_area']?>
			<?php foreach ($this['resultCountries'] as $countries){
				if ($countries['uid'] == $this['po_country']) print $countries['cn_short_en'];
			}?>
			</select>
		</td>
	</tr>
	<tr><td colspan="2"><hr width="100%" size="1px">
	<tr>
		<td valign="top">%%%remarks%%%</td>
		<td><?php print $this['remarks']; ?></td>
	</tr>
	<?php else : ?>
	<tr><td>%%%wrong_type%%%</td></tr>
	<?php endif; ?>
	</table>
<table><tr><td>
<?php $this->printFormTagStart('partnerviews_form'); ?>
	<input type="hidden" value="1" name="partnerviews[preview]" />
	<input type="submit" value="%%%edit%%%" name="partnerviews[action][feedit]" />
</form>
</td><td>
<?php $this->printFormTagStart('partnerviews_form'); ?>
	<input type="hidden" value="0" name="partnerviews[preview]" />
	<input type="submit" value="%%%store%%%" name="partnerviews[action][store]" />
</form>
</td></tr></table>


