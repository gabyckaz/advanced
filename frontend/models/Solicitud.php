<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $local_id
 * @property integer $hora_id
 * @property integer $motivo_id
 * @property integer $dia_id
 * @property integer $materia_id
 * @property string $solicitante
 * @property string $solicitud_estado
 * @property integer $solicitud_id
 * @property string $mensaje
 *
 * @property Dia $dia
 * @property Hora $hora
 * @property Local $local
 * @property Materia $materia
 * @property Motivo $motivo
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['local_id', 'hora_id', 'motivo_id', 'dia_id', 'materia_id'], 'integer'],
            [['solicitante', 'solicitud_estado'], 'required'],
            [['mensaje'], 'string'],
            [['solicitante'], 'string', 'max' => 50],
            [['solicitud_estado'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'local_id' => 'Local ',
            'hora_id' => 'Hora ',
            'motivo_id' => 'Motivo ',
            'dia_id' => 'Dia ',
            'materia_id' => 'Materia ',
            'solicitante' => 'Solicitante',
            'solicitud_estado' => 'Solicitud Estado',
            'solicitud_id' => 'Solicitud ID',
            'mensaje' => 'Mensaje',
            'docente_id'=>'Docente id'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDia()
    {
        return $this->hasOne(Dia::className(), ['dia_id' => 'dia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHora()
    {
        return $this->hasOne(Hora::className(), ['hora_id' => 'hora_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(Local::className(), ['local_id' => 'local_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['materia_id' => 'materia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivo()
    {
        return $this->hasOne(Motivo::className(), ['motivo_id' => 'motivo_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getDocente()
    {
        return $this->hasOne(Motivo::className(), ['docente_id' => 'docente_id']);
    }
*/
}
