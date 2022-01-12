{include file="header.tpl"}
{include file="navadm.tpl"} 
<div class="row"> 
  <div class="col-4">
  </div>
 <div class="col-4 fondoturro">
      <h2>Editar Usuario</h2>
      <div>
      <form method="post" action="UpdateUser">
          <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{$UserEdit[0]->id_usuario}">
          <input type="input" class="form-control" id="name" name="name" disabled value="{$UserEdit[0]->name}">
          <input type="input" class="form-control" id="lastname" name="lastname" disabled value="{$UserEdit[0]->lastname}">
          <input type="input" class="form-control" id="usuario" name="usuario" disabled value="{$UserEdit[0]->usuario}">
          <input type="input" class="form-control" id="email" name="email" disabled value="{$UserEdit[0]->email}">
          <div class="select">
            <select id="is_admin" name ="is_admin" class="browser-default custom-select">
                {if $UserEdit[0]->is_admin == 0}
                    <option value="0" selected>Registered User</option>
                    <option value="1">Administator User</option>
                {/if}
                {if $UserEdit[0]->is_admin == 1}
                    <option value="0">Registered User</option>
                    <option value="1" selected>Administator User</option>
                {/if}        
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Edit User</button>
      </form>
      </div>
    </div>
    </div>
  <div class="col-4">
  </div>
</div>
{include file="footer.tpl"} 
