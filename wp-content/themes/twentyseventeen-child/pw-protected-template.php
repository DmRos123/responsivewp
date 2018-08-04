<?php

/**
* Template Name: pw-protected-template
*/

global $post;
get_header();

if ( ! post_password_required( $post ) ) {
  include('DOI-cannabis-form-template.php');
}else{
  echo get_the_password_form( );
}

get_footer( );