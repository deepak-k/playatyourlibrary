<?php

/**
 * Implements template_preprocess_html().
**/
//function adult_program_preprocess_html(&$variables) {
//  // Add conditional CSS for IE. To use uncomment below and add IE css file
//  drupal_add_css(path_to_theme() . '/css/ie.css', array('weight' => CSS_THEME, 'browsers' => array('!IE' => FALSE), 'preprocess' => FALSE));
//
//  // Need legacy support for IE downgrade to Foundation 2 or use JS file below
//  // drupal_add_js('http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js', 'external');
//}

/**
 * Implements template_preprocess_page
 *
 */
//function adult_program_preprocess_page(&$variables) {
//}

/**
 * Implements template_preprocess_node
 *
 */
//function adult_program_preprocess_node(&$variables) {
//}

/**
 * Implements hook_preprocess_block()
 */
//function adult_program_preprocess_block(&$variables) {
//  // Add wrapping div with global class to all block content sections.
//  $variables['content_attributes_array']['class'][] = 'block-content';
//
//  // Convenience variable for classes based on block ID
//  $block_id = $variables['block']->module . '-' . $variables['block']->delta;
//
//  // Add classes based on a specific block
//  switch ($block_id) {
//    // System Navigation block
//    case 'system-navigation':
//      // Custom class for entire block
//      $variables['classes_array'][] = 'system-nav';
//      // Custom class for block title
//      $variables['title_attributes_array']['class'][] = 'system-nav-title';
//      // Wrapping div with custom class for block content
//      $variables['content_attributes_array']['class'] = 'system-nav-content';
//      break;
//
//    // User Login block
//    case 'user-login':
//      // Hide title
//      $variables['title_attributes_array']['class'][] = 'element-invisible';
//      break;
//
//    // Example of adding Foundation classes
//    case 'block-foo': // Target the block ID
//      // Set grid column or mobile classes or anything else you want.
//      $variables['classes_array'][] = 'six columns';
//      break;
//  }
//
//  // Add template suggestions for blocks from specific modules.
//  switch($variables['elements']['#block']->module) {
//    case 'menu':
//      $variables['theme_hook_suggestions'][] = 'block__nav';
//    break;
//  }
//}

//function adult_program_preprocess_views_view(&$variables) {
//}

/**
 * Implements template_preprocess_panels_pane().
 *
 */
//function adult_program_preprocess_panels_pane(&$variables) {
//}

/**
 * Implements template_preprocess_views_views_fields().
 *
 */
//function adult_program_preprocess_views_view_fields(&$variables) {
//}

/**
 * Implements theme_form_element_label()
 * Use foundation tooltips
 */
//function adult_program_form_element_label($variables) {
//  if (!empty($variables['element']['#title'])) {
//    $variables['element']['#title'] = '<span class="secondary label">' . $variables['element']['#title'] . '</span>';
//  }
//  if (!empty($variables['element']['#description'])) {
//    $variables['element']['#description'] = ' <span data-tooltip="top" class="has-tip tip-top" data-width="250" title="' . $variables['element']['#description'] . '">' . t('More information?') . '</span>';
//  }
//  return theme_form_element_label($variables);
//}

/**
 * Implements hook_preprocess_button().
 */
//function adult_program_preprocess_button(&$variables) {
//  $variables['element']['#attributes']['class'][] = 'button';
//  if (isset($variables['element']['#parents'][0]) && $variables['element']['#parents'][0] == 'submit') {
//    $variables['element']['#attributes']['class'][] = 'secondary';
//  }
//}

/**
 * Implements hook_form_alter()
 * Example of using foundation sexy buttons
 */
//function adult_program_form_alter(&$form, &$form_state, $form_id) {
//  // Sexy submit buttons
//  if (!empty($form['actions']) && !empty($form['actions']['submit'])) {
//    $classes = (is_array($form['actions']['submit']['#attributes']['class']))
//      ? $form['actions']['submit']['#attributes']['class']
//      : array();
//    $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//    $form['actions']['submit']['#attributes']['class'] = $classes;
//  }
//}

/**
 * Implements hook_form_FORM_ID_alter()
 * Example of using foundation sexy buttons on comment form
 */
