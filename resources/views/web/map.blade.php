@extends('layouts.app')

@section('title', 'Bienvenido')
@section('content')


<div class="inheader bgcolor5">
	<h1><i class="fa fa-map-marker"></i> Hotel</h1>
</div>
<section class="map">
	<?php /*<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="http://www.iceportal.com/brochures/ice/Brochure.aspx?did=2634&brochureid=1090"></iframe>
			</div>
		</div>
	</div>*/ ?>
	<div class="hotelmap">
		<div class="fila">
			<div class="celda" style="display:block;">
				<a href="#maphotel" class="fancyb btn btn-warning btn-lg bgcolor5" btn btn-warning><i class="fa fa-map-marker"></i> Ver mapa</a>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="fila">
			<ul class="vinculosmap">
				<li><a href="#map1a" class="fancyb"><img src="/img/icons/icon01.png" class="img-responsive"></a></li>
				<li><a href="#map1b" class="fancyb"><img src="/img/icons/icon02.png" class="img-responsive"></a></li>
				<li><a href="#map1c" class="fancyb"><img src="/img/icons/icon03.png" class="img-responsive"></a></li>
				<li><a href="#map1d" class="fancyb"><img src="/img/icons/icon05.png" class="img-responsive"></a></li>
			</ul>
		</div>
	</div>
</section>
<p>&nbsp;</p>
<div class="inheader bgcolor5">
	<h1><i class="fa fa-map-marker"></i> Puerto Vallarta</h1>
</div>
<div class="hotelmap pv">
	<div class="fila">
		<div class="celda">
			<a href="#maphotelpv" class="fancyb btn btn-warning btn-lg bgcolor5" btn btn-warning><i class="fa fa-map-marker"></i> Ver mapa</a>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
	</div>
</div>

<!--/ Mapa hotel -->
<div id="maphotel" class="minimap" style="display: none;">
	<img src="/img/mapahotelbig.jpg" class="img-responsive">
	<br />
	<div class="heading">
		<h3><i class="fa fa-map-marker"></i> MAPA HOTEL</h3>
	</div>
	<ol class="ruedita places1">
		<li><i class="circle">1</i> Recepción<br />Front Desk</li>
		<li><i class="circle">2</i> Spa Westin</li>
		<li><i class="circle">3</i> Westin Workout<br />Fitness Studio</li>
		<li><i class="circle">4</i> Concierge</li>
		<li><i class="circle">5</i> Salón de Belleza<br />Beauty Salon</li>
		<li><i class="circle">6</i> Canchas de Tenis<br />Tennis Court</li>
		<li><i class="circle">7</i> Cancha Multiusos<br />MultiSport Court</li>
		<li><i class="circle">8</i> Centro de Negocios<br />Business Center</li>
		<li><i class="circle">9</i> Tabaqueria<br />Tobacco Shop</li>
		<li><i class="circle">10</i> Salones<br />Meeting Rooms</li>
		<li><i class="circle">11</i> Pergolas</li>
		<li><i class="circle">12</i> Toallero<br />Towel Stand</li>
		<li><i class="circle">13</i> Club Infantil<br />Kid’s Club</li>
		<li><i class="circle">14</i> Juegos Infantiles<br />Children’s Games</li>
		<li><i class="circle">15</i> Jacuzzi</li>
		<li><i class="circle">16</i> Alberca Tlaquepaque<br />Pool</li>
		<li><i class="circle">17</i> Alberca Periquillos<br />Pool</li>
	</ol>
	<ol class="ruedita places2">
		<li><i class="circle">I</i> Restaurante El Palmar<br />Restaurant</li>
		<li><i class="circle">1I</i> Lobby Bar La Cascada</li>
		<li><i class="circle">1II</i> Snack-Bar Tlaquepaque</li>
		<li><i class="circle">1V</i> Mini Latté<br />Coﬀee Shop</li>
		<li><i class="circle">V</i> Restaurante Arrecifes</li>
		<li><i class="circle">VI</i> Bar Arrecifes<br />Beach Club</li>
		<li><i class="circle">VII</i> Area Comercial<br />Commercial Area</li>
	</ol>
	<ol class="ruedita">
		<li><img src="/img/icons/map02.jpg"> Servicio Médico<br />Medical Service<div class="clearfix"></div></li>
		<li><img src="/img/icons/map03.jpg"> Elevadores<br />Elevators<div class="clearfix"></div></li>
		<li><img src="/img/icons/map01.jpg"> Teléfonos<br />Telephones<div class="clearfix"></div></li>
		<li><img src="/img/icons/map04.jpg"> Baños<br />Bathrooms<div class="clearfix"></div></li>
	</ol>
