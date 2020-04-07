<?php

namespace myapp;

class Classroom {
  function __construct() {
  }

  function getName() {
    $student = new Student();
    return $student->getStudentName();
  }
}