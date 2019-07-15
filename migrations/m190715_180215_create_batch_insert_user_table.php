<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%batch_insert_users}}`.
 */
class m190715_180215_create_batch_insert_user_table extends Migration
{
    public function up()
    {
        //get user data JSON file
        $userList = file_get_contents("/app/users.json");
        //JSON decode userList
        $userList = json_decode($userList, true);
        foreach ($userList as $user):
            $keyList = array();
            $userData = array();
            foreach ($user as $key => $data):
                $keyList[] = $key;
                $userData[] = $data;
            endforeach;
            $userDatas[] = $userData;
        endforeach;
        // insert users data db
        $this->batchInsert('user', $keyList, $userDatas);
    }

    public function down()
    {
        echo "no inserted data";
        return false;
    }
}
