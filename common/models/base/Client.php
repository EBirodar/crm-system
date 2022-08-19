<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "client".
 *
 * @property integer $id
 * @property string $full_name
 * @property integer $gender
 * @property string $visited_date
 * @property string $comment
 * @property integer $status
 * @property integer $is_deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\ClientPhone[] $clientPhones
 * @property \common\models\RelClientGroup[] $relClientGroups
 * @property string $aliasModel
 */
abstract class Client extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'visited_date'], 'required'],
            [['gender', 'status', 'is_deleted'], 'integer'],
            [['comment'], 'string'],
            [['full_name', 'visited_date'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'full_name' => Yii::t('models', 'Full Name'),
            'gender' => Yii::t('models', 'Gender'),
            'visited_date' => Yii::t('models', 'Visited Date'),
            'comment' => Yii::t('models', 'Comment'),
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
    public function getClientPhones()
    {
        return $this->hasMany(\common\models\ClientPhone::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelClientGroups()
    {
        return $this->hasMany(\common\models\RelClientGroup::className(), ['client_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClientQuery(get_called_class());
    }


}
