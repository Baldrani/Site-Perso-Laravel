@extends('common.layout')

@section('content')
<section class="container-fluid">
    <!-- <div id="tuto">
      <p v-text="texte"></p>
      @{{test | uppercase}}
    </div>
    <script type="text/javascript">
        var vm = new Vue({
            el: '#tuto',
            data: {
                texte : ''
            }
        });
        vm.texte = 'test';
        vm.test = "yolo";
        setTimeout(function(){ vm.texte = 'Mon autre texte'; }, 3000);
    </script> -->

    <!-- <div id="tuto" class="text-center">
           <h1>Vous êtes là depuis :</h1>
           <h1>
             <div class="label label-primary">@{{ heures }}</div> heures
             <span class="label label-primary">@{{ minutes }}</span> minutes
             <span class="label label-primary">@{{ secondes }}</span> secondes
           </h1>
             <h1>
              <button class="button btn-primary" v-on:click="++n">+</button> @{{ n }}
            </h1>
         </div>

       </div>

       <script src="http://cdn.jsdelivr.net/vue/0.12.8/vue.min.js"></script>

       <script>
    //    var totalSecondes = 0;
       //
    //    setInterval(function() {
    //        var minutes = Math.floor(++totalSecondes / 60);
    //        vm.secondes = totalSecondes - minutes * 60;
    //        vm.heures = Math.floor(minutes / 60);
    //        vm.minutes = minutes - vm.heures * 60;
    //    }, 1000);

         var vm = new Vue({
           el: '#tuto',
           data: {
             heures: 0,
             minutes: 0,
             secondes: 0,
             n : 0
         }
         });


       </script> -->


    <div id="example-1">
      <button v-on:click="counter += 1">Add 1</button>
      <p>The button above has been clicked @{{ counter }} times.</p>
    </div>
    <script type="text/javascript">
    var example1 = new Vue({
        el: '#example-1',
        data: {
        counter: 0
        }
    })
    </script>

</section>
@endsection('content')
