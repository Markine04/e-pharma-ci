<form action="{{ route('communes.destroy') }}" method="post">
    @csrf
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer cette commune?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $commune->idcommune }}">

        <a href="{{route('communes.index')}}" class="btn btn-danger">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
