<?php /* Smarty version 2.6.18, created on 2020-12-16 16:30:33
         compiled from options/statscolumns.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', 'options/statscolumns.html', 10, false),array('modifier', 'escape', 'options/statscolumns.html', 48, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['aItem']['rows'] )): ?>
<tr>
  <td>
    &nbsp;
  </td>
  <td colspan='3'>
    <table>
      <tr>
        <td>
          <b><?php echo OA_Admin_Template::_function_t(array('str' => 'ColumnName'), $this);?>
</b>
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          <b><?php echo OA_Admin_Template::_function_t(array('str' => 'ShowColumn'), $this);?>
</b>
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          <b><?php echo OA_Admin_Template::_function_t(array('str' => 'CustomColumnName'), $this);?>
</b>
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          <b><?php echo OA_Admin_Template::_function_t(array('str' => 'ColumnRank'), $this);?>
</b>
        </td>
      </tr>
      <?php $_from = $this->_tpl_vars['aItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['aColumnArrays']):
?>
        <?php if ($this->_tpl_vars['row'] == 'rows'): ?>
          <?php $_from = $this->_tpl_vars['aColumnArrays']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aColumnArray']):
?>
          <tr>
            <td>
              <label for='<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
'><?php echo $this->_tpl_vars['aColumnArray']['text']; ?>
</label>
            </td>
            <td>
              &nbsp;
            </td>
            <td id='cell_<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
'>
              <input type='checkbox' name='<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
' id='<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
' value='true' <?php if ($this->_tpl_vars['aColumnArray']['value']): ?>checked='checked'<?php endif; ?> <?php if ($this->_tpl_vars['aColumnArray']['disabled']): ?>disabled='disabled' <?php else: ?> onClick='phpAds_refreshEnabled();' <?php endif; ?>  tabindex='<?php echo $this->_tpl_vars['aItem']['tabindex']++; ?>
'>
            </td>
            <td>
              &nbsp;
            </td>
            <td id='cell_<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
_label'>
              <input type='text' size='10' name='<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
_label' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['aColumnArray']['label_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" <?php if ($this->_tpl_vars['aColumnArray']['disabled']): ?>disabled='disabled'<?php endif; ?> tabindex='<?php echo $this->_tpl_vars['aItem']['tabindex']++; ?>
'>
            </td>
            <td>
              &nbsp;
            </td>
            <td id='cell_<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
_rank'>
              <input onBlur='max_formValidateElement(this);' type='text' size='10' name='<?php echo $this->_tpl_vars['aColumnArray']['name']; ?>
_rank' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['aColumnArray']['rank_value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" <?php if ($this->_tpl_vars['aColumnArray']['disabled']): ?>disabled='disabled'<?php endif; ?> tabindex='<?php echo $this->_tpl_vars['aItem']['tabindex']++; ?>
'>
            </td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
    </table>
  </td>
</tr>
<?php endif; ?>