//function adult_program_form_comment_form_alter(&$form, &$form_state) {
// Sexy preview buttons
//  $classes = (is_array($form['actions']['preview']['#attributes']['class']))
//    ? $form['actions']['preview']['#attributes']['class']
//    : array();
//  $classes = array_merge($classes, array('secondary', 'button', 'radius'));
//  $form['actions']['preview']['#attributes']['class'] = $classes;
//}

// LIBRARYSITE CUSTOM OVERRIDES
function adult_program_preprocess_html(&$variables) {
  $color = theme_get_setting('choose_color') ;
  $variables ['classes_array'][] = $color;
}


function adult_program_preprocess_block(&$variables) {
  // Convenience variable for block headers.
  $title_class = &$variables['title_attributes_array']['class'];

  // Unhide block titles in header region
  if ($variables['block']->region == 'header') {
    $title_class[] = 'eioverride';
  }
}


function adult_program_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
//    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
//    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
//    $form['search_block_form']['#size'] = 40;  // define size of the textfield
//    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('Go »'); // Change the text on the submit button
//   $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/search-button.png');

    // Add extra attributes to the text box
//    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
//    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    // Prevent user from searching the default text
//    $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='Search'){ alert('Please enter a search'); return false; }";

    // Alternative (HTML5) placeholder attribute instead of using the javascript
//    $form['search_block_form']['#attributes']['placeholder'] = t('Search');
  }
}

/**
 * Implements hook_css_alter().
 */
function adult_program_css_alter(&$css) {
  if (isset($css[drupal_get_path('theme', 'adult_program') . '/css/custom.css'])) {
    $css[drupal_get_path('theme', 'adult_program') . '/css/custom.css']['group'] += 1;
  }
  if (isset($css[variable_get('file_public_path', conf_path() . '/files') . '/fontyourface/font.css'])) {
    $css[variable_get('file_public_path', conf_path() . '/files') . '/fontyourface/font.css']['group'] += 10;
  }
  // // Always remove base theme CSS.
  // $theme_path = drupal_get_path('theme', 'zurb_foundation');
  //
  // foreach($css as $path => $values) {
  //   if(strpos($path, $theme_path) === 0) {
  //     unset($css[$path]);
  //   }
  // }
}

/**
 * Implements hook_js_alter().
 */
// function adult_program_js_alter(&$js) {
//   // Always remove base theme JS.
//   $theme_path = drupal_get_path('theme', 'zurb_foundation');
//
//   foreach($js as $path => $values) {
//     if(strpos($path, $theme_path) === 0) {
//       unset($js[$path]);
//     }
//   }
// }

function adult_program_preprocess_page(&$variables) {


if (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_activity']) || !empty($variables['page']['sidebar_shareit'])){
    $left = $variables['page']['sidebar_first'];
    $left1 = $variables['page']['sidebar_activity'];
    $left2 = $variables['page']['sidebar_shareit'];

  }

  if (!empty($variables['page']['sidebar_second'])) {
    $right = $variables['page']['sidebar_second'];
  }

  // Dynamic sidebars
  if ((!empty($left) || !empty($left1) || !empty($left2)) && !empty($right)) {
    $variables['main_grid'] = 'large-6 push-3';
    $variables['sidebar_first_grid'] = 'large-3 pull-6';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif ((!empty($left) || !empty($left1) || !empty($left2)) && !empty($right)) {
    $variables['main_grid'] = 'large-9';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = 'large-3';
  } elseif ((!empty($left) || !empty($left1) || !empty($left2)) && empty($right)) {
    $variables['main_grid'] = 'medium-8 medium-push-4';
    $variables['sidebar_first_grid'] = 'medium-4 medium-pull-8';
    $variables['sidebar_sec_grid'] = '';
  } else {
    $variables['main_grid'] = 'medium-12';
    $variables['sidebar_first_grid'] = '';
    $variables['sidebar_sec_grid'] = '';
  }

}


// Custom breadcrum

function teen_programme_breadcrumb($variables) {
  global $base_url;
  //$breadcrum = 'Home » Messages » Messages';
  $variables['breadcrumb'] = '<a href="'.$base_url.'">Home</a> » <a href="'.$base_url.'/messages">Messages</a> » Messages';
  if(arg(0) == 'messages' && arg(1) == 'view') {
    return $variables['breadcrumb'];
  }
}