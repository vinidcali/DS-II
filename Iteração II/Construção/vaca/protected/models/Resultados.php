<?php

/**
 * This is the model class for table "Resultados".
 *
 * The followings are the available columns in table 'Resultados':
 * @property integer $id
 * @property double $nota
 * @property integer $aval_id
 * @property integer $aluno_id
 *
 * The followings are the available model relations:
 * @property Avaliacao $aval
 * @property Aluno $aluno
 */
class Resultados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Resultados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aval_id, aluno_id', 'required'),
			array('aval_id, aluno_id', 'numerical', 'integerOnly'=>true),
			array('nota', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nota, aval_id, aluno_id', 'safe', 'on'=>'search'),
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
			'aval' => array(self::BELONGS_TO, 'Avaliacao', 'aval_id'),
			'aluno' => array(self::BELONGS_TO, 'Aluno', 'aluno_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nota' => 'Nota',
			'aval_id' => 'Aval',
			'aluno_id' => 'Aluno',
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
		$criteria->compare('nota',$this->nota);
		$criteria->compare('aval_id',$this->aval_id);
		$criteria->compare('aluno_id',$this->aluno_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resultados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
