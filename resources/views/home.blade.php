@extends('Layouts.HomeLayout')

@section('content')

@auth
    <div class="card-header text-center">
        Salut, {{ Auth::user()->name }}.
        @if(Auth::user()->roles->isNotEmpty())
            {{ Auth::user()->roles->first()->name }}
        @else
            (Aucun rôle)
        @endif
    </div>
@endauth
<!-- Début Bannière -->
<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="pogoSlider" id="js-main-slider">
                <div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(assets/User/images/slider-01.jpg);">
                    <div class="lbox-caption pogoSlider-slide-element">
                        <div class="lbox-details">
                            <h1>Bienvenue sur DocTalk </h1>
                            <p>Des soins de qualité pour votre bien-être quotidien</p>
                            <a href="#" class="btn">Contactez-nous</a>
                        </div>
                    </div>
                </div>
                <div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(assets/User/images/slider-02.jpg);">
                    <div class="lbox-caption pogoSlider-slide-element">
                        <div class="lbox-details">
                            <h1>Experts en Analyses Médicales</h1>
                            <p>Des résultats précis pour une meilleure santé</p>
                            <a href="#appointment" class="btn">Prendre Rendez-vous</a>
                        </div>
                    </div>
                </div>
                <div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background-image:url(assets/User/images/slider-03.jpg);">
                    <div class="lbox-caption pogoSlider-slide-element">
                        <div class="lbox-details">
                            <h1>Votre Santé, Notre Priorité</h1>
                            <p>Un accompagnement personnalisé à chaque étape</p>
                            <a href="#" class="btn">Contactez-nous</a>
                        </div>
                    </div>
                </div>
            </div><!-- .pogoSlider -->
        </div>
    </div>
</div>
<!-- Fin Bannière -->

<!-- Début À Propos -->
<div id="about" class="about-box">
    <div class="about-a1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box">
                        <h2>À Propos de Nous</h2>
                        <p>Découvrez notre engagement pour votre santé</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row align-items-center about-main-info">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h2> Bienvenue sur MedicTalk</h2>
                            <p>Fondé en 2010, notre laboratoire s'engage à fournir des analyses médicales de haute précision dans un environnement accueillant et professionnel. Nos équipements de dernière génération et notre personnel qualifié garantissent des résultats fiables.</p>
                            <p>Nous collaborons avec les meilleurs spécialistes pour vous offrir un service complet allant des bilans de routine aux examens spécialisés. Votre confort et votre santé sont au cœur de nos préoccupations.</p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="about-m">
                                <ul id="banner">
                                    <li>
                                        <img src="assets/User/images/about-img-01.jpg" alt="Notre laboratoire">
                                    </li>
                                    <li>
                                        <img src="assets/User/images/about-img-02.jpg" alt="Équipements modernes">
                                    </li>
                                    <li>
                                        <img src="assets/User/images/about-img-03.jpg" alt="Équipe médicale">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin À Propos -->

<!-- Début Services -->
<div id="services" class="services-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Nos Services</h2>
                    <p>Des solutions complètes pour vos besoins de santé</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-h-square" aria-hidden="true"></i></div>
                            <h3 class="title">Analyses de Sang</h3>
                            <p class="description">
                                Bilans complets, marqueurs biologiques, dépistages variés avec résultats rapides.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                            <h3 class="title">Cardiologie</h3>
                            <p class="description">
                                Examens cardiaques spécialisés et suivi personnalisé de votre santé cardiovasculaire.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></div>
                            <h3 class="title">Imagerie Médicale</h3>
                            <p class="description">
                                Échographies, radiographies et IRM avec des appareils haute résolution.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
                            <h3 class="title">Consultations</h3>
                            <p class="description">
                                Rencontrez nos spécialistes pour un diagnostic précis et un traitement adapté.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
                            <h3 class="title">Kinésithérapie</h3>
                            <p class="description">
                                Rééducation fonctionnelle et programmes de réadaptation sur mesure.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
                            <h3 class="title">Urgences</h3>
                            <p class="description">
                                Service d'urgences médicales disponible 24h/24 avec équipe dédiée.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
                            <h3 class="title">Médecine Générale</h3>
                            <p class="description">
                                Soins primaires complets pour toute la famille, du nourrisson au senior.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-user-md" aria-hidden="true"></i></div>
                            <h3 class="title">Spécialistes</h3>
                            <p class="description">
                                Accès à des médecins spécialistes dans plus de 15 disciplines différentes.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="serviceBox">
                            <div class="service-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></div>
                            <h3 class="title">Transport Médical</h3>
                            <p class="description">
                                Service de transport adapté pour patients à mobilité réduite ou besoins spécifiques.
                            </p>
                            <a href="#" class="new-btn-d br-2">En Savoir Plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>			
    </div>
