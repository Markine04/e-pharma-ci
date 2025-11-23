<form action="{{ route('categoriemedicaments.destroy') }}" method="post">
    @csrf
    {{-- <input type="hidden" name="id" value="{{ $categories->idcategorie }}"> --}}
    <div class="text-center">
        <h6>Voulez-vous vraiment supprimer cette catégorie de médicament?</h6>
        <hr>
        <input type="hidden" name="id" value="{{ $categories->idcategorie }}">

        <a href="{{route('categoriemedicaments.index')}}" class="btn btn-danger text-white">Non</a>

        <button type="submit" class="btn btn-primary">Oui</button>
    </div>
</form>
