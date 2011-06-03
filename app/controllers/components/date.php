<?php

class DateComponent extends Object {
    /**
	 * Criado com o intuito de facilitar a visualização do código
	 * */
	function format($acao = null, $data = null ){
		return date('Y-m-d', strtotime($acao, strtotime($data)));
	}

}

?>
