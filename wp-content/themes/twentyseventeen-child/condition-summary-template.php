<?php

/**
* Template Name: condition-summary-template
*/
get_header();

function showConditionList() {
?>
<div class="container" style="margin: 0 1em;">
  <?php
      global $wpdb;
      $conditions_result = $wpdb->get_results('SELECT * FROM `conditions` ORDER BY `conditions`.`condition` ASC');
    ?>
  <form method="get">
   <p>Please select condition or symptom of interest.</p>
  <div class="form-group condition-form">
    <label for="mycondition">Condition/Symptoms:</label>
    <select class="form-control" name="mycondition">
      <?php 
      foreach($conditions_result as $k) {
        echo " <option value=\"$k->id\">$k->condition</option>";
      }
      ?>
    </select>
    <button type="submit" id="submit" name="CSSubmit" class="btn btn-default">Submit</button>
  </div>


  </form>

<ul>
<?php
/*
  $siteurl = get_bloginfo('url');
     foreach($conditions_result as $k) {
        echo " <li><a href='$siteurl/condition-summary/?mycondition={$k->id}'>{$k->condition}</a></li>";
      }
 */
?>
</ul>
</div>
<?php
return;
}


   if(empty($_REQUEST['mycondition'])) {
    showConditionList();
    return;
   } else {

   $myconditionsum = $_REQUEST['mycondition']; 

   global $post;
   include('condition-display-template.php');


}
get_footer();
