<?php

/**
* Template Name: condition-display-template
*/

get_header();
?>
<div class="condition-page">
<?php

echo '<div class="container chart-chemotype">';
include('chart-summary-template.php');
echo '</div>';


function displayRelatedStudies($num) {
  $chi_val = '';
  $test_val = '';
  $terpenes = array();
  $terps_proven = array();
  $cannabinoids = array();
  $pharma = array();
  $canna_proven = array();
  global $cond_name;
  global $wpdb;
  $results = $wpdb->get_results("SELECT `study_conditions`.`condition_id`, `conditions`.`condition`,`study_conditions`.`study_id`, `cannabis_studies`.`study_title`, `cannabis_studies`.`key_findings`, `cannabis_studies`.`sub_ratios`, `cannabis_studies`.`dosage`,`cannabis_studies`. `chi_rating`, `cannabis_studies`.`year_of_pub`,`cannabis_studies`.`link_to_study` FROM ((`study_conditions` JOIN `cannabis_studies` ON `study_conditions`.`study_id`=`cannabis_studies`.`id`) JOIN `conditions` ON `study_conditions`.`condition_id` = `conditions`.`id`) WHERE `study_conditions`.`condition_id` = '$num' ORDER BY `cannabis_studies`.`year_of_pub` DESC" );
  $cond_row = $wpdb->get_row("SELECT `condition`, `description` FROM `conditions` WHERE `id` = '$num' ");
  $cond_name = $cond_row->condition;
  $cond_desc = $cond_row->description;
  $cond_name_uc = strtoupper($cond_name);
  $number_of_studies = count($results); 
  ob_start();
  foreach ($results as $chi){
    $test_val += $chi->chi_rating;
  }
  $testchi = $test_val/$number_of_studies;
  echo '<div class="summary-panel">';
  echo "<h2><strong>$cond_name_uc</strong></h2>";
  echo "<p>$cond_desc</p>";
  echo '<div class="conditionfeedback">';
  echo "</div>";
  echo "</div>";
  echo '<div class="conditions-rel-studies">';
  echo "<h2 id=\"ind-studies\"><strong>$cond_name_uc - $number_of_studies INDIVIDUAL STUDIES</strong></h2>";
  foreach ($results as $cur) {
    echo '<p>'; 
      $chi_val += $cur->chi_rating; 
      echo '<h2>'. stripslashes($cur->study_title) . '</h2>';
      echo 'Key Findings:    ';
      echo $cur->key_findings . '<br >';
      echo '<br >'; 
      echo 'Study ID: ' . $cur->study_id . '<br >';
      echo 'Year of Pub: ' . $cur->year_of_pub . '<br >';
      echo 'CHI Rating: ' . $cur->chi_rating . '<br >';
      $cond_cann = $wpdb->get_results("SELECT `study_cannabinoids`.`cannabinoid_id`, `cannabinoids`.`cannabinoid` FROM `study_cannabinoids` JOIN `cannabinoids` ON `study_cannabinoids`.`cannabinoid_id` = `cannabinoids`.`id` WHERE `study_id` = '$cur->study_id' " );
      $cannra = array();
      $new_study_cn = 0;
      foreach ($cond_cann as $cann) {
        if($cann->cannabinoid_id < 99 ){
          $cannra[] = $cann->cannabinoid;
          if($cann->cannabinoid_id < 10 ) {
            $cannabinoids[] = $cann->cannabinoid;
          } elseif($cann->cannabinoid_id >29 && $cann->cannabinoid_id < 34 ) {
             $pharma[] = $cann->cannabinoid;
          }
            if($cur->chi_rating > 4) {
              $canna_proven[] = $cann->cannabinoid;
            }           
          }
      }
      

      if(count($cannra)>0){
        echo 'Cannabinoids:  ' . implode(', ', $cannra) . '<br >';
      }
      $cond_chemo = $wpdb->get_results("SELECT `study_chemotypes`.`chemotype_id`, `chemotypes`.`chemotype` FROM `study_chemotypes` JOIN `chemotypes` ON `study_chemotypes`.`chemotype_id` = `chemotypes`.`id` WHERE `study_id` = '$cur->study_id' " );
      foreach ($cond_chemo as $chemo) {
        if($chemo->chemotype_id < 4 ){
          echo $chemo->chemotype . '<br >';
        }
      } 
      if($cur->sub_ratios != 0){
        echo 'Sub-Ratio: ' . $cur->sub_ratios . '<br >';
      }
      if($cur->dosage != 0){
        echo 'Dosage: ' . $cur->dosage . '<br >';
      }
      $cond_terp = $wpdb->get_results("SELECT `study_terpenes`.`terpene_id`, `terpenes`.`terpene` FROM `study_terpenes` JOIN `terpenes` ON `study_terpenes`.`terpene_id` = `terpenes`.`id` WHERE `study_id` = '$cur->study_id' " );
      $terpra = array();
      foreach ($cond_terp as $terp) { 
        if($terp->terpene_id < 99 ){
          $terpra[] = $terp->terpene;
          $terpenes[] = $terp->terpene;
          if($cur->chi_rating > 4) {
            $terps_proven[] = $terp->terpene;            
          }
        }
      }
      if(count($terpra)>0){
        echo 'Terpenes:  ' . implode(', ', $terpra) . '<br >';
      }
      echo '<a href="' . $cur->link_to_study . '"'.'>';
      echo'<br >  Link to study';
      echo '</a >';
      
  $sum_chi = $chi_val;
  }
  echo '</p>';
  
  echo '<div class="panel-data">';
  echo "<h2>Components Studied: </h2>";
  $clean_canna = array_unique($cannabinoids);
  if(count($clean_canna)>= 1){
    echo '<div class="panel-canna">';
    echo 'Phytocannabinoids:  <br >';
    echo  implode(', ', $clean_canna) . '<br >';
    echo '</div>';
  }
    $clean_pharma = array_unique($pharma);
  if(count($clean_pharma)>= 1){
    echo '<div class="panel-pharma">';
    echo 'Pharmaceutical Cannabinoids:  <br >';
    echo  implode(', ', $clean_pharma) . '<br >';
    echo '</div>';
  }

  $clean_terps = array_unique($terpenes);
  if(count($clean_terps)>= 1){
    echo '<div class="panel-terps">';
    echo 'Terpenes:  <br >';
    echo  implode(', ', $clean_terps) . '<br >';
    echo '</div>';
  }

  echo '</div>';
  echo '</div>';
  echo '<div class="chi-avg">';
  if(count($results)>0){
    $chiv = $sum_chi/count($results); 
    printf ("%.2f CHI Value", $chiv);
  }
  echo "&nbspBased On $number_of_studies Studies<br >";
  echo '</div>';
  


  echo '<div class="panel-proven">';
  echo '<h2>Components With Proven Therapeutic Effects:</h2>';
  $canna_proven_count = array_count_values($canna_proven);
  $clean_canna_proven = array_unique($canna_proven);
  if(count($clean_canna_proven)>= 1){
    echo '<div class="panel-canna-proven">';
    echo 'Cannabinoids: <br >';
    while($element = each($canna_proven_count)) {
      if($element['value'] < 2) {
        echo $element['key']. " - " . $element['value'] . "&nbsp study &nbsp";  
      } else {
        echo $element['key']. " - " . $element['value'] . "&nbsp studies &nbsp"; 
      }
    }
  echo '</div>';
  }

  $terps_proven_count = array_count_values($terps_proven);
  $clean_terps_proven = array_unique($terps_proven);
  if(count($clean_terps_proven)>= 1){
    echo '<div class="panel-terps-proven">';
    echo 'Terpenes: <br >';
    while($element = each($terps_proven_count)) {
      if($element['value'] < 2) {
        echo $element['key']. " - " . $element['value'] . "&nbsp study &nbsp";  
      } else {
        echo $element['key']. " - " . $element['value'] . "&nbsp studies &nbsp"; 
      }
    }
  echo '</div>';
  }
  if(count($clean_terps_proven) < 1 && count($clean_canna_proven) < 1){
    echo "Studies of $cond_name have yet to prove therapeutic effects in human clinical trials.";
  }
  echo '</div>';
  echo ob_get_clean();
}

displayRelatedStudies($myconditionsum);



?>
</div>
<?php
get_footer();