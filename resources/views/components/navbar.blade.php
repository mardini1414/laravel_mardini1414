<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/pasien-view">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rumah-sakit-view">Rumah Sakit</a>
                </li>
            </ul>
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>