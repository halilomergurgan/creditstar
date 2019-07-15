<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%batch_insert_loans}}`.
 */
class m190715_183231_create_batch_insert_loan_table extends Migration
{
    public function up()
    {
        //get loan data JSON file
        $loanList = file_get_contents("/app/loans.json");
        //json to array
        $loanList = json_decode($loanList, true);

        foreach ($loanList as $loan):
            $keys = array();
            $loanAllData = array();
            foreach ($loan as $key => $data):
                $keys[] = $key;
                if ($key == 'start_date' || $key == 'end_date'):
                    //convert UNIX time to datetime
                    $dateTime = new DateTime("@$data");
                    $loanAllData[] = $dateTime->format('Y-m-d');
                else:
                    $loanAllData[] = $data;
                endif;
            endforeach;
            $loans[] = $loanAllData;
        endforeach;
        // insert loan data db
        $this->batchInsert('loan', $keys, $loans);
    }

    public function down()
    {
        echo "no inserted data";
        return false;
    }
}
