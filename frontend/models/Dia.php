<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dia".
 *
 * @property integer $dia_id
 * @property string $dia_nombre
 *
 * @property Solicitud[] $solicituds
 */
class Dia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dia_id', 'dia_nombre'], 'required'],
            [['dia_id'], 'integer'],
            [['dia_nombre'], 'string', 'max' => 10],
            [['dia_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dia_id' => 'Dia ID',
            'dia_nombre' => 'Dia Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['dia_id' => 'dia_id']);
    }
}
