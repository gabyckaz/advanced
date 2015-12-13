<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Solicitud;

/**
 * SolicitudSearch represents the model behind the search form about `frontend\models\Solicitud`.
 */
class SolicitudSearch extends Solicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'solicitud_id'], 'integer'],
            [['solicitante', 'local_id','hora_id', 'motivo_id', 'dia_id', 'materia_id', 'solicitud_estado'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Solicitud::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            return $dataProvider;
        }


        $query->joinWith('motivo');
          $query->joinWith('local');
            $query->joinWith('hora');
              $query->joinWith('dia');
                $query->joinWith('materia');
        
        $query->andFilterWhere([
         
            'solicitud_id' => $this->solicitud_id,
        ]);

        $query->andFilterWhere(['like', 'solicitante', $this->solicitante])
            ->andFilterWhere(['like', 'solicitud_estado', $this->solicitud_estado])
            ->andFilterWhere(['ilike', 'motivo.motivo_nombre', $this->motivo_id])
             ->andFilterWhere(['ilike', 'local.local_nombre', $this->local_id])
            ->andFilterWhere(['ilike', 'hora.hora_nombre', $this->hora_id])
            ->andFilterWhere(['ilike', 'dia.dia_nombre', $this->dia_id])
            ->andFilterWhere(['ilike', 'materia.materia_nombre', $this->materia_id]);

        return $dataProvider;
    }
}
