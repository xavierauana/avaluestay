<!-- Modal -->
<div class="modal  center-screen fade" id="signUpForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="socialSingUp">
                        <a class=" btn btn-default btn-block signUpButton facebook " href="#" ><i class="fa fa-facebook"></i>  Sing Up with Facebook</a>
                        <a class=" btn btn-default btn-block signUpButton google " href="#" ><i class="fa fa-google"></i>  Sing Up with Google</a>

                        <div class="signUpSeparator">
                            <p class="text-center">or</p>
                            <hr>
                        </div>
                        <a class=" btn btn-default btn-block signUpButton email " href="#emailSignUp" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i>  Sign Up with Email</a>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="emailSignUp">
                        <form action="/auth/register" method="post">
                            {{csrf_field()}}

                            <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                            <input class="form-control" type="email" name="email" placeholder="Your Email Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Your Password" required>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm by Typing Again" required>
                            <input type="submit" class="btn btn-block btn-success" value="Submit">
                        </form>
                        <div class="signUpSeparator">
                            <p class="text-center">or</p>
                            <hr>
                        </div>
                        Sign Up with <a href="#" class="facebook">Facebook</a> or <a href="#" class="google">Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>