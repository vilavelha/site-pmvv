<?php
/**
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Pages
* @since         CakePHP(tm) v 0.10.0.1076
*/
?>
<div class="container" style="padding-top: 20px;clear:both">
	<section class="team">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h6 class="description">VÍDEOS</h6>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p><b>ID: </b><?php echo h($video['Video']['id']); ?></p>
			&nbsp;
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p><b>Titulo: </b><?php echo h($video['Video']['titulo']); ?></p>
			&nbsp;
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p><b>Link: </b><?php echo h($video['Video']['link']); ?></p>
			&nbsp;
		</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<p><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo h($video['Video']['link']); ?>?rel=0" frameborder="0" allowfullscreen></iframe></p>	        
		</div>
		<div clas="row">
			<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 text-center">
				<div class="pagination pagination-large">
		    		<ul class="pagination">
						<?php
						    /*$this->Paginator->options(array(
							  'url' => 
							  	array('controller' => 'noticias', 'action' => $this->params['ano'].'/'.$this->params['mes'])
							));*/
			                echo $this->Paginator->prev('anterior', array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			                echo $this->Paginator->numbers(array('separator' => '', 'ellipsis' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
			                echo $this->Paginator->next('próxima', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			            ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>