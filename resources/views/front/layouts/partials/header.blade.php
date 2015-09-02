<!-- This header section is nearly same as the others, only the header image change to a carousel section -->
<header class="">
    <div class="container">
        <nav class="navbar" id="first-navbar">
            <ul class="nav navbar-nav">
                <li><a href="" title=""><i class="fa fa-facebook"></i></a></li>
                <li><a href="" title=""><i class="fa fa-twitter"></i></a></li>
                <li><a href="" title=""><i class="fa fa-google"></i></a></li>
                <li><a href="" title=""><i class="fa fa-youtube"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><i class="fa fa-phone"></i> (852) 1234 5678</a></li>
                <li><a href=""><i class="fa fa-envelope-o"></i> testing@testing.com</a></li>

                @if(Auth::user())
                    <li><a href="{{route("properties.create")}}" >List Your Space</a></li>
                    <li><a href="/messages" >Messages</a></li>
                    <li class="dropdown">
                        <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel" id="userDropDown">
                            <li><a href="/profile">My Account</a></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="" title="" data-toggle="modal" data-target="#signUpForm" >Sign Up</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                        <div class="dropdown-menu" id="headerLoginButton">
                            <form action="/auth/login" method="post" role="form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="" placeholder="Email Address" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="" placeholder="Your Password" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="header-img-container">
        <!-- This carousel section is only use in index page -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="http://lorempixel.com/1440/490/city" alt="...">
                    <div class="carousel-caption">
                        <h1 class="text-center"><span>Welcome Home 1</span></h1>
                        <p class="text-center"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dicta!</span></p>
                        <a class="text-center" href="#">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="http://lorempixel.com/1440/490/people" alt="...">
                    <div class="carousel-caption">
                        <h1 class="text-center"><span>Welcome Home 2</span></h1>
                        <p class="text-center"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, dicta!</span></p>
                        <a class="text-center" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of carousel section -->
        <div class="container second-navbar-container center-block">
            <nav class="navbar" id="second-navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="imgs/logo_sm.png" alt=""></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Whats News</a></li>
                    <li><a href="">House</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>