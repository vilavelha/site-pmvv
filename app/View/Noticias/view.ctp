<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
//echo $this->Html->meta(array('property' => 'og:url', 'content' => $this->request->here()), array('inline' => false));
if (!empty($noticia['ImagemGrande']['id'])){
	$imageShare = 'https://www.vilavelha.es.gov.br/' .MIDIA_URI . '/' .$noticia['ImagemGrande']['pasta'] . '/' .$noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_326x290.jpg';
}else{
	$imageShare = '';
}



echo $this->Html->meta(null, null, array('property' => 'og:url', 'content' => 'https://www.vilavelha.es.gov.br'.$this->request->here(), 'inline' => false));
echo $this->Html->meta(null, null, array('property' => 'og:type', 'content' => 'website', 'inline' => false));
echo $this->Html->meta(null, null, array('property' => 'og:title', 'content' => $noticia['Noticia']['titulo'], 'inline' => false));
echo $this->Html->meta(null, null, array('property' => 'og:description', 'content' => $noticia['Noticia']['texto_resumo'], 'inline' => false));
echo $this->Html->meta(null, null, array('property' => 'og:image', 'content' => $imageShare, 'inline' => false));
?>
<div class="container" style="padding-top: 20px;clear:both">
	<div clas="row">
		<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 area-noticia">
			<?php
				if (!empty($noticia['ImagemGrande'])): echo $this->Html->image('https://www.vilavelha.es.gov.br/' .MIDIA_URI . '/' .$noticia['ImagemGrande']['pasta'] . '/' .$noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_900x500.jpg', array('class' => 'img-responsive'));
				endif;
			?>
			<h3>
				<b><?php echo h($noticia['Noticia']['titulo']);?></b>
			</h3>
			<hr />
			<h5>
				De:
				<?php
				$j = 0;
				foreach ($noticia['Orgao'] as $orgao):
				    if ($j != (count($noticia['Orgao']) - 1)) {
				        echo '<b>Secretaria de '.$orgao['nome'] . '</b>, ';
				    } else {
				        echo '<b>Secretaria de '.$orgao['nome'].'</b>';
				    }
				    $j++;
				endforeach;
				?>
			</h5>
			<h6>Texto: <b><?php echo $noticia['Noticia']['redator']; ?></b>| Foto: <b><?php echo $noticia['ImagemGrande']['autor']; ?></b></h6>
			<h6>Criado: <b><?php echo $this->Time->format('d', $noticia['Noticia']['created']) . ' de ' . $meses[$this->Time->format('n', $noticia['Noticia']['created'])] . ' de ' . $this->Time->format('Y', $noticia['Noticia']['created']); ?></b></h6>
			<br/>
			<?php echo $noticia['Noticia']['texto'];?>
			<br/><br/><br/>
	  		<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-share-button" data-href="<?php echo $this->request->here(); ?>" data-layout="button_count"></div>
			<a href="https://api.whatsapp.com/send?text=<?php echo 'https://www.vilavelha.es.gov.br'.$this->request->here();?>" data-action="share/whatsapp/share"><?php echo $this->Html->image('WhatsApp-icon.png', array('width' => '28'));?></a>
			<a class="twitter-share-button"
				target="_blank"
				href="http://twitter.com/share?text=<?php echo h($noticia['Noticia']['titulo']);?>&url=<?php echo 'https://www.vilavelha.es.gov.br'.$this->request->here();?>&hashtags=vilavelha,pmvv"
				data-size="large"
				data-via="twitterdev"
				data-related="twitterapi,twitter">
				<?php echo $this->Html->image('twitter-logo.png', array('width' => '62'));?>
			</a>
		</div>
		<!-- barra prefeito + servicos direita inicio -->
		<div class="col-lg-4 col-sm-12 btn-group">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->element('agenda_prefeito');?>
					<?php echo $this->element('lateral_servicos');?>
				</div>
			</div>
			<div class="divisor-20"></div>
			<div class="col-md-12 atalhos-coluna-direita">
				<?php echo $this->element('programacoes');?>
				<?php //echo $this->element('youtube');?>
			</div>
		</div>
		<!-- barra prefeito + servicos direita fim -->
	</div>
</div>
