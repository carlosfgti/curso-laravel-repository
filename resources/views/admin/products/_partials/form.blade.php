<div class="form-group">
    {{ Form::text('name', null, ['placeholder' => 'Nome', 'class' => 'form-control']) }}
</div>
<div class="form-group">
        {{ Form::text('url', null, ['placeholder' => 'URL', 'class' => 'form-control']) }}
</div>
<div class="form-group">
        {{ Form::text('price', null, ['placeholder' => 'Preço', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::textarea('description', null, ['placeholder' => 'Descrição', 'class' => 'form-control']) }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>