<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property integer $materia_id
 * @property string $materia_nombre
 *
 * @property Solicitud[] $solicituds
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['materia_id', 'materia_nombre'], 'required'],
            [['materia_id'], 'integer'],
            [['materia_nombre'], 'string', 'max' => 10],
            [['materia_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'materia_id' => 'Materia ID',
            'materia_nombre' => 'Materia Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['materia_id' => 'materia_id']);
    }
}
