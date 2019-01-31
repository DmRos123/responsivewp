<?php

/**
* Template Name: condition-altdisplay-template
*/

get_header();
?>
<div class="cond-studies-page">
<?php



function displayRelatedStudies($num) {
  $chi_val = '';
  $terpenes = array();
  $terps_proven = array();
  $cannabinoids = array();
  $pharma = array();
  $canna_proven = array();
  global $cond_name;
  global $wpdb;
  $results = $wpdb->get_results("SELECT `study_conditions`.`condition_id`,`study_conditions`.`study_id`, `cannabis_studies`.`year_of_pub` FROM `study_conditions` JOIN `cannabis_studies` ON `study_conditions`.`study_id`=`cannabis_studies`.`id` WHERE `study_conditions`.`condition_id` = '$num' ORDER BY `cannabis_studies`.`year_of_pub` DESC " );
  $cond_row = $wpdb->get_row("SELECT `condition`, `description` FROM `conditions` WHERE `id` = '$num' ");
  $cond_name = $cond_row->condition;
  $cond_desc = $cond_row->description;
  $cond_name_uc = strtoupper($cond_name);
  $number_of_studies = count($results); 
  echo '<div class="summary-panel">';
  echo "<h2><strong>$cond_name_uc</strong></h2>";
  echo "<p>$cond_desc</p>";
  echo '<div class="conditionfeedback">';
  echo "</div>";
  echo "</div>";
  echo '<div class="conditions-rel-studies">';
  echo "<h2 id=\"ind-studies\"><strong>$cond_name_uc - $number_of_studies INDIVIDUAL STUDIES</strong></h2>";
  foreach ($results as $current) {
    $cond_studies = $wpdb->get_results("SELECT `study_title`, `key_findings`, `sub_ratios`, `dosage`, `chi_rating`, `year_of_pub`,`link_to_study` FROM `cannabis_studies` WHERE `id` = '$current->study_id' ");
    echo '<p>'; 
    foreach ($cond_studies as $cur) {
      $chi_val += $cur->chi_rating; 
      echo '<h2>'. stripslashes($cur->study_title) . '</h2>';
      echo 'Key Findings:    ';
      echo $cur->key_findings . '<br >';
      echo '<br >'; 
      echo 'Year of Pub: ' . $cur->year_of_pub . '<br >';
      echo 'CHI Rating: ' . $cur->chi_rating . '<br >';
      $cond_cann = $wpdb->get_results("SELECT `cannabinoid_id` FROM `study_cannabinoids` WHERE `study_id` = '$current->study_id' " );
      $cannra = array();
      $new_study_cn = 0;
      foreach ($cond_cann as $cann) {
        if($cann->cannabinoid_id < 99 ){
          $cann_name = $wpdb->get_var("SELECT `cannabinoid` FROM `cannabinoids` WHERE `id` = '$cann->cannabinoid_id ' ");
          $cannra[] = $cann_name;
          if($cann->cannabinoid_id < 10 ) {
            $cannabinoids[] = $cann_name;
          } elseif($cann->cannabinoid_id >29 && $cann->cannabinoid_id < 34 ) {
             $pharma[] = $cann_name;
          }
            if($cur->chi_rating > 4) {
              $canna_proven[] = $cann_name;
            }           
          }
      }
      

      if(count($cannra)>0){
        echo 'Cannabinoids:  ' . implode(', ', $cannra) . '<br >';
      }
      $cond_chemo = $wpdb->get_results("SELECT `chemotype_id` FROM `study_chemotypes` WHERE `study_id` = '$current->study_id' " );
      foreach ($cond_chemo as $chemo) {
        if($chemo->chemotype_id < 4 ){
          $chemo_name = $wpdb->get_var("SELECT `chemotype` FROM `chemotypes` WHERE `id` = '$chemo->chemotype_id ' ");
          echo $chemo_name . '<br >';
        }
      } 
      if($cur->sub_ratios != 0){
        echo 'Sub-Ratio: ' . $cur->sub_ratios . '<br >';
      }
      if($cur->dosage != 0){
        echo 'Dosage: ' . $cur->dosage . '<br >';
      }
      $cond_terp = $wpdb->get_results("SELECT `terpene_id` FROM `study_terpenes` WHERE `study_id` = '$current->study_id' " );
      $terpra = array();
      foreach ($cond_terp as $terp) { 
        if($terp->terpene_id < 99 ){
          $terp_name = $wpdb->get_var("SELECT `terpene` FROM `terpenes` WHERE `id` = '$terp->terpene_id ' ");
          $terpra[] = $terp_name;
          $terpenes[] = $terp_name;
          if($cur->chi_rating > 4) {
            $terps_proven[] = $terp_name;            
          }
        }
      }
      if(count($terpra)>0){
        echo 'Terpenes:  ' . implode(', ', $terpra) . '<br >';
      }
      echo '<a href="' . $cur->link_to_study . '"'.'>';
      echo'<br >  Link to study';
      echo '</a >';
    }  
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
}

displayRelatedStudies($myconditionsum);
echo '<div class="container chart-chemotype">';
include('chart-summary-template.php');
echo '</div>';
?>
</div>
<?php
get_footer();