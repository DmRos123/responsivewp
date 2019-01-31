<?php

/**
* Template Name: search-studies-template
*/


get_header();

?>
<div class="container" style="margin: 0 1em;">

<?php  


function showTitleList() {
      global $wpdb;
      $search_title_result = $wpdb->get_results('SELECT * FROM `cannabis_studies`ORDER BY `cannabis_studies`.`study_title` ASC');
    ?>
  <form method="post">
     <h1>Search by Study Title</h1>
  <div class="form-group condition-form search-id">
    <label for="study_title_search">Study Title:</label>
    <select class="form-control" name="study_title_search">
      <?php 
      foreach($search_title_result as $k) {
        echo " <option value=\"$k->id\">$k->study_title</option>";
      }
      ?>
    </select>
    <button type="submit" id="submit" name="STSubmit" class="btn btn-default">Submit</button>
  </div>
  
   </form>

   <form method="post">
     <h1>Search by DOI</h1>
  <div class="form-group condition-form search-id">
    <label for="doi_search">DOI:</label>
    <input type="text" class="form-control" name="doi_search">
    <button type="submit" id="submit" name="DSubmit" class="btn btn-default">Submit</button>
  </div>
  </form>

   <form method="post">
     <h1>Search by Keyword</h1>
  <div class="form-group condition-form search-id">
    <label for="keyword_search">Keyword:</label>
    <input type="text" class="form-control" name="keyword_search">
    <button type="submit" id="submit" name="KSubmit" class="btn btn-default">Submit</button>
  </div>
  </form>

</div>
<?php
return;
}

$myKey;
$myKey1 = null;

   if(empty($_POST['study_title_search']) && empty($_POST['doi_search']) && empty($_POST['keyword_search'])) {
    showTitleList();
    return;
   } 

   if(isset($_POST['study_title_search'])) {
    
   $mystudytitle = sanitize_text_field($_POST['study_title_search']); 
   $myKey = $mystudytitle;
   echo '<div class="studyId">';
   echo "Study id number is:  $mystudytitle";
   echo '</div>';
 
 } elseif (isset($_POST['doi_search'])) {
    $searched_doi = sanitize_text_field($_POST['doi_search']);
    $idByDoi = $wpdb->get_var("SELECT `cannabis_studies` . `id` FROM `cannabis_studies` WHERE `doi` = '$searched_doi' ");
  $myKey = $idByDoi;
  echo '<div class="studyId">';
  echo "Study id number is:  $idByDoi";
  echo '</div>';
  
 } elseif (isset($_POST['keyword_search'])) {
    $searched_keyword = sanitize_text_field($_POST['keyword_search']);
    $idByKeyword = $wpdb->get_results("SELECT `cannabis_studies` . `id` FROM `cannabis_studies` WHERE `key_findings` LIKE '%$searched_keyword%' || `study_title` LIKE '%$searched_keyword%' ");
   $kw = array();
    foreach ($idByKeyword as $i){
     $kw[] = $i->id;
    }
  $myKey1 = implode(', ', $kw); 
  echo '<div class="studyId">';
  echo "Keyword found in the following studies:  $myKey1";
  echo '</div>';
 }
 
