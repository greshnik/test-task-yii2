<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customTourFields".
 *
 * @property integer $id
 * @property integer $tourId
 * @property string $name
 * @property string $value
 */
class CustomTourFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customTourFields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tourId'], 'integer'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tourId' => 'Tour ID',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
}
