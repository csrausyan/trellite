<?php

class TreUser extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $tre_id;

    /**
     *
     * @var string
     */
    public $tre_username;

    /**
     *
     * @var string
     */
    public $tre_email;

    /**
     *
     * @var string
     */
    public $tre_password;

    /**
     *
     * @var string
     */
    public $tre_timestamp;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("trellite");
        $this->setSource("tre_user");

        // $this->hasMany(
        //     'tre_id',
        //     'TreNote',
        //     'tre_id'
        // );



        
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TreUser[]|TreUser|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TreUser|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
