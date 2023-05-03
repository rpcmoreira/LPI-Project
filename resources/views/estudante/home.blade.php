<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <title>Formulário para Estudo/Projeto</title>
  <!--<link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >-->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
    </nav>
  </header>
  <h1>Título do Estudo/Projeto:</h1>
  <div class="center">
    <form action="submit-form.php" method="POST">
      <h2>Identificação do(s) Proponente(s)</h2>
      <label for="nome">Nome(s):</label>
      <input type="text" id="nome" name="nome" required><br>
      <label for="formacao">Licenciatura/Mestrado/Doutoramento/Outro:</label>
      <input type="text" id="formacao" name="formacao" required><br>

      <label for="orientador">Nome do orientador e do coorientador (caso se aplique):</label>
      <input type="text" id="orientador" name="orientador"><br>

      <label for="filiacao">Filiação Institucional:</label>
      <input type="text" id="filiacao" name="filiacao" required><br>

      <h2>Anexar resumo do Curriculum Vitae (máximo 1 página A4)</h2>
      <input type="file" id="curriculo" name="curriculo" accept=".pdf,.doc,.docx"><br>

      <h2>Justificação:</h2>
      <textarea id="justificacao" name="justificacao" rows="5" cols="50" required></textarea><br>

      <h2>Objetivos do Estudo/Projeto:</h2>
      <textarea id="objetivos" name="objetivos" rows="5" cols="50" required></textarea><br>

      <h2>Datas Previstas</h2>
      <label for="data_inicio">Data prevista de início dos trabalhos:</label>
      <input type="date" id="data_inicio" name="data_inicio" required><br>

      <label for="data_fim">Data prevista de fim dos trabalhos:</label>
      <input type="date" id="data_fim" name="data_fim" required><br>

      <label for="data_inicio_colheita">Data prevista de início da colheita de dados:</label>
      <input type="date" id="data_inicio_colheita" name="data_inicio_colheita" required><br>

      <label for="data_fim_colheita">Data prevista de fim da colheita de dados:</label>
      <input type="date" id="data_fim_colheita" name="data_fim_colheita" required><br>

      <h2>Metodologia</h2>
      <label for="tipo_estudo">Tipo de Estudo:</label>
      <input type="text" id="tipo_estudo" name="tipo_estudo" required><br>

      <label for="populacao">População e Amostra/Informantes:</label>
      <input type="text" id="populacao" name="populacao" required><br>

      <label for="criterios">Critérios de Inclusão/Exclusão:</label>
      <input type="text" id="criterios" name="criterios" required><br>

      <label for="locais">Locais onde Decorre a Investigação:</label>
      <input type="text" id="locais" name="locais" required><br>
      <label for="instrumentos">Instrumento(s) de Colheita de Dados (juntar exemplo, no formato, que vai ser utilizado):</label>
      <input type="text" id="instrumentos" name="instrumentos" required><br>

      <label for="confidencialidade">Garantia de Confidencialidade:</label>
      <input type="checkbox" id="confidencialidade" name="confidencialidade" value="sim" required> Sim<br>

      <h2>Consentimento Informado</h2>
      <label>Os participantes são capazes de dar o seu consentimento informado, livre e esclarecido?</label>
      <input type="radio" id="consentimento_sim" name="consentimento" value="sim" required> Sim
      <input type="radio" id="consentimento_nao" name="consentimento" value="nao" required> Não<br>

      <label for="motivo">Se não, indique p.f. qual o motivo:</label>
      <input type="text" id="motivo" name="motivo"><br>

      <label>São indivíduos ou grupos vulneráveis?</label>
      <input type="checkbox" id="vulneraveis" name="vulneraveis" value="sim"> Sim<br>

      <label>Há previsão de danos para os sujeitos da investigação?</label>
      <input type="radio" id="previsao_danos_sim" name="previsao_danos" value="sim"> Sim
      <input type="radio" id="previsao_danos_nao" name="previsao_danos" value="nao"> Não<br>

      <label for="danos">Explicitar em caso afirmativo:</label>
      <input type="text" id="danos" name="danos"><br>

      <label>Há previsão de benefícios para os sujeitos da investigação?</label>
      <input type="radio" id="previsao_beneficios_sim" name="previsao_beneficios" value="sim"> Sim
      <input type="radio" id="previsao_beneficios_nao" name="previsao_beneficios" value="nao"> Não<br>

      <label for="beneficios">Explicitar em caso afirmativo:</label>
      <input type="text" id="beneficios" name="beneficios"><br>

      <label for="custos">Custos de participação para os sujeitos da investigação e possível compensação:</label>
      <input type="text" id="custos" name="custos"><br>

      <input type="submit" value="Enviar">
    </form>
  </div>
</body>

</html>