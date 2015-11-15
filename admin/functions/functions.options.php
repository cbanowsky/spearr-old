<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 
		
		$font_sizes = array(
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '32',
			'33' => '33',
			'34' => '34',
			'35' => '35',
			'36' => '36',
			'37' => '37',
			'38' => '38',
			'39' => '39',
			'40' => '40',
			'41' => '41',
			'42' => '42',
			'43' => '43',
			'44' => '44',
			'45' => '45',
			'46' => '46',
			'47' => '47',
			'48' => '48',
			'49' => '49',
			'50' => '50',
		);
		
		$fonts_list = array(
				"0" => "Select Font ( NONE )",
				'Abel' => 'Abel',
				'Abril Fatface' => 'Abril Fatface',
				'Aclonica' => 'Aclonica',
				'Acme' => 'Acme',
				'Actor' => 'Actor',
				'Adamina' => 'Adamina',
				'Advent Pro' => 'Advent Pro',
				'Aguafina Script' => 'Aguafina Script',
				'Aladin' => 'Aladin',
				'Aldrich' => 'Aldrich',
				'Alegreya' => 'Alegreya',
				'Alegreya SC' => 'Alegreya SC',
				'Alex Brush' => 'Alex Brush',
				'Alfa Slab One' => 'Alfa Slab One',
				'Alice' => 'Alice',
				'Alike' => 'Alike',
				'Alike Angular' => 'Alike Angular',
				'Allan' => 'Allan',
				'Allerta' => 'Allerta',
				'Allerta Stencil' => 'Allerta Stencil',
				'Allura' => 'Allura',
				'Almendra' => 'Almendra',
				'Almendra SC' => 'Almendra SC',
				'Amaranth' => 'Amaranth',
				'Amatic SC' => 'Amatic SC',
				'Amethysta' => 'Amethysta',
				'Andada' => 'Andada',
				'Andika' => 'Andika',
				'Angkor' => 'Angkor',
				'Annie Use Your Telescope' => 'Annie Use Your Telescope',
				'Anonymous Pro' => 'Anonymous Pro',
				'Antic' => 'Antic',
				'Antic Didone' => 'Antic Didone',
				'Antic Slab' => 'Antic Slab',
				'Anton' => 'Anton',
				'Arapey' => 'Arapey',
				'Arbutus' => 'Arbutus',
				'Architects Daughter' => 'Architects Daughter',
				'Arimo' => 'Arimo',
				'Arizonia' => 'Arizonia',
				'Armata' => 'Armata',
				'Artifika' => 'Artifika',
				'Arvo' => 'Arvo',
				'Asap' => 'Asap',
				'Asset' => 'Asset',
				'Astloch' => 'Astloch',
				'Asul' => 'Asul',
				'Atomic Age' => 'Atomic Age',
				'Aubrey' => 'Aubrey',
				'Audiowide' => 'Audiowide',
				'Average' => 'Average',
				'Averia Gruesa Libre' => 'Averia Gruesa Libre',
				'Averia Libre' => 'Averia Libre',
				'Averia Sans Libre' => 'Averia Sans Libre',
				'Averia Serif Libre' => 'Averia Serif Libre',
				'Bad Script' => 'Bad Script',
				'Balthazar' => 'Balthazar',
				'Bangers' => 'Bangers',
				'Basic' => 'Basic',
				'Battambang' => 'Battambang',
				'Baumans' => 'Baumans',
				'Bayon' => 'Bayon',
				'Belgrano' => 'Belgrano',
				'Belleza' => 'Belleza',
				'Bentham' => 'Bentham',
				'Berkshire Swash' => 'Berkshire Swash',
				'Bevan' => 'Bevan',
				'Bigshot One' => 'Bigshot One',
				'Bilbo' => 'Bilbo',
				'Bilbo Swash Caps' => 'Bilbo Swash Caps',
				'Bitter' => 'Bitter',
				'Black Ops One' => 'Black Ops One',
				'Bokor' => 'Bokor',
				'Bonbon' => 'Bonbon',
				'Boogaloo' => 'Boogaloo',
				'Bowlby One' => 'Bowlby One',
				'Bowlby One SC' => 'Bowlby One SC',
				'Brawler' => 'Brawler',
				'Bree Serif' => 'Bree Serif',
				'Bubblegum Sans' => 'Bubblegum Sans',
				'Buda' => 'Buda',
				'Buenard' => 'Buenard',
				'Butcherman' => 'Butcherman',
				'Butterfly Kids' => 'Butterfly Kids',
				'Cabin' => 'Cabin',
				'Cabin Condensed' => 'Cabin Condensed',
				'Cabin Sketch' => 'Cabin Sketch',
				'Caesar Dressing' => 'Caesar Dressing',
				'Cagliostro' => 'Cagliostro',
				'Calligraffitti' => 'Calligraffitti',
				'Cambo' => 'Cambo',
				'Candal' => 'Candal',
				'Cantarell' => 'Cantarell',
				'Cantata One' => 'Cantata One',
				'Cardo' => 'Cardo',
				'Carme' => 'Carme',
				'Carter One' => 'Carter One',
				'Caudex' => 'Caudex',
				'Cedarville Cursive' => 'Cedarville Cursive',
				'Ceviche One' => 'Ceviche One',
				'Changa One' => 'Changa One',
				'Chango' => 'Chango',
				'Chau Philomene One' => 'Chau Philomene One',
				'Chelsea Market' => 'Chelsea Market',
				'Chenla' => 'Chenla',
				'Cherry Cream Soda' => 'Cherry Cream Soda',
				'Chewy' => 'Chewy',
				'Chicle' => 'Chicle',
				'Chivo' => 'Chivo',
				'Coda' => 'Coda',
				'Coda Caption' => 'Coda Caption',
				'Codystar' => 'Codystar',
				'Comfortaa' => 'Comfortaa',
				'Coming Soon' => 'Coming Soon',
				'Concert One' => 'Concert One',
				'Condiment' => 'Condiment',
				'Content' => 'Content',
				'Contrail One' => 'Contrail One',
				'Convergence' => 'Convergence',
				'Cookie' => 'Cookie',
				'Copse' => 'Copse',
				'Corben' => 'Corben',
				'Cousine' => 'Cousine',
				'Coustard' => 'Coustard',
				'Covered By Your Grace' => 'Covered By Your Grace',
				'Crafty Girls' => 'Crafty Girls',
				'Creepster' => 'Creepster',
				'Crete Round' => 'Crete Round',
				'Crimson Text' => 'Crimson Text',
				'Crushed' => 'Crushed',
				'Cuprum' => 'Cuprum',
				'Cutive' => 'Cutive',
				'Damion' => 'Damion',
				'Dancing Script' => 'Dancing Script',
				'Dangrek' => 'Dangrek',
				'Dawning of a New Day' => 'Dawning of a New Day',
				'Days One' => 'Days One',
				'Delius' => 'Delius',
				'Delius Swash Caps' => 'Delius Swash Caps',
				'Delius Unicase' => 'Delius Unicase',
				'Della Respira' => 'Della Respira',
				'Devonshire' => 'Devonshire',
				'Didact Gothic' => 'Didact Gothic',
				'Diplomata' => 'Diplomata',
				'Diplomata SC' => 'Diplomata SC',
				'Doppio One' => 'Doppio One',
				'Dorsa' => 'Dorsa',
				'Dosis' => 'Dosis',
				'Dr Sugiyama' => 'Dr Sugiyama',
				'Droid Sans' => 'Droid Sans',
				'Droid Sans Mono' => 'Droid Sans Mono',
				'Droid Serif' => 'Droid Serif',
				'Duru Sans' => 'Duru Sans',
				'Dynalight' => 'Dynalight',
				'EB Garamond' => 'EB Garamond',
				'Eater' => 'Eater',
				'Economica' => 'Economica',
				'Electrolize' => 'Electrolize',
				'Emblema One' => 'Emblema One',
				'Emilys Candy' => 'Emilys Candy',
				'Engagement' => 'Engagement',
				'Enriqueta' => 'Enriqueta',
				'Erica One' => 'Erica One',
				'Esteban' => 'Esteban',
				'Euphoria Script' => 'Euphoria Script',
				'Ewert' => 'Ewert',
				'Exo' => 'Exo',
				'Expletus Sans' => 'Expletus Sans',
				'Fanwood Text' => 'Fanwood Text',
				'Fascinate' => 'Fascinate',
				'Fascinate Inline' => 'Fascinate Inline',
				'Federant' => 'Federant',
				'Federo' => 'Federo',
				'Felipa' => 'Felipa',
				'Fjalla One' => 'Fjalla One',
				'Fjord One' => 'Fjord One',
				'Flamenco' => 'Flamenco',
				'Flavors' => 'Flavors',
				'Fondamento' => 'Fondamento',
				'Fontdiner Swanky' => 'Fontdiner Swanky',
				'Forum' => 'Forum',
				'Francois One' => 'Francois One',
				'Fredericka the Great' => 'Fredericka the Great',
				'Fredoka One' => 'Fredoka One',
				'Freehand' => 'Freehand',
				'Fresca' => 'Fresca',
				'Frijole' => 'Frijole',
				'Fugaz One' => 'Fugaz One',
				'GFS Didot' => 'GFS Didot',
				'GFS Neohellenic' => 'GFS Neohellenic',
				'Galdeano' => 'Galdeano',
				'Gentium Basic' => 'Gentium Basic',
				'Gentium Book Basic' => 'Gentium Book Basic',
				'Geo' => 'Geo',
				'Geostar' => 'Geostar',
				'Geostar Fill' => 'Geostar Fill',
				'Germania One' => 'Germania One',
				'Gilda Display' => 'Gilda Display',
				'Give You Glory' => 'Give You Glory',
				'Glass Antiqua' => 'Glass Antiqua',
				'Glegoo' => 'Glegoo',
				'Gloria Hallelujah' => 'Gloria Hallelujah',
				'Goblin One' => 'Goblin One',
				'Gochi Hand' => 'Gochi Hand',
				'Gorditas' => 'Gorditas',
				'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
				'Graduate' => 'Graduate',
				'Gravitas One' => 'Gravitas One',
				'Great Vibes' => 'Great Vibes',
				'Gruppo' => 'Gruppo',
				'Gudea' => 'Gudea',
				'Habibi' => 'Habibi',
				'Hammersmith One' => 'Hammersmith One',
				'Handlee' => 'Handlee',
				'Hanuman' => 'Hanuman',
				'Happy Monkey' => 'Happy Monkey',
				'Henny Penny' => 'Henny Penny',
				'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
				'Holtwood One SC' => 'Holtwood One SC',
				'Homemade Apple' => 'Homemade Apple',
				'Homenaje' => 'Homenaje',
				'IM Fell DW Pica' => 'IM Fell DW Pica',
				'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
				'IM Fell Double Pica' => 'IM Fell Double Pica',
				'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
				'IM Fell English' => 'IM Fell English',
				'IM Fell English SC' => 'IM Fell English SC',
				'IM Fell French Canon' => 'IM Fell French Canon',
				'IM Fell French Canon SC' => 'IM Fell French Canon SC',
				'IM Fell Great Primer' => 'IM Fell Great Primer',
				'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
				'Iceberg' => 'Iceberg',
				'Iceland' => 'Iceland',
				'Imprima' => 'Imprima',
				'Inconsolata' => 'Inconsolata',
				'Inder' => 'Inder',
				'Indie Flower' => 'Indie Flower',
				'Inika' => 'Inika',
				'Irish Grover' => 'Irish Grover',
				'Istok Web' => 'Istok Web',
				'Italiana' => 'Italiana',
				'Italianno' => 'Italianno',
				'Jim Nightshade' => 'Jim Nightshade',
				'Jockey One' => 'Jockey One',
				'Jolly Lodger' => 'Jolly Lodger',
				'Josefin Sans' => 'Josefin Sans',
				'Josefin Slab' => 'Josefin Slab',
				'Judson' => 'Judson',
				'Julee' => 'Julee',
				'Junge' => 'Junge',
				'Jura' => 'Jura',
				'Just Another Hand' => 'Just Another Hand',
				'Just Me Again Down Here' => 'Just Me Again Down Here',
				'Kameron' => 'Kameron',
				'Karla' => 'Karla',
				'Kaushan Script' => 'Kaushan Script',
				'Kelly Slab' => 'Kelly Slab',
				'Kenia' => 'Kenia',
				'Khmer' => 'Khmer',
				'Knewave' => 'Knewave',
				'Kotta One' => 'Kotta One',
				'Koulen' => 'Koulen',
				'Kranky' => 'Kranky',
				'Kreon' => 'Kreon',
				'Kristi' => 'Kristi',
				'Krona One' => 'Krona One',
				'La Belle Aurore' => 'La Belle Aurore',
				'Lancelot' => 'Lancelot',
				'Lato' => 'Lato',
				'League Script' => 'League Script',
				'Leckerli One' => 'Leckerli One',
				'Ledger' => 'Ledger',
				'Lekton' => 'Lekton',
				'Lemon' => 'Lemon',
				'Lilita One' => 'Lilita One',
				'Limelight' => 'Limelight',
				'Linden Hill' => 'Linden Hill',
				'Lobster' => 'Lobster',
				'Lobster Two' => 'Lobster Two',
				'Londrina Outline' => 'Londrina Outline',
				'Londrina Shadow' => 'Londrina Shadow',
				'Londrina Sketch' => 'Londrina Sketch',
				'Londrina Solid' => 'Londrina Solid',
				'Lora' => 'Lora',
				'Love Ya Like A Sister' => 'Love Ya Like A Sister',
				'Loved by the King' => 'Loved by the King',
				'Lovers Quarrel' => 'Lovers Quarrel',
				'Luckiest Guy' => 'Luckiest Guy',
				'Lusitana' => 'Lusitana',
				'Lustria' => 'Lustria',
				'Macondo' => 'Macondo',
				'Macondo Swash Caps' => 'Macondo Swash Caps',
				'Magra' => 'Magra',
				'Maiden Orange' => 'Maiden Orange',
				'Mako' => 'Mako',
				'Marcellus' => 'Marcellus',
				'Marcellus SC' => 'Marcellus SC',
				'Marck Script' => 'Marck Script',
				'Marko One' => 'Marko One',
				'Marmelad' => 'Marmelad',
				'Marvel' => 'Marvel',
				'Mate' => 'Mate',
				'Mate SC' => 'Mate SC',
				'Maven Pro' => 'Maven Pro',
				'Meddon' => 'Meddon',
				'MedievalSharp' => 'MedievalSharp',
				'Medula One' => 'Medula One',
				'Megrim' => 'Megrim',
				'Merienda One' => 'Merienda One',
				'Merriweather' => 'Merriweather',
				'Metal' => 'Metal',
				'Metamorphous' => 'Metamorphous',
				'Metrophobic' => 'Metrophobic',
				'Michroma' => 'Michroma',
				'Miltonian' => 'Miltonian',
				'Miltonian Tattoo' => 'Miltonian Tattoo',
				'Miniver' => 'Miniver',
				'Miss Fajardose' => 'Miss Fajardose',
				'Modern Antiqua' => 'Modern Antiqua',
				'Molengo' => 'Molengo',
				'Monofett' => 'Monofett',
				'Monoton' => 'Monoton',
				'Monsieur La Doulaise' => 'Monsieur La Doulaise',
				'Montaga' => 'Montaga',
				'Montez' => 'Montez',
				'Montserrat' => 'Montserrat',
				'Moul' => 'Moul',
				'Moulpali' => 'Moulpali',
				'Mountains of Christmas' => 'Mountains of Christmas',
				'Mr Bedfort' => 'Mr Bedfort',
				'Mr Dafoe' => 'Mr Dafoe',
				'Mr De Haviland' => 'Mr De Haviland',
				'Mrs Saint Delafield' => 'Mrs Saint Delafield',
				'Mrs Sheppards' => 'Mrs Sheppards',
				'Muli' => 'Muli',
				'Mystery Quest' => 'Mystery Quest',
				'Neucha' => 'Neucha',
				'Neuton' => 'Neuton',
				'News Cycle' => 'News Cycle',
				'Niconne' => 'Niconne',
				'Nixie One' => 'Nixie One',
				'Nobile' => 'Nobile',
				'Nokora' => 'Nokora',
				'Norican' => 'Norican',
				'Nosifer' => 'Nosifer',
				'Nothing You Could Do' => 'Nothing You Could Do',
				'Noticia Text' => 'Noticia Text',
				'Noto Sans' => 'Noto Sans',
				'Nova Cut' => 'Nova Cut',
				'Nova Flat' => 'Nova Flat',
				'Nova Mono' => 'Nova Mono',
				'Nova Oval' => 'Nova Oval',
				'Nova Round' => 'Nova Round',
				'Nova Script' => 'Nova Script',
				'Nova Slim' => 'Nova Slim',
				'Nova Square' => 'Nova Square',
				'Numans' => 'Numans',
				'Nunito' => 'Nunito',
				'Odor Mean Chey' => 'Odor Mean Chey',
				'Old Standard TT' => 'Old Standard TT',
				'Oldenburg' => 'Oldenburg',
				'Oleo Script' => 'Oleo Script',
				'Open Sans' => 'Open Sans',
				'Open Sans Condensed' => 'Open Sans Condensed',
				'Orbitron' => 'Orbitron',
				'Original Surfer' => 'Original Surfer',
				'Oswald' => 'Oswald',
				'Over the Rainbow' => 'Over the Rainbow',
				'Overlock' => 'Overlock',
				'Overlock SC' => 'Overlock SC',
				'Ovo' => 'Ovo',
				'Oxygen' => 'Oxygen',
				'PT Mono' => 'PT Mono',
				'PT Sans' => 'PT Sans',
				'PT Sans Caption' => 'PT Sans Caption',
				'PT Sans Narrow' => 'PT Sans Narrow',
				'PT Serif' => 'PT Serif',
				'PT Serif Caption' => 'PT Serif Caption',
				'Pacifico' => 'Pacifico',
				'Parisienne' => 'Parisienne',
				'Passero One' => 'Passero One',
				'Passion One' => 'Passion One',
				'Patrick Hand' => 'Patrick Hand',
				'Patua One' => 'Patua One',
				'Paytone One' => 'Paytone One',
				'Permanent Marker' => 'Permanent Marker',
				'Petrona' => 'Petrona',
				'Philosopher' => 'Philosopher',
				'Piedra' => 'Piedra',
				'Pinyon Script' => 'Pinyon Script',
				'Plaster' => 'Plaster',
				'Play' => 'Play',
				'Playball' => 'Playball',
				'Playfair Display' => 'Playfair Display',
				'Podkova' => 'Podkova',
				'Poiret One' => 'Poiret One',
				'Poller One' => 'Poller One',
				'Poly' => 'Poly',
				'Pompiere' => 'Pompiere',
				'Pontano Sans' => 'Pontano Sans',
				'Port Lligat Sans' => 'Port Lligat Sans',
				'Port Lligat Slab' => 'Port Lligat Slab',
				'Prata' => 'Prata',
				'Preahvihear' => 'Preahvihear',
				'Press Start 2P' => 'Press Start 2P',
				'Princess Sofia' => 'Princess Sofia',
				'Prociono' => 'Prociono',
				'Prosto One' => 'Prosto One',
				'Puritan' => 'Puritan',
				'Quantico' => 'Quantico',
				'Quattrocento' => 'Quattrocento',
				'Quattrocento Sans' => 'Quattrocento Sans',
				'Questrial' => 'Questrial',
				'Quicksand' => 'Quicksand',
				'Qwigley' => 'Qwigley',
				'Radley' => 'Radley',
				'Raleway' => 'Raleway',
				'Rammetto One' => 'Rammetto One',
				'Rancho' => 'Rancho',
				'Rationale' => 'Rationale',
				'Redressed' => 'Redressed',
				'Reenie Beanie' => 'Reenie Beanie',
				'Revalia' => 'Revalia',
				'Ribeye' => 'Ribeye',
				'Ribeye Marrow' => 'Ribeye Marrow',
				'Righteous' => 'Righteous',
				'Rochester' => 'Rochester',
				'Rock Salt' => 'Rock Salt',
				'Rokkitt' => 'Rokkitt',
				'Ropa Sans' => 'Ropa Sans',
				'Rosario' => 'Rosario',
				'Rosarivo' => 'Rosarivo',
				'Rouge Script' => 'Rouge Script',
				'Ruda' => 'Ruda',
				'Ruge Boogie' => 'Ruge Boogie',
				'Ruluko' => 'Ruluko',
				'Ruslan Display' => 'Ruslan Display',
				'Russo One' => 'Russo One',
				'Ruthie' => 'Ruthie',
				'Sail' => 'Sail',
				'Salsa' => 'Salsa',
				'Sancreek' => 'Sancreek',
				'Sansita One' => 'Sansita One',
				'Sarina' => 'Sarina',
				'Satisfy' => 'Satisfy',
				'Schoolbell' => 'Schoolbell',
				'Seaweed Script' => 'Seaweed Script',
				'Sevillana' => 'Sevillana',
				'Seymour One' => 'Seymour One',
				'Shadows Into Light' => 'Shadows Into Light',
				'Shadows Into Light Two' => 'Shadows Into Light Two',
				'Shanti' => 'Shanti',
				'Share' => 'Share',
				'Shojumaru' => 'Shojumaru',
				'Short Stack' => 'Short Stack',
				'Siemreap' => 'Siemreap',
				'Sigmar One' => 'Sigmar One',
				'Signika' => 'Signika',
				'Signika Negative' => 'Signika Negative',
				'Simonetta' => 'Simonetta',
				'Sirin Stencil' => 'Sirin Stencil',
				'Six Caps' => 'Six Caps',
				'Slackey' => 'Slackey',
				'Smokum' => 'Smokum',
				'Smythe' => 'Smythe',
				'Sniglet' => 'Sniglet',
				'Snippet' => 'Snippet',
				'Sofia' => 'Sofia',
				'Sonsie One' => 'Sonsie One',
				'Sorts Mill Goudy' => 'Sorts Mill Goudy',
				'Special Elite' => 'Special Elite',
				'Spicy Rice' => 'Spicy Rice',
				'Spinnaker' => 'Spinnaker',
				'Spirax' => 'Spirax',
				'Squada One' => 'Squada One',
				'Stardos Stencil' => 'Stardos Stencil',
				'Stint Ultra Condensed' => 'Stint Ultra Condensed',
				'Stint Ultra Expanded' => 'Stint Ultra Expanded',
				'Stoke' => 'Stoke',
				'Sue Ellen Francisco' => 'Sue Ellen Francisco',
				'Sunshiney' => 'Sunshiney',
				'Supermercado One' => 'Supermercado One',
				'Suwannaphum' => 'Suwannaphum',
				'Swanky and Moo Moo' => 'Swanky and Moo Moo',
				'Syncopate' => 'Syncopate',
				'Tangerine' => 'Tangerine',
				'Taprom' => 'Taprom',
				'Telex' => 'Telex',
				'Tenor Sans' => 'Tenor Sans',
				'The Girl Next Door' => 'The Girl Next Door',
				'Tienne' => 'Tienne',
				'Tinos' => 'Tinos',
				'Titan One' => 'Titan One',
				'Trade Winds' => 'Trade Winds',
				'Trocchi' => 'Trocchi',
				'Trochut' => 'Trochut',
				'Trykker' => 'Trykker',
				'Tulpen One' => 'Tulpen One',
				'Ubuntu' => 'Ubuntu',
				'Ubuntu Condensed' => 'Ubuntu Condensed',
				'Ubuntu Mono' => 'Ubuntu Mono',
				'Ultra' => 'Ultra',
				'Uncial Antiqua' => 'Uncial Antiqua',
				'UnifrakturCook' => 'UnifrakturCook',
				'UnifrakturMaguntia' => 'UnifrakturMaguntia',
				'Unkempt' => 'Unkempt',
				'Unlock' => 'Unlock',
				'Unna' => 'Unna',
				'VT323' => 'VT323',
				'Varela' => 'Varela',
				'Varela Round' => 'Varela Round',
				'Vast Shadow' => 'Vast Shadow',
				'Vibur' => 'Vibur',
				'Vidaloka' => 'Vidaloka',
				'Viga' => 'Viga',
				'Voces' => 'Voces',
				'Volkhov' => 'Volkhov',
				'Vollkorn' => 'Vollkorn',
				'Voltaire' => 'Voltaire',
				'Waiting for the Sunrise' => 'Waiting for the Sunrise',
				'Wallpoet' => 'Wallpoet',
				'Walter Turncoat' => 'Walter Turncoat',
				'Wellfleet' => 'Wellfleet',
				'Wire One' => 'Wire One',
				'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
				'Yellowtail' => 'Yellowtail',
				'Yeseva One' => 'Yeseva One',
				'Yesteryear' => 'Yesteryear',
				'Zeyada' => 'Zeyada'
				);


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$adminurl = ADMIN_DIR . 'assets/images/';
$icons = ADMIN_DIR . 'assets/images/icons/';
$images_url = get_template_directory_uri().'/images/';


