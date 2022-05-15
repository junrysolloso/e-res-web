<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisers extends MY_Controller
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
    $config['view'] = 'view_advisers';
    $config['title'] = 'Categories';
    $config['advisers'] = $this->dbdelta->get_all( 'tbl_advisers' );
    $this->content->view( $config );
  }

  /**
	 * List page
	 */
  public function list() {
    $config['view'] = 'view_list';
    $config['title'] = 'List of study';
    $config['categories'] = $this->dbdelta->get_all( 'tbl_categories' );

    $filter = ["`tbl_studies.adviser_id`" => $this->input->get( 'id' )];
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
      if ( $this->input->post( 'adviser_name' ) ) {
        $name = strtolower( $this->input->post( 'adviser_name' ) );
        $data = [
          'adviser_name' => $name
        ];

        $data = clean_array( $data );
        if ( ! $this->dbdelta->check( 'tbl_advisers', [ 'adviser_name' => trim( $name ) ] ) ) {

          $login_name = strtolower( $this->input->post( 'user_name' ) );
          if ( ! $this->dbdelta->check( 'user_login', [ 'login_name'=> trim( $login_name ) ] ) ) {
            if ( $this->dbdelta->insert( 'tbl_advisers', $data ) ) {

              $meta = [
                'user_fname'  => $name,
                'user_status' => 'active'
              ];

              if ( $this->dbdelta->insert( 'user_meta', $meta ) ) {
                $login = [
                  'login_name'  => $login_name,
                  'login_pass'  => md5( $this->input->post( 'user_pass' ) ),
                  'login_level' => 'user',
                  'user_id'     => $this->dbdelta->get_max_id( 'tbl_user_meta', 'user_id' )
                ];
  
                $login = clean_array( $login );
                if ( $this->dbdelta->insert( 'user_login', $login ) ) {
                  if ( $this->model_log->add( task( 'adviser' )['add'] ) ) {
                    response( [ 'msg' => 'success', 'data' => 'added.' ] );
                  }
                }
              }
            }
          } else {
            response( [ 'msg' => 'exist', 'data' => 'Username' ] );
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Department' ] );
        }
      }
    }

    $config['view'] = 'view_add';
    $config['title'] = 'Add Adviser';
    $this->content->view( $config );
  }

  /**
   * Edit
   */
  public function edit() {
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( $this->input->get( 'id' ) ) {
        $data = $this->dbdelta->get_by_id( 'tbl_advisers', [ 'adviser_id' => intval( $this->input->get( 'id' ) ) ] );
      }
    } else {
      if ( $this->input->post( 'adviser_id' ) ) {
        $id = intval( $this->input->post( 'adviser_id' ) );
        $data = [
          'adviser_name'  => strtolower( $this->input->post( 'adviser_name' ) )
        ];

        $data = clean_array( $data );
        if ( $this->dbdelta->update( 'tbl_advisers', $data, [ 'adviser_id' => $id ] ) ) {
          if ( $this->model_log->add( task( 'adviser' )['update'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'updated.' ] );
          }
        }
      }
    }

    $config['view'] = 'view_edit';
    $config['title'] = 'Edit Adviser';
    $config['adviser'] = $data;
    $this->content->view( $config );
  }

  /**
   * Delete
   */
  public function delete() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'id' ) ) {
        $id = $this->input->post( 'id' );

        if ( $this->dbdelta->delete( 'tbl_advisers', 'adviser_id', $id ) ) {
          if ( $this->model_log->add( task( 'adviser' )['delete'] ) ) {
            response( [ 'msg' => 'success', 'data' => 'deleted.' ] );
          }
        }
      }
    }
  }

}
