<?php
/* Smarty version 4.5.2, created on 2024-04-30 11:35:52
  from 'C:\Users\Maja\Desktop\PSS\XAMPP\htdocs\php_pss_kalkulator\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.2',
  'unifunc' => 'content_6630bb78d11e23_91641621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4212c9b8270607e9377ff970a3c57b2bf6f1aec' => 
    array (
      0 => 'C:\\Users\\Maja\\Desktop\\PSS\\XAMPP\\htdocs\\php_pss_kalkulator\\app\\views\\templates\\main.tpl',
      1 => 1714469750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6630bb78d11e23_91641621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		
                <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
                <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
                <?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="assets/js/browser.min.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">
						<div class="row">
							<div class="col-12">

								<!-- Logo -->
									<h1><a href="main.tpl" id="logo">Kalkulator</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="main.tpl">Strona główna</a>
										<a href="page1.tpl">Pierwsza strona</a>
										<a href="page2.tpl">Druga strona</a>
									</nav>

							</div>
						</div>
					</div>
					<div id="banner">
						<div class="container">
							<div class="row">
								<div class="col-6 col-12-medium">

									<!-- Banner Copy -->
										<p>TU MOZE BYC TWOJA REKLAMA</p>
								</div>
								<div class="col-6 col-12-medium imp-medium">
                                                                    
								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
						<div class="row">
							<div class="col-3 col-6-medium col-12-small">

							</div>
						</div>
					</div>
				</section>

			<!-- Content -->
				<section id="content">
                                    
					<div class="container">
                                            
						<div class="row aln-center">
                                                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15919853336630bb78d11167_19085217', 'content');
?>
  
					</div>
				</section>

			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<div class="row">
							<div class="col-8 col-12-medium">

								<!-- Links -->
									<section>
									
									</section>

							</div>
							<div class="col-4 col-12-medium imp-medium">

								<!-- Informacje o stronie -->
									<section>
										<h2>Informacje o stronie:</h2>
										<p>
											Strona została stworzona na potrzeby zaliczenia modułu.<br />
                                                                                        Autor kontrolera kalkulatora: <b>Przemysław Kudłacik</b>.<br />
                                                                                        Modyfikował: <b>KW</b>.

										</p>
									</section>

							</div>
						</div>
					</div>
				</section>

			<!-- Copyright -->
				<div id="copyright">
					&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a>
				</div>

		</div>

	</body>
        
</html><?php }
/* {block 'content'} */
class Block_15919853336630bb78d11167_19085217 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15919853336630bb78d11167_19085217',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<div class="col-4 col-12-medium">
                                                            
                                                            <p></p>
						</div>
                                                  <?php
}
}
/* {/block 'content'} */
}
