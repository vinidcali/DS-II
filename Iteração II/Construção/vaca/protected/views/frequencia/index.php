<?php
/* @var $this FrequenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Frequencias',
);
?>

<h1>Frequencias</h1>

<?php  
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'frequencia-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'aluno.pessoa.nome',
		'presente',
		 array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'buttons' => array(
                            'update' => array(
                                       //'click'=>'js: function(){alert("oi");}',
                            ),
        	),
    	),
		
	),
));
 ?>
