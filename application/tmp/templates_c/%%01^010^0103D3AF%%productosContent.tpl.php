<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos/productosContent.tpl */ ?>
<div id="subMenuProduct">
<?php if ($this->_tpl_vars['fail'] == 'true'): ?>
	<h1>PRODUCTOS:</h1>
    <div class="scrollPane">
        <ul>
        <?php unset($this->_sections['pro']);
$this->_sections['pro']['name'] = 'pro';
$this->_sections['pro']['loop'] = is_array($_loop=$this->_tpl_vars['producto']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pro']['show'] = true;
$this->_sections['pro']['max'] = $this->_sections['pro']['loop'];
$this->_sections['pro']['step'] = 1;
$this->_sections['pro']['start'] = $this->_sections['pro']['step'] > 0 ? 0 : $this->_sections['pro']['loop']-1;
if ($this->_sections['pro']['show']) {
    $this->_sections['pro']['total'] = $this->_sections['pro']['loop'];
    if ($this->_sections['pro']['total'] == 0)
        $this->_sections['pro']['show'] = false;
} else
    $this->_sections['pro']['total'] = 0;
if ($this->_sections['pro']['show']):

            for ($this->_sections['pro']['index'] = $this->_sections['pro']['start'], $this->_sections['pro']['iteration'] = 1;
                 $this->_sections['pro']['iteration'] <= $this->_sections['pro']['total'];
                 $this->_sections['pro']['index'] += $this->_sections['pro']['step'], $this->_sections['pro']['iteration']++):
$this->_sections['pro']['rownum'] = $this->_sections['pro']['iteration'];
$this->_sections['pro']['index_prev'] = $this->_sections['pro']['index'] - $this->_sections['pro']['step'];
$this->_sections['pro']['index_next'] = $this->_sections['pro']['index'] + $this->_sections['pro']['step'];
$this->_sections['pro']['first']      = ($this->_sections['pro']['iteration'] == 1);
$this->_sections['pro']['last']       = ($this->_sections['pro']['iteration'] == $this->_sections['pro']['total']);
?>
            <li><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['producto'][$this->_sections['pro']['index']]['key']; ?>
/modelos/1" <?php if ($this->_tpl_vars['css'] == $this->_tpl_vars['producto'][$this->_sections['pro']['index']]['key']): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['producto'][$this->_sections['pro']['index']]['nombre']; ?>
</a></li>
        <?php endfor; endif; ?>
        </ul>
    </div>
<?php else: ?>
<h1><?php echo $this->_tpl_vars['alert']; ?>
</h1>
<?php endif; ?>
</div>
<div id="contentImgProducto">
	<ul class="clearfix">
   <?php $_from = $this->_tpl_vars['modelos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['model']):
?>
   		<?php if ($this->_tpl_vars['model']->imagen_frente_chica != ''): ?>
    	<li><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['css']; ?>
/detalle-modelo/<?php echo $this->_tpl_vars['model']->key; ?>
" rel="shadowbox; width=884px; height=560px;" class="tamaImg"><img src="<?php echo $this->_tpl_vars['model']->imagen_default; ?>
" alt="" /></a> 
        	<a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['css']; ?>
/detalle-modelo/<?php echo $this->_tpl_vars['model']->key; ?>
" rel="shadowbox; width=884px; height=560px;"><?php echo $this->_tpl_vars['model']->nombre; ?>
</a></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['css']; ?>
/detalle-modelo/<?php echo $this->_tpl_vars['model']->key; ?>
" rel="shadowbox; width=884px; height=560px;" class="tamaImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/slides.png" title="No se encontro la imagen" /></a> 
        	<a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['css']; ?>
/detalle-modelo/<?php echo $this->_tpl_vars['model']->key; ?>
" rel="shadowbox; width=884px; height=560px;"><?php echo $this->_tpl_vars['model']->nombre; ?>
</a></li>
        <?php endif; ?>
   <?php endforeach; endif; unset($_from); ?>
    </ul>
    <div id="navigation" class="spaceTop"><input name="models" type="hidden" value="<?php echo $this->_tpl_vars['css']; ?>
" id="models"/>
    	<ul class="clearfix">
        	<?php echo $this->_tpl_vars['pageControl']; ?>

        </ul>
    </div>
</div>







