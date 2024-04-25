<?php
/* Smarty version 4.5.2, created on 2024-04-26 00:48:52
  from 'C:\Users\Maja\Desktop\PSS\XAMPP\htdocs\php_pss_kalkulator\app\calc\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_662addd4e29731_88251913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3d45bc9386b8f4f5033da84e4ea3f672d17042d' => 
    array (
      0 => 'C:\\Users\\Maja\\Desktop\\PSS\\XAMPP\\htdocs\\php_pss_kalkulator\\app\\calc\\CalcView.html',
      1 => 1714085327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662addd4e29731_88251913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1251970682662addd4e00322_39850315', 'footer');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_910068291662addd4e020d2_86329537', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_1251970682662addd4e00322_39850315 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1251970682662addd4e00322_39850315',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <p>zrobic stala stopke</p> <?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_910068291662addd4e020d2_86329537 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_910068291662addd4e020d2_86329537',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Prosty kalkulator i kalkulator kredytowy</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
		<fieldset>

			<label for="x">Pierwsza liczba</label>
			<input id="x" type="text" placeholder="wartość x" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
">

			<label for="op">Operacja</label>
					<select id="op" name="op">

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->op_name))) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
						<option value="plus">(+) dodaj</option>
						<option value="minus">(-) odejmij </option>
						<option value="times">(*) pomnóż</option>
						<option value="div">(/) podziel</option>
					</select>
					
			<label for="y">Druga liczba</label>
			<input id="y" type="text" placeholder="wartość y" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
">

			<button type="submit" class="pure-button">Oblicz</button>
		</fieldset>
	</form>

        <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCreditCompute" method="post">
		<fieldset>

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
		</fieldset>
	</form>
    
    
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['resmr']->value->resultmr))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['resmr']->value->resultmr;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