</div>
<!--/ RECEPCION -->
<div id="map1a" class="minimap" style="display: none;">
	<img src="/img/fotos/recepcion.jpg" class="img-responsive">
	<div class="heading">
		<img src="/img/icons/icon01.jpg" class="miniicon">
		<h3>RECEPCIÓN</h3>
		<p>Esta es solo una muestra de los servicios que el cordial personal de concierge en The Westin Resort & Spa, Puerto Vallarta puede brindar.</p>
	</div>
	<ul>
		<li>Personal bilingüe.</li>
		<li>Información sobre las atracciones locales.</li>
		<li>Reservas para restaurante.</li>
		<li>Arreglos para el transporte.</li>
		<li>Reservas de campo de golf.</li>
		<li>Reservas para excursiones.</li>
		<li>Reservas de servicios de niñera.</li>
		<li>Arreglos florales.</li>
	</ul>
	<h4><i class="fa fa-phone"></i> Llámanos, estamos para atenderte: +52 322 226 1100</h4>
</div>

<!--/ SALONES -->
<div id="map1b" class="minimap" style="display: none;">
	<img src="/img/fotos/recepcion.jpg" class="img-responsive">
	<div class="heading">
		<img src="/img/icons/icon02.png" class="miniicon">
		<h3>CONFERENCIAS POR SALONES</h3>
		<div class="clearfix"></div>
	</div>
	<h4>SALÓN TAMAYO:</h4>
	<ul>
		<li><strong>CONFERENCIAS</strong></li>
		<li>DOMINGO</li>
		<li>LUNES</li>
		<li>MARTES</li>
		<li>MIÉRCOLES</li>
		<li>JUEVES</li>
	</ul>
	<h4>SALÓN OROZCO + RIVIERA:</h4>
	<ul>
		<li><strong>CONFERENCIAS</strong></li>
		<li>MARTES</li>
		<li>MIÉRCOLES</li>
		<li>JUEVES</li>
	</ul>
	<h4>SALÓN MORELOS:</h4>
	<ul>
		<li><strong>CONFERENCIAS</strong></li>
		<li>JUEVES</li>
	</ul>
	<h4>SALÓN JUÁREZ:</h4>
	<ul>
		<li><strong>CONFERENCIAS</strong></li>
		<li>MIÉRCOLES</li>
		<li>JUEVES</li>
	</ul>

</div>

<!--/ RESTAURANTES -->
<div id="map1c" class="minimap" style="display: none;">
	<img src="/img/fotos/recepcion.jpg" class="img-responsive">
	<div class="heading">
		<img src="/img/icons/icon03.png" class="miniicon">
		<h3>RESTAURANTES</h3>
		<div class="clearfix"></div>
	</div>
	<h4>“La Cascada”</h4>
	<p>Con una hermosa vista a los jardines y al mar. Bar “Tlaquepaque” se encuentra en el área de albercas con sección de restaurant, ofrece servicio de bebidas y comida fresca y ligera. Restaurant & Bar “Arrecifes”, exclusiva atmósfera que integra además Club de playa y lounge con un concepto único en México a la orilla del mar.</p>

	<h4>Gastronomía: fusión</h4>
	<ul>
		<li>Horas: martes a domingos de 6:00 p. m. a 10:00 p. m.</li>
		<li>Ambiente: frente a la playa.</li>
		<li>Se permite fumar: no.</li>
		<li>Estilo de servicio: a la carta.</li>
	</ul>
	<h4>“Restaurante Palmar”</h4>
	<p>Disfrute de un desayuno sin prisa, vaya con los niños para un almuerzo rápido o planee una cena romántica para dos. El Palmar satisface a los comensales en cada comida, con su menú fresco e innovador de favoritos mexicanos e internacionales.</p>
	<ul>
		<li>Gastronomía: mexicana.</li>
		<li>Teléfono: (52)(322) 226 1100 ext. 4422.</li>
		<li>Horas: 7:00 a. m. a 11:00 p. m.</li>
		<li>Ambiente: elegante restaurante contemporáneo.</li>
		<li>Entorno: en el interior y al aire libre.</li>
		<li>Normas de vestir: informal.</li>
		<li>Se permite fumar: sí.</li>
		<li>Estilo de servicio: a la carta, bufet.</li>
	</ul>
