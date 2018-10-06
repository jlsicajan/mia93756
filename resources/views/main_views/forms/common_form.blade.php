<div class="col-11 col-md-7 bg-white p-5">
    <form class="wedding_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="category" value="{{ $category }}">

        <div class="form-group">
            <input type="text" class="form-control input_bordered_primary" name="name" placeholder="Nombre completo" required="required">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input_bordered_primary" name="couple_name" placeholder="Nombre completo de la pareja" required="required">
        </div>

        <div class="form-group">
            <input type="text" class="form-control input_bordered_primary" name="phone" placeholder="Número de teléfono" required="required">
        </div>

        <div class="form-group">
            <input type="email" class="form-control input_bordered_primary" name="email" placeholder="nombre@ejemplo.com" required="required">
        </div>

        <div class="form-group">
            <textarea type="text" rows="7" class="form-control input_bordered_primary" name="history" required="required" placeholder="Cuéntanos tu historia"></textarea>
        </div>

        <div class="form-group">
            <input type="file" class="form-control input_bordered_primary" name="foto">
        </div>

        <div class="form-group text-center">
            <button type="button" class="btn btn-secondary wedding_form_send">Enviar</button>
        </div>

    </form>
    <div class="message_after_update hide text-center">
        <h4 class="text-primary">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dolore ea, illum perspiciatis repudiandae tempore temporibus. Amet asperiores atque ea eius, eligendi illum laborum nam quasi qui quia. Aut, nemo.
        </h4>
    </div>
</div>

<style type="text/css">
    /*this should be moved to scss and compiled with gulp (pending, also move rootcode css to scss) */
    .input_bordered_primary {
        display: inline-block;
        width: 100%;
        margin: 13px 0;
        padding: 10px;
        border: 2px dashed #ff009e;
        outline: none;
        font-size: 20px;
        font-family: 'Economica', 'Arial', sans-serif;
        font-weight: 400;
        transition: all 0.2s ease;
    }

    .input_bordered_primary:focus {
        border-color: #b4006c;
    }

    .wedding_form_send {
        width: 150px;
        height: 50px;
        padding: 10px 15px;
        margin-top: 20px;
        border: none;
        outline: none;
        cursor: pointer;
        color: white;
        font-family: 'Economica', 'Arial', sans-serif;
        font-size: 20px;
        font-weight: 700;
        background: #ff009e;
        transition: all 0.2s ease;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.wedding_form_send').unbind('click').click(function(){
            $(this).attr('disable', 'disable'); //disable the button to avoid two fast clicks
            let form_data = {};
            submit_form('/bodamia/', form_data, function(){//show the div with the message from admin
                $('.wedding_form').hide('slow');
                $('.message_after_update').show('slow');
            });
        });
    });
</script>