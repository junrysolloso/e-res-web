<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_Setup extends CI_Migration 
{
	/**
	 * Upgrade database
	 */
	public function up() {

		// Attributes
		$attributes = [ 'ENGINE' => 'InnoDB', 'DEFAULT CHARSET' => 'utf8' ];

		// Tables
		$tables = [
			'categories' => [
				"`category_id` SMALLINT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
  			"`category_name` varchar(25) DEFAULT NULL",
			],

			'advisers' => [
				"`adviser_id` SMALLINT(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
  			"`adviser_name` varchar(25) DEFAULT NULL",
			],

			'studies' => [
				"`study_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`study_title` VARCHAR(255) NOT NULL",
				"`study_year` VARCHAR(32) NOT NULL",
				"`study_proponents` VARCHAR(500) NOT NULL",
				"`study_abstract` LONGTEXT NOT NULL",
				"`study_link` VARCHAR(255) NOT NULL",
				"`category_id` SMALLINT(6) NOT NULL",
			],

			'user_meta' => [
				"`user_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`user_fname` VARCHAR(60) NOT NULL",
				"`user_phone` VARCHAR(30) NOT NULL",
				"`user_email` VARCHAR(30) NOT NULL",
				"`user_address` VARCHAR(255) NOT NULL",
				"`user_photo` VARCHAR(100) NOT NULL",
				"`user_bio` TEXT NOT NULL",
				"`user_status` CHAR(15) NOT NULL",
				"`member_id` INT(11) NOT NULL",
			],
			
			'user_login' => [
				"`login_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`login_name` VARCHAR(20) NOT NULL",
				"`login_pass` CHAR(32) NOT NULL",
				"`login_level` VARCHAR(25) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			],
			
			'logs' => [
				"`log_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`log_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP",
				"`log_task` VARCHAR(60) NOT NULL",
				"`user_id` INT(11) NOT NULL",
			],

			'auth_attempts' => [
				"`auth_id` smallint(6) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`auth_attempts` tinyint(1) NOT NULL",
				"`auth_blocked` datetime NOT NULL",
				"`auth_user` char(10) DEFAULT NULL",
			],

			'keywords_list' => [
				"`key_id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
				"`key_value` VARCHAR(255) DEFAULT NULL",
			],

			'sessions' => [
				"`id` varchar(128) NOT NULL",
				"`ip_address` varchar(45) NOT NULL",
				"`timestamp` int(10) unsigned DEFAULT 0 NOT NULL",
				"`data` blob NOT NULL",
				"PRIMARY KEY (id)",
				"KEY `ci_sessions_timestamp` (`timestamp`)",
			]
		];

		// Create tables
		foreach ( $tables as $table => $fields ) {
			$this->dbforge->add_field( $fields );
			$this->dbforge->create_table( $table, TRUE, $attributes );
		}

		// Pre-insert data
		$this->db->simple_query( 'INSERT INTO `tbl_user_login` (`login_name`, `login_pass`, `login_level`, `user_id`) VALUES ("admin", "21232f297a57a5a743894a0e4a801fc3", "administrator", 1)' );
		$this->db->simple_query( 'INSERT INTO `tbl_user_meta` (`user_fname`, `user_phone`, `user_email`, `user_address`, `user_photo`, `user_bio`, `user_status`, `member_id`) VALUES ("system admin", "+639108973533", "junry.s.solloso@gmail.com", "san jose, dinagat islands", "avatar.jpg", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "active", 0)' );
	}

	/**
	 * Donwgrade database
	 */
	public function down() {
		$tables = [ 'auth_attempts', 'sessions', 'categories', 'logs', 'user_meta', 'user_login', 'advisers', 'studies' ];
		foreach ( $tables as $table ) {
			$this->dbforge->drop_table( $table );
		}
  }
  
}
