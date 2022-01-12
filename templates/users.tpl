{include file="header.tpl"}
{include file="navadm.tpl"} 
          <table class="table table-hover table-bordered tabla">
         <thead class="thead-dark">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col">lastname</th>
                  <th scope="col">usuario</th>
                  <th scope="col">email</th>
                  <th scope="col">Administrator</th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>

        <tbody class="contenedor-tabla" >
          {foreach from=$Users item=user}
          {if $user->name == $User[0]->name}
            
          {else}
            <tr>
                  <td scope="col">{$user->name}</td>
                  <td scope="col">{$user->lastname}</td>
                  <td scope="col">{$user->usuario}</td>
                  <td scope="col">{$user->email}</td>
                  <td scope="col">
                    {if $user->is_admin==1}
                        Yes
                    {else}
                        No
                    {/if}
                  </td>
                  <td scope="col"> <a href="deleteUser/{$user->id_usuario}">BORRAR</td>
                  <td scope="col"> <a href="editUser/{$user->id_usuario}">EDITAR</td> 
            </tr>
          {/if}
            
          {/foreach}
      </tbody>
    </table>
  </div>
{include file="footer.tpl"}