</div>
<!-- Fin Services -->

<!-- Début Rendez-vous -->
<div id="appointment" class="appointment-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Prendre Rendez-vous</h2>
                    <p>Planifiez votre visite en quelques clics</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="well-block">
                    <div class="well-title">
                        <h2>Formulaire de Rendez-vous</h2>
                    </div>
                    <form>
                        <!-- Formulaire début -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Nom Complet</label>
                                    <input id="name" name="name" type="text" placeholder="Votre nom" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="email" name="email" type="text" placeholder="Votre email" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="date">Date Souhaitée</label>
                                    <input id="date" name="date" type="text" placeholder="JJ/MM/AAAA" class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="time">Heure Souhaitée</label>
                                    <select id="time" name="time" class="form-control">
                                        <option value="8:00 à 9:00">8:00 à 9:00</option>
                                        <option value="9:00 à 10:00">9:00 à 10:00</option>
                                        <option value="10:00 à 13:00">10:00 à 13:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="appointmentfor">Spécialité</label>
                                    <select id="appointmentfor" name="appointmentfor" class="form-control">
                                        <option value="Choisir une spécialité">Choisir une spécialité</option>
                                        <option value="Gynécologie">Gynécologie</option>
                                        <option value="Dermatologie">Dermatologie</option>
                                        <option value="Orthopédie">Orthopédie</option>
                                        <option value="Anesthésie">Anesthésie</option>
                                        <option value="Médecine Générale">Médecine Générale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button id="singlebutton" name="singlebutton" class="new-btn-d br-2">Confirmer le Rendez-vous</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Formulaire fin -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="well-block">
                    <div class="well-title">
                        <h2>Pourquoi Nous Choisir</h2>
                    </div>
                    <div class="feature-block">
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Ouvert 24h/24</h4>
                            <div class="feature-content">
                                <p>Notre établissement reste accessible en permanence pour répondre à vos urgences médicales.</p>
                            </div>
                        </div>
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Équipe Expérimentée</h4>
                            <div class="feature-content">
                                <p>Des professionnels de santé diplômés et constamment formés aux dernières techniques.</p>
                            </div>
                        </div>
                        <div class="feature feature-blurb-text">
                            <h4 class="feature-title">Tarifs Accessibles</h4>
                            <div class="feature-content">
                                <p>Des prestations de qualité à des prix transparents et conventionnés avec les mutuelles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Rendez-vous -->

