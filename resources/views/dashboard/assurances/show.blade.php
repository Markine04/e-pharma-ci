
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Liste des assurances</h4>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Libelle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assurances as $assurance)
                                    <tr>
                                        <td>{{ $assurance->libelle_carte }}</td>
                                        <td>
                                            <a href="{{ route('assurances.voir', ['id' => $assurance->id_assurance]) }}" class="btn btn-primary btn-sm"
                                                    target="_blank">
                                                        Voir la carte
                                                </a>
                                            <a href="{{ route('assurances.delete', ['id' => $assurance->id_assurance]) }}" class="btn btn-danger btn-sm">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>