<script type="text/javascript">
	
	class Inventaire{
		inventaire = [];

		constructor(length, div){
			for (var i=0; i<length; i++){
				this.inventaire["slot"+i] = null;
			}
			this.length = length;
			this.div = div
		}
		saveItem(item){
			for(var i=0; i<this.length; i++){
				if(this.inventaire["slot"+i] == null)
					this.addItem(i, item);
				return true;
			}
		}
		addItem(slot, item){

			this.inventaire["slot"+slot] = item;
			item.setSlot(slot)
		}
		deleteItem(item){
				
				this.inventaire['slot'+item.slotActuel] = null;
				item.slotActuel = null;
			
		}
		deplaceItem(slot, item){
			var newSlot = parseInt(slot);
			var oldItem;
			var oldSlot = item.slotActuel;
			if(this.getItemBySlot(newSlot) != null){
				oldItem = this.inventaire["slot"+newSlot];
				this.deleteItem(oldItem);
				this.deleteItem(item);

				this.addItem(oldSlot, oldItem)
				this.addItem(newSlot, item);
				
			}else{
				this.deleteItem(item);
				this.addItem(newSlot, item);
			}
		}

		estPlein(){
			var b = true;
				for(var i=0; i<this.length && b;i++){
					if(this.inventaire["slot"+i] == null) b = false
				}
			return b;
		}
		getItem(id){
			for(var i=0; i<this.length; i++){

				if(this.inventaire["slot"+i] != null && this.inventaire["slot"+i].id == id)
					return this.inventaire["slot"+i];
			}
			return null;
		}
		affiche(){
			this.div.innerHTML= "";
			for(var i=0; i<this.length; i++){

				if(this.inventaire["slot"+i] != null){

					this.div.innerHTML += "<div id='slot"+i+"' class='slot' slot='"+i+"' ondragover='allowDrop(event)'><img class='itemInventaire' objet='"+this.inventaire["slot"+i].open+"' id='"+this.inventaire["slot"+i].id+"' width='80' slot='"+i+"' src='"+this.inventaire["slot"+i].img+"' ondragstart='drag(event)'></div>";
					var width = $("#"+this.inventaire["slot"+i].id).width()
					var height =  $("#"+this.inventaire["slot"+i].id).height()

					if(width >= height){
						$("#"+this.inventaire["slot"+i].id).css("width", "89%");
					}
				}else
					this.div.innerHTML += "<div id='slot"+i+"' class='slot' slot='"+i+"' ondragover='allowDrop(event)'></div>";
			}
		}
		getItemBySlot(slot){
			return this.inventaire['slot'+slot];
		}
	}

	class Objet{
		constructor(id, nom, img, open){
			this.id = id
			this.nom = nom;
			this.img = img;
			this.open = open;
			this.slotActuel = null;
		}
		setSlot(slot){
			this.slotActuel = slot;
		}
	}
</script>