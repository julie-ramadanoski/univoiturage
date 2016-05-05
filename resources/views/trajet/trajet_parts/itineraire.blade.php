{{-- block où l'on demande à l'utilisateur de remplir sa ville de départ, sa ville d'arrivée, ses étapes, ainsi que s'il compte passer par l'autoroute --}}

	<label>
		Point de départ
		<input type="text" id="from" placeholder="Point de départ" name="villes[]" required>
	</label>
	<input type="hidden" name="distances[]" value="0">
	<input type="hidden" name="prices[]" value="0">
	<input type="hidden" name="durees[]" value="0">

	<div class="steps-container">
		<div id="steps">

		</div>
		<button id="add-step" type="button">+</button>
	</div>

	<label>
		Point d'arrivée
		<input type="text" id="to" placeholder="Point d'arrivée" name="villes[]" required>
	</label>
	<input type="hidden" name="distances[]">
	<input type="hidden" name="prices[]">
	<input type="hidden" name="durees[]">
	<br>
	<label>
		<input type="checkbox" value="on" name="highway" id="highway">
		Trajet empruntant l'autoroute
	</label>