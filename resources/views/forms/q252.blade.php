@extends('layouts.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="height: 100%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card ">
                    <div class="card-header text-center">Formulário para envio de síntese de resultados</div>
                    <div class="card-body">
                        <form method="POST" action="/submit">
                            @csrf
                            <div>
                                <label for="titulo">Título do estudo/projeto:</label><br>
                                <input type="text" id="titulo" name="titulo" placeholder="Insira o título do estudo/projeto">
                            </div>
                            <div>
                                <label for="enquadramento">Enquadramento:</label><br>
                                <textarea id="enquadramento" name="enquadramento" placeholder="Mencione a unidade de saúde implicada; se tiver âmbito académico, referir se é mestrado ou doutoramento, escola, outro tipo de enquadramento e orientador/a e/ou investigador/a responsável pelo estudo/projeto"></textarea>
                            </div>
                            <div>
                                <label for="explicacao">Explicação do estudo/projeto:</label><br>
                                <textarea id="explicacao" name="explicacao" placeholder="Referir se é questionário para preencher, entrevista gravada, recolha de dados de processo ou outro método; que tipo de dados serão colhidos; se a seleção do/a participante é aleatória ou há grupo de controlo; explicar sumariamente o método; mencionar local ou os locais onde o/a investigador/a se encontra com o/a participante, quantas vezes e durante quanto tempo aproximadamente; garantir destruição de gravações (áudio ou vídeo) num determinado prazo"></textarea>
                            </div>
                            <div>
                                <label for="condicoes">Condições e financiamento:</label><br>
                                <textarea id="condicoes" name="condicoes" placeholder="Referir se há ou que não há pagamento de deslocações ou contrapartidas aos participantes; informar quem financia o estudo (o/a investigador/a ou outrem); mencionar o caráter voluntário da participação e a ausência de prejuízos, assistenciais ou outros, caso não queira ou desista de participar; informar que o estudo mereceu Parecer favorável da Comissão de Ética … (mencionar qual)"></textarea>
                            </div>
                            <div>
                                <label for="confidencialidade">Confidencialidade e anonimato:</label><br>
                                <textarea id="confidencialidade" name="confidencialidade" placeholder="Garantir confidencialidade e uso exclusivo dos dados recolhidos para o presente estudo; prometer anonimato (não registo de dados de identificação) ou, caso contrário, afirmar que foi pedida e obtida autorização da Comissão Nacional de Proteção de Dados, garantindo, em qualquer caso, que a identificação dos participantes nunca será tornada pública; assegurar que os contactos serão feitos em ambiente de privacidade"></textarea>
                            </div>
                            <div>
                                <label for="agradecimentos">Agradecimentos e identificação do/a investigador/a:</label><br>
                                <textarea id="agradecimentos" name="agradecimentos" placeholder="Nome, profissão, local de trabalho, contacto telefónico, endereço eletrónico – e da pessoa que pede o consentimento, se for diferente] "></textarea>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection