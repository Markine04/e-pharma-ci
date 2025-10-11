<form action="{{ route('pharmacies.destroy') }}" method="post">
    @csrf
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer cette pharmacie?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $pharmacies->idpharmacie }}">

        <a href="{{route('pharmacies.index')}}" class="btn bg-gradient-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
