(function ($) {
	/*jslint undef: false, browser: true, devel: false, eqeqeq: false, bitwise: false, white: false, plusplus: false, regexp: false, nomen: false */ 
	/*global jQuery,setTimeout,location,setInterval,YT,clearInterval,clearTimeout,pixelentity */
	
	$.pixelentity = $.pixelentity || {version: '1.0.0'};
	
	$.pixelentity.peShiner = {	
		conf: {
			api: false,
			hover: false,
			angle: 15,
			size: 100,
			color: "monoHL",
			gradientFunction:"linear",
			duration: 2.0,
			glow: 2,
			repeat: 0.5,
			reverse: false,
			paused: false,
			delay: 0
		},
		colors: {
			fire:[0x00980018,0x80970017,0xA0FF8C00,0xFFFFF82D,0xFFFFFFFF],
            fireHL:[0x00980018,0xFF980018,0xFFFFB000,0xFFFFFF5A,0xFFFFFFFF],

            lime:[0x00008000,0x80008000,0xFF81CB00,0xFFFEF671],
            limeHL:[0x00008000,0xFF008000,0xFFFFFF00,0xFFFFFFE2],

            ocean:[0x00000080,0x80000080,0xA028ABEB,0xFFA2DEFF,0xFFFFFFFF],
            oceanHL:[0x00000080,0xFF000080,0xFF32D6FF,0xFFFFFFFF,0xFFFFFFFF],

            purple:[0x005E0082,0x805E0081,0xFFFBD1FF,0xFFFFFFFF],
            purpleHL:[0x005E0082,0xFF5E0082,0xFFFFFFFF,0xFFFFFFFF],

            sepia:[0x006A5748,0x806A5748,0xA09E8066,0xFFECE1CF,0xFFF8F9FE],
            sepiaHL:[0x006A5748,0xFF6D351A,0xFFF5DEB3,0xFFF5F5DC],

            mono:[0x00404040,0x80404040,0xA0A0A0A0,0xFFFFFFFF],
            monoHL:[0x00404040,0xFF404040,0xFFA0A0A0,0xFFFFFFFF],

            steel:[0x00B0B0B0,0xFFFFFFFF],

            white:[0x00FFFFFF,0xFFFFFFFF],
            black:[0x00FFFFFF,0xFF33385F],

            red:[0x00800000,0x80800000,0xFFFFFFFF],
            redHL:[0x00800000,0xFF800000,0xFFFFFFFF],

            green:[0x00008000,0x80008000,0xFFFFFFFF],
            greenHL:[0x00008000,0xFF008000,0xFFFFFFFF],

            blue:[0x00000080,0x80000080,0xFFFFFFFF],
            blueHL:[0x00000080,0xFF000080,0xFFFFFFFF]
		}
	};
	
	var gradients = $.pixelentity.peShiner.colors;
	var g,i;
	
	for (var scheme in gradients) {
		if (typeof scheme === "string" ) {
			g = gradients[scheme];
			i = g.length-1;
			while (i--) {
				g.push(g[i]);
			}

		}
	}
	
	
	function hex2rgb(hex) {
		hex=parseInt(hex.replace("#",""),16);
		return "rgb("+(hex >>> 16 & 0xFF)+","+(hex >>> 8 & 0xFF)+","+(hex & 0xFF)+")";
    }
	
	function hex2rgba(hex) {
		if (typeof hex !== "number") {
			hex=parseInt(hex.replace("#",""),16);			
		}
		return "rgba("+(hex >>> 16 & 0xFF)+","+(hex >>> 8 & 0xFF)+","+(hex & 0xFF)+","+((hex >>> 24 & 0xFF)/0xFF)+")";
    }
	
	function PeShiner(target, conf) {
		
		var source,w,h,glow,hover;
		var output,ow,oh;
		var shine,mask,buffer,csource;
		var startTime=-1;
		var duration;
		var repeat;
		var delay;
		var color;
		var forward = true;
		var reverse;
		var angle;
		var size;
		var offset = 0;
		var c2d;
		var parentA;
		var inited = false;
		var hidden = false;
		var mouseOver = false;
		var timerID = 0;
		var paused;
		var booted = false;
		var gradientFunction;
		
		// init function
		function start() {
			
			source = target.find("img:eq(0)");
			
			hover = getParameter(conf.hover,"data-hover",true);
			angle = getParameter(conf.angle,"data-angle",1,0,360);
			size = getParameter(conf.size,"data-size",1,5,2000);
			color = getParameter(conf.color,"data-color");
			gradientFunction = getParameter(conf.gradientFunction,"data-gradientFunction");
			if (gradientFunction !== "linear" && typeof jQuery.easing[gradientFunction] === "function") {
				gradientFunction = jQuery.easing[gradientFunction];
			} else {
				gradientFunction = false;
			}
			duration = getParameter(conf.duration,"data-duration",1000,100,Number.MAX_VALUE);
			glow = getParameter(conf.glow,"data-glow",1,0,2);
			repeat = getParameter(conf.repeat,"data-repeat",1000,0,Number.MAX_VALUE);
			reverse = getParameter(conf.reverse,"data-reverse",true);
			paused = getParameter(conf.paused,"data-paused",true);
			delay = getParameter(conf.delay,"data-delay",1000,0,Number.MAX_VALUE);
			
			target.css({
				"position" : "relative",
				"padding" : "0px",
				"outline": "0"
			});
			
			source.css({
				"border": "0",
				"border-style": "none",
				"outline": "0",
				"margin": glow+"px"
			});
			
			parentA = source.parent();
			
			if (parentA.is("a")) {
				parentA.css({
					"padding" : "0px",
					"border" : "0",
					"border-style" : "none",
					//"position": "relative",
					"outline": "0"
				});
			} else {
				parentA = false;
			}
			
			if (!document.createElement('canvas').getContext) {
				return;
			}
			
			if (reverse) {
				forward = false;
			}
						
			$.pixelentity.preloader.load(target,init);
		}
		
		function getParameter(defValue,option,mult,minV,maxV) {
			var attr = source.attr(option);
			var value;
			if (typeof attr === "undefined") {
				value = defValue;
			} else {
				value = source.attr(option);
				if (mult === true) {
					value = (value === "true" || value === "True");
				} 
			}
			
			if (mult !== true && mult > 0) {
				value = parseInt(parseFloat(value)*mult,10);
			}			
			
			if (typeof minV !== "undefined") {
				value = Math.max(minV,value);
			}
			
			if (typeof maxV !== "undefined") {
				value = Math.min(maxV,value);
			}
			
			return value;
		}
			
		
		function init() {
			
			booted = true;
			
			w = source[0].width || source.width() || source[0].naturalWidth;
			h = source[0].height || source.height() || source[0].naturalHeight;
			ow = w+2*glow;
			oh = h+2*glow;
			
			target.width(ow).height(oh);
			
			if (hover || paused) {
				if (hover) {
					(parentA ? parentA : target).bind("mouseover mouseout",evHandler);
				} else {
					mouseOver = true;
				}
			} else {
				mouseOver = true;
				initEffect();
			}

		}
		
		function initEffect() {
			inited = true;
			createOutput();
			setup();				
			$.pixelentity.ticker.register(loop);			
		}
		
		function createOutput() {
			output = $('<canvas width="'+ow+'" height="'+oh+'">').css("position","absolute");
			shine = $('<canvas width="'+ow+'" height="'+oh+'">')[0].getContext("2d");
			mask = $('<canvas width="'+(ow)+'" height="'+oh+'">')[0].getContext("2d");
			buffer = $('<canvas width="'+(ow)+'" height="'+oh+'">')[0].getContext("2d");
			csource = $('<canvas width="'+(w)+'" height="'+h+'">')[0].getContext("2d");
			
			c2d = output[0].getContext("2d");
			(parentA ? parentA : target).prepend(output);
			
			shine.drawImage(source[0],0,0,w+2*glow,h+2*glow);
			csource.drawImage(source[0],0,0);
			
			buildGradient();
		}
		
		function buildGradient() {
			var rad = Math.PI*angle/180;
			offset = Math.atan(rad)*oh;
			
			mask.rotate(rad);
			mask.translate(offset,0);
			
			var lingrad = c2d.createLinearGradient(0,0,size,0);
			
			var gradient = $.pixelentity.peShiner.colors[color];
			var n = gradient.length;
			var step = 1/(n-1);
			var ratio = 0;
			
			for (var i=0;i<gradient.length;i++) {
				ratio = (i < n-1) ? i*step : 1;
				if (gradientFunction) {
					ratio = gradientFunction(0,ratio,0,1,1);
				}
				lingrad.addColorStop(ratio,hex2rgba(gradient[i]));
			}
			
			mask.fillStyle = lingrad;
			mask.fillRect(0,-size,size,oh+2*size);
			mask.rotate(0);
			
		}
		
		function evHandler(e) {
			mouseOver = (e.type == "mouseover");
			if (mouseOver) {
				if (!inited) {
					initEffect();
				} else if (startTime < 0) {
					setup();
				}
			} else {
				clearTimeout(timerID);
			}
		}
		
		function setup() {
			if (reverse) {
				forward = !forward;
			}
			startTime = $.now();
		}
		
		function loop() {
			if (startTime < 0) {
				return;
			}
			var ratio = ($.now()-startTime)/duration;
			ratio = Math.min(1,ratio);
			ratio = jQuery.easing.easeInOutCubic(0,ratio,forward ? 0 : 1,forward ? 1 : -1,1);
			
			var pos = parseInt((ow+size+offset)*ratio,10)-size-offset;
			
			buffer.clearRect(0,0,ow,oh);
			buffer.globalCompositeOperation = "source-over";
			buffer.drawImage(mask.canvas,pos,0);
			buffer.globalCompositeOperation = "destination-in";
			buffer.drawImage(shine.canvas,0,0);
			
			
			c2d.clearRect(0,0,ow,oh);
			c2d.globalCompositeOperation = "source-over";		
			c2d.drawImage(csource.canvas,glow,glow);
			c2d.globalCompositeOperation = "lighter";
			c2d.drawImage(buffer.canvas,0,0);
			
			if (!hidden) {
				source.fadeTo(0,0);
				hidden = true;
			}

			if ((forward && ratio === 1) || (!forward && ratio === 0)) {
				startTime = -1;
				if (mouseOver && !paused) {
					var timerDelay = (forward && reverse) ? delay : repeat;
					if (timerDelay >= 0) {
						timerID = setTimeout(setup,timerDelay);
					}
				}
			}	
		}
		
		function pause() {
			paused = true;
			clearTimeout(timerID);
		} 
		
		function resume() {
			paused = false;
			
			if (!booted) {
				return;
			}
			
			if (!inited) {
				initEffect();
			} else if (startTime < 0) {
				setup();
			}
		}
		
		$.extend(this, {
			// plublic API
			"resume": resume,
			"pause": pause,
			destroy: function() {
				target.data("peShiner", null);
				target = undefined;
			}
		});
		
		
		// initialize
		start();
	}
	
	// jQuery plugin implementation
	$.fn.peShiner = function(conf) {
		
		// return existing instance	
		var api = this.data("peShiner");
		
		if (api) { 
			return api; 
		}
		
		conf = $.extend(true, {}, $.pixelentity.peShiner.conf, conf);
		
		// install the plugin for each entry in jQuery object
		this.each(function() {
			var el = $(this);
			api = new PeShiner(el, conf);
			el.data("peShiner", api); 
		});
		
		return conf.api ? api: this;		 
	};
	
}(jQuery));