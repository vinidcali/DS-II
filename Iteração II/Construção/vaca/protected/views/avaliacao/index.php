<?php
/* @var $this AvaliacaoController */
/* @var $dataProvider CActiveDataProvider */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/scripts.js');
$this->breadcrumbs=array(                   
	'Avaliações',
);

$this->menu=array(
	array('label'=>'Criar Avaliação', 'url'=>array('create')),
);
?>

<h1>Avaliações</h1>

<?php  
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'avaliacao-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'nome',
		'peso',
		'aula.dataHora:text:Aula',
		 array(
            'class' => 'CButtonColumn',
            'template' => '{notas}',
            'header' => 'Notas',
            'buttons' => array(
                            'notas' => array(
                                       'label' => 'Notas',
                                       'url' => '"index.php?r=resultados/index&id=$data->id"',
                                //       'click'=>'abreFreq(this)',
                            ),
        	),
    	),
		 array(
            'class' => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons' => array(
                            'delete' => array(
                                              'visible'=>'function($data) {
                                                $contador = 0;
                                                foreach($data->resultadoses as $res) {
                                                  if ($res.nota > 0) $contador++;
                                                }
                                                return $contador>0?true:false;
                                              }',
                                       //'click'=>'js: function(){alert("oi");}',
                            ),
        	),
    	),
		
	),
));
?>
