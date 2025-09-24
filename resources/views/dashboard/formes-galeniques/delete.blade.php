<form action="{{ route('formegaleniques.destroy', ['id' => $formesGaleniques->id_formegalenique]) }}" method="post">
    @csrf
    <div class="text-center">
        <h4>Voulez-vous vraiment supprimer cette forme galenique?</h4>
        <hr>
        <input type="hidden" name="id" value="{{ $formesGaleniques->id_formegalenique }}">

        <a href="{{route('formegaleniques.index')}}" class="btn bg-gradient-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
