<?php

use yii\db\Migration;
use common\models\User;

class m170909_130350_creating_user_admin_admin extends Migration
{
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@email.test';
        $user->setPassword('admin');
        $user->save();
    }

    public function safeDown()
    {
        echo "m170909_130350_creating_user_admin_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170909_130350_creating_user_admin_admin cannot be reverted.\n";

        return false;
    }
    */
}
