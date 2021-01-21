<?php /* Smarty version 2.6.18, created on 2020-11-29 03:00:41
         compiled from affiliate-access.html */ ?>
<?php if ($this->_tpl_vars['infomessage']): ?>
  <!-- TODO: display confirmation if a new user was added or invitation has been sent or password reset e-mail has been sent -->
  <div class='infomessage'>
    <?php echo $this->_tpl_vars['infomessage']; ?>

  </div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user-access.html", 'smarty_include_vars' => array('users' => $this->_tpl_vars['users'],'linkUrl' => $this->_tpl_vars['linkAffiliateUrl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>