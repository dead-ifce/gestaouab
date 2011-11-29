	
<h2>Relatorio das Disciplinas </h2>

<table >
	
	<tr>
			<th>Nome</th>
			<th>Carga</th>
			<th>Semestre</th>
		
	</tr>
	
	
	<?php foreach ($disciplinas as $disciplina): ?>
	<tr>
		<td><?php echo $disciplina['Disciplina']['nome']; ?>&nbsp;</td>
		<td><?php echo $disciplina['Disciplina']['carga']; ?>h</td>
		<td><?php echo $disciplina['Disciplina']['semestre']; ?>&nbsp;</td>
	
	</tr>
	<?php endforeach; ?>
	
	</table>
	
	
		