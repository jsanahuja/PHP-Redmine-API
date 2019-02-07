<?php

namespace Jsanahuja\Redmine\Api;

class Contacts extends ApiLayer{

    public function all(array $filter = array(), $offset = null, $limit = null){
        $filter = $this->_filter($filter);
        $offset = $offset ? $offset : 0 ;
        $limit = $limit ? $limit : static::$NO_LIMIT ;

        if(!is_int($offset) || !is_int($limit))
            throw new \Exception("TypeError: offset and limit must be integers");

        return $this->_all(
            $this->mysqli->query("SELECT * FROM easy_contacts". $filter ." LIMIT ". $offset .",". $limit)
        );
    }

    public function get($id){
        if(!is_int($id))
            throw new \Exception("TypeError: id must be integer");

        return $this->_get(
            $this->mysqli->query("SELECT * FROM easy_contacts WHERE id = '". $id ."'")
        );
    }

    public function post($obj){}

    public function put($id, $obj){}

    public function delete($id){}
}