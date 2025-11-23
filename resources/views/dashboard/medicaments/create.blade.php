<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>
    <meta name="description"
        content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('fronts/assets/logo/logoSiha.png') }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eaeaea;
        }

        header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 2.2rem;
        }

        header p {
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        .form-section {
            margin-bottom: 25px;
            padding: 20px;
            border-radius: 10px;
            background: #f8f9fa;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .form-section h2 {
            color: #3498db;
            margin-bottom: 20px;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }

        .form-section h2 i {
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 10px;
            transform: scale(1.2);
        }

        .required::after {
            content: " *";
            color: #e74c3c;
        }

        .btn-submit {
            background: #3498db;
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            display: block;
            margin: 30px auto 0;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.3);
        }

        .btn-submit:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(52, 152, 219, 0.4);
        }

        /* Dropzone Styles */
        .dropzone {
            border: 2px dashed #3498db;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background: #f8f9fa;
            transition: all 0.3s;
            cursor: pointer;
        }

        .dropzone:hover {
            background: #e8f4ff;
            border-color: #2980b9;
        }

        .dropzone i {
            font-size: 48px;
            color: #3498db;
            margin-bottom: 15px;
        }

        .dropzone p {
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .dropzone-button {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .dropzone-button:hover {
            background: #2980b9;
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .preview-item {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-item button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(231, 76, 60, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            margin: 0;
        }

        .preview-item button:hover {
            background: rgba(192, 57, 43, 0.9);
        }

        /* Select2 customization */
        .select2-container--default .select2-selection--single {
            height: 46px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 24px;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        /* CSRF Token style */
        .csrf-token {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('medicaments.index') }}" style='text-decoration: none;'><i class="fas fa-pills"></i>Medicaments</a></li>
                        <li class="breadcrumb-item active">Formulaire d'Enregistrement</li>
                    </ol>
                </div>
        <header>
            <h1><i class="fas fa-pills"></i> Formulaire d'Enregistrement de Produit</h1>
            <p>Veuillez remplir tous les champs obligatoires (*)</p>
        </header>

        <!-- Formulaire Laravel -->
        <form id="productForm" method="POST" action="{{ route('medicaments.store') }}" enctype="multipart/form-data">
            @csrf <!-- Token de sécurité Laravel -->

            <!-- Section Identification -->
            <div class="form-section">
                <h2><i class="fas fa-barcode"></i> Identification du Produit</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="barcode" class="required">Code Barre</label>
                            <input type="text" id="barcode" name="barcode" value="{{ old('barcode') }}" required
                                class="form-control">
                            @error('barcode')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="name" class="required">Nom du Produit</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="active_ingredient" class="required">Principe Actif</label>
                            <input type="text" id="active_ingredient" name="active_ingredient"
                                value="{{ old('active_ingredient') }}" required class="form-control">
                            @error('active_ingredient')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Caractéristiques -->
            <div class="form-section">
                <h2><i class="fas fa-file-medical"></i> Caractéristiques du Produit</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-">
                        <div class="form-group">
                            <label for="dosage" class="required">Dosage</label>
                            <input type="text" id="dosage" name="dosage" value="{{ old('dosage') }}"
                                placeholder="ex: 500mg" required class="form-control">
                            @error('dosage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="galenic_form" class="required">Forme Galénique</label>
                            <select id="galenic_form" name="galenic_form" class="form-control select2" required>
                                <option value="">Sélectionnez...</option>
                                @foreach ($formesGaleniques as $items)
                                    <option value="{{ $items->id_formegalenique }}">{{ $items->libelle }}</option>
                                @endforeach
                            </select>
                            @error('galenic_form')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category" class="required">Catégorie</label>
                            <select id="category" name="category[]" class="form-control select2" multiple required>
                                <option value="">Sélectionnez...</option>
                                @foreach ($categories as $items)
                                    <option value="{{ $items->idcategorie }}">{{ $items->libelle }}</option>
                                @endforeach
                                {{-- <option value="1">Analgésique</option>
                                <option value="2">Antibiotique</option>
                                <option value="3">Antidépresseur</option>
                                <option value="4">Cardiovasculaire</option>
                                <option value="5">Dermatologique</option>
                                <option value="6" {{ old('category') == 'autre' ? 'selected' : '' }}>Autre
                                </option> --}}
                            </select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h2><i class="fas fa-info-circle"></i> Indications</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="indication">Description indication</label>
                            <textarea id="indication" name="indication" placeholder="indication détaillée du produit..." class="form-control"
                                rows="5">{{ old('description') }}</textarea>
                            @error('indication')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h2><i class="fas fa-info-circle"></i> Posologies</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="posologie">Description posologie</label>
                            <textarea id="posologie" name="posologie" placeholder="posologie détaillée du produit..." class="form-control"
                                rows="5">{{ old('posologie') }}</textarea>
                            @error('posologie')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h2><i class="fas fa-info-circle"></i> Contre-indications</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="contreindication">Description contre-indication</label>
                            <textarea id="contreindication" name="contreindication" placeholder="contre-indication détaillée du produit..."
                                class="form-control" rows="5">{{ old('contreindication') }}</textarea>
                            @error('contreindication')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section">
                <h2><i class="fas fa-info-circle"></i> Compositions</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="composition">Description composition</label>
                            <textarea id="composition" name="composition" placeholder="composition détaillée du produit..." class="form-control"
                                rows="5">{{ old('composition') }}</textarea>
                            @error('composition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Fournisseur et Prix -->
            <div class="form-section">
                <h2><i class="fas fa-truck"></i> Fournisseur et Prix</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="supplier" class="required">Fournisseur</label>
                            <select id="supplier" name="supplier" class="form-control select2" required>
                                <option value="">Sélectionnez...</option>
                                <option value="1" {{ old('supplier') == 'pfizer' ? 'selected' : '' }}>Pfizer
                                </option>
                                <option value="2" {{ old('supplier') == 'novartis' ? 'selected' : '' }}>Novartis
                                </option>
                                <option value="3" {{ old('supplier') == 'roche' ? 'selected' : '' }}>Roche
                                </option>
                                <option value="4" {{ old('supplier') == 'sanofi' ? 'selected' : '' }}>Sanofi
                                </option>
                                <option value="5" {{ old('supplier') == 'merck' ? 'selected' : '' }}>Merck
                                </option>
                                <option value="6" {{ old('supplier') == 'gsk' ? 'selected' : '' }}>
                                    GlaxoSmithKline</option>
                                <option value="7" {{ old('supplier') == 'johnson' ? 'selected' : '' }}>Johnson &
                                    Johnson</option>
                                <option value="8" {{ old('supplier') == 'astrazeneca' ? 'selected' : '' }}>
                                    AstraZeneca</option>
                                <option value="9" {{ old('supplier') == 'autre' ? 'selected' : '' }}>Autre
                                </option>
                            </select>
                            @error('supplier')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="purchase_price" class="required">Prix d'Achat (€)</label>
                            <input type="number" id="purchase_price" name="purchase_price"
                                value="{{ old('purchase_price') }}" step="0.01" min="0" required
                                class="form-control">
                            @error('purchase_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="selling_price" class="required">Prix de Vente (€)</label>
                            <input type="number" id="selling_price" name="selling_price"
                                value="{{ old('selling_price') }}" step="0.01" min="0" required
                                class="form-control">
                            @error('selling_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="vat_rate" class="required">Taux de TVA (%)</label>
                            <input type="number" id="vat_rate" name="vat_rate" value="{{ old('vat_rate', 20) }}"
                                min="0" max="30" required class="form-control">
                            @error('vat_rate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="packaging" class="required">Conditionnement</label>
                            <input type="text" id="packaging" name="packaging" value="{{ old('packaging') }}"
                                placeholder="ex: Boîte de 30" required class="form-control">
                            @error('packaging')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="storage_temperature">Température de Conservation (°C)</label>
                            <input type="text" id="storage_temperature" name="storage_temperature"
                                value="{{ old('storage_temperature') }}" placeholder="ex: Entre 15 et 25"
                                class="form-control">
                            @error('storage_temperature')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Informations supplémentaires -->
            <div class="form-section">
                <h2><i class="fas fa-info-circle"></i> Informations Supplémentaires</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                        <div class="form-group">
                            <label for="prescription_required">Prescription Requise</label>
                            <div class="checkbox-group">
                                <input type="checkbox" id="prescription_required" name="prescription_required"
                                    value="1" {{ old('prescription_required') ? 'checked' : '' }}
                                    class="form-check-input">
                                <label for="prescription_required">Nécessite une ordonnance</label>
                            </div>
                            @error('prescription_required')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Description détaillée du produit..."
                                class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Images -->
            <div class="form-section">
                <h2><i class="fas fa-images"></i> Images du Produit</h2>
                <div class="dropzone" id="dropzone">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Glissez-déposez vos images ici ou</p>
                    <div class="dropzone-button">Parcourir les fichiers</div>
                    <input type="file" id="images" name="images[]" multiple accept="image/*"
                        style="display: none;">
                </div>

                <div class="preview-container" id="previewContainer">
                    <!-- Les images prévisualisées apparaîtront ici -->

                </div>
                @error('images.*')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Enregistrer le Produit</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        // Initialiser Select2 pour tous les selects avec la classe .select2
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Sélectionnez une option",
                allowClear: true,
                width: '100% !important',
                // width: 'resolve'
                tags: true
            });

            // $(document).ready(function() {
            // $('.js-example-basic-multiple').select2({
            //     placeholder: "Sélectionnez une option",
            //     // allowClear: true,
            //     // width: '100%'
            // });

            // });

            // Traduire Select2 en français
            $('.select2').each(function() {
                $(this).select2({
                    language: {
                        noResults: function() {
                            return "Aucun résultat trouvé";
                        },
                        searching: function() {
                            return "Recherche en cours...";
                        }
                    }
                });
            });
        });

        // Validation du formulaire
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Vous pouvez ajouter une validation supplémentaire ici si nécessaire
        });

        // Calcul automatique du prix de vente suggéré basé sur le prix d'achat et la TVA
        document.getElementById('purchase_price').addEventListener('blur', function() {
            const purchasePrice = parseFloat(this.value);
            const vatRate = parseFloat(document.getElementById('vat_rate').value);

            if (!isNaN(purchasePrice) && !isNaN(vatRate)) {
                const suggestedPrice = purchasePrice + 50; // Marge de 30%
                const priceWithVat = suggestedPrice * (1 + vatRate / 100);
                document.getElementById('selling_price').value = priceWithVat.toFixed(2);
            }
        });


        const dropZone = document.getElementById("dropzone");
        const fileInput = document.getElementById("images"); // correction
        const previewContainer = document.getElementById("previewContainer");
        const form = document.getElementById("productForm");

        // Click → ouvrir l’explorateur
        dropZone.addEventListener("click", () => fileInput.click());

        // Drag over
        dropZone.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZone.classList.add("dragover");
            dropZone.style.background = '#e3f2fd';
            dropZone.style.borderColor = '#2980b9';
        });

        // Drag leave
        dropZone.addEventListener("dragleave", () => {
            dropZone.classList.remove("dragover");
            dropZone.style.background = '#f8f9fa';
            dropZone.style.borderColor = '#3498db';
        });

        // Drop
        dropZone.addEventListener("drop", (e) => {
            e.preventDefault();
            dropZone.classList.remove("dragover");
            uploadFiles(e.dataTransfer.files);

            dropZone.style.background = '#f8f9fa';
            dropZone.style.borderColor = '#3498db';
        });

        // Input file classique
        fileInput.addEventListener("change", () => uploadFiles(fileInput.files));


        // Fonction upload AJAX → upload/temp
        function uploadFiles(files) {
            [...files].forEach(file => {

                let formData = new FormData();
                formData.append("file", file);
                formData.append("_token", "{{ csrf_token() }}");

                fetch("{{ route('upload.temp') }}", {
                        method: "POST", // IMPORTANT
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {

                            // Ajout input hidden pour store()
                            let hidden = document.createElement("input");
                            hidden.type = "hidden";
                            hidden.name = "temp_images[]";
                            hidden.value = data.temp_filename;
                            form.appendChild(hidden);

                            // Zone preview
                            const previewItem = document.createElement("div");
                            previewItem.className = "preview-item";

                            const img = document.createElement("img");
                            img.src = "/storage/temp/" + data.temp_filename;

                            const removeBtn = document.createElement("button");
                            removeBtn.innerHTML = "×";
                            removeBtn.onclick = function(e) {
                                e.preventDefault();
                                previewItem.remove();
                                hidden.remove();
                            };

                            previewItem.appendChild(img);
                            previewItem.appendChild(removeBtn);
                            previewContainer.appendChild(previewItem);
                        }
                    });
            });
        }
    </script>
</body>

</html>
