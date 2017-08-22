	</main>
	<footer>
		<p>&copy;l'expedition - tous droits réservés</p>
	</footer>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>


<script type="text/javascript" src="<?php echo $urlRoot; ?>/assets/js/main.js"></script>

<!-- unitegallery  galerie photo et video---------------------------->
<script type='text/javascript' src='<?php echo $urlRoot; ?>/unitegallery/js/unitegallery.min.js'></script>
<script type='text/javascript' src='<?php echo $urlRoot; ?>/unitegallery/themes/tiles/ug-theme-tiles.js'></script>
<script type='text/javascript' src='<?php echo $urlRoot; ?>/unitegallery/themes/tilesgrid/ug-theme-tilesgrid.js'></script>



<script type="text/javascript"> 
            
            jQuery(document).ready(function(){ 
                
                jQuery("#gallery").unitegallery({
                        tile_enable_image_effect:true,
                        tile_image_effect_reverse:true,
                        tiles_type: "columns",
                        tiles_col_width: 400,
                        tile_enable_icons: false
                        
                    }); 
                jQuery("#gallery-video").unitegallery({
                        gallery_theme: "tilesgrid",
                        grid_num_rows:3,
                        tile_width: 360,
                        tile_height: 300,
                        tile_enable_border:false,
                        tile_enable_shadow:false
                    }); 
            }); 
        
        </script>
<!--------------------------fin unitegallery---------------------------------->



<script type="text/javascript" language="javascript">
         $(function () {
             var $window = $(window);
             $window.scroll(function () {
                 if ($window.scrollTop() != 0){
                     $('#logo').fadeIn(1000);
                     $('#div-magique').fadeIn(1000);

                 }
                 else if($window.scrollTop() == 0){
                 	$('#logo').hide();
                 	$('#div-magique').hide();
                 }
             });
         });
    </script>  
</script>
</body>
</html>