<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');
$tparams = $this->params;
if ($tparams->get('show_page_heading'))
{
	$articleheader = 'h2';
}
else
{
	$articleheader = 'h1';
}
?>

<section class="contact<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
	<meta itemprop="inLanguage"
	      content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>"/>

	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6">

				<?php if ($tparams->get('show_page_heading')) : ?>
					<h1>
						<?php echo $this->escape($tparams->get('page_heading')); ?>
					</h1>
				<?php endif; ?>

				<?php if ($this->contact->name && $tparams->get('show_name')) : ?>
					<div class="page-header">
						<<?php echo $articleheader; ?>>
							<?php if ($this->item->published == 0) : ?>
								<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
							<?php endif; ?>
							<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
						</<?php echo $articleheader; ?>>
					</div>
				<?php endif; ?>

				<?php $show_contact_category = $tparams->get('show_contact_category'); ?>

				<?php if ($show_contact_category === 'show_no_link') : ?>
					<h3>
						<span class="contact-category"><?php echo $this->contact->category_title; ?></span>
					</h3>
				<?php elseif ($show_contact_category === 'show_with_link') : ?>
					<?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
					<h3>
			<span class="contact-category"><a href="<?php echo $contactLink; ?>">
				<?php echo $this->escape($this->contact->category_title); ?></a>
			</span>
					</h3>
				<?php endif; ?>

				<?php echo $this->item->event->afterDisplayTitle; ?>

				<?php if ($tparams->get('show_contact_list') && count($this->contacts) > 1) : ?>
					<form action="#" method="get" name="selectForm" id="selectForm">
						<?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?>
						<?php echo JHtml::_('select.genericlist', $this->contacts, 'id', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link); ?>
					</form>
				<?php endif; ?>

				<?php if ($tparams->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
					<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
					<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
				<?php endif; ?>

				<?php echo $this->item->event->beforeDisplayContent; ?>


				<?php if ($this->params->get('show_info', 1)) : ?>
				<?php echo '<h3>' . JText::_('COM_CONTACT_DETAILS') . '</h3>'; ?>

				<div class="row">

					<?php if ($this->contact->image && $tparams->get('show_image')) : ?>
					<div class="col-12 col-sm-6"
					" >
					<?php echo JHtml::_('image', $this->contact->image, $this->contact->name, array('align' => 'middle', 'itemprop' => 'image', 'style' => 'border-radius:50%;')); ?>
				</div>
			<?php endif; ?>


				<?php if (($this->params->get('address_check') > 0) &&
					($this->contact->con_position || $this->contact->address || $this->contact->suburb || $this->contact->state || $this->contact->country || $this->contact->postcode)
				) : ?>
					<div
						class="contact-address col-12 col-sm-6"" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">

					<?php echo $this->loadTemplate('address'); ?>

				<?php endif; ?>

			</div>


		</div>

		<?php if ($tparams->get('allow_vcard')) : ?>
			<?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS'); ?>
			<a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id=' . $this->contact->id . '&amp;format=vcf'); ?>">
				<?php echo JText::_('COM_CONTACT_VCARD'); ?></a>
		<?php endif; ?>
		<?php endif; ?>

		<?php if ($tparams->get('show_links')) : ?>
			<?php echo $this->loadTemplate('links'); ?>
		<?php endif; ?>

		<?php if ($tparams->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>
			<?php echo '<h3>' . JText::_('JGLOBAL_ARTICLES') . '</h3>'; ?>

			<?php echo $this->loadTemplate('articles'); ?>

		<?php endif; ?>

		<?php if ($tparams->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>

			<?php echo $this->loadTemplate('profile'); ?>

		<?php endif; ?>

		<?php if ($tparams->get('show_user_custom_fields') && $this->contactUser) : ?>
			<?php echo $this->loadTemplate('user_custom_fields'); ?>
		<?php endif; ?>

		<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
			<?php echo '<h3>' . JText::_('COM_CONTACT_OTHER_INFORMATION') . '</h3>'; ?>


			<div class="row col-12">
				<span class="fa fa-info"> </span>

				<span class="contact-misc">
						<?php echo $this->contact->misc; ?>
					</span>
			</div>
		<?php endif; ?>


	</div>

	<?php if ($tparams->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
		<div class="col-12 col-sm-6">

			<?php echo '<h3>' . JText::_('COM_CONTACT_EMAIL_FORM') . '</h3>'; ?>

			<?php echo $this->loadTemplate('form'); ?>
		</div>
	<?php endif; ?>

	<?php echo $this->item->event->afterDisplayContent; ?>
	</div>
	</div>
</section>
