<form method="post" action="{{ route('datephciegardes.store') }}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="date_debut">Date debut</label>
                    <input type="date" name="date_debut" class="form-control" id="date_debut" required />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="date_fin">Date fin</label>
                    <input type="date" name="date_fin" class="form-control" id="date_fin" required />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="nombre_semaines">Nombre de semaines</label>
                    <input type="number" name="nombre_semaines" class="form-control" id="nombre_semaines" required />
                </div>
            </div>
        </div>
    </div>

    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>
