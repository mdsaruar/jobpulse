
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
		<div class="container">
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{ asset('images/job-pulse-logo.png') }}" alt="Logo"
                    class="" style="width: 80%">

            </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{route('jobs')}}">Find Jobs</a>
					</li>
				</ul>
                @if (Auth::check())
                    <div class="dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('account.profile')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('account.logout')}}">Logout</a></li>
                        </ul>
                    </div>


                @else
				<a class="btn btn-outline-primary me-2" href="{{route('account.login')}}" type="submit">Login</a>
				<a class="btn btn-primary" href="{{route('account.registration')}}" type="submit">Register</a>
                @endif
			</div>
		</div>
	</nav>
</header>
