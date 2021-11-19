<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller
{
  public function index() {
    $filter = [];

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      $data = [
        's' => $this->input->get( 's' ),
      ];

      $data = clean_array( $data );
      if ( ! isset( $data['s'] ) ) {
        return;
      }

      $s      = $data['s'];
      $string = "`study_year` LIKE '%{$s}%' OR `study_title` LIKE '%{$s}%' OR `adviser_name` LIKE '%{$s}%'";
      $filter["$string"] = NULL;
    }

    $fields = '`study_id`, `study_title`, `study_year`, `study_proponents`, `study_abstract`';
    $joins = [
      'tbl_advisers' => '`tbl_advisers`.`adviser_id`=`tbl_studies`.`adviser_id`',
      'tbl_categories' => '`tbl_categories`.`category_id`=`tbl_studies`.`category_id`'
    ];

    $role = $this->session->userdata( 'user_role' );
    if ( $role == 'administrator' ) {
			$class = 'studies';
		} else {
      $class = 'lists';
    }

    $out     = '<ul>';
    $studies = $this->dbdelta->get_all( 'tbl_studies', [ 'study_year' => 'DESC' ], 0, $joins, $filter, 0, $fields );
    foreach ( $studies as $study ) {
      $abstract = strip_tags( html_entity_decode( $study->study_abstract ) );

      $out .= '<li>';
      $out .= '<a href="'. base_url() . $class .'/abstract?id='. $study->study_id .'">'. ucwords( $study->study_title ) .'</a>';
      $out .= '<div class="search-result-year">Published on year '. $study->study_year .' by '. ucwords( explode( ',', $study->study_proponents )[0] ) .' and others</div>';
      $out .= '<p>'. substr( $abstract, 0, 120 ) .'...</p>';
      $out .= '</li>';
    }

    $out .='</ul>';
    if ( count( $studies ) > 0 ) {
      response( [ 'status' => '200', 'content' => $out ] );
    }
  }
}
