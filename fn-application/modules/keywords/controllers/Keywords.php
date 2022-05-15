<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keywords extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
  }

 /**
   * Add
   */
  public function add() {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if ( $this->input->post( 'word' ) ) {
       
        $data = [
          'key_value' => strtolower( $this->input->post( 'word' ) )
        ];

				$id = $this->dbdelta->get_data_id( 'tbl_keywords_list', 'key_id', ['key_value' =>  $data['key_value']] );
				$hits = $this->dbdelta->get_by_id( 'tbl_keywords_list', ['key_id' => $id], [], [], '`key_hits`' );
				
				$count = intval( $hits[0]->key_hits );

				if ( $count >= 0 ) {
					if ( $this->dbdelta->update( 'tbl_keywords_list', ['key_hits' => ($count + 1)], ['key_id' => $id] ) ) {
						response( [ 'msg' => 'success', 'data' => 'hit.' ] );
					}
				}
      }
    }
  }

	/**
	 * Get keyword
	 */
	public function value() {
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
      $string = "`key_value` LIKE '%{$s}%'";
      $filter["$string"] = NULL;
    }

		$out = '<ul style="padding-left: 0px; margin-top: 1rem;">';
    $keywords = $this->dbdelta->get_all( 'tbl_keywords_list', [ 'key_hits' => 'DESC' ], 0, [], $filter, 0, '`key_value`', '', '`key_value`' );
    foreach ( $keywords as $keyword ) {
      $out .= '<li>';
			$out .= '<p class="search___value">'. ucfirst( $keyword->key_value ) .'</p>';
      $out .= '</li>';
    }

    $out .='</ul>';
    if ( count( $keywords ) > 0 ) {
      response( [ 'status' => '200', 'content' => $out ] );
    }
	}

}
