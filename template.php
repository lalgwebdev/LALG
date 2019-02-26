<?php
// $Id: template.php,v 1.1 2009/05/15 07:28:05 agileware Exp $


require_once("common_methods.php");

/*
function get_full_path_to_theme() {
  return base_path() . path_to_theme();
}
*/
/*
function LALG_service_links_node_format($links) {
  return '<div class="service-links"><div class="service-label">'. t('Bookmark/Search this post with: ') .'</div>'. art_links_worker($links) .'</div>';
}
*/
/*
function LALG_breadcrumb($breadcrumb) {
  $breadcrumb = menu_get_active_breadcrumb();
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">' . implode(' | ', $breadcrumb) . '</div>';
  }
}
*/
/*
function LALG_comment_wrapper($content, $type = null) {
  static $node_type;
  if (isset($type)) $node_type = $type;
  return '<div id="comments">'. $content . '</div>';
}
*/
/* **********************  Extra code by AMS  ***************************** */


// Get rid of the "All Day" label on dates without a time.
function LALG_date_all_day_label() {
  return '';
}

// Add Links to Group Nodes to enable adding Events, Galleries, Etc.
// Process the [blank] token in Title fields.
function LALG_preprocess_node(&$variables) {

	//dpm($variables['elements']['links']);
		
    if ('group' == $variables['type'] && user_access("administer nodes")) {

	$mylinks = array(
		'#theme' => 'links_node_lalg',
		'#links' => array('event' => array('title' => 'Add Event',
											'query' => array('field_groupref' => $variables['nid']),
											'href' => '/node/add/event/'),
							'gallery' => array('title' => 'Add More Information',
												'query' => array('field_groupref' => $variables['nid']),
												'href' => '/node/add/gallery/')),
		'#attributes' => array('class' => array('links', 'inline')),
	);

	$variables['content']['links']['lalg'] = $mylinks;
	$variables['elements']['links']['lalg'] = $mylinks;
	}
	
	// Put Title as blank field if it equals '[blank]'
	if ($variables['title'] =='[blank]') {$variables['title'] = '';};
}

// Add Print Button after Page Title - on Static pages only.  Etc.
function LALG_preprocess_page (&$variables) {
	// dpm($variables['node']);
	// dpm($variables['node'] -> type);
	if (array_key_exists('node', $variables)) {
		if ($variables['node'] -> type == 'static') {
			$variables['title_prefix'] = '<div> <input class="lalg-print-button" type="button" value="Print Page" onclick="window.print();">';
			$variables['title_suffix'] = '</div>';
		};
	};
}


// Change display of dates if all are in the past (else shows nothing)
function LALG_field_display_node_alter(&$display, $context) {
	if ($context['field']['field_name'] == 'field_eventdate') {		// Are we displaying a date?
	    $und = end($context['entity']->field_eventdate['und']);		// Get the last date (for repeating events)
//		dpm($und['value']);
		if (strtotime($und['value']) < time()) {					// Is it before now?
//			dpm($context); 
		//	dpm($display);
			$display['settings']['multiple_from'] = "";				// Change the display format to show old dates
			$display['settings']['format_type'] = "long";			// And the year.
		}
	}
}


/*  Remove Revisions Function  */
/*  Now switched off by default in Drupal - should be OK 
function phptemplate_node_form($form) 
{    
	unset($form['revision_information']);        
	return theme_node_form($form);
}
*/
