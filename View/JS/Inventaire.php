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
			if(this.inventaire["slot"+newSlot] != null){
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
					this.div.innerHTML += "<div id='slot"+i+"' class='slot' slot='"+i+"' ondragover='allowDrop(event)' style='border : 1px solid black; background-color : white; width: 100px; height: 100px;'><img id='"+this.inventaire["slot"+i].id+"' width='80' slot='"+i+"' src='"+this.inventaire["slot"+i].img+"' ondragstart='drag(event)'></div>";
				}else
					this.div.innerHTML += "<div id='slot"+i+"' class='slot' slot='"+i+"' ondragover='allowDrop(event)' style='border : 1px solid black; background-color : white; width: 100px; height: 100px;'></div>";
			}
		}

		getItemBySlot(slot){
			return this.inventaire['slot'+slot];
		}
	}


	class Objet{
		constructor(id, nom, img){
			this.id = id
			this.nom = nom;
			this.img = img;
			this.slotActuel = null;
		}

		setSlot(slot){
			this.slotActuel = slot;
		}

		


	}



</script>