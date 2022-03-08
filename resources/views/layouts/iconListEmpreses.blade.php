


<div class='bg-grey pb-4 pt-4'>
  <h1 class="bg-grey text-center">Llistat d'Entitats</h1>
  <div class="row justify-content-center mr-auto ml-auto">
  <?php
  $contador = 0;
  foreach ($iconListEntitats as $entitat):

    if ($contador == 4) {
        echo '</div>';
        echo '<div class="row justify-content-center mr-auto ml-auto">';
        $contador = 0;
        // code...
    }
    $contador++;
    //falta fer iterador
    ?>
 <div class="col-lg-3 mt-4">
  <div class="card center-block" >
    <img class="card-img-top" src="{{ asset('entitatsIcon/'.$entitat->ruta_imatge) }}" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">{{$entitat->nom}}</p>
    </div>
  </div>
</div>

    <?php
    endforeach; ?>
    </div>
</div>
