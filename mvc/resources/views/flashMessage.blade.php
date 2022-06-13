@if(session('flashMessage'))
        <div class="container mt-5 text-center alert alert-success">
            {{ session('flashMessage') }}
        </div>
@endif

@if(session('flashWarning'))
        <div class="container mt-5 text-center alert alert-danger">
            {{ session('flashWarning') }}
        </div>
@endif