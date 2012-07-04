<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from puntos-ventas/puntosVentasContent.tpl */ ?>
<div id="contentPuntosVenta" class="clearfix">
	<div id="imgPuntos"><img src="images/puntoVenta/img-puntos-venta.png"  height="436" alt="" /></div>
	<div id="textPuntos" class="clearfix">
        <!--<div class="tiendas">
            <h1>Tiendas</h1>
            <ul>
            <?php unset($this->_sections['tienda']);
$this->_sections['tienda']['name'] = 'tienda';
$this->_sections['tienda']['loop'] = is_array($_loop=$this->_tpl_vars['go']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tienda']['show'] = true;
$this->_sections['tienda']['max'] = $this->_sections['tienda']['loop'];
$this->_sections['tienda']['step'] = 1;
$this->_sections['tienda']['start'] = $this->_sections['tienda']['step'] > 0 ? 0 : $this->_sections['tienda']['loop']-1;
if ($this->_sections['tienda']['show']) {
    $this->_sections['tienda']['total'] = $this->_sections['tienda']['loop'];
    if ($this->_sections['tienda']['total'] == 0)
        $this->_sections['tienda']['show'] = false;
} else
    $this->_sections['tienda']['total'] = 0;
if ($this->_sections['tienda']['show']):

            for ($this->_sections['tienda']['index'] = $this->_sections['tienda']['start'], $this->_sections['tienda']['iteration'] = 1;
                 $this->_sections['tienda']['iteration'] <= $this->_sections['tienda']['total'];
                 $this->_sections['tienda']['index'] += $this->_sections['tienda']['step'], $this->_sections['tienda']['iteration']++):
$this->_sections['tienda']['rownum'] = $this->_sections['tienda']['iteration'];
$this->_sections['tienda']['index_prev'] = $this->_sections['tienda']['index'] - $this->_sections['tienda']['step'];
$this->_sections['tienda']['index_next'] = $this->_sections['tienda']['index'] + $this->_sections['tienda']['step'];
$this->_sections['tienda']['first']      = ($this->_sections['tienda']['iteration'] == 1);
$this->_sections['tienda']['last']       = ($this->_sections['tienda']['iteration'] == $this->_sections['tienda']['total']);
?>
                <li><a href="#" title="<?php echo $this->_tpl_vars['go'][$this->_sections['tienda']['index']]['descripcion']; ?>
"><?php echo $this->_tpl_vars['go'][$this->_sections['tienda']['index']]['titulo']; ?>
</a></li>
              <?php endfor; endif; ?>
            </ul>
        </div>-->
        <div class="tiendas espacioRight">
            <h1>Tiendas Porta</h1>
            <ul>
            <?php unset($this->_sections['cc']);
$this->_sections['cc']['name'] = 'cc';
$this->_sections['cc']['loop'] = is_array($_loop=$this->_tpl_vars['yo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cc']['show'] = true;
$this->_sections['cc']['max'] = $this->_sections['cc']['loop'];
$this->_sections['cc']['step'] = 1;
$this->_sections['cc']['start'] = $this->_sections['cc']['step'] > 0 ? 0 : $this->_sections['cc']['loop']-1;
if ($this->_sections['cc']['show']) {
    $this->_sections['cc']['total'] = $this->_sections['cc']['loop'];
    if ($this->_sections['cc']['total'] == 0)
        $this->_sections['cc']['show'] = false;
} else
    $this->_sections['cc']['total'] = 0;
if ($this->_sections['cc']['show']):

            for ($this->_sections['cc']['index'] = $this->_sections['cc']['start'], $this->_sections['cc']['iteration'] = 1;
                 $this->_sections['cc']['iteration'] <= $this->_sections['cc']['total'];
                 $this->_sections['cc']['index'] += $this->_sections['cc']['step'], $this->_sections['cc']['iteration']++):
$this->_sections['cc']['rownum'] = $this->_sections['cc']['iteration'];
$this->_sections['cc']['index_prev'] = $this->_sections['cc']['index'] - $this->_sections['cc']['step'];
$this->_sections['cc']['index_next'] = $this->_sections['cc']['index'] + $this->_sections['cc']['step'];
$this->_sections['cc']['first']      = ($this->_sections['cc']['iteration'] == 1);
$this->_sections['cc']['last']       = ($this->_sections['cc']['iteration'] == $this->_sections['cc']['total']);
?>
                <li><a href="#" title=""><?php echo $this->_tpl_vars['yo'][$this->_sections['cc']['index']]['titulo']; ?>
</a>
                	<div class="contentTooltip">
                    	<?php echo $this->_tpl_vars['yo'][$this->_sections['cc']['index']]['descripcion']; ?>

                        <div class="flecha"></div>
                    </div>
                </li>
            <?php endfor; endif; ?>
            </ul>
        </div>
        <div class="tiendas tamanoUl">
            <h1>Tiendas Provincia</h1>
            <ul>
                <?php unset($this->_sections['provincia']);
$this->_sections['provincia']['name'] = 'provincia';
$this->_sections['provincia']['loop'] = is_array($_loop=$this->_tpl_vars['prov']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['provincia']['show'] = true;
$this->_sections['provincia']['max'] = $this->_sections['provincia']['loop'];
$this->_sections['provincia']['step'] = 1;
$this->_sections['provincia']['start'] = $this->_sections['provincia']['step'] > 0 ? 0 : $this->_sections['provincia']['loop']-1;
if ($this->_sections['provincia']['show']) {
    $this->_sections['provincia']['total'] = $this->_sections['provincia']['loop'];
    if ($this->_sections['provincia']['total'] == 0)
        $this->_sections['provincia']['show'] = false;
} else
    $this->_sections['provincia']['total'] = 0;
if ($this->_sections['provincia']['show']):

            for ($this->_sections['provincia']['index'] = $this->_sections['provincia']['start'], $this->_sections['provincia']['iteration'] = 1;
                 $this->_sections['provincia']['iteration'] <= $this->_sections['provincia']['total'];
                 $this->_sections['provincia']['index'] += $this->_sections['provincia']['step'], $this->_sections['provincia']['iteration']++):
$this->_sections['provincia']['rownum'] = $this->_sections['provincia']['iteration'];
$this->_sections['provincia']['index_prev'] = $this->_sections['provincia']['index'] - $this->_sections['provincia']['step'];
$this->_sections['provincia']['index_next'] = $this->_sections['provincia']['index'] + $this->_sections['provincia']['step'];
$this->_sections['provincia']['first']      = ($this->_sections['provincia']['iteration'] == 1);
$this->_sections['provincia']['last']       = ($this->_sections['provincia']['iteration'] == $this->_sections['provincia']['total']);
?>
                <li><a href="#" title=""><?php echo $this->_tpl_vars['prov'][$this->_sections['provincia']['index']]['titulo']; ?>
</a>
                	<div class="contentTooltip">
                    	<?php echo $this->_tpl_vars['prov'][$this->_sections['provincia']['index']]['descripcion']; ?>

                        <div class="flecha"></div>
                    </div>
                </li>
                <?php endfor; endif; ?>
            </ul>
        </div>	
        <!--<div class="clearer"></div>
        <div class="col one"></div>
        <div class="col two"></div>
        <div class="col three"></div>-->
    </div>
    
    <div id="logosPuntos" class="clearfix">
    	<ul>
        <?php unset($this->_sections['tienda']);
$this->_sections['tienda']['name'] = 'tienda';
$this->_sections['tienda']['loop'] = is_array($_loop=$this->_tpl_vars['go']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tienda']['show'] = true;
$this->_sections['tienda']['max'] = $this->_sections['tienda']['loop'];
$this->_sections['tienda']['step'] = 1;
$this->_sections['tienda']['start'] = $this->_sections['tienda']['step'] > 0 ? 0 : $this->_sections['tienda']['loop']-1;
if ($this->_sections['tienda']['show']) {
    $this->_sections['tienda']['total'] = $this->_sections['tienda']['loop'];
    if ($this->_sections['tienda']['total'] == 0)
        $this->_sections['tienda']['show'] = false;
} else
    $this->_sections['tienda']['total'] = 0;
if ($this->_sections['tienda']['show']):

            for ($this->_sections['tienda']['index'] = $this->_sections['tienda']['start'], $this->_sections['tienda']['iteration'] = 1;
                 $this->_sections['tienda']['iteration'] <= $this->_sections['tienda']['total'];
                 $this->_sections['tienda']['index'] += $this->_sections['tienda']['step'], $this->_sections['tienda']['iteration']++):
$this->_sections['tienda']['rownum'] = $this->_sections['tienda']['iteration'];
$this->_sections['tienda']['index_prev'] = $this->_sections['tienda']['index'] - $this->_sections['tienda']['step'];
$this->_sections['tienda']['index_next'] = $this->_sections['tienda']['index'] + $this->_sections['tienda']['step'];
$this->_sections['tienda']['first']      = ($this->_sections['tienda']['iteration'] == 1);
$this->_sections['tienda']['last']       = ($this->_sections['tienda']['iteration'] == $this->_sections['tienda']['total']);
?>
        	<li><?php if ($this->_tpl_vars['go'][$this->_sections['tienda']['index']]['url_imagen'] != ''): ?><a href=""><img src="<?php echo $this->_tpl_vars['go'][$this->_sections['tienda']['index']]['url_imagen']; ?>
" alt="" /></a><?php endif; ?>
            	<div class="contentTooltip">
                   <?php echo $this->_tpl_vars['go'][$this->_sections['tienda']['index']]['descripcion']; ?>

                    <div class="flecha"></div>
                </div>
            </li>
        <?php endfor; endif; ?>
        </ul>    
    </div>
    
    </div>
    
    