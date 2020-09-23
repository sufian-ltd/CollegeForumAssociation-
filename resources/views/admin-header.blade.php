<nav class="btn-lg navbar-inverse" style="background: #22352f;font-size: 18px;">
    <div class="container-fluid" style="font-size: 14px;font-weight: 600;text-transform: uppercase;margin: 0;padding: 0;">
        <div class="navbar-collapse" style="user-select: none;border: outset;">
            <h5 align="center" style="color: #ffffff;font-size: 19px;font-weight: bold"><span class="glyphicon glyphicon-education"></span>  College Forums Association</h5>
            <!--            <a style="color: #ffffff;font-size: 20px" class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-globe"></span> EASY Shopping</a>-->
        </div>
        <ul class="nav navbar-nav" >
            <li><a style="" href="{{ route('home')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a style="" href="{{ route('newThread') }}"><span class="glyphicon glyphicon-pencil"></span> Write-Post</a></li>
            <li><a style="" href="{{ route('adminViewThreads') }}"><span class="glyphicon glyphicon-calendar"></span> News-Feed</a></li>
            <li><a style="" href="{{ route('timelineThreads') }}"><span class="glyphicon glyphicon-book"></span> Timeline</a></li>
            @php $user=\App\User::find(\Illuminate\Support\Facades\Auth::id()); @endphp
            @if($user->user_type=='Admin')
                <li><a style="" href="{{ route('adminViewThreadsRequest') }}"><span class="glyphicon glyphicon-retweet"></span> Thread-Request</a></li>
                <li><a style="" href="{{ route('adminViewBlockedThreads') }}"><span class="glyphicon glyphicon-trash"></span> Blocked-Thread</a></li>
                <li><a style="" href="{{ route('user') }}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">

            @guest
                {{-- --}}
            @else
                <li><a style="" href="{{ route('profile') }}"><span class="glyphicon glyphicon-certificate"></span> {{ Auth::user()->name }} ({{ Auth::user()->user_type }})</a></li>
                <li><a style="" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</nav>