<?php

/**
* Template Name: studies-output-template
*/
get_header(); ?>

<div class="container"  style="width:98%; margin: -75px 20px;">
  
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
<th class="studyMisc" scope="col">Chemotypes</th>
<th class="studyMisc" scope="col">Year Published</th>
</tr>
</thead>
<tbody>

  <?php 

  global $wpdb;
  $result = $wpdb->get_results('SELECT `cannabis_studies` .`study_title`, `country_id`, `key_findings`, `chi_rating`, `year_of_pub`, `cannabis_studies`. `id`
FROM `cannabis_studies`');



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
    $country_result = $wpdb->get_results('SELECT cu.country FROM study_countries su, cannabis_studies s, countries cu 
where su.country_id = cu.id 
and s.id = su.study_id and s.id = ' . $s->id);

  $coura = array();
   foreach ($country_result as $cour) {
   $coura[] = $cour->country;
   }
   $s->country = implode(', ', $coura);
  
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

foreach ( $result as $s) { 
    $receptor_result = $wpdb->get_results('SELECT rc.receptor FROM study_receptors sr, cannabis_studies s, receptors rc 
where sr.receptor_id = rc.id 
and s.id = sr.study_id and s.id = ' . $s->id);

  $rra = array();
   foreach ($receptor_result as $rr) {
   $rra[] = $rr->receptor;
   }
   $s->receptor = implode(', ', $rra);
  
}

  foreach ( $result as $s) { 
    $neurotransmitter_result = $wpdb->get_results('SELECT ne.neurotransmitter FROM study_neurotransmitters sn, cannabis_studies s, neurotransmitters ne 
where sn.neurotransmitter_id = ne.id 
and s.id = sn.study_id and s.id = ' . $s->id);

  $nra = array();
   foreach ($neurotransmitter_result as $nr) {
   $nra[] = $nr->neurotransmitter;
   }
   $s->neurotransmitter = implode(', ', $nra);
  
}

  foreach ( $result as $s) { 
    $condition_result = $wpdb->get_results('SELECT co.condition FROM study_conditions so, cannabis_studies s, conditions co 
where so.condition_id = co.id 
and s.id = so.study_id and s.id = ' . $s->id);

  $cora = array();
   foreach ($condition_result as $cor) {
   $cora[] = $cor->condition;
   }
   $s->condition = implode(', ', $cora);
  
}

  foreach ( $result as $s) { 
    $chemotype_result = $wpdb->get_results('SELECT ch.chemotype FROM study_chemotypes sh, cannabis_studies s, chemotypes ch 
where sh.chemotype_id = ch.id 
and s.id = sh.study_id and s.id = ' . $s->id);

  $chra = array();
   foreach ($chemotype_result as $chr) {
   $chra[] = $chr->chemotype;
   }
   $s->chemotype = implode(', ', $chra);
  
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
      <td><?php echo $print->chemotype; ?></td>
      <td><?php echo $print->year_of_pub; ?></td>

    </tr>
    <?php } ?>
</tbody>
</table>
</div>


<?php get_footer();
