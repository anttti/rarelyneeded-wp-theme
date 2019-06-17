<?php

/**
 * Safeguard against ACF not installed
 */
if ( !function_exists('get_field') ) {
  function get_field() {
    return '';
  }
}
if ( !function_exists('the_field') ) {
  function the_field() {
    echo '';
  }
}

/**
 * Register external URL field
 */
if ( function_exists('acf_add_local_field_group') ):
  acf_add_local_field_group(array(
    'key' => 'group_external_link',
    'title' => 'External link',
    'fields' => array(
      array(
        'key' => 'field_external_url',
        'label' => 'External URL',
        'name' => 'external_url',
        'type' => 'url',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));
endif;