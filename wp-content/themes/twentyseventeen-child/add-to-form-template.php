<?php

/**
* Template Name: add-to-form-template
*/



get_header(); ?>


<div class="container" style="width:50%; margin-left: 2em; margin-top: -75px; margin-bottom: -75px;">
  
  <form method="post">

  <div class="form-group">
    <label for="new_condition">Add New Condition:</label>
    <input type="text" class="form-control" name="new_condition">
  </div>




  <button type="submit" id="submit" name="CondiSubmit" class="btn btn-default">Submit</button>

</div>




<?php get_footer();
