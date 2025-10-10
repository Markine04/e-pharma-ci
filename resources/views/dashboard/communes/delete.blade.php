<form action="{{ route('communes.destroy') }}" method="post">
    @csrf
    <input type="hidden" name="commune" value="{{ $commune->idcommune }}">
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer cette commune?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $commune->idcommune }}">

        <a href="{{route('communes.index')}}" class="btn bg-gradient-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
