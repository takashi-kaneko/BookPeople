<?php

class BaseUniq {

    /**
     * Tracking ID
     * @var string
     * @orm char(64)
     */
    public $trackId;

    /**
     * Constructor
     */
    public function __construct() {
        $this->trackId = uniqid('track-');
    }
}

?>
