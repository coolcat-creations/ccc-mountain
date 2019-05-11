<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params = $displayData->params;
?>
<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
	<?php $imgfloat = empty($images->float_fulltext) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
	<div class="float-<?php echo htmlspecialchars($imgfloat); ?> item-image"><img


			<?php if ($images->image_fulltext_caption) : ?>

				<?php echo 'title="' . htmlspecialchars($images->image_fulltext_caption) . '"'; ?>
			<?php endif; ?>
			class="img-fluid <?php if ($images->image_fulltext_caption) : ?> caption <?php endif; ?>"


			src="<?php echo htmlspecialchars($images->image_fulltext); ?>"
			alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" itemprop="image"/></div>
<?php endif; ?>