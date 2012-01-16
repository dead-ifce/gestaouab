<?php echo $javascript->link(array("/js/jquery/jquery-1.5.2.min"),false); ?>

<style type="text/css" media="print">
    
    .pessoas{
/*        display: none;*/
    }
    .span4 {
        width: 140px;
    }
    
    @page {
    	size: a4 landscape;
    	margin: 21mm 15mm;
    	padding-bottom: 0.5em;
    }
    
    body{
        {background: #FFF; color: #000; font: 12pt serif;}
    }
    
    
    table {
/*      table-layout: fixed;*/
      width: 100%;
      padding: 0;
      font-size: 13px;
      border-collapse: collapse;
    }
    table th, table td {
      padding: 10px 10px 9px;
      line-height: 18px;
      text-align: left;
    }
    table th {
      padding-top: 9px;
      font-weight: bold;
      vertical-align: middle;
    }
    table td {
      vertical-align: middle;
      border-top: 1px solid #ddd;
    }
    table tbody th {
      border-top: 1px solid #ddd;
      vertical-align: top;
    }
    .condensed-table th, .condensed-table td {
      padding: 5px 5px 4px;
    }
    .bordered-table {
      border: 1px solid #ddd;
      border-collapse: separate;
      *border-collapse: collapse;
      /* IE7, collapse table to remove spacing */

      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
    }
    .bordered-table th + th, .bordered-table td + td, .bordered-table th + td {
      border-left: 1px solid #ddd;
    }
    .bordered-table thead tr:first-child th:first-child, .bordered-table tbody tr:first-child td:first-child {
      -webkit-border-radius: 4px 0 0 0;
      -moz-border-radius: 4px 0 0 0;
      border-radius: 4px 0 0 0;
    }
    .bordered-table thead tr:first-child th:last-child, .bordered-table tbody tr:first-child td:last-child {
      -webkit-border-radius: 0 4px 0 0;
      -moz-border-radius: 0 4px 0 0;
      border-radius: 0 4px 0 0;
    }
    .bordered-table tbody tr:last-child td:first-child {
      -webkit-border-radius: 0 0 0 4px;
      -moz-border-radius: 0 0 0 4px;
      border-radius: 0 0 0 4px;
    }
    .bordered-table tbody tr:last-child td:last-child {
      -webkit-border-radius: 0 0 4px 0;
      -moz-border-radius: 0 0 4px 0;
      border-radius: 0 0 4px 0;
    }
    
    table .span1 {
      width: 20px;
    }
    table .span2 {
      width: 60px;
    }
    table .span3 {
      width: 100px;
    }
    table .span4 {
      width: 140px;
    }
    table .span5 {
      width: 180px;
    }
    table .span6 {
      width: 220px;
    }
    
</style>
<?php echo $this->Html->css(array("bootstrap")); ?>
<style type="text/css" media="screen">
    .danger{
        display:none;
        margin-top: 10px;
    }
    .pessoa_info{
        margin-bottom: 10px;
    }
</style>

<div class="block">

	<div class="block_head">
		<div class="bheadl"></div>
		<div class="bheadr"></div>
		
		<h2>Calendário</h2>	
	</div>		<!-- .block_head ends -->

	<div class="block_content">
    
        <table class="bordered-table">
        
            <tbody>
                <tr>
                    <td colspan=5>
                        <img src="http://virtual.ifce.edu.br/moodle/theme/aardvark_pro/images/core/logoA.png"/>
                    </td>
                </tr>
                <?php foreach($calendarios as $calendario): ?>
                <tr>
                    <td class="nome_disciplina span2"><?php echo $calendario['Disciplina']['nome'] ?>
                    <br />
                    <a class="btn danger" href="/sisgest/calendarios/delete/<?php echo $calendario['Calendario']['id']."/".$this->params['turma_id']."/".$this->params['ano']."/".$this->params['semestre'] ?>">Apagar</a>
                    </td>
                    <td class="span6">
                        <?php foreach($calendario['Pessoa'] as $pessoa): ?>
                            <div class="pessoa_info">
                                 <?php echo $this->Util->printNome($pessoa['nome']); ?><br />
                                 <?php echo $pessoa['email']; ?><br />
                                 <?php echo $pessoa['cel']; ?><br />
                            </div>
                        <?php endforeach; ?>
                        <a href="/sisgest/calendarios/add_pessoas/<?php echo $calendario['Calendario']['id']  ?>" class="add_pessoa">Adicionar pessoas</button> 
                     </td>
                    <td class="span3">
                         <?php foreach($calendario['Polo'] as $polo): ?>
                                <?php echo $polo['nome']; ?><br />
                            <?php endforeach; ?>
                        <a href="/sisgest/calendarios/add_polos/<?php echo $calendario['Calendario']['id']  ?>" class="add_pessoa">Adicionar polos</button>
                    </td>
                    <td class="span1"><?php echo $calendario['Disciplina']['carga']."h" ?></td>
                    <td class="span6">
                        <?php $this->Util->printEventos($calendario['Evento']); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php $parametros = "turma_id=".$this->params['turma_id']."&ano=".$this->params['ano']."&semestre=".$this->params['semestre'] ?>
        <a class="btn primary" href="http://localhost/cgi-bin/print_calendario?<?php echo $parametros; ?>" >Gerar PDF</a>
        <a class="btn primary" href="/sisgest/calendarios/view/<?php echo $this->params['turma_id']."/".$this->params['ano']."/".$this->params['semestre'] ?>">Editar</a>
    </div>		<!-- .block_content ends -->

		<div class="bendl"></div>
		<div class="bendr"></div>

</div>

<script type="text/javascript" charset="utf-8">
    $(".nome_disciplina").mouseover(function(){
        $(this).find(".danger").css("display", "inline-block");
    }).mouseout(function(){
         $(this).find(".danger").hide();
    });
</script>
