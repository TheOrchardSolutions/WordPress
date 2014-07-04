﻿/*********************************************

morpheus plugin by webpsilon.com

Author : extendyourweb.com/
URL    : http://www.extendyourweb.com/
License: http://www.extendyourweb.com/license

*********************************************/

videoplay=0;

stopslider=0;

videoyouplay="";


 jQuery(document).ready(function () {

	 
	
	 
	
	
	runmorpheus();


 });
	 
	
	 

 
 

 
 function runmorpheus() {


	 scenetimes = new Array();
 sceneitems = new Array();
 sceneload = new Array();
scenemode=new Array();
sceneplay=new Array();
 scenecont=0; // IGUAL HAY QUE PONERLO EN ARRAY
 
 scenebefore=new Array();
	  morpheusref=600;

	  
	  var scenes	= jQuery(".morpheus");
	var total_scenes=jQuery(".morpheus").length;
	
	
	var first=0;
	
	
	scenes.each(function(){
		
		var scene	= jQuery(this);
		var marco	= jQuery("#m"+scene.attr("name"));
		
		var maxwidth=scene.css('max-width');
		var maxheight=scene.css('max-height');
	
		sceneload[scene.data("cont")]=0;
		
		
		var width=scene.width();
		
		
		
		scene.hide();
		
		
	
		
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"));
		}
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"));
		}
		
		if(parseInt(scene.css("borderTopWidth"))>0) {
			
			
			var esc2=width/morpheusref;
			scene.css({"border-width" : Math.round(parseInt(scene.css("borderTopWidth"))*esc2) +"px"});
			//width=width-(2*parseInt(scene.css('borderTopWidth')));
			
		}
		
		
		var esc=parseInt(maxwidth)/parseInt(maxheight);
		
		var height=Math.round(width/esc);
		
		
		
		
		
		
		
		
		scene.width(width).height(height);
		
		
		//jQuery("#m"+scene.attr("name")).width(width);
		
		
		// navegation buttons
		
		if(first==0) {
			
			
			
			
	
	
			first=1;
			
			var rescou=0;
			jQuery(window).resize(function(){
				
				if(rescou>0)resizemaxslider();
				rescou=1;
	
});


			 if(scene.data("isa")=="1") {
		  
				  var ar=jQuery("#aslidermorpheus"+scene.data("id"));
				  var al=jQuery("#bslidermorpheus"+scene.data("id"));
				
					ar.click(function() {
						
  						changescene(scenecont-1);
					});
					al.click(function() {
						
  						changescene(scenecont+1);
					});
				 
			  }
			  
			  // thumbnails iniciate
			  
			  if(parseInt(scene.data("op1"))>=1) {
				  
				  if(parseInt(scene.data("op1"))==2 || parseInt(scene.data("op1"))==3) {
					  
					 var mthumb=jQuery("#spthumbnails"+scene.data("id"));
					 var mt=0;
					 if(parseInt(scene.data("op3"))>0) {
						 mt=parseInt(scene.data("op3"));
					 }
					 mthumb.height(scene.outerHeight());
					 //mthumb.width(mthumb.width()*(scene.width()/morpheusref))
					 mthumb.find(".thumbnail2").width(mthumb.width()-(2*mt)-(2*parseInt(mthumb.find(".thumbnail2").css("borderRightWidth"))));
					 jQuery("#spmtlr"+scene.data("id")).height(scene.outerHeight());
					 
					 var ht=Math.round(mthumb.height()/parseInt(scene.data("nt")))-(mt)-(2*parseInt(mthumb.find(".thumbnail2").css("borderTopWidth")));
					 
					 mthumb.find(".thumbnail2").height(ht);
					var axuft=Math.round(parseInt(mthumb.find(".thumbnail2").find(".text").css("font-size"))*(scene.width()/morpheusref));
					 if(axuft<8) axuft=8;
					  //mthumb.find(".thumbnail2").width(Math.round(mthumb.find(".thumbnail2").width()*(scene.width()/morpheusref)));
					 mthumb.find(".thumbnail2").find(".text").css({"font-size" : axuft +"px"});   
					 
					 
					
					 
					 if(parseInt(scene.data("scenes"))>parseInt(scene.data("nt")))mthumb.bind("mousemove", function(e){
						 var parentOffset = jQuery(this).parent().offset(); 
   //or $(this).offset(); if you really just want the current element's offset

   var relY = e.pageY - parentOffset.top;
   						//jQuery(this).clearQueue();
        				//jQuery(this).css({"scrollTop" : jQuery(this).scrollTop()});
						 jQuery(this).scrollTop(Math.round(relY*((theightr-jQuery(this).outerHeight())/jQuery(this).outerHeight())));
    				});
					  
				  }
				  else {
					  
					  
					  
					  
					   var mthumb=jQuery("#spthumbnails"+scene.data("id"));
					 var mt=0;
					 if(parseInt(scene.data("op3"))>0) {
						 mt=parseInt(scene.data("op3"));
					 }
					 
					 mthumb.find(".thumbnail1").height(mthumb.height()-(2*mt)-(2*parseInt(mthumb.find(".thumbnail1").css("borderRightWidth"))));
					// jQuery("#spmtlr"+scene.data("id")).width(scene.outerWidth());
					 
					 var mts=parseInt(mthumb.css("margin-left"));
					 
					 mthumb.width(mthumb.width()-(2*mts));
					 var ht=Math.round(mthumb.width()/parseInt(scene.data("nt")))-(mt)-(2*parseInt(mthumb.find(".thumbnail1").css("borderTopWidth")));
					 
					 mthumb.find(".thumbnail1").width(ht);
					  mthumb.find(".thumbnail1").height(Math.round(mthumb.find(".thumbnail1").height()*(scene.width()/morpheusref)));
					 
					  
					  var axuft=Math.round(parseInt(mthumb.find(".thumbnail1").find(".text").css("font-size"))*(scene.width()/morpheusref));
					  if(axuft<8) axuft=8;
					 mthumb.find(".thumbnail1").find(".text").css({"font-size" : axuft +"px"});
					 
					 
					 
					   if(parseInt(scene.data("scenes"))>parseInt(scene.data("nt"))) mthumb.bind("mousemove",function(e){
						  
						  
						 var parentOffset = jQuery(this).parent().offset(); 
   //or $(this).offset(); if you really just want the current element's offset
   var relX = e.pageX - parentOffset.left;

   						//jQuery(this).clearQueue();
        				//jQuery(this).css({"scrollTop" : jQuery(this).scrollTop()});
						 
						 
						 var at1=Math.round(relX*((twidthr-jQuery(this).outerWidth())/jQuery(this).outerWidth()));
						  jQuery(this).scrollLeft(at1);
						  //jQuery(this).scrollLeft(relX);
    				});
					
					  
				  }
				  
				  
				  
				  theightr=0;
				  twidthr=0;
				  var tht=0;
				  var twt=0;
				  var thumbnails =jQuery(".shadowt");
				  
				  
				  var conttu=0;
				  thumbnails.each(function(){
					  jQuery(this).delay(500*conttu).animate({"opacity" : 1}, 500);
					  theightr+=jQuery(this).outerHeight()+parseInt(jQuery(this).css("margin-top"))+parseInt(jQuery(this).css("margin-bottom"));
					  twidthr+=jQuery(this).outerWidth()+parseInt(jQuery(this).css("margin-left"))+parseInt(jQuery(this).css("margin-right"));
					  tht=jQuery(this).outerHeight()+parseInt(jQuery(this).css("margin-top"))+parseInt(jQuery(this).css("margin-bottom"));
					  twt=jQuery(this).outerWidth()+parseInt(jQuery(this).css("margin-left"))+parseInt(jQuery(this).css("margin-right"));
					  conttu++;
				  });
				  
			  }
			  
			first=1;  
			  
		}
		
		
		first=1;
		if(scene.data("mode")!="verticalslider") {
			jQuery("#m"+scene.attr("name")).css({"position" : "absolute", "top" : "0px", "left" : "0px"});
			
		}
		
		var images		= scene.find("img");
		var total_elems=jQuery("#"+scene.attr("name")+" img").length;
		var loaded		= 0;
		
		if(total_elems<=0) inicescene(scene);

		images.each(function(){
							var img	= jQuery(this);
							
							jQuery("<img/>").attr("src", img.attr("src")).load(function(){
								
								
								// image scalate
								//var medac=Math.round((this.width/.$width.')*sliderwidth);
								
								
								//img.css({\'width\'	: medac + \'px\'});
								
								//
								++loaded;
								if(loaded	== total_elems){
									
									if(scene.data("mode")=="verticalslider" || scene.data("cont")==0) inicescene(scene);
									
								}
							})
						});
		
		
		
	})
	
	 
 }
 
 

					
					
					
					
 
 function morpheusloader(scene) {
	 
	 
	 
	 if(sceneload[scene.data("cont")]!=1) jQuery("#l"+scene.attr("name")).animate({"opacity" : 0.5}, { duration : 500, easing: "linear", step: function(now, fx){
				
				

				
				var rotationr=(360*fx.pos);	
				
				
                var rota="rotate("+rotationr+"deg)";
                
				
				jQuery(fx.elem).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
				
				
				
				 
            }, complete: function () {
							
							morpheusloader(scene);
						
							
			}
						
						});
						
						else jQuery("#l"+scene.attr("name")).animate({"opacity" : 0}, 0, function () { jQuery(this).hide(); createscene(scene); playscene(scene); });
 }
 
 
