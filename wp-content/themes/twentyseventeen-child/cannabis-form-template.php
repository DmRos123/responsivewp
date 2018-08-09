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

  $conditions_result = $wpdb->get_results('SELECT `conditions` .`id`, `condition` FROM `conditions`');

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

    <div class="form-group">
    <label for="cannabinoid_id">Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="25"/> Cannabinoids (unspecified/other)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="1"/> CBC
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="2"/> CBD
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="3"/> CBG
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="4"/> THC
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="5"/> CBN <br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="6"/> CBC-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="7"/> CBD-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="8"/> CBG-Acid
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="9"/> THC-Acid<br />
    <label class="sublabl">Synthetic Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="26"/> Synthetic Cannabinoids (unspecified/other)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="29"/> AB-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="10"/> Abn-CBD
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="13"/> AM-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="11"/> CP-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="15"/> HU-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="14"/> JWH-x <br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="17"/> SR-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="18"/> WIN-x
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="12"/> 5F-x<br />
    <label class="sublabl">Pharmaceutical Cannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="30"/> Nabilone (Cesamet)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="31"/> Dronabinol (Marinol, Syndros)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="32"/> Nabiximols (Sativex)
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="33"/> Epidiolex (Cannabidiol)<br />
    <label class="sublabl">Endocannabinoids:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="27"/> Endocannabinoids (unspecified)<br />
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="19"/> Anandamide
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="20"/> Fatty Acid Amide Hydrolase - FAAH<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="21"/> 2-arachidonoyl glycerol - 2-AG
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="22"/> Monoacylglycerol Lipase - MAGL<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="23"/> N-Arachidonoyl Dopamine - NADA<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="24"/> Virodhamine - OAE or O-AEA<br/>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="34"/> Other Related Compounds<br />
    <label class="sublabl">Compounds that bind with ECS:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="28"/> Echinacea<br/>
    <label class="nonapp">If no type of cannabinoids are applicable:</label>
    <input type="checkbox" class="form-control" name="cannabinoid_id[]" value="99"/> N/A
  </div>

<?php

  $terpenes_result = $wpdb->get_results('SELECT `terpenes` .`id`, `terpene` FROM `terpenes`');

?>

      <div class="form-group">
    <label for="terpene_id">Terpenes:</label>

<?php
foreach($terpenes_result as $k) {
      if( $k->id !== '99'){
      echo " <input type=\"checkbox\" class=\"form-control\" name=\"terpene_id[]\" value=\"$k->id\"/> $k->terpene \n";
}
}
?>

      <label class="nonapp">If no type of terpenes are applicable:</label>
      <input type="checkbox" class="form-control" name="terpene_id[]" value="99"/> N/A
  </div>
  <div class="form-group">
    <label for="receptor_id">Receptors:</label>
    <label class="sublabl">G-protein coupled receptors - GPCR:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="20"/> GPCR (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="1"/> CB1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="2"/> CB2<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="3"/> GPCR 3
    <input type="checkbox" class="form-control" name="receptor_id[]" value="4"/> GPCR 6
    <input type="checkbox" class="form-control" name="receptor_id[]" value="5"/> GPCR 18 
    <input type="checkbox" class="form-control" name="receptor_id[]" value="6"/> GPCR 55<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="7"/> Opioid Receptor Mu
    <input type="checkbox" class="form-control" name="receptor_id[]" value="8"/> Opioid Receptor Delta
    <input type="checkbox" class="form-control" name="receptor_id[]" value="9"/> Opioid Receptor Kappa<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="10"/> Opioid Receptor Nociceptin
    <input type="checkbox" class="form-control" name="receptor_id[]" value="11"/> Opioid Receptor Zeta<br/>
    <label class="sublabl">Ionotropic cannabinoid receptors - TRPs:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="21"/> TRPs (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="12"/> TRPA1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="13"/> TRPV1
    <input type="checkbox" class="form-control" name="receptor_id[]" value="14"/> TRPV2
    <input type="checkbox" class="form-control" name="receptor_id[]" value="15"/> TRPV4
    <input type="checkbox" class="form-control" name="receptor_id[]" value="16"/> TRPM8<br/>
    <label class="sublabl">Peroxisom proliferator-activated receptors - PPARs:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="22"/> PPAR (unspecified)<br/>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="17"/> PPAR - Alpha
    <input type="checkbox" class="form-control" name="receptor_id[]" value="18"/> PPAR - Beta/Delta
    <input type="checkbox" class="form-control" name="receptor_id[]" value="19"/> PPAR - Gamma<br/>
    <label class="nonapp">If no type of receptors are applicable:</label>
    <input type="checkbox" class="form-control" name="receptor_id[]" value="99"/> N/A
  </div>

      <div class="form-group">
    <label for="neurotransmitter_id">Neurotransmitters:</label>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="1"/> Acetylcholine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="3"/> Anti-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="4"/> Cortisol<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="5"/> Dopamine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="6"/> Endogenous opioids
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="7"/> Epinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="8"/> Estrogen<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="9"/> GABA
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="10"/> Ghrelin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="11"/> Glucagon
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="12"/> Glutamate<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="13"/> Insulin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="14"/> Leptin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="15"/> Norepinephrine
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="16"/> Oxytocin
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="17"/> Serotonin<br/>
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="18"/> Testosterone
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="19"/> Pro-inflammatory cytokines
      <input type="checkbox" class="form-control" name="neurotransmitter_id[]" value="20"/> Vasopressin<br />
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