// GENERAL SETTINGS
$of_options[] = array(
					"name" => "General Settings",
					"type" => "heading",
					"icon" => $adminurl . "icon-settings.png"
				);

							
$of_options[] = array( 
					"name" => "Website Logo",
					"desc" => "Upload website logo. ",
					"id" => "site_logo",
					"std" => "",
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 
					"name" => "Logo Margin Top",
					"desc" => "Set the website logo top margin. Default: 27",
					"id" => "site_logo_margin_top",
					"std" => "27",
					"type" => "text"
				);

													
$of_options[] = array( 
					"name" => "Website Favicon",
					"desc" => "Upload website favicon in .ico format.",
					"id" => "site_favicon",
					"std" => "",
					"mod" => "min",
					"type" => "media"
				);

$of_options[] = array( 
					"name" => "Website Retina Favicon",
					"desc" => "Upload website Favicon Retina version. 144x144px .png file required.",
					"id" => "site_retina_favicon",
					"std" => "",
					"mod" => "min",
					"type" => "media"
				);


$of_options[] = array( 
					"name" => "Sticky Nav",
					"desc" => "Enable/Disable sticky nav . Default: Enable",
					"id" => "unpress_sticky_nav",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);	

$of_options[] = array( 	
					"name" => "Top Menu",
					"desc" => "Enable or Disable top menu. Default: Enable.",
					"id" => "site_top_strip",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);	


