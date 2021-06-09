{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $borda }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
        class="{{ $borda }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borda }}">
    <br>
    <select name="motivo_contato_id" class="{{ $borda }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos as $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contato_id') == $motivo->id ? 'selected' : '' }}>{{ $motivo->descricao }}
            </option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $borda }}"
        placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') != '' ? old('mensagem') : '' }}</textarea>
    <br>
    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>
@if (sizeof($errors) > 0)
    <div style="position: relative; bottom:0px; left:0px; width: 100%; background-color:red;">
        @foreach ($errors->all() as $error)
            <h3>{{ $error }}</h3>
        @endforeach
    </div>
@endif
