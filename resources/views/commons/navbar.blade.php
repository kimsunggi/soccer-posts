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
                    <li><a href="/">海外ニュース</a></li>
                    <li><a href="{{ route('domestic.get') }}">国内ニュース</a></li>
                    <li><a href="{{ route('chart.get') }}">アンケート</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                    @if (Auth::check()) 
                        
                        <li><a href="{{ route('users.show', Auth::id()) }}">
                            <span class="gravatar">
                            <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                            </span>
                            マイページ</a>
                        </li>
                        <li><a  href="{{ route('logout.get') }}">ログアウト</a></li>
                        @if (\Auth::id() === 1)
                        <li><a  href="{{ route('article.create') }}">記事投稿管理</a></li>
                        @endif
                        
                    @else 
                         <li><a href="{{ route('signup.get') }}">新規登録</a></li>
                        <li><a href="{{ route('login') }}">ログイン</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>