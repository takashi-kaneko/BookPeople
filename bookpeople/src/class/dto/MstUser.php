<?php
include_once(dirname(__FILE__).'/BaseMst.php');

/**
 * Class
 */
class MstUser extends BaseMst {

    /**
     * @orm decimal(20,0)
     */
	public $user_id;

    /**
     * @orm char(50)
     */
	public $user_name;

    /**
     * Constructor
     * @param string
     */
    public function __construct($user_id = '') {
        parent::__construct();
        $this->user_id = $user_id;
    }


}

?>
