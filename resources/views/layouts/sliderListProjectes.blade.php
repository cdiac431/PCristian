<div class="container my-4 pb-4">


    <!--Carousel Wrapper-->
    <div id="multi-item-example1" class="carousel slide carousel-multi-item" data-ride="carousel">



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
            foreach ($sliderListProjectes as $slide):
              $titolTruncat;
              if (strlen($slide->nom_projecte)>50) {
                  $titolTruncat = substr($slide->nom_projecte, 0, 47)."...";
              // code...
              } else {
                  $titolTruncat = $slide->nom_projecte;
              }
                if ($slides == 4) {
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                    $slides = 0;
                    // code...
                }
                $slides++
                ?>

                <a title="Veure el projecte" href="{{ route('projectes', ['idProjecte' => $slide->id]) }}" style="cursor:pointer;">
                <div class="col-md-3 d-flex" id="indCard"style="float:left">

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
                        <img class="card-img-top" style="max-height:9rem"
                             src="{{ asset('projecteImage/'.$slide->ruta_imatge) }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title text-dark">{{$titolTruncat}}</h4>
                            <!-- <p class="card-text">Desc</p> -->

                        </div>
                        <div class="row d-flex mt-auto mx-auto">
                          <div class="col">
                            <a title="Veure el projecte" href="{{ route('projectes', ['idProjecte' => $slide->id]) }}" style="cursor:pointer;" class=" mb-3 btn btn-primary ml-1">Veure</a>
                          </div>
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
            <a class="btn-floating" href="#multi-item-example1" data-slide="prev"><i class="fas fa-chevron-left fa-lg pr-4"></i></a>
            <a class="btn-floating" href="#multi-item-example1" data-slide="next"><i
                    class="pl-4 fas fa-chevron-right fa-lg"></i></a>
        </div>
        <!--/.Controls-->
    <!--/.Carousel Wrapper-->
    </div>
</div>
