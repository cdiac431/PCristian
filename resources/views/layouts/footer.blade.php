<footer class="bg-dark">
    <div class=" pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <h2>Informació</h2>
                    <p class="pr-5 text-white-50">Nosaltres creiem en les teves capacitats i per això et facilitem les eines per a la creació de propostes i projectes conjuntament amb altres entitats i centres educatius. </p>
                    <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
                </div>
                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3">Enllaços</h4>
                    <ul class="m-0 p-0">
                        <li><a href="{{route('home')}}">- Inici</a></li>
                        <li><a href="{{route('about')}}">- Sobre nosaltres</a></li>
                        <li><a href="{{route('contacte')}}">- Contacta</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4">Contacta&apos;ns</h4>
                    <p class="my-1"><a href="https://goo.gl/maps/Pr68LvfSyXiKzJWJ6" target="_blank"><i class="fas fa-map-marker-alt"></i> Carrer Madrid, 35, 49, 43870 Amposta, Tarragona</a></p>
                    <p class="my-1"><a href="tel:+4733378901" target="_blank"><i class="fas fa-phone-alt"></i> +34 977700043</a></p>
                    <p class="my-1"><a href="mailto:info@proiectus.cat" target="_blank"><i class="fas fa-envelope"></i> info@proiectus.cat</a></p>
                </div>
            </div>
                <div class="row">
                    <div class="col copyright col-sm-6">
                        <p class="textFooter"><small class="text-white-50">© 2021. All Rights Reserved.</small></p>
                    </div> 
                    <div class="col copyright col-sm-6">
                        <p class="apartatsFooter">
                            <a href="{{asset('/textosLegals/notaLegal')}}" class="notaLegal">Nota Legal</a>
                            <a href="{{asset('/textosLegals/politicaPrivacitat')}}" class="privacitat">Privacitat</a>
                            <a href="{{asset('/textosLegals/cookies')}}" class="cookies">Cookies</a>   
                        </p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('js/custom.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QGL1XT5FF5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QGL1XT5FF5');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4213007129745038" crossorigin="anonymous"></script>
@yield('scripts')
