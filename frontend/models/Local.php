<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "local".
 *
 * @property integer $local_id
 * @property string $local_nombre
 *
 * @property Solicitud[] $solicituds
 */
class Local extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['local_id', 'local_nombre'], 'required'],
            [['local_id'], 'integer'],
            [['local_nombre'], 'string', 'max' => 10],
            [['local_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'local_id' => 'Local ID',
            'local_nombre' => 'Local Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['local_id' => 'local_id']);
    }
}
