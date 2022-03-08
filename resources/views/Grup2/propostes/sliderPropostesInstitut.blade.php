<div class="container my-4">
    <!--Carousel Wrapper-->
        @if(auth()->user()->id_roles == 2 || auth()->user()->id_roles == 4 || auth()->user()->id_roles == 5)
        <h2>Les nostres propostes</h2>
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
                  foreach ($propostesInsti as $slide):
                  if($slide->estat == 'actiu' && $slide->estat_proposta != "Assignada"):
                    $titolTruncat;
                    if (strlen($slide->nom)>40) {
                        $titolTruncat = substr($slide->nom, 0, 37)."...";
                    // code...
                    } else {
                        $titolTruncat = $slide->nom;
                    }
                    $descTruncat;
                    if (strlen($slide->descripcio)>40) {
                        $descTruncat = substr($slide->descripcio, 0, 37)."...";
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
                      $slides++;
                        echo "<div class='col-md-3 d-flex' style='float:left'>";

                      if($slide->estat_proposta == 'Disponible'){
                        echo "<div class='align-items-center card card-block mb-2  d-flex flex-column border-success' style='height: 22rem;border-width:2px;' title='Disponible'>";
                      }
                      elseif($slide->estat_proposta == 'Sol·licitada') {
                        echo "<div class='align-items-center card card-block mb-2  d-flex flex-column border-warning' style='height: 22rem;border-width:2px;' title='Sol·licitada'>";
                      }else {
                        echo "<div class='align-items-center card card-block mb-2  d-flex flex-column border-secondary' style='height: 22rem;border-width:2px;' title='Assignada'>";
                      }
                        ?>
                            <a title="Veure la proposta" onclick="veureProposta('{{$slide->id}}');" style="cursor:pointer;">
                              <img class="card-img-top" src="{{ asset('propostaImage/'.$slide->ruta_imatge) }}" alt="Card image cap" style="max-height: 9rem;">
                              <div class="card-body" style="max-height: 100px;">
                                  <h4 class="card-title">{{$titolTruncat}}</h4>
                                  <p class="card-text">{{$descTruncat}}</p>
                                    
                                  
                              </div>
                            </a>
                              <div class="container justify-content-center text-center flex-grow-1 d-flex mt-5">

                                <div class="row my-auto">
                                    <div class="col-sm">
                                      @if(auth()->user()->id_roles != 4)
                                        <a title="Editar" onclick="editarProposta('{{$slide->id}}','{{$slide->id_categoria}}','{{$slide->nom}}','{{$slide->descripcio}}','{{$slide->requeriments}}','{{$slide->estimacio_economica}}','{{$slide->estat_proposta}}')"data-toggle="modal" data-target="#editProposta" style="cursor:pointer;">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        @endif
                                    </div>

                                    <div class="col-sm">
                                      <a title="Eliminar" style="cursor:pointer;" onclick="eliminarProposta('{{$slide->id}}','{{$slide->nom}}')"data-toggle="modal" data-target="#deleteProposta">
                                          <i class="fas fa-trash fa-lg text-danger"></i>
                                      </a>
                                  </div>

                                  <div class="col-sm ml-5">
                                    @if ($slide->estat_proposta == 'Disponible')
                                        <i class="fa fa-unlock fa-lg text-success"></i>
                                    @elseif ($slide->estat_proposta == 'Sol·licitada')
                                        <i class="fas fa-clock text-warning" style="font-size: 22px;"></i>
                                    @else <i class="fa fa-lock fa-lg text-secondary"></i>

                                    @endif

                                  </div>
                                  @can('propostes.top')
                                    
                                  @endcan
                                </div>
                              </div>
                            </div>
                      </div>
                      <?php
                      endif;
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
      
        @endif
    </div>