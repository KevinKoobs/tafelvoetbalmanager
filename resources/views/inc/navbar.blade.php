<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/players') }}">Spelers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/results') }}">Wedstrijden</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/classifications') }}">Klassementen</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/results/create') }}">Uitslag toevoegen</a>
            </li>
        </ul>
    </div>
</nav>