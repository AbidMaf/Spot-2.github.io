<?php

namespace Database;

class Query {
    private $resource;
    private $columns = array("*");
    private $select;
    private $where = array("");
    private $limit;
    private $orderBy;
    private $joinVal = array("");
    private $mainTable;

    // Use this for custom query
    public function query($sql) {
        $this->resource = mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $sql);
        return $this;
    }

    public function table($table)
    {
        $this->mainTable = $table;
        $this->select = "SELECT " . implode(", ", $this->columns) . " FROM $table ";
        
        return $this;
    }
    
    // to get columns from table
    public function columns(array $column)
    {
        $this->columns = $column;
        return $this;
    }

    // to get where from table
    public function where($column, $value, $operator = "=")
    {
        array_push($this->where, array( " WHERE $this->mainTable.$column $operator $value "));
        return $this;
    }

    // to get limit from table
    public function limit($limit)
    {
        $this->limit = " LIMIT " . $limit;
        return $this;
    }

    // to get order by from table
    public function order($column, $order)
    {
        $this->orderBy = " ORDER BY $column $order";
        return $this;
    }

    // to get join table to tables
    public function join($table, $column, $column2 = "",  $method = "INNER")
    {
        $column2 = $column2 == "" ? $column : $column2;
        array_push($this->joinVal, "$method JOIN $table AS $table ON $table.$column = $this->mainTable.$column2 ");
        return $this;
    }

    // to get data from table
    // Exaple:
    // $DB->select("mahasiswa")->join("tugas", "nim")->where("nim", "173040001")->get();
    public function get()
    {
        $sql = $this->select  
        . implode("", $this->joinVal)
        . implode(" AND ", $this->where)
        . $this->limit 
        . $this->orderBy;
        $this->resource = mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $sql);
        if (!$this->resource) {
            echo mysqli_error(mysqli_connect("localhost", "root", "", "penilaian-app")) . $sql;
            return false;
        }
        return $this;
    }

    // Use this to fetch all data
    public function fetch()
    {
        $result = Array();
        while ($row = mysqli_fetch_assoc($this->resource)) {
            $result[] = $row;
        }
        return $result;
    }

    public function insert($table, $columns, $values) {
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $query;
    }

    public function update($table, $columns, $values, $where) {
        $query = "UPDATE $table SET $columns = $values WHERE $where";
        return $query;
    }

    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        return $query;
    }
}
