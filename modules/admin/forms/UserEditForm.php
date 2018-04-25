<?php

namespace app\modules\admin\forms;

use app\models\User;
use yii\base\Model;

class UserEditForm extends Model
{
    public $id;
    public $username;
    public $email;

    public $isNewRecord = false;

    public function __construct(User $user, $config = [])
    {
        $this->username = $user->username;
        $this->email = $user->email;
        $this->id = $user->id;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'email'],
            [['username', 'email'], 'string', 'max' => 255],
        ];
    }
}