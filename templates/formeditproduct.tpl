{include file="header.tpl"}
{include file="navadm.tpl"} 
<div class="row"> 
  <div class="col-4">
  </div>
 <div class="col-4 fondoturro">
      <h2>Editar Producto</h2>
      <div>
      <form method="post" action="UpdateProduct">
          <input type="hidden" class="form-control" id="id_product" name="id_product" value="{$product[0]->id_product}">
          <input type="input" class="form-control" id="name" name="name" value="{$product[0]->name}">
          <input type="input" class="form-control" id="description" name="description" value="{$product[0]->description}">
          <input type="number" class="form-control" id="price" name="price" value="{$product[0]->price}">
          <input type="number" class="form-control" id="stock" name="stock" value="{$product[0]->stock}">
          <div class="select">
            <select id="id_category" name ="id_category" class="browser-default custom-select">
              {foreach from=$category item=categoria}
                <option value="{$categoria->id_category}">{$categoria->name}</option>          
              {/foreach}
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Edit Product</button>
      </form>
      {foreach from=$product item=products}
{/foreach}
      {include file="imagesAdmin.tpl"} 
      {include file="showcomments.tpl"} 
      </div>
    </div>
    </div>
  <div class="col-4">
  </div>
</div>
{include file="footer.tpl"} 
