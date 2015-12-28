<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    const ERROR_NOT_ACTIVATED = 101;
    const ERROR_BLOCKED = 102;
    const ERROR_ACCESS_LEVEL = 103;


    public function authenticate()
    {
        /**
         * @var $record Users
         */
        $record = Users::model()->findByAttributes(array('username' => $this->username));
        if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if ($record->password !== $record->generateHash($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                if ($record->active == UserActiveStates::EMAIL_ACTIVATION) {
                    $this->errorCode = self::ERROR_NOT_ACTIVATED;
                } elseif ($record->active == UserActiveStates::BLOCKED) {
                    $this->errorCode = self::ERROR_BLOCKED;
                } elseif ($record->rang == 0) {
                    $this->errorCode = self::ERROR_ACCESS_LEVEL;
                } else {
                    $this->_id = $record->id;
                    $this->errorCode = self::ERROR_NONE;
                    $log = new UsersSiteLogins();
                    $log->user_id = $record->id;
                    $log->when = new CDbExpression("NOW()");
                    $log->userIP = $_SERVER['REMOTE_ADDR'];
                    $log->toAdmin = 1;
                    $log->save();
                }
            }
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}

