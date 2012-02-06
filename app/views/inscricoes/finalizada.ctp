<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/validation/languages/jquery.validationEngine-pt",
								   "/js/validation/jquery.validationEngine",
								   "/js/tablesorter/jquery.tablesorter.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"bootstrap","validationEngine.jquery")); ?>

<style type="text/css" media="screen">
	#info{
		text-align: center;
		margin: 15px 50px 30px 50px;
	}
	.infos_locais{
		margin: 15px 50px 30px 50px;
	}
</style>
<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Inscrições</h2>
	</div>		<!-- .block_head ends -->
	<div class="block_content">
		<div class="row">
			
				<div id="info">
					<h3>Prezado candidato, sua inscrição on-line foi finalizada. Por favor, leve os documentos necessários nos locais indicados abaixo para que possa efetivar sua inscrição</h3>
				</div>
				<div class="infos_locais">
					<p><b>Candidatos inscritos no Campus Fortaleza:</b></p>
					<p>Cada candidato deverá entregar sua documentação de 10 a 14 de outubro de 2011, na sala de Projetos de Capacitação da Diretoria de Educação a Distancia –DEAD - no Instituto Federal de Educação, Ciência Tecnologia do Ceará, Campus Fortaleza, (Av. 13 de Maio, Benfica – Fortaleza - CE), das 9h às 12h e das 14h às 17h.
					</p>
					<p><b>Candidatos inscritos no Campus Juazeiro do Norte:</b></p>
					<p>Cada candidato deverá entregar sua documentação de 10 a 14 de outubro de 2011, na sala do NTEAD no Instituto Federal de Educação, Ciência Tecnologia do Ceará, Campus de Juazeiro do Norte, (Av. Plácido Aderaldo Castelo, 1646 – Planalto, Juazeiro do Norte- CE), das 9h às 12h e das 14h às 17h.</p>
				</div>
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->



	
