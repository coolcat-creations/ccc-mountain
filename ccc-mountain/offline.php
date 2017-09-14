<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$twofactormethods = JAuthenticationHelper::getTwoFactorMethods();
$app              = JFactory::getApplication();
$tplpath          = JUri::root() . 'templates/' . $this->template;

// Output as HTML5
$this->setHtml5(true);

$fullWidth = 1;

// Add JavaScript Frameworks
JHtml::_('jquery.framework');

// Add template js
JHtml::_('script', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array(), array('integrity' => '', 'crossorigin' => 'anonymous', 'defer' => 'defer'));
JHtml::_('script', $tplpath . '/js/bootstrap.min.js', array('relative' => true, 'async' => 'async', 'defer' => 'defer'));
unset($this->_scripts[$this->baseurl . '/media/jui/js/jquery-migrate.min.js']);


// Add Stylesheets
JHtml::_('stylesheet', $tplpath . '/css/template.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', $tplpath . '/css/font-awesome/font-awesome.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', $tplpath . '/css/offline.css', array('version' => 'auto', 'relative' => true));

$this->setMetaData('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
$this->setMetaData('author', 'free Joomla! Bootstrap4 Template (source: startbootstrap.com) realized by coolcat-creations.com');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Logo file or site title param
$sitename = $app->get('sitename');

if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <jdoc:include type="head"/>
</head>
<body class="offline">

<!-- Header -->
<header class="intro-header" style="background-image:url('<?php echo $tplpath; ?>/images/offline.jpg');">
    <div class="container">
        <div class="row justify-content-md-center my-5">
            <div class="col-lg-6">
                <div class="intro-message text-center">
					<?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
                        <h1><?php echo $app->get('offline_message'); ?></h1>

					<?php elseif ($app->get('display_offline_message', 1) == 2) : ?>
                        <h1><?php echo JText::_('JOFFLINE_MESSAGE'); ?></h1>

					<?php endif; ?>
					<?php if (!empty($logo)) : ?>
                        <h2><?php echo $logo; ?></h2>
					<?php else : ?>
                        <h2><?php echo htmlspecialchars($app->get('sitename')); ?></h2>
					<?php endif; ?>
                    <hr class="intro-divider">
                    <jdoc:include type="message"/>

                    <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login"
                          class="form-horizontal text-left">
                        <label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-user"></span></div>
                            <input name="username" id="username" type="text"
                                   title="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" class="form-control"/>
                        </div>

                        <label for="password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="fa fa-key"></span></div>
                            <input type="password" name="password" id="password"
                                   title="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" class="form-control"/>
                        </div>

						<?php if (count($twofactormethods) > 1) : ?>
                            <label for="secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?></label>

                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-key"></span></div>
                                <input type="text" name="secretkey" id="secretkey"
                                       title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" class="form-control"/>
                            </div>
						<?php endif; ?>
                        <br>
                        <input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block"
                               value="<?php echo JText::_('JLOGIN'); ?>"/>

                        <input type="hidden" name="option" value="com_users"/>
                        <input type="hidden" name="task" value="user.login"/>
                        <input type="hidden" name="return" value="<?php echo base64_encode(JUri::base()); ?>"/>
						<?php echo JHtml::_('form.token'); ?>
                    </form>
                </div>
            </div>
</header>

</body>
</html>
