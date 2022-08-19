<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "_subject_price".
 *
 * @property integer $id
 * @property integer $subject_id
 * @property integer $price
 * @property integer $status
 * @property integer $is_deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\Subject $subject
 * @property string $aliasModel
 */
abstract class SubjectPrice extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '_subject_price';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
                'class' => TimestampBehavior::className(),
              ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_id'], 'required'],
            [['subject_id', 'price', 'status', 'is_deleted'], 'integer'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Subject::className(), 'targetAttribute' => ['subject_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'subject_id' => Yii::t('models', 'Subject ID'),
            'price' => Yii::t('models', 'Price'),
            'status' => Yii::t('models', 'Status'),
            'is_deleted' => Yii::t('models', 'Is Deleted'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated_at' => Yii::t('models', 'Updated At'),
            'created_by' => Yii::t('models', 'Created By'),
            'updated_by' => Yii::t('models', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(\common\models\Subject::className(), ['id' => 'subject_id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\SubjectPriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubjectPriceQuery(get_called_class());
    }


}
