<div class="container my-4">


    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">



        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>

        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
            <?php
            $slides = 0;
            foreach ($sliderListPropostes as $slide):
              $titolTruncat;
              if (strlen($slide->nom)>30) {
                  $titolTruncat = substr($slide->nom, 0, 27)."...";
              // code...
              } else {
                  $titolTruncat = $slide->nom;
              }
              $descTruncat;
              if (strlen($slide->descripcio)>30) {
                  $descTruncat = substr($slide->descripcio, 0, 27)."...";
              // code...
              } else {
                  $descTruncat = $slide->descripcio;
              }
                if ($slides == 4) {
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                    $slides = 0;
                    // code...
                }
                $slides++
                ?>
                <a title="Veure la proposta" href="{{ route('propostes', ['idProposta' => $slide->id]) }}" style="cursor:pointer;">

                <div class="col-md-3" id="indCard"style="float:left">

                  <style media="screen">
                  #indCard{
                    transition: border 0.3s ease-out;
                  }
                    #indCard:hover{


                      border-width: small;
                      border-radius: 20px;
                      border-top: 5px solid transparent;
                      border-bottom: 5px solid transparent;
                      border-color: lightgrey;
                      font-weight: bold;

                    }
                  </style>
                    <div class="align-items-center card card-block mb-2 d-flex flex-column" style="height: 25rem;">
                        <img class="card-img-top "style="max-height:9rem"
                             src="{{ asset('propostaImage/'.$slide->ruta_imatge) }}" alt="Card image cap">
                        <div class="card-body ">
                            <h4 class="card-title text-dark">{{$titolTruncat}}</h4>
                            <p class="card-text text-dark">{{$descTruncat}}</p>

                        </div>
                        <div class="row d-flex align-self-end mt-auto mx-auto">
                          @if (auth()->user())
                          <div class="col"><a href="{{ route('propostes.show', ['proposta' => $slide->id]) }}"class=" mb-3 btn btn-primary mr-1">Unir-me</a></div>
                          @else
                          <div class="col"><a data-toggle="modal" data-target="#loginProposta" onclick="fill({{$slide->id}})"class=" mb-3 btn btn-primary mr-1">Unir-me</a></div>
                          <script type="text/javascript">
                            function fill(id){
                              document.getElementById("javaFillProposta").value = id;
                              console.log("fet");
                            }
                          </script>
                          @endif
                          <div class="col"><a href="{{ route('contacteResponsableProposta', ['idProposta' => $slide->id]) }}"class="mb-3 btn btn-primary ml-1">Contactar</a></div>
                        </div>

                    </div>
                </div>
                </a>

                <?php
                endforeach;
                ?>
            </div>



        </div>
        <!--/.Slides-->
        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left fa-lg pr-4"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                    class="fas fa-chevron-right fa-lg pl-4"></i></a>
        </div>
        <!--/.Controls-->
    <!--/.Carousel Wrapper-->
    </div>
</div>
