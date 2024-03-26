<?php

class LoginService {
    protected $conexao;

    public function __construct(Conexao $conexao) {
        $this->conexao = $conexao->conectar();
    }

    public function inserirUsuario($nome, $email, $senha) {
        // Criação da query de inserção
        $query = 'INSERT INTO tb_usuarios (nome, email, senha) VALUES (:nome, :email, :senha)';
        
        // Preparação da query
        $stmt = $this->conexao->prepare($query);
        
        // Bind dos parâmetros
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        
        // Execução da query
        $stmt->execute();
    }

    public function verificarLogin($email, $senha) {
        // Query para buscar o usuário com base no email e senha
        $query = 'SELECT * FROM tb_usuarios WHERE email = :email AND senha = :senha';
        
        // Preparação da query
        $stmt = $this->conexao->prepare($query);
        
        // Bind dos parâmetros
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        
        // Execução da query
        $stmt->execute();
        
        // Retorna o resultado da busca
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Exemplo de uso:
// Crie um objeto Conexao com os detalhes da conexão com o banco de dados

$conexao = new Conexao($host, $dbname, $usuario, $senha);
$loginService = new LoginService($conexao);

// Para inserir um usuário
$loginService->inserirUsuario('Nome do Usuário', 'email@example.com', 'senha123');

// Para verificar o login
$resultado = $loginService->verificarLogin('email@example.com', 'senha123');

if ($resultado) {
    echo "Login bem-sucedido. Bem-vindo, " . $resultado['nome'];
} else {
    echo "Credenciais inválidas. Por favor, tente novamente.";
}
?>