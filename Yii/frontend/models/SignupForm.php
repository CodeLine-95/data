<?php
namespace frontend\models;
use frontend\models\base\BaseForm;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends BaseForm
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $verifycode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common','This username has already been taken.')],
            ['username', 'string', 'min' => 3, 'max' => 16],
            ['username', 'match', 'pattern' => '/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u', 'message' => Yii::t('common','The user name consists of letters, characters, numbers, underscores, and cannot be underlined by numbers.')],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common','This email address has already been taken.')],

            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 6],

            ['repassword','compare','compareAttribute' => 'password', 'message' => Yii::t('common','Two times the password is not consitent.')],

            ['verifycode','captcha'],
        ];
    }

    /**
     * form attributeLabelsName
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username'   => '用户名',
            'email'      => '邮箱',
            'password'   => '密码',
            'repassword' => '确认密码',
            'verifycode' => '验证码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
