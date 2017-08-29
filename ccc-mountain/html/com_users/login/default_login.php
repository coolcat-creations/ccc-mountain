<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>

<div class="row justify-content-md-center">

    <div class="login<?php echo $this->pageclass_sfx; ?> col-sm-6">
		<?php if ($this->params->get('show_page_heading')) : ?>
            <div class="page-header">
                <h1>
					<?php echo $this->escape($this->params->get('page_heading')); ?>
                </h1>
            </div>
		<?php endif; ?>

		<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        <div class="login-description">
			<?php endif; ?>

			<?php if ($this->params->get('logindescription_show') == 1) : ?>
				<?php echo $this->params->get('login_description'); ?>
			<?php endif; ?>

			<?php if ($this->params->get('login_image') != '') : ?>
                <img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JText::_('COM_USERS_LOGIN_IMAGE_ALT'); ?>"/>
			<?php endif; ?>

			<?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
        </div>
	<?php endif; ?>

        <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate">

            <fieldset>
				<?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
					<?php if (!$field->hidden) : ?>
						<?php  $field->class = 'form-control'; ?>
                        <div class="form-group">
                            <div class="control-label">
								<?php echo $field->label; ?>
                            </div>
                            <div class="controls">
								<?php echo $field->input; ?>
                            </div>
                        </div>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ($this->tfa) : ?>
                    <div class="form-group">

						<?php echo $this->form->getField('secretkey')->label; ?>

                        <div class="controls">
							<?php echo $this->form->getField('secretkey')->input; ?>
                        </div>
                    </div>
				<?php endif; ?>

				<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                    <div  class="form-check">
                        <label class="form-check-label">
                            <input id="remember" type="checkbox" name="remember" class="form-check-input" value="yes"/>
							<?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?>
                        </label>
                    </div>
				<?php endif; ?>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">
							<?php echo JText::_('JLOGIN'); ?>
                        </button>
                    </div>
                </div>

				<?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
                <input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
				<?php echo JHtml::_('form.token'); ?>
            </fieldset>
        </form>


        <ul class="nav flex-column"">
        <li class="nav-item">
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="nav-link">
				<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
        </li>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>" class="nav-link">
				<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>
        </li>
		<?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
            <li>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" class="nav-link">
					<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
            </li>
		<?php endif; ?>
        </ul>

    </div>


</div>