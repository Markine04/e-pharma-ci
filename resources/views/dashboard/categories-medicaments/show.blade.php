<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




<form method="post" id="myFormModal" action="{{ route('categorieapps.storeshowapp') }}">
    @csrf
    {{-- <input type="hidden" name="idcategorie" value="{{ $categories->idcategorie }}"> --}}
    @php
        $elements = DB::table('categories')->get();
        // $selected = explode(',', $categories);
    @endphp
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                {{-- <div class="mb-3">
                    <label for="libelle">Libelle</label> <br>
                    <input type="text" name="libelle" value='{{$categories->libelle}}' class="form-control" id="libelle" required />
                </div> --}}
                <div class="mb-3">
                    <label for="parent_id">Parent</label> <br>
                    {{-- <select id="parent_id" name="parent_id" class="form-control"> --}}
                    <select id="parent_id" name="parent_id[]" class="form-control select2" multiple>
                        @foreach ($elements as $items)
                            <option value="{{ $items->idcategorie }}" @if (in_array($items->idcategorie, $selected ?? [])) selected @endif>
                                {{ $items->libelle }}
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>

<!-- Select2 JS -->
<script>
    // $(document).ready(function() {
    //     $('.js-example-basic-single').select2({
    //         dropdownParent: $('#myFormModal'),
    //         // placeholder: "Sélectionnez une option",
    //         width: '100%',
    //         // allowClear: true
    //         maximumSelectionLength: 9
    //     });
    // });

    $(document).ready(function() {
    $('#parent_id').select2({
        placeholder: "Sélectionner une ou plusieurs catégories",
        width: '100%',
        // allowClear: true
        maximumSelectionLength: 9
    });
});
</script>

