<?php

/**
* Template Name: studies-output-template
*/

get_header(); ?>

<div class="container" style="width:70%; margin-left: 205px; margin-top: -75px; margin-bottom: -75px;">
  
 <table>
 <thead>
<tr>
<th class="studyTitle" scope="col">Study</th>
<th class="studyMisc" scope="col">Condition</th>
<th class="studyMisc" scope="col">Chi Rating</th>
<th class="keyFindings" scope="col">Key Findings</th>
<th class="studyMisc" scope="col">Year of Publication</th>
</tr>
</thead>
<tbody>

  <?php 

  global $wpdb;
  $result = $wpdb->get_results('SELECT `cannabis_studies` .`study_title`, `key_findings`, `condition`, `chi_rating`, `year_of_pub`
FROM `cannabis_studies` INNER JOIN `conditions`
ON `condition_id` = `conditions`.`id`
INNER JOIN `cannabinoids`
ON `cannabinoid_id` = `cannabinoids`.`id`');


  foreach ( $result as $print ) { ?>
    <tr>
      <td><?php echo $print->study_title; ?></td>
      <td><?php echo $print->condition; ?></td>
      <td><?php echo $print->chi_rating; ?></td>
      <td><?php echo $print->key_findings; ?></td>
      <td><?php echo $print->year_of_pub; ?></td>

    </tr>
    <?php } ?>
</tbody>
</table>
</div>


<?php get_footer();
