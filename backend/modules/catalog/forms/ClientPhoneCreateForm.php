<?php

namespace backend\modules\catalog\forms;

use common\models\Client;
use common\models\ClientPhone;
use Yii;
use yii\base\Model;

class ClientPhoneCreateForm extends Model
{
    public $phone;
    public $type;
    public $client_id;

    public function rules()
    {
        return [
            [['phone', 'type'], 'required'],
            [['type', 'client_id'], 'integer'],
            ['phone', 'string'],
        ];

    }

    public function saveData(): bool
    {
        $clientPhoneModel = ClientPhone::createByClientId(
            $this->client_id,
            $this->phone,
            $this->type,
        );

        if ($clientPhoneModel->save(false)) {
            return true;
        }
        return false;
    }
}
