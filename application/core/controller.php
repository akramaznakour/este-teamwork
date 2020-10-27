<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = array();

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {

        $this->openDatabaseConnection();
        $this->loadModel();
    }

    /**
     * Open the database connection with the credentials from application/config/
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'model/User.php';
        require APP . 'model/Project.php';
        require APP . 'model/Task.php';
        require APP . 'model/Message.php';
        require APP . 'model/Notification.php';
        require APP . 'model/Invitation.php';
        $this->model['User'] = new User($this->db);
        $this->model['Project'] = new Project($this->db);
        $this->model['Task'] = new Task($this->db);
        $this->model['Notification'] = new Notification($this->db);
        $this->model['Message'] = new Message($this->db);
        $this->model['Invitation'] = new Invitation($this->db);
    }
}
