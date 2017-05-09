@extends('layouts.app')

@section('content')
<section class="container-fluid" id="home">
    <div class="container">
        <div class="row">
            <h2>Qui suis-je ?</h2>
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
    <div class="container">
        <div class="row">
            <h2>Compétences</h2>
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
                <form action="/admin/contact" method="post">

                </form>
            </div>
        </div>
    </div>
</section>
@endsection('content')
