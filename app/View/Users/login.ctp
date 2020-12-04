<div id="content-geral"><h2>Login</h2>
    <?php
    echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
    echo $this->Form->input('username', array('label' => 'Usuário'));
    echo $this->Form->input('password', array('label' => 'Senha'));
    echo $this->Form->end('Entrar');
    ?>
</div>