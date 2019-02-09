@csrf
<div class="form-group">
    <input type="text" value="{{ $user->name ?? old('name') }}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="email" value="{{ $user->email ?? old('email') }}" name="email" class="form-control" placeholder="E-mail">
</div>
<div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Senha">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>