{{-- <!-- Début Galerie -->
<div id="gallery" class="gallery-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Galerie</h2>
                    <p>Découvrez notre établissement en images</p>
                </div>
            </div>
        </div>
        
        <div class="popup-gallery row clearfix">
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-01.jpg" alt="Salle d'attente">
                    <div class="box-content">	
                        <h3 class="title">Espace Accueil</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-01.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-02.jpg" alt="Laboratoire d'analyses">
                    <div class="box-content">
                        <h3 class="title">Laboratoire</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-02.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">					
                <div class="box-gallery">
                    <img src="images/gallery-03.jpg" alt="Équipement d'imagerie">
                    <div class="box-content">							
                        <ul class="icon">
                            <li><a href="images/gallery-03.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-04.jpg" alt="Salle de consultation">
                    <div class="box-content">	
                        <h3 class="title">Cabinet Médical</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-04.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-05.jpg" alt="Service d'urgences">
                    <div class="box-content">							
                        <h3 class="title">Urgences</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-05.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">					
                <div class="box-gallery">
                    <img src="images/gallery-06.jpg" alt="Salle de kinésithérapie">
                    <div class="box-content">
                        <h3 class="title">Kinésithérapie</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-06.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-07.jpg" alt="Équipe médicale">
                    <div class="box-content">
                        <h3 class="title">Notre Équipe</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-07.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="box-gallery">
                    <img src="images/gallery-08.jpg" alt="Accueil patients">
                    <div class="box-content">		
                        <h3 class="title">Accueil</h3>
                        <ul class="icon">
                            <li><a href="images/gallery-08.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Galerie --> --}}

<!-- Début Équipe -->
<div id="team" class="team-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Nos Médecins</h2>
                    <p>Rencontrez nos spécialistes qualifiés</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="assets/User/images/img-1.jpg" alt="Dr. Dupont">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Dr. Dupont</h3>
                        <span class="post">Cardiologue</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="assets/User/images/img-2.jpg" alt="Dr. Martin">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Dr. Martin</h3>
                        <span class="post">Pédiatre</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="assets/User/images/img-3.jpg" alt="Dr. Leroy">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Dr. Leroy</h3>
                        <span class="post">Chirurgien</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Équipe -->

{{-- <!-- Début Blog -->
<div id="blog" class="blog-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Actualités</h2>
                    <p>Restez informés sur la santé et nos services</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-inner">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img-01.jpg" alt="Prévention santé" />
                    </div>
                    <div class="item-meta">
                        <a href="#"><i class="fa fa-comments-o"></i> 5 Commentaires </a>
                        <a href="#"><i class="fa fa-user-o"></i> Admin</a>
                        <span class="dti">25 Juillet 2023</span>
                    </div>
                    <h2>10 Conseils pour un Été en Pleine Santé</h2>
                    <p>Découvrez nos recommandations pour profiter de l'été tout en prenant soin de votre santé.</p>
                    <a class="new-btn-d br-2" href="#">Lire Plus <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-inner">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img-02.jpg" alt="Nouveaux équipements" />
                    </div>
                    <div class="item-meta">
                        <a href="#"><i class="fa fa-comments-o"></i> 3 Commentaires </a>
                        <a href="#"><i class="fa fa-user-o"></i> Admin</a>
                        <span class="dti">15 Juin 2023</span>
                    </div>
                    <h2>Modernisation de Notre Plateau Technique</h2>
                    <p>Nous avons investi dans de nouveaux équipements pour des diagnostics plus précis et moins invasifs.</p>
                    <a class="new-btn-d br-2" href="#">Lire Plus <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-inner">
                    <div class="blog-img">
                        <img class="img-fluid" src="images/blog-img-03.jpg" alt="Campagne vaccination" />
                    </div>
                    <div class="item-meta">
                        <a href="#"><i class="fa fa-comments-o"></i> 8 Commentaires </a>
                        <a href="#"><i class="fa fa-user-o"></i> Admin</a>
                        <span class="dti">2 Mai 2023</span>
                    </div>
                    <h2>Campagne de Vaccination Automnale</h2>
                    <p>Préparez-vous dès maintenant pour la saison hivernale avec nos programmes de vaccination.</p>
                    <a class="new-btn-d br-2" href="#">Lire Plus <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Blog --> --}}

<!-- Début Contact -->
<div id="contact" class="contact-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box">
                    <h2>Contactez-nous</h2>
                    <p>Nous sommes à votre écoute pour toute question</p>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 col-xs-12">
              <div class="contact-block">
                <form id="contactForm">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre Nom" required data-error="Veuillez saisir votre nom">
                            <div class="help-block with-errors"></div>
                        </div>                                 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" placeholder="Votre Email" id="email" class="form-control" name="name" required data-error="Veuillez saisir votre email">
                            <div class="help-block with-errors"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="Votre Téléphone" id="number" class="form-control" name="number" required data-error="Veuillez saisir votre numéro">
                            <div class="help-block with-errors"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <textarea class="form-control" id="message" placeholder="Votre Message" rows="8" data-error="Écrivez votre message" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="submit-button text-center">
                            <button class="btn btn-common" id="submit" type="submit">Envoyer le Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div> 
                            <div class="clearfix"></div> 
                        </div>
                    </div>
                  </div>            
                </form>
              </div>
            </div>
            
            
            <div class="col-lg-12 col-xs-12">
                <div class="left-contact">
                    <h2>Coordonnées</h2>
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Adresse</h4>
                            <p>123 Rue de la Santé, 75000 Paris, France</p>
                        </div>
                    </div>
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Email</h4>
                            <a href="#">contact@laboratoiresante.fr</a><br>
                            <a href="#">urgences@laboratoiresante.fr</a>
                        </div>
                    </div>
                    <div class="media cont-line">
                        <div class="media-left icon-b">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        </div>
                        <div class="media-body dit-right">
                            <h4>Téléphone</h4>
                            <a href="#">01 23 45 67 89</a><br>
                            <a href="#">06 12 34 56 78 (Urgences)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Contact -->

<!-- Début Newsletter -->
<div class="subscribe-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="subscribe-inner text-center clearfix">
                    <h2>Newsletter</h2>
                    <p>Abonnez-vous pour recevoir nos conseils santé et actualités médicales.</p>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input class="form-control-1" id="email-1" name="email" placeholder="Votre Email" required="" type="text">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="new-btn-d br-2">
                                S'abonner
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Fin Newsletter -->
@endsection