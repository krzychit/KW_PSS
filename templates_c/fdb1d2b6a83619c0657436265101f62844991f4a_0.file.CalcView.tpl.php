<?php
/* Smarty version 4.5.2, created on 2024-04-30 16:26:28
  from 'C:\Users\Maja\Desktop\PSS\XAMPP\htdocs\php_pss_kalkulator\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6630ff94b99354_74153964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdb1d2b6a83619c0657436265101f62844991f4a' => 
    array (
      0 => 'C:\\Users\\Maja\\Desktop\\PSS\\XAMPP\\htdocs\\php_pss_kalkulator\\app\\views\\CalcView.tpl',
      1 => 1714469508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6630ff94b99354_74153964 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15470796736630ff94b7e6c5_43167631', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10038815376630ff94b7f435_55118517', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_15470796736630ff94b7e6c5_43167631 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_15470796736630ff94b7e6c5_43167631',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 zrobic stala stopke <?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_10038815376630ff94b7f435_55118517 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10038815376630ff94b7f435_55118517',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_x">Liczba 1: </label>
			<input id="id_x" type="text" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
" />
		</div>
        <div class="pure-control-group">
			<label for="id_op">Operacja: </label>
			<select name="op">
				<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->op_name))) {?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
				<option value="" disabled="true">---</option>
				<?php }?>
				<option value="plus">+</option>
				<option value="minus">-</option>
				<option value="times">*</option>
				<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
				<option value="div">/</option>
				<?php }?>
			</select>
		</div>
        <div class="pure-control-group">
			<label for="id_y">Liczba 2: </label>
			<input id="id_y" type="text" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	


<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCreditCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
            <div class="pure-control-group">
                <label for="kk">Kwota kredytu</label>
                <input id="kk" type="text" placeholder="Kwota kredytu" name="kk" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kk;?>
">					
                <label for="il">Liczba lat</label>
                <input id="il" type="text" placeholder="Liczba lat" name="il" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->il;?>
">
                <label for="opr">Oprocentowanie</label>
                <input id="opr" type="text" placeholder="Oprocentowanie" name="opr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->opr;?>
">
                <button type="submit" class="pure-button">Oblicz miesieczna rate</button>
            </div>
        </fieldset>
</form>
    
<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
<div class="messages inf">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['resmr']->value->resultmr))) {?>
<div class="messages inf">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['resmr']->value->resultmr;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
