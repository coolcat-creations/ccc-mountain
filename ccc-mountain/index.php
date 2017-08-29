<?php defined('_JEXEC') or die;
/**
 * @package     Joomla.Site
 * @subpackage  Templates.ccc-mountain
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

$app = JFactory::getApplication();
$document = JFactory::getDocument();
$this->setHtml5(true);

$params = $app->getTemplate(true)->params;

$javascript = $this->params->get('javascript');

$option   = $app->input->getCmd('option');
$view     = $app->input->getCmd('view');
$layout   = $app->input->getCmd('layout');
$task     = $app->input->getCmd('task');
$itemid   = $app->input->getCmd('Itemid');
$sitename = $app->get('sitename');
$year     = JFactory::getDate()->format('Y');

$tplpath = JUri::root() . 'templates/' . $this->template;

/*$this->addStyleSheet('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css', array('integrity'=>'', 'crossorigin' => 'anonymous' ));*/
$this->addStyleSheet($tplpath . '/css/template.css');

$this->addStyleSheet($tplpath . '/css/font-awesome/font-awesome.min.css');
$this->addStyleSheet('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic');

JHtml::_('jquery.framework');
$this->addScript('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', '', array('integrity'=>'', 'crossorigin' => 'anonymous', 'defer'=>'defer' ));
$this->addScript($tplpath . '/js/bootstrap.min.js', '', array('defer'=>'defer' ));
$this->addScript($tplpath . '/js/custom.js', '', array('defer'=>'defer' ));
unset($this->_scripts[$this->baseurl.'/media/jui/js/jquery-migrate.min.js']);

$customtag= '<meta http-equiv="X-UA-Compatible" content="IE=edge" />' . "\n";

$document->addCustomTag($customtag);

$this->setMetaData('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
$this->setMetaData('author', 'free Joomla! Bootstrap4 Template (source: startbootstrap.com) realized by coolcat-creations.com');

if ($this->params->get('logoType', 'text') == 'image')
{
	$logo = '<img src="' . $this->params->get('logoImage', '') . '"
         alt="' . $sitename . '" width="200px" height="20px" />';
}
else
{
	$logo = $this->params->get('logoText', '');
}

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
    <jdoc:include type="head"/>
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
echo ($this->direction === 'rtl' ? ' rtl' : '');
?>">

<?php if ($logo || $this->countModules('mainmenu')) : ?>

    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">

		<?php if ($this->countModules('mainmenu')) : ?>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

		<?php endif; ?>


		<?php if ($logo) : ?>
            <a class="navbar-brand" href="<?php echo $this->baseurl; ?>">
				<?php echo $logo; ?>
            </a>

		<?php endif; ?>

		<?php if ($this->countModules('mainmenu')) : ?>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <jdoc:include type="modules" name="mainmenu" style="none"/>
            </div>

		<?php endif; ?>


    </nav>

<?php endif; ?>

<jdoc:include type="modules" name="header" style="header"/>

<?php if ($this->countModules('breadcrumbs')) : ?>
    <section class="breadcrumbs">
        <jdoc:include type="modules" name="breadcrumbs" style="breadcrumbs"/>
    </section>
<?php endif; ?>


<?php if ($this->params->get('mainoutput', 'yes') == 'yes') : ?>
    <main id="maincontent" class="<?php if ((!$this->countModules('header') && (!$this->countModules('breadcrumbs')))): ?>pt-5<?php endif; ?>">
        <div class="container">
            <div class="row">
                <div class="<?php if ($this->countModules('right')) : ?>col-md-8<?php endif; ?> <?php if (!$this->countModules('right')) : ?>col-12<?php endif; ?>">
                    <jdoc:include type="message"/>
                    <jdoc:include type="component"/>
                </div>
				<?php if ($this->countModules('right')) : ?>
                    <div class="col-md-4">
                        <jdoc:include type="modules" name="right" style="xhtml"/>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </main>
<?php endif; ?>

<jdoc:include type="modules" name="banner" style="banner"/>

<footer class="mt-0">
    <div class="container">

		<?php if ($this->countModules('footermenu')) : ?>
            <jdoc:include type="modules" name="footermenu" style="none"/>
		<?php endif; ?>

		<?php if (!$this->countModules('copyright')) : ?>
            <p class="copyright text-muted small mt-1 mb-0"> <?php echo $year; ?><?php echo JText::_('TPL_CCC-MOUNTAIN_SITE_COPYRIGHT'); ?> </p>
		<?php endif; ?>
		<?php if ($this->countModules('copyright')) : ?>
            <jdoc:include type="modules" name="copyright" style="none"/>
		<?php endif; ?>
    </div>
</footer>

<?php if ($javascript): ?>
    <script type="text/javascript">
		<?php echo $javascript; ?>
    </script>
<?php endif; ?>

</body>

</html>
