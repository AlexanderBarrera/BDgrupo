<?php include('templates/header.php');?>
 <div class="col center">
  <div class="row justify-content-center">
	<h1>Agencia de turismo ROnCHA</h1>
  </div>
  <div class="row justify-content-center">
    <p>Aqui podrás planificar tu próximo viaje</p>
  </div>
  <div class="row justify-content-center">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
   <div class="carousel-inner">
     <div class="carousel-item active">
	   <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	     <img src="https://luxurycomm.com/wp-content/uploads/2015/07/vaciones-de-lujo-InterContinental.jpg"  class="img-fluid  w-100" alt="Responsive image">
		 <div class="carousel-caption d-none d-md-block">
		   <form action="consultas/consulta_ver_region_hoteles.php" method="post">
	         <button type="submit" class="btn btn-secondary">Ver Hoteles</button>
           </form>
         </div>
	   </div>
	 </div>
	<div class="carousel-item">
	  <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	    <img src="https://www.omnihotels.com/-/media/images/hotels/bospar/restaurants/bospar-omni-parker-house-parkers-restaurant-1170.jpg" class="img-fluid  w-100" alt="Responsive image">
		<div class="carousel-caption d-none d-md-block">
		  <form action="consultas/consulta_ver_region_restaurantes.php" method="post">
	         <button type="submit" class="btn btn-secondary">Ver Restaurantes</button>
           </form>
        </div>
	  </div>
    </div>
	<div class="carousel-item">
	  <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	    <img src="https://unmundodetravesias.com/wp-content/uploads/2017/12/turismo-portada.jpg" class="img-fluid  w-100" alt="Responsive image">
		<div class="carousel-caption d-none d-md-block">
		  <form action="consultas/consulta_ver_region_agencias.php" method="post">
	         <button type="submit" class="btn btn-secondary">Ver Agencias</button>
           </form>
        </div>
	  </div>
    </div>
    <div class="carousel-item">
	  <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	    <img src="https://vulcanopro.s3.amazonaws.com/images/lar_n4xHJ5JuqGBzrrnYbDQ2rnPC33aA80Sd3Rw3XOKo.jpeg" class="img-fluid  w-100" alt="Responsive image">
		<div class="carousel-caption d-none d-md-block">
		  <form action="consultas/consulta_ver_region_agencias.php" method="post">
	         <button type="submit" class="btn btn-secondary">Ver parques</button>
           </form>
        </div>
	  </div>
    </div>
	<div class="carousel-item">
	  <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	    <img src="https://vinasantacruz.cl/wp-content/uploads/2018/02/vina_santa_cruz_verano.jpg" class="img-fluid  w-100" alt="Responsive image">
		<div class="carousel-caption d-none d-md-block">
		  <form action="consultas/consulta_ver_region_agencias.php" method="post">
	         <button type="submit" class="btn btn-secondary">Ver Viñas</button>
           </form>
        </div>
	  </div>
    </div>
    <div class="carousel-item">
	  <div class="container-fluid",  style="height: 550px; background-color: rgba(255,0,0,0.1);">
	    <img src="https://chile.travel/wp-content/uploads/2016/04/Enoturismo-sernatur-ACT354.jpg" class="img-fluid  w-100" alt="Responsive image">
		<div class="carousel-caption d-none d-md-block">
		  <form action="consultas/consulta_ver_region_agencias.php" method="post">
	         <button type="submit" class="btn btn-secondary">Etnoturismo</button>
           </form>
        </div>
	  </div>
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
   </div>
   </div>
  </div>
</html>