function loadscene(scene) {
	
	 if(scene.data("ism")=="1")  {  // music
			   
			   var buttonmusic=jQuery("#buttonmusic"+scene.data("id"));
					  buttonmusic.css({"opacity" : 1});
					  buttonmusic.show();
			   }
	
	
	 if(scene.data("isb")!="1")  {
		 if(scenebefore[scene.data("id")]) {
			jQuery("#bullet"+scenebefore[scene.data("id")].data("cont")).removeClass("bulletactive");
		}
		 
		 jQuery("#bullet"+scene.data("cont")).addClass("bulletactive");
		 
	 }
	
	
	if(parseInt(scene.data("op1"))>0) {
		
		if(scenebefore[scene.data("id")]) {
			jQuery("#tsps"+scenebefore[scene.data("id")].data("cont")).parent().animate({"opacity" : 1});
		}
		jQuery("#tsps"+scene.data("cont")).parent().animate({"opacity" : 0.5});
		
		
		if(parseInt(scene.data("op1"))==2 || parseInt(scene.data("op1"))==3) {
		
		
   //or $(this).offset(); if you really just want the current element's offset

  
   
   
			var mthumb=jQuery("#spthumbnails"+scene.data("id"));
			
			
			var pos = jQuery("#tsps"+scene.data("cont")).offset();
			var pos2 = mthumb.offset();
			
			var auxts=Math.round(mthumb.scrollTop());
			
			if (jQuery("#spthumbnails"+scene.data("id")+":hover").length == 0 && parseInt(scene.data("scenes"))>parseInt(scene.data("nt"))) mthumb.animate({"scrollTop" : Math.round(pos.top-pos2.top+auxts)}, 1000);
			
		}
		if(parseInt(scene.data("op1"))==1 || parseInt(scene.data("op1"))==4) {
		
		
   //or $(this).offset(); if you really just want the current element's offset

  
   
   
			var mthumb=jQuery("#spthumbnails"+scene.data("id"));
			
			
			var pos = jQuery("#tsps"+scene.data("cont")).offset();
			var pos2 = mthumb.offset();
			
			var auxts=Math.round(mthumb.scrollLeft());
			if (jQuery("#spthumbnails"+scene.data("id")+":hover").length == 0 && parseInt(scene.data("scenes"))>parseInt(scene.data("nt"))) mthumb.animate({"scrollLeft" : Math.round(pos.left-pos2.left+auxts)}, 1000);
			
		}
	}
	
		  var total=parseInt(scene.data("total"));
	  var id=parseInt(scene.data("cont"));
	  
	  if(total<=0) sceneload[scene.data("cont")]=1;
	  
	  var cont=0;
	  
	  while(cont<total) {
		  
		  //search items
		  
		  var values=scene.data("itemslider"+id+"-"+cont).split("-k3sl9-");
		  
		  var i=jQuery("#itemslider"+id+"-"+cont);
		  
		  if(values[1]=="" && values[0]!="") {
			  
			  
			  
			  i.attr("src", values[0]);
			  
			  
		  }
		  //i.removeAttr("style");
		  //i.css({"opacity" : 0, "position" : "absolute"});
		  
		  
		  cont++;
	  }
	
	
	
	
	var images		= scene.find("img");
		var total_elems=jQuery("#"+scene.attr("name")+" img").length;
		var loaded		= 0;
		
		if(total_elems<=0) sceneload[scene.data("cont")]=1;
		
		
		images.each(function(){
							var img	= jQuery(this);
							
							jQuery("<img/>").attr("src", img.attr("src")).load(function(){
								

								++loaded;
								if(loaded	== total_elems){
									
									sceneload[scene.data("cont")]=1;
									 
									
								}
							})
						});
						
						
						morpheusloader(scene);
	
}
 
 function inicescene(scene) {


scene.show();
	 
	 
	 if(scene.data("mode")=="verticalslider" || scene.data("cont")==scenecont){
		 
	scene.find("img").css({"opacity" : 0});
	scene.find("div").css({"opacity" : 0});
 	
	
	//jQuery("#m"+scene.attr("name")).removeAttr("style")
	
	//iniciate marc
	
	
	jQuery("#m"+scene.attr("name")).clearQueue();
	
	// escalate scene
	
			var marco	= jQuery("#m"+scene.attr("name"));
		
		var maxwidth=scene.css('max-width');
		var maxheight=scene.css('max-height');
	
		
		var width=jQuery("#slidermorpheus"+scene.data("id")).width();
		
		
		
		
		
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"));
		}
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"));
		}
		
		if(parseInt(scene.css("borderTopWidth"))>0) {
			
			
			var esc2=width/scene.width();
			scene.css({"border-width" : Math.round(parseInt(scene.css("borderTopWidth"))*esc2) +"px"});
			width=width-(2*parseInt(scene.css('borderTopWidth')));
			
		}
		
		
		var esc=parseInt(maxwidth)/parseInt(maxheight);
		
		var height=Math.round(width/esc);
		
		
		
		
		
		
		
		
		scene.width(width).height(height);
	
	
	
	if(scene.data("mode")!="verticalslider") {
		

		if(scene.outerHeight()>0) jQuery("#slidermorpheus"+scene.data("id")).height(scene.outerHeight());
	}
	
	
	if(scene.outerWidth()>0) {
	
		var persperc=Math.round(scene.outerWidth());
	 
		jQuery("#slidermorpheus"+scene.data("id")).css({"-webkit-perspective" : persperc, "-moz-perspective" : persperc+"px"});
	}
	 
	
	///////////////////
	
	
	
	
	
	var rota2="rotate(0deg)";
	jQuery("#m"+scene.attr("name")).css({"opacity" : 1, '-webkit-transform': rota2, '-moz-transform': rota2, '-ms-transform': rota2,'-o-transform': rota2,'transform': rota2});
	jQuery("#m"+scene.attr("name")).show();
	
	
	
	
		if(scene.data("effect")=="0") { // no effect
			jQuery("#m"+scene.attr("name")).css({"opacity" : 1});
			loadscene(scene);
		}
	
		if(scene.data("effect")=="1") { // opacity effect
		jQuery("#m"+scene.attr("name")).css({"opacity" : 0});
			if(scenebefore[scene.data("id")] && parseInt(scene.data("scenes"))>1) {
				
				 jQuery("#m"+scenebefore[scene.data("id")].attr("name")).animate({"opacity" : 0}, {duration: parseInt(scene.data("etime")), easing: scene.data("aeffect"), complete: function () {
					 
					 
		
					 
					 jQuery("#m"+scenebefore[scene.data("id")].attr("name")).hide();
							
							//scenebefore[scene.data("id")].hide();
							}});
			}
			
			
				 
				 jQuery("#m"+scene.attr("name")).animate({"opacity" : 1}, {duration: parseInt(scene.data("etime")), easing: scene.data("aeffect"), complete: function () {
							loadscene(scene);
							
							}});
			
		}
		
		
		
		
		if(scene.data("effect")=="2" || scene.data("effect")=="3" || scene.data("effect")=="4"  || scene.data("effect")=="5") { // rotaty effect
	
	
	
	jQuery("#m"+scene.attr("name")).css({"opacity" : 1});	
		var axis="Y";
		
		if(scene.data("effect")=="3" || scene.data("effect")=="4") {
			axis="X";
		}
		
		var auxslider=jQuery("#slidermorpheus"+scene.data("id"));
		var rota="rotate"+axis+"(180deg)";
		
		
		
		if(scenebefore[scene.data("id")] && parseInt(scene.data("scenes"))>1) {
			rota="rotate"+axis+"(90deg)";
		
		 var options = {};
		  
		  options['opacity'] = 1;
		  
		  var rota2="rotate"+axis+"(180deg)";
					
		//if(scene.data("effect")=="4") rota2="rotate"+axis+"(90deg)";
		  
			
			
			if(scene.data("effect")=="4" || scene.data("effect")=="5") {
				//jQuery("#m"+scene.attr("name")).css({"top": -(jQuery("#m"+scene.attr("name")).height()/2), "width": (jQuery("#m"+scene.attr("name")).width()/2)+"px", "height": (jQuery("#m"+scene.attr("name")).height()/2)+"px"});
				jQuery("#m"+scene.attr("name")).css({"opacity" : 0, '-webkit-transform': rota2, '-moz-transform': rota2, '-ms-transform': rota2,'-o-transform': rota2,'transform': rota2});
				
				options['opacity'] = 0;
			}
			
			else jQuery("#m"+scene.attr("name")).css({"opacity" : 1, '-webkit-transform': rota2, '-moz-transform': rota2, '-ms-transform': rota2,'-o-transform': rota2,'transform': rota2});
			
		
		 jQuery("#m"+scenebefore[scene.data("id")].attr("name")).delay(50).animate(options, {duration: parseInt(scene.data("etime")), easing: scene.data("aeffect"), step: function(now, fx){
					
				
				var topb=0;
				if(scene.data("effect")!="4" && scene.data("effect")!="5") {
					
					var rotationr=-Math.round(180*fx.pos);
	
					rota="rotate"+axis+"("+rotationr+"deg)";
					rota2="rotate"+axis+"("+(180+rotationr)+"deg)";
				}
				else {
					
					var rotationr=-Math.round(90*fx.pos);

					rota="rotate"+axis+"("+rotationr+"deg)";
					rota2="rotate"+axis+"("+(90+rotationr)+"deg)";
					topb=-Math.round(-(jQuery("#m"+scene.attr("name")).height()/2) +(fx.pos*(jQuery("#m"+scene.attr("name")).height()/2)));
				
					jQuery("#m"+scene.attr("name")).css({'opacity' : (1*fx.pos)});
				}
								
								
				jQuery(fx.elem).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
				
				jQuery("#m"+scene.attr("name")).css({'-webkit-transform': rota2, '-moz-transform': rota2, '-ms-transform': rota2,'-o-transform': rota2,'transform': rota2, 'top': topb });
				
				 
            }, complete: function () {
				
				
				jQuery("#m"+scenebefore[scene.data("id")].attr("name")).hide();
					loadscene(scene);
					}});
					
					}//
					
			else {
				
				var axis="Y";
		
		if(scene.data("effect")=="3" || scene.data("effect")=="4") axis="X";
				
				
				jQuery("#m"+scene.attr("name")).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
		 jQuery("#m"+scene.attr("name")).delay(50).animate({"opacity" : 1}, {duration: parseInt(scene.data("etime")), easing: scene.data("aeffect"), step: function(now, fx){
					
				var rotationr=180-Math.round(180*fx.pos);

                rota="rotate"+axis+"("+rotationr+"deg)";
				
                				
				jQuery(fx.elem).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
				
				 
            }, complete: function () {
				
				
				
					loadscene(scene);
					
					}});
				
				
				
				
			}
					
					
					
		}
		
		
		
	
	
	
	 }
				
				else jQuery("#m"+scene.attr("name")).hide();
	
	 }
	 
  function createscene2(scene, esca) {
	  
	  // create image items
	  
  var esc2=(esca);
	 
	  var total=parseInt(scene.data("total"));
	  var id=parseInt(scene.data("cont"));
	  
	 
	  var cont=0;
	  
	  while(cont<total) {
		  
		
		  //search items

		  var values=scene.data("itemslider"+id+"-"+cont).split("-k3sl9-");
		  
		  var esc=scene.width()/morpheusref;
		  
		  var i=jQuery("#itemslider"+id+"-"+cont);
		  var ileft=Math.round(parseInt(values[16])*esc);
		  var itop=Math.round(parseInt(values[17])*esc);
		   var iwidth=Math.round(parseInt(values[24])*esc);
		 if(values[1]=="html") var iheight=values[25];
		 else var iheight=Math.round(parseInt(values[25])*esc);
		  var iangle=Math.round(parseInt(values[18]));
		  var iopacity=values[19];
		  
		  
		  var mleft=Math.round(parseInt(values[2])*esc);
		  var mtop=Math.round(parseInt(values[3])*esc);
		   var mwidth=Math.round(parseInt(values[26])*esc);
		  if(values[1]=="html") var mheight=values[27];
		 else var mheight=Math.round(parseInt(values[27])*esc);
		  var mangle=Math.round(parseInt(values[4]));
		  var mopacity=values[5];
		  
		  var eleft=Math.round(parseInt(values[20])*esc);
		  var etop=Math.round(parseInt(values[21])*esc);
		   var ewidth=Math.round(parseInt(values[28])*esc);
		  if(values[1]=="html") var eheight=values[29];
		 else var eheight=Math.round(parseInt(values[29])*esc);
		  var eangle=Math.round(parseInt(values[22]));
		  var eopacity=values[23];
		  
		  var axis=values[30];
		  
		  
		 i.data("srx", Math.round(parseInt(values[31])*esc)); 
		  
		  i.data("axis", axis);
		  i.data("scene", id);
		  i.data("ileft", ileft);
		  i.data("itop", itop);
		  i.data("iwidth", iwidth);
		  i.data("iheight", iheight);
		  i.data("iangle", iangle);
		  i.data("iopacity", iopacity);
		  i.data("istart", parseInt(values[9]));
		  i.data("itime", parseInt(values[14]));
		  i.data("ief", values[6]);
		 
		  
		  
		  i.data("mleft", mleft);
		  i.data("mtop", mtop);
		  i.data("mwidth", mwidth);
		  i.data("mheight", mheight);
		  i.data("mangle", mangle);
		  i.data("mopacity", mopacity);
		  i.data("mtime", parseInt(values[11]));
		   i.data("mef", values[7]);
		  
		  i.data("eleft", eleft);
		  i.data("etop", etop);
		  i.data("ewidth", ewidth);
		  i.data("eheight", eheight);
		  i.data("eangle", eangle);
		  i.data("eopacity", eopacity);
		  i.data("etime", parseInt(values[10]));
		   i.data("eef", values[8]);
		   
		   i.data("tipo", values[1]);
		   i.data("id", scene.data("cont"));
		 
		
		  i.data("link", values[12]);
		 
		 
			if(values[1]!="html") {			
				i.width(Math.round(i.width()*esc2));
				i.height(Math.round(i.height()*esc2));
			}
			else{
				
				i.css({"font-size" : Math.round(parseInt(i.css("font-size"))*esc2)+"px"});
			}
			
			i.css({"top" : Math.round(parseInt(i.css("top"))*esc2)+"px", "left" : Math.round(parseInt(i.css("left"))*esc2)+"px"});
				
		  
		  ///////////
		  cont++;
	  }
	  

		

							
	  
  } 
 
  function createscene(scene) {
	  
	  // create image items
	  
  
	 
	  var total=parseInt(scene.data("total"));
	  var id=parseInt(scene.data("cont"));
	  
	  sceneitems[id]=0;
	sceneplay[id]=1;

	  var cont=0;
	  
	  while(cont<total) {
		  
		
		  //search items

		  var values=scene.data("itemslider"+id+"-"+cont).split("-k3sl9-");
		  
		  var esc=scene.width()/morpheusref;
		  
		  var i=jQuery("#itemslider"+id+"-"+cont);
		  var ileft=Math.round(parseInt(values[16])*esc);
		  var itop=Math.round(parseInt(values[17])*esc);
		   var iwidth=Math.round(parseInt(values[24])*esc);
		 if(values[1]=="html") var iheight=values[25];
		 else var iheight=Math.round(parseInt(values[25])*esc);
		  var iangle=Math.round(parseInt(values[18]));
		  var iopacity=values[19];
		  
		  
		  var mleft=Math.round(parseInt(values[2])*esc);
		  var mtop=Math.round(parseInt(values[3])*esc);
		   var mwidth=Math.round(parseInt(values[26])*esc);
		  if(values[1]=="html") var mheight=values[27];
		 else var mheight=Math.round(parseInt(values[27])*esc);
		  var mangle=Math.round(parseInt(values[4]));
		  var mopacity=values[5];
		  
		  var eleft=Math.round(parseInt(values[20])*esc);
		  var etop=Math.round(parseInt(values[21])*esc);
		   var ewidth=Math.round(parseInt(values[28])*esc);
		  if(values[1]=="html") var eheight=values[29];
		 else var eheight=Math.round(parseInt(values[29])*esc);
		  var eangle=Math.round(parseInt(values[22]));
		  var eopacity=values[23];
		  
		  var axis=values[30];
		  
		  
		  
		  
		  i.data("axis", axis);
		  i.data("scene", id);
		  i.data("ileft", ileft);
		  i.data("itop", itop);
		  i.data("iwidth", iwidth);
		  i.data("iheight", iheight);
		  i.data("iangle", iangle);
		  i.data("iopacity", iopacity);
		  i.data("istart", parseInt(values[9]));
		  i.data("itime", parseInt(values[14]));
		  i.data("ief", values[6]);

		 i.data("srx", Math.round(parseInt(values[31])*esc));
		  
		  
		  i.data("mleft", mleft);
		  i.data("mtop", mtop);
		  i.data("mwidth", mwidth);
		  i.data("mheight", mheight);
		  i.data("mangle", mangle);
		  i.data("mopacity", mopacity);
		  i.data("mtime", parseInt(values[11]));
		   i.data("mef", values[7]);
		  
		  i.data("eleft", eleft);
		  i.data("etop", etop);
		  i.data("ewidth", ewidth);
		  i.data("eheight", eheight);
		  i.data("eangle", eangle);
		  i.data("eopacity", eopacity);
		  i.data("etime", parseInt(values[10]));
		   i.data("eef", values[8]);
		   
		   i.data("tipo", values[1]);
		   i.data("id", scene.data("cont"));
		 
		
		  i.data("link", values[12]);
		 
						
		
				
		  
		  ///////////
		  cont++;
	  }
	  

		

							
	  
  }
  
  function middlescene(i) {
	 
	 // scene middle
	   
          
		    var options = {};
		  
		  options['opacity'] = i.data("eopacity");
		  options['top'] = i.data("etop") + 'px';
		  options['left'] = i.data("eleft") + 'px';
		  
		  if(i.data("tipo")=="html") {

			  options['color'] = '#'+i.data("eheight");
		  }
		  else {
		
		  
		  options['width'] = i.data("ewidth");
		  options['height'] = i.data("eheight");
		  }
	 
	 
	 
	    i.delay(i.data("mtime")).queue( function(next){ if(videoplay!=1 && stopslider!=1 && (jQuery(this).data("id"))==scenecont) {
			
			next();
		}}).animate(options, { duration: i.data("etime"), easing: i.data("eef"), step: function(now, fx){
				
				var contr=jQuery(fx.elem).attr("name");
					contr=contr.substring(10, contr.length);
					
				var tang=0;
				
				if(jQuery(fx.elem).data("mangle")!=jQuery(fx.elem).data("eangle")) tang=1;
				
				if(tang==1) {
					
				
				var rotationr=(jQuery(fx.elem).data("mangle")*(1-fx.pos))+(jQuery(fx.elem).data("eangle")*fx.pos);
					
	
				//var auxi=Math.round(rotationr*fx.pos);
                			
				
                var rota="rotate"+jQuery(fx.elem).data("axis")+"("+rotationr+"deg)";
                
				
				jQuery(fx.elem).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
				
				}
				
				 
            }, complete: function() { 
			
							
		
	
	
	sceneitems[jQuery(this).data("scene")]=sceneitems[jQuery(this).data("scene")]+1;
	
	
	if(sceneplay[jQuery(this).data("id")]==1) jQuery(this).css({"opacity" : 0});
	

	}
	
	});
	 
	 
	 
 }
 
 function resizescene() {
	 
	 // resize and colocate the items
	 
 }
 
 function playscene(scene) {
	 
	 // play the items
	 
	 
	  var total=parseInt(scene.data("total"));
	  var id=parseInt(scene.data("cont"));
	  
	  
	  if(scene.data("isb")!="1")  { //bullets
	 	
		scenebullets(scene);
	  }
	  
	  
	  if(scene.data("isa")=="1") { //next-prev buttons
		  
		 scenenavbut(scene);
	  }
	  
	  clearTimeout(scenetimes[scene.data("id")]);
			
		scenetimes[scene.data("id")]=setTimeout(function() {
      endscene(scene);
}, scene.data("time"));

	  sceneitems[id]=0;
	 
	  var cont=0;
	  
	  while(cont<total) {
		  
		  //search items
		  
		
		  
		  var esc=scene.width()/morpheusref;
		  
		  var i="";

		  i = jQuery("#itemslider"+id+"-"+cont);

		  i.clearQueue();
		
		  ileft=i.data("ileft");
		  itop=i.data("itop");
		  iwidth=i.data("iwidth");
		  iheight=i.data("iheight");
		  iangle=i.data("iangle");
		  iopacity=i.data("iopacity");
		  istart=i.data("istart");
		  itime=i.data("itime");
		  ief=i.data("ief");
		  
		  mleft=i.data("mleft");
		  mtop=i.data("mtop");
		  mwidth=i.data("mwidth");
		  mheight=i.data("mheight");
		  mangle=i.data("mangle");
		  mopacity=i.data("mopacity");
		  mtime=i.data("mtime");
		  mef=i.data("mef");
		  srx=i.data("srx");

		 
		i.find("img").css("opacity", "1");
		i.find("div").css("opacity", "1");
		  
		  
		
		 
		  i.css({"left" : ileft + "px", "top" : itop +"px", "opacity": 0, "position" : "absolute"});
		  
		  var rotation="rotate"+i.data("axis")+"("+iangle+"deg)";
						
		  i.css({'-webkit-transform': rotation, '-moz-transform': rotation, '-ms-transform': rotation,'-o-transform': rotation,'transform': rotation});
		

		  if(i.data("link")!="") i.css({'cursor' : 'pointer'});
		  
		  //////////// show and first animation
		  
		  
		  
		  
		  var options = {};
		  
		  if(mopacity!=iopacity) options['opacity'] = mopacity;
		  if(mtop!=itop) options['top'] = mtop;
		  if(mleft!=ileft) options['left'] = mleft;
		  
		  if(i.data("tipo")=="html") {
			  i.width(iwidth);
			  //if(mheight!=iheight) options['color'] = '#'+mheight;
			  i.css({"font-size" : srx + 'px'});
			  i.css({"color" : '#'+iheight});
			  i.css({"white-space" : "normal"});
			  i.css({"text-align" : "justify"});
		  }
		  else {
		
		
		 i.width(iwidth);
		  i.height(iheight);	  
		  if(mwidth!=iwidth) options['width'] = mwidth;
		  if(mheight!=iheight) options['height'] = mheight;
		  }
		
		

		
		  i.delay(i.data("istart")).queue( function(next){ 

     

    if(videoplay!=1 && (jQuery(this).data("id"))==scenecont) {
		jQuery(this).show();
		jQuery(this).css("opacity",jQuery(this).data("iopacity"));
		next(); 
	}
	

	
  }).animate(options, { duration : jQuery(this).data("itime"), easing: jQuery(this).data("ief"), step: function(now, fx){
				
				
				
				var contr=jQuery(fx.elem).attr("name");
					contr=contr.substring(10, contr.length);
					
				var tang=0;
				
				if(jQuery(fx.elem).data("iangle")!=jQuery(fx.elem).data("mangle")) tang=1;
				
				if(tang==1) {
				
				var rotationr=(jQuery(fx.elem).data("iangle")*(1-fx.pos))+(jQuery(fx.elem).data("mangle")*fx.pos);	
				
				
                var rota="rotate"+jQuery(fx.elem).data("axis")+"("+rotationr+"deg)";
                
				
				jQuery(fx.elem).css({'-webkit-transform': rota, '-moz-transform': rota, '-ms-transform': rota,'-o-transform': rota,'transform': rota });
				
				
				}
				
				 
            }, complete: function () {
				
							
						if(sceneplay[scene.data("cont")]==1) middlescene(jQuery(this));	// end function
						else {
							jQuery(this).hide();	
						}
			}
						
						});
						
						
				
		  
		  ///////////
		  cont++;
	  }
	  

		
		
							
	  
	 
 }
 



 
 function endscene(scene) {
	 
	 // scene end
	 
	 clearTimeout(scenetimes[scene.data("id")]);
	 
	  var id=parseInt(scene.data("cont"));
	
	
	
	sceneplay[id]=0;
	
	 if(videoplay!="1" && stopslider!=1) {
		 if(scene.data("mode")=="verticalslider") playscene(scene);
		 
		 else {
			 
			 // next scene
			 scenecont++;
			 
			 if(scenecont>=scene.data("scenes")) scenecont=0;
			 
			 var scene2=jQuery("#morpheus"+scenecont);
			 
			 scenebefore[scene.data("id")]=scene;
			 
			 
			 
			 //////// 

			  if(scene.data("isa")=="1") {
		  
				  var ar=jQuery("#aslidermorpheus"+scene.data("id"));
				  var al=jQuery("#bslidermorpheus"+scene.data("id"));
				  ar.css({"opacity" : 0});
				  al.css({"opacity" : 0});
				  
				  ar.hide();
				  al.hide();
				  
			  }
			  
			  if(scene.data("isb")!="1")  { //bullets
			   
					  var bullets=jQuery("#buslidermorpheus"+scene.data("id"));
					  bullets.css({"opacity" : 0});
					  bullets.hide();
			   }
			   
			   if(scene.data("ism")=="1")  {  // music
			   
			   var buttonmusic=jQuery("#buttonmusic"+scene.data("id"));
					  buttonmusic.css({"opacity" : 0});
					  buttonmusic.hide();
			   }
			 
			 
			  if(scene2.data("effect")=="0") {
				 
				 jQuery("#m"+scene.attr("name")).hide();
				
				
				 inicescene(scene2);
				
				
			 
			 }
			 

				
				if(scene2.data("effect")=="1" || scene2.data("effect")=="2" || scene2.data("effect")=="3" || scene2.data("effect")=="4"  || scene2.data("effect")=="5"  || scene2.data("effect")=="6") {
				 
				 
				
				
				 inicescene(scene2);
				
				
			 
			 }
			 
			 ////////
		 }
	 }
	
	 else {
		
		if(videoplay!="1" && stopslider!=1) scenetimes[scene.data("id")]=setTimeout(function() {
      endscene(scene);
}, 200);
		
	 }
	
 }



