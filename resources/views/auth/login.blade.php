@extends("front.layouts.default")

@section("content")

        <div class="col-md-6">
            <h2 class="header">Log In</h2>

            <div class="login">
                <button class="btn btn-block btn-primary oAuthButton"><i class="fa fa-facebook"></i> Login with Facebook</button>
                <button class="btn btn-block btn-primary oAuthButton"><i class="fa fa-twitter"></i> Login with Twitter</button>
                <button class="btn btn-block btn-primary oAuthButton"><i class="fa fa-google"></i> Login with Google</button>

                <p class="text-center center">Or</p>

                <form action="/auth/login" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" class="form-control" name="email" value="" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <p class="pull-right"><a href="#">Forget Password?</a></p>
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                </form>
                <p>You don't have a account yet?<a href="#"> Sign Up now!</a></p>
            </div>

        </div>

@endsection