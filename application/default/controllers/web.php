<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class web extends App_Base_Controller {

    var $avenue = 'Avenue';

    function _check_access() {
      return TRUE;
    }

    function set_lang($lang) {
      $this->lang->set_language($lang);
      redirect($_SERVER['HTTP_REFERER']);
      exit;
    }

   function __construct() {
     parent::__construct();
     $this->_data['page_class'] = "info";
   }

    function index() {

      $this->load->helper('format');
      // $this->load->helper('app');

    //   $this->_data['concept2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 1',array($this->avenue))->row_array();
    //   $this->_data['location2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 2',array($this->avenue))->row_array();
    //   $this->_data['public2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 3',array($this->avenue))->row_array();
    //   $this->_data['dining2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 4',array($this->avenue))->row_array();
    //   $this->_data['retail2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 5',array($this->avenue))->row_array();
    //   $this->_data['apartement2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 6',array($this->avenue))->row_array();
    //   $this->_data['interior2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 7',array($this->avenue))->row_array();
    //   $this->_data['diagram2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 8',array($this->avenue))->row_array();
    //   $this->_data['avenue2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 9',array($this->avenue))->row_array();
    //   $this->_data['oakwood2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 10',array($this->avenue))->row_array();
    //   $this->_data['developer2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 11',array($this->avenue))->row_array();
    //   $this->_data['siteplan2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 12',array($this->avenue))->row_array();
    //   $this->_data['contact2'] = $this->db->query('SELECT * FROM article_1 WHERE type_1 = 13',array($this->avenue))->row_array();
    //   $this->_data['gallery1'] = $this->db->query('SELECT * FROM gallery WHERE type_2 = 1',array($this->avenue))->row_array();
    //   $this->_data['floors'] = $this->db->query('SELECT * FROM floor_plans WHERE status = 1',array($this->avenue))->result_array();
    //   $this->_data['living'] = $this->db->query('SELECT * FROM gallery WHERE type_2 = 2',array($this->avenue))->row_array();

    //   $this->_data['gallery2'] = 
    //   $this->db->query('SELECT
    //                    image.*, gallery.id
    //                    FROM gallery 
    //                    JOIN image ON gallery.id = image.gallery_id
    //                    WHERE image.gallery_id = gallery.id
    //                    AND gallery.type_2 = 1',
    //                    array($this->avenue))->result_array();
    //   // xlog($this->_data['gallery2']);
    //   // exit;

    //   $this->_data['living2'] = 
    //   $this->db->query('SELECT
    //                    image.*, gallery.id
    //                    FROM gallery 
    //                    JOIN image ON gallery.id = image.gallery_id
    //                    WHERE image.gallery_id = gallery.id
    //                    AND gallery.type_2 = 2',
    //                    array($this->avenue))->result_array();
    //   // xlog($this->_data['living2']);
    //   // exit;

      
    //   $this->_data['home']       = 0;
    //   $this->_data['concept']    = 2000;
    //   $this->_data['elegant']    = 4000;
    //   $this->_data['public']     = 6000;
    //   $this->_data['dining']     = 6000;
    //   $this->_data['spaces']     = 6000;
    //   $this->_data['location']   = 8000;
    //   $this->_data['apartment']  = 10000;
    //   $this->_data['interior']   = 12000;
    //   $this->_data['diagram']    = 14000;
    //   $this->_data['floor']      = 16000;
    //   $this->_data['avenue']     = 18000;
    //   $this->_data['oakwood']    = 20000;
    //   $this->_data['project']    = 22000;
    //   $this->_data['developer']  = 24000;
    //   $this->_data['plan']       = 26000;
    //   $this->_data['gallery']    = 28000;
    //   $this->_data['contact']    = 30000;
    //   $this->config->set_item('theme', 'one-east');
    //   $this->_layout_view = 'layouts/oneeast';
    }

}
