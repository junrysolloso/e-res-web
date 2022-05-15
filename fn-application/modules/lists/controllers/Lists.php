<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends MY_Controller
{
  
  var $js;
  var $css;

  function __construct() {
    parent:: __construct(); 

    $this->js = [ 
      'fn-assets/vendors/jquery-tags-input/jquery.tagsinput.min.js',
      'fn-assets/vendors/summernote/dist/summernote-bs4.min.js',
    ];
    $this->css = [ 
      'fn-assets/vendors/jquery-tags-input/jquery.tagsinput.min.css',
      'fn-assets/vendors/summernote/dist/summernote-bs4.css',
    ];
  }

	/**
	 * Index page
	 */
  public function index() {
    $filter = [];

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

      $data = [
        'from'     => $this->input->get( 'from' ),
        'to'       => $this->input->get( 'to' ),
        'adviser'  => $this->input->get( 'adviser' ),
        'category' => $this->input->get( 'category' )
      ];

      $data = clean_array( $data );
      if ( key_exists( 'from', $data ) ) {
        $from = $data['from'];
      } else {
        $from = 2001;
      }

      if ( key_exists( 'to', $data ) ) {
        $to = $data['to'];
      } else {
        $to = date('Y');
      }

      if ( key_exists( 'category', $data ) )  {
        $category = $data['category'];
        $category = " `tbl_studies.category_id`='$category' AND ";
      } else {
        $category = null;
      }

      if ( key_exists( 'adviser', $data ) )  {
        $adviser = $data['adviser'];
        $adviser = " `tbl_studies.adviser_id`='$adviser' AND ";
      } else {
        $adviser = null;
      }

      if ( @$this->input->get('search-field') ) {
        $s = strtolower( trim( $this->input->get('search-field') ) );
        $string = "`study_title` LIKE '%{$s}%'";

        if ( ! $this->dbdelta->check( 'tbl_keywords_list', [ 'key_value' => $s ] ) ) {
          $this->dbdelta->insert( 'tbl_keywords_list', ['key_value' => $s] );
        }
      } else {
        $string = "{$adviser} {$category} `study_year` BETWEEN '$from' AND '$to'";
      }
      $filter["$string"] = NULL;
    }

    $config['js']    = $this->js;
    $config['css']   = $this->css;
    $config['view']  = 'view_studies';
    $config['title'] = 'Studies';

    $fields = '`study_id`, `study_title`, `study_year`, `study_proponents`, `study_link`, `adviser_name`, `category_name`';
    $joins = [
      'tbl_advisers' => '`tbl_advisers`.`adviser_id`=`tbl_studies`.`adviser_id`',
      'tbl_categories' => '`tbl_categories`.`category_id`=`tbl_studies`.`category_id`'
    ];

    $config['studies'] = $this->dbdelta->get_all( 'tbl_studies', [ 'study_year' => 'DESC' ], 0, $joins, $filter, 0, $fields );
    $config['advisers'] = $this->dbdelta->get_all( 'tbl_advisers' );
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );
    $this->content->view( $config, false, false );
  }

  /**
   * View abstract
   */
  public function abstract() {

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $id = intval( $this->input->get( 'id' ) );
        $fields = '`study_id`, `study_title`, `study_year`, `study_proponents`, `study_abstract`, `study_link`, `adviser_name`, `category_name`';
        $joins = [
          'tbl_advisers' => '`tbl_advisers`.`adviser_id`=`tbl_studies`.`adviser_id`',
          'tbl_categories' => '`tbl_categories`.`category_id`=`tbl_studies`.`category_id`'
        ];
    
        $config['study'] = $this->dbdelta->get_by_id( 'tbl_studies', [ 'study_id' => $id ], $joins, [], $fields );
      }
    }

    $config['view'] = 'view_study';
    $config['title'] = 'Studies';
    $this->content->view( $config, false, false );
  }

}
