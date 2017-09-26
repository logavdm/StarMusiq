<?php
/*
Title: Music Fields
Description: this is the description
Post Type: download
Order: 1
Collapse: false
*/
  
  piklist('field', array(
    'type' => 'select'
    ,'field' => 'music_type'
    ,'label' => esc_html__('Type','musik')
    ,'description' => esc_html__('Default is single, select bundle when this is a bundle product.','musik')
    ,'choices' => array(
      'single' => 'Single'
      ,'bundle' => 'Bundle'
    )
    ,'value' => 'single'
    ,'on_post_status' => array(
        'value' => 'lock'
      )
  ));

  piklist('field', array(
    'type' => 'select'
    ,'field' => 'preview_type'
    ,'label' => esc_html__('Privew','musik')
    ,'choices' => array(
      'local' => 'Local'
      ,'remote' => 'Remote'
    )
    ,'conditions' => array(
      array(
        'field' => 'music_type'
        ,'value' => 'single'
      )
    )
    ,'on_post_status' => array(
        'value' => 'lock'
      )
  ));

  piklist('field', array(
    'type' => 'file'
    ,'field' => 'preview'
    ,'scope' => 'post_meta'
    ,'label' => esc_html__('Privew file','musik')
    ,'description' => esc_html__('Preview audio file, you can add mp3, ogg, mp4 file(s).','musik')
    ,'conditions' => array(
      array(
        'field' => 'preview_type'
        ,'value' => 'local'
      ),
      array(
        'field' => 'music_type'
        ,'value' => 'single'
      )
    )
    ,'on_post_status' => array(
        'value' => 'lock'
      )
  ));

  piklist('field', array(
    'type' => 'group'
    ,'field' => 'preview_url'
    ,'label' => esc_html__('Privew file','musik')
    ,'add_more' => true
    ,'fields' => array(
      array(
        'type' => 'select'
        ,'field' => 'preview_media_type'
        ,'label' => esc_html__('Format','musik')
        ,'columns' => 2
        ,'choices' => array(
          'mp3' => 'mp3'
          ,'m4a' => 'mp4'
          ,'oga' => 'ogg'
          ,'webma' => 'webm'
        )
      )
      ,array(
        'type' => 'text'
        ,'field' => 'preview_media_url'
        ,'label' =>  esc_html__('URL','musik')
        ,'columns' => 10
      )
    )
    ,'conditions' => array(
      array(
        'field' => 'preview_type'
        ,'value' => 'remote'
      ),
      array(
        'field' => 'music_type'
        ,'value' => 'single'
      )
    )
    ,'on_post_status' => array(
      'value' => 'lock'
    )
  ));

  piklist('field', array(
    'type' => 'text'
    ,'field' => 'year'
    ,'label' => esc_html__('Publish year','musik')
    ,'attributes' => array(
      'class' => 'regular-text'
      ,'placeholder' => '2015'
    )
  ));
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'time'
    ,'label' => esc_html__('Duration','musik')
    ,'attributes' => array(
      'class' => 'regular-text'
      ,'placeholder' => '00:00'
    )
  ));
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'itunes'
    ,'label' => esc_html__('iTunes','musik')
    ,'attributes' => array(
      'class' => 'regular-text'
      ,'placeholder' => 'http://'
    )
  ));
  piklist('field', array(
    'type' => 'text'
    ,'field' => 'googleplay'
    ,'label' => esc_html__('Google Play','musik')
    ,'attributes' => array(
      'class' => 'regular-text'
      ,'placeholder' => 'http://'
    )
  ));


  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Meta Box'
  ));
  
?>
