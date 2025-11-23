<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<form id="formSchedule" method="POST" action="{{ route('pharmacies-gardes.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Communes</label><br>
        <select class="form-select js-example-basic-single" name="commune" onchange="getCommune(this.value)"
            id="communeSelect" style="width: 100%; height: 200px">
            <option value="">Selectionner une commune</option>
            @for ($r = 0; $r < count($communes); $r++)
                <option value="{{ $communes[$r]->idcommune }}">
                    {{ $communes[$r]->name }}</option>
            @endfor
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Pharmacie</label> <br>
        <select id="pharmacySelect" name="pharmacie[]" class="form-select js-example-basic-multiple" required multiple style="width: 100%; height: 200px">
            <option value="">Sélectionner une pharmacie</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label" for="startDateSelect">Date début et fin</label>
            <select name="periode" id="startDateSelect" class="form-select js-example-basic-single">
                <option>Sélectionner une date</option>
                @foreach($datePhcieGarde as $date)
                    <option value="{{$date->idatephciegardes}} }}">
                       De {{ date('d-m-Y', strtotime($date->date_debut)) }} Au {{ date('d-m-Y', strtotime($date->date_fin)) }}
                    </option>
                @endforeach
            </select>
            {{-- <input id="startDate" type="date" name="date_debut" class="form-control" required /> --}}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Notes (optionnel)</label>
        <input id="note" type="text" name="note" class="form-control" placeholder="Ex: nuit, week-end..." />
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
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

    function getCommune(e) {
    if (!e) {
        $('#pharmacySelect').html('<option value="">Sélectionner une pharmacie</option>');
        return;
    }

    $.ajax({
        type: "GET",
        url: "{{ url('dashboard/pharmacie-gard/') }}/" + e + "/communes",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(data) {
            $('#pharmacySelect').html(data);
        },
        error: function() {
            alert("Erreur lors du chargement des pharmacies.");
        }
    });
}
</script>
