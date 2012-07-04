<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos/listadoProductosContent.tpl */ ?>

<ul class="clearfix">
<?php unset($this->_sections['producto']);
$this->_sections['producto']['name'] = 'producto';
$this->_sections['producto']['loop'] = is_array($_loop=$this->_tpl_vars['productos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['producto']['show'] = true;
$this->_sections['producto']['max'] = $this->_sections['producto']['loop'];
$this->_sections['producto']['step'] = 1;
$this->_sections['producto']['start'] = $this->_sections['producto']['step'] > 0 ? 0 : $this->_sections['producto']['loop']-1;
if ($this->_sections['producto']['show']) {
    $this->_sections['producto']['total'] = $this->_sections['producto']['loop'];
    if ($this->_sections['producto']['total'] == 0)
        $this->_sections['producto']['show'] = false;
} else
    $this->_sections['producto']['total'] = 0;
if ($this->_sections['producto']['show']):

            for ($this->_sections['producto']['index'] = $this->_sections['producto']['start'], $this->_sections['producto']['iteration'] = 1;
                 $this->_sections['producto']['iteration'] <= $this->_sections['producto']['total'];
                 $this->_sections['producto']['index'] += $this->_sections['producto']['step'], $this->_sections['producto']['iteration']++):
$this->_sections['producto']['rownum'] = $this->_sections['producto']['iteration'];
$this->_sections['producto']['index_prev'] = $this->_sections['producto']['index'] - $this->_sections['producto']['step'];
$this->_sections['producto']['index_next'] = $this->_sections['producto']['index'] + $this->_sections['producto']['step'];
$this->_sections['producto']['first']      = ($this->_sections['producto']['iteration'] == 1);
$this->_sections['producto']['last']       = ($this->_sections['producto']['iteration'] == $this->_sections['producto']['total']);
?>
<li><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['key_producto']; ?>
/detalle-modelo/<?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['key']; ?>
" rel="shadowbox; width=884px; height=560px;"><img alt="" src="<?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['url']; ?>
"> <?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['nombre']; ?>
 </a></li>
<?php endfor; endif; ?>  
</ul>