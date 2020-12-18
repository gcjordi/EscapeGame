<?php require "../View/JS/Inventaire.php";

?>

<img width="30" src="../View/IMG/inventaire/clef.png" id="key2" objet='<?= json_encode(['id' => 'key2', 'nom' => 'clé', 'img' => "../View/IMG/inventaire/clef.png"]) ?>' ondragstart="drag(event)">
<img width="30" src="../View/IMG/affiche_invitation.png" id="affiche1" objet='<?= json_encode(['id' => 'affiche1', 'nom' => 'affiche', 'img' => "../View/IMG/affiche_invitation.png"]) ?>' ondragstart="drag(event)">
<div id="delete" objet="key1">Delete</div>
<div id="deplace" objet="key1" newSlot="0">Deplace</div>
<div id="affichage" style="display: inline-flex;"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script type="text/javascript">


	function allowDrop(event) {
        event.preventDefault();
    }
    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

	$('#delete').on('click', function(e){
		var objet = $(this).attr('objet')
		var objet = inventaire.getItem(objet);
		
		if(objet != null){
			inventaire.deleteItem(objet)
			inventaire.affiche(affichage);
		}
	})

	affichage.ondrop = function(event){
		
		var	slot = $("#"+event.target.id).attr('slot')
		dropping(slot, event)
	}


	function dropping(actualSlot, event){
		var slot = actualSlot;
		var o = event.dataTransfer.getData('text')

		var oldObjet = inventaire.getItemBySlot(slot);

		var objet = inventaire.getItem(o)
		if(objet == null){
			var json = JSON.parse($("#"+o).attr('objet'))
			objet = new Objet(json.id, json.nom, json.img)

			$("#"+objet.id).remove()

			if(slot >= 0){
				inventaire.addItem(slot, objet)
			}else{
				inventaire.saveItem(objet)
			}

			
		}else{
			inventaire.deplaceItem(slot, objet)
		}


		inventaire.affiche(affichage);

	}


	$('#ajouter').on('click', function(e){
		var json = JSON.parse($(this).attr('objet'))
		var objet = new Objet(json.id, json.nom, json.img)
		inventaire.saveItem(objet)
		inventaire.affiche(affichage);

	})

	$('#deplace').on('click', function(e){
		var objet = $(this).attr('objet')
		var slot = $(this).attr('newSlot')
		var objet = inventaire.getItem(objet);
		if(objet != null){
			inventaire.deplaceItem(slot, objet)
			inventaire.affiche(affichage);
		}
		

	})

</script>