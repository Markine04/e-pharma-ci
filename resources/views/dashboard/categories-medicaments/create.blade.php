<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/builds/css/select2.min.css') }}" />
<script src="{{ asset('assets/builds/js/select2.js') }}"></script>
<script src="{{ asset('assets/builds/js/select2.min.js') }}"></script>




<form method="post" action="{{ route('categoriemedicaments.store') }}" enctype="multipart/form-data"/>
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="libelle">Libelle</label> <br><br>
                    <input type="text" name="libelle" class="form-control" id="libelle" required />
                </div>
                <div class="mb-3">
                    <label for="parent_id">Parent</label> <br><br>
                    <select id="parent_id" name="parent_id" class="form-control">
                    {{-- <select id="parent_id" name="parent_id" class="form-control js-example-basic-single"> --}}
                        <option value="">Selectionner une categorie</option>
                        @foreach ($categories as $items)
                            <option value="{{ $items->idcategorie }}">{{ $items->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label> <br><br>
                    <input type="text" name="description" class="form-control" id="description" />
                </div>
                <div class="mb-3">
                    <label for="images">Images</label> <br><br>
                    <input type="file" name="images" class="form-control" id="images" />
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>
<!-- Select2 JS -->
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: "Sélectionnez une option",
            // allowClear: true,
            width: '100%'
        });
    });
</script>
