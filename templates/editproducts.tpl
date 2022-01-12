{include file="header.tpl"}
{include file="navadm.tpl"}
         
          
          <table class="table table-hover table-bordered tabla">
         <thead class="thead-dark">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Category</th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          <input type="hidden" class="form-control" id="id_product" name="id_product" value="{$list_Products[0]->id_product}">
          {foreach from=$list_Products item=products}
            <tr>
                  <td scope="col">{$products->name}</td>
                  <td scope="col">{$products->description}</td>
                  <td scope="col">{$products->price}</td>
                  <td scope="col">{$products->stock}</td>
                  <td scope="col">{$products->nameCat}</td>
                  <td scope="col"> <a href="BorrarOneProduct/{$products->id_product}">BORRAR</td>
                  <td scope="col"> <a href="FormEditProduct/{$products->id_product}">EDITAR</td>

            </tr>
          {/foreach}
      </tbody>
    </table>
  </div>
<div class="row"> 
  <div class="col-4">
  </div>
 <div class="col-4 fondoturro">
      <h2>Add Product</h2>
      <div>
      <form class="forms" method="post" action="insertproduct">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="name">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="description" name="description" aria-describedby="description" placeholder="description">
          <label for="price">Price:</label>
          <input type="number" class="form-control" id="price" name="price" aria-describedby="price" placeholder="price">
          <label for="stock">Stock:</label>
          <input type="number" class="form-control" id="stock" name="stock" aria-describedby="stock" placeholder="stock">
          <div class="select">
          <label for="categoria">Categoria:</label>
           <select id="id_category" name ="id_category" class="browser-default custom-select">
              {foreach from=$list_Category item=categoria}
                  <option value="{$categoria->id_category}">{$categoria->name}</option>          
            {/foreach}
           </select>
          </div>
        <button type="submit" class="btn btn-primary btn-block colorbotonsubmit formpost">Add</button>
      </form>
      </div>
    </div>
    </div>
<div class="col-4"
  </div>
</div>
{include file="footer.tpl"}