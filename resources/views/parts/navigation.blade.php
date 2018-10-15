<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list_combinations') }}">Generated Combinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('save_combinations') }}">Generate</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>