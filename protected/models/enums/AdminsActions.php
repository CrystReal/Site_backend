<?php

/**
 * Created by Alex Bond.
 * Date: 01.02.14
 * Time: 23:32
 */
class AdminsActions
{
    const USER_EDIT = 0;
    const RANG_CHANGE = 1;
    const VIP_CHANGE = 2;

    const ACTIVATE = 10;
    const DEACTIVATE = 11;

    const BALANCE = 20;
    const EXP = 21;

    const UNBAN = 22;

    private static $actions = [
        self::USER_EDIT => "Редактирование профиля игрока",
        self::RANG_CHANGE => "Изменение ранга",
        self::VIP_CHANGE => "Изменение статуса VIP",

        self::ACTIVATE => "Активация",
        self::DEACTIVATE => "Де-активация",

        self::BALANCE => "Изменение баланса",
        self::EXP => "Изменение опыта",

        self::UNBAN => "Снятие бана"
    ];

    public static function getString($action)
    {
        if (isset(self::$actions[$action]))
            return self::$actions[$action];
        else
            return "Да пошли вы все!";
    }

    public static function getArrayDropDown()
    {
        return self::$actions;
    }
} 