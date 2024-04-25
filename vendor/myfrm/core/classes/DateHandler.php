<?php

namespace myfrm;
use DateTime;
use DateTimeZone;

  class DateHandler {
  protected string $tz; //= $_COOKIE['timezone'];
  protected $current_date; // = new DateTime('now', new DateTimeZone($tz));
  protected $localTimeFormatted; // = $current_date->format('Y-m-d H:i:s');
  protected $localTimeUnix; // = $current_date->format('U');
  
  public function __construct()
  {
    $this->tz = $_COOKIE['timezone'] ?? 'Europe/Moscow';
    $this->current_date = new DateTime('now', new DateTimeZone($this->tz));
    $this->current_date->setTimezone(new DateTimeZone(($this->tz)));
    $this->localTimeFormatted = $this->current_date->format('Y-m-d H:i:s');
    $this->localTimeUnix = $this->current_date->format('U');
  }

  public function toUnix($formattedDate) {
    return strtotime($formattedDate);
  }

  public function toFormattedDate($unixTime) {
    return date("Y-m-d H:i:s", $unixTime);
  }
  
  public function getLocalTimeFormatted() {
    return $this->localTimeFormatted;
  }

  public function getRemainingTime($int, $created_atUnix) {
    if($int === 3) {
      return $this->toFormattedDate(strtotime('+3 months', $created_atUnix));
    } elseif ($int === 6) {
      return $this->toFormattedDate(strtotime('+6 months', $created_atUnix));
    }
  }

  public function checkifDate($int, $created_atUnix, $localTimeUnix = null) { //check if date expired
    if($localTimeUnix == null) {
      $localTimeUnix = $this->localTimeUnix;
    }

    if($int === 3 && strtotime('+3 months', $created_atUnix) < $localTimeUnix) {
      return false;
    } elseif($int === 6 && strtotime('+6 months', $created_atUnix) < $localTimeUnix) {
      return false;
    } else {
      return true;
    }
  }
}