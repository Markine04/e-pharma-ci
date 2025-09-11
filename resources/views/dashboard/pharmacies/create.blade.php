@extends('dashboard.layout-dashboard.master')
@section('content')
    <div class="container mt-8">
        <div class="card container">
            <div class="card-title">
                <h2>Ajouter une pharmacie</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('pharmacies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" class="form-control" id="name" required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address">Adresse</label>
                                    <input type="text" name="address" class="form-control" id="address" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="city_id">Ville</label>
                                    <select name="commune_id" id="city_id" class="form-control select2" required>
                                        <option value="">-- Sélectionner une ville --</option>
                                        @foreach ($communes as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" name="latitude" class="form-control" id="latitude" required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="longitude">Longitide</label>
                                    <input type="text" name="longitude" class="form-control" id="longitude" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="images">Image</label><br>
                        <input type="file" name="images" id="images">
                    </div>
                    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
                </form>
            </div>
        </div>



    </div>
@endsection


<script>
    $(document).ready(function() {
        $('.select2').select2();

    });
</script>
