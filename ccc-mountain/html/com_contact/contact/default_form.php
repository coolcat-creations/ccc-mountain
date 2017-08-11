<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');

?>
<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
	<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
		<?php if ($fieldset->name === 'captcha' && !$captchaEnabled) : ?>
			<?php continue; ?>
		<?php endif; ?>
		<?php $fields = $this->form->getFieldset($fieldset->name); ?>
		<?php if (count($fields)) : ?>
			<fieldset>
				<?php if (isset($fieldset->label) && strlen($legend = trim(JText::_($fieldset->label)))) : ?>
					<legend><?php echo $legend; ?></legend>
				<?php endif; ?>
				<?php foreach ($fields as $field) :
					$field->class = 'form-control col-12';
					if ($field->name == 'jform[spacer]')
					{
						$field->class = 'required-fields';
					}
					if ($field->name == 'jform[contact_email_copy]')
					{
						$field->class = 'form-check-input';
					}
					?>

					<div
						class="<?php echo ($field->name == 'jform[contact_email_copy]') ? 'form-check' : 'form-group'; ?>">
						<?php echo $field->input; ?>

						<?php if (empty($options['hiddenLabel'])) : ?>
							<?php echo $field->label; ?>
						<?php endif; ?>

					</div>

				<?php endforeach; ?>
			</fieldset>
		<?php endif; ?>
	<?php endforeach; ?>
	<div class="form-group">
		<button class="btn btn-primary validate"
		        type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
		<input type="hidden" name="option" value="com_contact"/>
		<input type="hidden" name="task" value="contact.submit"/>
		<input type="hidden" name="return" value="<?php echo $this->return_page; ?>"/>
		<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>"/>
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

