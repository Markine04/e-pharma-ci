<form method="post" action="{{ route('datephciegardes.update') }}">
    @csrf
    <div class="form-group">
        <input type="hidden" name="idatephciegardes" value="{{ $datePhcieGarde->idatephciegardes }}">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="date_debut">Date debut</label>
                    <input type="date" name="date_debut" class="form-control" id="date_debut" value="{{ date('Y-m-d', strtotime($datePhcieGarde->date_debut)) }}" required />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="date_fin">Date fin</label>
                    <input type="date" name="date_fin" class="form-control" id="date_fin" value="{{ date('Y-m-d', strtotime($datePhcieGarde->date_fin)) }}" required />
                </div>
            </div>
        </div>
    </div>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>
