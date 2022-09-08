<?php 

namespace Diretorio1;

class Exemplo {
	public function __toString() {
		return get_class($this);
	}

	public function teste(){
		echo "<p>.....teste";
	}
}