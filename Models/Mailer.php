<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPMailer
 *
 * @author Javi
 */

include 'PHPMailer/PHPMailer.php';


class Mailer extends PHPMailer{
    
    public function __construct($exceptions = null) {
        parent::__construct($exceptions);
    }
    
}
