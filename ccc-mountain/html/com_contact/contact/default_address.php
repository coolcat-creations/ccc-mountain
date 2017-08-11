<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>


<?php if ($this->contact->con_position && $tparams->get('show_position')) : ?>
	<?php echo $this->contact->con_position; ?>
<?php endif; ?>

<span class="fa fa-map-marker"></span>


<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
	<span class="contact-street" itemprop="streetAddress">
					<?php echo nl2br($this->contact->address); ?>
		<br/>
				</span>
<?php endif; ?>

<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
	<span class="contact-postcode" itemprop="postalCode">
					<?php echo $this->contact->postcode; ?>
				</span>
<?php endif; ?>

<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
	<span class="contact-suburb" itemprop="addressLocality">
					<?php echo $this->contact->suburb; ?>
		<br/>
				</span>
<?php endif; ?>

<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
	<span class="contact-state" itemprop="addressRegion">
					<?php echo $this->contact->state; ?>
		<br/>
				</span>
<?php endif; ?>

<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
	<span class="contact-country" itemprop="addressCountry">
				<?php echo $this->contact->country; ?>
		<br/>
			</span>
<?php endif; ?>


<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>


	<span class="fa fa-envelope"></span>


	<span class="contact-emailto" itemprop="email">
			<?php echo $this->contact->email_to; ?>
		</span>

<?php endif; ?>

<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>

	<span class="fa fa-phone"></span>

	<span class="contact-telephone" itemprop="telephone">
			<?php echo $this->contact->telephone; ?>
		</span>

<?php endif; ?>
<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
	<span class="fa fa-print"></span>

	<span class="contact-fax" itemprop="faxNumber">
		<?php echo $this->contact->fax; ?>
		</span>

<?php endif; ?>
<?php if ($this->contact->mobile && $this->params->get('show_mobile')) : ?>
	<span class="fa fa-mobile-phone"></span>
	<span class="contact-mobile" itemprop="telephone">
			<?php echo $this->contact->mobile; ?>
		</span>

<?php endif; ?>
<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
	<span class="fa fa-globe"></span>

	<span class="contact-webpage">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank" rel="noopener noreferrer" itemprop="url">
			<?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?></a>
		</span>
<?php endif; ?>
