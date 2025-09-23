@if ($ordonnances->statut == 1)
    <form action="{{ route('ordonnances.verifier') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Voulez-vous Traiter cette commande?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $ordonnances->id_ordonnance }}">

            <input type="hidden" name="statut" value="2">

            <input type="hidden" name="image" value="{{ $ordonnances->image }}">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@elseif ($ordonnances->statut == 2)
    <form action="{{ route('ordonnances.verifier') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Traitement fini voulez-vous passez a la livraision?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $ordonnances->id_ordonnance }}">

            <input type="hidden" name="statut" value="3">

            <input type="hidden" name="image" value="{{ $ordonnances->image }}">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@endif