function stopvideo() {

	   
	   window[videoyouplay+"stop"]();
  }


function changescene(gotoscene) {
	 
	 // scene end
	
	 
	 if(gotoscene!=scenecont) {
		 
		 if(videoplay=="1") {
			 
	
			stopvideo();
			 //jQuery('player11').stopVideo();
		 }
	 
	 var scene=jQuery("#morpheus"+scenecont);
	 
	  var id=parseInt(scene.data("cont"));
	sceneplay[id]=0;
	
	clearTimeout(scenetimes[scene.data("id")]);
	
	
	
	
	
	total=scene.data("total");
		  sceneitems[id]=0;
	 
	  var cont=0;
	  
	  while(cont<total) {
		  
		  //search items
		  
		
		  
		 
		  
		  var i=jQuery("#itemslider"+id+"-"+cont);
			
		  i.clearQueue();
		  cont++;
	  }
	
	
	
	
			 // next scene
			 scenecont=gotoscene;
			 
			 if(scenecont>=scene.data("scenes")) scenecont=0;
			 
			 if(scenecont<0) scenecont=scene.data("scenes")-1;
			 
			 var scene2=jQuery("#morpheus"+scenecont);
			 
			 scenebefore[scene.data("id")]=scene;
			 
			 
			 
			 //////// 
			 
			 
			 
			 if(scene2.data("effect")=="0") {
				 
				 jQuery("#m"+scene.attr("name")).hide();
				
				
				 inicescene(scene2);
				
				
			 
			 }
			 

				
				if(scene2.data("effect")=="1" || scene2.data("effect")=="2" || scene2.data("effect")=="3" || scene2.data("effect")=="4"  || scene2.data("effect")=="5"  || scene2.data("effect")=="6"  || scene2.data("effect")=="7"  || scene2.data("effect")=="8"  || scene2.data("effect")=="9") {
				 
				 
				
				
				 inicescene(scene2);
				
				
			 
			 }
			 
			  if(scene.data("isa")=="1") {
		  
				  var ar=jQuery("#aslidermorpheus"+scene.data("id"));
				  var al=jQuery("#bslidermorpheus"+scene.data("id"));
				  ar.css({"opacity" : 0});
				  al.css({"opacity" : 0});
				  
				  ar.hide();
				  al.hide();
			  }
			  
			   if(scene.data("isb")!="1")  { //bullets
			   
					  var bullets=jQuery("#buslidermorpheus"+scene.data("id"));
					  bullets.css({"opacity" : 0});
					  bullets.hide();
			   }
			   
			   if(scene.data("ism")=="1")  {  // music
			   
			   var buttonmusic=jQuery("#buttonmusic"+scene.data("id"));
					  buttonmusic.css({"opacity" : 0});
					  buttonmusic.hide();
			   }
			 
			 ////////


	 }
	 
	 
	 
		 }
	
	
	function scenenavbut(scene) {
		
		
		 var ar=jQuery("#aslidermorpheus"+scene.data("id"));
		  var al=jQuery("#bslidermorpheus"+scene.data("id"));
		  
		  ar.show();
		  al.show();
		  
		  if(scene.data("op14")=="1") {

			  ar.css({"left": parseInt(scene.outerWidth()/2)-15-Math.round(scene.width()/2)+parseInt(scene.css("borderLeftWidth"))+30+"px", "top" : parseInt(scene.outerHeight()/2)-15+"px"});
			  al.css({"left": parseInt(scene.outerWidth()/2)-15+Math.round(scene.width()/2)-parseInt(scene.css("borderRightWidth"))-30+"px", "top" : parseInt(scene.outerHeight()/2)-15+"px"});
		  }
		  
		   if(scene.data("op14")=="2") {

			  ar.css({"left": parseInt(scene.outerWidth()/2)-15-Math.round(scene.width()/2)+parseInt(scene.css("borderLeftWidth"))+30+"px", "top" : parseInt(scene.outerHeight()/2)-15-Math.round(scene.height()/2)+parseInt(scene.css("borderTopWidth"))+30+"px"});
			  al.css({"left": parseInt(scene.outerWidth()/2)-15+Math.round(scene.width()/2)-parseInt(scene.css("borderRightWidth"))-30+"px", "top" : parseInt(scene.outerHeight()/2)-15-Math.round(scene.height()/2)+parseInt(scene.css("borderTopWidth"))+30+"px"});
		  }
		  
		  if(scene.data("op14")=="3") {

			  ar.css({"left": parseInt(scene.outerWidth()/2)-15-Math.round(scene.width()/2)+parseInt(scene.css("borderLeftWidth"))+30+"px", "top" : parseInt(scene.outerHeight()/2)-15+Math.round(scene.height()/2)-parseInt(scene.css("borderTopWidth"))-30+"px"});
			  al.css({"left": parseInt(scene.outerWidth()/2)-15+Math.round(scene.width()/2)-parseInt(scene.css("borderRightWidth"))-30+"px", "top" : parseInt(scene.outerHeight()/2)-15+Math.round(scene.height()/2)-parseInt(scene.css("borderTopWidth"))-30+"px"});
		  }
		  ar.animate({"opacity" : 0.5}, 200);
		  al.animate({"opacity" : 0.5}, 200);
		
	}
	
	
	function scenebullets(scene) {
		
		 var bullets=jQuery("#buslidermorpheus"+scene.data("id"));
	  
	  bullets.show();
	  bullets.width(scene.width());
	  
	  if(scene.data("isb")=="2") {
		  bullets.css({"top" : (scene.height()-26)+"px"});
	  }
	  else {
		  
		  if(scene.data("isb")=="4") {
		  bullets.css({"top" : "26px"});
	  }
		  else  bullets.css({"top" : (scene.outerHeight()+20)+"px"});
	  }
	  
	 
	  bullets.animate({"opacity" : scene.data("opbullet")}, 200);
	}
	
	
	
	
	
	
	
	
	function scenethumbnails(scene) {
		

		
		
	}
	
	
	function scenethumbnails2(scene) {
		
  // thumbnails iniciate
			  
			  if(parseInt(scene.data("op1"))>=1) {
				  
				  if(parseInt(scene.data("op1"))==2 || parseInt(scene.data("op1"))==3) {
					  
					 var mthumb=jQuery("#spthumbnails"+scene.data("id"));
					 
					 var esct=scene.width()/mthumb.width();
					 var mt=0;
					 if(parseInt(scene.data("op3"))>0) {
						 mt=parseInt(scene.data("op3"));
					 }
					 mthumb.height(scene.outerHeight());
					 //mthumb.width(mthumb.width()*(scene.width()/morpheusref))
					 mthumb.find(".thumbnail2").width(mthumb.width()-(2*mt)-(2*parseInt(mthumb.find(".thumbnail2").css("borderRightWidth"))));
					 jQuery("#spmtlr"+scene.data("id")).height(scene.outerHeight());
					 
					 var ht=Math.round(mthumb.height()/parseInt(scene.data("nt")))-(mt)-(2*parseInt(mthumb.find(".thumbnail2").css("borderTopWidth")));
					 
					 mthumb.find(".thumbnail2").height(ht);
					
					mthumb.find(".thumbnail1").find(".text").css({"font-size" : Math.round(parseInt(mthumb.find(".thumbnail1").find(".text").css("font-size"))*esct) +"px"});
					 
					
					 
					
					  
				  }
				  else {
					  
					  
					  
					  
					   var mthumb=jQuery("#spthumbnails"+scene.data("id"));
					   
					   var esct=scene.width()/mthumb.width();
					   
					    mthumb.find(".thumbnail1").height(Math.round(mthumb.find(".thumbnail1").height()*esct));
					
					 mthumb.find(".thumbnail1").width(Math.round(mthumb.find(".thumbnail1").width()*esct));
					
					 mthumb.find(".thumbnail1").find(".text").css({"font-size" : Math.round(parseInt(mthumb.find(".thumbnail1").find(".text").css("font-size"))*esct) +"px"});
					
					 
					   mthumb.width(scene.width());
					   
					   
					   /*
					   
					 var mt=0;
					 if(parseInt(scene.data("op3"))>0) {
						 mt=parseInt(scene.data("op3"));
					 }
					 
					 mthumb.find(".thumbnail1").height(mthumb.height()-(2*mt)-(2*parseInt(mthumb.find(".thumbnail1").css("borderRightWidth"))));
					// jQuery("#spmtlr"+scene.data("id")).width(scene.outerWidth());
					 
					 var mts=parseInt(mthumb.css("margin-left"));
					 
					 mthumb.width(mthumb.width()-(2*mts));
					 var ht=Math.round(mthumb.width()/parseInt(scene.data("nt")))-(mt)-(2*parseInt(mthumb.find(".thumbnail1").css("borderTopWidth")));
					 
					 mthumb.find(".thumbnail1").width(ht);
					  mthumb.find(".thumbnail1").height(Math.round(mthumb.find(".thumbnail1").height()*(scene.width()/morpheusref)));
					 
					  
					  var axuft=Math.round(parseInt(mthumb.find(".thumbnail1").find(".text").css("font-size"))*(scene.width()/morpheusref));
					  if(axuft<8) axuft=8;
					 mthumb.find(".thumbnail1").find(".text").css({"font-size" : axuft +"px"});
					 
					 
					 
					   if(parseInt(scene.data("scenes"))>parseInt(scene.data("nt"))) mthumb.bind("mousemove",function(e){
						  
						  
						 var parentOffset = jQuery(this).parent().offset(); 
   //or $(this).offset(); if you really just want the current element's offset
   var relX = e.pageX - parentOffset.left;

   						//jQuery(this).clearQueue();
        				//jQuery(this).css({"scrollTop" : jQuery(this).scrollTop()});
						 
						 
						 var at1=Math.round(relX*((twidthr-jQuery(this).outerWidth())/jQuery(this).outerWidth()));
						  jQuery(this).scrollLeft(at1);
						  //jQuery(this).scrollLeft(relX);
    				});
					
					  */
				  }
				  
				  
				  
				  theightr=0;
				  twidthr=0;
				  var tht=0;
				  var twt=0;
				  
				  var thumbnails =jQuery(".shadowt");
				  
				  var conttu=0;
				  thumbnails.each(function(){
					  
					  //jQuery(this).delay(200*conttu).animate({"opacity" : 1}, 500);
					  
					  theightr+=jQuery(this).outerHeight()+parseInt(jQuery(this).css("margin-top"))+parseInt(jQuery(this).css("margin-bottom"));
					  twidthr+=jQuery(this).outerWidth()+parseInt(jQuery(this).css("margin-left"))+parseInt(jQuery(this).css("margin-right"));
					  if(conttu==0)theightr+=parseInt(jQuery(this).css("margin-top"))+parseInt(jQuery(this).css("margin-bottom"));
					  if(conttu==0)twidthr+=parseInt(jQuery(this).css("margin-left"))+parseInt(jQuery(this).css("margin-right"));
					  
					  
					  tht=jQuery(this).outerHeight()+parseInt(jQuery(this).css("margin-top"))+parseInt(jQuery(this).css("margin-bottom"));
					  twt=jQuery(this).outerWidth()+parseInt(jQuery(this).css("margin-left"))+parseInt(jQuery(this).css("margin-right"));
					  conttu++;
				  });
				  
			  }
		
		
	}
	 

