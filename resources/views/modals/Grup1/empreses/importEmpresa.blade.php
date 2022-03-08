
<div  class="modal fade bannerformmodal" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Importar noves Entitats</h4>
                </div>
                <form method="POST" action="{{route('empreses.importCsv')}}"  enctype="multipart/form-data">
                    <div class="modal-body text-center">
                        @csrf
                        <div id="inputfilediv" class="position-relative text-center">
                            <input style="-moz-opacity: 0;filter:alpha(opacity: 0);"
                                   id="inputfile" type="file" name="file" class="form-control position-sticky text-right"
                                   data-browse-on-zone-click="true"
                                   accept=".csv">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary">Importar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
