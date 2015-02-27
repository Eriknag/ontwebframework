/**
 * @author waar0003
 */
window.onload = function() {
	context.init();
	player.init();
	setInterval(function(){
		context.feel();
		player.move(context);
		player.collide(context);
		player.draw(context);
	}, context.interval);
};

/*
 * Context object: verantwoordelijk voor de 'omgeving', waaronder:
 * - allerlei algemene constanten
 * - toestand van de muis, keyboard, etc
 * - grootte van het scherm
 */
var context = {
	interval : 10,
	g : 0.001, // 0.004 Zwaartekrachtversnelling in px/ms^2
	cw : 58, // wrijvingsfactor; combinatie wrijvingscoëfficiënt en dichtheid
	
	mousePos : {x: 0,y: 0}, // Huidige positie van de muis
	
	wnd : {left:0, top:0, width:0, height:0},
	
	init : function() {
		window.onmousemove = function(event) {
    	    event = event || window.event; // IE-ism
        	context.mousePos = {
            	x: event.clientX-25,
            	y: event.clientY-25
        	};
        	//console.log(context.mousePos);
		};
	},
	
	feel : function() {
		var w = 0;var h = 0;
		//IE
		if(!window.innerWidth){
		    if(!(document.documentElement.clientWidth == 0)){
		        //strict mode
		        w = document.documentElement.clientWidth;h = document.documentElement.clientHeight;
		    } else{
		        //quirks mode
		        w = document.body.clientWidth;h = document.body.clientHeight;
		    }
		} else {
		    //w3c
		    w = window.innerWidth;h = window.innerHeight;
		}
		this.wnd = {left:0, top:0, width:w-50,height:h-50};
		
	}
	
}; // End context

/*
 * Player object: verantwoordelijk voor de beweging van het speelbare object
 */
var player = {
	size: 50,      //grootte in px
	mass:100000,    //massa
	cv : 2,  // Veerconstante van de (oneindig kleine) veer tussen muis en object
	
	f : {x:0,y:0}, //Kracht F
	a : {x:0,y:0}, //Versnelling a in px/ms^2
	v : {x:0,y:0}, //Snelhied V in px/ms
	s : {x:0,y:0}, //Positie of afgelegede weg vanaf punt (0,0) in px

	element:null, //Referentie naar DOM element
	
	init : function() {
		this.element = document.getElementById('player');
	},
	
	step : function(context) {
		move(context);
		collide(context);
		draw(context);
	},

	move : function(context) { 
		// Bepalen totale kracht op object
		fwx = Math.pow(this.v.x,2)*context.cw;
		if (this.v.x<0) fwx*=-1;
		fwx+=this.v.x;
		
		fwy = Math.pow(this.v.y,2)*context.cw;
		if (this.v.y<0) fwy*=-1;
		fwy+=this.v.y;
		
		this.f.x = (context.mousePos.x - this.s.x)*this.cv - fwx;
		this.f.y = (context.mousePos.y - this.s.y)*this.cv - fwy + this.mass*context.g;
				
		//Versnelling berekenen (f=m*a)
		this.a.x = this.f.x/this.mass;	
		this.a.y = this.f.y/this.mass;		
		
		//Nieuwe snelheid uitrekenen (obv een éénparig versnelde beweging)
		this.v.x += this.a.x*context.interval;
		this.v.y += this.a.y*context.interval;
		
		//Nieuwe posities (S=v*t)
		this.s.x+=this.v.x*context.interval;
		this.s.y+=this.v.y*context.interval;
		
	},

	collide : function(context) { // Collision detectie, en verwerken van collisions
		//Laten stuiteren tegen de zijkanten
		var demping = 0.74; //Demping vermindert snelheid bij botsen tegen wand
		// Links
		if (this.v.x<0 && this.s.x<context.wnd.left) {
			this.s.x = context.wnd.left;
			this.v.x *= -demping;
			this.v.y *= demping;
		}
		
		// Boven
		if (this.v.y<0 && this.s.y<context.wnd.top) {
			this.s.y = 0;
			this.v.x *= demping;
			this.v.y *= -demping;
		}
		
		if (this.v.x>=0 && this.s.x>context.wnd.width) {
			this.s.x = context.wnd.width;
			this.v.x *= -demping;
			this.v.y *= demping;
		}
		
		if (this.v.y>=0 && this.s.y>context.wnd.height) {
			this.s.y = context.wnd.height;
			this.v.x *= demping;
			this.v.y *= -demping;
		}
	},

	draw : function(context) { // Tekenen (Aanpassen DOM)
		// De DIV positioneren
		this.element.style.left = this.s.x + 'px';
		this.element.style.top = this.s.y + 'px';
		
		console.log(this.element);
	}

}; // End player

