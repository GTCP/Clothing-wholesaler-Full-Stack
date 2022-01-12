{literal}
<section id="template-vue-comments">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <button id="btn-refresh" type="button" class="btn btn-primary btn-sm">Refresh</button>
            <button type="button" class="btn btn-primary">Average score <span class="badge">{{promComments}}</span></button>
        </div>
        <div v-if="loading" class="card-body">
            Cargando...
        </div>
        <table class="table table-hover table-bordered tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Comments</th>
                    <th scope="col">Score</th>
                    <th scope="col">Date</th>
                    <template  v-if="UserAdmin" class="card-body">
                        <th scope="col">
                            delete
                        </th>
                    </template>
                </tr> 
            </thead>
            <tbody v-if="!loading"  class="contenedor-tabla nolink" >
                <tr v-for="(comment) in comments" >
                    <td scope="col">{{comment.comment}}</th>
                    <td scope="col">{{comment.score}}</th>
                    <td scope="col">{{comment.date}}</td>
                    <template v-if="UserAdmin" class="card-body">
                        <td scope="col">
                            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteComment(comment)">Eliminar</a>
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>    
    </div>
</section>
{/literal}
