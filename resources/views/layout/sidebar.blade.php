<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/logo/logo-home.png') }}" alt="" width="140px"></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                    data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="pin-title sidebar-list">
                        <h6>Pinned</h6>
                    </li>
                    <hr>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}"><i
                                data-feather="home"> </i><span>Tableau de bord</span></a></li>

                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('medicaments.index') }}"><i
                                data-feather="droplet"> </i><span>Medicaments</span></a></li>

                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('ordonnances.index') }}"><i
                                data-feather="file-text"> </i><span>Ordonnances
                                @if (DB::table('ordonnance_clients')->where('statut', 1)->count() != 0)
                                    <span class="badge badge-danger">
                                        {{ DB::table('ordonnance_clients')->where('statut', 1)->count() }}
                                    </span>
                                @endif
                            </span></a>

                    </li>

                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('commandes.index') }}"><i
                                data-feather="shopping-bag"> </i><span>Commandes &nbsp;
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
                                  </span></a>
                        
                    </li>

                    <li class="sidebar-list" {{ Route::is('paniers.index') ? 'active' : '' }}><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('paniers.index') }}"><i
                                data-feather="shopping-cart"> </i><span>Paniers</span></a></li>
<hr>
                    <li class="sidebar-list {{ Route::is('categoriemedicaments.*') ? 'active open' : '' }} {{ Route::is('regions.*') ? 'active open' : '' }} 
                    {{ Route::is('communes.*') ? 'active open' : '' }} {{ Route::is('formegaleniques.*') ? 'active open' : '' }}
                    {{ Route::is('pharmacies.*') ? 'active open' : '' }} {{ Route::is('assurances.*') ? 'active open' : '' }}
                    {{ Route::is('afficheApp.*') ? 'active open' : '' }} {{ Route::is('users.index') ? 'active open' : '' }}
                    {{ Route::is('quartiers.*') ? 'active open' : '' }} {{ Route::is('pharmacies-gardes.*') ? 'active open' : '' }}
                      {{ Route::is('datephciegardes.*') ? 'active open' : '' }}">
                      <i class="fa fa-layers"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)"><i data-feather="layers"></i><span
                                class="">Accessibilités</span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="{{ Route::is('datephciegardes.index') ? 'active' : '' }}" href="{{ route('datephciegardes.index') }}">Date Phcie Gardes</a></li>
                            <li><a class="{{ Route::is('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Utilisateurs</a></li>
                            <li><a class="{{ Route::is('assurances.index') ? 'active' : '' }}" href="{{ route('assurances.index') }}">Assurances</a></li>
                            <li><a class="{{ Route::is('categoriemedicaments.index') ? 'active' : '' }}" href="{{ route('categoriemedicaments.index') }}">Categories</a></li>
                            <li><a class="{{ Route::is('formegaleniques.index') ? 'active' : '' }}" href="{{ route('formegaleniques.index') }}">Forme Galeniques</a></li>
                            <li><a class="{{ Route::is('pharmacies.index') ? 'active' : '' }} {{ Route::is('pharmacies-gardes.*') ? 'active' : '' }}" href="{{ route('pharmacies.index') }}">Pharmacies</a></li>
                            <li><a class="{{ Route::is('regions.index') ? 'active' : '' }}" href="{{ route('regions.index') }}">Régions</a></li>
                            <li><a class="{{ Route::is('communes.index') ? 'active' : '' }}" href="{{ route('communes.index') }}">Communes</a></li>
                            <li><a class="{{ Route::is('quartiers.index') ? 'active' : '' }}" href="{{ route('quartiers.index') }}">Quartiers</a></li>
                            <li><a class="{{ Route::is('afficheApp.index') ? 'active' : '' }}" href="#">Affichage App</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="#"><i data-feather="settings">
                            </i><span>Paramètres</span></a></li>
                  
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('support_ticket') }}"><i
                                data-feather="users"> </i><span>Support Ticket</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
