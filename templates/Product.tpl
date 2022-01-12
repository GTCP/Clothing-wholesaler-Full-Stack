{include file="header.tpl"}
{include file="nav.tpl"}
    <table class="table table-hover table-bordered tabla">
      <thead class="thead">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Category</th>

          </tr> 
        </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$product item=products}
            <input type="hidden" id="id_product" value="{$products->id_product}"/>

            <tr>
                  <td scope="col">{$products->name}</td>
                  <td scope="col">{$products->description}</th>
                  <td scope="col">{$products->price}</th>
                  <td scope="col">{$products->stock}</th>
                  <td scope="col">{$products->nameCat}</th>
            </tr>
          {/foreach}
        </tbody>
    </table>
    {include file="images.tpl"} 
    {include file="vue/comments.tpl"}
{include file="footer.tpl"} 