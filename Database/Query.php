<?php

namespace Database;
use mysqli_result;
use mysqli;

class Query {
    private $resource;
    private $columns = array("*");
    private $select;
    private $where = array();
    private $limit;
    private $orderBy;
    private $joinVal = array("");
    private $mainTable;
    private $groupBy;

    public function reset() {
        $this->resource = null;
        $this->columns = array("*");
        $this->select = null;
        $this->where = array();
        $this->limit = null;
        $this->orderBy = null;
        $this->joinVal = array("");
        $this->mainTable = null;
        $this->groupBy = null;
    }

    // Use this for custom query
    public function query($sql) {
        $this->resource = mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $sql);
        return $this;
    }

    public function table($table)
    {
        $this->mainTable = $table;
        $this->select = "SELECT " . implode(",", $this->columns) . " FROM $table AS $table ";
        
        return $this;
    }
    
    public function alias($column, $alias)
    {
        array_push($this->columns, " $column AS $alias ");
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
        array_push($this->where, " $column $operator '$value' ");
        $this->where[0] = (count($this->where) < 2 ? " WHERE " . $this->where[0] : $this->where[0]);
        return $this;
    }

    public function groupBy(array $columns) {
        $this->groupBy = " GROUP BY " . implode(",", $columns);
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
        $column2On = "";
        if(str_contains($column2, '.')){
            $column2On = $column2;
        } else {
            $column2On = $this->mainTable . ".$column2";
        }
        array_push($this->joinVal, "$method JOIN $table AS $table ON $table.$column = $column2On ");
        return $this;
    }

    // to get data from table
    // Exaple:
    // $DB->select("mahasiswa")->join("tugas", "nim")->where("nim", "173040001")->get();
    public function get($table = "")
    {
        $this->mainTable = $table == "" ? $this->mainTable : $table;
        $this->select = $this->select == NULL ?  "SELECT " . implode($this->columns) . " FROM $table " : $this->select;
        $sql = $this->select  
        . implode("", $this->joinVal)
        . implode(" AND ", $this->where)
        . $this->groupBy 
        . $this->limit 
        . $this->orderBy;
        // echo "<br><br>";
        // var_dump($sql);

        $this->resource = mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $sql);
        if (!$this->resource) {
            echo mysqli_error(mysqli_connect("localhost", "root", "", "penilaian-app")) . $sql;
            return false;
        }
        // var_dump($this->resource);
        return $this;
    }

    // Use this to fetch all data
    // NOTE: use fetch after ALL query executed
    public function fetch()
    {
        $result = Array();
        while ($row = mysqli_fetch_assoc($this->resource)) {
            $result[] = $row;
        }
        $this->reset();
        return $result;
    }

    public function count()
    {
        return $this->resource->num_rows;
    }

    public function insert($table, array $values) {
        $columnImplode = $this->columns == array("*") ? "" : "(" . implode(", ", $this->columns) . ")";
        $query = "INSERT INTO $table $columnImplode VALUES ('" . implode("', '", $values) ."')";
        // var_dump($query);
        return mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $query);
    }

    public function update($table, array $targets, array $where) {
        $change = str_replace('=', " = '", http_build_query($targets, '', "' ,"));
        $condition = str_replace('=', " = '", http_build_query($where, '', "' AND "));
        $query = "UPDATE $table SET " . $change . "' WHERE $condition'";
        // $query = "UPDATE $table SET avatar = 'default.jpg' WHERE $where";
        return mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $query);
    }

    public function delete($table, $where) {
        $query = "DELETE FROM $table WHERE $where";
        return mysqli_query(mysqli_connect("localhost", "root", "", "penilaian-app"), $query);
    }
}
