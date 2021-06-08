{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $borda }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $borda }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $borda }}">
    <br>
    <select name="motivo" class="{{ $borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}" placeholder="Preencha aqui a sua mensagem"></textarea>
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>
@if (sizeof($errors) > 0)
<div style="position: absolute; top:0px; left:0px; width: 100%; background-color:red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
@endif
