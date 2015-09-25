<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package UnPress
 * @since 	UnPress 1.0
**/
global $ft_option;
?>
<aside class="sidebar">
	<?php
	if($ft_option['posts_default_sidebar_on']== 0 ): 
		if( is_category() || is_tag() || is_day() || is_month() || is_year()){
			dynamic_sidebar("magazine-sidebar");
		}else{
			generated_dynamic_sidebar(); 
		}
	else:
		dynamic_sidebar("magazine-sidebar");
	endif;
	?>
</aside>