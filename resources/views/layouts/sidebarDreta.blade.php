<nav id="sidebarRight">
	<div id="main-menu2" >
        <p class="lead"></p>
        <h4 class="pl-3 pt-2 text-dark">Calendari</h4>
        <hr>

        <div class="row header-calendar w-auto">

        <div class="col" style="display: flex; justify-content: space-between; padding: 3px;">
            @isset($projecte)
                <a  href="{{route('projectes.mes',[$data['last'],$projecte])}}" style="margin:5px;">
            @else
                <a  href="{{route('tauler.mes',$data['last'])}}" style="margin:5px;">
            @endif
            <i class="fas fa-chevron-circle-left pl-3" style="font-size:20px;color:white;"></i>
            </a>
            <h3 style="font-weight:bold;margin:3px;"> {{$mespanish}} <small>{{$data['year']}}</small></h3>
            @isset($projecte)
                <a  href="{{route('projectes.mes',[$data['next'], $projecte])}}"style="margin:5px;">
            @else
                <a  href="{{route('tauler.mes',$data['next'])}}"style="margin:5px;">
            @endif
            <i class="fas fa-chevron-circle-right pr-3" style="font-size:20px;color:white;"></i>
            </a>
        </div>

        </div>
        <div class="row mr-0" id="diesS" style="width: auto">
        <div class="col header-col">dl</div>
        <div class="col header-col">dm</div>
        <div class="col header-col">dc</div>
        <div class="col header-col">dj</div>
        <div class="col header-col">dv</div>
        <div class="col header-col">ds</div>
        <div class="col header-col">dg</div>
        </div>
        <!-- inicio de semana -->
        @foreach ($data['calendar'] as $weekdata)
        <div class="row mr-0" id="diesN"  style="width:auto">
            <!-- ciclo de dia por semana -->
            @foreach  ($weekdata['datos'] as $dayweek)

            @if($dayweek['mes']==$mes)
            <div class="col box-day text-center">
                {{ $dayweek['dia']  }}
            </div>
            @else
            <div class="col box-dayoff">
            </div>
            @endif


            @endforeach
        </div>
        @endforeach

    <div class="mt-3 border-top border-bottom border-dark">
        <h4 class="text-dark pl-2 pt-2"><strong>Xat</strong></h4>
        <div>
            @include('layouts.chatDashboard')
        </div>
    </div>
  </div>
</nav>