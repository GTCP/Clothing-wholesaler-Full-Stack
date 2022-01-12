{include file="header.tpl"}
{include file="nav.tpl"}
         <div class="row">
                <div class="col-4"> 
                        </div>
                <div class="col-4  formmayor">    
                <form action="registrarse" method="POST">
                         <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                 <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario" placeholder="usuario">
                        </div>

                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="pass" name="pass" aria-describedby="pass" placeholder="pass">

                        </div>
                        <div class="form-group">
                                 <label for="email">Email:</label>
                                 <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="email">

                                
                         </div>
                <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="name">

                </div>
                <div class="form-group">
                         <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="lastname">
                </div>
                <div><button type="submit" class="btn btn-primary btn-block colorbotonsubmit formpost" value="registrarse">Sign Up</button></div>
                </form>
                </div>
                <div class="col-4"> 
                </div>

{include file="footer.tpl"} 