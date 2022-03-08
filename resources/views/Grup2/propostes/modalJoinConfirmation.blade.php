
<div class="modal fade" id="unirseProposta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Segur que vols unir-te?</h3>
      </div>
      <div class="modal-body">
        <p id="segurUnirse"></p>
      </div>
      <div class="modal-footer">
          <form id = "formulariUnirse" method="POST" action="{{route('propostes.unirse', $proposta->id ?? 'idUnirse')}}">
              @csrf
              <input type="hidden" name = "proposta_id_unirse" id="proposta_id_unirse" >
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Unir-se</button>
            </form>
      </div>
    </div>
  </div>
</div>
