<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loan".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $amount
 * @property string $interest
 * @property integer $duration
 * @property string $start_date
 * @property string $end_date
 * @property integer $campaign
 * @property boolean $status
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'validateUserAge'],
            [['user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign'], 'required'],
            [['user_id', 'duration', 'campaign'], 'integer'],
            [['amount', 'interest'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['status'], 'boolean'],
        ];
    }

    /**
     * Loan has one user
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Loan ID',
            'user_id' => 'User ID',
            'amount' => 'Amount',
            'interest' => 'Interest',
            'duration' => 'Duration',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'campaign' => 'Campaign',
            'status' => 'Status',
        ];
    }
}
