<?php
/**
 * Template Name: Event template
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Cryout Creations
 * @subpackage parabola
 * @since parabola 0.5
 */

$tt = explode("\n", file_get_contents(__DIR__ . '/tt.dat'));
$stem = trim($tt[0]);
$modu = trim($tt[1]);

global $wp_query;
get_header();
?>

<section id="container" class="one-column">
	<div id="content" role="main">
<?php
	cryout_before_content_hook();
?>
	<div class="page type-page status-publish hentry">
<?php
	$rootpath = '/root/';
	$htmlpath = 'astrocats/astrocats/' . $modu . '/output/html/';
	function loadEventFrame($name) {
		global $rootpath, $htmlpath, $stem;
		if (file_exists($rootpath.$htmlpath.rawurldecode($name).'.html') ||
			file_exists($rootpath.$htmlpath.rawurldecode($name).'.html.gz')) { ?>
			<div id="loading" style="text-align:center;"><img src="https://<?php echo $stem; ?>.space/wp-content/themes/astrocats-child-theme/loading.gif"><br>Loading...</div>
			<div style="overflow:auto;-webkit-overflow-scrolling:touch">
			<iframe width=100% scrolling="no" src="https://<?php echo $stem; ?>.space/<?php echo $htmlpath.$name; ?>.html" style="display:block;border:none;width=100%;" onload="resizeIframe(this)"></iframe>
			</div>
<?php 		return true;
		}
		return false;
	}
	$eventname = $wp_query->query_vars['eventname'];
	if (!loadEventFrame($eventname)) {
		if (is_numeric(substr($eventname, 0, 3))) {
			$eventname = 'SN'.$eventname;
		}
		if ((substr($eventname, 0, 2) == 'SN' && is_numeric(substr($eventname, 2, 4)) && strlen($eventname) == 7) || 
			(substr($eventname, 0, 2) == 'SN' && is_numeric(substr($eventname, 2, 3)) && strlen($eventname) == 6)) {
			$eventname = strtoupper($eventname);
		}
		$str = file_get_contents('/var/www/html/' . $stem . '/astrocats/astrocats/' . $modu . '/output/names.min.json');
		$json = json_decode($str, true);
		$found = false;
		foreach ($json as $name => $entry) {
			foreach ($entry as $alias) {
				if($alias == $eventname) {
					if (loadEventFrame($name)) {
						$found = true;
					} else {
						foreach ($entry as $alias2) {
							if (loadEventFrame($alias2)) $found = true;
						}	
					}
					break 2;
				}
			}
		}
		if (!$found) {
?>
			<div style="text-align:center;">Error: Invalid event name "<?php echo $eventname; ?>"! [<?php echo rawurldecode($eventname); ?>]</div>
<?php 	}
	}
?>
	</div>

	<?php cryout_after_content_hook(); ?>

	</div><!-- #content -->
		
</section><!-- #container -->

<?php get_footer(); ?>
