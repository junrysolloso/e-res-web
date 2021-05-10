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
          if ( $this->dbdelta->insert( 'tbl_advisers', $data ) ) {
            if ( $this->model_log->add( task( 'adviser' )['add'] ) ) {
              response( [ 'msg' => 'success', 'data' => 'added.' ] );
            }
          }
        } else {
          response( [ 'msg' => 'exist', 'data' => 'Category' ] );
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
