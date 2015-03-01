<?php include("header.php"); ?>

<section id="main" class="wrapper style1">
  <header class="major">
    <h2>Enregistrement</h2>
  </header>

  <div class="container">
    <div class="row 150%">
      <div class="8u 12u$(2)">

	<!-- Content -->
	<section id="content">

	  <form action="confirm.php" method="post">
	    <fieldset>
	      <h2>Participant</h2>

	      <div class="left">
		<label for="lastname">Nom</label>
		<input type="text" name="nom" id="lastname" required>
	      </div>

	      <div class="left">
		<label for="firstname">Prénom</label>
		<input type="text" name="prenom" id="firstname" required>
	      </div>

	      <div class="clear">&nbsp;</div>

	      <div class="left">
		<label>Sexe</label>
		<input type="radio" name="sex" id="m" value="M" checked>
		<label for="m">M</label>

		<input type="radio" name="sex" id="f" value="F">
		<label for="f">F</label>
	      </div>

	      <div class="left">
		<label for="birthday">Date de naissance</label>
		<input type="date" name="naissance" id="birthday" min="1998-01-01" max="2005-12-31" required>
	      </div>

	      <div class="clear">&nbsp;</div>

	      <div class="left">
		<label>Licence</label>
		<input type="radio" name="licence-type" id="ffme" value="FFME" checked>
		<label for="ffme">FFME</label>

		<input type="radio" name="licence-type" id="ffcam" value="FFCAM">
		<label for="ffcam">FFCAM</label>
	      </div>

	      <div class="left">
		<label for="licence-num">Numéro</label>
		<input type="text" name="licence-num" id="licence-num" required>
	      </div>

	      <div class="left">
		<label for="association">Club</label>
		<input type="text" name="club" id="association">
	      </div>

	      <script>
		<!-- n'est pas charge si dans head : trouver une solution -->
		var availableClubs = ["A.C.S. SAVOIE TECHNOLAC", "A.S. VILLEFONTAINE", "A.S.V.E.L. SKI MONTAGNE", "ACCRO-ROC", "ALBERTVILLE ESCALADE",
		"ALPES CLUB", "AMICALE LAIQUE CHAPONOST", "AMICALE LAIQUE D'ANSE", "AMICALE LAIQUE DE JONAGE", "AMICALE LAIQUE ECHIROLLES", "ANNECY ESCALADE", "ARAIGNEE BLEU CIEL",
		"ASLGC ESCALADE", "ASPTT CHAMBERY", "ASPTT GRAND LYON MONTAGNE", "ASSOCIATION CLAIXOISE ESCALADE",
		"ASSOCIATION DES FAMILLES DE CRAPONNE", "BELLEDONNE GRIMPE", "BELLES GRIMPES EN BELLEDONNE", "BOBST LYON SPORTS",
		"BREDAROC", "BRON VERTICAL", "C.A.F. ALBERTVILLE", "C.A.F. ANNECY COMPETITION", "C.A.F. FAVERGES COMP", "C.A.F. SALEVE ANNEMASSE", "C.O.D.C. ESCALADE",
		"C.O.R.V.I. MONTAGNE", "C.P.E.A. VAULX EN VELIN", "C.S. VAL ISERE", "C.S.A. 27ème B.C.A. Montagne Escalade", "CAF BELLEDONNE NORD", "CAF DSA DAUPHINE SKI ALPINISME",
		"CAF FONTAINE EN MONTAGNE", "CAF GRENOBLE ISERE", "CAF GRENOBLE OISANS", "CAF GRESIVAUDAN", "CAF JEUNES EN MONTAGNE GRENOBLE", "CAF LA MURE MATHEYSINE",
		"CAF LA ROCHE BONNEVILLE", "CAF NORD DAUPHINE", "CAF OBIOU", "CAF PAYS D'OISANS", "CAF SAINT GEORGES D ESPERANCHE", "CAF SAINT MARTIN D'HERES",
		"CAF SALLANCHES COMPETITION", "CAF VALLEE DE LA GRESSE", "CAF VIENNE", "CAF VOIRON CHARTREUSE"];

		<!-- par defaut matche le motif quelle que soit la position -->
		<!-- $("#association" ).autocomplete({source: availableClubs });
		  -->
		<!-- ne matche que le debut -->

		$( "#association" ).autocomplete({
		source: function( request, response ) {
		var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
		response( $.grep( availableClubs, function( item ){
		return matcher.test( item );
		}) );
		}
		});

	      </script>

	      <div class="clear">&nbsp;</div>

	      <div>
		<label>Niveau maximum réalisé en voie :</label>
		<input type="radio" name="niveau" id="4c" value="4c">
		<label for="4c">4c</label>

		<input type="radio" name="niveau" id="5a" value="5a">
		<label for="5a">5a</label>

		<input type="radio" name="niveau" id="5b" value="5b">
		<label for="5b">5b</label>

		<input type="radio" name="niveau" id="5c" value="5c">
		<label for="5c">5c</label>

		<input type="radio" name="niveau" id="6a" value="6a">
		<label for="6a">6a</label>

		<input type="radio" name="niveau" id="6b" value="6b">
		<label for="6b">6b</label>

		<input type="radio" name="niveau" id="6c" value="6c">
		<label for="6c">6c</label>

		<input type="radio" name="niveau" id="7a" value="7a">
		<label for="7a">7a</label>

		<input type="radio" name="niveau" id="7b" value="7b">
		<label for="7b">7b</label>

		<input type="radio" name="niveau" id="7c" value="7c">
		<label for="7c">7c</label>
	      </div>

	      <div>
		<textarea name="message" id="message" placeholder="Dites-nous en plus sur votre expérience (ou éventuellement vos résultats en compétition) :" rows="4"></textarea>
	      </div>

	      <div class="clear">&nbsp;</div>


	      <h2>Contact</h2>

	      <div class="left">
		<label for="email">Mail</label>
		<input type="email" id="email" name="email" placeholder="name@provider.com" required>
	      </div>

	      <div class="left">
		<label for="tel">Téléphone</label>
		<input type="tel" id="tel" name="telephone" placeholder="06XXXXXXXX" required>
	      </div>

	      <div class="clear">&nbsp;</div>

	      <h2>Enregistrement</h2>

	      <input type="checkbox" name="conditions" id="conditions" value="">
	      <label for="conditions">En cochant cette case, vous acceptez les <a href="program.php">conditions d'inscription et le règlement de la compétition</a>.</label>
	      <br>

	      <button type="submit" class="button big" role="button"
		      aria-disabled="false">Validation et paiement</button>

	    </fieldset>

	  </form>

	</section>

      </div>
      <div class="4u 12u$(2)">

	<!-- Sidebar -->
	<section id="sidebar">

