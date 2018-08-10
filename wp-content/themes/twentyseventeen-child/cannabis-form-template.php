<?php

/**
* Template Name: cannabis-form-template
*/



get_header(); ?>


<div class="container" style="width:60%; margin-left: 2em; margin-top: -75px; margin-bottom: -75px;">
  <form method="post">

    <div class="form-group">
      <label for="doi">DOI#, PMID# or PMCID#:</label>
      <input type="text" class="form-control" name="doi" placeholder="<?php echo $_POST['testdoi'] ?>" value="<?php echo $_POST['testdoi'] ?>">
    </div>

    <div class="form-group">
      <label for="study_title">Study Title:</label>
      <input type="text" class="form-control" name="study_title">
    </div>

    <?php
      global $wpdb;
      $countries_result = $wpdb->get_results('SELECT * FROM `countries` ORDER BY `countries`.`sort_order` DESC');
    ?>

    <div class="form-group">
      <label for="country_id">Country of Origin:</label>
        <div class="selection-grid">

          <?php
            foreach($countries_result as $k) {
              echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"country_id[]\" value=\"$k->id\"/> $k->country </label>\n";
            }
          ?>
        </div>
    </div>

    <?php
      $conditions_result = $wpdb->get_results('SELECT `conditions` .`id`, `condition` FROM `conditions` ORDER BY `conditions`.`condition` ASC');
    ?>

    <div class="form-group">
      <label for="condition_id">Condition/Symptoms:</label>
        <div class="selection-grid">
          <?php
            foreach($conditions_result as $k) {
              echo " <label class=\"my-form inform\"><input type=\"checkbox\" class=\"form-control\" name=\"condition_id[]\" value=\"$k->id\"/><span class=\"inform\"> $k->condition </span></label>\n";
            }
          ?>
        </div>
    </div>

    <div class="form-group">
      <label for="type_of_study">Type of Study:</label>
        <input type="radio" class="form-control" name="type_of_study" value="Laboratory Study" /> Laboratory
        <input type="radio" class="form-control" name="type_of_study" value="Animal Study" /> Animal study
        <input type="radio" class="form-control" name="type_of_study" value="Meta Case Study" /> Meta-analysis/Case studies <br />
        <input type="radio" class="form-control" name="type_of_study" value="Human Trial" /> Human Trial
        <input type="radio" class="form-control" name="type_of_study" value="Double blind Human Trial" /> Double blind placebo-controlled human trial
    </div>

    <div class="form-group">
      <label for="key_findings">Key Findings:</label>
        <textarea class="form-control" name="key_findings" rows="4"></textarea>
    </div>

    <div class="form-group">
      <label for="chi_rating">CHI Rating:</label>
        <input type="radio" class="form-control" name="chi_rating" value="-1" />-1
        <input type="radio" class="form-control" name="chi_rating" value="-2" />-2     
        <input type="radio" class="form-control" name="chi_rating" value="-3" />-3 
        <input type="radio" class="form-control" name="chi_rating" value="-4" />-4 
        <input type="radio" class="form-control" name="chi_rating" value="-5" />-5 <br/> 
        <input type="radio" class="form-control" name="chi_rating" value="0" />0 <br/>
        <input type="radio" class="form-control" name="chi_rating" value="1" />+1 
        <input type="radio" class="form-control" name="chi_rating" value="2" />+2 
        <input type="radio" class="form-control" name="chi_rating" value="3" />+3 
        <input type="radio" class="form-control" name="chi_rating" value="4" />+4 
        <input type="radio" class="form-control" name="chi_rating" value="5" />+5<br/> 
      <label class="nonapp">If no CHI rating is applicable:</label>
        <input type="radio" class="form-control" name="chi_rating" value="Not applicable" />N/A 
    </div>


    <div class="form-group mbi">
      <label for="mbi_rating">MBI Rating:</label>
        <input type="radio" class="form-control" name="mbi_rating" value="-1" />-1
        <input type="radio" class="form-control" name="mbi_rating" value="-2" />-2     
        <input type="radio" class="form-control" name="mbi_rating" value="-3" />-3 
        <input type="radio" class="form-control" name="mbi_rating" value="-4" />-4 
        <input type="radio" class="form-control" name="mbi_rating" value="-5" />-5 <br/> 
        <input type="radio" class="form-control" name="mbi_rating" value="0" />0 <br/>
        <input type="radio" class="form-control" name="mbi_rating" value="1" />+1 
        <input type="radio" class="form-control" name="mbi_rating" value="2" />+2 
        <input type="radio" class="form-control" name="mbi_rating" value="3" />+3 
        <input type="radio" class="form-control" name="mbi_rating" value="4" />+4 
        <input type="radio" class="form-control" name="mbi_rating" value="5" />+5<br/>
      <label class="nonapp">If no MBI rating is applicable:</label>
        <input type="radio" class="form-control" name="mbi_rating" value="Not applicable" />N/A 
    </div>

    <div class="form-group mbi">
      <label for="mbi_notes">MBI Comments:</label>
        <textarea class="form-control" name="mbi_notes" rows="4"></textarea>
    </div>

    <?php
      $cannabinoids_result = $wpdb->get_results('SELECT * FROM `cannabinoids` ORDER BY `cannabinoids`.`sort_order` DESC');
    ?>

    <div class="form-group">
      <label for="cannabinoid_id">Cannabinoids:</label>
        <div class="selection-grid">
        <?php
          foreach($cannabinoids_result as $k) {
            if($k->sub_cat == 'canna'){
              echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"cannabinoid_id[]\" value=\"$k->id\"/> $k->cannabinoid </label>\n";
            }
          }
        ?>  
        </div> 
      <label class="sublabl">Synthetic Cannabinoids:</label>
        <div class="selection-grid">
          <?php
            foreach($cannabinoids_result as $k) {
              if($k->sub_cat == 'synthetic'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"cannabinoid_id[]\" value=\"$k->id\"/> $k->cannabinoid </label>\n";
              }
            }
          ?>
        </div>
      <label class="sublabl">Pharmaceutical Cannabinoids:</label>
        <div class="selection-grid">
          <?php
            foreach($cannabinoids_result as $k) {
              if($k->sub_cat == 'pharmaceutical'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"cannabinoid_id[]\" value=\"$k->id\"/> $k->cannabinoid </label>\n";
              }
            }
          ?>
        </div>
      <label class="sublabl">Endocannabinoids:</label>
        <div class="selection-grid">
          <?php
            foreach($cannabinoids_result as $k) {
              if($k->sub_cat == 'endo'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"cannabinoid_id[]\" value=\"$k->id\"/> $k->cannabinoid </label>\n";
              }
            }
          ?>
        </div>
      <label class="sublabl">Compounds that bind with ECS:</label>
        <div class="selection-grid">
          <?php
            foreach($cannabinoids_result as $k) {
              if($k->sub_cat == 'compounds'){
              echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"cannabinoid_id[]\" value=\"$k->id\"/> $k->cannabinoid </label>\n";
              }
            }
          ?>
        </div>
      <label class="nonapp">If no type of cannabinoids are applicable:</label>
        <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="99"/> N/A
    </div>

      <?php
        $terpenes_result = $wpdb->get_results('SELECT `terpenes` .`id`, `terpene` FROM `terpenes`');
      ?>

    <div class="form-group">
      <label for="terpene_id">Terpenes:</label>
        <div class="selection-grid">
          <?php
            foreach($terpenes_result as $k) {
              if( $k->id !== '99'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"terpene_id[]\" value=\"$k->id\"/> $k->terpene </label> \n";
              }
            }
          ?>
        </div>
      <label class="nonapp">If no type of terpenes are applicable:</label>
        <input type="checkbox" class="form-control" name="terpene_id[]" value="99"/> N/A    
    </div>

    <?php
      $receptors_result = $wpdb->get_results('SELECT * FROM `receptors` ORDER BY `receptors`.`sort_order` DESC');
    ?>
    <div class="form-group">
      <label for="receptor_id">Receptors:</label>
      <label class="sublabl">G-protein coupled receptors - GPCR:</label>
        <div class="selection-grid">
          <?php
            foreach($receptors_result as $k) {
              if($k->sub_cat == 'gp'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"receptor_id[]\" value=\"$k->id\"/> $k->receptor </label>\n";
              }
            }
          ?>
        </div>

      <label class="sublabl">Ionotropic cannabinoid receptors - TRPs:</label>
        <div class="selection-grid">
          <?php
            foreach($receptors_result as $k) {
              if($k->sub_cat == 'tr'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"receptor_id[]\" value=\"$k->id\"/> $k->receptor </label>\n";
              }
            }
          ?>
        </div>
      <label class="sublabl">Peroxisom proliferator-activated receptors - PPARs:</label>
        <div class="selection-grid">
          <?php
            foreach($receptors_result as $k) {
              if($k->sub_cat == 'pp'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"receptor_id[]\" value=\"$k->id\"/> $k->receptor </label>\n";
              }
            }
          ?>
        </div>
      <label class="nonapp">If no type of receptors are applicable:</label>
        <input type="checkbox" class="form-control" name="receptor_id[]" value="99"/> N/A
    </div>

    <?php
      $neurotransmitters_result = $wpdb->get_results('SELECT `neurotransmitters` .`id`, `neurotransmitter` FROM `neurotransmitters`');
    ?>

    <div class="form-group">
      <label for="neurotransmitter_id">Neurotransmitters:</label>
        <div class="selection-grid">
          <?php
            foreach($neurotransmitters_result as $k) {
              if( $k->id !== '99'){
                echo " <label class=\"my-form\"><input type=\"checkbox\" class=\"form-control\" name=\"neurotransmitter_id[]\" value=\"$k->id\"/> $k->neurotransmitter </label> \n";
              }
            }
          ?>
        </div>
      <label class="nonapp">If no type of neurotransmitters are applicable:</label>
        <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="99"/> N/A
    </div>

    <div class="form-group">
      <label for="chemotype_id">Chemotype:</label>
        <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="1" />Chemotype I<br />
        <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="2" />Chemotype II<br />
        <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="3" />Chemotype III<br />
      <label class="nonapp">If no chemotypes are applicable:</label>
        <input type="checkbox" class="form-control get_value" name="chemotype_id[]" value="4" />N/A<br />
    </div>

    <div class="form-group">
      <label for="sub_ratios">Sub-Ratios:</label>
        <textarea class="form-control" name="sub_ratios" rows="4"></textarea>
    </div>


    <div class="form-group">
      <label for="form_admin_id">Forms of Administration:</label>
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="1" />Inhalation
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="2" />Ingestion
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="3" />Sublingual<br />
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="4" />Nasal
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="5" />Conjunctival
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="6" />Topical<br />
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="7" />Injection
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="8" />Vaginal
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="9" />Rectal<br />
      <label class="nonapp">If no forms are applicable:</label>
        <input type="checkbox" class="form-control get_value" name="form_admin_id[]" value="10" />N/A<br />
    </div>

    <div class="form-group">
      <label for="dosage">Dosage:</label>
        <textarea class="form-control" name="dosage" rows="4"></textarea>
    </div>

    <div class="form-group">
      <label for="year_of_pub">Year of Publication:</label>
        <input type="number" class="form-control" name="year_of_pub" value="2018">
    </div>

    <div class="form-group">
      <label for="link_to_study">Link to Study:</label>
        <input type="url" class="form-control" name="link_to_study">
    </div>

    <div class="form-group">
      <label for="log_entry">Date of Entry:</label>
        <input type="date" class="form-control" name="log_entry">
    </div>

    <button type="submit" id="submit" name="BtnSubmit" class="btn btn-default">Submit</button>

  </div>

<?php get_footer();
