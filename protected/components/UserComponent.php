<?php
class UserComponent extends CWebUser
{
    public static $model = null;

    public function getModel()
    {
        if (UserComponent::$model != null)
            return UserComponent::$model;
        else {
            if ($this->getId() > 0) {
                UserComponent::$model = Users::model()->findByPk($this->getId());
                return UserComponent::$model;
            } else
                return null;
        }
    }
}