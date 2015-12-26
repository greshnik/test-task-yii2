<?php

namespace app\models;

use Yii;
use app\models\CustomTourFields;

/**
 * This is the model class for table "tour".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $countAdults
 * @property integer $countChildren
 * @property integer $countSuckling
 * @property string $positionFields
 */
class Tour extends \yii\db\ActiveRecord
{
    private $additionFieldsForm = [];
    public $additionFields;

    public static function getAdditionForm() {
        return 'CustomTourFields';
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description', 'positionFields'], 'string'],
            [['countAdults', 'countChildren', 'countSuckling'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    public function load($data) {
        if(isset($data[self::getAdditionForm()])) {
            $this->additionFieldsForm = $data[self::getAdditionForm()];
        }
        return parent::load($data);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        CustomTourFields::deleteAll(['tourId' => $this->id]);
        foreach ($this->additionFieldsForm as $index => $additionField) {
            $additionField['tourId'] = $this->id;
            $model = new CustomTourFields();
            $formData[self::getAdditionForm()] = $additionField;
            $model->load($formData);
            $model->save();
        }
        return true;
    }

    public function getFields() {
        $positions = json_decode($this->positionFields);
        $this->additionFields = CustomTourFields::find()->where(['tourId' => $this->id])->all();
        $result = [];
        $index = 0;
        foreach ($positions as $key => $position) {
            if($position !== 0) {
                $result[$position] = $this->{$position};
            }
            else {
                $result[$this->additionFields[$index]->name] = $this->additionFields[$index]->value;
                $index++;
            }
        }
        return $result;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'countAdults' => 'Count Adults',
            'countChildren' => 'Count Children',
            'countSuckling' => 'Count Suckling',
            'positionFields' => 'Position Fields',
        ];
    }
}
