<?php

class Database
{

    private static $INSTANCE = null;
    private $mysqli,
    $HOST = 'localhost',
    $USER = 'root',
    $PASS = '',
    $DBNAME = 'scandiweb_task';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if (mysqli_connect_error()) {
            die("connection failed");
        }
    }

    /*
    singleton design pattern,
    to test the connection so it doesn't double
     */

    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new Database();
        }
        return self::$INSTANCE;
    }

    public function insert($table, $fields = [])
    {
        // take columns
        $column = implode(", ", array_keys($fields));

        // take value
        $valuesArrays = [];
        $i = 0;
        foreach ($fields as $key => $values) {
            if (is_int($values)) {
                $valuesArrays[$i] = $this->escape($values);
            } else {
                $valuesArrays[$i] = "'" . $this->escape($values) . "'";
            }

            $i++;
        }

        $values = implode(", ", $valuesArrays);
        $query = "INSERT INTO $table ($column) VALUES ($values)";
        return $this->run_query($query, '<script>alert("Problem With Data Entry")</script>');
    }

    public function get($table, $className = null)
    {
        $results = [];
        $query = "SELECT * FROM $table";

        if ($result = $this->mysqli->query($query)) {

            if ($className != null) {
                while ($row = $result->fetch_object($className)) {
                    $results[] = $row;
                }
            } else {
                while ($row = $result->fetch_object()) {
                    $results[] = $row;
                }
            }

            return $results;
        }
    }

    public function find($table, $id)
    {
        $query = "SELECT * FROM {$table} WHERE id = {$id} LIMIT 1";
        if ($result = $this->mysqli->query($query)) {
            return $result->fetch_object();
        }
    }

    public function get_info($table, $column = '', $value = '')
    {
        if (!is_int($value)) {
            $value = "'" . $value . "'";

            if ($column != '') {
                $query = "SELECT * FROM $table WHERE $column = $value";
                $result = $this->mysqli->query($query);

                while ($row = $result->fetch_assoc()) {
                    return $row;
                }

            } else {
                $query = "SELECT * FROM $table";
                $result = $this->mysqli->query($query);

                while ($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }

                return $results;
            }

        }
    }

    public function update($table, $fields, $id)
    {
        $valuesArrays = [];
        $i = 0;
        foreach ($fields as $key => $values) {
            if (is_int($values)) {
                $valuesArrays[$i] = $key . "=" . $this->escape($values);
            } else {
                $valuesArrays[$i] = $key . "='" . $this->escape($values) . "'";
            }

            $i++;
        }
        $values = implode(", ", $valuesArrays);

        $query = "UPDATE $table SET $values WHERE id=$id";
        return $this->run_query($query, '<script>alert("Problem With Change Password")</script>');
    }

    public function run_query($query, $msg)
    {
        if ($this->mysqli->query($query)) {
            return true;
        } else {
            echo $msg;
            return false;
        }

    }

    public function escape($name)
    {
        return $this->mysqli->real_escape_string($name);
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->mysqli->query($query);

        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }

}
