<form action="{{ route('users.destroy', ['id' => $users->id]) }}" method="post">
    @csrf
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer cet utilisateur?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $users->id }}">

        <a href="{{route('users.index')}}" class="btn bg-gradient-primary text-white">Non</a>

        <button type="submit" class="btn bg-gradient-danger text-white">Oui</button>
    </div>
</form>
