@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card ">
                <div class="card-header text-center">Submissão de Pedidos de Parecer - Declaração de Consentimento Informado, Livre e Esclarecido</div>
                <div class="card-body">
                    <div class="row md-3 mb-1">
                        <label for="razoes_parecer" class="col-md-12 col-form-label text-center">Este MODELO destina-se a ser adaptado a cada caso concreto e os itens e sugestões nele contidos não esgotam os termos e possibilidades que cada investigador queira utilizar para o tornar mais claro. A linguagem a utilizar deverá ser tão simples quanto possível, livre de termos técnicos (exceto quando os participantes forem profissionais de saúde) e globalmente adequada à literacia dos participantes a recrutar. Não esquecer apagar, quando fizer o seu MODELO, todos os dizeres aqui vistos entre parêntesis retos.</label>
                        <label for="razoes_parecer" class="col-md-12 col-form-label text-center">Por favor, leia com atenção a seguinte informação. Se achar que algo está incorreto ou não está claro, não hesite em solicitar mais informações. Se concorda com a proposta que lhe foi feita, queira assinar este documento.</label>
                    </div>
                    </BR>
                    <form method="POST" action="{{ route('gerar-pdf-q252') }}">
                        @csrf
                        <div class="row md-3 mb-1">
                            <label for="titulo" class="col-md-3 col-form-label text-center">{{ __('Título do estudo/projeto:') }}</label>
                            <div class="col-lg">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus placeholder="Título do estudo/projeto">
                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="enquadramento" class="col-md-3 col-form-label text-center">{{ __('Enquadramento:') }}</label>
                            <div class="col-lg">
                                <textarea id="enquadramento" class="form-control @error('enquadramento') is-invalid @enderror" cols="80" rows="6" name="enquadramento" style="resize:none" placeholder="mencionar a unidade de saúde implicada; se tiver âmbito académico, referir se é mestrado ou doutoramento, escola, outro tipo de enquadramento e orientador/a e/ou investigador/a responsável pelo estudo/projeto"></textarea>
                                @error('enquadramento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="explicacao" class="col-md-3 col-form-label text-center">{{ __('Explicação do estudo/projeto:') }}</label>
                            <div class="col-lg">
                                <textarea id="explicacao" class="form-control @error('explicacao') is-invalid @enderror" cols="80" rows="6" name="explicacao" style="resize:none" placeholder="referir se é questionário para preencher, entrevista gravada, recolha de dados de processo ou outro método; que tipo de dados serão colhidos; se a seleção do/a participante é aleatória ou há grupo de controlo; explicar sumariamente o método; mencionar local ou os locais onde o/a investigador/a se encontra com o/a participante, quantas vezes e durante quanto tempo aproximadamente; garantir destruição de gravações (áudio ou vídeo) num determinado prazo"></textarea>
                                @error('explicacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="condicoes" class="col-md-3 col-form-label text-center">{{ __('Condições e financiamento:') }}</label>
                            <div class="col-lg">
                                <textarea id="condicoes" class="form-control @error('condicoes') is-invalid @enderror" cols="80" rows="6" name="condicoes" style="resize:none" placeholder="referir se há ou que não há pagamento de deslocações ou contrapartidas aos participantes; informar quem financia o estudo (o/a investigador/a ou outrem); mencionar o caráter voluntário da participação e a ausência de prejuízos, assistenciais ou outros, caso não queira ou desista de participar; informar que o estudo mereceu Parecer favorável da Comissão de Ética … (mencionar qual)"></textarea>
                                @error('condicoes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="confidencialidade" class="col-md-3 col-form-label text-center">{{ __('Confidencialidade e anonimato:') }}</label>
                            <div class="col-lg">
                                <textarea id="confidencialidade" class="form-control @error('confidencialidade') is-invalid @enderror" cols="80" rows="6" name="confidencialidade" style="resize:none" placeholder="garantir confidencialidade e uso exclusivo dos dados recolhidos para o presente estudo; prometer anonimato (não registo de dados de identificação) ou, caso contrário, afirmar que foi pedida e obtida autorização da Comissão Nacional de Proteção de Dados, garantindo, em qualquer caso, que a identificação dos participantes nunca será tornada pública; assegurar que os contactos serão feitos em ambiente de privacidade"></textarea>
                                @error('confidencialidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="agradecimentos" class="col-md-3 col-form-label text-center">{{ __('… agradecimentos e identificação do/a investigador/a:') }}</label>
                            <div class="col-lg">
                                <textarea id="agradecimentos" class="form-control @error('agradecimentos') is-invalid @enderror" cols="80" rows="6" name="agradecimentos" style="resize:none" placeholder="nome, profissão, local de trabalho, contacto telefónico, endereço eletrónico – e da pessoa que pede o consentimento, se for diferente"></textarea>
                                @error('agradecimentos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" onclick="downloadAndRedirect()" class="btn btn-primary">
                                {{ __('Submeter') }}
                            </button>
                            <script>
                                function downloadAndRedirect() {
                                    // Start the download
                                    window.location.href = '/download-route';

                                    // Redirect to dashboard after a delay
                                    setTimeout(function() {
                                        window.location.href = '/dashboard';
                                    }, 1000); // adjust delay as needed
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection