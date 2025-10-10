<form action="{{ route('quartiers.destroy') }}" method="post">
    @csrf
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer ce quartier?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $quartier->idquartier }}">

        <a href="{{route('quartiers.index')}}" class="btn bg-gradient-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
