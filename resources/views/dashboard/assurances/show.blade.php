
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
                                                    {{-- <img src="{{ asset('storage/assurances-cartes/' . $assurance->images) }}"
                                                        alt="{{ $assurance->id_assurance }}" width="90px" height="70px"> --}}
                                                        Voir la carte
                                                </a>
                                            {{-- <a href="{{ route('assurances.voir', ['id' => $assurance->id_assurance]) }}" class="btn btn-primary btn-sm">Voir la carte</a> --}}
                                            {{-- <a href="{{ route('assurances.edit', $assurance->id) }}" class="btn btn-primary btn-sm">Modifier</a> --}}
                                            <a href="{{ route('assurances.destroy', ['id' => $assurance->id_assurance]) }}" class="btn btn-danger btn-sm">Supprimer</a>
                                            <!-- Actions such as Edit/Delete can be added here -->
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