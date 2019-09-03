<?php
session_start();
if($_SESSION['klogin'] == false) {
    header("Location: inlog.php");
    exit();
  }
  ?>

<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8">
	<title>Runningcrew formulier</title>
    <link rel="stylesheet" type="text/css" href="runningcrew-z.css">
    </head>
<body>

<header>
	<h1> Inschrijf formulier  </h1>
</header>

<main>
    <h2> hier kunt uw zich inschrijven voor onze volgende run<br> De Kunshal Night Light Run</h2>  <br> <br>
	<div class="formulier">
		<h2> Inschrijf Formulier </h2>
		<form name="reactieformulier" method="get" action="klant.php ">

		<fieldset>
            <id formulier></id>
			<legend>Uw gegevens</legend>
			<label for="voornaam">Voornaam:</label>
			<input required type="text" name="voornaam" ><br>
			<label for="achternaam">Achternaam:</label>
			<input required type="text" name="achternaam" placeholder="vul uw achternaam in"><br>
			<label for="email">Emailadres: </label>
			<input type="email" name="email" placeholder="vul uw email in"><br>
            <label for="Leeftijd">Leeftijd (min 12): </label>     <input type="number" name="leeftijd" min="12" step="1">
            <legend>Geboortedatum</legend>
			<input type="date" name="gebdatum">
		</fieldset>

		<fieldset>
			<legend>Geslacht</legend>
			<label for="vrouw">Vrouw:</label>
			<input type="radio" name="geslacht" id="vrouw" value="v" checked>
			<label for="man">Man:</label>
			<input type="radio" name="geslacht" id="man" value="m">
            <label for="genderneutraal">Genderneutraal:</label>
            <input type="radio" name="geslacht" id="genderneutraal" value="g">
             </fieldset>



		<fieldset>
			<legend> Hoeveel km wilt u gaan rennen</legend>
			<select  name="beste">
				<option value="">aantal km</option>
				<option type="radio"> 3km</option>
				<option type="radio"> 6 km </option>
				<option type="radio"> 9 km</option>


			</select>
		</fieldset>


		<fieldset>
			<legend>Heeft u eventueel suggesties voor een volgende locatie?</legend>
			<textarea cols="40" rows="5" name="reactie" id="reactie" placeholder="Beschrijf de sugesties of opmerkingen"></textarea>
			<br/>
		</fieldset>

            <fieldset>
            	<legend> Hoe snel rent u ongeveer</legend>
			<select  name="beste">
				<option value="">Je snelheid</option>
				<option type="radio"> 6 km/uur</option>
				<option type="radio"> 7 km/uur </option>
				<option type="radio"> 8 km/uur</option>
                <option type="radio"> 9 km/uur</option>
                <option type="radio"> 10 km/uur of hoger</option>
                </select>
            </fieldset>


		<fieldset>
			<legend> Alles ingevuld </legend>
			<input type="submit" id="submit" name="submit" value="Verzenden">
			<input type="reset" id="reset" name="reset" value="Opnieuw">
		</fieldset>
		</form>
	</div>


</main>


</body>
</html>
