<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <center>
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets/logo/logo-homess.png') }}" alt="logo-siha" width="50px"
                                height="50px;"></a>

                    </center>
                </div>
                <div class="toggler">
                    <a href="javascript:void(0);" class="sidebar-hide d-xl-none d-block"><i
                            class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Route::is('dashboard') ? 'active open' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  has-sub {{ Route::is('medicaments.*') ? 'active open' : '' }} {{ Route::is('ordonnances.*') ? 'active open' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Produits</span>
                    </a>
                    <ul class="submenu  {{ Route::is('medicaments.*') ? 'active open' : '' }} {{ Route::is('ordonnances.*') ? 'active open' : '' }}">
                        <li class="submenu-item  {{ Route::is('medicaments.index') ? 'active' : '' }}">
                            <a href="{{ route('medicaments.index') }}">Medicaments</a>
                        </li>
                        <li class="submenu-item {{ Route::is('ordonnances.index') ? 'active' : '' }}">
                            <a href="{{ route('ordonnances.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Without navbar">Ordonnances</div>
                                @if (DB::table('ordonnance_clients')->where('statut', 1)->count() != 0)
                                    <span class="badge rounded-pill bg-danger ms-auto">
                                        {{ DB::table('ordonnance_clients')->where('statut', 1)->count() }}
                                    </span>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('commandes.index') ? 'active' : '' }}">
                    <a href="{{ route('commandes.index') }}" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Commandes</span>
                        @if (DB::table('commandes')->join('paniers', 'commandes.panier_id', '=', 'paniers.idpanier')->select([
                                    'idcommande',
                                    'paniers.produit_id',
                                    'commandes.created_at',
                                    'commandes.panier_id',
                                    'commandes.statut',
                                    'paniers.user_id',
                                    'paniers.idpanier',
                                    'paniers.quantite',
                                    'paniers.prix_unitaire',
                                ])->where('commandes.statut', 'en_attente')->count() != 0)
                            <span class="badge rounded-pill bg-danger ms-auto">
                                {{ DB::table('commandes')->join('paniers', 'commandes.panier_id', '=', 'paniers.idpanier')->select([
                                        'idcommande',
                                        'paniers.produit_id',
                                        'commandes.created_at',
                                        'commandes.panier_id',
                                        'commandes.statut',
                                        'paniers.user_id',
                                        'paniers.idpanier',
                                        'paniers.quantite',
                                        'paniers.prix_unitaire',
                                    ])->where('commandes.statut', 'en_attente')->count() }}

                            </span>
                        @endif
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('paniers.index') ? 'active' : '' }}">
                    <a href="{{ route('paniers.index') }}" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Paniers</span>
                    </a>
                </li>

                <li
                    class="sidebar-item  has-sub {{ Route::is('categoriemedicaments.*') ? 'active open' : '' }} {{ Route::is('regions.*') ? 'active open' : '' }} 
                    {{ Route::is('communes.*') ? 'active open' : '' }} {{ Route::is('formegaleniques.*') ? 'active open' : '' }}
                    {{ Route::is('pharmacies.*') ? 'active open' : '' }} {{ Route::is('assurances.*') ? 'active open' : '' }}
                    {{ Route::is('afficheApp.*') ? 'active open' : '' }} {{ Route::is('users.index') ? 'active open' : '' }}
                    {{ Route::is('quartiers.*') ? 'active open' : '' }} {{ Route::is('pharmacies-gardes.*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Accessibilités</span>
                    </a>

                    <ul class="submenu {{ Route::is('categoriemedicaments.*') ? 'active open' : '' }} {{ Route::is('regions.*') ? 'active open' : '' }} {{ Route::is('communes.*') ? 'active open' : '' }}
                    {{ Route::is('pharmacies.*') ? 'active open' : '' }} {{ Route::is('assurances.*') ? 'active open' : '' }} {{ Route::is('formegaleniques.*') ? 'active open' : '' }}
                    {{ Route::is('afficheApp.*') ? 'active open' : '' }} {{ Route::is('users.index') ? 'active open' : '' }}
                    {{ Route::is('quartiers.*') ? 'active open' : '' }} {{ Route::is('pharmacies-gardes.*') ? 'active open' : '' }}">

                        <li class="submenu-item {{ Route::is('users.index') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}">Utilisateurs</a>
                        </li>

                        <li class="submenu-item {{ Route::is('assurances.index') ? 'active' : '' }}">
                            <a href="{{ route('assurances.index') }}">Assurances</a>
                        </li>
                        <li class="submenu-item {{ Route::is('categoriemedicaments.index') ? 'active' : '' }}">
                            <a href="{{ route('categoriemedicaments.index') }}">Categories</a>
                            </a>
                        </li>
                        <li class="submenu-item {{ Route::is('formegaleniques.index') ? 'active' : '' }}">
                            <a href="{{ route('formegaleniques.index') }}">Formes Galeniques</a>
                        </li>
                        <li
                            class="submenu-item {{ Route::is('pharmacies.index') ? 'active' : '' }} {{ Route::is('pharmacies-gardes.*') ? 'active' : '' }}">
                            <a href="{{ route('pharmacies.index') }}" class="menu-link">
                                <div class="text-truncate" data-i18n="Fluid">Pharmacies</div>
                            </a>
                        </li>
                        <li class="submenu-item  {{ Route::is('regions.index') ? 'active' : '' }}">
                            <a href="{{ route('regions.index') }}">Régions</a>

                        </li>
                        <li class="submenu-item {{ Route::is('communes.index') ? 'active' : '' }}">
                            <a href="{{ route('communes.index') }}">Commnunes</a>
                        </li>
                        <li class="submenu-item {{ Route::is('quartiers.index') ? 'active' : '' }}">
                            <a href="{{ route('quartiers.index') }}">Quartiers</a>
                            </a>
                        </li>
                        <li class="submenu-item {{ Route::is('afficheApp.index') ? 'active' : '' }}">
                            <a href="{{ route('afficheApp.index') }}">Affichage App</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  ">
                    <a href="table.html" class='sidebar-link'>
                        <i class="bi bi-gear-fill"></i>
                        <span>Paramètres</span>
                    </a>
                </li>


                <li class="sidebar-item  ">
                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                        <i class="bi bi-headset"></i>
                        <span>Support Client</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar-item  ">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="sidebar-link btn btn-danger"
                            style="background-color: red; margin-top: 10px; border-radius: 5px; border:none; width: 240px; height: 40px;">
                            <i class="bi bi-box-arrow-left"style="color: white; font-weight: bold"></i>
                            <span style="color: white; font-weight: bold; font-size: 16px">Déconnexion</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
