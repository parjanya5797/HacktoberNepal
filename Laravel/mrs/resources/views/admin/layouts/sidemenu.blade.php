<main>
    <ul class="list-group">
        @auth
        <li class="list-group-item">
            <a href="{{ route('home') }}" class="btn btn-primary">Website</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('logout') }}" class="btn btn-primary">Log Out</a>
        </li>
        @else
        <li class="list-group-item">
            <a href="{{ route('login.index') }}" class="btn btn-primary">Log in</a>
        </li>
        @endauth
        <div class="list-group-item">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('category.index') }}">All Category</a>
                    <a class="dropdown-item" href="{{ route('category.create') }}">Create Category</a>
                </div>
            </div>
        </div>
        <div class="list-group-item">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Movie
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('movie.index') }}">All Movie</a>
                    <a class="dropdown-item" href="{{ route('movie.create') }}">Create Movie</a>
                </div>
            </div>
        </div>
        <div class="list-group-item">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Actor
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('actor.index') }}">All Actor</a>
                    <a class="dropdown-item" href="{{ route('actor.create') }}">Create Actor</a>
                </div>
            </div>
        </div>
    </ul>
</main>