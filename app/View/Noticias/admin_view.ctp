<div class="noticias view">
    <h2><?php echo __('Noticia'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Redator'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['redator']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fotografo'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['fotografo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Titulo'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['titulo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Texto Resumo'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['texto_resumo']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Texto'); ?></dt>
        <dd>
            <div id="area-materia"><p><?php echo $noticia['Noticia']['texto']; ?></p></div>
            &nbsp;
        </dd>
        <dt><?php echo __('Imagem Miniatura'); ?></dt>
        <dd>
            <?php if ($noticia['Noticia']['created'] < "2013-11-01 00:00:00") { ?>
                <?php echo $this->Utils->imagemMidia($noticia['ImagemMiniatura'], array('height' => '290')); ?>
            <?php } else { ?>
                <?php
                if (!empty($noticia['ImagemGrande'])): echo $this->Html->image('/' .MIDIA_URI . '/' .$noticia['ImagemGrande']['pasta'] . '/' .$noticia['ImagemGrande']['id'] . '_' . $this->Time->format('d', $noticia['ImagemGrande']['created']) . $this->Time->format('m', $noticia['ImagemGrande']['created']) . $this->Time->format('Y', $noticia['ImagemGrande']['created']) . '_326x290.jpg');
                endif;
                ?>
            <?php } ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Imagem Grande'); ?></dt>
        <dd>
            <?php echo $this->Html->link($noticia['ImagemGrande']['id'], array('controller' => 'midias', 'action' => 'view', $noticia['ImagemGrande']['id'], 'plugin' => 'midias')); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Posicao'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['posicao']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Data Inicial'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['data_inicial']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Data Final'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['data_final']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Criado'); ?></dt>
        <dd>
            <?php echo $this->Time->format($noticia['Noticia']['created'], '%d/%m/%y'); ?>
            <br/>
            <?php echo $this->Time->format($noticia['Noticia']['created'], '%H:%M'); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Publicar'); ?></dt>
        <dd>
            <?php
            if ($noticia['Noticia']['publicar']) {
                echo 'Sim';
            } else {
                echo 'Não';
            }
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Editado'); ?></dt>
        <dd>
            <?php echo $this->Time->format($noticia['Noticia']['modified'], '%d/%m/%y'); ?>
            <br/>
            <?php echo $this->Time->format($noticia['Noticia']['modified'], '%H:%M'); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Tags'); ?></dt>
        <dd>
            <?php echo h($noticia['Noticia']['tags']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Usuario'); ?></dt>
        <dd>
            <?php echo $this->Html->link($noticia['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $noticia['Usuario']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Galeria'); ?></dt>
        <dd>
            <?php echo $this->Html->link($noticia['Galeria']['id'], array('controller' => 'midias_galerias', 'action' => 'view', $noticia['Galeria']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Ações'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Editar Noticia'), array('action' => 'edit', $noticia['Noticia']['id'])); ?> </li>
        <?php if ($this->Session->read('Auth.User.grupo_id') == '1') { ?>
            <li><?php echo $this->Form->postLink(__('Excluir Noticia'), array('action' => 'delete', $noticia['Noticia']['id']), null, __('Tem certeza de que deseja excluir a notícia # %s?', $noticia['Noticia']['id'])); ?> </li>
        <?php } ?>
        <li><?php echo $this->Html->link(__('Listar Notícias'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Notícia'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Mídias'), array('controller' => 'midias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Mídia'), array('controller' => 'midias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Galerias'), array('controller' => 'midias_galerias', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Galeria'), array('controller' => 'midias_galerias', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('Listar Secretarias'), array('controller' => 'orgaos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Nova Secretaria'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Secretarias Relacionadas'); ?></h3>
    <?php if (!empty($noticia['Orgao'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Nome'); ?></th>
                <th><?php echo __('Nome Responsavel'); ?></th>
                <th><?php echo __('Cargo Responsavel'); ?></th>
                <th><?php echo __('Email Responsavel'); ?></th>
                <th><?php echo __('Telefone Responsavel'); ?></th>
                <th class="actions"><?php echo __('Ações'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($noticia['Orgao'] as $orgao):
                ?>
                <tr>
                    <td><?php echo $orgao['nome']; ?></td>
                    <td><?php echo $orgao['nome_responsavel']; ?></td>
                    <td><?php echo $orgao['cargo_responsavel']; ?></td>
                    <td><?php echo $orgao['email_responsavel']; ?></td>
                    <td><?php echo $orgao['telefone_responsavel']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Visualizar'), array('controller' => 'orgaos', 'action' => 'view', $orgao['id'])); ?>
                        <?php echo $this->Html->link(__('Editar'), array('controller' => 'orgaos', 'action' => 'edit', $orgao['id'])); ?>
                        <?php if ($this->Session->read('Auth.User.grupo_id') == '1') { ?>
                            <?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'orgaos', 'action' => 'delete', $orgao['id']), null, __('Tem certeza de que deseja excluir a secretaria # %s?', $orgao['nome'])); ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Nova Secretaria'), array('controller' => 'orgaos', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
