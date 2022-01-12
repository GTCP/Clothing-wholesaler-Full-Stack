{include file="header.tpl"}
{include file="nav.tpl"}
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">

             <table class="table table-hover table-bordered tabla">
      <thead class="thead-dark">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>

            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$list_Category item=category}
            <tr>
                  <td scope="col">{$category->name}</th>
                  <td scope="col">{$category->description}</th>
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
  <div class="col-3"></div>

  </div>
</div>
{include file="footer.tpl"} 