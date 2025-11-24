<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@php
    $communes = DB::table('communes')->get();
    // $quartiers = DB::table('quartiers')->where('id_commune', $pharmacies->id_commune)->get();

@endphp
<form id="formSchedule" method="post" action="{{ route('quartiers.update') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $quartiers->idquartier }}">
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="commune">Commune</label><br>
                    <select name="commune" id="commune" class="form-select js-example-basic-single" required style="width: 100%;">
                        <option value="0">Sélectionner une commune</option>
                        @foreach ($communes as $city)
                            <option value="{{ $city->idcommune }}" {{ $quartiers->commune_id == $city->idcommune ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="libelle">Libelle</label><br>
                    <input type="text" name="libelle" class="form-control" id="libelle" value="{{$quartiers->libelle}}" />
                </div>
            </div>
        </div>
    </div>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>

<script>
    $(document).ready(function() {
        // Active Select2
        $('.js-example-basic-single').select2({
            dropdownParent: $('#formSchedule')
            
        });

        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#formSchedule')
            
        });

    });
</script>
