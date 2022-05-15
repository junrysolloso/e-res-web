<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists( 'task' ) ) {
  /**
   * Log messages
   * @param string $activity
   * @return array
   */
  function task( $activity ) {
    $task = [
      'study' => [
        'delete'  => 'Deleted study',
        'update'  => 'Updated study',
        'add'     => 'Added study',
        'view'    => 'Viewed study',
      ],
      'adviser' => [
        'delete'  => 'Deleted adviser',
        'update'  => 'Updated adviser',
        'add'     => 'Added adviser',
        'view'    => 'Viewed adviser',
      ],
      'user' => [
        'delete'  => 'Deleted user',
        'update'  => 'Updated user',
        'add'     => 'Added user',
        'view'    => 'Viewed user',
      ],
      'category' => [
        'delete'  => 'Deleted department',
        'update'  => 'Updated department',
        'add'     => 'Added department',
        'view'    => 'Viewed department',
      ],
      'login' => [
        'in'      => 'Log in',
        'out'     => 'Log out',
      ],
      'backup' => [
        'add'     => 'Backup database',
      ],
      'default'   => 'Cannot track task',
    ];

    switch ( $activity ) {
      case 'study':
        return $task['study'];
        break;
      case 'adviser':
        return $task['adviser'];
        break;
      case 'user':
        return $task['user'];
        break;
      case 'category':
        return $task['category'];
        break;
      case 'login':
        return $task['login'];
        break;
      case 'backup':
        return $task['backup'];
        break;
      default:
        return $task['default'];
        break;
    }
  }
}
