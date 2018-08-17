<?php
class DatabaseException extends Exception {
  protected $message;
  public function __construct($mess) {
      $this->message = $mess;
  }
}
?>