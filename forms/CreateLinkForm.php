<?php

namespace app\forms;

//use Yii;
use yii\base\Model;

class CreateLinkForm extends Model
{
    public $link;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['link', 'required'],
            ['link', 'string'],
        ];
    }
//
//    /**
//     * @return array customized attribute labels
//     */
//    public function attributeLabels()
//    {
//        return [
//            'link' => 'Verification Code',
//        ];
//    }
//
//    /**
//     * Sends an email to the specified email address using the information collected by this model.
//     * @param string $email the target email address
//     * @return bool whether the model passes validation
//     */
//    public function contact($email)
//    {
//        if ($this->validate()) {
//            Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([$this->email => $this->name])
//                ->setSubject($this->subject)
//                ->setTextBody($this->body)
//                ->send();
//
//            return true;
//        }
//        return false;
//    }
}
