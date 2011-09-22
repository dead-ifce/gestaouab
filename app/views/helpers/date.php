<?php
/* /app/views/helpers/link.php */

class DateHelper extends AppHelper {
    function makeEdit($title, $url) {
        // A lógica para criar um link especialmente formatado vai aqui...
    }
		
		function printAula($inicio = null, $fim = null,$aula){
			return "<b>AULA $aula:</b> ".date('d-m-Y', strtotime($inicio)). " a ".date('d-m-Y', strtotime($fim));
		}
		
		function printEncontro($inicio = null, $fim = null){
			return "<b>Encontro Presencial:</b> ".date('d-m-Y', strtotime($inicio)). " (".
										date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
		}
		
		function printExame($inicio = null, $fim = null){
			return "<b>Encontro Exame:</b> ".date('d-m-Y', strtotime($inicio)). " (".
										date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
		}
		
		function printSegundaChamada($inicio = null, $fim = null){
			return "<b>Segunda Chamada:</b> ".date('d-m-Y', strtotime($inicio)). " (".
										date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
		}
		function printExameFinal($inicio = null, $fim = null){
			return "<b>Exame Final:</b> ".date('d-m-Y', strtotime($inicio)). " (".
										date('H:i', strtotime($inicio))." - ".date('H:i', strtotime($fim)). ")";
		}
	
		
}

?>