<?php
require 'globals.php';
$availablePlaces = $GLOBALS['available-places'];

require 'database.php';
$db = new Database();

$db->query("SELECT * FROM bloc_participants WHERE (categorie = :cat1 OR categorie = :cat2) AND payer_id IS NOT NULL");

$db->bind(':cat1', 'poussin');
$db->bind(':cat2', 'benjamin');
$db->resultset();
$remainingPlacesPB = $availablePlaces - $db->rowCount();

$db->bind(':cat1', 'minime');
$db->bind(':cat2', 'cadet');
$db->resultset();
$remainingPlacesMC = $availablePlaces - $db->rowCount();

?>

	  <section>
	    <h3>Places restantes disponibles</h3>
	    <p>Les inscriptions sont limitées à <?php echo $availablePlaces ?> participants par demi-journées.</p>
	    <footer>
	      <table class="actions">
		<tr>
		  <th>Catégorie</th>
		  <th>Places restantes</th>
		</tr>
		<tr>
		  <td>Poussins / Benjamins (F&G)</td>
		  <td><?php echo $remainingPlacesPB ?></td>
		</tr>
		<tr>
		  <td>Minimes / Cadets (F&G)</td>
		  <td><?php echo $remainingPlacesMC ?></td>
		</tr>
	      </table>
	    </footer>
	  </section>

	  <hr />     

	</section>

      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
