<div class="col-11 col-md-7">
    <form class="form-mia-back">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_token" value="{{ $category }}">
        <div class="form-group">
            <label for="nombre_completo">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre_completo" id="nombre_completo"
                   placeholder="Nombre completo..." required>
        </div>
        <div class="form-group">
            <label for="nombre_secundario">Nombre de la pareja</label>
            <input type="text" class="form-control" name="nombre_secundario" id="nombre_secundario"
                   placeholder="Nombre completo de la pareja..." required>
        </div>
        <div class="form-group">
            <label for="telefono">No. de Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="0000-0000" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" required>
        </div>
        <div class="form-group">
            <label for="historia">Cuéntanos tu historia: </label>
            <textarea type="text" rows="5" class="form-control" name="historia" id="historia" required></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>

        <button type="submit" class="btn btn-secondary">Enviar</button>
    </form>
</div>