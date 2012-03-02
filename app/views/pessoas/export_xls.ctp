		
<h2>Informacoes Pessoais</h2>	
	
	    	<table id="dado_table">
				
					<tr>
						<?php if(isset($pessoas[0]['Pessoa']['nome'])): ?><th>Nome</th> <?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['nascimento'])): ?><th>Nascimento</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['estadocivil'])): ?><th>Estado civil</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['sexo'])): ?><th>Sexo</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['cpf'])): ?><th>CPF</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['rg'])): ?><th>RG</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['rg_orgao'])): ?><th>Orgão emissor</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['nacionalidade'])): ?><th>Nacionalidade</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['naturalidade'])): ?><th>Naturalidade</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['pai'])): ?><th>Pai</th><?php endif; ?>
						<?php if(isset($pessoas[0]['Pessoa']['mãe'])): ?><th>Mãe</th><?php endif; ?>
					</tr>
					<?php foreach ($pessoas as $pessoa): ?>
						<tr>
							<?php if(isset($pessoa['Pessoa']['nome'])): ?><td><?php echo $pessoa['Pessoa']['nome']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['nascimento'])): ?><td><?php echo $pessoa['Pessoa']['nascimento']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['estadocivil'])): ?><td><?php echo $pessoa['Pessoa']['estadocivil']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['sexo'])): ?><td><?php echo $pessoa['Pessoa']['sexo']; ?> </td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['cpf'])): ?><td><?php echo $pessoa['Pessoa']['cpf']; ?> </td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['rg'])): ?><td><?php echo $pessoa['Pessoa']['rg']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['rg_orgao'])): ?><td><?php echo $pessoa['Pessoa']['rg_orgao']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['nacionalidade'])): ?><td><?php echo $pessoa['Pessoa']['nacionalidade']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['naturalidade'])): ?><td><?php echo $pessoa['Pessoa']['naturalidade']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['pai'])): ?><td><?php echo $pessoa['Pessoa']['pai']; ?></td><?php endif; ?>
							<?php if(isset($pessoa['Pessoa']['mae'])): ?><td><?php echo $pessoa['Pessoa']['mae']; ?></td><?php endif; ?>
						</tr>	  	 
					<?php endforeach; ?>
			</table>
	    
	   
	    
		
		
