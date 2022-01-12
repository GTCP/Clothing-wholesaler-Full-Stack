"use strict"

// define la app Vue
let app = new Vue({
    el: "#template-vue-comments",
    data: {
        subtitle: "Comments",
        loading: false,
        comments: [],
        promComments:0,
        UserAdmin : false
    },
    methods: {
        deleteComment: function(comment) {
            fetch(`api/comment/${comment.id_comment}`, {
                method: 'DELETE',
             })
             .then(response => {
                if(!response.ok){
                    console.log("error");
                }
                return response.json();
             })
             .then(response =>{
                GetCommentsProduct();
             })
             .catch(error => console.log(error));
        }
    }
});
window.onload = function(){
    GetCommentsProduct();

};

document.getElementById('btn-refresh').addEventListener("click", GetCommentsProduct);
document.getElementById("addComment").addEventListener("click", addComment);
/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */


function GetCommentsProduct() {
    app.loading = true;
    let countComment = 0;
    let commentsScore = 0;
    let id_product = document.getElementById("id_product").value;
    
    let User;
    if (document.getElementById("User")) {
        User = document.getElementById("User").value;
    }
    
    fetch(`api/comments/${id_product}`)
    .then(response => response.json())
    .then(comments => {
        countComment = comments.length;
        for (let index = 0; index < comments.length; index++) {
            commentsScore += parseInt(comments[index].score); 
        }
        if (countComment != 0) {
            app.promComments = (commentsScore/countComment);        
        } else {
            app.promComments = 0;
        }
        if (User) {
            if (User == 1) {
                app.UserAdmin = true;
            } else {
                app.UserAdmin = false;
            }
        }
        
        app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
        app.loading = false;
        

    })
    .catch(error => console.log(error));
}

/**
 * Inserta una tarea usando la API REST.
 */
function addComment(event) {
    event.preventDefault();
    let actualComment = document.querySelector("#textComment").value;
    let actualDate = new Date();
    let selecScore=0;
    let id_product = document.getElementById("id_product").value;
        let selecStar = document.getElementsByName("estrellas");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<selecStar.length;i++)
        {
            if(selecStar[i].checked)
            selecScore=selecStar[i].value;
        }
    let data = {
        comment: actualComment,        
        score: selecScore,
        date:  actualDate,
        id_product :id_product
    }


    fetch(`api/comments/${id_product}`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
        if(!response.ok){
            console.log("error");
        }
        return response.json();
     })
     .then(response =>{
        GetCommentsProduct();
        document.getElementById("form_comment").reset();
     })
     .catch(error => console.log(error));
};
// function DeleteComment(event) {
//     event.preventDefault();
//     alert("Hola");

// };

// obtiene las tareas al inicio
GetCommentsProduct();