$of_options[] = array( 	
					"name" => "Posts Excerpt Length",
					"desc" => "Enter posts excerpt number of words. Will be use for all posts. Default: 12",
					"id" => "site_wide_excerpt_length",
					"std" => "12",
					"type" => "text"
				);	
				
								
$of_options[] = array( 	
					"name" => "Author name in posts",
					"desc" => "Enable or Disable author name in posts. Default: Disable.",
					"id" => "site_author_name",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
								
$of_options[] = array( 	
					"name" => "Footer Copyright",
					"desc" => "Enter website copyright text in the footer",
					"id" => "copyright_text",
					"std" => "Cooked with love by <a href='http://favethemes.com' target='_blank'>Favethemes</a>",
					"type" => "text"
				);	
						

// STYLING SETTINGS
$of_options[] = array(
					"name" => "Styling/Skin Options",
					"type" => "heading",
					"icon" => $adminurl . "icon-paint.png"
				);

$unpress_main_skin = array("white_skin" => "White Skin", "black_skin" => "Black Skin");
					
$of_options[] = array( 	
					"name" => "Theme Main Skin",
					"desc" => "Select theme skin. Default: White",
					"id" => "unpress_main_skin",
					"std" => "white_skin",
					"type" => "select",
					"options" => $unpress_main_skin
				);

$of_options[] = array( 	
					"name" => "Website Main Color",
					"desc" => "Select the main color for your website",
					"id" => "main_site_color",
					"std" => "#CF2072",
					"type" => "color"
				);

$of_options[] = array( 	
					"name" => "Floating Title Box",
					"desc" => "",
					"id" => "floating_title_info",
					"std" => "<h3 style=\"margin: 0;\">Floating Title Box</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Floating Title Box Background Color",
					"desc" => "Select floating title box background color. Default #000000",
					"id" => "category_box",
					"std" => "#000000",
					"type" => "color"
				);
$of_options[] = array( 	
					"name" => "Floating Title Box Text Color",
					"desc" => "Select floating title box text color. Default #ffffff",
					"id" => "category_box_color",
					"std" => "#ffffff",
					"type" => "color"
				);

$of_options[] = array( 	
					"name" => "Floating Title Box Sub Text Color",
					"desc" => "Select floating title box sub text color. Default #ffffff",
					"id" => "category_box_sub_color",
					"std" => "#ffffff",
					"type" => "color"
				);
				
/**************************** Sliders settings ***********************************/
// STYLING SETTINGS
$of_options[] = array(
					"name" => "Sliders Settings",
					"type" => "heading",
					"icon" => $adminurl . "icon-settings.png"
				);

$of_options[] = array( 	
					"name" => "IOS Slider",
					"desc" => "",
					"id" => "ios_slider",
					"std" => "<h3 style=\"margin: 0;\">IOS Slider Options</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Auto Slide",
					"desc" => "Enable/Disable auto slide. Default: Enable",
					"id" => "auto_slide",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);	

$of_options[] = array( 	"name" 		=> "Auto Slide Timer",
						"desc" 		=> "The time (in milliseconds) that a slide will wait before automatically navigating to the next slide, default value: 4000",
						"id" 		=> "autoslide_timer",
						"std" 		=> "3000",
						"min" 		=> "1500",
						"step"		=> "1",
						"max" 		=> "8000",
						"type" 		=> "sliderui" 
				);

//*************************** SIDEBAR SETTINGS ***********************************/

$of_options[] = array(
					"name" => "Sidebar Settings",
					"type" => "heading",
					"icon" => $adminurl . "icon-settings.png"
				);

$of_options[] = array( 	
					"name" => "Enable Default Sidebar for all Posts",
					"desc" => "Enable default sidebar for all posts. <br/> <strong>NOTE:</strong> if you want to use multiple sidebar then this option must be Disable. Default: Disable.",
					"id" => "posts_default_sidebar_on",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				


//****************************** ARTICLE HOVER EFFECTS ***********************************//

$of_options[] = array(
					"name" => "Image View Animations",
					"type" => "heading",
					"icon" => $icons . "scroll-down-image-view-animation.png"
				);

$animations_options = array("bounceIn" => "Bounce In", "fadeInDown" => "Fade In Down", "fadeInUp" =>"Fade In Up", "fadeIn" => "Fade In");

$of_options[] = array( 	
					"name" => "Scroll Down Image View Animation",
					"desc" => "Select image view animation",
					"id" => "view_animation",
					"std" => "fadeInUp",
					"type" => "radio",
					"options" => $animations_options
				);						

// TYPOHGRAPHY
$of_options[] = array(
					"name" => "Typography",
					"type" => "heading",
					"icon" => $adminurl . "icon-typography.png"
				);

$of_options[] = array( 
					"name" => "Google Fonts",
					"desc" => "",
					"id" => "google_fonts_intro",
					"std" => "<h1 style='margin: 0; color:#000;'>Google Fonts</h1>",
					"icon" => true,
					"type" => "info");


$of_options[] = array( 
					"name" => "Select Body Font Family",
					"desc" => "Select a font family for body text. Default: Lato",
					"id" => "google_body",
					"std" => 'Lato',
					"options" => $fonts_list,
					"type" => "select_google_font"
				);
				
$of_options[] = array( 
					"name" => "Select Top Menu Font",
					"desc" => "Select a font family for top navigation. Default: Lato",
					"id" => "google_secondary_nav",
					"std" => 'Lato',
					"options" => $fonts_list,
					"type" => "select_google_font"
				);

$of_options[] = array( 
					"name" => "Select Main Menu Font",
					"desc" => "Select a font family for main navigation. Default: Oswald",
					"id" => "google_main_nav",
					"std" => 'Oswald',
					"preview" => array(
								 	"text" => "This is font preview title",
								 	"size" => "17px"
					),
					"options" => $fonts_list,
					"type" => "select_google_font"
				);

				
$of_options[] = array( 
					"name" => "Titles and Headings Font",
					"desc" => "Select font family for titles and headings. Default: Oswald",
					"id" => "google_font_titles",
					"std" => 'Oswald',
					"preview" => array(
								 	"text" => "This is font preview title",
								 	"size" => "24px"
					),
					"options" => $fonts_list,
					"type" => "select_google_font"
				);

$of_options[] = array( 
					"name" => "Black Box Font",
					"desc" => "Select a font family for floating black box. Default: Lato",
					"id" => "google_blackbox",
					"std" => 'Lato',
					"options" => $fonts_list,
					"type" => "select_google_font"
				);

$of_options[] = array( "name" => "Standard Fonts",
					"desc" => "",
					"id" => "standard_fonts_intro",
					"std" => "<h1 style='margin: 0; margin-bottom:10px; color:#000;'>Standards</h1>If you have a Google Font selected above, it will override the standard font.",
					"icon" => true,
					"type" => "info");

$standard_fonts = array(
						'0' => 'Select Font',
						'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
						"'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
						"'Bookman Old Style', serif" => "'Bookman Old Style', serif",
						"'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
						"Courier, monospace" => "Courier, monospace",
						"Garamond, serif" => "Garamond, serif",
						"Georgia, serif" => "Georgia, serif",
						"Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
						"'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
						"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
						"'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
						"'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
						"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
						"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
						"'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
						"'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
						"Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
					);

$of_options[] = array( "name" => "Select Body Font Family",
					   "desc" => "Select a font family for body text",
					   "id" => "standard_body",
					   "std" => "",
					   "type" => "select",
					   "options" => $standard_fonts);

$of_options[] = array( 
					   "name" => "Select Top Menu Font",
					   "desc" => "Select a font family for top navigation:",
					   "id" => "standard_secondary_nav",
					   "std" => '',
					   "options" => $standard_fonts,
					   "type" => "select"
				);

$of_options[] = array( "name" => "Select Main Menu Font Family",
					   "desc" => "Select a font family for main menu / navigation",
					   "id" => "standard_main_nav",
					   "std" => "",
					   "type" => "select",
					   "options" => $standard_fonts);
				
$of_options[] = array( 
					"name" => "Titles and Headings Font",
					"desc" => "Select font family for titles and headings.",
					"id" => "standard_font_titles",
					"std" => '',
					"options" => $standard_fonts,
					"type" => "select"
				);

$of_options[] = array( 
					"name" => "Black Box Font",
					"desc" => "Select a font family for floating black box.",
					"id" => "standard_blackbox",
					"std" => '',
					"options" => $standard_fonts,
					"type" => "select"
				);
								

$of_options[] = array( "name" => "Standard Fonts",
					"desc" => "",
					"id" => "font_size_intro",
					"std" => "<h1 style='margin: 0; color:#000;'>Font Sizes</h1>",
					"icon" => true,
					"type" => "info");		

$of_options[] = array( 	
					"name" => "Main Menu Links Size (px)",
					"desc" => "Selected the font size for main menu main links. Default 17",
					"id" => "main_menu_links",
					"std" => "17",
					"type" => "select",
					"options" => $font_sizes
				);

$of_options[] = array( 	
					"name" => "Top Menu Links Size (px)",
					"desc" => "Selected the font size for top menu main links. Default 15",
					"id" => "top_menu_links",
					"std" => "15",
					"type" => "select",
					"options" => $font_sizes
				);

$of_options[] = array( 	
					"name" => "Black Box Title Font Size (px)",
					"desc" => "Select a font family for floating black box.. Default 48",
					"id" => "black_box_font_size",
					"std" => "48",
					"type" => "select",
					"options" => $font_sizes
				);
																								
//============================ SINGLE POSTS OPTIONS ========================================
$of_options[] = array(
					"name" => "Single Post",
					"type" => "heading",
					"icon" => $icons . "single-post.png"
				);

				
$of_options[] = array( 	
					"name" => "Author Name",
					"desc" => "Enable or Disable post author name in all website posts. Default: Enable.",
					"id" => "single_author_name",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Post Date",
					"desc" => "Enable or Disable post date in all website posts. Default: Enable.",
					"id" => "single_post_date",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Custom Editor Gallery",
					"desc" => "Disable custom theme gallery layout and make it native WordPress thumbnails.",
					"id" => "single_wp_gallery",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);	
				
$of_options[] = array( 	
					"name" => "Social Share",
					"desc" => "Enable or Disable social share links button in single post page. Default: Enable.",
					"id" => "single_social",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Author Box",
					"desc" => "Enable or Disable author box in single post page. Default: Enable.",
					"id" => "single_author",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Previous Post / Next Post",
					"desc" => "Enable or Disable Prev/Next Post buttons in single post page. Default: Enable.",
					"id" => "single_nav_arrows",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				
				
$of_options[] = array( 	
					"name" => "Related Posts",
					"desc" => "",
					"id" => "related_posts_info",
					"std" => "<h3 style=\"margin: 0;\">Related Posts</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Related Posts",
					"desc" => "Enable or Disable 'Related Posts' in single post page. Default: Enable.",
					"id" => "single_related",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
											

$related_posts_by = array("related_category" => "Category","related_tags" => "Tags");
$of_options[] = array( 	
					"name" => "Related Posts By Category or Tags",
					"desc" => "Choose related posts option. Default: Category",
					"id" => "single_related_posts_by",
					"std" => "related_category",
					"type" => "radio",
					"options" => $related_posts_by
				);
				
$of_options[] = array( 	
					"name" => "Related Posts Title",
					"desc" => "Enter title for 'Related Posts' in single post page.",
					"id" => "single_related_title",
					"std" => "Related",
					"type" => "text"
				);
			
$related_posts = array("3" => "3","6" => "6","9" => "9");
$of_options[] = array( 	
					"name" => "Related Posts To Show",
					"desc" => "Select the number of related posts you want to show. Default: 6",
					"id" => "single_related_posts_to_show",
					"std" => "6",
					"type" => "select",
					"options" => $related_posts
				);
				
/*========================================================================
= Galleries
=========================================================================*/

$of_options[] = array(
					"name" => "Galleries",
					"type" => "heading",
					"icon" => $adminurl . "icon-posts.png"
				);


$of_options[] = array( 	
					"name" => "Title",
					"desc" => "Enter the title of galleries",
					"id" => "gallery_title",
					"std" => "Browse Galleries",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Posts to show",
					"desc" => "Enter the number of posts to in gallery. For all posts please enter -1",
					"id" => "gallery_no_of_posts",
					"std" => 12,
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Gallery Single Post",
					"desc" => "",
					"id" => "gallery_single_info",
					"std" => "<h3 style=\"margin: 0;\">Gallery Single Post</h3>",
					"icon" => false,
					"type" => "info"
				);
				
$of_options[] = array( 	
					"name" => "Gallery Author Name",
					"desc" => "Enable or Disable gallery author name in gallery posts. Default: Enable.",
					"id" => "gallery_single_author_name",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Post Date",
					"desc" => "Enable or Disable post date. Default: Enable.",
					"id" => "gallery_post_date",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Gallery Author Box",
					"desc" => "Enable or Disable gallery author box in single gallery page. Default: Enable.",
					"id" => "gallery_single_author",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Previous Gallery / Next Gallery",
					"desc" => "Enable or Disable Previous Post/Next Gallery button in single gallery page. Default: Enable.",
					"id" => "gallery_single_nav_arrows",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				
				
$of_options[] = array( 	
					"name" => "Related Galleries",
					"desc" => "",
					"id" => "related_gallery_info",
					"std" => "<h3 style=\"margin: 0;\">Related Galleries</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Related Galleries",
					"desc" => "Enable or Disable 'Related Galleries' in single gallery post page. Default: Enable.",
					"id" => "gallery_single_related",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
											
				
$of_options[] = array( 	
					"name" => "Related Galleries Title",
					"desc" => "Type the title for 'Related Galleries' in single gallery post page.",
					"id" => "gallery_single_related_title",
					"std" => "Related Galleries",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Related Galleries To Show",
					"desc" => "Select the number of related galleries you want to show.",
					"id" => "single_related_galleries_to_show",
					"std" => "6",
					"type" => "select",
					"options" => $related_posts
				);

/*========================================================================
= Single Videos Option
=========================================================================*/

$of_options[] = array(
					"name" => "Videos",
					"type" => "heading",
					"icon" => $adminurl . "icon-posts.png"
				);

$of_options[] = array( 	
					"name" => "Video Single Post",
					"desc" => "",
					"id" => "video_single_info",
					"std" => "<h3 style=\"margin: 0;\">Video Single Post</h3>",
					"icon" => false,
					"type" => "info"
				);
				
$of_options[] = array( 	
					"name" => "Video Author Name",
					"desc" => "Enable or Disable video author name in video posts. Default: Enable.",
					"id" => "video_single_author_name",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Post Date",
					"desc" => "Enable or Disable post date. Default: Enable.",
					"id" => "video_post_date",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				
$of_options[] = array( 	
					"name" => "Video Social Share",
					"desc" => "Enable or Disable video social share links button in single video page. Default: Enable.",
					"id" => "video_single_social",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Video Author Box",
					"desc" => "Enable or Disable author box in single video page. Default: Enable.",
					"id" => "video_single_author",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Previous Video / Next Video",
					"desc" => "Enable or Disable Previous Post/Next video button in single video page. Default: Enable.",
					"id" => "video_single_nav_arrows",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				
				
$of_options[] = array( 	
					"name" => "Related Videos",
					"desc" => "",
					"id" => "related_video_info",
					"std" => "<h3 style=\"margin: 0;\">Related Videos</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Related Videos",
					"desc" => "Enable or Disable 'Related Videos' in single video post page. Default: Enable.",
					"id" => "video_single_related",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
											
				
$of_options[] = array( 	
					"name" => "Related Videos Title",
					"desc" => "Type the title for 'Related Videos' in single post page.",
					"id" => "video_single_related_title",
					"std" => "Related Videos",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Related Videos To Show",
					"desc" => "Select the number of related videos you want to show.",
					"id" => "single_related_videos_to_show",
					"std" => "6",
					"type" => "select",
					"options" => $related_posts
				);

/*========================================================================
= Interviewa Options
=========================================================================*/

$of_options[] = array(
					"name" => "Interviews",
					"type" => "heading",
					"icon" => $adminurl . "icon-posts.png"
				);


$of_options[] = array( 	
					"name" => "Posts to show",
					"desc" => "Enter the number of posts show. Default will be 10",
					"id" => "interview_no_of_posts",
					"std" => 10,
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Interview Posts Excerpt Length",
					"desc" => "Enter the number of words you want to show. Default will be 100 words",
					"id" => "interview_words",
					"std" => 100,
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Interviews Author Name",
					"desc" => "Enable or Disable author name in interview posts. Default: Enable.",
					"id" => "interview_author_name",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Post Date",
					"desc" => "Enable or Disable post date. Default: Enable.",
					"id" => "interview_post_date",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Interview Single Post",
					"desc" => "",
					"id" => "interview_single_info",
					"std" => "<h3 style=\"margin: 0;\">Interview Single Post</h3>",
					"icon" => false,
					"type" => "info"
				);
				

$of_options[] = array( 	
					"name" => "Interview Author Box",
					"desc" => "Enable or Disable author box in single interview page. Default: Enable.",
					"id" => "interview_single_author",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Previous Interview / Next Interview",
					"desc" => "Enable or Disable Previous Post/Next Interview buttons in single post page. Default: Enable.",
					"id" => "interview_single_nav_arrows",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Interview Social Share",
					"desc" => "Enable or Disable social share links button in single interview page. Default: Enable.",
					"id" => "interview_single_social",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);				
				
$of_options[] = array( 	
					"name" => "Related Interviews",
					"desc" => "",
					"id" => "related_interview_info",
					"std" => "<h3 style=\"margin: 0;\">Related Interviews</h3>",
					"icon" => false,
					"type" => "info"
				);

$of_options[] = array( 	
					"name" => "Related Interviews",
					"desc" => "Enable or Disable 'Related Interviews' in single post page. Default: Enable.",
					"id" => "interview_single_related",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
											
				
$of_options[] = array( 	
					"name" => "Related Interviews Title",
					"desc" => "Type the title for 'Related Interviews' in single post page.",
					"id" => "interview_single_related_title",
					"std" => "Related Interviews",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Related Interviews To Show",
					"desc" => "Select the number of related galleries you want to show.",
					"id" => "single_related_interviews_to_show",
					"std" => "6",
					"type" => "select",
					"options" => $related_posts
				);



// FOOTER
$of_options[] = array( 	"name" => "Social Profiles",
						"type" => "heading",
						"icon" => $adminurl . "icon-social.png"
				);


$of_options[] = array( 	
					"name" => "Top Menu Social Profiles",
					"desc" => "Enable or Disable top menu socical links. Default: Disable",
					"id" => "top_social_profiles",
					"std" => 0,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);


$of_options[] = array( "name" => "Enter your profiles full URL",
					"desc" => "RSS Feed",
					"id" => "sp_feed",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "",
					"desc" => "Facebook",
					"id" => "sp_facebook",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Twitter",
					"id" => "sp_twitter",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Google +",
					"id" => "sp_google",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "LinkedIn",
					"id" => "sp_linkedin",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Instagram",
					"id" => "sp_instagram",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Flickr",
					"id" => "sp_flickr",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Vimeo",
					"id" => "sp_vimeo",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "YouTube",
					"id" => "sp_youtube",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Dribble",
					"id" => "sp_dribble",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Pinterest",
					"id" => "sp_pinterest",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "",
					"desc" => "FourSquare",
					"id" => "sp_foursquare",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "",
					"desc" => "Tumblr",
					"id" => "sp_tumblr",
					"std" => "",
					"type" => "text");
					
					
					
/*=================================================================
= CUSTOM CODE
===================================================================*/
$of_options[] = array( 	"name" => "Custom Code",
						"type" => "heading",
						"icon" => $adminurl . "icon-code.png"
				);

$of_options[] = array( 	
					"name" => "Custom CSS",
					"desc" => "Enter custom CSS code. The code will be added to the header.",
					"id" => "custom_css",
					"std" => "",
					"type" => "textarea"
				);

$of_options[] = array( 	
					"name" => "Custom JavaScript/Analytics Header",
					"desc" => "Enter JavaScript and/or Analytics code wich will appear in the Header of your site",
					"id" => "custom_js_header",
					"std" => "",
					"type" => "textarea"
				);
				
$of_options[] = array( 	
					"name" => "Custom JavaScript/Analytics Footer",
					"desc" => "Enter JavaScript and/or Analytics code wich will appear in the Footer of your site",
					"id" => "custom_js_footer",
					"std" => "",
					"type" => "textarea"
				);

/*=================================================================
= Contact Us
===================================================================*/
$of_options[] = array( 	"name" => "Contact Us",
						"type" => "heading",
						"icon" => $adminurl . "icon-settings.png"
				);

$of_options[] = array( 	
					"name" => "Email Address",
					"desc" => "Will be use for contact form",
					"id" => "contact_email",
					"std" => get_option( 'admin_email' ),
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Company Name",
					"desc" => "",
					"id" => "company_name",
					"std" => "UnPress Magazine",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Company Address",
					"desc" => "Enter the full address ",
					"id" => "company_address",
					"std" => "406 CENTRAL PARK WEST, NEW YORK, NY 10025",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Phone Number",
					"desc" => "Enter your company contact number",
					"id" => "company_phone",
					"std" => "+1 (987) 654 3210",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Fax",
					"desc" => "Enter your company fax number",
					"id" => "company_fax",
					"std" => "+1 (987) 654 3210",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Google Map",
					"desc" => "Enter google map code here",
					"id" => "company_map",
					"std" => "",
					"type" => "textarea"
				);

$of_options[] = array( 	
					"name" => "Contact Email Success Message",
					"desc" => "",
					"id" => "email_success",
					"std" => "<strong>Well done!</strong>You successfully send this message.",
					"type" => "text"
				);


/*==========================================================================
=			Woo Commerce
============================================================================*/

$of_options[] = array( 	"name" => "WooCommerce Options",
						"type" => "heading",
						"icon" => $adminurl . "icon-settings.png"
				);

$of_options[] = array( 	
					"name" => "Enable WooCommerce Cart In Nav",
					"desc" => "This will add a cart item to your main navigation.",
					"id" => "woocommerce_cart_nav",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);
				
$of_options[] = array( 	
					"name" => "Main Shop Layout",
					"desc" => "Please select layout you would like to use on your main shop page.",
					"id" => "main_shop_layout",
					"std" => 'no-sidebar',
					"type" => "images",
					"options" => array(
						'no-sidebar' => $adminurl . 'no-sidebar.png',
						'left-sidebar' => $adminurl . 'left-sidebar.png',
						'right-sidebar' => $adminurl . 'right-sidebar.png'
					)
				);

$of_options[] = array( 	
					"name" => "Single Product Layout",
					"desc" => "Please select layout you would like to use on your single product page.",
					"id" => "single_product_layout",
					"std" => 'no-sidebar',
					"type" => "images",
					"options" => array(
						'no-sidebar' => $adminurl . 'no-sidebar.png',
						'left-sidebar' => $adminurl . 'left-sidebar.png',
						'right-sidebar' => $adminurl . 'right-sidebar.png'
					)
				);

$of_options[] = array( 	
					"name" => "Social Media Sharing Buttons",
					"desc" => "Activate this to enable social sharing buttons on your product page.",
					"id" => "woocommerce_social_media",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);

$of_options[] = array( 	
					"name" => "Facebook",
					"desc" => "Share it",
					"id" => "woocommerce_facebook",
					"std" => 1,
					"type" => "checkbox"
				);

$of_options[] = array( 	
					"name" => "Twitter",
					"desc" => "Tweet it",
					"id" => "woocommerce_twitter",
					"std" => 1,
					"type" => "checkbox"
				);

$of_options[] = array( 	
					"name" => "Pinterest",
					"desc" => "Pin it",
					"id" => "woocommerce_pinterest",
					"std" => 1,
					"type" => "checkbox"
				);
$of_options[] = array( 	
					"name" => "Google Plus",
					"desc" => "Goole it",
					"id" => "woocommerce_googleplus",
					"std" => 1,
					"type" => "checkbox"
				);

$of_options[] = array( 	
					"name" => "Email",
					"desc" => "email it",
					"id" => "woocommerce_email",
					"std" => 1,
					"type" => "checkbox"
				);
				
/*======================================================================

			WooCommerce Product Page

========================================================================*/

$of_options[] = array( 	"name" 		=> "Product Page",
						"type" 		=> "heading",
);


$of_options[] = array( 	"name" 		=> "Show Cart dropdown when product is added to cart",
						"id" 		=> "cart_dropdown_show",
						"desc"      => "Show Mini-cart dropdown after product is added to cart.",
						"std" 		=> 0,
						"type" 		=> "checkbox"
);


$of_options[] = array( 	"name" 		=> "Up-sell title",
				"id" 		=> "shop_aside_title",
				"std" 		=> "complete the look",
				"type" 		=> "text"
);


$of_options[] = array( 	"name" 		=> "Product Sidebar",
						"desc" 		=> "",
						"id" 		=> "product_sidebar",
						"std" 		=> "no_sidebar",
						"type" 		=> "select",
						"options" 	=> array(
										"no_sidebar" => "No sidebar",
										"left_sidebar" => "Left Sidebar",
										"right_sidebar" => "Right Sidebar"
						)
);


$of_options[] = array( 	"name" 		=> "Product info style",
						"desc" 		=> "Select how you want to display product info...",
						"id" 		=> "product_display",
						"std" 		=> "tabs",
						"type" 		=> "select",

						"options" 	=> array(
										"tabs" => "Tabs",
										"sections" => "Sections"

						)
);


$of_options[] = array( 	"name"  => "Additional Global tab/section title",
				"id" 		=> "tab_title",
				"std" 		=> "",
				"type" 		=> "text"
);

$of_options[] = array( 	"name" 		=> "Additional Global tab/section content",
				"id" 		=> "tab_content",
				"std" 		=> "",
				"type" 		=> "textarea",
				"desc"      => "Add additional tab content here... Like Size Charts etc."
);


// PAGE 404
$of_options[] = array( 	"name" => "Page 404",
						"type" => "heading",
						"icon" => $adminurl . "icon-page404.png"
				);

$of_options[] = array( 	
					"name" => "Page Title",
					"desc" => "Enter a title for 404 page not found",
					"id" => "error_title",
					"std" => "Ooops! There is no page",
					"type" => "text"
				);
				
$of_options[] = array( 
					"name" => "Page Image",
					"desc" => "Upload 404 page image",
					"id" => "error_image",
					"std" => $images_url . "error-page.png",
					"mod" => "min",
					"type" => "media"
				);				


							
// BACKUP OPTIONS
$of_options[] = array( 	"name" => "Backup Options",
						"type" => "heading",
						"icon" => $adminurl . "icon-backup.png"
				);

$of_options[] = array( 	"name" => "Backup and Restore Options",
						"id" => "of_backup",
						"std" => "",
						"type" => "backup",
						"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);

$of_options[] = array( 	"name" => "Transfer Theme Options Data",
						"id" => "of_transfer",
						"std" => "",
						"type" => "transfer",
						"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>