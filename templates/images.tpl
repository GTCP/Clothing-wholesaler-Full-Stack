<div class="row">
        <div class="col-3"></div>

        <div class="col-6">

    <table class="table table-hover table-bordered tabla">
        <thead class="thead">
            <tr>
                <th scope="col">Imagenes del producto</th>

            </tr> 
          </thead>
          <tbody class="contenedor-tabla" >
            {foreach from=$Images item=images}
              <tr>  
                  <td scope="col"> <img class="imgchica" src="{$images->direccion}"> </td>
              </tr>
            {/foreach}
          </tbody>
      </table>
    </div>
    
   

{** aca termina el if si es admin mostrar esto **}
</div>