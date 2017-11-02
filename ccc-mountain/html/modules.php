<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/* Chrome für das Headermodul */
function modChrome_breadcrumbs($module, &$params, &$attribs)
{
	if ($module->content)
	{
		?>
        <div class="container">
			<?php echo $module->content; ?>
        </div>
		<?php
	}
}


function modChrome_navigation($module, &$params, &$attribs)
{
	$moduleTag       = $params->get('module_tag', 'div');
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');


	if (!empty ($module->content)) : ?>

        <<?php echo $moduleTag; ?> class="collapse navbar-collapse <?php echo $moduleclass_sfx; ?>" id="bs-example-navbar-collapse-1">
		<?php echo $module->content; ?>
        </<?php echo $moduleTag; ?>>

	<?php endif;
}

/* Chrome für das Headermodul */
function modChrome_header($module, &$params, &$attribs)
{
	$moduleTag       = $params->get('module_tag', 'header');
	$moduleId        = $module->position . '-' . $module->id;
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$headerTag       = htmlspecialchars($params->get('header_tag', 'h1'), ENT_COMPAT, 'UTF-8');
	$headerClass     = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');

	$bgimage = 'style="background-image:url(' . $params->get('backgroundimage') . ');"';

	if ($module->content)
	{
		?>

        <<?php echo $moduleTag; ?> id="<?php echo $moduleId; ?>" class="<?php echo $moduleclass_sfx; ?>" <?php echo $bgimage; ?>>
        <div class="container">
            <div class="intro-message py-2 py-lg-5">
				<?php if ($module->showtitle) : ?>
                <<?php echo $headerTag ?> <?php echo ($headerClass) ? 'class="' . $headerClass . '"' : ''; ?>>
				<?php echo $module->title; ?>
            </<?php echo $headerTag; ?>>
			<?php endif; ?>

            <hr class="intro-divider">
			<?php echo $module->content; ?>
        </div>
        </div>
        </<?php echo $moduleTag; ?>>
		<?php
	}
}

function modChrome_banner($module, &$params, &$attribs)
{
	$moduleTag       = $params->get('module_tag', 'header');
	$moduleId        = $module->position . '-' . $module->id;
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$headerTag       = htmlspecialchars($params->get('header_tag', 'h1'), ENT_COMPAT, 'UTF-8');
	$headerClass     = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');
	$bgimage         = 'style="background-image:url(' . $params->get('backgroundimage') . ');"';

	if ($module->content)
	{
		?>

        <<?php echo $moduleTag; ?> id="<?php echo $moduleId; ?>" class="<?php echo $moduleclass_sfx; ?>" <?php echo $bgimage; ?>>

        <div class="container">

            <div class="row">
				<?php if ($module->showtitle) : ?>

                <div class="col-lg-4">

                    <<?php echo $headerTag ?> <?php echo ($headerClass) ? 'class="' . $headerClass . '"' : ''; ?>>
					<?php echo $module->title; ?>
                </<?php echo $headerTag; ?>>

            </div>
			<?php endif; ?>

            <div class="<?php echo($module->showtitle ? "col-lg-8" : "col-lg-12") ?> ">

				<?php echo $module->content; ?>

            </div>
        </div>

        </div>
        <!-- /.container -->

        </<?php echo $moduleTag; ?>>

		<?php
	}
}