<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs Override for Bootstrap 4
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>


<ol class="breadcrumb<?php echo $moduleclass_sfx; ?>" itemscope itemtype="https://schema.org/BreadcrumbList">
	<?php if ($params->get('showHere', 1)) : ?>
		<li>
			<?php echo JText::_('MOD_BREADCRUMBS_HERE'); ?>&#160;
		</li>
	<?php else : ?>
		<li class="breadcrumb-item active">
			<span class="fa fa-location-arrow"></span>
		</li>
	<?php endif; ?>
	<?php
	// Get rid of duplicated entries on trail including home page when using multilanguage
	for ($i = 0; $i < $count; $i++)
	{
		if ($i === 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link === $list[$i - 1]->link)
		{
			unset($list[$i]);
		}
	}

	// Find last and penultimate items in breadcrumbs list
	end($list);
	$last_item_key = key($list);
	prev($list);
	$penult_item_key = key($list);

	// Make a link if not the last item in the breadcrumbs
	$show_last = $params->get('showLast', 1);

	// Generate the trail
	foreach ($list as $key => $item) :
		if ($key !== $last_item_key) :
			// Render all but last item - along with separator
			?>
			<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<?php if (!empty($item->link)) : ?>
					<a itemprop="item" href="<?php echo $item->link; ?>" class="pathway"><span
							itemprop="name"><?php echo $item->name; ?></span></a>
				<?php else : ?>
					<span itemprop="name">
						<?php echo $item->name; ?>
					</span>
				<?php endif; ?>

				<meta itemprop="position" content="<?php echo $key + 1; ?>">
			</li>
		<?php elseif ($show_last) :
			// Render last item if reqd. ?>
			<li class="breadcrumb-item active" itemprop="itemListElement" itemscope
			    itemtype="https://schema.org/ListItem">
				<span itemprop="name">
					<?php echo $item->name; ?>
				</span>
				<meta itemprop="position" content="<?php echo $key + 1; ?>">
			</li>
		<?php endif;
	endforeach; ?>
</ol>
