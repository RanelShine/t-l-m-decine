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
                    <form  action="{{route('contact')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Votre Nom" required data-error="Veuillez saisir votre nom">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Votre Email" id="email" class="form-control" name="email" required data-error="Veuillez saisir votre email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="votre intitulé" id="subject" class="form-control" name="subject" required data-error="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="Votre Message" rows="8" data-error="Écrivez votre message" required></textarea>
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
                            <h4>suject</h4>
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