<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts' );
function my_theme_enqueue_styles_scripts() {
	$parent_style = 'twentyseventeen-style';
	
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style('twentyseventeen-child-style',get_stylesheet_directory_uri() . '/style.css',
					array($parent_style),
					wp_get_theme()->get('Version')
					);
  

  wp_enqueue_script('custom-tooltip', get_stylesheet_directory_uri(). '/js/tooltip.js', array('jquery-ui-tooltip'), false, true );

  wp_enqueue_script('custom-dialog', get_stylesheet_directory_uri(). '/js/dialog.js', array('jquery-ui-dialog'), false, true );  

  wp_enqueue_script( 'chart-js', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js', array(), true );


 if (!is_admin() ){
    wp_enqueue_script('custom-accordion', get_stylesheet_directory_uri(). '/js/accordion.js', array('jquery-ui-accordion'), false, true );
 }


 // wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),'', true );

 // wp_localize_script( 'my_custom_script', 'ajax_call', array(
//    'ajaxurl'   => admin_url( 'admin-ajax.php' ),
//) );

wp_register_style( 'jquery-custom-style', get_stylesheet_directory_uri(). '/css/jquery-ui-1.12.1.custom/jquery-ui.css', array(), '1', 'screen' );
wp_enqueue_style('jquery-custom-style');

}




if (isset($_POST['BtnSubmit'])) {

if( processSubmission()) {
    echo '<h3>Form Submitted Successfully in Database</h3>';
} else {
  echo 'Error in Form Submission!';
}

}

function processSubmission(){
  global $wpdb;



$can_ids = array();
if(!empty($_POST['cannabinoid_id'])) {

  foreach($_POST['cannabinoid_id'] as $can_id) {
    $can_ids[] = $can_id;
  }
} else { echo 'You forgot to input a cannabinoid value!';}

$coun_ids = array();
if(!empty($_POST['country_id'])) {

  foreach($_POST['country_id'] as $coun_id) {
    $coun_ids[] = $coun_id;
  }
} else { echo 'You forgot to input a country value!';}

$terp_ids = array();
if(!empty($_POST['terpene_id'])) {

  foreach($_POST['terpene_id'] as $terp_id) {
    $terp_ids[] = $terp_id;
  }
} else { echo 'You forgot to input a terpene value!';}

$mbtech_ids = array();
if(!empty($_POST['mbtechnique_id'])) {

  foreach($_POST['mbtechnique_id'] as $mbtech_id) {
    $mbtech_ids[] = $mbtech_id;
  }
} else { echo 'You forgot to input a mind body technique value!';}

$recp_ids = array();
if(!empty($_POST['receptor_id'])) {

  foreach($_POST['receptor_id'] as $recp_id) {
    $recp_ids[] = $recp_id;
  }
} else { echo 'You forgot to input a receptor value!';}

$neuro_ids = array();
if(!empty($_POST['neurotransmitter_id'])) {

  foreach($_POST['neurotransmitter_id'] as $neuro_id) {
    $neuro_ids[] = $neuro_id;
  }
} else { echo 'You forgot to input a neurotransmitter value!';}

$chemo_ids = array();
if(!empty($_POST['chemotype_id'])) {

  foreach($_POST['chemotype_id'] as $chemo_id) {
    $chemo_ids[] = $chemo_id;
  }
} else { echo 'You forgot to input a chemotype value!';}

$form_ids = array();
if(!empty($_POST['form_admin_id'])) {

  foreach($_POST['form_admin_id'] as $form_id) {
    $form_ids[] = $form_id;
  }
} else { echo 'You forgot to input a form of administration value!';}

$condi_ids = array();
if(!empty($_POST['condition_id'])) {

  foreach($_POST['condition_id'] as $condi_id) {
    $condi_ids[] = $condi_id;
  }
} else { echo 'You forgot to select a condition value!';}


$data_array = array(
  'study_title' => sanitize_text_field($_POST['study_title']),
  //'country_id' => $_POST['country_id'],
 // 'condition_id' => $_POST['condition_id'],
  'type_of_study' => $_POST['type_of_study'],
  'key_findings' => sanitize_text_field($_POST['key_findings']),
  'chi_rating' => $_POST['chi_rating'],
  'mbi_rating' => $_POST['mbi_rating'],
  'mbi_notes' => sanitize_text_field($_POST['mbi_notes']),
 // 'cannabinoid_id' => $can_ids,
  //'terpene_id' => $terp_ids,
  //'receptor_id' => $recp_ids,
  //'neurotransmitter_id' => $neuro_ids,
  'year_of_pub' => $_POST['year_of_pub'],
  'doi' => sanitize_text_field($_POST['doi']),
   'dosage' => sanitize_text_field($_POST['dosage']),
  'link_to_study' => esc_url_raw($_POST['link_to_study']),
 // 'chemotype_id' => $chemo_ids,
   'sub_ratios' => sanitize_text_field($_POST['sub_ratios']),
  'log_entry' => $_POST['log_entry'],
  );



$table_name = 'cannabis_studies';

$rowResult = $wpdb->insert($table_name, $data_array, $format=null);



// $rowResult return 1


if($rowResult == 1) {
  $study_id = $wpdb->insert_id;
  foreach($can_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'cannabinoid_id' => $id
   );
  $table_name = 'study_cannabinoids';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }
}  


if($rowResult == 1) {
  foreach($coun_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'country_id' => $id
   );
  $table_name = 'study_countries';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);
  }
}

if($rowResult == 1) {
  foreach($form_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'form_admin_id' => $id
   );
  $table_name = 'study_forms_admin';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);
  }
}

if($rowResult == 1) {
  foreach($condi_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'condition_id' => $id
   );
  $table_name = 'study_conditions';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);
  }
}


if($rowResult == 1) {
  foreach($terp_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'terpene_id' => $id
   );
  $table_name = 'study_terpenes';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);
  }
}

if($rowResult == 1) {
  foreach($mbtech_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'mbtechnique_id' => $id
   );
  $table_name = 'study_mbtechniques';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);
  }
}


if($rowResult == 1) {
  foreach($recp_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'receptor_id' => $id
   );
  $table_name = 'study_receptors';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }
}

if($rowResult == 1) {
  foreach($neuro_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'neurotransmitter_id' => $id
   );
  $table_name = 'study_neurotransmitters';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }
}

if($rowResult == 1) {
  foreach($chemo_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'chemotype_id' => $id
   );
  $table_name = 'study_chemotypes';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }
}

return $rowResult;

}


if (isset($_POST['PSSubmit'])) {


if( processPSSubmission()) {
    echo '<h3>Form Submitted Successfully in Database</h3>';
} else {
  echo 'Error in Form Submission!';
}

}


function processPSSubmission(){
  global $wpdb;

$ps_ids = array();
if(!empty($_POST['primary_study_id'])) {

  foreach($_POST['primary_study_id'] as $ps_id) {
    $ps_ids[] = $ps_id;
  }
} else { echo 'You forgot to input a primary study value!';}


  $condition_id = $_POST['condition_id']; 
  foreach($ps_ids as $id) {
   $data_array = array(
      'condition_id' => $condition_id,
      'primary_study_id' => $id
   );
  $table_name = 'study_primaries';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }


return $rowResult;
}
