	<?php 
		include'header.php';
	?>
	<script type="text/javascript">
	
	//slideshow script
	
	var imageArray = [
	"http://www.gannett-cdn.com/-mm-/4eef18defffb11907f8d6e8e6522d28d8232b881/c=0-0-3719-2796&r=x408&c=540x405/local/-/media/2015/02/04/USATODAY/USATODAY/635586890584034737-AP-Russia-Putin.jpg",
	"https://www.casino.org/blog/wp-content/uploads/trump-speaking.jpg",
	"http://www.cmo.nl/euforum/images/stories/ko/euvlag.jpg",
	"http://hungarytoday.hu/wp-content/uploads/2016/01/1444645619_9285.jpg",
	"http://static2.hln.be/static/photo/2016/0/10/2/20161114162352/media_xll_9286022.jpg",
	"http://www.ispam.nl/wp-content/uploads/2011/06/890919666_Logo_UN_blauw-full.jpg",
	"http://golfblog.nl/wp-content/uploads/2015/06/KIM-JONG-UN.jpg",
	];
	
	var imageIndex = 0;
	
	function changeImage(){
		if(pause == 0){
		slideshow.setAttribute("src", imageArray [ imageIndex]);
		imageIndex++;
		
		if(imageIndex >= imageArray.length){
			imageIndex = 0;
		}
		}
	}
	
	var pause = 0;
	function SlideShowReturn(){
		pause = 1;
		document.getElementById("slideshow").style.borderColor = "#006165";
		document.getElementById("slideshow").style.borderWidth = "4px";
		document.getElementById("slideshow").style.borderStyle = "solid";
		document.getElementById("slideshow").style.borderRadius = "20px";
	}
	function SlideShowGo(){
		pause = 0;
		document.getElementById("slideshow").style.borderColor = "none";
		document.getElementById("slideshow").style.borderWidth = "0px";
		document.getElementById("slideshow").style.borderStyle = "none";
		document.getElementById("slideshow").style.borderRadius = "10px";
	}
	
	var interval = setInterval(changeImage, 2000);
	</script>
<article>
	<section class = "slideshowHolder" >
	<img id = "slideshow" src = "logo2.png" height = "300"/>
	</section>
</article>
	
	<?php 
		include'footer.php';
	?>