<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home"><img src="<?php echo base_url('images/logo.png'); ?>" alt="" height="60px" class=" img-responsive"></a>
        <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home">Home </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Client
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="client_registeration">Add Client</a></li>
                        <li><a class="dropdown-item" href="manage_client">Manage Client</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_form">Create Form </a>
                </li>
            </ul>
            <!-- <div style="float: right;">
                <a href="logout" class="nav-link btn btn-orange btn-1 text-light">Logout</a>
            </div> -->

            <!-- <div class="navbar-nav ml-auto">
                <a href="logout" class="nav-link btn btn-orange my-2 btn1 text-light">Logout</a>
            </div> -->
        </div>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-orange m-2 my-sm-0 btn1" href="logout" type="submit">
                <img src="<?php echo base_url('images/icons/logout.png'); ?>" alt=""> <span>Logout</span>
            </a>
        </form>



        <!-- <div class="d-flex">
            <a href="logout" class="nav-link btn btn-orange m-4 btn-1 text-light">Logout</a>
        </div> -->
    </div>
</nav>