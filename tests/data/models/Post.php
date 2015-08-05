<?php
/**
 * Created by PhpStorm.
 * User: heyanlong
 * Date: 2015/8/5
 * Time: 13:54
 */

namespace tests\data\models;


use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public $message;

    public static $db;

    public static function getDb()
    {
        return self::$db;
    }
}