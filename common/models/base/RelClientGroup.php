<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "rel_client_group".
 *
 * @property integer $id
 * @property integer $client_id
 * @property integer $group_id
 * @property integer $status
 * @property integer $is_deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\Client $client
 * @property \common\models\Group $group
 * @property string $aliasModel
 */
abstract class RelClientGroup extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_client_group';
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
            [['client_id', 'group_id'], 'required'],
            [['client_id', 'group_id', 'status', 'is_deleted'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Group::className(), 'targetAttribute' => ['group_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'client_id' => Yii::t('models', 'Client ID'),
            'group_id' => Yii::t('models', 'Group ID'),
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
    public function getClient()
    {
        return $this->hasOne(\common\models\Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(\common\models\Group::className(), ['id' => 'group_id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\RelClientGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RelClientGroupQuery(get_called_class());
    }


}
