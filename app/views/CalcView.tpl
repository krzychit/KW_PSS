{extends file="main.tpl"}

{block name=footer} zrobic stala stopke {/block}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_x">Liczba 1: </label>
			<input id="id_x" type="text" name="x" value="{$form->x}" />
		</div>
        <div class="pure-control-group">
			<label for="id_op">Operacja: </label>
			<select name="op">
				{if isset($res->op_name)}
				<option value="{$form->op}">ponownie: {$res->op_name}</option>
				<option value="" disabled="true">---</option>
				{/if}
				<option value="plus">+</option>
				<option value="minus">-</option>
				<option value="times">*</option>
				{if $user->role == "admin"}
				<option value="div">/</option>
				{/if}
			</select>
		</div>
        <div class="pure-control-group">
			<label for="id_y">Liczba 2: </label>
			<input id="id_y" type="text" name="y" value="{$form->y}" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	


<form action="{$conf->action_url}calcCreditCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
            <div class="pure-control-group">
                <label for="kk">Kwota kredytu</label>
                <input id="kk" type="text" placeholder="Kwota kredytu" name="kk" value="{$form->kk}">					
                <label for="il">Liczba lat</label>
                <input id="il" type="text" placeholder="Liczba lat" name="il" value="{$form->il}">
                <label for="opr">Oprocentowanie</label>
                <input id="opr" type="text" placeholder="Oprocentowanie" name="opr" value="{$form->opr}">
                <button type="submit" class="pure-button">Oblicz miesieczna rate</button>
            </div>
        </fieldset>
</form>
    
{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages inf">
	Wynik: {$res->result}
</div>
{/if}

{if isset($resmr->resultmr)}
<div class="messages inf">
	Wynik: {$resmr->resultmr}
</div>
{/if}

{/block}