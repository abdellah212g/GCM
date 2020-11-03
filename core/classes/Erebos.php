<?php
/**
* Erebos v1.0
* ___________             ___.                 
* \_   _____/______   ____\_ |__   ____  ______
*  |    __)_\_  __ \_/ __ \| __ \ /  _ \/  ___/
*  |        \|  | \/\  ___/| \_\ (  <_> )___ \
* /_______  /|__|    \___  >___  /\____/____  >
*         \/             \/    \/           \/
* https://github.com/Apter-X/erebos
*
* This PHP class allow you to applied simple CRUD operations using MySql requests
*/
Class Erebos
{
    private $db;

    /**
     * Connect to the database
     * @param $dbhost
     * @param $dbname
     * @param $dbuser
     * @param $dbpswd
     */
    public function __construct($dbhost, $dbname, $dbuser, $dbpswd)
    {
        $this->db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpswd);
    }

    /**
    * Autoloader add
    *
    * @return void
    */
    public function loadPlugins()
    {
        spl_autoload_register(function ($class) 
        {
            include_once './plugins/' . $class . '.php';
        });
    }

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
     * Define the fetchMode
     * @param int $fetchMode fetchMode
     */
    public function setFetchMode($fetchMode)
    {
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
    }

    /**
     * Execute an SQL query and return the status
     * @param string $request SQL query
     * @param array|null $values Optional values
     * @return bool Result of the request
     */
    public function execute($request, $values = array())
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
    public function fetch($request, $values = null, $all = true)
    {
        $results = self::exec($request, $values);
        return ($all) ? $results->fetchAll() : $results->fetch();
    }
    
    /*---------------------- End of setup ---------------------*/

    /**
    * Update value
    * @param string $table
    * @param string $target key
    * @param string $new value
    * @param string $referential key
    * @param string|int $value of the referential key
    * @return requestSQL+PDOStatement
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
    * Select value
    * @param string $target key
    * @param string $table
    * @param string $referential key
    * @param string|int $value of the referential key
    * @return string
    */
    public function selectValue($target, $table, $refKey, $refValue)
    {
        $sql = <<<EOT
            SELECT $target FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($sql);

        $return = implode(array_column($response, $target)); //Remove the array and the key
        return $return;
    }

    /**
    * Insert row
    * @param string $table
    * @param string $referential keys (:$key1, :key2)
    * @param object $row values
    * @return requestSQL+PDOStatement
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
    * Select row
    * @param string $table
    * @param string $referential key
    * @param string|int $value of the referential key
    * @return PDOStatement
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
    * Delete row 
    * @param string $table
    * @param string $referential key
    * @param string|int $value of the referential key
    * @return requestSQL+PDOStatement
    */
    public function deleteRow($table, $refKey, $refValue){
        $sql = <<<EOT
            DELETE FROM $table WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Insert column
    * @param string $table
    * @param string $new column name
    * @param string $data type
    * @param string $agency
    * @return requestSQL+PDOStatement
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
    * @param string $target column
    * @param string $table
    * @param string $referential key
    * @param string $value of the referential key
    * @return requestSQL+PDOStatement
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
