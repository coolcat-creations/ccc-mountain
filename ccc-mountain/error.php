<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
/** @var JDocumentError $this */

if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

$app = JFactory::getApplication();
$tplpath          = JUri::root() . 'templates/' . $this->template;

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo $tplpath; ?>/css/template.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo $tplpath; ?>/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">


    <title><?php echo $this->error->getCode(); ?>
        - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>

	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
        <link href="<?php echo JUri::root(true); ?>/media/cms/css/debug.css" rel="stylesheet"/>
	<?php endif; ?>
    <!--[if lt IE 9]>
    <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body id="page-top">


<body class="error">

<!-- Header -->
<header class="intro-header" style="background-image:url('<?php echo $tplpath; ?>/images/error.jpg');">
    <div class="container">
        <div class="row justify-content-md-center py-5">
            <div class="col-lg-6">
                <div class="intro-message text-center">
                    <h1><?php echo $this->error->getCode(); ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></h1>
                    <hr>
					<?php if (!empty($logo)) : ?>
                        <h2><?php echo $logo; ?></h2>
					<?php else : ?>
                        <h2><?php echo htmlspecialchars($app->get('sitename')); ?></h2>
					<?php endif; ?>
                    <hr class="intro-divider">

					<?php if ($this->error->getCode() == '404')
					{ ?>
                    <h2>Leider haben wir diese Seite nicht gefunden </h2>
                    <p>Der Link ist möglicherweise veraltet oder Sie haben sich vertippt?
                    <p>
						<?php } ?>
                    <p>Am Besten fangen wir von neuem an:</p>

                    <!--			<p><strong>-->
					<?php //echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?><!--</strong><br>-->
                    <!--			<br>-->
                    <!--			<br>-->
					<?php //echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?><!--</li>-->
                    <!--			<br>-->
					<?php //echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?><!--</li>-->
                    <!--			<br>--><?php //echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?><!--</li>-->
                    <!--			<br>-->
					<?php //echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?><!--</li>-->
                    <!--			<br>-->
					<?php //echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?><!--</li>-->
                    <!--			<br>-->
					<?php //echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?><!--</li>-->
                    <!--			</p>-->
                    <a href="<?php echo JUri::root(true); ?>/index.php" class="btn btn-primary btn-xl"
                       title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
                    <br><br>
                    <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>

                </div>
            </div>

			<?php if ($this->debug) : ?>
            <div class="col-lg-12 text-center">
                <small>
                    <div>
						<?php echo $this->renderBacktrace(); ?>
						<?php // Check if there are more Exceptions and render their data as well ?>
						<?php if ($this->error->getPrevious()) : ?>
							<?php $loop = true; ?>
							<?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
							<?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
							<?php $this->setError($this->_error->getPrevious()); ?>
							<?php while ($loop === true) : ?>
                                <p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                                <p><?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
								<?php echo $this->renderBacktrace(); ?>
								<?php $loop = $this->setError($this->_error->getPrevious()); ?>
							<?php endwhile; ?>
							<?php // Reset the main error object to the base error ?>
							<?php $this->setError($this->error); ?>
						<?php endif; ?>
                    </div>
                </small>
            </div>
        </div>
		<?php endif; ?>
    </div>
    </div>
</header>

<!-- Bootstrap core JavaScript -->
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>





</body>
</html>
