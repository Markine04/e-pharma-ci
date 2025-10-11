<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@extends('dashboard.layout-dashboard.master')
@section('content')
    <div class="container mt-8">
        <div class="card container">
            <div class="card-title">
                <h2>Modifier une pharmacie</h2>
            </div>

            @php
                $communes = DB::table('communes')->get();
                $quartiers = DB::table('quartiers')->where('id_commune', $pharmacies->commune_id)->get();

            @endphp
            <div class="card-body">
                <form method="post" id="formSchedule" action="{{ route('pharmacies.update',['id'=>$pharmacies->idpharmacie]) }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="lastimages" value="{{$pharmacies->images}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$pharmacies->name}}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address">Adresse</label>
                                    <input type="text" name="address" class="form-control" id="address"  value="{{$pharmacies->address}}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone"  value="{{$pharmacies->phone}}" required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="city_id">Ville</label>
                                    <select name="commune_id" id="city_id" class="form-control select2" required>
                                        <option value="">-- Sélectionner une ville --</option>
                                        @foreach ($communes as $city)
                                            <option value="{{ $city->idcommune }}"{{$pharmacies->commune_id == $city->idcommune ? 'selected': ''}}>{{ $city->name }}</option>
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
                                    <input type="text" name="latitude" class="form-control" id="latitude"  value="{{$pharmacies->latitude}}"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="longitude">Longitide</label>
                                    <input type="text" name="longitude" class="form-control" id="longitude"  value="{{$pharmacies->longitude}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="images">Images</label>
                                    <input type="file" name="images" id="images" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="quartier_id">Quartiers</label>
                                    <select name="quartier_id" id="quartier_id" class="form-select js-example-basic-single"
                                        required>
                                        <option value="">-- Sélectionner un quartier --</option>
                                        @foreach ($quartiers as $quartier)
                                            <option value="{{ $quartier->idquartier }}"{{$pharmacies->quartier_id == $quartier->idquartier ? 'selected': ''}}>{{ $quartier->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center><button type="submit" class="btn btn-success text-center mt-3">Enregistrer</button></center>
                </form>
            </div>
        </div>



    </div>
@endsection


<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

    });
</script>
