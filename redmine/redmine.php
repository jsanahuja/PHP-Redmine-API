<?php

namespace Jsanahuja\Redmine;

class Redmine{
    private $mysqli;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;

        $this->projects         = new \Jsanahuja\Redmine\Api\Projects($this->mysqli);
        $this->contacts         = new \Jsanahuja\Redmine\Api\Contacts($this->mysqli);
        $this->issues           = new \Jsanahuja\Redmine\Api\Issues($this->mysqli);
        $this->time_entries     = new \Jsanahuja\Redmine\Api\TimeEntries($this->mysqli);
        $this->custom_fields    = new \Jsanahuja\Redmine\Api\CustomFields($this->mysqli);
        $this->custom_values    = new \Jsanahuja\Redmine\Api\CustomValues($this->mysqli);
    }
}
