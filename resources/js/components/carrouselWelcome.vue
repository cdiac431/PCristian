<template>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="./assets/carrousel1.webp" alt="First slide" >
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Registrat a Proiectus</h1>
                        <p>Fes realitat el teu Projecte</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="./assets/carrousel2.webp" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Proposa la teva idea</h1>
                        <p>Consulta el llistat de propostes, si no hi es la teva anota-la!</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img class="third-slide" src="./assets/carrousel3.webp" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Treballa amb ments brillants</h1>
                        <p>Proiectus es compost per 14 membres amb creativitat, dedicació i ganes de empendre.</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>

export default {

    name: "carrouselWelcome"
}

</script>

<style>

</style>
