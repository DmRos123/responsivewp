<?php

/**
* Template Name: primary-condition-template
*/
get_header();

?>
  <div class="container" style="margin: 0 1em;">
<?php

function showPrimaryConditionsList() {

      global $wpdb;
      $conditions_result = $wpdb->get_results('SELECT * FROM `conditions` ORDER BY `conditions`.`condition` ASC');
    ?>
  <form method="post">
   <p>Please select condition or symptom of interest.</p>
  <div class="form-group condition-form">
    <label for="myprimarycondition">Condition/Symptoms:</label>
    <select class="form-control" name="myprimarycondition">
      <?php 
      foreach($conditions_result as $k) {
        echo " <option value=\"$k->id\">$k->condition</option>";
      }
      ?>
    </select>
    <button type="submit" id="submit" name="PCSubmit" class="btn btn-default">Submit</button>
  </div>


  </form>



<?php
return;
}


   if(empty($_POST['myprimarycondition'])) {
    showPrimaryConditionsList();
    return;
   } else {

   $myprimarycond = $_POST['myprimarycondition']; 
 
 
  global $wpdb;
  $results = $wpdb->get_results("SELECT `study_conditions`.`condition_id`,`study_conditions`.`study_id`, `cannabis_studies`.`year_of_pub` FROM `study_conditions` JOIN `cannabis_studies` ON `study_conditions`.`study_id`=`cannabis_studies`.`id` WHERE `study_conditions`.`condition_id` = '$myprimarycond' ORDER BY `cannabis_studies`.`year_of_pub` DESC " );


 $cond_row = $wpdb->get_row("SELECT `condition` FROM `conditions` WHERE `id` = '$myprimarycond' ");
  $cond_name = $cond_row->condition;
  $cond_name_uc = strtoupper($cond_name);
   echo "<h2><strong>$cond_name_uc</strong></h2>";
  ?>
  <form method="post">
    <div class="primaryStudy">
    <?php
foreach ($results as $current) {
    $cond_studies = $wpdb->get_results("SELECT `id`, `study_title`, `key_findings`, `year_of_pub`,`link_to_study` FROM `cannabis_studies` WHERE `id` = '$current->study_id' ");
  
 foreach ( $cond_studies as $cur ) { ?>
    <ul class="studyId primaryStudy" style="margin-top: 50px; list-style-type: none; font-weight: 700;">
      <li><?php echo '<h2>'. stripslashes($cur->study_title) .'</h2>' ?></li>
      <br>
      <li><?php echo stripslashes($cur->key_findings); ?></li>
      <br>
       <li><?php echo 'Study ID: '. stripslashes($cur->id); ?></li>
       <li><?php echo '<a href="' . $cur->link_to_study . '"'.'>';
      echo'<br >  Link to study';
      echo '</a >';?></li>
      <br>
      <div class="form-group-pc">
          <input type="checkbox" class="form-control get_value" name="primary_study_id[]" value="<?php echo $cur->id; ?>" /> &nbsp Primary Relevance
      </div>
    </ul>
    <?php
}
}?>
    <div>
        <input type="hidden" name="condition_id" value="<?php echo $myprimarycond; ?>">
    </div>
 <button type="submit" id="submit" name="PSSubmit" class="btn btn-default">Submit</button>
</form>
</div>
<?php

}

get_footer();
