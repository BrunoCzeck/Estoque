$(function() {
	$("#buscar").keyup(function(){ //clicou na tecla inicia função 
		var buscar = $(this).val();
		
		
		if (buscar != ''){
			var dados = {
			palavra : buscar
		}
			$.post('proc_pesq_produto.php', dados, function(retorna){
			
			$(".buscar").html(retorna);
				});
			}
		});
		
});