<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hora".
 *
 * @property integer $hora_id
 * @property string $hora_nombre
 *
 * @property Solicitud[] $solicituds
 */
class Hora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hora_id', 'hora_nombre'], 'required'],
            [['hora_id'], 'integer'],
            [['hora_nombre'], 'string', 'max' => 50],
            [['hora_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hora_id' => 'Hora ID',
            'hora_nombre' => 'Hora Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['hora_id' => 'hora_id']);
    }
}
