<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts' );
function my_theme_enqueue_styles_scripts() {
	$parent_style = 'twentyseventeen-style';
	
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
	wp_enqueue_style('twentyseventeen-child-style',get_stylesheet_directory_uri() . '/style.css',
					array($parent_style),
					wp_get_theme()->get('Version')
					);

  wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),'', true );

  wp_localize_script( 'my_custom_script', 'ajax_call', array(
    'ajaxurl'   => admin_url( 'admin-ajax.php' ),
) );

}




if (isset($_POST['BtnSubmit'])) {

  global $wpdb;

$can_ids = array();
if(!empty($_POST['cannabinoid_id'])) {

  foreach($_POST['cannabinoid_id'] as $can_id) {
    $can_ids[] = $can_id;
  }
}

$terp_ids = array();
if(!empty($_POST['terpene_id'])) {

  foreach($_POST['terpene_id'] as $terp_id) {
    $terp_ids[] = $terp_id;
  }
}





$recp_ids = serialize($_POST['receptor_id']);
$neuro_ids = serialize($_POST['neurotransmitter_id']);
$chemo_ids = serialize($_POST['chemotype_id']);

$data_array = array(
  'study_title' => sanitize_text_field($_POST['study_title']),
  'country_id' => $_POST['country_id'],
  'condition_id' => $_POST['condition_id'],
  'type_of_study' => $_POST['type_of_study'],
  'key_findings' => sanitize_text_field($_POST['key_findings']),
  'chi_rating' => $_POST['chi_rating'],
 // 'cannabinoid_id' => $can_ids,
  //'terpene_id' => $terp_ids,
  'receptor_id' => $recp_ids,
  'neurotransmitter_id' => $neuro_ids,
  'year_of_pub' => $_POST['year_of_pub'],
  'doi' => sanitize_text_field($_POST['doi']),
  'link_to_study' => esc_url_raw($_POST['link_to_study']),
  'chemotype_id' => $chemo_ids,
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


if($rowResult == 1) {
  foreach($terp_ids as $id) {
   $data_array = array(
      'study_id' => $study_id,
      'terpene_id' => $id
   );
  $table_name = 'study_terpenes';
  $rowResult = $wpdb->insert($table_name, $data_array, $format=null);

  }

  echo '<h3>Form Submitted Successfully in Database</h3>';
} else {
  echo 'Error in Form Submission!';
}

}
}


