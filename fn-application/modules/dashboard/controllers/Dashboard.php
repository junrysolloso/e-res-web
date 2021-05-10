<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index for the dashboard page
	 */
  public function index() {
    $config['view'] = 'view_dashboard';
    $config['title'] = 'Dashboard';
    $config['studies_count'] = $this->dbdelta->get_count( 'tbl_studies', 'study_id' );
    $config['advisers_count'] = $this->dbdelta->get_count( 'tbl_advisers', 'adviser_id' );
    $config['categories_count'] = $this->dbdelta->get_count( 'tbl_categories', 'category_id' );
    $this->content->view( $config );    
  }

}
