<?php

/**
* Template Name: alt1-output-template
*/

get_header(); ?>

<div class="container" style="width:90%; margin-left: 50px; margin-top: -75px; margin-bottom: -75px;">
  
  <table>
 <thead>
<tr>
<th class="studyTitle" scope="col">Study</th>
<th class="studyMisc" scope="col">Condition</th>
<th class="studyMisc" scope="col">Chi Rating</th>
<th class="keyFindings" scope="col">Key Findings</th>
<th class="studyMisc" scope="col">Cannabinoids</th>
<th class="studyMisc" scope="col">Terpenes</th>
<th class="studyMisc" scope="col">Receptors</th>
<th class="studyMisc" scope="col">Neurotransmitters</th>
<th class="studyMisc" scope="col">Year of Publication</th>
</tr>
</thead>
<tbody>

  <?php 

  global $wpdb;
  $result = $wpdb->get_results('SELECT `cannabis_studies` .`study_title`, `country_name`, `condition`, `key_findings`, `chi_rating`, `year_of_pub`, `cannabis_studies`. `id`
FROM `cannabis_studies` INNER JOIN `conditions`
ON `condition_id` = `conditions`.`id`
INNER JOIN `countries`
ON `country_id` = `countries`.`id`');



  foreach ( $result as $s) { 
    $cannabinoid_result = $wpdb->get_results('SELECT cb.cannabinoid FROM study_cannabinoids sc, cannabis_studies s, cannabinoids cb 
where sc.cannabinoid_id = cb.id 
and s.id = sc.study_id and s.id = ' . $s->id);

  $cra = array();
   foreach ($cannabinoid_result as $cr) {
   $cra[] = $cr->cannabinoid;
   }
   $s->cannabinoid = implode(', ', $cra);
  
}



foreach ( $result as $s) { 
    $terpene_result = $wpdb->get_results('SELECT tp.terpene FROM study_terpenes st, cannabis_studies s, terpenes tp 
where st.terpene_id = tp.id 
and s.id = st.study_id and s.id = ' . $s->id);

  $tra = array();
   foreach ($terpene_result as $tr) {
   $tra[] = $tr->terpene;
   }
   $s->terpene = implode(', ', $tra);
  
}


  foreach ( $result as $print ) { ?>
    <tr>
      <td><?php echo $print->study_title; ?></td>
      <td><?php echo $print->condition; ?></td>
      <td><?php echo $print->chi_rating; ?></td>
      <td><?php echo $print->key_findings; ?></td>
      <td><?php echo $print->cannabinoid; ?></td>
      <td><?php echo $print->terpene; ?></td>
      <td><?php echo $print->receptor; ?></td>
      <td><?php echo $print->neurotransmitter; ?></td>
      <td><?php echo $print->year_of_pub; ?></td>

    </tr>
    <?php } ?>
</tbody>
</table>
</div>


<?php get_footer();
