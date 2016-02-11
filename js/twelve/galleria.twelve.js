/*
 Galleria Twelve Theme 2011-04-14
 http://galleria.aino.se

 Copyright (c) 2011, Aino
*/
(function(q){Galleria.addTheme({name:"twelve",author:"Galleria",css:"galleria.twelve_photo.css",defaults:{
	transition:"pulse",transitionSpeed:500,imageCrop:!0,thumbCrop:!0,carousel:!1,_locale:{
		show_thumbnails:"Show thumbnails",hide_thumbnails:"Hide thumbnails",play:"Play slideshow",
	pause:"Pause slideshow",enter_fullscreen:"Enter fullscreen",exit_fullscreen:"Exit fullscreen",
	popout_image:"Popout image",showing_image:"Showing image %s of %s",show_next_page:"Next Page",show_back_page:"Previous Page"
		
	
	},_showFullscreen:!0,_showPopout:!0,_showProgress:!0,_showTooltip:!0},
init:function(b){
	this.addElement("bar","fullscreen","play","popout","thumblink","s1","s2","s3","s4","s5","s6","progress","next","back");
	this.append({
		stage:"progress",
		container:["bar","tooltip"],
		bar:["fullscreen","play","popout","thumblink","info","s1","s2","s3","s4","s5","s6","next","back"]});
	this.prependChild("info","counter");
	var a=this,n=this.$("thumbnails-container"),h=this.$("thumblink"),
	f=this.$("fullscreen"),j=this.$("play"),k=this.$("popout"),i=this.$("bar"),l=this.$("progress"),next=this.$("next"),back=this.$("back"),
	r=b.transition,c=b._locale,d=!1,m=!1,g=!!b.autoplay,o=!1,
p=function(){
		n.height(a.getStageHeight()).width(a.getStageWidth()).css("top",d?0:a.getStageHeight()+30)};
		p();		
		b._showTooltip&&a.bindTooltip({
			thumblink:c.show_thumbnails,fullscreen:c.enter_fullscreen,
			play:c.play,popout:c.popout_image,next:c.show_next_page,back:c.show_back_page,caption:function(){
				var e=a.getData(),
				b="";e&&(e.title&&e.title.length&&(b+="<strong>"+e.title+"</strong>"),e.description&&e.description.length&&(b+="<br>"+e.description));return b},counter:function(){return c.showing_image.replace(/\%s/,a.getIndex()+1).replace(/\%s/,a.getDataLength())}});
b.showInfo||this.$("info").hide();
this.bind("play",function(){g=!0;j.addClass("playing")});
this.bind("pause",function(){g=!1;j.removeClass("playing");l.width(0)});

b._showProgress&&this.bind("progress",function(a){l.width(a.percent/100*this.getStageWidth())});
this.bind("loadstart",function(a){
	a.cached||this.$("loader").show()
});
this.bind("loadfinish",function(){
	l.width(0);
	this.$("loader").hide();
	this.refreshTooltip("counter","caption")
});
this.bind("thumbnail",function(b){
	q(b.thumbTarget).hover(function(){
		a.setInfo(b.thumbOrder);
		a.setCounter(b.thumbOrder)
	},function(){
		a.setInfo();
		a.setCounter()
	}).click(function(){h.click()})});
this.bind("fullscreen_enter",function(){m=!0;a.setOptions("transition","none");f.addClass("open");i.css("bottom",0);this.defineTooltip("fullscreen",c.exit_fullscreen);this.addIdleState(i,{bottom:-31})});this.bind("fullscreen_exit",function(){m=!1;Galleria.utils.clearTimer("bar");a.setOptions("transition",r);f.removeClass("open");i.css("bottom",0);this.defineTooltip("fullscreen",c.enter_fullscreen);this.removeIdleState(i,
{bottom:-31})});this.bind("rescale",p);this.addIdleState(this.get("image-nav-left"),{left:-36});this.addIdleState(this.get("image-nav-right"),{right:-36});h.click(function(){d&&o?a.play():(o=g,a.pause());n.animate({top:d?a.getStageHeight()+30:0},{easing:"galleria",duration:400,complete:function(){a.defineTooltip("thumblink",d?c.show_thumbnails:c.hide_thumbnails);h[d?"removeClass":"addClass"]("open");d=!d}})});b._showPopout?k.click(function(b){a.openLightbox();b.preventDefault()}):(k.remove(),b._showFullscreen&&
(this.$("s4").remove(),this.$("info").css("right",40),f.css("right",0)));

this.bind("image", function(e) {
    // Galleria.log(this); // the gallery scope
    // Galleria.log(e) // the event object
	
	
	var active = this._active
    var data = this._data;   
    
    var photo_id = data[active].photo_id;
    var owner_id = data[active].owner_id;
    var image_url = data[active].image;
    var title = data[active].description;
    var photo_by_id = data[active].photo_by_id;
    var photo_by_name = data[active].title;
    var created = data[active].created;
    var photo_link = data[active].photo_link;       
    var created_date = new Date(created * 1000);    
    var mm = created_date.getMonth() + 1;
    var dd = created_date.getDate();
    var yyyy = created_date.getFullYear();
    var date = mm + '/' + dd + '/' + yyyy;
    
    
    
    /*$("#current_image").val(active);   
    $("#photo_id").val(photo_id);   
    $("#image_url").val(image_url);    
    $("#title").val(title);    
    $("#photo_by_id").val(photo_by_id);    
    $("#photo_by_name").val(photo_by_name);   
    $("#photo_created").val(date);
    $("#photo_link").val(photo_link);  
    $("#image_title").html(title.substr(0, 50));
    $("#image_created").html(date); */ 
    
    
    
    var html = '';
    html +='<div id="form_div">';
    html +='<form action="" ><input type="hidden" name="photo_id" id="photo_id" value="'+photo_id+'">';
    html +='<input type="hidden" name="image_url" id="image_url" value="'+image_url+'">';
    html +='<input type="hidden" name="title" id="title" value="'+title+'">';
    html +='<input type="hidden" name="photo_by_id" id="photo_by_id" value="'+photo_by_id+'">';
    html +='<input type="hidden" name="photo_by_name" id="photo_by_name" value="'+photo_by_name+'">';
    html +='<input type="hidden" name="owner_id" id="owner_id" value="'+owner_id+'">';
    html +='<input type="hidden" name="photo_link" id="photo_link" value="'+photo_link+'">';
    html +='<input type="hidden" name="photo_created" id="photo_created" value="'+date+'">';
    html +='<input type="hidden" name="current_image" id="current_image" value="'+active+'">';
    html +='<input type="submit" class="favorites_submit" title="Favorites" value="">';
    html +='</form>';
    html +='</div>';  
   
    
    //$(".galleria-info-created").html('testset');
    $(".galleria-favorites-form").html(html);
    
    
    
    
});

this.bind("lightbox_image",function(e){	

});

this.bind("loadfinish", function(e){
	$(".galleria-next").click(function(){		
		var page = $("#current_page").val();
		var move_page = page*1 + 1;
		window.location = "?page="+move_page+"";
		
	})
	$(".galleria-back").click(function(){
		var page = $("#current_page").val();
		var move_page = page*1 - 1;
		window.location = "?page="+move_page+"";
		
	})
})

j.click(function(){a.defineTooltip("play",g?c.play:c.pause);g?a.pause():(d&&h.click(),a.play())});b._showFullscreen?f.click(function(){m?a.exitFullscreen():a.enterFullscreen()}):(f.remove(),b._show_popout&&(this.$("s4").remove(),this.$("info").css("right",40),k.css("right",0)));!b._showFullscreen&&!b._showPopout&&(this.$("s3,s4").remove(),this.$("info").css("right",10));b.autoplay&&this.trigger("play")}})})(jQuery);