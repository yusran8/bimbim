<?php
namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
// Validation
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;

class LoginForm extends Form
{
    public function initialize()
    {
        /**
         * Email Address
         */
        $id = new Text('id', [
            "class" => "form-control",
            "required" => true,
            "placeholder" => "ID"
        ]);

        //form email field validation
        $id->addValidators([
            new PresenceOf(['message' => 'The ID is required']),
            
        ]);

        /**
         * Password
         */
        $password = new Password('password', [
            "class" => "form-control",
            "required" => true,
            "placeholder" => "Password"
        ]);
        
        // password field validation
        $password->addValidators([
            new PresenceOf(['message' => 'Password is required']),
            new StringLength(['min' => 5, 'message' => 'Password is too short. Minimum 5 characters.']),
        ]);

        /**
         * Submit Button
         */
        $submit = new Submit('submit', [
            "value" => "Login",
            "class" => "btn btn-primary",
        ]);

        $this->add($id);
        $this->add($password);
        $this->add($submit);
    }
}