@if ($commandes->statut == 'en_attente')
    <form action="{{ route('commandes.traiter') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Voulez-vous Traiter cette commande?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $commandes->idcommande }}">

            <input type="hidden" name="statut" value="traitement">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@endif

@if ($commandes->statut == 'traitement')
    <form action="{{ route('commandes.verifier') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Traitement fini voulez-vous passez a la livraision?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $commandes->idcommande }}">

            <input type="hidden" name="statut" value="3">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@endif

{{-- @if ($commandes->statut == 1)
    <form action="{{ route('commandes.traiter') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Voulez-vous Traiter cette commande?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $commandes->id_ordonnance }}">

            <input type="hidden" name="statut" value="2">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@endif

@if ($commandes->statut == 2)
    <form action="{{ route('commandes.verifier') }}" method="post">
        @csrf
        <div class="text-center">
            <h4>Traitement fini voulez-vous passez a la livraision?</h4>
            <hr>
            <input type="hidden" name="id" value="{{ $commandes->id_ordonnance }}">

            <input type="hidden" name="statut" value="3">

            <a href="#" class="btn bg-gradient-danger text-white">Non</a>

            <button type="submit" class="btn btn-primary">Oui</button>
        </div>
    </form>
@endif --}}
