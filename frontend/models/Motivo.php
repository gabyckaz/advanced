<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "motivo".
 *
 * @property integer $motivo_id
 * @property string $motivo_nombre
 *
 * @property Solicitud[] $solicituds
 */
class Motivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['motivo_id', 'motivo_nombre'], 'required'],
            [['motivo_id'], 'integer'],
            [['motivo_nombre'], 'string', 'max' => 20],
            [['motivo_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'motivo_id' => 'Motivo ID',
            'motivo_nombre' => 'Motivo Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['motivo_id' => 'motivo_id']);
    }
}
