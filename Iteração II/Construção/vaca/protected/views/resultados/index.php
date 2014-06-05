<?php
/* @var $this ResultadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Resultados',
);

?>

<h1>Resultados</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resultados-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'nota',
		'aluno.pessoa.nome',
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
