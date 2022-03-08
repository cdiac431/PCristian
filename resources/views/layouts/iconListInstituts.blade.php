
<div class="content">


<h1 class="text-center pt-4">Llistat de Centres Educatius</h1>

<div class='pt-4 pb-4 '>
  <div class="row justify-content-center mr-auto ml-auto">
  <?php
  $contador = 0;
  foreach ($iconListInstituts as $centre):
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
  <div class="card">
    <img class="card-img-top" src="https://image.flaticon.com/icons/png/512/2290/2290733.png" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">{{$centre->nom}}</p>
    </div>
  </div>
</div>

    <?php
    endforeach; ?>
    </div>
</div>
</div>
