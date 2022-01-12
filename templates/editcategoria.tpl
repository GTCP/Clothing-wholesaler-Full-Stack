{include file="header.tpl"}
{include file="navadm.tpl"} 
             <table class="table table-hover table-bordered tabla">
      <thead class="thead-dark">
          <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col"> </th>
                  <th scope="col"> </th>
            </tr>
          </thead>
        <tbody class="contenedor-tabla" >
          {foreach from=$list_Category item=categoria}
            <tr>
                  <td scope="col">{$categoria->name}</td>
                  <td scope="col">{$categoria->description}</td>
                  <td scope="col"> <a href="BorrarOneCategory/{$categoria->id_category}">BORRAR</td>
                  <td scope="col"> <a href="EditCategory/{$categoria->id_category}">EDITAR</td>
            </tr>
        {/foreach}
      </tbody>
    </table>
  </div>

  <div class="row"> 
  <div class="col-4">
  </div>
 <div class="col-4 fondoturro">
      <h2>Add Category</h2>
      <div class="forms">
      <form method="post" action="insertcategory"">
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="idForm" name="name"  placeholder="name">
      </div>
      <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="idForm" name="description"  placeholder="description">
        </div>
        <div class="center">
        <button type="submit" class="btn btn-primary btn-block colorbotonsubmit formpost">Add</button>
      </div>
      </form>
      </div>
    </div>
    </div>
<div class="col-4">
  </div>
</div>
{include file="footer.tpl"} 