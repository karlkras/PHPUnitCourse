<?php


namespace LLTS;


class DoctorPerson extends AbstractPerson
{

  /**
   * @return string
   */
  protected function getTitle()
  {
    return "Dr.";
  }
}