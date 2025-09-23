<form method="post" action="{{ route('assurances.store') }}">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="libelle">Libelle</label> <br><br>
                    <input type="text" name="libelle" class="form-control" id="libelle" required />
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
</form>
