<?php

namespace Jsanahuja\Redmine\Api;

abstract class ApiLayer{
    protected $mysqli;

    // public static $NO_LIMIT = 999999999;
    public static $NO_LIMIT = 2147483647;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    protected function _filter($filters){
        $sql = "";
        foreach($filters as $filter){
            if(gettype($filter) == "array" && sizeof($filter) == 3){
                if(gettype($filter[2]) == "array"){
                    $filter[2] = "(". implode(",", $filter[2]) .")";
                }else if(gettype($filter[2]) == "boolean"){
                    $filter[2] = $filter[2] ? "b'1'" : "b'0'";
                }else{
                    $filter[2] = "'". $filter[2] ."'";
                }
                $sql .= "AND `". $filter[0] ."` ". $filter[1] ." ". $filter[2];
            }
        }
        if($sql != "")
            return " WHERE ". substr($sql, 4);
    }

    private function _query($query){
        if(!$query || $this->mysqli->errno != 0){
            throw new \Exception("Jsanahuja:Redmine:Api:All Mysqli error". $this->mysqli->error);
        }
    }

    protected function _all($query){
        $this->_query($query);
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    protected function _get($query){
        $this->_query($query);
        return $query->fetch_array(MYSQLI_ASSOC);
    }

    abstract public function all(array $filter = array(), $offset = null, $limit = null);
    abstract public function get($id);
    abstract public function post($obj);
    abstract public function put($id, $obj);
    abstract public function delete($id);
}