<?php

/**
 * This is the model class for table "Avaliacao".
 *
 * The followings are the available columns in table 'Avaliacao':
 * @property integer $id
 * @property string $nome
 * @property double $peso
 * @property integer $etapa_id
 * @property integer $aula_id
 *
 * The followings are the available model relations:
 * @property Etapa $etapa
 * @property Aula $aula
 * @property Resultados[] $resultadoses
 */
class Avaliacao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Avaliacao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, etapa_id', 'required'),
			array('etapa_id, aula_id', 'numerical', 'integerOnly'=>true),
			array('peso', 'numerical'),
			array('nome', 'length', 'max'=>30),
		//	array('aula_id'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, peso, etapa_id, aula_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'etapa' => array(self::BELONGS_TO, 'Etapa', 'etapa_id'),
			'aula' => array(self::BELONGS_TO, 'Aula', 'aula_id'),
			'resultadoses' => array(self::HAS_MANY, 'Resultados', 'aval_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'peso' => 'Peso',
			'etapa_id' => 'Etapa',
			'aula_id' => 'Aula',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('etapa_id',$this->etapa_id);
		$criteria->compare('aula_id',$this->aula_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Avaliacao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
