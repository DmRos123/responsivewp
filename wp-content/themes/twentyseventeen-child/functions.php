<?php
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
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles_scripts' );





if (isset($_POST['BtnSubmit'])) {

  global $wpdb;

$data_array = array(
  'study_title' => $_POST['study_title'],
  'country_id' => $_POST['country_id'],
  'condition_id' => $_POST['condition_id'],
  'type_of_study' => $_POST['type_of_study'],
  'key_findings' => $_POST['key_findings'],
  'chi_rating' => $_POST['chi_rating'],
  'cannabinoid_id' => $_POST['cannabinoid_id'],
  'terpene_id' => $_POST['terpene_id'],
  'key_findings' => $_POST['key_findings'],
  'year_of_pub' => $_POST['year_of_pub'],
  'doi' => $_POST['doi'],
  'link_to_study' => $_POST['link_to_study'],
  'chemotype_id' => $_POST['chemotype_id'],
  'log_entry' => $_POST['log_entry'],
  'receptor_id' => $_POST['receptor_id'],
  'neurotransmitter_id' => $_POST['neurotransmitter_id']
  );

$table_name = 'cannabis_studies';

$rowResult = $wpdb->insert($table_name, $data_array, $format=NULL);

// $rowResult return 1

if($rowResult == 1) {
  echo '<h3>Form Submitted Successfully in Database</h3>';
} else {
  echo 'Error in Form Submission!';
}

}


