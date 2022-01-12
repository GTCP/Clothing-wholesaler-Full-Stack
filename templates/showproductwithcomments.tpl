{include file="header.tpl"}
{include file="navlog.tpl"}

    <table class="table table-hover table-bordered tabla">
      <thead class="thead-dark">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col"><a class="link-category" href="{$BASE_URL}productsbyorderlog" >Category</a></th>
                  <th scope="col">Details</th>


            </tr> 
          </thead>
        <tbody class="contenedor-tabla nolink" >
          {foreach from=$list_Products item=products}
            <tr>
              <td scope="col">{$products->name}</td>
              <td scope="col">{$products->nameCat}</td>
              <td scope="col"> <a href="productlog/{$products->id_product}">Item</td>
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
{include file="footer.tpl"} 