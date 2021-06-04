{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $borda }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $borda }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $borda }}">
    <br>
    <select name="motivo_contato" class="{{ $borda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>