</div>

<div id="map1d" class="minimap" style="display: none;">
	<img src="/img/fotos/recepcion.jpg" class="img-responsive">
	<div class="heading">
		<img src="/img/icons/icon01.png" class="miniicon">
		<h3>BARES</h3>
		<div class="clearfix"></div>
	</div>
	<h4>“Bar Tlaquepaque”</h4>
	<p>Un día en la piscina es aún más relajante con este restaurante informal a su disposición. Nade hasta el bar en la piscina Tlaquepaque para una bebida refrescante, o saboree sándwiches y aperitivos en la hamaca junto a la piscina.</p>
	<ul>
		<li>Gastronomía: comidas ligeras.</li>
		<li>Horas: 10:00 a. m. a 6:00 p. m.
		<li>Ambiente: informal.</li>
		<li>Entorno: piscina.</li>
		<li>Se permite fumar: sí.</li>
	</ul>
</div>

<!-- Segundos puntos -->
<div id="maphotelpv" class="minimap minimap2" style="display: none;">
	<img src="/img/bigmap.jpg" class="img-responsive">
	<img src="/img/fotos/01.jpg" class="img-responsive">
	<div class="heading"><h3>MARINA VALLARTA</h3></div>
	<p>Encuentra tiendas, excelentes restaurantes  gourmet, cafés, heladerías, panaderías y hasta un pequeño supermercado.</p>

	<img src="/img/fotos/09.jpg" class="img-responsive">
	<div class="heading"><h3>PUEBLO DE BUCERÍAS</h3></div>
	<p>Playas turísticas que recibe anualmente millones de turistas nacionales y de origen extranjero</p>

	<img src="/img/fotos/02.jpg" class="img-responsive">
	<div class="heading"><h3>PLAZA DE TOROS LA PALOMA</h3></div>
	<p>Disfruta de un espectáculo taurino lleno de técnica y elegancia.</p>

	<img src="/img/fotos/recepcion.jpg" class="img-responsive">
	<div class="heading"><h3>WESTINB RESORT & SPA</h3></div>
	<p>Una belleza frente al mar en en la Bahia de Banderas</p>

	<img src="/img/fotos/11.jpg" class="img-responsive">
	<div class="heading"><h3>SAN BLAS</h3></div>
	<p>El puerto de San Blas es uno de los íconos turísticos del Pacífico mexicano gracias a su abundancia de belleza natural, delicias gourmet e importancia histórica. </p>

	<img src="/img/fotos/08.jpg" class="img-responsive">
	<div class="heading"><h3>CUALE RIVER ISLAND</h3></div>
	<p>Es un lugar idóneo para hacer diferentes actividades, como paseos, ejercicios, promover la ecología, cultura por que ayuda a desarrollar el ámbito artístico de las personas.</p>

	<img src="/img/fotos/13.jpg" class="img-responsive">
	<div class="heading"><h3>CENTRO DE DELFINES</h3></div>
	<p>Vallarta Adventures ofrece experiencias de nivel mundial al nadar con delfines en el hermoso Vallarta. </p>

	<img src="/img/fotos/03.jpg" class="img-responsive">
	<div class="heading"><h3>WILD ATV TOURS</h3></div>
	<p>Vive nuevas experiencias y disfruta de la naturaleza con increíbles tours de aventura.</p>

	<img src="/img/fotos/04.jpg" class="img-responsive">
	<div class="heading"><h3>CATARATAS DEL EDÉN</h3></div>
	<p>El Edén es un restaurante exótico en la zona sur, río arriba de playa Mismaloya Beach que ofrece además un balneario con albercas y cascadas naturales.</p>
	<h4>CANOPY CLUB LOS VERANOS</h4>
	<p>Lánzate a la aventura y disfruta de la majestuosidad de la naturaleza de Puerto Vallarta.</p>
</div>

@endsection