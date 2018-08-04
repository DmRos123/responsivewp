<?php

/**
* Template Name: DOI-cannabis-form-template
*/



get_header();

function showSearchForm() {
?>
<div class="container" style="width:60%; margin-left: 2em; margin-top: -75px; margin-bottom: -75px;">
  
  <form method="post">

  <div class="form-group dupTest">
    <label for="testdoi">DOI#, PMID# or PMCID#:</label>
    <input type="text" class="form-control" name="testdoi">
    <button type="submit" id="submit" name="DOISubmit" class="btn btn-default">Submit</button>
  </div>


  </form>

</div>

<?php
return;
}

if (isset($_POST['DOISubmit'])) {
      if(empty($_POST['testdoi'])) { 
    echo 'Enter a new DOI, PMID or PMCID.';
    showSearchForm();
    return;
  }


  if( testForDoiDup()) {
    
      global $post;
      include('cannabis-form-template.php');
  } else {
      echo 'You have already entered this study...';
      showSearchForm();
  }
} else {
      showSearchForm();
}

function testForDoiDup() {
  global $wpdb;

  $new_doiID;
  if(!empty($_POST['testdoi'])) {
    $new_doiID = sanitize_text_field($_POST['testdoi']);
  }

  $testDup = $wpdb->get_var("SELECT `cannabis_studies` . `doi` FROM `cannabis_studies` WHERE `doi` = '$new_doiID' ");

  if($testDup == null) {
      return true;
    } 
  
}


get_footer();


