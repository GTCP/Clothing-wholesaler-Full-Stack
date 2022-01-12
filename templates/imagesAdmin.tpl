<div class="row">
        <div class="col-3"></div>

        <div class="col-6">

    <table class="table table-hover table-bordered tabla">
        <thead class="thead">
            <tr>
                <th scope="col">Imagenes del producto</th>
                <td scope="col"></td>

            </tr> 
          </thead>
          <tbody class="contenedor-tabla" >
            {foreach from=$Images item=images}
              <tr>  
                  <td scope="col"> <img class="imgchica" src="{$images->direccion}"> </td>
                  <td scope="col"> <a href="deleteImage/{$images->id_image}">BORRAR</td>
                {**<input type="hidden" id="id_product" name="id_product" value="{$images->id_product}">
                  **}
              </tr>
            {/foreach}
          </tbody>
      </table>
    </div>
    
    <div class="col-3"></div>

    {** aca empieza el if si es admin mostrar esto **}
    <div class="col-2"></div>
    {if {$User[0]->is_admin == 1}}
      <div class="col-8">
        <form class="forms" method="post" action="addImages/{$products->id_product}" enctype="multipart/form-data" id="imagesToUpload">
          <label for="image">Image:</label>
          <input type="file" name="image" id="imageToUpload">
          <button type="submit" class="btn btn-primary btn-block colorbotonsubmit formpost">Add</button>
        </form>
      </div>      
    {/if}
    
    <div class="col-2"></div>

{** aca termina el if si es admin mostrar esto **}
</div>