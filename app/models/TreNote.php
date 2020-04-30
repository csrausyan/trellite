<?php

class TreNote extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $note_id;

    /**
     *
     * @var integer
     */
    public $tre_id;

    /**
     *
     * @var string
     */
    public $note_description;

    /**
     *
     * @var string
     */
    public $note_createdAt;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("trellite");
        $this->setSource("tre_note");

        // $this->belongsTo(
        //     'tre_id',
        //     'TreUser',
        //     'tre_id'
        // );


    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TreNote[]|TreNote|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TreNote|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
