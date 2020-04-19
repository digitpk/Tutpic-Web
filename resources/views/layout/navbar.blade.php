<nav class="navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('/')}}assets/img/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Students</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Tutors</a></li>
                <li><a href="#">Plans</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Academy <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">English Subject</a></li>
                        <li><a href="#">BSC</a></li>
                        <li><a href="#">Stats</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Physics</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Atomic Physics</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Contact Us</a></li>
                <li><a href="{{url('login')}}">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
