@extends('layouts.app')

@section('content')
<style>
h2{
  color: rgb(255, 255, 255);
  font-size: 25px;
  text-shadow: rgb(3, 3, 3) 4px 4px 4px;
}
</style>
<section class="container-fluid" id="home">
    <h2>Qui suis-je ?</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 blockHome">
                <figure class="col-xs-12 col-sm-4">
                    <img style="max-width: 100%; float: left;" src="/images/photoPerso.png" alt="Photo de moi hehe">
                    <figcaption>Moi même</figcaption>
                </figure>
                <p style="text-align: justify;">
                    Développeur en cours de validation d'un diplôme de chef de projet logiciel et réseaux à <a href="http://www.esgi.fr/ecole-informatique.html" title="ESGI Ecole d'informatique en alternance">ESGI</a> je suis avant tout un jeune homme curieux et ravi de m'épannouir chaque jour un peu plus dans l'informatique.<br>
                    Passionné en ce moment par le Javascript et les possibilités qu'offrent des frameworks comme Vue.js ou <a href="https://softwareengineering.stackexchange.com/questions/299152/is-node-js-a-framework" title="Is Node.js a framework?">Node.js</a> je prends aussi plaisir à m'intéresser au scripting et notamment aux langages tel que Shell avec lequel il m'arrive de réaliser des petits scripts (link to article) pour soulager mon quotidient.<br>
                    Penché aussi sécurité, hacking et cryptomonnaie je m'intéresse pas mal au python et à Kali Linux la nuit.<br><br>
                    En dehors de l'informatique je suis un gros lecteur de roman et bd assez variés, j'aime la musique de bach à IAM en passant par Justice et Nirvana, j'aime aussi cuisiner et discuter autour d'un bon rouge ou d'un bon wisky. Et particulièrement en cette pérdiode d'examen je m'intéresse à ma santé et a comment me booster physiquement par les plantes et le sport. Un bon vivant somme toute.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid" id="whoami">
    <h2>Compétences</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 blockHome">

            </div>
        </div>
    </div>
</section>
<section class="container-fluid" id="projects">
    <div class="container">
        <div class="row">
            <h2>Mes Projets</h2>
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 blockHome">
                <p>
                    Liste exhaustive de ce que j'ai réalisé vous pouvez avoir plus de détaille ici : LINK
                    TODO : Carousselle pour afficher les différents projet (prend tout la hauteur ? )
                </p>
                <figure>
                    <img src="http://placehold.it/500x500" alt="Photo de moi">
                    <figcaption>Votre programmeur fétishe</figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <h2>Me contacter</h2>
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 blockHome">
                <form>
                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="email">Votre mail</label>
                        <input type="email" class="form-control" id="email"  placeholder="Entrez votre mail">
                    </div>
                    <div class="form-group col-xs-12 col-sm-6">
                        <label for="name">Votre nom</label>
                        <input type="text" class="form-control" id="name" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="message">Votre message</label>
                        <textarea class="form-control" id="message" placeholder="Inscrivez votre message" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary g-recaptcha" style="width:100%"
                    data-sitekey="6LfGuyAUAAAAABpZS_S07pKxDUdE59xThN7Sq-_X"
                    data-callback="YourOnSubmitFn">Envoyer</button>
                    Si je suis injoignable vous pourriez me trouver ici :
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10504.510723377623!2d2.3343453!3d48.8367032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb118bc844f2f417a!2sLes+Grands+Voisins!5e0!3m2!1sfr!2sfr!4v1494367996644" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </form>
            </div>
        </div>
    </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
$( "form" ).on( "submit", function( event ) {
  event.preventDefault();
  console.log( $( this ).serialize() );
});
</script>
@endsection('content')
