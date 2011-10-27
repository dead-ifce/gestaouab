<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/datatable/jquery.dataTables.min",
								   "/js/datatable/ZeroClipboard",
								   "/js/datatable/TableTools.min"),false); ?>
<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"style_white","/css/white_label/jquery.datatables",'TableTools')); ?>
<script>
	$(document).ready(function(){
		TableTools.DEFAULTS.aButtons = [ "copy", "csv", "xls" ];
    	oTable = $('#inscricoes_table').dataTable({
				"sDom": 'T<"clear">lfrtip',
				"bFilter": false,
				"oTableTools": {
							"sSwfPath": "<?php echo Dispatcher::baseUrl();?>/swf/copy_cvs_xls_pdf.swf",
							"aButtons": [
											{
												"sExtends": "copy",
												"sButtonText": "Copiar"
											},
											{
												"sExtends": "csv",
												"sButtonText": "CSV"
											},
											{
												"sExtends": "xls",
												"sButtonText": "Excel"
											}
										]
				},
		        "sPaginationType": "full_numbers",
				"oLanguage": {
				            "sUrl": "<?php echo Dispatcher::baseUrl();?>/js/datatable/pt_BR.txt"
				        },
				"bProcessing": true,
				 "bServerSide": true,
				 "sAjaxSource": "<?php echo Dispatcher::baseUrl();?>/inscricoes/show_inscricoes"
		    });
		
		$("#inscricoes_table tbody tr").live("mouseover mouseout", function(event) {
		  if ( event.type == "mouseover" ) {
		    $(".del",this).show();
		  } else {
		    $(".del").hide();
		  }
		});
		
   	});
</script>
<style type="text/css" media="screen">
	.del{
		margin-right: 10px;
		display:none;
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
			<div class="span16 columns">
				<table id="inscricoes_table">
				<thead>
				<tr>
						<th>Nome</th>
						<th>CPF</th>
						<th>Email</th>
						<th>Vaga</th>
						<th>Dia</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td></td>
					<td>
						
					</td>
					<td></td>
					<td></td>
					<td class="actions">
					
					</td>
				</tr>
			</tbody>
				</table>
			</div>
		</div>
		
	</div>		<!-- .block_content ends -->
	
	<div class="bendl"></div>
	<div class="bendr"></div>
</div>		<!-- .block ends -->



	
