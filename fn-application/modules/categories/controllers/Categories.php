<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller
{
  
  var $js;

  function __construct() {
    parent:: __construct(); 
    $this->sess->restricted();
  }

	/**
	 * Index page
	 */
  public function index() {
    $config['view'] = 'view_categories';
    $config['title'] = 'Categories';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );
    $this->content->view( $config );
  }

  /**
	 * List page
	 */
  public function list() {
    $config['view'] = 'view_list';
    $config['title'] = 'List of study';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );

    $filter = ["`tbl_studies.category_id`" => $this->input->get( 'id' )];
    $fields = '`study_id`, `study_title`, `study_year`, `study_proponents`, `study_link`, `adviser_name`, `category_name`';
    $joins = [
      'tbl_advisers' => '`tbl_advisers`.`adviser_id`=`tbl_studies`.`adviser_id`',
      'tbl_categories' => '`tbl_categories`.`category_id`=`tbl_studies`.`category_id`'
    ];

    $config['studies'] = $this->dbdelta->get_all( 'tbl_studies', [ 'study_year' => 'DESC' ], 0, $joins, $filter, 0, $fields );
    $this->content->view( $config );
  }

  /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'cat_name' ) ) {
        $name = strtolower( $this->input->post( 'cat_name' ) );
        $data = [
          'category_name' => $name
        ];

        $data = clean_array( $data );
        if ( ! $this->dbdelta->check( 'tbl_categories', [ 'category_name' => trim( $name ) ] ) ) {
          if ( $this->dbdelta->insert( 'tbl_categories', $data ) ) {
            if ( $this->model_log->add( task( 'category' )['add'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'added.' ] );
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Category' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Category';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_categories', [ 'category_id' => $this->input->get( 'id' ) ] );
      }
    } else {
      if ( $this->input->post( 'category_id' ) ) {
        $id = $this->input->post( 'category_id' );
        $data = [
          'category_name'  => strtolower( $this->input->post( 'cat_name' ) )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_categories', $data, [ 'category_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'category' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Category';
    $config['category'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_categories', 'category_id', $id ) ) {
          if ( $this->model_log->add( task( 'category' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
