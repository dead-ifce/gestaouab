function validaCPF(field, rules, i, options){
	   var cpf = field.val();
	   console.log(cpf);
	   cpf = cpf.split(".").join("");
	   cpf = cpf.split("-").join("");
		console.log(cpf);
	   //cpf = remove(cpf, ".");
	   //cpf = remove(cpf, "-");

	   if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		  cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		  cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		  cpf == "88888888888" || cpf == "99999999999"){
		  return "* CPF inválido";
	   }

	   soma = 0;
	   for(i = 0; i < 9; i++)
	   	 soma += parseInt(cpf.charAt(i)) * (10 - i);
	   resto = 11 - (soma % 11);
	   if(resto == 10 || resto == 11)
		 resto = 0;
	   if(resto != parseInt(cpf.charAt(9))){
		 return "* CPF inválido";
	   }
	   soma = 0;
	   for(i = 0; i < 10; i ++)
		 soma += parseInt(cpf.charAt(i)) * (11 - i);
	   resto = 11 - (soma % 11);
	   if(resto == 10 || resto == 11)
		 resto = 0;
	   if(resto != parseInt(cpf.charAt(10))){
		 return "* CPF inválido";
	   }
	   //return false;
}