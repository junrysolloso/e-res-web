<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends MY_Controller
{
  
  var $js;
  var $css;

  function __construct() {
    parent:: __construct(); 

    $this->js = [ 
      'fn-assets/vendors/jquery-tags-input/jquery.tagsinput.min.js',
      'fn-assets/vendors/summernote/dist/summernote-bs4.min.js'
    ];
    $this->css = [ 
      'fn-assets/vendors/jquery-tags-input/jquery.tagsinput.min.css',
      'fn-assets/vendors/summernote/dist/summernote-bs4.css'
    ];
  }

	/**
	 * Index page
	 */
  public function index() {
    $filter = [];

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      $data = [
        'year' => $this->input->get( 'year' ),
        'adviser' => $this->input->get( 'adviser' ),
        'category' => $this->input->get( 'category' )
      ];

      $data = clean_array( $data );
      if ( key_exists( 'year', $data ) ) {
        $filter['study_year'] = $data['year'];
      } else if ( key_exists( 'adviser', $data ) ) {
        $filter['tbl_studies.adviser_id'] = $data['adviser'];
      } else if ( key_exists( 'category', $data ) ) {
        $filter['tbl_studies.category_id'] = $data['category'];
      }
    }

    $config['view'] = 'view_studies';
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

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'study_title' ) ) {
        $study_name = $this->fileuploader->zip( 'study_file', 'studies' );
        $data = [
          'study_title'     => strtolower( $this->input->post( 'study_title' ) ),
          'category_id'     => $this->input->post( 'study_cat' ),
          'study_year'      => $this->input->post( 'study_year' ),
          'adviser_id'      => $this->input->post( 'study_adviser' ),
          'study_link'      => $study_name,
          'study_proponents'=> strtolower( $this->input->post( 'study_pro' ) ), 
          'study_abstract'  => htmlentities( $this->input->post( 'study_abs') )
        ];

        $data = clean_array( $data );
        if ( ! $this->dbdelta->check( 'tbl_studies', [ 'study_title' => trim( $data['study_title'] ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_studies', $data ) ) {
            if ( $this->model_log->add( task( 'study' )['add'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'added.' ] );
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Study' ] );
        }
      }
    }

    $config['js']         = $this->js;
    $config['css']        = $this->css;
    $config['advisers']   = $this->dbdelta->get_all( 'tbl_advisers' );
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );
    $config['view']       = 'view_add';
    $config['title']      = 'Add Study';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $id = intval( $this->input->get( 'id' ) );
        $fields = '`study_id`, `study_title`, `study_year`, `study_proponents`, `study_abstract`, `study_link`, `adviser_name`, `category_name`';
        $joins = [
          'tbl_advisers' => '`tbl_advisers`.`adviser_id`=`tbl_studies`.`adviser_id`',
          'tbl_categories' => '`tbl_categories`.`category_id`=`tbl_studies`.`category_id`'
        ];
        $data = $this->dbdelta->get_by_id( 'tbl_studies', [ 'study_id' => $id ], $joins, [], $fields );
      }
    } else {
      if ( $this->input->post( 'study_id' ) ) {
        $id = intval( $this->input->post( 'study_id' ) );
        $o_study_file = $this->input->post( 'o_study_file' );

        if ( isset( $_FILES['study_file'] ) ) {
          $study_file = $this->fileuploader->zip( 'study_file', 'studies' );
          if ( isset( $study_file ) ) {
            unlink( 'fn-uploads/studies/'. $o_study_file );
          }
        } else {
          $study_file = $o_study_file;
        }
        
        $data = [
          'study_title'     => strtolower( $this->input->post( 'study_title' ) ),
          'category_id'     => $this->input->post( 'study_cat' ),
          'study_year'      => $this->input->post( 'study_year' ),
          'adviser_id'      => $this->input->post( 'study_adviser' ),
          'study_link'      => $study_file,
          'study_proponents'=> strtolower( $this->input->post( 'study_pro' ) ), 
          'study_abstract'  => htmlentities( $this->input->post( 'study_abs') )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_studies', $data, [ 'study_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'study' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        }
      }
    }

    $config['js']         = $this->js;
    $config['css']        = $this->css;
    $config['view']       = 'view_edit';
    $config['title']      = 'Edit Study';
    $config['study']      = $data;
    $config['advisers']   = $this->dbdelta->get_all( 'tbl_advisers' );
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_studies', 'study_id', $id ) ) {
          if ( $this->model_log->add( task( 'study' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
