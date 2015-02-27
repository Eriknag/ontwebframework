<header>
	<div id="menu">
		<?php
			include_once('model/usersmodel.class.php');
			$model = new UsersModel();
		    // Trucje om de huidige pagina te bepalen
		    // Met de huidige pagina bedoel ik de naam van het (php) bestand dat op dit moment wordt 'uitgevoerd'
		    // de functie basename haalt de naam van het bestand uit een pad met eventuele subfolders
			$page = basename($_SERVER["PHP_SELF"]);
		
			// Definieer het menu in een array (elk menu item is ook weer een array)
		    $menu_items = array(
				array(
					"Name"=>"Home",
					"URL"=>"index.php",
				),
				array(
					"Name"=>"Over ons",
					"URL"=>"about.php"
				),
				array(
					"Name"=>"Game corner",
					"URL"=>"game.php"
				),
				array(
					"Name"=>"Contact",
					"URL"=>"contact.php"
				)
			);
			
			if ($model->isAuthenticated()) {
				$menu_items[] = array(
					"Name"=>"Registreren",
					"URL"=>"usermgmt.php"
				);
			}
			
			// Render het menu met een for-each loop
			echo'<ul  class="menu">';
			foreach ($menu_items as $menu_item) {
				// Bepaal de (CSS) class van dit item
				$class = "menu_item";
				if ($menu_item["URL"]===$page) 
					$class ="menu_item active";
				echo '                    ';    // wat spaties voor de netheid
				echo '<li class="'.$class.'">'; // li element
				echo '<a href="'.$menu_item['URL'].'">'.$menu_item['Name'].'</a>'; // a-element
				echo"</li>\n";
			}
			echo"                </ul>";
			
		?>
	</div>
	
	<div id="fill"></div>
	
	<div id="user">
		<?php
			echo '<ul  class="menu">';
			if(isset($_SESSION['loggedin'])) {
				$username = $_SESSION['username'];
				// print welkom naam
				echo '<li class="menu_item active"><a href="#">Welkom '.$username.'</a></li>';
				echo '<li class="menu_item"><a href="login.php?action=logoff">Afmelden</a></li>';
			} else {
				// maak loginmenu
				echo '<li class="menu_item"><a href="login.php?action=login">Log in</a></li>';
			}
			echo '</ul>';
		?>
	</div>
</header>
