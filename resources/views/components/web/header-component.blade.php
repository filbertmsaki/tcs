<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="main-logo">
                    <a href="{{ route('index') }}"><img src="images/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-9 menu-column">
                <nav class="defaultmainmenu" id="main_menu">
                    <ul class="defaultmainmenu-menu">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About US</a></li>
                        <li><a href="{{ route('events') }}">Upcoming Events</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Contact US</a></li>
                        <li><a href="{{ route('members') }}">Become a Member</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right-column">
                <div class="nav_side_content">
                    <ul class="social-icon">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                    <div class="search_option">
                        <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                            <input type="text" placeholder="Search...">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
