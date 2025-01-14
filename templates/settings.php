	<div id="screen_preloader" style="position: absolute;width: 100%;height: 1000px;z-index: 9999;text-align: center;background: #fff;padding-top: 200px;"><h3>WordPress Survey and Polls <br><small><i>by Pantherius</i></small></h3><img src="<?php print(plugins_url( '/assets/img/screen_preloader.gif' , __FILE__ ));?>"><h5><?php _e( 'LOADING', 'pantherius-wordpress-survey-polls' );?><br><br><?php _e( 'Please wait...', 'pantherius-wordpress-survey-polls' );?></h5></div>
	<div class="wrap wp_sap" style="visibility:hidden">
	<br /><br />
	<h3>WordPress Survey & Poll<br><br><hr /><br></h3>
	<div id="gradX" ></div>
	<div id="wp_sap_settings">
	<input type="text" id="survey_name" value="" size="50" placeholder="Type the survey name here" /><a id="add_new_survey" class="button button-primary"><?php esc_html_e( 'New Survey', WP_SAP_TEXT_DOMAIN );?></a><span id="error_log"></span>
	<div style="display:none;" id="new_survey_content">
	  <h3 class="accordion_survey_header"><?php esc_html_e( 'Section 1', WP_SAP_TEXT_DOMAIN );?></h3>
	  <div>
		<fieldset>
			<legend><?php esc_html_e( 'Survey Options', WP_SAP_TEXT_DOMAIN );?></legend>
			<div class="text"><?php esc_html_e( 'Start time', WP_SAP_TEXT_DOMAIN );?>: <input type="text" name="start_time" class="datepicker inputtext start_time wp_sap_tooltip" title="Leave it blank to activate the survey immediately" value="" /></div>
			<div class="text"><?php esc_html_e( 'Expiry time', WP_SAP_TEXT_DOMAIN );?>: <input type="text" name="expiry_time" class="datepicker inputtext expiry_time wp_sap_tooltip" title="Never expire the survey when you leave this blank" value="" /></div>
			<div class="text"><?php esc_html_e( 'Display style', WP_SAP_TEXT_DOMAIN );?>:
			<select name="display_style" class="display_style">
				<option value="bottom"><?php esc_html_e( 'Bottom', WP_SAP_TEXT_DOMAIN );?></option>
				<option value="top"><?php esc_html_e( 'Top', WP_SAP_TEXT_DOMAIN );?></option>
				<option value="center"><?php esc_html_e( 'Center', WP_SAP_TEXT_DOMAIN );?></option>
			</select>
			</div> 
			<div class="text"><?php esc_html_e( 'Animation Easing', WP_SAP_TEXT_DOMAIN );?>:
			<select name="animation_easing" class="animation_easing">
							<option value="linear">linear</option>
							<option value="swing">swing</option>
							<option value="easeInQuad">easeInQuad</option>
							<option value="easeOutQuad">easeOutQuad</option>
							<option value="easeInOutQuad">easeInOutQuad</option>
							<option value="easeInCubic">easeInCubic</option>
							<option value="easeOutCubic">easeOutCubic</option>
							<option value="easeInOutCubic">easeInOutCubic</option>
							<option value="easeInQuart">easeInQuart</option>
							<option value="easeOutQuart">easeOutQuart</option>
							<option value="easeInOutQuart">easeInOutQuart</option>
							<option value="easeInQuint">easeInQuint</option>
							<option value="easeOutQuint">easeOutQuint</option>
							<option value="easeInOutQuint">easeInOutQuint</option>
							<option value="easeInExpo">easeInExpo</option>
							<option value="easeOutExpo">easeOutExpo</option>
							<option value="easeInOutExpo">easeInOutExpo</option>
							<option value="easeInSine">easeInSine</option>
							<option value="easeOutSine">easeOutSine</option>
							<option value="easeInOutSine">easeInOutSine</option>
							<option value="easeInCirc">easeInCirc</option>
							<option value="easeOutCirc">easeOutCirc</option>
							<option value="easeInOutCirc">easeInOutCirc</option>
							<option value="easeInElastic">easeInElastic</option>
							<option value="easeOutElastic">easeOutElastic</option>
							<option value="easeInOutElastic">easeInOutElastic</option>
							<option value="easeInBack">easeInBack</option>
							<option value="easeOutBack">easeOutBack</option>
							<option selected value="easeInOutBack">easeInOutBack</option>
							<option value="easeInBounce">easeInBounce</option>
							<option value="easeOutBounce">easeOutBounce</option>
							<option value="easeInOutBounce">easeInOutBounce</option>
			</select>
			</div> 
			<div class="text"><?php esc_html_e( 'Font Family', WP_SAP_TEXT_DOMAIN );?>: <select name="font_family" class="font_family">
							<option value=""><?php esc_html_e( 'Default', WP_SAP_TEXT_DOMAIN );?></option>
							<option value="ABeeZee">ABeeZee</option>
							<option value="Abel">Abel</option>
							<option value="Abril Fatface">Abril Fatface</option>
							<option value="Aclonica">Aclonica</option>
							<option value="Acme">Acme</option>
							<option value="Actor">Actor</option>
							<option value="Adamina">Adamina</option>
							<option value="Advent Pro">Advent Pro</option>
							<option value="Aguafina Script">Aguafina Script</option>
							<option value="Akronim">Akronim</option>
							<option value="Aladin">Aladin</option>
							<option value="Aldrich">Aldrich</option>
							<option value="Alef">Alef</option>
							<option value="Alegreya">Alegreya</option>
							<option value="Alegreya SC">Alegreya SC</option>
							<option value="Alex Brush">Alex Brush</option>
							<option value="Alfa Slab One">Alfa Slab One</option>
							<option value="Alice">Alice</option>
							<option value="Alike">Alike</option>
							<option value="Alike Angular">Alike Angular</option>
							<option value="Allan">Allan</option>
							<option value="Allerta">Allerta</option>
							<option value="Allerta Stencil">Allerta Stencil</option>
							<option value="Allura">Allura</option>
							<option value="Almendra">Almendra</option>
							<option value="Almendra Display">Almendra Display</option>
							<option value="Almendra SC">Almendra SC</option>
							<option value="Amarante">Amarante</option>
							<option value="Amaranth">Amaranth</option>
							<option value="Amatic SC">Amatic SC</option>
							<option value="Amethysta">Amethysta</option>
							<option value="Anaheim">Anaheim</option>
							<option value="Andada">Andada</option>
							<option value="Andika">Andika</option>
							<option value="Angkor">Angkor</option>
							<option value="Annie Use Your Telescope">Annie Use Your Telescope</option>
							<option value="Anonymous Pro">Anonymous Pro</option>
							<option value="Antic">Antic</option>
							<option value="Antic Didone">Antic Didone</option>
							<option value="Antic Slab">Antic Slab</option>
							<option value="Anton">Anton</option>
							<option value="Arapey">Arapey</option>
							<option value="Arbutus">Arbutus</option>
							<option value="Arbutus Slab">Arbutus Slab</option>
							<option value="Architects Daughter">Architects Daughter</option>
							<option value="Archivo Black">Archivo Black</option>
							<option value="Archivo Narrow">Archivo Narrow</option>
							<option value="Arimo">Arimo</option>
							<option value="Arizonia">Arizonia</option>
							<option value="Armata">Armata</option>
							<option value="Artifika">Artifika</option>
							<option value="Arvo">Arvo</option>
							<option value="Asap">Asap</option>
							<option value="Asset">Asset</option>
							<option value="Astloch">Astloch</option>
							<option value="Asul">Asul</option>
							<option value="Atomic Age">Atomic Age</option>
							<option value="Aubrey">Aubrey</option>
							<option value="Audiowide">Audiowide</option>
							<option value="Autour One">Autour One</option>
							<option value="Average">Average</option>
							<option value="Average Sans">Average Sans</option>
							<option value="Averia Gruesa Libre">Averia Gruesa Libre</option>
							<option value="Averia Libre">Averia Libre</option>
							<option value="Averia Sans Libre">Averia Sans Libre</option>
							<option value="Averia Serif Libre">Averia Serif Libre</option>
							<option value="Bad Script">Bad Script</option>
							<option value="Balthazar">Balthazar</option>
							<option value="Bangers">Bangers</option>
							<option value="Basic">Basic</option>
							<option value="Battambang">Battambang</option>
							<option value="Baumans">Baumans</option>
							<option value="Bayon">Bayon</option>
							<option value="Belgrano">Belgrano</option>
							<option value="Belleza">Belleza</option>
							<option value="BenchNine">BenchNine</option>
							<option value="Bentham">Bentham</option>
							<option value="Berkshire Swash">Berkshire Swash</option>
							<option value="Bevan">Bevan</option>
							<option value="Bigelow Rules">Bigelow Rules</option>
							<option value="Bigshot One">Bigshot One</option>
							<option value="Bilbo">Bilbo</option>
							<option value="Bilbo Swash Caps">Bilbo Swash Caps</option>
							<option value="Bitter">Bitter</option>
							<option value="Black Ops One">Black Ops One</option>
							<option value="Bokor">Bokor</option>
							<option value="Bonbon">Bonbon</option>
							<option value="Boogaloo">Boogaloo</option>
							<option value="Bowlby One">Bowlby One</option>
							<option value="Bowlby One SC">Bowlby One SC</option>
							<option value="Brawler">Brawler</option>
							<option value="Bree Serif">Bree Serif</option>
							<option value="Bubblegum Sans">Bubblegum Sans</option>
							<option value="Bubbler One">Bubbler One</option>
							<option value="Buenard">Buenard</option>
							<option value="Butcherman">Butcherman</option>
							<option value="Butterfly Kids">Butterfly Kids</option>
							<option value="Cabin">Cabin</option>
							<option value="Cabin Condensed">Cabin Condensed</option>
							<option value="Cabin Sketch">Cabin Sketch</option>
							<option value="Caesar Dressing">Caesar Dressing</option>
							<option value="Cagliostro">Cagliostro</option>
							<option value="Calligraffitti">Calligraffitti</option>
							<option value="Cambo">Cambo</option>
							<option value="Candal">Candal</option>
							<option value="Cantarell">Cantarell</option>
							<option value="Cantata One">Cantata One</option>
							<option value="Cantora One">Cantora One</option>
							<option value="Capriola">Capriola</option>
							<option value="Cardo">Cardo</option>
							<option value="Carme">Carme</option>
							<option value="Carrois Gothic">Carrois Gothic</option>
							<option value="Carrois Gothic SC">Carrois Gothic SC</option>
							<option value="Carter One">Carter One</option>
							<option value="Caudex">Caudex</option>
							<option value="Cedarville Cursive">Cedarville Cursive</option>
							<option value="Ceviche One">Ceviche One</option>
							<option value="Changa One">Changa One</option>
							<option value="Chango">Chango</option>
							<option value="Chau Philomene One">Chau Philomene One</option>
							<option value="Chela One">Chela One</option>
							<option value="Chelsea Market">Chelsea Market</option>
							<option value="Chenla">Chenla</option>
							<option value="Cherry Cream Soda">Cherry Cream Soda</option>
							<option value="Cherry Swash">Cherry Swash</option>
							<option value="Chewy">Chewy</option>
							<option value="Chicle">Chicle</option>
							<option value="Chivo">Chivo</option>
							<option value="Cinzel">Cinzel</option>
							<option value="Cinzel Decorative">Cinzel Decorative</option>
							<option value="Clicker Script">Clicker Script</option>
							<option value="Coda">Coda</option>
							<option value="Coda Caption:800">Coda Caption</option>
							<option value="Codystar">Codystar</option>
							<option value="Combo">Combo</option>
							<option value="Comfortaa">Comfortaa</option>
							<option value="Coming Soon">Coming Soon</option>
							<option value="Concert One">Concert One</option>
							<option value="Condiment">Condiment</option>
							<option value="Content">Content</option>
							<option value="Contrail One">Contrail One</option>
							<option value="Convergence">Convergence</option>
							<option value="Cookie">Cookie</option>
							<option value="Copse">Copse</option>
							<option value="Corben">Corben</option>
							<option value="Courgette">Courgette</option>
							<option value="Cousine">Cousine</option>
							<option value="Coustard">Coustard</option>
							<option value="Covered By Your Grace">Covered By Your Grace</option>
							<option value="Crafty Girls">Crafty Girls</option>
							<option value="Creepster">Creepster</option>
							<option value="Crete Round">Crete Round</option>
							<option value="Crimson Text">Crimson Text</option>
							<option value="Croissant One">Croissant One</option>
							<option value="Crushed">Crushed</option>
							<option value="Cuprum">Cuprum</option>
							<option value="Cutive">Cutive</option>
							<option value="Cutive Mono">Cutive Mono</option>
							<option value="Damion">Damion</option>
							<option value="Dancing Script">Dancing Script</option>
							<option value="Dangrek">Dangrek</option>
							<option value="Dawning of a New Day">Dawning of a New Day</option>
							<option value="Days One">Days One</option>
							<option value="Delius">Delius</option>
							<option value="Delius Swash Caps">Delius Swash Caps</option>
							<option value="Delius Unicase">Delius Unicase</option>
							<option value="Della Respira">Della Respira</option>
							<option value="Denk One">Denk One</option>
							<option value="Devonshire">Devonshire</option>
							<option value="Didact Gothic">Didact Gothic</option>
							<option value="Diplomata">Diplomata</option>
							<option value="Diplomata SC">Diplomata SC</option>
							<option value="Domine">Domine</option>
							<option value="Donegal One">Donegal One</option>
							<option value="Doppio One">Doppio One</option>
							<option value="Dorsa">Dorsa</option>
							<option value="Dosis">Dosis</option>
							<option value="Dr Sugiyama">Dr Sugiyama</option>
							<option value="Droid Sans">Droid Sans</option>
							<option value="Droid Sans Mono">Droid Sans Mono</option>
							<option value="Droid Serif">Droid Serif</option>
							<option value="Duru Sans">Duru Sans</option>
							<option value="Dynalight">Dynalight</option>
							<option value="Eagle Lake">Eagle Lake</option>
							<option value="Eater">Eater</option>
							<option value="EB Garamond">EB Garamond</option>
							<option value="Economica">Economica</option>
							<option value="Electrolize">Electrolize</option>
							<option value="Elsie">Elsie</option>
							<option value="Elsie Swash Caps">Elsie Swash Caps</option>
							<option value="Emblema One">Emblema One</option>
							<option value="Emilys Candy">Emilys Candy</option>
							<option value="Engagement">Engagement</option>
							<option value="Englebert">Englebert</option>
							<option value="Enriqueta">Enriqueta</option>
							<option value="Erica One">Erica One</option>
							<option value="Esteban">Esteban</option>
							<option value="Euphoria Script">Euphoria Script</option>
							<option value="Ewert">Ewert</option>
							<option value="Exo">Exo</option>
							<option value="Expletus Sans">Expletus Sans</option>
							<option value="Fanwood Text">Fanwood Text</option>
							<option value="Fascinate">Fascinate</option>
							<option value="Fascinate Inline">Fascinate Inline</option>
							<option value="Faster One">Faster One</option>
							<option value="Fasthand">Fasthand</option>
							<option value="Fauna One">Fauna One</option>
							<option value="Federant">Federant</option>
							<option value="Federo">Federo</option>
							<option value="Felipa">Felipa</option>
							<option value="Fenix">Fenix</option>
							<option value="Finger Paint">Finger Paint</option>
							<option value="Fjalla One">Fjalla One</option>
							<option value="Fjord One">Fjord One</option>
							<option value="Flamenco">Flamenco</option>
							<option value="Flavors">Flavors</option>
							<option value="Fondamento">Fondamento</option>
							<option value="Fontdiner Swanky">Fontdiner Swanky</option>
							<option value="Forum">Forum</option>
							<option value="Francois One">Francois One</option>
							<option value="Freckle Face">Freckle Face</option>
							<option value="Fredericka the Great">Fredericka the Great</option>
							<option value="Fredoka One">Fredoka One</option>
							<option value="Freehand">Freehand</option>
							<option value="Fresca">Fresca</option>
							<option value="Frijole">Frijole</option>
							<option value="Fruktur">Fruktur</option>
							<option value="Fugaz One">Fugaz One</option>
							<option value="Gabriela">Gabriela</option>
							<option value="Gafata">Gafata</option>
							<option value="Galdeano">Galdeano</option>
							<option value="Galindo">Galindo</option>
							<option value="Gentium Basic">Gentium Basic</option>
							<option value="Gentium Book Basic">Gentium Book Basic</option>
							<option value="Geo">Geo</option>
							<option value="Geostar">Geostar</option>
							<option value="Geostar Fill">Geostar Fill</option>
							<option value="Germania One">Germania One</option>
							<option value="GFS Didot">GFS Didot</option>
							<option value="GFS Neohellenic">GFS Neohellenic</option>
							<option value="Gilda Display">Gilda Display</option>
							<option value="Give You Glory">Give You Glory</option>
							<option value="Glass Antiqua">Glass Antiqua</option>
							<option value="Glegoo">Glegoo</option>
							<option value="Gloria Hallelujah">Gloria Hallelujah</option>
							<option value="Goblin One">Goblin One</option>
							<option value="Gochi Hand">Gochi Hand</option>
							<option value="Gorditas">Gorditas</option>
							<option value="Goudy Bookletter 1911">Goudy Bookletter 1911</option>
							<option value="Graduate">Graduate</option>
							<option value="Grand Hotel">Grand Hotel</option>
							<option value="Gravitas One">Gravitas One</option>
							<option value="Great Vibes">Great Vibes</option>
							<option value="Griffy">Griffy</option>
							<option value="Gruppo">Gruppo</option>
							<option value="Gudea">Gudea</option>
							<option value="Habibi">Habibi</option>
							<option value="Hammersmith One">Hammersmith One</option>
							<option value="Hanalei">Hanalei</option>
							<option value="Hanalei Fill">Hanalei Fill</option>
							<option value="Handlee">Handlee</option>
							<option value="Hanuman">Hanuman</option>
							<option value="Happy Monkey">Happy Monkey</option>
							<option value="Headland One">Headland One</option>
							<option value="Henny Penny">Henny Penny</option>
							<option value="Herr Von Muellerhoff">Herr Von Muellerhoff</option>
							<option value="Holtwood One SC">Holtwood One SC</option>
							<option value="Homemade Apple">Homemade Apple</option>
							<option value="Homenaje">Homenaje</option>
							<option value="Iceberg">Iceberg</option>
							<option value="Iceland">Iceland</option>
							<option value="IM Fell Double Pica">IM Fell Double Pica</option>
							<option value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
							<option value="IM Fell DW Pica">IM Fell DW Pica</option>
							<option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
							<option value="IM Fell English">IM Fell English</option>
							<option value="IM Fell English SC">IM Fell English SC</option>
							<option value="IM Fell French Canon">IM Fell French Canon</option>
							<option value="IM Fell French Canon SC">IM Fell French Canon SC</option>
							<option value="IM Fell Great Primer">IM Fell Great Primer</option>
							<option value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
							<option value="Imprima">Imprima</option>
							<option value="Inconsolata">Inconsolata</option>
							<option value="Inder">Inder</option>
							<option value="Indie Flower">Indie Flower</option>
							<option value="Inika">Inika</option>
							<option value="Irish Grover">Irish Grover</option>
							<option value="Istok Web">Istok Web</option>
							<option value="Italiana">Italiana</option>
							<option value="Italianno">Italianno</option>
							<option value="Jacques Francois">Jacques Francois</option>
							<option value="Jacques Francois Shadow">Jacques Francois Shadow</option>
							<option value="Jim Nightshade">Jim Nightshade</option>
							<option value="Jockey One">Jockey One</option>
							<option value="Jolly Lodger">Jolly Lodger</option>
							<option value="Josefin Sans">Josefin Sans</option>
							<option value="Josefin Slab">Josefin Slab</option>
							<option value="Joti One">Joti One</option>
							<option value="Judson">Judson</option>
							<option value="Julee">Julee</option>
							<option value="Julius Sans One">Julius Sans One</option>
							<option value="Junge">Junge</option>
							<option value="Jura">Jura</option>
							<option value="Just Another Hand">Just Another Hand</option>
							<option value="Just Me Again Down Here">Just Me Again Down Here</option>
							<option value="Kameron">Kameron</option>
							<option value="Karla">Karla</option>
							<option value="Kaushan Script">Kaushan Script</option>
							<option value="Kavoon">Kavoon</option>
							<option value="Keania One">Keania One</option>
							<option value="Kelly Slab">Kelly Slab</option>
							<option value="Kenia">Kenia</option>
							<option value="Khmer">Khmer</option>
							<option value="Kite One">Kite One</option>
							<option value="Knewave">Knewave</option>
							<option value="Kotta One">Kotta One</option>
							<option value="Koulen">Koulen</option>
							<option value="Kranky">Kranky</option>
							<option value="Kreon">Kreon</option>
							<option value="Kristi">Kristi</option>
							<option value="Krona One">Krona One</option>
							<option value="La Belle Aurore">La Belle Aurore</option>
							<option value="Lancelot">Lancelot</option>
							<option value="Lato">Lato</option>
							<option value="League Script">League Script</option>
							<option value="Leckerli One">Leckerli One</option>
							<option value="Ledger">Ledger</option>
							<option value="Lekton">Lekton</option>
							<option value="Lemon">Lemon</option>
							<option value="Libre Baskerville">Libre Baskerville</option>
							<option value="Life Savers">Life Savers</option>
							<option value="Lilita One">Lilita One</option>
							<option value="Lily Script One">Lily Script One</option>
							<option value="Limelight">Limelight</option>
							<option value="Linden Hill">Linden Hill</option>
							<option value="Lobster">Lobster</option>
							<option value="Lobster Two">Lobster Two</option>
							<option value="Londrina Outline">Londrina Outline</option>
							<option value="Londrina Shadow">Londrina Shadow</option>
							<option value="Londrina Sketch">Londrina Sketch</option>
							<option value="Londrina Solid">Londrina Solid</option>
							<option value="Lora">Lora</option>
							<option value="Love Ya Like A Sister">Love Ya Like A Sister</option>
							<option value="Loved by the King">Loved by the King</option>
							<option value="Lovers Quarrel">Lovers Quarrel</option>
							<option value="Luckiest Guy">Luckiest Guy</option>
							<option value="Lusitana">Lusitana</option>
							<option value="Lustria">Lustria</option>
							<option value="Macondo">Macondo</option>
							<option value="Macondo Swash Caps">Macondo Swash Caps</option>
							<option value="Magra">Magra</option>
							<option value="Maiden Orange">Maiden Orange</option>
							<option value="Mako">Mako</option>
							<option value="Marcellus">Marcellus</option>
							<option value="Marcellus SC">Marcellus SC</option>
							<option value="Marck Script">Marck Script</option>
							<option value="Margarine">Margarine</option>
							<option value="Marko One">Marko One</option>
							<option value="Marmelad">Marmelad</option>
							<option value="Marvel">Marvel</option>
							<option value="Mate">Mate</option>
							<option value="Mate SC">Mate SC</option>
							<option value="Maven Pro">Maven Pro</option>
							<option value="McLaren">McLaren</option>
							<option value="Meddon">Meddon</option>
							<option value="MedievalSharp">MedievalSharp</option>
							<option value="Medula One">Medula One</option>
							<option value="Megrim">Megrim</option>
							<option value="Meie Script">Meie Script</option>
							<option value="Merienda">Merienda</option>
							<option value="Merienda One">Merienda One</option>
							<option value="Merriweather">Merriweather</option>
							<option value="Merriweather Sans">Merriweather Sans</option>
							<option value="Metal">Metal</option>
							<option value="Metal Mania">Metal Mania</option>
							<option value="Metamorphous">Metamorphous</option>
							<option value="Metrophobic">Metrophobic</option>
							<option value="Michroma">Michroma</option>
							<option value="Milonga">Milonga</option>
							<option value="Miltonian">Miltonian</option>
							<option value="Miltonian Tattoo">Miltonian Tattoo</option>
							<option value="Miniver">Miniver</option>
							<option value="Miss Fajardose">Miss Fajardose</option>
							<option value="Modern Antiqua">Modern Antiqua</option>
							<option value="Molengo">Molengo</option>
							<option value="Molle:400italic">Molle</option>
							<option value="Monda">Monda</option>
							<option value="Monofett">Monofett</option>
							<option value="Monoton">Monoton</option>
							<option value="Monsieur La Doulaise">Monsieur La Doulaise</option>
							<option value="Montaga">Montaga</option>
							<option value="Montez">Montez</option>
							<option value="Montserrat">Montserrat</option>
							<option value="Montserrat Alternates">Montserrat Alternates</option>
							<option value="Montserrat Subrayada">Montserrat Subrayada</option>
							<option value="Moul">Moul</option>
							<option value="Moulpali">Moulpali</option>
							<option value="Mountains of Christmas">Mountains of Christmas</option>
							<option value="Mouse Memoirs">Mouse Memoirs</option>
							<option value="Mr Bedfort">Mr Bedfort</option>
							<option value="Mr Dafoe">Mr Dafoe</option>
							<option value="Mr De Haviland">Mr De Haviland</option>
							<option value="Mrs Saint Delafield">Mrs Saint Delafield</option>
							<option value="Mrs Sheppards">Mrs Sheppards</option>
							<option value="Muli">Muli</option>
							<option value="Mystery Quest">Mystery Quest</option>
							<option value="Neucha">Neucha</option>
							<option value="Neuton">Neuton</option>
							<option value="New Rocker">New Rocker</option>
							<option value="News Cycle">News Cycle</option>
							<option value="Niconne">Niconne</option>
							<option value="Nixie One">Nixie One</option>
							<option value="Nobile">Nobile</option>
							<option value="Nokora">Nokora</option>
							<option value="Norican">Norican</option>
							<option value="Nosifer">Nosifer</option>
							<option value="Nothing You Could Do">Nothing You Could Do</option>
							<option value="Noticia Text">Noticia Text</option>
							<option value="Noto Sans">Noto Sans</option>
							<option value="Noto Serif">Noto Serif</option>
							<option value="Nova Cut">Nova Cut</option>
							<option value="Nova Flat">Nova Flat</option>
							<option value="Nova Mono">Nova Mono</option>
							<option value="Nova Oval">Nova Oval</option>
							<option value="Nova Round">Nova Round</option>
							<option value="Nova Script">Nova Script</option>
							<option value="Nova Slim">Nova Slim</option>
							<option value="Nova Square">Nova Square</option>
							<option value="Numans">Numans</option>
							<option value="Nunito">Nunito</option>
							<option value="Odor Mean Chey">Odor Mean Chey</option>
							<option value="Offside">Offside</option>
							<option value="Old Standard TT">Old Standard TT</option>
							<option value="Oldenburg">Oldenburg</option>
							<option value="Oleo Script">Oleo Script</option>
							<option value="Oleo Script Swash Caps">Oleo Script Swash Caps</option>
							<option value="Open Sans">Open Sans</option>
							<option value="Open Sans Condensed:300">Open Sans Condensed</option>
							<option value="Oranienbaum">Oranienbaum</option>
							<option value="Orbitron">Orbitron</option>
							<option value="Oregano">Oregano</option>
							<option value="Orienta">Orienta</option>
							<option value="Original Surfer">Original Surfer</option>
							<option value="Oswald">Oswald</option>
							<option value="Over the Rainbow">Over the Rainbow</option>
							<option value="Overlock">Overlock</option>
							<option value="Overlock SC">Overlock SC</option>
							<option value="Ovo">Ovo</option>
							<option value="Oxygen">Oxygen</option>
							<option value="Oxygen Mono">Oxygen Mono</option>
							<option value="Pacifico">Pacifico</option>
							<option value="Paprika">Paprika</option>
							<option value="Parisienne">Parisienne</option>
							<option value="Passero One">Passero One</option>
							<option value="Passion One">Passion One</option>
							<option value="Pathway Gothic One">Pathway Gothic One</option>
							<option value="Patrick Hand">Patrick Hand</option>
							<option value="Patrick Hand SC">Patrick Hand SC</option>
							<option value="Patua One">Patua One</option>
							<option value="Paytone One">Paytone One</option>
							<option value="Peralta">Peralta</option>
							<option value="Permanent Marker">Permanent Marker</option>
							<option value="Petit Formal Script">Petit Formal Script</option>
							<option value="Petrona">Petrona</option>
							<option value="Philosopher">Philosopher</option>
							<option value="Piedra">Piedra</option>
							<option value="Pinyon Script">Pinyon Script</option>
							<option value="Pirata One">Pirata One</option>
							<option value="Plaster">Plaster</option>
							<option value="Play">Play</option>
							<option value="Playball">Playball</option>
							<option value="Playfair Display">Playfair Display</option>
							<option value="Playfair Display SC">Playfair Display SC</option>
							<option value="Podkova">Podkova</option>
							<option value="Poiret One">Poiret One</option>
							<option value="Poller One">Poller One</option>
							<option value="Poly">Poly</option>
							<option value="Pompiere">Pompiere</option>
							<option value="Pontano Sans">Pontano Sans</option>
							<option value="Port Lligat Sans">Port Lligat Sans</option>
							<option value="Port Lligat Slab">Port Lligat Slab</option>
							<option value="Prata">Prata</option>
							<option value="Preahvihear">Preahvihear</option>
							<option value="Press Start 2P">Press Start 2P</option>
							<option value="Princess Sofia">Princess Sofia</option>
							<option value="Prociono">Prociono</option>
							<option value="Prosto One">Prosto One</option>
							<option value="PT Mono">PT Mono</option>
							<option value="PT Sans">PT Sans</option>
							<option value="PT Sans Caption">PT Sans Caption</option>
							<option value="PT Sans Narrow">PT Sans Narrow</option>
							<option value="PT Serif">PT Serif</option>
							<option value="PT Serif Caption">PT Serif Caption</option>
							<option value="Puritan">Puritan</option>
							<option value="Purple Purse">Purple Purse</option>
							<option value="Quando">Quando</option>
							<option value="Quantico">Quantico</option>
							<option value="Quattrocento">Quattrocento</option>
							<option value="Quattrocento Sans">Quattrocento Sans</option>
							<option value="Questrial">Questrial</option>
							<option value="Quicksand">Quicksand</option>
							<option value="Quintessential">Quintessential</option>
							<option value="Qwigley">Qwigley</option>
							<option value="Racing Sans One">Racing Sans One</option>
							<option value="Radley">Radley</option>
							<option value="Raleway">Raleway</option>
							<option value="Raleway Dots">Raleway Dots</option>
							<option value="Rambla">Rambla</option>
							<option value="Rammetto One">Rammetto One</option>
							<option value="Ranchers">Ranchers</option>
							<option value="Rancho">Rancho</option>
							<option value="Rationale">Rationale</option>
							<option value="Redressed">Redressed</option>
							<option value="Reenie Beanie">Reenie Beanie</option>
							<option value="Revalia">Revalia</option>
							<option value="Ribeye">Ribeye</option>
							<option value="Ribeye Marrow">Ribeye Marrow</option>
							<option value="Righteous">Righteous</option>
							<option value="Risque">Risque</option>
							<option value="Roboto">Roboto</option>
							<option value="Roboto Condensed">Roboto Condensed</option>
							<option value="Roboto Slab">Roboto Slab</option>
							<option value="Rochester">Rochester</option>
							<option value="Rock Salt">Rock Salt</option>
							<option value="Rokkitt">Rokkitt</option>
							<option value="Romanesco">Romanesco</option>
							<option value="Ropa Sans">Ropa Sans</option>
							<option value="Rosario">Rosario</option>
							<option value="Rosarivo">Rosarivo</option>
							<option value="Rouge Script">Rouge Script</option>
							<option value="Ruda">Ruda</option>
							<option value="Rufina">Rufina</option>
							<option value="Ruge Boogie">Ruge Boogie</option>
							<option value="Ruluko">Ruluko</option>
							<option value="Rum Raisin">Rum Raisin</option>
							<option value="Ruslan Display">Ruslan Display</option>
							<option value="Russo One">Russo One</option>
							<option value="Ruthie">Ruthie</option>
							<option value="Rye">Rye</option>
							<option value="Sacramento">Sacramento</option>
							<option value="Sail">Sail</option>
							<option value="Salsa">Salsa</option>
							<option value="Sanchez">Sanchez</option>
							<option value="Sancreek">Sancreek</option>
							<option value="Sansita One">Sansita One</option>
							<option value="Sarina">Sarina</option>
							<option value="Satisfy">Satisfy</option>
							<option value="Scada">Scada</option>
							<option value="Schoolbell">Schoolbell</option>
							<option value="Seaweed Script">Seaweed Script</option>
							<option value="Sevillana">Sevillana</option>
							<option value="Seymour One">Seymour One</option>
							<option value="Shadows Into Light">Shadows Into Light</option>
							<option value="Shadows Into Light Two">Shadows Into Light Two</option>
							<option value="Shanti">Shanti</option>
							<option value="Share">Share</option>
							<option value="Share Tech">Share Tech</option>
							<option value="Share Tech Mono">Share Tech Mono</option>
							<option value="Shojumaru">Shojumaru</option>
							<option value="Short Stack">Short Stack</option>
							<option value="Siemreap">Siemreap</option>
							<option value="Sigmar One">Sigmar One</option>
							<option value="Signika">Signika</option>
							<option value="Signika Negative">Signika Negative</option>
							<option value="Simonetta">Simonetta</option>
							<option value="Sintony">Sintony</option>
							<option value="Sirin Stencil">Sirin Stencil</option>
							<option value="Six Caps">Six Caps</option>
							<option value="Skranji">Skranji</option>
							<option value="Slackey">Slackey</option>
							<option value="Smokum">Smokum</option>
							<option value="Smythe">Smythe</option>
							<option value="Sniglet:800">Sniglet</option>
							<option value="Snippet">Snippet</option>
							<option value="Snowburst One">Snowburst One</option>
							<option value="Sofadi One">Sofadi One</option>
							<option value="Sofia">Sofia</option>
							<option value="Sonsie One">Sonsie One</option>
							<option value="Sorts Mill Goudy">Sorts Mill Goudy</option>
							<option value="Source Code Pro">Source Code Pro</option>
							<option value="Source Sans Pro">Source Sans Pro</option>
							<option value="Special Elite">Special Elite</option>
							<option value="Spicy Rice">Spicy Rice</option>
							<option value="Spinnaker">Spinnaker</option>
							<option value="Spirax">Spirax</option>
							<option value="Squada One">Squada One</option>
							<option value="Stalemate">Stalemate</option>
							<option value="Stalinist One">Stalinist One</option>
							<option value="Stardos Stencil">Stardos Stencil</option>
							<option value="Stint Ultra Condensed">Stint Ultra Condensed</option>
							<option value="Stint Ultra Expanded">Stint Ultra Expanded</option>
							<option value="Stoke">Stoke</option>
							<option value="Strait">Strait</option>
							<option value="Sue Ellen Francisco">Sue Ellen Francisco</option>
							<option value="Sunshiney">Sunshiney</option>
							<option value="Supermercado One">Supermercado One</option>
							<option value="Suwannaphum">Suwannaphum</option>
							<option value="Swanky and Moo Moo">Swanky and Moo Moo</option>
							<option value="Syncopate">Syncopate</option>
							<option value="Tangerine">Tangerine</option>
							<option value="Taprom">Taprom</option>
							<option value="Tauri">Tauri</option>
							<option value="Telex">Telex</option>
							<option value="Tenor Sans">Tenor Sans</option>
							<option value="Text Me One">Text Me One</option>
							<option value="The Girl Next Door">The Girl Next Door</option>
							<option value="Tienne">Tienne</option>
							<option value="Tinos">Tinos</option>
							<option value="Titan One">Titan One</option>
							<option value="Titillium Web">Titillium Web</option>
							<option value="Trade Winds">Trade Winds</option>
							<option value="Trocchi">Trocchi</option>
							<option value="Trochut">Trochut</option>
							<option value="Trykker">Trykker</option>
							<option value="Tulpen One">Tulpen One</option>
							<option value="Ubuntu">Ubuntu</option>
							<option value="Ubuntu Condensed">Ubuntu Condensed</option>
							<option value="Ubuntu Mono">Ubuntu Mono</option>
							<option value="Ultra">Ultra</option>
							<option value="Uncial Antiqua">Uncial Antiqua</option>
							<option value="Underdog">Underdog</option>
							<option value="Unica One">Unica One</option>
							<option value="UnifrakturCook:700">UnifrakturCook</option>
							<option value="UnifrakturMaguntia">UnifrakturMaguntia</option>
							<option value="Unkempt">Unkempt</option>
							<option value="Unlock">Unlock</option>
							<option value="Unna">Unna</option>
							<option value="Vampiro One">Vampiro One</option>
							<option value="Varela">Varela</option>
							<option value="Varela Round">Varela Round</option>
							<option value="Vast Shadow">Vast Shadow</option>
							<option value="Vibur">Vibur</option>
							<option value="Vidaloka">Vidaloka</option>
							<option value="Viga">Viga</option>
							<option value="Voces">Voces</option>
							<option value="Volkhov">Volkhov</option>
							<option value="Vollkorn">Vollkorn</option>
							<option value="Voltaire">Voltaire</option>
							<option value="VT323">VT323</option>
							<option value="Waiting for the Sunrise">Waiting for the Sunrise</option>
							<option value="Wallpoet">Wallpoet</option>
							<option value="Walter Turncoat">Walter Turncoat</option>
							<option value="Warnes">Warnes</option>
							<option value="Wellfleet">Wellfleet</option>
							<option value="Wendy One">Wendy One</option>
							<option value="Wire One">Wire One</option>
							<option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
							<option value="Yellowtail">Yellowtail</option>
							<option value="Yeseva One">Yeseva One</option>
							<option value="Yesteryear">Yesteryear</option>
							<option value="Zeyada">Zeyada</option>
						</select>
				</div>
				<div title="Background Color" class="wp_sap_preview1001 wp_sap_preview wp_sap_tooltip"><div class="inner"><input type="hidden" class="bgcolor" value="linear-gradient(top, rgb(228, 228, 228) 35%, rgb(228, 228, 228) 70%); -o-linear-gradient(top, rgb(228, 228, 228) 35%, rgb(228, 228, 228) 70%); -ms-linear-gradient(top, rgb(228, 228, 228) 35%, rgb(228, 228, 228) 70%); -moz-linear-gradient(top, rgb(228, 228, 228) 35%, rgb(228, 228, 228) 70%); -webkit-linear-gradient(top, rgb(228, 228, 228) 35%, rgb(228, 228, 228) 70%);"></div></div>
				<div title="Font Color" style="background-color: rgb(81, 81, 81);" class="wp_sap_preview1002 wp_sap_preview wp_sap_tooltip"></div>
				<div title="Border Color" style="background-color: rgb(188, 188, 188);" class="wp_sap_preview1003 wp_sap_preview wp_sap_tooltip"></div>
				<div class="play_button"><img class="wp_sap_tooltip" title="Play Survey" src="<?php print(plugins_url( '/assets/img/play-button.png' , __FILE__ ));?>"></div>
				<div style="clear: both;"></div>
				<div class="wp_sap_sliders"><input value="Border Width: 1px" type="text" class="wp_sap_border_width_value" /><div class="wp_sap_border_width"></div></div>
				<div class="wp_sap_sliders"><input value="Border Radius: 5px" type="text" class="wp_sap_border_radius_value" /><div class="wp_sap_border_radius"></div></div>
				<div class="wp_sap_sliders"><input value="Font Size: 20px" type="text" class="wp_sap_font_size_value" /><div class="wp_sap_font_size"></div></div>
				<div class="wp_sap_sliders"><input value="Padding: 20px" type="text" class="wp_sap_padding_value" /><div class="wp_sap_padding"></div></div>
				<div class="wp_sap_sliders"><input value="Line Height: 20px" type="text" class="wp_sap_line_height_value" /><div class="wp_sap_line_height"></div></div>
				<div class="wp_sap_sliders"><input value="Animation Speed: 0.5sec" type="text" style="width:150px;" class="wp_sap_animation_speed_value" /><div class="wp_sap_animation_speed"></div></div>
				<div style="clear: both;"></div>
				<div class="text thankyou"><?php esc_html_e( 'Thank you message', WP_SAP_TEXT_DOMAIN );?>: <input type="text" name="thankyou" class="inputtext thankyou" value="Thank you for your feedback!" /></div>
				<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" style="width: 200px;" title="Enable if you want to display the survey on the entire website"><input type="checkbox" name="global_survey" class="inputtext global_survey" value="0" /> <?php esc_html_e( 'Global Survey', WP_SAP_TEXT_DOMAIN );?></label></div>
				<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="Lock the screen with a transparent background" style="width: 200px;"><input type="checkbox" name="lock_bg" class="inputtext lock_bg" value="0" /> <?php esc_html_e( 'Lock Screen', WP_SAP_TEXT_DOMAIN );?></label></div>
				<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="Users can close the survey" style="width: 200px;"><input type="checkbox" name="closeable" class="inputtext closeable" value="0" /> <?php esc_html_e( 'Closeable', WP_SAP_TEXT_DOMAIN );?></label></div>
				<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="The survey will appear when the user scrolled down at the bottom of the page" style="width: 200px;"><input type="checkbox" name="atbottom" class="inputtext atbottom" value="0" /> <?php esc_html_e( 'Display at bottom', WP_SAP_TEXT_DOMAIN );?></label></div>
			</fieldset>
			<div style="clear:both;"></div>
			<div class="form-area"><a class="add_question button button-primary"><?php esc_html_e( 'Add New Question', WP_SAP_TEXT_DOMAIN );?></a></div>
			<div style="clear:both;"></div>
			<input type="hidden" name="survey_id" value="" />
		<div id="new_questions">
			<div class="group">
			<h3>1. <?php esc_html_e( 'question', WP_SAP_TEXT_DOMAIN );?></h3>
			<div class="one_question" id="question_section1">
				<div class="left_half">
					<div id="question_1">
						<p><?php esc_html_e( 'Question', WP_SAP_TEXT_DOMAIN );?>:&nbsp; <input type="text" name="question[]" id="question1" style="width: 75%;" class="question_text" onclick="if (this.value=='Was this information helpful?') this.value=''" value="Was this information helpful?" placeholder="Type your question here" /></p>
						<span>
						<p>1. <?php esc_html_e( 'answer', WP_SAP_TEXT_DOMAIN );?>: <input type="text" name="answer[]" class="answer" id="answer1" value="Yes" placeholder="yes" /><span id="answer_count1" class="answer_count">0 - 0%</span></p>
						<p>2. <?php esc_html_e( 'answer', WP_SAP_TEXT_DOMAIN );?>: <input type="text" name="answer[]" class="answer" id="answer2" value="No" placeholder="no" /><span id="answer_count2" class="answer_count">0 - 0%</span><a class="add_answer"><img class="wp_sap_tooltip" title="Add New Answer" src="<?php print(plugins_url( '/assets/img/add.svg' , __FILE__ ));?>"></a></p>
						</span>
					</div>
					</div>
					<div class="right_half">
					</div>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div class="survey-control-buttons">
			<br><span><input type="submit" name="delete_survey" class="delete_survey button" value="DELETE"></span><span><input type="submit" name="save_survey" class="save_survey button" value="SAVE"></span><span><input type="submit" name="reset_survey" class="reset_survey button" value="RESET"></span><span class="survey_error_span"></span>
		</div>
	</div>
	</div>
			<a id="add_new_survey"></a>
			<div id="wp_sap_accordion">
				<?php
				$surveys = $this->wpdb->get_results("SELECT * FROM ".$this->wpdb->prefix."wp_sap_surveys ORDER BY autoid DESC");
				foreach( $surveys as $sv ) {
					$options = json_decode(stripslashes( $sv->options ) );
					if ( $sv->global == 1 ) {
						$global_opt = "checked";
					}
					else {
						$global_opt = "";
					}
					if ( $options[ 13 ] == 1 ) {
						$opt_13 = "checked";
					}
					else {
						$opt_13 = "";
					}
					if ( $options[ 14 ] == 1 ) {
						$opt_14 = "checked";
					}
					else {
						$opt_14 = "";
					}
					if ( $options[ 15 ] == 1 ) {
						$opt_15 = "checked";
					}
					else {
						$opt_15 = "";
					}
					if ( $sv->start_time != '0000-00-00 00:00:00' ) {
						$thisstart_time = $this->get_date_datetime( $sv->start_time );
					}
					else {
						$thisstart_time = $sv->start_time;
					}
					if ( $sv->expiry_time != '0000-00-00 00:00:00' ) {
						$thisexpiry_time = $this->get_date_datetime( $sv->expiry_time );
					}
					else {
						$thisexpiry_time = $sv->expiry_time;
					}
				print('<h3 class="header_' . $sv->id . '">' . $sv->name . '</h3>
	  <div id="'.$sv->id.'"><div class="shortcode_section"><a href="#" data-helpid="help1" class="help-dialog wp_sap_survey_shortcode_button sshortcode button button-secondary">' . esc_html__( 'Survey Shortcode', WP_SAP_TEXT_DOMAIN ) . '</a><a href="#" data-helpid="help2" class="help-dialog wp_sap_survey_shortcode_button srshortcode button button-secondary">' . esc_html__( 'Survey Results Shortcode', WP_SAP_TEXT_DOMAIN ) . '</a><div class="inner-block" style="display: none;">Results: <input type="text" readonly="true" class="copytext" value="[wpsurveypoll_results id=&quot;'.$sv->id.'&quot;]"></div></div>
			<fieldset>
			<legend>Survey Options</legend>
			<div class="text">Start time: <input type="text" name="start_time" class="datepicker inputtext start_time wp_sap_tooltip" title="Leave it blank to activate the survey immediately" value="' . str_replace( "0000-00-00 00:00:00", "", $thisstart_time ) . '" /></div>
			<div class="text">Expiry time: <input type="text" name="expiry_time" class="datepicker inputtext expiry_time wp_sap_tooltip" title="Never expire the survey when you leave this blank" value="' . str_replace( "0000-00-00 00:00:00", "", $thisexpiry_time ) . '" /></div>
			<div class="text">Display style:
			<select name="display_style" class="display_style">
				<option ' . selected( $options[ 0 ], "bottom", false ).' value="bottom">Bottom</option>
				<option ' . selected( $options[ 0 ], "top", false ).' value="top">Top</option>
				<option ' . selected( $options[ 0 ], "center", false ).' value="center">Center</option>
			</select>
			</div> 
			<div class="text">Animation Easing:
			<select name="animation_easing" class="animation_easing">
							<option '.selected( $options[ 1 ], 'linear', false ).' value="linear">linear</option>
							<option '.selected( $options[ 1 ], 'swing', false ).' value="swing">swing</option>
							<option '.selected( $options[ 1 ], 'easeInQuad', false ).' value="easeInQuad">easeInQuad</option>
							<option '.selected( $options[ 1 ], 'easeOutQuad', false ).' value="easeOutQuad">easeOutQuad</option>
							<option '.selected( $options[ 1 ], 'easeInOutQuad', false ).' value="easeInOutQuad">easeInOutQuad</option>
							<option '.selected( $options[ 1 ], 'easeInCubic', false ).' value="easeInCubic">easeInCubic</option>
							<option '.selected( $options[ 1 ], 'easeOutCubic', false ).' value="easeOutCubic">easeOutCubic</option>
							<option '.selected( $options[ 1 ], 'easeInOutCubic', false ).' value="easeInOutCubic">easeInOutCubic</option>
							<option '.selected( $options[ 1 ], 'easeInQuart', false ).' value="easeInQuart">easeInQuart</option>
							<option '.selected( $options[ 1 ], 'easeOutQuart', false ).' value="easeOutQuart">easeOutQuart</option>
							<option '.selected( $options[ 1 ], 'easeInOutQuart', false ).' value="easeInOutQuart">easeInOutQuart</option>
							<option '.selected( $options[ 1 ], 'easeInQuint', false ).' value="easeInQuint">easeInQuint</option>
							<option '.selected( $options[ 1 ], 'easeOutQuint', false ).' value="easeOutQuint">easeOutQuint</option>
							<option '.selected( $options[ 1 ], 'boteaseInOutQuinttom' ).' value="easeInOutQuint">easeInOutQuint</option>
							<option '.selected( $options[ 1 ], 'easeInExpo', false ).' value="easeInExpo">easeInExpo</option>
							<option '.selected( $options[ 1 ], 'easeOutExpo', false ).' value="easeOutExpo">easeOutExpo</option>
							<option '.selected( $options[ 1 ], 'easeInOutExpo', false ).' value="easeInOutExpo">easeInOutExpo</option>
							<option '.selected( $options[ 1 ], 'easeInSine', false ).' value="easeInSine">easeInSine</option>
							<option '.selected( $options[ 1 ], 'easeOutSine', false ).' value="easeOutSine">easeOutSine</option>
							<option '.selected( $options[ 1 ], 'easeInOutSine', false ).' value="easeInOutSine">easeInOutSine</option>
							<option '.selected( $options[ 1 ], 'easeInCirc', false ).' value="easeInCirc">easeInCirc</option>
							<option '.selected( $options[ 1 ], 'easeOutCirc', false ).' value="easeOutCirc">easeOutCirc</option>
							<option '.selected( $options[ 1 ], 'easeInOutCirc', false ).' value="easeInOutCirc">easeInOutCirc</option>
							<option '.selected( $options[ 1 ], 'easeInElastic', false ).' value="easeInElastic">easeInElastic</option>
							<option '.selected( $options[ 1 ], 'easeOutElastic', false ).' value="easeOutElastic">easeOutElastic</option>
							<option '.selected( $options[ 1 ], 'easeInOutElastic', false ).' value="easeInOutElastic">easeInOutElastic</option>
							<option '.selected( $options[ 1 ], 'easeInBack', false ).' value="easeInBack">easeInBack</option>
							<option '.selected( $options[ 1 ], 'easeOutBack', false ).' value="easeOutBack">easeOutBack</option>
							<option '.selected( $options[ 1 ], 'easeInOutBack', false ).' value="easeInOutBack">easeInOutBack</option>
							<option '.selected( $options[ 1 ], 'easeInBounce', false ).' value="easeInBounce">easeInBounce</option>
							<option '.selected( $options[ 1 ], 'easeOutBounce', false ).' value="easeOutBounce">easeOutBounce</option>
							<option '.selected( $options[ 1 ], 'easeInOutBounce', false ).' value="easeInOutBounce">easeInOutBounce</option>
			</select>
			</div> 
			<div class="text">Font Family: <select name="font_family" class="font_family">
							<option '.selected( $options[2], '', false ).' value="">Default</option>
							<option '.selected( $options[2], 'ABeeZee', false ).' value="ABeeZee">ABeeZee</option>
							<option '.selected( $options[2], 'Abel', false ).' value="Abel">Abel</option>
							<option '.selected( $options[2], 'Abril Fatface', false ).' value="Abril Fatface">Abril Fatface</option>
							<option '.selected( $options[2], 'Aclonica', false ).' value="Aclonica">Aclonica</option>
							<option '.selected( $options[2], 'Acme', false ).' value="Acme">Acme</option>
							<option '.selected( $options[2], 'Actor', false ).' value="Actor">Actor</option>
							<option '.selected( $options[2], 'Adamina', false ).' value="Adamina">Adamina</option>
							<option '.selected( $options[2], 'Advent Pro', false ).' value="Advent Pro">Advent Pro</option>
							<option '.selected( $options[2], 'Aguafina Script', false ).' value="Aguafina Script">Aguafina Script</option>
							<option '.selected( $options[2], 'Akronim', false ).' value="Akronim">Akronim</option>
							<option '.selected( $options[2], 'Aladin', false ).' value="Aladin">Aladin</option>
							<option '.selected( $options[2], 'Aldrich', false ).' value="Aldrich">Aldrich</option>
							<option '.selected( $options[2], 'Alef', false ).' value="Alef">Alef</option>
							<option '.selected( $options[2], 'Alegreya', false ).' value="Alegreya">Alegreya</option>
							<option '.selected( $options[2], 'Alegreya SC', false ).' value="Alegreya SC">Alegreya SC</option>
							<option '.selected( $options[2], 'Alex Brush', false ).' value="Alex Brush">Alex Brush</option>
							<option '.selected( $options[2], 'Alfa Slab One', false ).' value="Alfa Slab One">Alfa Slab One</option>
							<option '.selected( $options[2], 'Alice', false ).' value="Alice">Alice</option>
							<option '.selected( $options[2], 'Alike', false ).' value="Alike">Alike</option>
							<option '.selected( $options[2], 'Alike Angular', false ).' value="Alike Angular">Alike Angular</option>
							<option '.selected( $options[2], 'Allan', false ).' value="Allan">Allan</option>
							<option '.selected( $options[2], 'Allerta', false ).' value="Allerta">Allerta</option>
							<option '.selected( $options[2], 'Allerta Stencil', false ).' value="Allerta Stencil">Allerta Stencil</option>
							<option '.selected( $options[2], 'Allura', false ).' value="Allura">Allura</option>
							<option '.selected( $options[2], 'Almendra', false ).' value="Almendra">Almendra</option>
							<option '.selected( $options[2], 'Almendra Display', false ).' value="Almendra Display">Almendra Display</option>
							<option '.selected( $options[2], 'Almendra SC', false ).' value="Almendra SC">Almendra SC</option>
							<option '.selected( $options[2], 'Amarante', false ).' value="Amarante">Amarante</option>
							<option '.selected( $options[2], 'Amaranth', false ).' value="Amaranth">Amaranth</option>
							<option '.selected( $options[2], 'Amatic SC', false ).' value="Amatic SC">Amatic SC</option>
							<option '.selected( $options[2], 'Amethysta', false ).' value="Amethysta">Amethysta</option>
							<option '.selected( $options[2], 'Anaheim', false ).' value="Anaheim">Anaheim</option>
							<option '.selected( $options[2], 'Andada', false ).' value="Andada">Andada</option>
							<option '.selected( $options[2], 'Andika', false ).' value="Andika">Andika</option>
							<option '.selected( $options[2], 'Angkor', false ).' value="Angkor">Angkor</option>
							<option '.selected( $options[2], 'Annie Use Your Telescope', false ).' value="Annie Use Your Telescope">Annie Use Your Telescope</option>
							<option '.selected( $options[2], 'Anonymous Pro', false ).' value="Anonymous Pro">Anonymous Pro</option>
							<option '.selected( $options[2], 'Antic', false ).' value="Antic">Antic</option>
							<option '.selected( $options[2], 'Antic Didone', false ).' value="Antic Didone">Antic Didone</option>
							<option '.selected( $options[2], 'Antic Slab', false ).' value="Antic Slab">Antic Slab</option>
							<option '.selected( $options[2], 'Anton', false ).' value="Anton">Anton</option>
							<option '.selected( $options[2], 'Arapey', false ).' value="Arapey">Arapey</option>
							<option '.selected( $options[2], 'Arbutus', false ).' value="Arbutus">Arbutus</option>
							<option '.selected( $options[2], 'Arbutus Slab', false ).' value="Arbutus Slab">Arbutus Slab</option>
							<option '.selected( $options[2], 'Architects Daughter', false ).' value="Architects Daughter">Architects Daughter</option>
							<option '.selected( $options[2], 'Archivo Black', false ).' value="Archivo Black">Archivo Black</option>
							<option '.selected( $options[2], 'Archivo Narrow', false ).' value="Archivo Narrow">Archivo Narrow</option>
							<option '.selected( $options[2], 'Arimo', false ).' value="Arimo">Arimo</option>
							<option '.selected( $options[2], 'Arizonia', false ).' value="Arizonia">Arizonia</option>
							<option '.selected( $options[2], 'Armata', false ).' value="Armata">Armata</option>
							<option '.selected( $options[2], 'Artifika', false ).' value="Artifika">Artifika</option>
							<option '.selected( $options[2], 'Arvo', false ).' value="Arvo">Arvo</option>
							<option '.selected( $options[2], 'Asap', false ).' value="Asap">Asap</option>
							<option '.selected( $options[2], 'Asset', false ).' value="Asset">Asset</option>
							<option '.selected( $options[2], 'Astloch', false ).' value="Astloch">Astloch</option>
							<option '.selected( $options[2], 'Asul', false ).' value="Asul">Asul</option>
							<option '.selected( $options[2], 'Atomic Age', false ).' value="Atomic Age">Atomic Age</option>
							<option '.selected( $options[2], 'Aubrey', false ).' value="Aubrey">Aubrey</option>
							<option '.selected( $options[2], 'Audiowide', false ).' value="Audiowide">Audiowide</option>
							<option '.selected( $options[2], 'Autour One', false ).' value="Autour One">Autour One</option>
							<option '.selected( $options[2], 'Average', false ).' value="Average">Average</option>
							<option '.selected( $options[2], 'Average Sans', false ).' value="Average Sans">Average Sans</option>
							<option '.selected( $options[2], 'Averia Gruesa Libre', false ).' value="Averia Gruesa Libre">Averia Gruesa Libre</option>
							<option '.selected( $options[2], 'Averia Libre', false ).' value="Averia Libre">Averia Libre</option>
							<option '.selected( $options[2], 'Averia Sans Libre', false ).' value="Averia Sans Libre">Averia Sans Libre</option>
							<option '.selected( $options[2], 'Averia Serif Libre', false ).' value="Averia Serif Libre">Averia Serif Libre</option>
							<option '.selected( $options[2], 'Bad Script', false ).' value="Bad Script">Bad Script</option>
							<option '.selected( $options[2], 'Balthazar', false ).' value="Balthazar">Balthazar</option>
							<option '.selected( $options[2], 'Bangers', false ).' value="Bangers">Bangers</option>
							<option '.selected( $options[2], 'Basic', false ).' value="Basic">Basic</option>
							<option '.selected( $options[2], 'Battambang', false ).' value="Battambang">Battambang</option>
							<option '.selected( $options[2], 'Baumans', false ).' value="Baumans">Baumans</option>
							<option '.selected( $options[2], 'Bayon', false ).' value="Bayon">Bayon</option>
							<option '.selected( $options[2], 'Belgrano', false ).' value="Belgrano">Belgrano</option>
							<option '.selected( $options[2], 'Belleza', false ).' value="Belleza">Belleza</option>
							<option '.selected( $options[2], 'BenchNine', false ).' value="BenchNine">BenchNine</option>
							<option '.selected( $options[2], 'Bentham', false ).' value="Bentham">Bentham</option>
							<option '.selected( $options[2], 'Berkshire Swash', false ).' value="Berkshire Swash">Berkshire Swash</option>
							<option '.selected( $options[2], 'Bevan', false ).' value="Bevan">Bevan</option>
							<option '.selected( $options[2], 'Bigelow Rules', false ).' value="Bigelow Rules">Bigelow Rules</option>
							<option '.selected( $options[2], 'Bigshot One', false ).' value="Bigshot One">Bigshot One</option>
							<option '.selected( $options[2], 'Bilbo', false ).' value="Bilbo">Bilbo</option>
							<option '.selected( $options[2], 'Bilbo Swash Caps', false ).' value="Bilbo Swash Caps">Bilbo Swash Caps</option>
							<option '.selected( $options[2], 'Bitter', false ).' value="Bitter">Bitter</option>
							<option '.selected( $options[2], 'Black Ops One', false ).' value="Black Ops One">Black Ops One</option>
							<option '.selected( $options[2], 'Bokor', false ).' value="Bokor">Bokor</option>
							<option '.selected( $options[2], 'Bonbon', false ).' value="Bonbon">Bonbon</option>
							<option '.selected( $options[2], 'Boogaloo', false ).' value="Boogaloo">Boogaloo</option>
							<option '.selected( $options[2], 'Bowlby One', false ).' value="Bowlby One">Bowlby One</option>
							<option '.selected( $options[2], 'Bowlby One SC', false ).' value="Bowlby One SC">Bowlby One SC</option>
							<option '.selected( $options[2], 'Brawler', false ).' value="Brawler">Brawler</option>
							<option '.selected( $options[2], 'Bree Serif', false ).' value="Bree Serif">Bree Serif</option>
							<option '.selected( $options[2], 'Bubblegum Sans', false ).' value="Bubblegum Sans">Bubblegum Sans</option>
							<option '.selected( $options[2], 'Bubbler One', false ).' value="Bubbler One">Bubbler One</option>
							<option '.selected( $options[2], 'Buenard', false ).' value="Buenard">Buenard</option>
							<option '.selected( $options[2], 'Butcherman', false ).' value="Butcherman">Butcherman</option>
							<option '.selected( $options[2], 'Butterfly Kids', false ).' value="Butterfly Kids">Butterfly Kids</option>
							<option '.selected( $options[2], 'Cabin', false ).' value="Cabin">Cabin</option>
							<option '.selected( $options[2], 'Cabin Condensed', false ).' value="Cabin Condensed">Cabin Condensed</option>
							<option '.selected( $options[2], 'Cabin Sketch', false ).' value="Cabin Sketch">Cabin Sketch</option>
							<option '.selected( $options[2], 'Caesar Dressing', false ).' value="Caesar Dressing">Caesar Dressing</option>
							<option '.selected( $options[2], 'Cagliostro', false ).' value="Cagliostro">Cagliostro</option>
							<option '.selected( $options[2], 'Calligraffitti', false ).' value="Calligraffitti">Calligraffitti</option>
							<option '.selected( $options[2], 'ABeeCamboZee', false ).' value="Cambo">Cambo</option>
							<option '.selected( $options[2], 'Candal', false ).' value="Candal">Candal</option>
							<option '.selected( $options[2], 'Cantarell', false ).' value="Cantarell">Cantarell</option>
							<option '.selected( $options[2], 'Cantata One', false ).' value="Cantata One">Cantata One</option>
							<option '.selected( $options[2], 'Cantora One', false ).' value="Cantora One">Cantora One</option>
							<option '.selected( $options[2], 'Capriola', false ).' value="Capriola">Capriola</option>
							<option '.selected( $options[2], 'Cardo', false ).' value="Cardo">Cardo</option>
							<option '.selected( $options[2], 'Carme', false ).' value="Carme">Carme</option>
							<option '.selected( $options[2], 'Carrois Gothic', false ).' value="Carrois Gothic">Carrois Gothic</option>
							<option '.selected( $options[2], 'Carrois Gothic SC', false ).' value="Carrois Gothic SC">Carrois Gothic SC</option>
							<option '.selected( $options[2], 'Carter One', false ).' value="Carter One">Carter One</option>
							<option '.selected( $options[2], 'Caudex', false ).' value="Caudex">Caudex</option>
							<option '.selected( $options[2], 'Cedarville Cursive', false ).' value="Cedarville Cursive">Cedarville Cursive</option>
							<option '.selected( $options[2], 'Ceviche One', false ).' value="Ceviche One">Ceviche One</option>
							<option '.selected( $options[2], 'Changa One', false ).' value="Changa One">Changa One</option>
							<option '.selected( $options[2], 'Chango', false ).' value="Chango">Chango</option>
							<option '.selected( $options[2], 'Chau Philomene One', false ).' value="Chau Philomene One">Chau Philomene One</option>
							<option '.selected( $options[2], 'Chela One', false ).' value="Chela One">Chela One</option>
							<option '.selected( $options[2], 'Chelsea Market', false ).' value="Chelsea Market">Chelsea Market</option>
							<option '.selected( $options[2], 'Chenla', false ).' value="Chenla">Chenla</option>
							<option '.selected( $options[2], 'Cherry Cream Soda', false ).' value="Cherry Cream Soda">Cherry Cream Soda</option>
							<option '.selected( $options[2], 'Cherry Swash', false ).' value="Cherry Swash">Cherry Swash</option>
							<option '.selected( $options[2], 'Chewy', false ).' value="Chewy">Chewy</option>
							<option '.selected( $options[2], 'Chicle', false ).' value="Chicle">Chicle</option>
							<option '.selected( $options[2], 'Chivo', false ).' value="Chivo">Chivo</option>
							<option '.selected( $options[2], 'Cinzel', false ).' value="Cinzel">Cinzel</option>
							<option '.selected( $options[2], 'Cinzel Decorative', false ).' value="Cinzel Decorative">Cinzel Decorative</option>
							<option '.selected( $options[2], 'Clicker Script', false ).' value="Clicker Script">Clicker Script</option>
							<option '.selected( $options[2], 'Coda', false ).' value="Coda">Coda</option>
							<option '.selected( $options[2], 'Coda Caption:800', false ).' value="Coda Caption:800">Coda Caption</option>
							<option '.selected( $options[2], 'Codystar', false ).' value="Codystar">Codystar</option>
							<option '.selected( $options[2], 'Combo', false ).' value="Combo">Combo</option>
							<option '.selected( $options[2], 'Comfortaa', false ).' value="Comfortaa">Comfortaa</option>
							<option '.selected( $options[2], 'Coming Soon', false ).' value="Coming Soon">Coming Soon</option>
							<option '.selected( $options[2], 'Concert One', false ).' value="Concert One">Concert One</option>
							<option '.selected( $options[2], 'Condiment', false ).' value="Condiment">Condiment</option>
							<option '.selected( $options[2], 'Content', false ).' value="Content">Content</option>
							<option '.selected( $options[2], 'Contrail One', false ).' value="Contrail One">Contrail One</option>
							<option '.selected( $options[2], 'Convergence', false ).' value="Convergence">Convergence</option>
							<option '.selected( $options[2], 'Cookie', false ).' value="Cookie">Cookie</option>
							<option '.selected( $options[2], 'Copse', false ).' value="Copse">Copse</option>
							<option '.selected( $options[2], 'Corben', false ).' value="Corben">Corben</option>
							<option '.selected( $options[2], 'Courgette', false ).' value="Courgette">Courgette</option>
							<option '.selected( $options[2], 'Cousine', false ).' value="Cousine">Cousine</option>
							<option '.selected( $options[2], 'Coustard', false ).' value="Coustard">Coustard</option>
							<option '.selected( $options[2], 'Covered By Your Grace', false ).' value="Covered By Your Grace">Covered By Your Grace</option>
							<option '.selected( $options[2], 'Crafty Girls', false ).' value="Crafty Girls">Crafty Girls</option>
							<option '.selected( $options[2], 'Creepster', false ).' value="Creepster">Creepster</option>
							<option '.selected( $options[2], 'Crete Round', false ).' value="Crete Round">Crete Round</option>
							<option '.selected( $options[2], 'Crimson Text', false ).' value="Crimson Text">Crimson Text</option>
							<option '.selected( $options[2], 'Croissant One', false ).' value="Croissant One">Croissant One</option>
							<option '.selected( $options[2], 'Crushed', false ).' value="Crushed">Crushed</option>
							<option '.selected( $options[2], 'Cuprum', false ).' value="Cuprum">Cuprum</option>
							<option '.selected( $options[2], 'Cutive', false ).' value="Cutive">Cutive</option>
							<option '.selected( $options[2], 'Cutive Mono', false ).' value="Cutive Mono">Cutive Mono</option>
							<option '.selected( $options[2], 'Damion', false ).' value="Damion">Damion</option>
							<option '.selected( $options[2], 'Dancing Script', false ).' value="Dancing Script">Dancing Script</option>
							<option '.selected( $options[2], 'Dangrek', false ).' value="Dangrek">Dangrek</option>
							<option '.selected( $options[2], 'Dawning of a New Day', false ).' value="Dawning of a New Day">Dawning of a New Day</option>
							<option '.selected( $options[2], 'Days One', false ).' value="Days One">Days One</option>
							<option '.selected( $options[2], 'Delius', false ).' value="Delius">Delius</option>
							<option '.selected( $options[2], 'Delius Swash Caps', false ).' value="Delius Swash Caps">Delius Swash Caps</option>
							<option '.selected( $options[2], 'Delius Unicase', false ).' value="Delius Unicase">Delius Unicase</option>
							<option '.selected( $options[2], 'Della Respira', false ).' value="Della Respira">Della Respira</option>
							<option '.selected( $options[2], 'Denk One', false ).' value="Denk One">Denk One</option>
							<option '.selected( $options[2], 'Devonshire', false ).' value="Devonshire">Devonshire</option>
							<option '.selected( $options[2], 'Didact Gothic', false ).' value="Didact Gothic">Didact Gothic</option>
							<option '.selected( $options[2], 'Diplomata', false ).' value="Diplomata">Diplomata</option>
							<option '.selected( $options[2], 'Diplomata SC', false ).' value="Diplomata SC">Diplomata SC</option>
							<option '.selected( $options[2], 'Domine', false ).' value="Domine">Domine</option>
							<option '.selected( $options[2], 'Donegal One', false ).' value="Donegal One">Donegal One</option>
							<option '.selected( $options[2], 'Doppio One', false ).' value="Doppio One">Doppio One</option>
							<option '.selected( $options[2], 'Dorsa', false ).' value="Dorsa">Dorsa</option>
							<option '.selected( $options[2], 'Dosis', false ).' value="Dosis">Dosis</option>
							<option '.selected( $options[2], 'Dr Sugiyama', false ).' value="Dr Sugiyama">Dr Sugiyama</option>
							<option '.selected( $options[2], 'Droid Sans', false ).' value="Droid Sans">Droid Sans</option>
							<option '.selected( $options[2], 'Droid Sans Mono', false ).' value="Droid Sans Mono">Droid Sans Mono</option>
							<option '.selected( $options[2], 'Droid Serif', false ).' value="Droid Serif">Droid Serif</option>
							<option '.selected( $options[2], 'Duru Sans', false ).' value="Duru Sans">Duru Sans</option>
							<option '.selected( $options[2], 'Dynalight', false ).' value="Dynalight">Dynalight</option>
							<option '.selected( $options[2], 'Eagle Lake', false ).' value="Eagle Lake">Eagle Lake</option>
							<option '.selected( $options[2], 'Eater', false ).' value="Eater">Eater</option>
							<option '.selected( $options[2], 'EB Garamond', false ).' value="EB Garamond">EB Garamond</option>
							<option '.selected( $options[2], 'Economica', false ).' value="Economica">Economica</option>
							<option '.selected( $options[2], 'Electrolize', false ).' value="Electrolize">Electrolize</option>
							<option '.selected( $options[2], 'Elsie', false ).' value="Elsie">Elsie</option>
							<option '.selected( $options[2], 'Elsie Swash Caps', false ).' value="Elsie Swash Caps">Elsie Swash Caps</option>
							<option '.selected( $options[2], 'Emblema One', false ).' value="Emblema One">Emblema One</option>
							<option '.selected( $options[2], 'Emilys Candy', false ).' value="Emilys Candy">Emilys Candy</option>
							<option '.selected( $options[2], 'Engagement', false ).' value="Engagement">Engagement</option>
							<option '.selected( $options[2], 'Englebert', false ).' value="Englebert">Englebert</option>
							<option '.selected( $options[2], 'Enriqueta', false ).' value="Enriqueta">Enriqueta</option>
							<option '.selected( $options[2], 'Erica One', false ).' value="Erica One">Erica One</option>
							<option '.selected( $options[2], 'Esteban', false ).' value="Esteban">Esteban</option>
							<option '.selected( $options[2], 'Euphoria Script', false ).' value="Euphoria Script">Euphoria Script</option>
							<option '.selected( $options[2], 'Ewert', false ).' value="Ewert">Ewert</option>
							<option '.selected( $options[2], 'Exo', false ).' value="Exo">Exo</option>
							<option '.selected( $options[2], 'Expletus Sans', false ).' value="Expletus Sans">Expletus Sans</option>
							<option '.selected( $options[2], 'Fanwood Text', false ).' value="Fanwood Text">Fanwood Text</option>
							<option '.selected( $options[2], 'Fascinate', false ).' value="Fascinate">Fascinate</option>
							<option '.selected( $options[2], 'Fascinate Inline', false ).' value="Fascinate Inline">Fascinate Inline</option>
							<option '.selected( $options[2], 'Faster One', false ).' value="Faster One">Faster One</option>
							<option '.selected( $options[2], 'Fasthand', false ).' value="Fasthand">Fasthand</option>
							<option '.selected( $options[2], 'Fauna One', false ).' value="Fauna One">Fauna One</option>
							<option '.selected( $options[2], 'Federant', false ).' value="Federant">Federant</option>
							<option '.selected( $options[2], 'Federo', false ).' value="Federo">Federo</option>
							<option '.selected( $options[2], 'Felipa', false ).' value="Felipa">Felipa</option>
							<option '.selected( $options[2], 'Fenix', false ).' value="Fenix">Fenix</option>
							<option '.selected( $options[2], 'Finger Paint', false ).' value="Finger Paint">Finger Paint</option>
							<option '.selected( $options[2], 'Fjalla One', false ).' value="Fjalla One">Fjalla One</option>
							<option '.selected( $options[2], 'Fjord One', false ).' value="Fjord One">Fjord One</option>
							<option '.selected( $options[2], 'Flamenco', false ).' value="Flamenco">Flamenco</option>
							<option '.selected( $options[2], 'Flavors', false ).' value="Flavors">Flavors</option>
							<option '.selected( $options[2], 'Fondamento', false ).' value="Fondamento">Fondamento</option>
							<option '.selected( $options[2], 'Fontdiner Swanky', false ).' value="Fontdiner Swanky">Fontdiner Swanky</option>
							<option '.selected( $options[2], 'Forum', false ).' value="Forum">Forum</option>
							<option '.selected( $options[2], 'Francois One', false ).' value="Francois One">Francois One</option>
							<option '.selected( $options[2], 'Freckle Face', false ).' value="Freckle Face">Freckle Face</option>
							<option '.selected( $options[2], 'Fredericka the Great', false ).' value="Fredericka the Great">Fredericka the Great</option>
							<option '.selected( $options[2], 'Fredoka One', false ).' value="Fredoka One">Fredoka One</option>
							<option '.selected( $options[2], 'Freehand', false ).' value="Freehand">Freehand</option>
							<option '.selected( $options[2], 'Fresca', false ).' value="Fresca">Fresca</option>
							<option '.selected( $options[2], 'Frijole', false ).' value="Frijole">Frijole</option>
							<option '.selected( $options[2], 'Fruktur', false ).' value="Fruktur">Fruktur</option>
							<option '.selected( $options[2], 'Fugaz One', false ).' value="Fugaz One">Fugaz One</option>
							<option '.selected( $options[2], 'Gabriela', false ).' value="Gabriela">Gabriela</option>
							<option '.selected( $options[2], 'Gafata', false ).' value="Gafata">Gafata</option>
							<option '.selected( $options[2], 'Galdeano', false ).' value="Galdeano">Galdeano</option>
							<option '.selected( $options[2], 'Galindo', false ).' value="Galindo">Galindo</option>
							<option '.selected( $options[2], 'Gentium Basic', false ).' value="Gentium Basic">Gentium Basic</option>
							<option '.selected( $options[2], 'Gentium Book Basic', false ).' value="Gentium Book Basic">Gentium Book Basic</option>
							<option '.selected( $options[2], 'Geo', false ).' value="Geo">Geo</option>
							<option '.selected( $options[2], 'Geostar', false ).' value="Geostar">Geostar</option>
							<option '.selected( $options[2], 'Geostar Fill', false ).' value="Geostar Fill">Geostar Fill</option>
							<option '.selected( $options[2], 'Germania One', false ).' value="Germania One">Germania One</option>
							<option '.selected( $options[2], 'GFS Didot', false ).' value="GFS Didot">GFS Didot</option>
							<option '.selected( $options[2], 'GFS Neohellenic', false ).' value="GFS Neohellenic">GFS Neohellenic</option>
							<option '.selected( $options[2], 'GFS Neohellenic', false ).' value="c">Gilda Display</option>
							<option '.selected( $options[2], 'Give You Glory', false ).' value="Give You Glory">Give You Glory</option>
							<option '.selected( $options[2], 'Glass Antiqua', false ).' value="Glass Antiqua">Glass Antiqua</option>
							<option '.selected( $options[2], 'Glegoo', false ).' value="Glegoo">Glegoo</option>
							<option '.selected( $options[2], 'Gloria Hallelujah', false ).' value="Gloria Hallelujah">Gloria Hallelujah</option>
							<option '.selected( $options[2], 'Goblin One', false ).' value="Goblin One">Goblin One</option>
							<option '.selected( $options[2], 'Gochi Hand', false ).' value="Gochi Hand">Gochi Hand</option>
							<option '.selected( $options[2], 'Gorditas', false ).' value="Gorditas">Gorditas</option>
							<option '.selected( $options[2], 'Goudy Bookletter 1911', false ).' value="Goudy Bookletter 1911">Goudy Bookletter 1911</option>
							<option '.selected( $options[2], 'Graduate', false ).' value="Graduate">Graduate</option>
							<option '.selected( $options[2], 'Grand Hotel', false ).' value="Grand Hotel">Grand Hotel</option>
							<option '.selected( $options[2], 'Gravitas One', false ).' value="Gravitas One">Gravitas One</option>
							<option '.selected( $options[2], 'Great Vibes', false ).' value="Great Vibes">Great Vibes</option>
							<option '.selected( $options[2], 'Griffy', false ).' value="Griffy">Griffy</option>
							<option '.selected( $options[2], 'Gruppo', false ).' value="Gruppo">Gruppo</option>
							<option '.selected( $options[2], 'Gudea', false ).' value="Gudea">Gudea</option>
							<option '.selected( $options[2], 'Habibi', false ).' value="Habibi">Habibi</option>
							<option '.selected( $options[2], 'Hammersmith One', false ).' value="Hammersmith One">Hammersmith One</option>
							<option '.selected( $options[2], 'Hanalei', false ).' value="Hanalei">Hanalei</option>
							<option '.selected( $options[2], 'Hanalei Fill', false ).' value="Hanalei Fill">Hanalei Fill</option>
							<option '.selected( $options[2], 'Handlee', false ).' value="Handlee">Handlee</option>
							<option '.selected( $options[2], 'Hanuman', false ).' value="Hanuman">Hanuman</option>
							<option '.selected( $options[2], 'Happy Monkey', false ).' value="Happy Monkey">Happy Monkey</option>
							<option '.selected( $options[2], 'Headland One', false ).' value="Headland One">Headland One</option>
							<option '.selected( $options[2], 'Henny Penny', false ).' value="Henny Penny">Henny Penny</option>
							<option '.selected( $options[2], 'Herr Von Muellerhoff', false ).' value="Herr Von Muellerhoff">Herr Von Muellerhoff</option>
							<option '.selected( $options[2], 'Holtwood One SC', false ).' value="Holtwood One SC">Holtwood One SC</option>
							<option '.selected( $options[2], 'Homemade Apple', false ).' value="Homemade Apple">Homemade Apple</option>
							<option '.selected( $options[2], 'Homenaje', false ).' value="Homenaje">Homenaje</option>
							<option '.selected( $options[2], 'Iceberg', false ).' value="Iceberg">Iceberg</option>
							<option '.selected( $options[2], 'Iceland', false ).' value="Iceland">Iceland</option>
							<option '.selected( $options[2], 'IM Fell Double Pica', false ).' value="IM Fell Double Pica">IM Fell Double Pica</option>
							<option '.selected( $options[2], 'IM Fell Double Pica SC', false ).' value="IM Fell Double Pica SC">IM Fell Double Pica SC</option>
							<option '.selected( $options[2], 'IM Fell DW Pica', false ).' value="IM Fell DW Pica">IM Fell DW Pica</option>
							<option '.selected( $options[2], 'IM Fell DW Pica SC', false ).' value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
							<option '.selected( $options[2], 'IM Fell English', false ).' value="IM Fell English">IM Fell English</option>
							<option '.selected( $options[2], 'IM Fell English SC', false ).' value="IM Fell English SC">IM Fell English SC</option>
							<option '.selected( $options[2], 'IM Fell French Canon', false ).' value="IM Fell French Canon">IM Fell French Canon</option>
							<option '.selected( $options[2], 'IM Fell French Canon SC', false ).' value="IM Fell French Canon SC">IM Fell French Canon SC</option>
							<option '.selected( $options[2], 'IM Fell Great Primer', false ).' value="IM Fell Great Primer">IM Fell Great Primer</option>
							<option '.selected( $options[2], 'IM Fell Great Primer SC', false ).' value="IM Fell Great Primer SC">IM Fell Great Primer SC</option>
							<option '.selected( $options[2], 'Imprima', false ).' value="Imprima">Imprima</option>
							<option '.selected( $options[2], 'Inconsolata', false ).' value="Inconsolata">Inconsolata</option>
							<option '.selected( $options[2], 'Inder', false ).' value="Inder">Inder</option>
							<option '.selected( $options[2], 'Indie Flower', false ).' value="Indie Flower">Indie Flower</option>
							<option '.selected( $options[2], 'Inika', false ).' value="Inika">Inika</option>
							<option '.selected( $options[2], 'Irish Grover', false ).' value="Irish Grover">Irish Grover</option>
							<option '.selected( $options[2], 'Istok Web', false ).' value="Istok Web">Istok Web</option>
							<option '.selected( $options[2], 'Italiana', false ).' value="Italiana">Italiana</option>
							<option '.selected( $options[2], 'Italianno', false ).' value="Italianno">Italianno</option>
							<option '.selected( $options[2], 'Jacques Francois', false ).' value="Jacques Francois">Jacques Francois</option>
							<option '.selected( $options[2], 'Jacques Francois Shadow', false ).' value="Jacques Francois Shadow">Jacques Francois Shadow</option>
							<option '.selected( $options[2], 'Jim Nightshade', false ).' value="Jim Nightshade">Jim Nightshade</option>
							<option '.selected( $options[2], 'Jockey One', false ).' value="Jockey One">Jockey One</option>
							<option '.selected( $options[2], 'Jolly Lodger', false ).' value="Jolly Lodger">Jolly Lodger</option>
							<option '.selected( $options[2], 'Josefin Sans', false ).' value="Josefin Sans">Josefin Sans</option>
							<option '.selected( $options[2], 'Josefin Slab', false ).' value="Josefin Slab">Josefin Slab</option>
							<option '.selected( $options[2], 'Joti One', false ).' value="Joti One">Joti One</option>
							<option '.selected( $options[2], 'Judson', false ).' value="Judson">Judson</option>
							<option '.selected( $options[2], 'Julee', false ).' value="Julee">Julee</option>
							<option '.selected( $options[2], 'Julius Sans One', false ).' value="Julius Sans One">Julius Sans One</option>
							<option '.selected( $options[2], 'Junge', false ).' value="Junge">Junge</option>
							<option '.selected( $options[2], 'Jura', false ).' value="Jura">Jura</option>
							<option '.selected( $options[2], 'Just Another Hand', false ).' value="Just Another Hand">Just Another Hand</option>
							<option '.selected( $options[2], 'Just Me Again Down Here', false ).' value="Just Me Again Down Here">Just Me Again Down Here</option>
							<option '.selected( $options[2], 'Kameron', false ).' value="Kameron">Kameron</option>
							<option '.selected( $options[2], 'Karla', false ).' value="Karla">Karla</option>
							<option '.selected( $options[2], 'Kaushan Script', false ).' value="Kaushan Script">Kaushan Script</option>
							<option '.selected( $options[2], 'Kavoon', false ).' value="Kavoon">Kavoon</option>
							<option '.selected( $options[2], 'Keania One', false ).' value="Keania One">Keania One</option>
							<option '.selected( $options[2], 'Kelly Slab', false ).' value="Kelly Slab">Kelly Slab</option>
							<option '.selected( $options[2], 'Kenia', false ).' value="Kenia">Kenia</option>
							<option '.selected( $options[2], 'Khmer', false ).' value="Khmer">Khmer</option>
							<option '.selected( $options[2], 'Khmer', false ).' value="c">Kite One</option>
							<option '.selected( $options[2], 'Knewave', false ).' value="Knewave">Knewave</option>
							<option '.selected( $options[2], 'Kotta One', false ).' value="Kotta One">Kotta One</option>
							<option '.selected( $options[2], 'Koulen', false ).' value="Koulen">Koulen</option>
							<option '.selected( $options[2], 'Kranky', false ).' value="Kranky">Kranky</option>
							<option '.selected( $options[2], 'Kreon', false ).' value="Kreon">Kreon</option>
							<option '.selected( $options[2], 'Kristi', false ).' value="Kristi">Kristi</option>
							<option '.selected( $options[2], 'Krona One', false ).' value="Krona One">Krona One</option>
							<option '.selected( $options[2], 'La Belle Aurore', false ).' value="La Belle Aurore">La Belle Aurore</option>
							<option '.selected( $options[2], 'Lancelot', false ).' value="Lancelot">Lancelot</option>
							<option '.selected( $options[2], 'Lato', false ).' value="Lato">Lato</option>
							<option '.selected( $options[2], 'League Script', false ).' value="League Script">League Script</option>
							<option '.selected( $options[2], 'Leckerli One', false ).' value="Leckerli One">Leckerli One</option>
							<option '.selected( $options[2], 'Ledger', false ).' value="Ledger">Ledger</option>
							<option '.selected( $options[2], 'Lekton', false ).' value="Lekton">Lekton</option>
							<option '.selected( $options[2], 'Lemon', false ).' value="Lemon">Lemon</option>
							<option '.selected( $options[2], 'Libre Baskerville', false ).' value="Libre Baskerville">Libre Baskerville</option>
							<option '.selected( $options[2], 'Life Savers', false ).' value="Life Savers">Life Savers</option>
							<option '.selected( $options[2], 'Lilita One', false ).' value="Lilita One">Lilita One</option>
							<option '.selected( $options[2], 'Lily Script One', false ).' value="Lily Script One">Lily Script One</option>
							<option '.selected( $options[2], 'Limelight', false ).' value="Limelight">Limelight</option>
							<option '.selected( $options[2], 'Linden Hill', false ).' value="Linden Hill">Linden Hill</option>
							<option '.selected( $options[2], 'Lobster', false ).' value="Lobster">Lobster</option>
							<option '.selected( $options[2], 'Lobster Two', false ).' value="Lobster Two">Lobster Two</option>
							<option '.selected( $options[2], 'Londrina Outline', false ).' value="Londrina Outline">Londrina Outline</option>
							<option '.selected( $options[2], 'Londrina Shadow', false ).' value="Londrina Shadow">Londrina Shadow</option>
							<option '.selected( $options[2], 'Londrina Sketch', false ).' value="Londrina Sketch">Londrina Sketch</option>
							<option '.selected( $options[2], 'Londrina Solid', false ).' value="Londrina Solid">Londrina Solid</option>
							<option '.selected( $options[2], 'Lora', false ).' value="Lora">Lora</option>
							<option '.selected( $options[2], 'Love Ya Like A Sister', false ).' value="Love Ya Like A Sister">Love Ya Like A Sister</option>
							<option '.selected( $options[2], 'Loved by the King', false ).' value="Loved by the King">Loved by the King</option>
							<option '.selected( $options[2], 'Lovers Quarrel', false ).' value="Lovers Quarrel">Lovers Quarrel</option>
							<option '.selected( $options[2], 'Luckiest Guy', false ).' value="Luckiest Guy">Luckiest Guy</option>
							<option '.selected( $options[2], 'Lusitana', false ).' value="Lusitana">Lusitana</option>
							<option '.selected( $options[2], 'Lustria', false ).' value="Lustria">Lustria</option>
							<option '.selected( $options[2], 'Macondo', false ).' value="Macondo">Macondo</option>
							<option '.selected( $options[2], 'Macondo Swash Caps', false ).' value="Macondo Swash Caps">Macondo Swash Caps</option>
							<option '.selected( $options[2], 'ABeeMagraZee', false ).' value="Magra">Magra</option>
							<option '.selected( $options[2], 'Maiden Orange', false ).' value="Maiden Orange">Maiden Orange</option>
							<option '.selected( $options[2], 'Mako', false ).' value="Mako">Mako</option>
							<option '.selected( $options[2], 'Marcellus', false ).' value="Marcellus">Marcellus</option>
							<option '.selected( $options[2], 'Marcellus SC', false ).' value="Marcellus SC">Marcellus SC</option>
							<option '.selected( $options[2], 'Marck Script', false ).' value="Marck Script">Marck Script</option>
							<option '.selected( $options[2], 'Margarine', false ).' value="Margarine">Margarine</option>
							<option '.selected( $options[2], 'Marko One', false ).' value="Marko One">Marko One</option>
							<option '.selected( $options[2], 'Marmelad', false ).' value="Marmelad">Marmelad</option>
							<option '.selected( $options[2], 'Marvel', false ).' value="Marvel">Marvel</option>
							<option '.selected( $options[2], 'Mate', false ).' value="Mate">Mate</option>
							<option '.selected( $options[2], 'Mate SC', false ).' value="Mate SC">Mate SC</option>
							<option '.selected( $options[2], 'Maven Pro', false ).' value="Maven Pro">Maven Pro</option>
							<option '.selected( $options[2], 'McLaren', false ).' value="McLaren">McLaren</option>
							<option '.selected( $options[2], 'Meddon', false ).' value="Meddon">Meddon</option>
							<option '.selected( $options[2], 'MedievalSharp', false ).' value="MedievalSharp">MedievalSharp</option>
							<option '.selected( $options[2], 'Medula One', false ).' value="Medula One">Medula One</option>
							<option '.selected( $options[2], 'Megrim', false ).' value="Megrim">Megrim</option>
							<option '.selected( $options[2], 'Meie Script', false ).' value="Meie Script">Meie Script</option>
							<option '.selected( $options[2], 'Merienda', false ).' value="Merienda">Merienda</option>
							<option '.selected( $options[2], 'Merienda One', false ).' value="Merienda One">Merienda One</option>
							<option '.selected( $options[2], 'Merriweather', false ).' value="Merriweather">Merriweather</option>
							<option '.selected( $options[2], 'Merriweather Sans', false ).' value="Merriweather Sans">Merriweather Sans</option>
							<option '.selected( $options[2], 'Metal', false ).' value="Metal">Metal</option>
							<option '.selected( $options[2], 'Metal Mania', false ).' value="Metal Mania">Metal Mania</option>
							<option '.selected( $options[2], 'Metamorphous', false ).' value="Metamorphous">Metamorphous</option>
							<option '.selected( $options[2], 'Metrophobic', false ).' value="Metrophobic">Metrophobic</option>
							<option '.selected( $options[2], 'Michroma', false ).' value="Michroma">Michroma</option>
							<option '.selected( $options[2], 'Milonga', false ).' value="Milonga">Milonga</option>
							<option '.selected( $options[2], 'Miltonian', false ).' value="Miltonian">Miltonian</option>
							<option '.selected( $options[2], 'Miltonian Tattoo', false ).' value="Miltonian Tattoo">Miltonian Tattoo</option>
							<option '.selected( $options[2], 'Miniver', false ).' value="Miniver">Miniver</option>
							<option '.selected( $options[2], 'Miss Fajardose', false ).' value="Miss Fajardose">Miss Fajardose</option>
							<option '.selected( $options[2], 'Modern Antiqua', false ).' value="Modern Antiqua">Modern Antiqua</option>
							<option '.selected( $options[2], 'Molengo', false ).' value="Molengo">Molengo</option>
							<option '.selected( $options[2], 'Molle:400italic', false ).' value="Molle:400italic">Molle</option>
							<option '.selected( $options[2], 'Monda', false ).' value="Monda">Monda</option>
							<option '.selected( $options[2], 'Monofett', false ).' value="Monofett">Monofett</option>
							<option '.selected( $options[2], 'Monoton', false ).' value="Monoton">Monoton</option>
							<option '.selected( $options[2], 'Monsieur La Doulaise', false ).' value="Monsieur La Doulaise">Monsieur La Doulaise</option>
							<option '.selected( $options[2], 'Montaga', false ).' value="Montaga">Montaga</option>
							<option '.selected( $options[2], 'Montez', false ).' value="Montez">Montez</option>
							<option '.selected( $options[2], 'Montserrat', false ).' value="Montserrat">Montserrat</option>
							<option '.selected( $options[2], 'Montserrat Alternates', false ).' value="Montserrat Alternates">Montserrat Alternates</option>
							<option '.selected( $options[2], 'Montserrat Subrayada', false ).' value="Montserrat Subrayada">Montserrat Subrayada</option>
							<option '.selected( $options[2], 'Moul', false ).' value="Moul">Moul</option>
							<option '.selected( $options[2], 'Moulpali', false ).' value="Moulpali">Moulpali</option>
							<option '.selected( $options[2], 'Mountains of Christmas', false ).' value="Mountains of Christmas">Mountains of Christmas</option>
							<option '.selected( $options[2], 'Mouse Memoirs', false ).' value="Mouse Memoirs">Mouse Memoirs</option>
							<option '.selected( $options[2], 'Mr Bedfort', false ).' value="Mr Bedfort">Mr Bedfort</option>
							<option '.selected( $options[2], 'Mr Dafoe', false ).' value="Mr Dafoe">Mr Dafoe</option>
							<option '.selected( $options[2], 'Mr De Haviland', false ).' value="Mr De Haviland">Mr De Haviland</option>
							<option '.selected( $options[2], 'Mrs Saint Delafield', false ).' value="Mrs Saint Delafield">Mrs Saint Delafield</option>
							<option '.selected( $options[2], 'Mrs Sheppards', false ).' value="Mrs Sheppards">Mrs Sheppards</option>
							<option '.selected( $options[2], 'Muli', false ).' value="Muli">Muli</option>
							<option '.selected( $options[2], 'Mystery Quest', false ).' value="Mystery Quest">Mystery Quest</option>
							<option '.selected( $options[2], 'Neucha', false ).' value="Neucha">Neucha</option>
							<option '.selected( $options[2], 'Neuton', false ).' value="Neuton">Neuton</option>
							<option '.selected( $options[2], 'New Rocker', false ).' value="New Rocker">New Rocker</option>
							<option '.selected( $options[2], 'News Cycle', false ).' value="News Cycle">News Cycle</option>
							<option '.selected( $options[2], 'Niconne', false ).' value="Niconne">Niconne</option>
							<option '.selected( $options[2], 'Nixie One', false ).' value="Nixie One">Nixie One</option>
							<option '.selected( $options[2], 'Nobile', false ).' value="Nobile">Nobile</option>
							<option '.selected( $options[2], 'Nokora', false ).' value="Nokora">Nokora</option>
							<option '.selected( $options[2], 'Norican', false ).' value="Norican">Norican</option>
							<option '.selected( $options[2], 'Nosifer', false ).' value="Nosifer">Nosifer</option>
							<option '.selected( $options[2], 'Nothing You Could Do', false ).' value="Nothing You Could Do">Nothing You Could Do</option>
							<option '.selected( $options[2], 'Noticia Text', false ).' value="Noticia Text">Noticia Text</option>
							<option '.selected( $options[2], 'Noto Sans', false ).' value="Noto Sans">Noto Sans</option>
							<option '.selected( $options[2], 'Noto Serif', false ).' value="Noto Serif">Noto Serif</option>
							<option '.selected( $options[2], 'Nova Cut', false ).' value="Nova Cut">Nova Cut</option>
							<option '.selected( $options[2], 'Nova Flat', false ).' value="Nova Flat">Nova Flat</option>
							<option '.selected( $options[2], 'Nova Mono', false ).' value="Nova Mono">Nova Mono</option>
							<option '.selected( $options[2], 'Nova Oval', false ).' value="Nova Oval">Nova Oval</option>
							<option '.selected( $options[2], 'Nova Round', false ).' value="Nova Round">Nova Round</option>
							<option '.selected( $options[2], 'Nova Script', false ).' value="Nova Script">Nova Script</option>
							<option '.selected( $options[2], 'Nova Slim', false ).' value="Nova Slim">Nova Slim</option>
							<option '.selected( $options[2], 'Nova Square', false ).' value="Nova Square">Nova Square</option>
							<option '.selected( $options[2], 'Numans', false ).' value="Numans">Numans</option>
							<option '.selected( $options[2], 'Nunito', false ).' value="Nunito">Nunito</option>
							<option '.selected( $options[2], 'Odor Mean Chey', false ).' value="Odor Mean Chey">Odor Mean Chey</option>
							<option '.selected( $options[2], 'Offside', false ).' value="Offside">Offside</option>
							<option '.selected( $options[2], 'Old Standard TT', false ).' value="Old Standard TT">Old Standard TT</option>
							<option '.selected( $options[2], 'Oldenburg', false ).' value="Oldenburg">Oldenburg</option>
							<option '.selected( $options[2], 'Oleo Script', false ).' value="Oleo Script">Oleo Script</option>
							<option '.selected( $options[2], 'Oleo Script Swash Caps', false ).' value="Oleo Script Swash Caps">Oleo Script Swash Caps</option>
							<option '.selected( $options[2], 'Open Sans', false ).' value="Open Sans">Open Sans</option>
							<option '.selected( $options[2], 'Open Sans Condensed:300', false ).' value="Open Sans Condensed:300">Open Sans Condensed</option>
							<option '.selected( $options[2], 'Oranienbaum', false ).' value="Oranienbaum">Oranienbaum</option>
							<option '.selected( $options[2], 'Orbitron', false ).' value="Orbitron">Orbitron</option>
							<option '.selected( $options[2], 'Oregano', false ).' value="Oregano">Oregano</option>
							<option '.selected( $options[2], 'Orienta', false ).' value="Orienta">Orienta</option>
							<option '.selected( $options[2], 'Original Surfer', false ).' value="Original Surfer">Original Surfer</option>
							<option '.selected( $options[2], 'Oswald', false ).' value="Oswald">Oswald</option>
							<option '.selected( $options[2], 'Over the Rainbow', false ).' value="Over the Rainbow">Over the Rainbow</option>
							<option '.selected( $options[2], 'Overlock', false ).' value="Overlock">Overlock</option>
							<option '.selected( $options[2], 'Overlock SC', false ).' value="Overlock SC">Overlock SC</option>
							<option '.selected( $options[2], 'Ovo', false ).' value="Ovo">Ovo</option>
							<option '.selected( $options[2], 'Oxygen', false ).' value="Oxygen">Oxygen</option>
							<option '.selected( $options[2], 'Oxygen Mono', false ).' value="Oxygen Mono">Oxygen Mono</option>
							<option '.selected( $options[2], 'Pacifico', false ).' value="Pacifico">Pacifico</option>
							<option '.selected( $options[2], 'Paprika', false ).' value="Paprika">Paprika</option>
							<option '.selected( $options[2], 'Parisienne', false ).' value="Parisienne">Parisienne</option>
							<option '.selected( $options[2], 'Passero One', false ).' value="Passero One">Passero One</option>
							<option '.selected( $options[2], 'Passion One', false ).' value="Passion One">Passion One</option>
							<option '.selected( $options[2], 'Pathway Gothic One', false ).' value="Pathway Gothic One">Pathway Gothic One</option>
							<option '.selected( $options[2], 'Patrick Hand', false ).' value="Patrick Hand">Patrick Hand</option>
							<option '.selected( $options[2], 'Patrick Hand SC', false ).' value="Patrick Hand SC">Patrick Hand SC</option>
							<option '.selected( $options[2], 'Patua One', false ).' value="Patua One">Patua One</option>
							<option '.selected( $options[2], 'Paytone One', false ).' value="Paytone One">Paytone One</option>
							<option '.selected( $options[2], 'Peralta', false ).' value="Peralta">Peralta</option>
							<option '.selected( $options[2], 'Permanent Marker', false ).' value="Permanent Marker">Permanent Marker</option>
							<option '.selected( $options[2], 'Petit Formal Script', false ).' value="Petit Formal Script">Petit Formal Script</option>
							<option '.selected( $options[2], 'Petrona', false ).' value="Petrona">Petrona</option>
							<option '.selected( $options[2], 'Philosopher', false ).' value="Philosopher">Philosopher</option>
							<option '.selected( $options[2], 'Piedra', false ).' value="Piedra">Piedra</option>
							<option '.selected( $options[2], 'Pinyon Script', false ).' value="Pinyon Script">Pinyon Script</option>
							<option '.selected( $options[2], 'Pirata One', false ).' value="Pirata One">Pirata One</option>
							<option '.selected( $options[2], 'Plaster', false ).' value="Plaster">Plaster</option>
							<option '.selected( $options[2], 'Play', false ).' value="Play">Play</option>
							<option '.selected( $options[2], 'Playball', false ).' value="Playball">Playball</option>
							<option '.selected( $options[2], 'Playfair Display', false ).' value="Playfair Display">Playfair Display</option>
							<option '.selected( $options[2], 'Playfair Display SC', false ).' value="Playfair Display SC">Playfair Display SC</option>
							<option '.selected( $options[2], 'Podkova', false ).' value="Podkova">Podkova</option>
							<option '.selected( $options[2], 'Poiret One', false ).' value="Poiret One">Poiret One</option>
							<option '.selected( $options[2], 'Poller One', false ).' value="Poller One">Poller One</option>
							<option '.selected( $options[2], 'Poly', false ).' value="Poly">Poly</option>
							<option '.selected( $options[2], 'Pompiere', false ).' value="Pompiere">Pompiere</option>
							<option '.selected( $options[2], 'Pontano Sans', false ).' value="Pontano Sans">Pontano Sans</option>
							<option '.selected( $options[2], 'Port Lligat Sans', false ).' value="Port Lligat Sans">Port Lligat Sans</option>
							<option '.selected( $options[2], 'Port Lligat Slab', false ).' value="Port Lligat Slab">Port Lligat Slab</option>
							<option '.selected( $options[2], 'Prata', false ).' value="Prata">Prata</option>
							<option '.selected( $options[2], 'Preahvihear', false ).' value="Preahvihear">Preahvihear</option>
							<option '.selected( $options[2], 'Press Start 2P', false ).' value="Press Start 2P">Press Start 2P</option>
							<option '.selected( $options[2], 'Princess Sofia', false ).' value="Princess Sofia">Princess Sofia</option>
							<option '.selected( $options[2], 'Prociono', false ).' value="Prociono">Prociono</option>
							<option '.selected( $options[2], 'Prosto One', false ).' value="Prosto One">Prosto One</option>
							<option '.selected( $options[2], 'PT Mono', false ).' value="PT Mono">PT Mono</option>
							<option '.selected( $options[2], 'PT Sans', false ).' value="PT Sans">PT Sans</option>
							<option '.selected( $options[2], 'PT Sans Caption', false ).' value="PT Sans Caption">PT Sans Caption</option>
							<option '.selected( $options[2], 'PT Sans Narrow', false ).' value="PT Sans Narrow">PT Sans Narrow</option>
							<option '.selected( $options[2], 'PT Serif', false ).' value="PT Serif">PT Serif</option>
							<option '.selected( $options[2], 'PT Serif Caption', false ).' value="PT Serif Caption">PT Serif Caption</option>
							<option '.selected( $options[2], 'Puritan', false ).' value="Puritan">Puritan</option>
							<option '.selected( $options[2], 'Purple Purse', false ).' value="Purple Purse">Purple Purse</option>
							<option '.selected( $options[2], 'Quando', false ).' value="Quando">Quando</option>
							<option '.selected( $options[2], 'Quantico', false ).' value="Quantico">Quantico</option>
							<option '.selected( $options[2], 'Quattrocento', false ).' value="Quattrocento">Quattrocento</option>
							<option '.selected( $options[2], 'Quattrocento Sans', false ).' value="Quattrocento Sans">Quattrocento Sans</option>
							<option '.selected( $options[2], 'Questrial', false ).' value="Questrial">Questrial</option>
							<option '.selected( $options[2], 'Quicksand', false ).' value="Quicksand">Quicksand</option>
							<option '.selected( $options[2], 'Quintessential', false ).' value="Quintessential">Quintessential</option>
							<option '.selected( $options[2], 'Qwigley', false ).' value="Qwigley">Qwigley</option>
							<option '.selected( $options[2], 'Racing Sans One', false ).' value="Racing Sans One">Racing Sans One</option>
							<option '.selected( $options[2], 'Radley', false ).' value="Radley">Radley</option>
							<option '.selected( $options[2], 'Raleway', false ).' value="Raleway">Raleway</option>
							<option '.selected( $options[2], 'Raleway Dots', false ).' value="Raleway Dots">Raleway Dots</option>
							<option '.selected( $options[2], 'Rambla', false ).' value="Rambla">Rambla</option>
							<option '.selected( $options[2], 'Rammetto One', false ).' value="Rammetto One">Rammetto One</option>
							<option '.selected( $options[2], 'Ranchers', false ).' value="Ranchers">Ranchers</option>
							<option '.selected( $options[2], 'Rancho', false ).' value="Rancho">Rancho</option>
							<option '.selected( $options[2], 'Rationale', false ).' value="Rationale">Rationale</option>
							<option '.selected( $options[2], 'Redressed', false ).' value="Redressed">Redressed</option>
							<option '.selected( $options[2], 'Reenie Beanie', false ).' value="Reenie Beanie">Reenie Beanie</option>
							<option '.selected( $options[2], 'Revalia', false ).' value="Revalia">Revalia</option>
							<option '.selected( $options[2], 'Ribeye', false ).' value="Ribeye">Ribeye</option>
							<option '.selected( $options[2], 'Ribeye Marrow', false ).' value="Ribeye Marrow">Ribeye Marrow</option>
							<option '.selected( $options[2], 'Righteous', false ).' value="Righteous">Righteous</option>
							<option '.selected( $options[2], 'Risque', false ).' value="Risque">Risque</option>
							<option '.selected( $options[2], 'Roboto', false ).' value="Roboto">Roboto</option>
							<option '.selected( $options[2], 'Roboto Condensed', false ).' value="Roboto Condensed">Roboto Condensed</option>
							<option '.selected( $options[2], 'Roboto Slab', false ).' value="Roboto Slab">Roboto Slab</option>
							<option '.selected( $options[2], 'Rochester', false ).' value="Rochester">Rochester</option>
							<option '.selected( $options[2], 'Rock Salt', false ).' value="Rock Salt">Rock Salt</option>
							<option '.selected( $options[2], 'Rokkitt', false ).' value="Rokkitt">Rokkitt</option>
							<option '.selected( $options[2], 'Romanesco', false ).' value="Romanesco">Romanesco</option>
							<option '.selected( $options[2], 'Ropa Sans', false ).' value="Ropa Sans">Ropa Sans</option>
							<option '.selected( $options[2], 'Rosario', false ).' value="Rosario">Rosario</option>
							<option '.selected( $options[2], 'Rosarivo', false ).' value="Rosarivo">Rosarivo</option>
							<option '.selected( $options[2], 'Rouge Script', false ).' value="Rouge Script">Rouge Script</option>
							<option '.selected( $options[2], 'Ruda', false ).' value="Ruda">Ruda</option>
							<option '.selected( $options[2], 'Rufina', false ).' value="Rufina">Rufina</option>
							<option '.selected( $options[2], 'Ruge Boogie', false ).' value="Ruge Boogie">Ruge Boogie</option>
							<option '.selected( $options[2], 'Ruluko', false ).' value="Ruluko">Ruluko</option>
							<option '.selected( $options[2], 'Rum Raisin', false ).' value="Rum Raisin">Rum Raisin</option>
							<option '.selected( $options[2], 'Ruslan Display', false ).' value="Ruslan Display">Ruslan Display</option>
							<option '.selected( $options[2], 'Russo One', false ).' value="Russo One">Russo One</option>
							<option '.selected( $options[2], 'Ruthie', false ).' value="Ruthie">Ruthie</option>
							<option '.selected( $options[2], 'Rye', false ).' value="Rye">Rye</option>
							<option '.selected( $options[2], 'Sacramento', false ).' value="Sacramento">Sacramento</option>
							<option '.selected( $options[2], 'Sail', false ).' value="Sail">Sail</option>
							<option '.selected( $options[2], 'Salsa', false ).' value="Salsa">Salsa</option>
							<option '.selected( $options[2], 'Sanchez', false ).' value="Sanchez">Sanchez</option>
							<option '.selected( $options[2], 'Sancreek', false ).' value="Sancreek">Sancreek</option>
							<option '.selected( $options[2], 'Sansita One', false ).' value="Sansita One">Sansita One</option>
							<option '.selected( $options[2], 'Sarina', false ).' value="Sarina">Sarina</option>
							<option '.selected( $options[2], 'Satisfy', false ).' value="Satisfy">Satisfy</option>
							<option '.selected( $options[2], 'Scada', false ).' value="Scada">Scada</option>
							<option '.selected( $options[2], 'Schoolbell', false ).' value="Schoolbell">Schoolbell</option>
							<option '.selected( $options[2], 'Seaweed Script', false ).' value="Seaweed Script">Seaweed Script</option>
							<option '.selected( $options[2], 'Sevillana', false ).' value="Sevillana">Sevillana</option>
							<option '.selected( $options[2], 'Seymour One', false ).' value="Seymour One">Seymour One</option>
							<option '.selected( $options[2], 'Shadows Into Light', false ).' value="Shadows Into Light">Shadows Into Light</option>
							<option '.selected( $options[2], 'Shadows Into Light Two', false ).' value="Shadows Into Light Two">Shadows Into Light Two</option>
							<option '.selected( $options[2], 'Shanti', false ).' value="Shanti">Shanti</option>
							<option '.selected( $options[2], 'Share', false ).' value="Share">Share</option>
							<option '.selected( $options[2], 'Share Tech', false ).' value="Share Tech">Share Tech</option>
							<option '.selected( $options[2], 'Share Tech Mono', false ).' value="Share Tech Mono">Share Tech Mono</option>
							<option '.selected( $options[2], 'Shojumaru', false ).' value="Shojumaru">Shojumaru</option>
							<option '.selected( $options[2], 'Short Stack', false ).' value="Short Stack">Short Stack</option>
							<option '.selected( $options[2], 'Siemreap', false ).' value="Siemreap">Siemreap</option>
							<option '.selected( $options[2], 'Sigmar One', false ).' value="Sigmar One">Sigmar One</option>
							<option '.selected( $options[2], 'Signika', false ).' value="Signika">Signika</option>
							<option '.selected( $options[2], 'Signika Negative', false ).' value="Signika Negative">Signika Negative</option>
							<option '.selected( $options[2], 'Simonetta', false ).' value="Simonetta">Simonetta</option>
							<option '.selected( $options[2], 'Sintony', false ).' value="Sintony">Sintony</option>
							<option '.selected( $options[2], 'Sirin Stencil', false ).' value="Sirin Stencil">Sirin Stencil</option>
							<option '.selected( $options[2], 'Six Caps', false ).' value="Six Caps">Six Caps</option>
							<option '.selected( $options[2], 'Skranji', false ).' value="Skranji">Skranji</option>
							<option '.selected( $options[2], 'Slackey', false ).' value="Slackey">Slackey</option>
							<option '.selected( $options[2], 'Smokum', false ).' value="Smokum">Smokum</option>
							<option '.selected( $options[2], 'Smythe', false ).' value="Smythe">Smythe</option>
							<option '.selected( $options[2], 'Sniglet:800', false ).' value="Sniglet:800">Sniglet</option>
							<option '.selected( $options[2], 'Snippet', false ).' value="Snippet">Snippet</option>
							<option '.selected( $options[2], 'Snowburst One', false ).' value="Snowburst One">Snowburst One</option>
							<option '.selected( $options[2], 'Sofadi One', false ).' value="Sofadi One">Sofadi One</option>
							<option '.selected( $options[2], 'Sofia', false ).' value="Sofia">Sofia</option>
							<option '.selected( $options[2], 'Sonsie One', false ).' value="Sonsie One">Sonsie One</option>
							<option '.selected( $options[2], 'Sorts Mill Goudy', false ).' value="Sorts Mill Goudy">Sorts Mill Goudy</option>
							<option '.selected( $options[2], 'Source Code Pro', false ).' value="Source Code Pro">Source Code Pro</option>
							<option '.selected( $options[2], 'Source Sans Pro', false ).' value="Source Sans Pro">Source Sans Pro</option>
							<option '.selected( $options[2], 'Special Elite', false ).' value="Special Elite">Special Elite</option>
							<option '.selected( $options[2], 'Spicy Rice', false ).' value="Spicy Rice">Spicy Rice</option>
							<option '.selected( $options[2], 'Spinnaker', false ).' value="Spinnaker">Spinnaker</option>
							<option '.selected( $options[2], 'Spirax', false ).' value="Spirax">Spirax</option>
							<option '.selected( $options[2], 'Squada One', false ).' value="Squada One">Squada One</option>
							<option '.selected( $options[2], 'Stalemate', false ).' value="Stalemate">Stalemate</option>
							<option '.selected( $options[2], 'Stalinist One', false ).' value="Stalinist One">Stalinist One</option>
							<option '.selected( $options[2], 'Stardos Stencil', false ).' value="Stardos Stencil">Stardos Stencil</option>
							<option '.selected( $options[2], 'Stint Ultra Condensed', false ).' value="Stint Ultra Condensed">Stint Ultra Condensed</option>
							<option '.selected( $options[2], 'Stint Ultra Expanded', false ).' value="Stint Ultra Expanded">Stint Ultra Expanded</option>
							<option '.selected( $options[2], 'Stoke', false ).' value="Stoke">Stoke</option>
							<option '.selected( $options[2], 'Strait', false ).' value="Strait">Strait</option>
							<option '.selected( $options[2], 'Sue Ellen Francisco', false ).' value="Sue Ellen Francisco">Sue Ellen Francisco</option>
							<option '.selected( $options[2], 'Sunshiney', false ).' value="Sunshiney">Sunshiney</option>
							<option '.selected( $options[2], 'Supermercado One', false ).' value="Supermercado One">Supermercado One</option>
							<option '.selected( $options[2], 'Suwannaphum', false ).' value="Suwannaphum">Suwannaphum</option>
							<option '.selected( $options[2], 'Swanky and Moo Moo', false ).' value="Swanky and Moo Moo">Swanky and Moo Moo</option>
							<option '.selected( $options[2], 'Syncopate', false ).' value="Syncopate">Syncopate</option>
							<option '.selected( $options[2], 'Tangerine', false ).' value="Tangerine">Tangerine</option>
							<option '.selected( $options[2], 'Taprom', false ).' value="Taprom">Taprom</option>
							<option '.selected( $options[2], 'Tauri', false ).' value="Tauri">Tauri</option>
							<option '.selected( $options[2], 'Telex', false ).' value="Telex">Telex</option>
							<option '.selected( $options[2], 'Tenor Sans', false ).' value="Tenor Sans">Tenor Sans</option>
							<option '.selected( $options[2], 'Text Me One', false ).' value="Text Me One">Text Me One</option>
							<option '.selected( $options[2], 'The Girl Next Door', false ).' value="The Girl Next Door">The Girl Next Door</option>
							<option '.selected( $options[2], 'Tienne', false ).' value="Tienne">Tienne</option>
							<option '.selected( $options[2], 'Tinos', false ).' value="Tinos">Tinos</option>
							<option '.selected( $options[2], 'Titan One', false ).' value="Titan One">Titan One</option>
							<option '.selected( $options[2], 'Titillium Web', false ).' value="Titillium Web">Titillium Web</option>
							<option '.selected( $options[2], 'Trade Winds', false ).' value="Trade Winds">Trade Winds</option>
							<option '.selected( $options[2], 'Trocchi', false ).' value="Trocchi">Trocchi</option>
							<option '.selected( $options[2], 'Trochut', false ).' value="Trochut">Trochut</option>
							<option '.selected( $options[2], 'Trykker', false ).' value="Trykker">Trykker</option>
							<option '.selected( $options[2], 'Tulpen One', false ).' value="Tulpen One">Tulpen One</option>
							<option '.selected( $options[2], 'Ubuntu', false ).' value="Ubuntu">Ubuntu</option>
							<option '.selected( $options[2], 'Ubuntu Condensed', false ).' value="Ubuntu Condensed">Ubuntu Condensed</option>
							<option '.selected( $options[2], 'Ubuntu Mono', false ).' value="Ubuntu Mono">Ubuntu Mono</option>
							<option '.selected( $options[2], 'Ultra', false ).' value="Ultra">Ultra</option>
							<option '.selected( $options[2], 'Uncial Antiqua', false ).' value="Uncial Antiqua">Uncial Antiqua</option>
							<option '.selected( $options[2], 'Underdog', false ).' value="Underdog">Underdog</option>
							<option '.selected( $options[2], 'Unica One', false ).' value="Unica One">Unica One</option>
							<option '.selected( $options[2], 'UnifrakturCook:700', false ).' value="UnifrakturCook:700">UnifrakturCook</option>
							<option '.selected( $options[2], 'UnifrakturMaguntia', false ).' value="UnifrakturMaguntia">UnifrakturMaguntia</option>
							<option '.selected( $options[2], 'Unkempt', false ).' value="Unkempt">Unkempt</option>
							<option '.selected( $options[2], 'Unlock', false ).' value="Unlock">Unlock</option>
							<option '.selected( $options[2], 'Unna', false ).' value="Unna">Unna</option>
							<option '.selected( $options[2], 'Vampiro One', false ).' value="Vampiro One">Vampiro One</option>
							<option '.selected( $options[2], 'Varela', false ).' value="Varela">Varela</option>
							<option '.selected( $options[2], 'Varela Round', false ).' value="Varela Round">Varela Round</option>
							<option '.selected( $options[2], 'Vast Shadow', false ).' value="Vast Shadow">Vast Shadow</option>
							<option '.selected( $options[2], 'Vibur', false ).' value="Vibur">Vibur</option>
							<option '.selected( $options[2], 'Vidaloka', false ).' value="Vidaloka">Vidaloka</option>
							<option '.selected( $options[2], 'Viga', false ).' value="Viga">Viga</option>
							<option '.selected( $options[2], 'Voces', false ).' value="Voces">Voces</option>
							<option '.selected( $options[2], 'Volkhov', false ).' value="Volkhov">Volkhov</option>
							<option '.selected( $options[2], 'Vollkorn', false ).' value="Vollkorn">Vollkorn</option>
							<option '.selected( $options[2], 'Voltaire', false ).' value="Voltaire">Voltaire</option>
							<option '.selected( $options[2], 'VT323', false ).' value="VT323">VT323</option>
							<option '.selected( $options[2], 'Waiting for the Sunrise', false ).' value="Waiting for the Sunrise">Waiting for the Sunrise</option>
							<option '.selected( $options[2], 'Wallpoet', false ).' value="Wallpoet">Wallpoet</option>
							<option '.selected( $options[2], 'Walter Turncoat', false ).' value="Walter Turncoat">Walter Turncoat</option>
							<option '.selected( $options[2], 'Warnes', false ).' value="Warnes">Warnes</option>
							<option '.selected( $options[2], 'Wellfleet', false ).' value="Wellfleet">Wellfleet</option>
							<option '.selected( $options[2], 'Wendy One', false ).' value="Wendy One">Wendy One</option>
							<option '.selected( $options[2], 'Wire One', false ).' value="Wire One">Wire One</option>
							<option '.selected( $options[2], 'Yanone Kaffeesatz', false ).' value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
							<option '.selected( $options[2], 'Yellowtail', false ).' value="Yellowtail">Yellowtail</option>
							<option '.selected( $options[2], 'Yeseva One', false ).' value="Yeseva One">Yeseva One</option>
							<option '.selected( $options[2], 'Yesteryear', false ).' value="Yesteryear">Yesteryear</option>
							<option '.selected( $options[2], 'Zeyada', false ).' value="Zeyada">Zeyada</option>
						</select>
			</div>
			<div title="' . esc_html__( 'Background Color', WP_SAP_TEXT_DOMAIN ) . '" id="ms_preview_inner' . $sv->id . '" class="wp_sap_preview1001 wp_sap_preview wp_sap_tooltip"><div class="inner" style="background:' . str_replace( ";", ";background:", substr( $options[ 3 ], 0, -1 ) ) . '"><input type="hidden" class="bgcolor" value="' . $options[ 3 ] . '"></div></div>
			<div title="' . esc_html__( 'Font Color', WP_SAP_TEXT_DOMAIN ) . '" style="background-color:'.$options[4].'" class="wp_sap_preview1002 wp_sap_preview wp_sap_tooltip"></div>
			<div title="' . esc_html__( 'Border Color', WP_SAP_TEXT_DOMAIN ) . '" style="background-color:'.$options[5].'" class="wp_sap_preview1003 wp_sap_preview wp_sap_tooltip"></div>
			<div class="play_button"><img class="wp_sap_tooltip" title="' . esc_html__( 'Play Survey', WP_SAP_TEXT_DOMAIN ) . '" src="'.plugins_url( '/assets/img/play-button.png' , __FILE__ ).'"></div>
			<div style="clear: both;"></div><div class="wp_sap_sliders"><input value="Border Width: '.$options[6].'px" type="text" class="wp_sap_border_width_value" /><div class="wp_sap_border_width"></div></div>
			<div class="wp_sap_sliders"><input value="' . esc_html__( 'Border Radius', WP_SAP_TEXT_DOMAIN ) . ': '.$options[7].'px" type="text" class="wp_sap_border_radius_value" /><div class="wp_sap_border_radius"></div></div>
			<div class="wp_sap_sliders"><input value="' . esc_html__( 'Font Size', WP_SAP_TEXT_DOMAIN ) . ': '.$options[8].'px" type="text" class="wp_sap_font_size_value" /><div class="wp_sap_font_size"></div></div>
			<div class="wp_sap_sliders"><input value="' . esc_html__( 'Padding', WP_SAP_TEXT_DOMAIN ) . ': '.$options[9].'px" type="text" class="wp_sap_padding_value" /><div class="wp_sap_padding"></div></div>
			<div class="wp_sap_sliders"><input value="' . esc_html__( 'Line Height', WP_SAP_TEXT_DOMAIN ) . ': '.$options[10].'px" type="text" class="wp_sap_line_height_value" /><div class="wp_sap_line_height"></div></div>
			<div class="wp_sap_sliders"><input value="' . esc_html__( 'Animation Speed', WP_SAP_TEXT_DOMAIN ) . ': '.($options[11]/1000).'sec" type="text" style="width:150px;" class="wp_sap_animation_speed_value" /><div class="wp_sap_animation_speed"></div></div>
			<div style="clear: both;"></div><div class="text thankyou">' . esc_html__( 'Thank you message', WP_SAP_TEXT_DOMAIN ) . ': <input type="text" name="thankyou" class="inputtext thankyou" value="'.str_replace('"','\'',$options[12]).'" /></div>
			<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="' . esc_html__( 'Enable if you want to display the survey on the entire website', WP_SAP_TEXT_DOMAIN ) . '" style="width: 200px;"><input type="checkbox" name="global_survey" class="inputtext global_survey" '.$global_opt.' value="'.$sv->global.'" /> ' . esc_html__( 'Global Survey', WP_SAP_TEXT_DOMAIN ) . '</label></div>
			<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="' . esc_html__( 'Lock the screen with a transparent background', WP_SAP_TEXT_DOMAIN ) . '" style="width: 200px;"><input type="checkbox" name="lock_bg" '.$opt_13.' class="inputtext lock_bg" value="'.$options[13].'" /> ' . esc_html__( 'Lock Screen', WP_SAP_TEXT_DOMAIN ) . '</label></div>
			<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="' . esc_html__( 'Users can close the survey', WP_SAP_TEXT_DOMAIN ) . '" style="width: 200px;"><input type="checkbox" name="closeable" '.$opt_14.' class="inputtext closeable" value="'.$options[14].'" /> ' . esc_html__( 'Closeable', WP_SAP_TEXT_DOMAIN ) . '</label></div>
			<div class="wp_sap_checkbox"><label class="text wp_sap_tooltip" title="' . esc_html__( 'The survey will appear when the user scrolled down at the bottom of the page', WP_SAP_TEXT_DOMAIN ) . '" style="width: 200px;"><input type="checkbox" name="atbottom" '.$opt_15.' class="inputtext atbottom" value="'.$options[15].'" /> ' . esc_html__( 'Display at bottom', WP_SAP_TEXT_DOMAIN ) . '</label></div>
			</fieldset>
			<div style="clear:both;"></div>
			<div class="form-area"><a class="add_question button button-primary">' . esc_html__( 'Add New Question', WP_SAP_TEXT_DOMAIN ) . '</a></div>
			<div style="clear:both;"></div>
			<input type="hidden" name="survey_id" value="" />
		<div id="new_questions">');
						$questions = $this->wpdb->get_results("SELECT * FROM ".$this->wpdb->prefix."wp_sap_questions WHERE `survey_id`='".$sv->id."' ORDER BY id ASC");
				foreach($questions as $key=>$qv)
				{
				if ($key>0) $rem_q = '<a class="delete_question"><img class="remove_question wp_sap_tooltip" id="remove_question_'.$sv->id.'_'.($key+1).'" title="Remove Question" src="'.plugins_url( '/assets/img/delete.svg' , __FILE__ ).'"></a>';
				else $rem_q = "";
						$allcount = $this->wpdb->get_var("SELECT SUM(count) as SUMMACOUNT FROM ".$this->wpdb->prefix."wp_sap_answers WHERE `survey_id`='".$sv->id."' AND `question_id`='".$qv->id."'");
		print('<div class="group">
		<h3>'.($key+1).'. question<span class="question-subheader">' . $qv->question . '</span></h3>
		<div class="one_question" id="question_section'.($key+1).'">
		<div class="left_half">
		<div id="question_'.($key+1).'">
			<p>Question:&nbsp; <input type="text" name="question[]" id="question'.($key+1).'" style="width: 75%;" class="question_text" onclick="if (this.value==\'Was this information helpful?\') this.value=\'\'" value="'.$qv->question.'" placeholder="Type your question here" />'.$rem_q.'</p>
			<span id="answers_'.$sv->id.'">');
		$answers = $this->wpdb->get_results("SELECT * FROM ".$this->wpdb->prefix."wp_sap_answers WHERE `survey_id`='".$sv->id."' AND `question_id`='".$qv->id."' ORDER BY autoid ASC");
			foreach($answers as $key2=>$av)
			{
			if ($allcount>0) $percentage = round(($av->count/$allcount)*100,2);
			else $percentage = 0;
			if ($key2==0) print('<p>'.($key2+1).'. answer: <input type="text" name="answer[]" class="answer" id="answer1" value="'.$av->answer.'" placeholder="yes" /><span id="answer_count1" class="answer_count">'.$av->count.' - '.$percentage.'%</span></p>');
			elseif ($key2==1) print('<p>'.($key2+1).'. answer: <input type="text" name="answer[]" class="answer" id="answer2" value="'.$av->answer.'" placeholder="no" /><span id="answer_count2" class="answer_count">'.$av->count.' - '.$percentage.'%</span><a class="add_answer"><img class="wp_sap_tooltip" title="Add New Answer" src="'.plugins_url( "/assets/img/add.svg" , __FILE__ ).'"></a></p>');
			else print('</span><p class="added_answers" id="answer_element_'.$sv->id.'_'.($key2+1).'"><span>'.($key2+1).'.</span> answer: <input type="text" name="answer[]" class="answer" id="answer'.($key2+1).'" value="' . $av->answer . '" placeholder="no" /><span id="answer_count'.($key2+1).'" class="answer_count">'.$av->count.' - '.$percentage.'%</span><a class="remove_answer" id="remove_answers_' . $sv->id . '_' . ( $key2 + 1 ) . '"><img class="wp_sap_tooltip" title="Remove Answer" src="' . plugins_url( "/assets/img/delete.svg", __FILE__ ) . '"></a></p>');
			}
			print('
		</div>
		</div>
		<div class="right_half" id="chart' . ( $key + 1 ) . '">
		<canvas id="wp_sap_pro_graph_' . $sv->id . '_' . ( $key + 1 ) . '" class="canvas_graph" height="250" width="250"></canvas>
		</div>
		</div>
		</div>');
		}
		print('</div>
		<div style="clear:both;"></div>
		<div class="survey-control-buttons">
			<br><span><input type="submit" name="delete_survey" class="delete_survey button" value="' . esc_html__( 'DELETE', WP_SAP_TEXT_DOMAIN ) . '"></span><span><input type="submit" name="save_survey" class="save_survey button" value="' . esc_html__( 'UPDATE', WP_SAP_TEXT_DOMAIN ) . '"></span><span><input type="submit" name="reset_survey" class="reset_survey button" value="' . esc_html__( 'RESET', WP_SAP_TEXT_DOMAIN ) . '"></span><span class="survey_error_span"></span>
		</div>
	</div>');
				}
//				print_r($surveys);
				?>
			</div>
			<?php require_once( plugin_dir_path( __FILE__ ) . '/sidebar.php' );?>
	</div>
<div id="dialog-confirm" title="Delete Survey?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><?php esc_html_e( 'These items will be permanently deleted and cannot be recovered. Are you sure?', WP_SAP_TEXT_DOMAIN );?></p>
</div>
<div id="dialog-confirm2" title="Reset Survey Answers?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><?php esc_html_e( 'The answer counts will be permanently deleted and cannot be recovered. Are you sure to reset?', WP_SAP_TEXT_DOMAIN );?></p>
</div>
<div id="dialog-help1" class="help-dialogs" title="<?php esc_html_e( 'Embed Mode', WP_SAP_TEXT_DOMAIN );?>">
	<p><?php esc_html_e( 'If you would like to Embed the Survey on any page / post, please use the following shortcode: ', WP_SAP_TEXT_DOMAIN );?></p>
	<?php print( '<p class="code"><input type="text" readonly="true" class="copytext" value="[wpsurveypoll id=&quot;000000&quot; style=&quot;flat&quot;]"></p>' ); ?>
	<p><?php esc_html_e( 'Use the following shortcode for modal mode: ', WP_SAP_TEXT_DOMAIN );?></p>
	<?php print( '<p class="code"><input type="text" readonly="true" class="copytext" value="[wpsurveypoll id=&quot;000000&quot;]"></p>' ); ?>
	<p><?php esc_html_e( 'Please do not forget to disable the Global Survey checkbox in the Survey Options to avoid duplicated display. ', WP_SAP_TEXT_DOMAIN );?></p>
</div>
<div id="dialog-help2" class="help-dialogs" title="<?php esc_html_e( 'Results', WP_SAP_TEXT_DOMAIN );?>">
	<p><?php esc_html_e( 'If you want to display the results with piechart for all questions, use the following shortcode on any page / post: ', WP_SAP_TEXT_DOMAIN );?></p>
	<?php print( '<p class="code"><input type="text" readonly="true" class="copytext" value="[wpsurveypoll_results id=&quot;000000&quot; style=&quot;piechart&quot;]"></p>' ); ?>
	<p><?php esc_html_e( 'Display the results with piechart for a specified question only: ', WP_SAP_TEXT_DOMAIN );?></p>
	<?php print( '<p class="code"><input type="text" readonly="true" class="copytext" value="[wpsurveypoll_results id=&quot;000000&quot; style=&quot;piechart&quot;  data=&quot;question&quot; qid=&quot;1&quot;]"></p>' ); ?>
</div>
</div>
<div id="survey" style="position: fixed;left:0px;z-index: 999999;width:98%;padding:1%;"></div>