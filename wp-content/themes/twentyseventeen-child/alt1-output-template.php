<?php

/**
* Template Name: alt1-output-template
*/

get_header(); ?>

<div class="container"  style="width:98%; margin: -75px 20px;">
  
  <table>
 <thead>
<tr>
<th class="studyMisc" scope="col">Study Id</th>
<th class="studyTitle" scope="col">Study</th>
<th class="keyFindings" scope="col">Key Findings</th>
<th class="studyMisc" scope="col">Cannabinoids</th>
<th class="studyMisc" scope="col">Form</th>
<th class="studyMisc" scope="col">Country of Origin</th>
</tr>
</thead>
<tbody>

  <?php 

  global $wpdb;
  $result = $wpdb->get_results('SELECT `cannabis_studies` .`id`, `study_title`, `key_findings`
FROM `cannabis_studies` ');


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
    $form_result = $wpdb->get_results('SELECT fa.form_admin FROM study_forms_admin sfa, cannabis_studies s, forms_admin fa 
where sfa.form_admin_id = fa.id 
and s.id = sfa.study_id and s.id = ' . $s->id);

  $fara = array();
   foreach ($form_result as $far) {
   $fara[] = $far->form_admin;
   }
   $s->form_admin = implode(', ', $fara);
  
}


  foreach ( $result as $print ) { ?>
    <tr>
      <td><?php echo $print->id; ?></td>
      <td><?php echo $print->study_title; ?></td>
      <td><?php echo $print->key_findings; ?></td>
      <td><?php echo $print->cannabinoid; ?></td>
      <td><?php echo $print->form_admin; ?></td>
      <td><?php echo $print->country; ?></td>


    </tr>
    <?php } ?>
</tbody>
</table>
</div>


<?php get_footer();
