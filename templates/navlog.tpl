  <div class="container-fluids all">
         <nav class="navbar navbar-light navbar-expand-md sticky-top  bg-white navigation-clean-button gradient">
                 <div class="image-upload">
                     <label for="file-input">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                     </label>
                     <a>
                            {$User[0]->name}
                     </a>
                 </div> 
                <div class="container-fluid black">
                     <a class="navbar-brand logo"href="{$BASE_URL}productslog">
                             MayoristaExpress
                     </a>
                         <div class="collapse navbar-collapse" id="navcol-1">
                                <ul class="nav navbar-nav ml-auto">
                                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{$BASE_URL}productslog" ><i class="fa fa-user-circle-o"></i> Products</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{$BASE_URL}categorylog" ><i class="fa fa-user-circle-o"></i> Category</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{$BASE_URL}logout"><i class="fa fa-sign-in"></i> Logout</a></li>
                                </ul>
                        </div>
                 </div>
</nav> 

    <div class="container-fluid">
