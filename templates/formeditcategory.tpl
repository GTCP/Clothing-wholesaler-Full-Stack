{include file="header.tpl"}
{include file="navadm.tpl"} 
<div class="row"> 
  <div class="col-4">
  </div>
 <div class="col-4 fondoturro">
      <h2>Editar Categoria</h2>
      <div>
      <form method="post" action="UpdateCategory">
          <input type="hidden" class="form-control" id="id_category" name="id_category" value="{$category[0]->id_category}">
          <input type="input" class="form-control" id="name" name="name" value="{$category[0]->name}">
          <input type="input" class="form-control" id="description" name="description" value="{$category[0]->description}">
          <button type="submit" class="btn btn-primary">Edit category</button>
      </form>
      </div>
    </div>
    </div>
<div class="col-4">
  </div>
</div>
{include file="footer.tpl"} 
