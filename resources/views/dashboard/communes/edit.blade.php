<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<form id="formSchedule" method="post" action="{{ route('communes.update') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $communes->idcommune }}">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="region">Region</label><br>
                    <select name="region_id" id="region" class="form-select js-example-basic-single" required style="width: 100%;">
                        <option value="0">Sélectionner une région</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->idregion }}" {{ $communes->region_id == $region->idregion ? 'selected' : '' }}>{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="libelle">Libelle</label><br>
                    <input type="text" name="name" class="form-control" id="libelle" value="{{ $communes->name }}" />
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>

<script>
    $(document).ready(function() {
        // Active Select2
        $('.js-example-basic-single').select2({
            dropdownParent: $('#formSchedule')
            
        });
    });
</script>
