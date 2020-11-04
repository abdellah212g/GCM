<?php
/**
* Erebos v1.0
*
* https://github.com/Apter-X/erebos
*
* This PHP class allow you to applied simple CRUD operations using MySql requests
*/
Class Erebos
{
    private $db;

    /**
     * Connect to the database
     * @param $db_host
     * @param $db_name
     * @param $db_user
     * @param $db_psw
     */
    public function __construct($db_host, $db_name, $db_user, $db_psw)
    {
        $this->db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_psw);
    }

    /**
    * Load additional classes
    *
    * @return void
    */
    public function load()
    {
        spl_autoload_register(function ($class) 
        {
            include_once './plugins/' . $class . '.php';
        });
    }

    /**
    * Define the fetchMode
    * @param int $fetchMode fetchMode
    */
    public function setFetchMode($fetchMode)
    {
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
    }

    /*---------------------- private function ---------------------*/

    /**
     * Execute an SQL query and return the result (prepared request or not)
     * @param string $request SQL query
     * @param array|null $values Optional values
     * @return PDOStatement
     */
    private function exec($request, $values = null)
    {
        $req = $this->db->prepare($request);
        $req->execute($values);
        return $req;
    }

    /**
     * Execute an SQL query and return the status
     * @param string $request SQL query
     * @param array|null $values Optional values
     * @return bool Result of the request
     */
    private function execute($request, $values = array())
    {
        $results = self::exec($request, $values);
        return ($results) ? true : false;
    }

    /**
     * Execute an SQL query and return row(s) of the result
     * @param string $request SQL query
     * @param array|null $values Optional values
     * @param bool $all Query with several rows or not
     * @return array|mixed Return data
     */
    private function fetch($request, $values = null, $all = true)
    {
        $results = self::exec($request, $values);
        return ($all) ? $results->fetchAll() : $results->fetch();
    }
    
    /*---------------------- public functions ---------------------*/

    /**
    * Update a specific value giving the table and references
    * @param string $table Target table
    * @param string $key Target key
    * @param string $newValue
    * @param string $refKey Referential key
    * @param string|int $refValue Value of the referential key
    * @return requestSQL|PDOStatement Return the sql request constructor and the PDO statement
    */
    public function updateValue($table, $key, $newValue, $refKey, $refValue)
    {
        $sql = <<<EOT
            UPDATE $table SET $key='$newValue' WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Select a specific value giving the table and references
    * @param string $target Target key
    * @param string $table Target table
    * @param string $refKey Referential key
    * @param string|int $refValue Value of the referential key
    * @return string Return the target value
    */
    public function selectValue($target, $table, $refKey, $refValue)
    {
        $sql = <<<EOT
            SELECT $target FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($sql);

        $return = implode(array_column($response, $target)); //extract the value from the associative array
        return $return;
    }

    /**
    * Insert row table
    * @param string $table Target table
    * @param string $targets Referential keys (:$key1, :key2)
    * @param object $values row values
    * @return requestSQL|PDOStatement Return the sql request constructor and the PDO statement
    */
    public function insertRow($table, $targets, $values)
    {
        $entry = str_replace(':', '', $targets);

        $sql = <<<EOT
            INSERT INTO $table ($entry) VALUES ($targets)
        EOT;

        $return = $this->execute($sql, $values);
        return $sql . " | " . $return;
    }

    /**
    * Select row table
    * @param string $table Target table
    * @param string $refKey Referential key
    * @param string|int $refValue Value of the referential key
    * @return array Return the fetched row
    */
    public function selectRow($table, $refKey, $refValue){
        $sql = <<<EOT
            SELECT * FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $query = $this->fetch($sql);

        $values = $query;
        return $values;
    }

    /**
    * Delete row table
    * @param string $table Target table
    * @param string $refKey Referential key
    * @param string|int $refValue Value of the referential key
    * @return requestSQL|PDOStatement Return the sql request constructor and the PDO statement
    */
    public function deleteRow($table, $refKey, $refValue){
        $sql = <<<EOT
            DELETE FROM $table WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Insert column table
    * @param string $table
    * @param string $new column name
    * @param string $data type
    * @param string $agency
    * @return requestSQL+PDOStatement Return the sql request constructor and the PDO statement
    */
    public function insertColumn($table, $name, $type, $after){  
        $sql = <<<EOT
            ALTER TABLE $table ADD $name $type NOT NULL AFTER $after
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Select column table
    * @param string $column Target column
    * @param string $table Target table
    * @param string $refKey Referential key
    * @param string $refValue Value of the referential key
    * @return array Return the fetched column
    */
    public function selectColumn($column, $table, $refKey = NULL, $refValue = NULL)
    {
        if(empty($refKey) && empty($refValue)){
            $sql = <<<EOT
                SELECT $column FROM $table
            EOT;
        } else {
            $sql = <<<EOT
                SELECT $column FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $fetch = $this->fetch($sql);

        $return = array_column($fetch, $column);
        return $return;
    }
}
