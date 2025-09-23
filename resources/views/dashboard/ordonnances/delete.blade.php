<form action="{{ route('ordonnances.destroy',['id'=>$ordonnances->id_ordonnance]) }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Voulez-vous supprimer cette commande?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $ordonnances->id_ordonnance }}">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>