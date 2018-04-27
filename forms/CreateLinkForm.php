<?php

namespace app\forms;

use yii\base\Model;
use app\models\Links;

class CreateLinkForm extends Model
{
    public $link;
    private $shortLink;


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

    /**
     * @return boolean
     */
    public function create()
    {
        if ($this->validate()) {
            $datetime = new \DateTime();

            $model = new Links([
                'create_at' => $datetime->format('Y-m-d H:i:s'),
                'link' => $this->link,
                'short_link' => $this->shortLink,
            ]);

            return $model->save();
        }
        return false;
    }

    public function getShortLink()
    {
        $this->createShortLink();
        return $this->shortLink;
    }

    private function createShortLink()
    {
        $this->shortLink = substr(md5($this->link . time()), 0, 5);

    }
}
