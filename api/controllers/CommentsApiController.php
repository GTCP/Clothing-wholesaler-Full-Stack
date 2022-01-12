<?php
require_once("./models/CommentsModel.php");
require_once("./api/controllers/ApiController.php");
require_once("./api/views/JSONView.php");

class CommentsApiController extends ApiController{
  
    public function GetComments($params = null) {
        $comments = $this->commentsModel->GetComments();
        $this->view->response($comments, 200);
    }
    public function GetCommentsProduct($params = null){
        $id_product = $params[':ID'];
        $comments = $this->commentsModel->GetCommentsProduct($id_product);
        $this->view->response($comments, 200);
    }
    /**
     * Obtiene una tarea dado un ID
     * 
     * $params arreglo asociativo con los parámetros del recurso
     */
    public function GetComment($params = null) {
        // obtiene el parametro de la ruta
        $id = $params[':ID'];
        $comment = $this->commentsModel->GetComment($id);
        
        if ($comment) {
            $this->view->response($comment, 200);   
        } else {
            $this->view->response("No existe el comentario con el id={$id}", 404);
        }
    }
    // TareasApiController.php
    public function DeleteComment($params = []) {
        $id_comment = $params[':ID'];
        $comment = $this->commentsModel->GetComment($id_comment);

        if ($comment) {
            $this->commentsModel->DeleteComment($id_comment);
            $this->view->response("Producto id=$id_comment eliminado con éxito", 200);
        }
        else 
            $this->view->response("Task id=$id_comment not found", 404);
    }

    // TareaApiController.php
   public function AddComment($params = null) { 
        $comment = $this->getData(); // la obtengo del body
        $commentId = $this->commentsModel->InsertComment($comment->comment, $comment->score,$comment->date,$comment->id_product,0);
            
        // obtengo la recien creada
        $new_comment = $this->commentsModel->GetComment($commentId);
        
        if ($new_comment)
            $this->view->response($new_comment, 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }

    // TaskApiController.php
    public function UpdateComment($params = []) {
        $id_comment = $params[':ID'];
        $comment = $this->commentsModel->GetComment($id_comment);

        if ($comment) {
            $body = $this->getData();
            $comment = $body->comment;
            $score = $body->score;
            $date = $body->date;
            $id_comment = $body->id_comment;
            $comment = $this->commentsModel->UpdateComment($comment,$score,$date,$id_comment);
            $this->view->response("Comment id=$id_comment actualizado con éxito", 200);
        }
        else 
            $this->view->response("Comment id=$id_comment not found", 404);
    }


}
