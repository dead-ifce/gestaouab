<link rel="stylesheet" href="/sisgest/css/print-preview.css" type="text/css" media="screen">
<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
<script src="/sisgest/js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<style type="text/css">
    
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


<?php //echo $this->Html->css(array("bootstrap")); ?>

<a class="print-preview">Print this page</a>
<div id="feature">
    
<table class="bordered-table">
        
    <tbody>
        <tr>
            <td colspan=5>
                <img src="http://virtual.ifce.edu.br/moodle/theme/aardvark_pro/images/core/logoA.png"/>
            </td>
        </tr>
        <?php foreach($calendarios as $calendario): ?>
        <tr>
            <td class="span2"><?php echo $calendario['Disciplina']['nome'] ?></td>
            <td class="span2"> Adicionar professor </td>
            <td class="span3">Polos</td>
            <td class="span1"><?php echo $calendario['Disciplina']['carga']."h" ?></td>
            <td class="span6">
                <?php $this->Util->printEventos($calendario['Evento']); ?>
                <?php //$this->Util->printEventos($this->Util->filterEvento($eventos, $disciplina['nome'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>