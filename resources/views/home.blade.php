<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Application d'achats de produits pharmaceutiques en ligne et consultation des pharmacies de garde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_fronts/images/favicon.svg')}}" /> --}}
    <meta name="google-site-verification" content="MP-PsNpUqipjp3kGMsfBlaiG4M7cfoutiOaC2U1N_bc" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_fronts/css/main.css') }}" />

    <style>
        :root {
            --red: #e21b1b;
            --muted: #f6f6f6;
            --card-bg: #fafafa;
            --border: #e6e6e6;
            --text: #111;
            --blue: #2b5eca;
            --label: #333;
            --input-bg: #fff;
            --radius: 8px;
            --shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        html,
        body {
            height: 100%;
            margin: 0;
            font-family: "Inter", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--text);
            background: white;
        }

        .wrap {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            padding: 48px 64px;
            box-sizing: border-box;
            min-height: 100vh;
        }

        /* gauche : titre */
        .hero {
            flex: 1 1 50%;
            max-width: 650px;
            align-self: center;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.05;
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        /* droite : carte formulaire */
        .card-wrap {
            width: 480px;
            flex: 0 0 480px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 28px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }

        .field {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            color: var(--label);
            margin-bottom: 8px;
            font-weight: 600;
        }

        label .req {
            color: #c40000;
            margin-right: 6px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #dcdcdc;
            background: var(--input-bg);
            font-size: 14px;
        }

        .phone-row {
            display: flex;
            gap: 8px;
        }

        .phone-row .prefix {
            width: 98px;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #dcdcdc;
            background: #fff;
            box-sizing: border-box;
        }

        .form-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 6px;
            padding: 12px;
            border: 1px solid #e0e0e0;
            background: #fff;
            border-radius: 6px;
            font-size: 13px;
            color: #333;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            margin-top: 2px;
        }

        .submit-row {
            margin-top: 16px;
            display: flex;
            justify-content: flex-start;
            gap: 12px;
            align-items: center;
        }

        button[type="submit"] {
            background: var(--blue);
            color: #fff;
            border: 0;
            padding: 9px 16px;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 10px var(--blue);
        }

        /* responsive */
        @media (max-width:880px) {
            .wrap {
                flex-direction: column;
                padding: 28px;
                gap: 20px;
            }

            .card-wrap {
                width: 100%;
                flex: 1 1 auto;
            }

            .hero h1 {
                font-size: 26px;
            }
        }

        .containers {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 80px;
            flex-wrap: wrap;
        }

        .image-sections {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .image-sections img {
            width: 100%;
            max-width: 550px;
            border-radius: 20px;
        }

        .text-sections {
            flex: 1;
            padding-left: 20px;
            min-width: 350px;
        }

        h1 {
            font-size: 2.2rem;
            line-height: 1.3;
            font-weight: bold;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: square;
            color: #555;
            line-height: 1.6;
            /* padding-left: 10px; */
        }

        .btns {
            display: inline-block;
            background-color: var(--blue);
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 1rem;
            margin-top: 30px;
            transition: background 0.3s ease;
        }

        .btns:hover {
            background-color: var(--label);
            color: white;

        }

        @media (max-width: 900px) {
            .containers {
                flex-direction: column;
                text-align: center;
            }

            .text-sections {
                padding-left: 0;
                margin-top: 30px;
            }

            .image-sections img {
                max-width: 400px;
            }
        }
    </style>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('dashboards/assets/logo/logo-home.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#home" class="page-scroll active"
                                            aria-label="Toggle navigation">Home</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="#features" class="page-scroll"
                                            aria-label="Toggle navigation">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pricing" class="page-scroll"
                                            aria-label="Toggle navigation">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="javascript:void(0)">Blog Grid Sidebar</a>
                                            </li>
                                            <li class="nav-item"><a href="javascript:void(0)">Blog Single</a></li>
                                            <li class="nav-item"><a href="javascript:void(0)">Blog Single
                                                    Sibebar</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Contact</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="button add-list-button">
                                <a href="{{ route('dashboard') }}" class="btn">Se Connecter</a>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section id="home" class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInLeft" data-wow-delay=".4s">Expérimenter Siha pour vos médicaments</h1>
                        <p class="wow fadeInLeft" data-wow-delay=".6s">Application d'achats de produits
                            pharmaceutiques
                            en ligne et consultation des pharmacies de garde. </p>
                        <div class="button wow fadeInLeft" data-wow-delay=".8s">
                            <a href="javascript:void(0)" class="btn"><i class="lni lni-apple"></i> App Store</a>
                            <a href="javascript:void(0)" class="btn btn-alt"><i class="lni lni-play-store"></i>
                                Google
                                Play</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('assets_fronts/images/hero/phone.png') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Features Area -->
    <section id="features" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="wow zoomIn" data-wow-delay=".2s">Features</h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">
                            Pourquoi utiliser SIHA
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Cette application est conçue pour vous permettre
                            de commander des
                            produits pharmaceutiques sans vous déplacer.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <i class="lni lni-cloud-upload"></i>
                        <h3>Envoie de vos ordonnances</h3>
                        <p>Siha vous permet de prendre des photos de vos ordonnances pour les envoyer
                            aux pharmacies de votre choix pour traiter votre commande. </p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lni lni-lock"></i>
                        <h3>Consultations de pharmacies de gardes</h3>
                        <p>Elle vous donne la possibilité de consulter les pharmacies de votre
                            zone qui sont en service de garde.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lni lni-reload"></i>
                        <h3>Commandes de produits pharmaceutiques</h3>
                        <p>Possibilité de commander vos médicaments de là où vous vous trouvez pour être livré.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>


                <div class="containers">
                    <!-- SECTION IMAGE -->


                    <!-- SECTION TEXTE -->
                    <div class="text-sections">
                        <h1>Envoyez votre ordonnance depuis votre salon</h1>
                        <ul>
                            <li>Plus besoin de vous déplacer en pharmacie pour obtenir vos produits pharmaceutiques</li>
                            <li>Contrôlez et vérifiez les étapes de votre commande</li>
                            <li>Obtiens tes produits dès maintenant</li>
                        </ul>
                        <a href="#" class="btns">Devenez une entreprise cliente</a>
                    </div>
                    <div class="image-sections">
                        <!-- Remplace ici l'image par ta version modifiée (SIHA) -->
                        <img src="{{asset('assets/images/siha_commande.png')}}" alt="Commande de médicament via SIHA" height="5%;">
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <i class="lni lni-shield"></i>
                        <h3>Echanges</h3>
                        <p>Vous avez la possibilité d'echanger avec un médecin via un chat.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lni lni-cog"></i>
                        <h3>Powerful API</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lni lni-layers"></i>
                        <h3>Database Backups</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Achievement Area -->
    @php
        $user = DB::table('users')->count();
        $pharmacies = DB::table('pharmacies')->count();
    @endphp

    <section class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="title">
                        <h2>Plus de {{ $pharmacies }} Pharmacies enregistrées</h2>
                        <p>Vous avez la possibilitées de consulter ses pharmacies sur notre applications mobile.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                                <h3 class="counter"><span id="secondo1" class="countup" cup-end="100">100</span>%
                                </h3>
                                <p>satisfaction</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                                <h3 class="counter"><span id="secondo2" class="countup" cup-end="120">120</span>K
                                </h3>
                                <p>Clients </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                                <h3 class="counter"><span id="secondo3" class="countup"
                                        cup-end="{{ $user }}">{{ $user }}</span>k+</h3>
                                <p>Telechargements</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achievement Area -->

    <!-- Start Pricing Table Area -->
    <section id="pricing" class="pricing-table section">
        <div class="container">
            <div class="wrap">
                <!-- gauche -->
                <div class="hero" role="region" aria-label="Titre">
                    <h3>
                        Demandez un appel pour<br>
                        démarrer votre aventure<br>
                        automobile dès aujourd'hui!
                    </h3>
                </div>

                <!-- droite -->
                <div class="card-wrap">
                    <form class="card" aria-label="Formulaire de contact">
                        <div class="field">
                            <label><span class="req">*</span> Nom</label>
                            <input type="text" name="nom" placeholder="" required>
                        </div>

                        <div class="field">
                            <label><span class="req">*</span> Numéro de téléphone</label>
                            <div class="phone-row">
                                <input class="prefix" type="text" value="+225" aria-label="préfixe pays" />
                                <input type="text" name="tel" placeholder="Numéro" required>
                            </div>
                        </div>

                        <div class="field">
                            <label><span class="req">*</span> Adresse e-mail</label>
                            <input type="email" name="email" placeholder="adresse@mail.com" required>
                        </div>

                        <div class="field">
                            <label><span class="req">*</span> Nom de l'entreprise</label>
                            <input type="text" name="entreprise" placeholder="">
                        </div>

                        <div class="field">
                            <label><span class="req">*</span> Votre poste</label>
                            <input type="text" name="poste" placeholder="">
                        </div>

                        <div class="field">
                            <label><span class="req">*</span> Taille de l'entreprise</label>
                            <select name="taille">
                                <option value="">-</option>
                                <option>1-10</option>
                                <option>11-50</option>
                                <option>51-200</option>
                                <option>200+</option>
                            </select>
                        </div>

                        <div class="field">
                            <div class="form-note">
                                <input class="checkbox" type="checkbox" id="consent" required>
                                <label for="consent" style="margin:0; font-weight:500; font-size:13px; color:#222;">
                                    J'ai pris connaissance de la Notice de confidentialité et j'accepte que mes données
                                    personnelles soient traitées conformément à cette notice.
                                </label>
                            </div>
                        </div>

                        <div class="submit-row">
                            <button type="submit" class="btn">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Pricing Table Area -->

    <!-- Start Call To Action Area -->
    <section class="section call-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="cta-content">
                        <h2 class="wow fadeInUp" data-wow-delay=".2s">Vous avez encore des questions?
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Demandez à être appelé et un responsable vous
                            contactera pour vous donner tous les détails.</p>
                        <div class="button wow fadeInUp" data-wow-delay=".6s">
                            <a href="javascript:void(0)" class="btn">Enregistrez-vous ici →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Area -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-about">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{ asset('assets/logo/logo-home.png') }}" alt="#">
                                </a>
                            </div>
                            <p>Commandez vos médicaments et trouvez les pharmacies de garde en un clic.</p>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li>
                            </ul>
                            <p class="copyright-text">Designer par <a href="https://sihapp.com/"
                                    rel="nofollow" target="_blank">Sihapp</a>.
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Solutions</h3>
                                    <ul>
                                        <li><a href="javascript:void(0)">Marketing</a></li>
                                        <li><a href="javascript:void(0)">Analytics</a></li>
                                        <li><a href="javascript:void(0)">Commerce</a></li>
                                        <li><a href="javascript:void(0)">Insights</a></li>
                                        <li><a href="javascript:void(0)">Promotion</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Support</h3>
                                    <ul>
                                        <li><a href="javascript:void(0)">Pricing</a></li>
                                        <li><a href="javascript:void(0)">Documentation</a></li>
                                        <li><a href="javascript:void(0)">Guides</a></li>
                                        <li><a href="javascript:void(0)">API Status</a></li>
                                        <li><a href="javascript:void(0)">Live Support</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Company</h3>
                                    <ul>
                                        <li><a href="javascript:void(0)">About Us</a></li>
                                        <li><a href="javascript:void(0)">Our Blog</a></li>
                                        <li><a href="javascript:void(0)">Jobs</a></li>
                                        <li><a href="javascript:void(0)">Press</a></li>
                                        <li><a href="javascript:void(0)">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Legal</h3>
                                    <ul>
                                        <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)">Catering Services</a></li>
                                        <li><a href="javascript:void(0)">Customer Relations</a></li>
                                        <li><a href="javascript:void(0)">Innovation</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets_fronts/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets_fronts/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets_fronts/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets_fronts/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_fronts/js/count-up.min.js') }}"></script>
    <script src="{{ asset('assets_fronts/js/main.js') }}"></script>
    <script type="text/javascript">
        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>
</body>

</html>
