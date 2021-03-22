<nav class="navbar is-primary" >
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <strong> <img src=""> HZ</strong>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a href="/"
                   class="navbar-item {{ Request::path() === '/' ? "is-active" : "" }}">
                    Home
                </a>
                <a href="/news"
                   class="navbar-item {{ Request::path() === '/news' ? "is-active" : "" }}">
                    News
                </a>
                <a href="/researchers"
                   class="navbar-item {{ Request::path() === '/researchers' ? "is-active" : "" }}">
                    Researchers
                </a>
                <a href="/documents"
                   class="navbar-item {{ Request::path() === '/documents' ? "is-active" : "" }}">
                    Documents
                </a>

            </div>
        </div>
    </div>
</nav>