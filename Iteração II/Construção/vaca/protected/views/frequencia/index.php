<?php
/* @var $this FrequenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Frequencias',
);

$this->menu=array(
	array('label'=>'Create Frequencia', 'url'=>array('create')),
	array('label'=>'Manage Frequencia', 'url'=>array('admin')),
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