if( $myKey1 ) {
  global $wpdb;
  foreach($kw as $k) {
  $result = $wpdb->get_results("SELECT `cannabis_studies` .`study_title`, `type_of_study`, `key_findings`, `chi_rating`, `mbi_rating`, `mbi_notes`, `sub_ratios`, `dosage`, `link_to_study`, `doi`, `year_of_pub`, `cannabis_studies`. `id`
FROM `cannabis_studies` WHERE `cannabis_studies`. `id` = '$k'");

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
    $mbtechnique_result = $wpdb->get_results('SELECT mbt.mbtechnique FROM study_mbtechniques smb, cannabis_studies s, mbtechniques mbt 
where smb.mbtechnique_id = mbt.id 
and s.id = smb.study_id and s.id = ' . $s->id);

  $mbra = array();
   foreach ($mbtechnique_result as $mbr) {
   $mbra[] = $mbr->mbtechnique;
   }
   $s->mbtechnique = implode(', ', $mbra);
  
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
    <ul class="studyId" style="margin-top: 50px; list-style-type: none; font-weight: 700;">
      <li><?php echo "ID: $print->id"; ?></li>
      <li><?php echo "Title: $print->study_title"; ?></li>
      <li><?php echo "Type of Study: $print->type_of_study"; ?></li>
      <li><?php echo "Condition: $print->condition"; ?></li>
      <li><?php echo "Chi Rating: $print->chi_rating"; ?></li>
      <li><?php echo "Key Findings: $print->key_findings"; ?></li>
      <li><?php echo "MBI Rating: $print->mbi_rating"; ?></li>
      <li><?php echo "MB Technique: $print->mbtechnique"; ?></li>
      <li><?php echo "MBI Notes: $print->mbi_notes"; ?></li>
      <li><?php echo "Cannabinoids: $print->cannabinoid"; ?></li>
      <li><?php echo "Terpenes: $print->terpene"; ?></li>
      <li><?php echo "Receptors: $print->receptor"; ?></li>
      <li><?php echo "Neurotransmitters: $print->neurotransmitter"; ?></li>
      <li><?php echo "Chemotype: $print->chemotype"; ?></li>
      <li><?php echo "Sub-Ratio: $print->sub_ratios"; ?></li>
      <li><?php echo "Form of Administration: $print->form_admin"; ?></li>
      <li><?php echo "Dosage: $print->dosage"; ?></li>
      <li><?php echo "Link to Study: $print->link_to_study"; ?></li>
      <li><?php echo "DOI: $print->doi"; ?></li>
      <li><?php echo "Year of Publication: $print->year_of_pub"; ?></li>

    </ul>
    <?php } ?>
</tbody>
</table>
<?php } ?>
</div>
<?php

} else {

  global $wpdb;
  $result = $wpdb->get_results("SELECT `cannabis_studies` .`study_title`, `type_of_study`, `key_findings`, `chi_rating`, `mbi_rating`, `mbi_notes`, `sub_ratios`, `dosage`, `link_to_study`, `doi`, `year_of_pub`, `cannabis_studies`. `id`
FROM `cannabis_studies` WHERE `cannabis_studies`. `id` = '$myKey'");



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
    $mbtechnique_result = $wpdb->get_results('SELECT mbt.mbtechnique FROM study_mbtechniques smb, cannabis_studies s, mbtechniques mbt 
where smb.mbtechnique_id = mbt.id 
and s.id = smb.study_id and s.id = ' . $s->id);

  $mbra = array();
   foreach ($mbtechnique_result as $mbr) {
   $mbra[] = $mbr->mbtechnique;
   }
   $s->mbtechnique = implode(', ', $mbra);
  
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
    <ul class="studyId" style="margin-top: 50px; list-style-type: none; font-weight: 700;">
      <li><?php echo "ID: $print->id"; ?></li>
      <li><?php echo "Title: $print->study_title"; ?></li>
      <li><?php echo "Type of Study: $print->type_of_study"; ?></li>
      <li><?php echo "Condition: $print->condition"; ?></li>
      <li><?php echo "Chi Rating: $print->chi_rating"; ?></li>
      <li><?php echo "Key Findings: $print->key_findings"; ?></li>
      <li><?php echo "MBI Rating: $print->mbi_rating"; ?></li>
      <li><?php echo "MB Technique: $print->mbtechnique"; ?></li>
      <li><?php echo "MBI Notes: $print->mbi_notes"; ?></li>
      <li><?php echo "Cannabinoids: $print->cannabinoid"; ?></li>
      <li><?php echo "Terpenes: $print->terpene"; ?></li>
      <li><?php echo "Receptors: $print->receptor"; ?></li>
      <li><?php echo "Neurotransmitters: $print->neurotransmitter"; ?></li>
      <li><?php echo "Chemotype: $print->chemotype"; ?></li>
      <li><?php echo "Sub-Ratio: $print->sub_ratios"; ?></li>
      <li><?php echo "Form of Administration: $print->form_admin"; ?></li>
      <li><?php echo "Dosage: $print->dosage"; ?></li>
      <li><?php echo "Link to Study: $print->link_to_study"; ?></li>
      <li><?php echo "DOI: $print->doi"; ?></li>
      <li><?php echo "Year of Publication: $print->year_of_pub"; ?></li>

    </ul>
    <?php } ?>
</tbody>
</table>
</div>
<?php
}
get_footer();








