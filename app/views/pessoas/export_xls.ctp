		
<h2>Informações Pessoais</h2>	
	
	    	<table id="dado_table">
				
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
			</table>
	    
	   
	    
		
		
