<form action="{{ route('quartiers.destroy') }}" method="post">
    @csrf
    <div class="text-center">
        <h6>Voulez-vous vraiment supprimer ce quartier?</h6>
        <hr>
        <input type="hidden" name="id" value="{{ $quartier->idquartier }}">

        <a href="{{route('quartiers.index')}}" class="btn btn-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
