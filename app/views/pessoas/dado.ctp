


<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min",
								   "/js/jquery/jquery-ui-1.8.16.custom.min",
								   "/js/datatable/jquery.dataTables.min",
								   "/js/datatable/ZeroClipboard",
								   "/js/datatable/TableTools.min"),false); ?>


<?php echo $this->Html->css(array('jquery-ui-1.8.13.custom',"style_white","/css/white_label/jquery.datatables",'TableTools')); ?>

<script>
	$(document).ready( function () {
    $('#dados_table').dataTable( {
        "sDom": 'T<"clear">lfrtip',
        "oTableTools":
        {
            "sSwfPath": "<?php echo Dispatcher::baseUrl();?>/swf/copy_cvs_xls_pdf.swf"            
        },
        "sPaginationType": "full_numbers",
        "oLanguage":
        {
		    "sUrl": "<?php echo Dispatcher::baseUrl();?>/js/datatable/pt_BR.txt"
        }
    } );
} );

</script>
<!--
<script>
	$(document).ready(function(){
    	oTable = $('#dados_table').dataTable({
    		    "sDom": 'T<"clear">lfrtip',
    		    "bFilter": false,
    			"oTableTools": {
    				"sSwfPath": "<?php echo Dispatcher::baseUrl();?>/swf/copy_cvs_xls_pdf.swf",
    				
            "aButtons": [
                "copy",
                "print",
                {
                    "sExtends":    "collection",
                    "sButtonText": "Save",
                    "aButtons":    [ "csv", "xls", "pdf" ]
                }
            ]
        },
		        "sPaginationType": "full_numbers",		        
				"oLanguage": {
				            "sUrl": "<?php echo Dispatcher::baseUrl();?>/js/datatable/pt_BR.txt"
				        },
				       

		    });
		
		// $("#pessoas_table tbody .status").click(function(){
		// 			$("#pessoas_table tbody .status").hide();
		// 			$("#pessoas_table tbody .statusOptions").show();
		// 		});
		
	
		
   	});
</script>

-->


<style>

#dados_table{
	width: 100%;
	border-collapse:collapse;
	hi
	
}
#edit-status{
	text-align:center;
}
.status{
	cursor: pointer;
}
.statusOptions{
	margin-top:20px;
}
label{
	margin-right: 5px;
}
label:after{
	content: ":";
}
</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Informações Pessoais</h2>	
	</div> 		<!-- .block_head ends -->

	<div class='block_content'>
		
		<div class="row">
	    <div class="span14 columns"> 
	    	<table id='dados_table'>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Nascimento</th>
						<th>Estado civil</th>
						<th>Sexo</th>
						<th>CPF</th>
						<th>RG</th>
						<th>Orgão emissor</th>
						<th>Nacionalidade</th>
						<th>Naturalidade</th>
						<th>Pai</th>
						<th>Mãe</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pessoas as $pessoa): ?>
						<tr>
							<td><?php echo $pessoa['Pessoa']['nome']; ?></td>
							<td><?php echo $pessoa['Pessoa']['nascimento']; ?></td>
							<td><?php echo $pessoa['Pessoa']['estadocivil']; ?></td>
							<td><?php echo $pessoa['Pessoa']['sexo']; ?> </td>
							<td><?php echo $pessoa['Pessoa']['cpf']; ?></td>
							<td><?php echo $pessoa['Pessoa']['rg']; ?></td>
							<td><?php echo $pessoa['Pessoa']['rg_orgao']; ?></td>
							<td><?php echo $pessoa['Pessoa']['nacionalidade']; ?></td>
							<td><?php echo $pessoa['Pessoa']['naturalidade']; ?></td>
							<td><?php echo $pessoa['Pessoa']['pai']; ?></td>
							<td><?php echo $pessoa['Pessoa']['mae']; ?></td>
						</tr>	  	 
					<?php endforeach; ?>
				</tbody>
			</table>
			
	    </div> 
	   
	    </div> 
		
		
	
	</div>		<!-- .block_content ends -->

	 <div class="bendl"></div>
	 <div class="bendr"></div> 

</div>		<!-- .block.small.left ends -->



<!-- link para gerar o relatório -->
<?php echo $this->Html->link(
			$this->Html->image('planilha.ico', array('alt'=> __('Download da planilha', true), 'border' => '0')),
			'/pessoas/export_xls/',
			array('target' => '_blank', 'escape' => false)
		);
	?>

	
    
	

