(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes
lib.webFontTxtFilters = {}; 

// library properties:
lib.properties = {
	width: 1200,
	height: 1096,
	fps: 24,
	color: "#FFFFFF",
	webfonts: {},
	manifest: [
		{src:"img/bigmap.jpg", id:"bigmap"}
	]
};



lib.webfontAvailable = function(family) { 
	lib.properties.webfonts[family] = true;
	var txtFilters = lib.webFontTxtFilters && lib.webFontTxtFilters[family] || [];
	for(var f = 0; f < txtFilters.length; ++f) {
		txtFilters[f].updateCache();
	}
};
// symbols:



(lib.bigmap = function() {
	this.initialize(img.bigmap);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,1200,1096);


(lib.mapmaker9 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker8 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker7 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker6 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker5 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker4 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


(lib.mapmaker1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Capa 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#00FFFF").s().p("AkdGcIAAs3II7AAIAAM3g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-41.2,57.4,82.4);


// stage content:
(lib.norva = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.mapmaker1_btn.addEventListener("click", mapmaker1.bind(this));
		
		function mapmaker1()
		{
			puntos(1);
			
		}
		
		
		this.mapmaker2_btn.addEventListener("click", mapmaker2.bind(this));
		
		function mapmaker2()
		{
			puntos(2);
			
		}
		
		this.mapmaker3_btn.addEventListener("click", mapmaker3.bind(this));
		
		function mapmaker3()
		{
			puntos(3);
			
		}
		
		this.mapmaker4_btn.addEventListener("click", mapmaker4.bind(this));
		
		function mapmaker4()
		{
			puntos(4);
			
		}
		
		this.mapmaker5_btn.addEventListener("click", mapmaker5.bind(this));
		
		function mapmaker5()
		{
			puntos(5);
			
		}
		
		this.mapmaker6_btn.addEventListener("click", mapmaker6.bind(this));
		
		function mapmaker6()
		{
			puntos(6);
			
		}
		
		
		this.mapmaker7_btn.addEventListener("click", mapmaker7.bind(this));
		
		function mapmaker7()
		{
			puntos(7);
			
		}
		
		
		this.mapmaker8_btn.addEventListener("click", mapmaker8.bind(this));
		
		function mapmaker8()
		{
			puntos(8);
			
		}
		
		this.mapmaker9_btn.addEventListener("click", mapmaker9.bind(this));
		
		function mapmaker9()
		{
			puntos(9);
			
		}
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(1));

	// mapmaker9
	this.mapmaker9_btn = new lib.mapmaker9();
	this.mapmaker9_btn.setTransform(655.1,950.6);
	this.mapmaker9_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker9_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker9_btn).wait(1));

	// mapmaker8
	this.mapmaker8_btn = new lib.mapmaker8();
	this.mapmaker8_btn.setTransform(683.4,837.6);
	this.mapmaker8_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker8_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker8_btn).wait(1));

	// mapmaker7
	this.mapmaker7_btn = new lib.mapmaker7();
	this.mapmaker7_btn.setTransform(527.5,883.6);
	this.mapmaker7_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker7_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker7_btn).wait(1));

	// mapmaker6
	this.mapmaker6_btn = new lib.mapmaker6();
	this.mapmaker6_btn.setTransform(580,617.9);
	this.mapmaker6_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker6_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker6_btn).wait(1));

	// mapmaker5
	this.mapmaker5_btn = new lib.mapmaker5();
	this.mapmaker5_btn.setTransform(864.3,415.2);
	this.mapmaker5_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker5_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker5_btn).wait(1));

	// mapmaker4
	this.mapmaker4_btn = new lib.mapmaker4();
	this.mapmaker4_btn.setTransform(514.6,485.5);
	this.mapmaker4_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker4_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker4_btn).wait(1));

	// mapmaker3
	this.mapmaker3_btn = new lib.mapmaker3();
	this.mapmaker3_btn.setTransform(619.5,366.7);
	this.mapmaker3_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker3_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker3_btn).wait(1));

	// mapmaker2
	this.mapmaker2_btn = new lib.mapmaker2();
	this.mapmaker2_btn.setTransform(682.6,174.5);
	this.mapmaker2_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker2_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker2_btn).wait(1));

	// mapmaker1
	this.mapmaker1_btn = new lib.mapmaker1();
	this.mapmaker1_btn.setTransform(317.1,288.4);
	this.mapmaker1_btn.alpha = 0.012;
	new cjs.ButtonHelper(this.mapmaker1_btn, 0, 1, 1);

	this.timeline.addTween(cjs.Tween.get(this.mapmaker1_btn).wait(1));

	// Mapa
	this.instance = new lib.bigmap();

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(600,548,1200,1096);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;