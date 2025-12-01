@extends('layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('main_content')
    <style>
        :root {
            --primary: #0d6efd;
            --card-bg: #ffffff;
            --muted: #6c757d;
        }

        body {
            background: linear-gradient(180deg, #f6f9ff 0%, #eef4ff 100%);
        }

        .hero {
            padding: 12px 0;
        }

        .card-ghost {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.9));
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(16, 24, 40, 0.06);
            padding: 18px;
        }

        .avatar-sm {
            width: 64px;
            height: 84px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <div class="hero row align-items-center mb-4">
                <div class="col-md-8">
                    <h1 class="h3 mb-1">Programme Pharmacies de Garde</h1>
                    <p class="text-muted mb-0">Consultez et gérez les pharmacies de garde par date et commune.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    {{-- <button class="btn btn-primary" id="btnAdd">Ajouter un service de garde</button> --}}

                    <a data-url="{{ route('pharmacies-gardes.create') }}" class="btn btn-primary text-white"
                        data-bs-toggle="modal" data-ajax-popup="true" data-size="md"
                        data-title="Ajouter une pharmacie de garde">
                        <i class="si si-note" style="font-size: 15px;"></i>Ajouter une
                        pharmacie de garde</a>
                </div>
            </div>

            {{-- Formulaire de recherche --}}
            <form action="" method="get" id="body">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4 mb-2">
                        <select id="selection" name="date" class="form-select selection">
                            <option value="">Toutes les Dates</option>
                            @foreach ($datePhcieGarde as $item)
                                <option value="{{ $item->idatephciegardes }}">De
                                    {{ date('d/m/Y', strtotime($item->date_debut)) }} à
                                    {{ date('d/m/Y', strtotime($item->date_fin)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="commune_id" class="form-select js-example-basic-single">
                            <option value="">Toutes les communes</option>
                            @foreach ($Communes as $commune)
                                <option value="{{ $commune->idcommune }}">{{ $commune->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2 text-md-end text-center">
                        <button id="btnSearch" class="btn btn-outline-primary">Rechercher</button>
                        <button id="btnToday" class="btn btn-outline-secondary">Aujourd'hui</button>
                    </div>
                </div>
            </form>


            <div id="results" class="row g-3">
                <!-- Résultats -->
                @foreach ($pharmaciesGardes as $item)
                    @foreach (json_decode($item->pharmacie_id) as $elements)
                        @php
                            $pharmacieDetails = DB::table('pharmacies')->where('idpharmacie', $elements)->get();
                        @endphp
                        @foreach ($pharmacieDetails as $pharmacie)
                            <div class="col-12">
                                <div class="card">
                                    <div class="d-flex align-items-start">
                                        @if ($pharmacie->images == null)
                                            <img class="avatar-sm me-3" src="{{ asset('assets/logo/logoSiha.png') }}"
                                                alt="{{ $pharmacie->name }}" width="90px" height="70px">
                                        @else
                                            <img class="avatar-sm me-3"
                                                src="{{ asset('storage/pharmacies/' . $pharmacie->images) }}"
                                                alt="{{ $pharmacie->name }}" width="90px" height="70px">
                                        @endif
                                        <div class="flex-grow-1">
                                            <h5 class="mb-0 name">{{ $pharmacie->name }}</h5>
                                            <div class="text-muted small commune">

                                                {{ DB::table('communes')->where('idcommune', $pharmacie->commune_id)->get()[0]->name }}
                                                -
                                                @if ($pharmacie->quartier_id == null) 
                                                    <span class="text-danger">Quartier non défini</span>
                                                @else
                                                {{ DB::table('quartiers')->where('idquartier', $pharmacie->quartier_id)->get()[0]->nom }}
                                                    
                                                @endif
                                            </div>
                                            <div class="mt-2">
                                                <span class="badge bg-info text-dark period">En garde</span>
                                                <span class="ms-2 note text-muted small">De
                                                    {{ date('d/m/Y', strtotime($item->date_debut)) }} à
                                                    {{ date('d/m/Y', strtotime($item->date_fin)) }}</span>
                                            </div>
                                        </div><br>
                                        <div class="ms-3">
                                            <button class="btn btn-sm btn-outline-secondary btn-edit">Modifier</button>
                                            <button class="btn btn-sm btn-outline-danger btn-delete">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
        <!-- Select2 -->
    @endsection

    <script>
        
        $(document).ready(function() {
            $('#selection').select2({
                placeholder: "Sélectionner une date",
                width: '100%',
                // allowClear: true
            });
        });
    </script>
