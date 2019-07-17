<?php

namespace app\models;

use Yii;

/**
 * user model
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $personal_code
 * @property integer $phone
 * @property boolean $active
 * @property boolean $dead
 * @property string $lang
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'personal_code', 'phone'], 'required'],
            [['first_name', 'last_name', 'email', 'lang'], 'string'],
            [['email'], 'email'],
            [['phone'], 'integer'],
            [
                ['personal_code'],
                'validatePersonalCode',
                'message' => 'Please input a valid personal identification number.'
            ],
            [['active', 'dead'], 'boolean'],
        ];
    }

    /**
     * All user attributes
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'User Id',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'personal_code' => 'Personal Code',
            'phone' => 'Phone',
            'active' => 'Active',
            'dead' => 'Is Dead?',
            'lang' => 'Lang',

        ];
    }

    /**
     * check personal_code
     * @param integer $personCode
     * @return number
     */
    private function personalCodeControlNumber($personCode)
    {
        $multiplier1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
        $multiplier2 = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3];
        $mod = null;
        $total = 0;

        for ($i = 0; $i < 10; $i++) {
            $total += substr($personCode, $i, 1) * $multiplier1[$i];
        }
        $mod = $total % 11;

        $total = 0;
        if (10 === $mod) {
            for ($i = 0; $i < 10; $i++) {
                $total += substr($personCode, $i, 1) * $multiplier2[$i];
            }
            $mod = $total % 11;
            if (10 === $mod) {
                $mod = 0;
            }
        }

        return $mod;
    }

    /**
     * check validate personal_code
     * @param $var
     * @return bool
     */
    public function validatePersonalCode($var)
    {
        if (strlen($this->$var) != 11) {
            $this->addError('personal_code', 'Not a valid Personal Code');

            return false;
        }
        $control = $this->personalCodeControlNumber($this->$var);
        if ($control != substr($this->$var, 10, 1)) {
            $this->addError('personal_code', 'Not a valid Personal Code');

            return false;
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
