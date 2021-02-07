<section class="user-s1 align-items-center d-flex container-fluid text-shadow bg-secondary minh-30vh border-bottom border-primary">
</section>
<section class="user-s2 container-fluid d-flex align-items-center justify-content-center py-5 minh-70vh">
    <div class="row w-100">
        <div class="col-8 col-sm-6 col-md-5 col-lg-4 card border-dark mx-auto p-0 text-gray shadow shadow-lg">
            <div class="card-header bg-dark text-primary">
                <span class="fa fa-user-o"></span>
                User login
            </div>
            <div class="card-body">
                <form class="px-3" 
                    autocomplete="off"
                    action=""
                    method="POST">
                <label>Login</label>
                <input type="text" 
                    class="form-control line-box rounded-0 mb-3" 
                    maxlength="45"
                    name="username"
                    placeholder="Enter login"
                    tabindex="1">
                <label>Password</label>
                <input type="password" 
                    class="form-control line-box rounded-0 mb-3" 
                    maxlength="40"
                    name="userpass"
                    placeholder="Enter password"
                    tabindex="2">
                <div class="w-100 text-right mt-3">
                    <input type="reset" 
                        class="btn btn-outline-gray" 
                        value="Clear"
                        tabindex="4">
                    <input type="submit" 
                        class="btn btn-outline-gray" 
                        value="Login"
                        name="login"
                        tabindex="3">
                </div>
                </form>
            </div>
        </div>
    </div>
</section>