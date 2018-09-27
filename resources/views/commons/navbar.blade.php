<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">soccer posts</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center">
                    <li><a href="#">海外ニュース</a></li>
                    <li><a href="#">国内ニュース</a></li>
                    <li><a href="#">アンケート</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                    @if (Auth::check()) 
                        <li><a href="#">マイページ</a></li>
                        <li><a href="#">ログアウト</a></li>
                    @else 
                        <li><a href="#">新規登録</a></li>
                        <li><a href="#">ログイン</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>