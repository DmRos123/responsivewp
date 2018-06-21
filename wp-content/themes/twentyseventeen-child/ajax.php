<?php

/*
=================
AJAX FUNCTIONS
=================

*/

add_action('wp_ajax_my_action_callback', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action_callback', 'my_action_callback');   


function my_action_callback(){
 
}

    if ( isset($_POST["chemotypes"]) ){
        global $wpdb;
        $table_name = 'cannabis_studies';
        $wpdb->insert($table_name, array(
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
  'chemotype_id' => $_POST['chemotypes'],
  'log_entry' => $_POST['log_entry'],
  'receptor_id' => $_POST['receptor_id'],
  'neurotransmitter_id' => $_POST['neurotransmitter_id']
  );
    }
}