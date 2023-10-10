<?php

//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->id_usuario = $tarefa;
		$this->tarefa = $tarefa;

	}

	public function inserir() { //create
		$query = 'insert into tb_tarefas(id_usuario, tarefa)values('.$_SESSION['id_usuario'].', :tarefa)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
        	select 
				t.id, t.id_usuario, u.nome, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
				left join tb_usuarios as u on (t.id_usuario = u.id_usuario)  
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function remover() { //delete

		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

	public function recuperarTarefasPendentes() {
		$query = '
			select 
				t.id, t.id_usuario, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}

	class CadastroService {

		private $conexao;
		private $usuario;

		public function __construct(Conexao $conexao, Usuarios $usuario) {
			$this->conexao = $conexao->conectar();
			$this->usuario = $usuario;
	
		}
		public function cadastrarUsuario() {
			$query ='insert into tb_usuarios(nome, email, senha)values(:nome, :email, :senha)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome', $this->usuario->__get('nome'));
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->bindValue(':senha', $this->usuario->__get('senha'));
			$stmt->execute();					
		}
		public function recuperarUsuario() {
			$query = 'select id_usuario, email, senha from tb_usuarios';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		
	}


?>