function resizemaxslider() {
	
	 var scene=jQuery("#morpheus"+scenecont);
	 
	 		var maxwidth=scene.css('max-width');
		var maxheight=scene.css('max-height');
	
		
		var width=jQuery("#slidermorpheus"+scene.data("id")).width();
		
		
		
		
		
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-left"));
		}
		
		if(parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"))>0) {
			
			width=width-parseInt(jQuery("#slidermorpheus"+scene.data("id")).css("margin-right"));
		}
		
		var esc2=width/scene.width();
		if(parseInt(scene.css("borderTopWidth"))>0) {
			
			
			
			scene.css({"border-width" : Math.round(parseInt(scene.css("borderTopWidth"))*esc2) +"px"});
			width=width-(2*parseInt(scene.css('borderTopWidth')));
			
		}
		
		
		var esc=parseInt(maxwidth)/parseInt(maxheight);
		
		var height=Math.round(width/esc);
		
		
		
		scene.width(width).height(height);
		
		if(scene.data("mode")!="verticalslider") {
		

		if(scene.outerHeight()>0) jQuery("#slidermorpheus"+scene.data("id")).height(scene.outerHeight());
	}
	 
	if(scene.outerWidth()>0) {
	
		var persperc=Math.round(scene.outerWidth()*2);
	 
		jQuery("#slidermorpheus"+scene.data("id")).css({"-webkit-perspective" : persperc, "-moz-perspective" : persperc+"px"});
	}
	 
	 scenenavbut(scene);
	 
	 scenebullets(scene);
	 
	 scenethumbnails2(scene);
	 
	 createscene2(scene, esc2);
}