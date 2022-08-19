<?php

namespace backend\modules\catalog\forms;

use common\models\Subject;
use common\models\SubjectPrice;
use Yii;
use yii\base\Model;

class SubjectUpdateForm extends Model
{
    public $name;
    public $price;
    public $status;

    private $subject;

    public function __construct(Subject $subject, $config = [])
    {
        $this->subject = $subject;

        $this->name = $subject->name;
        $this->status = $subject->status;
        $this->price = $subject->getActivePrice();

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name', 'status', 'price'], 'required'],
            [['status', 'price'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    public function saveData()
    {
        $this->subject->editData(
            $this->name,
            $this->status,
        );

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($this->subject->update() === false) {
                throw new \RuntimeException('Ошибка сохранения.');
            }

            if (!$this->subject->isCurrentPrice($this->price)) {
                $oldPrices = SubjectPrice::find()
                    ->bySubjectId($this->subject->id)
                    ->active()
                    ->all();

                foreach ($oldPrices as $oldPrice) {
                    $oldPrice->inactivate();
                    if ($oldPrice->update(false) === false) {
                        throw new \RuntimeException('Saving error.');
                    }
                }
                $newPrice = SubjectPrice::createBySubjectId(
                    $this->subject->id,
                    $this->price
                );
                if (!$newPrice->save(false)) {
                    throw new \Exception('Произошла ошибка при сохранении данных.');
                }
            }
            Yii::$app->session->setFlash('success', Yii::t('ui', "Данные созданы успешно"));
            $transaction->commit();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', Yii::t('ui', "Произошла ошибка. Пожалуйста, попробуйте еще раз") . $e->getMessage());
            $transaction->rollBack();
            throw $e;
        }
    }
}
