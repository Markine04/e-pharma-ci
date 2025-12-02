<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('assets/builds/css/select2.min.css') }}" />
<script src="{{ asset('assets/builds/js/select2.js') }}"></script>
<script src="{{ asset('assets/builds/js/select2.min.js') }}"></script>


<form method="post" action="{{ route('categoriemedicaments.update') }}" enctype="multipart/form-data"/>
    @csrf
    <input type="hidden" name="idcategorie" value="{{ $categories->idcategorie }}">
    <input type="hidden" name="existing_images" value='{{ $categories->image }}'>
    @php
        $elements = DB::table('categories')->get();
    @endphp
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                <div class="mb-3">
                    <label for="libelle">Libelle</label> <br>
                    <input type="text" name="libelle" value='{{$categories->libelle}}' class="form-control" id="libelle" required />
                </div>
                <div class="mb-3">
                    <label for="parent_id">Parent</label> <br>
                    <select id="parent_id" name="parent_id" class="form-control">
                    {{-- <select id="parent_id" name="parent_id" class="form-control js-example-basic-single"> --}}
                        <option value="">Selectionner une categorie</option>
                        @foreach ($elements as $items)
                            <option value="{{ $items->idcategorie }}"{{$categories->idcategorie == $items->idcategorie ? 'selected' : ''}}>{{ $items->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label> <br>
                    <input type="text" name="description" value="{{ $categories->description }}" class="form-control"  id="description" />
                </div>
                <div class="mb-3">
                    <label for="images">Images</label> <br>
                    <input type="file" name="images" value="{{$categories->image}}" class="form-control" id="images" />
                </div>
            </div>
        </div>
    </div>
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
