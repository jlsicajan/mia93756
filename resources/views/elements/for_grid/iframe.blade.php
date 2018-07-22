<div class="row flex-column align-items-start mb-28px ml-0">
    <div class="grid-header col-12 {{ isset($classes) ? $classes : '' }}">
        <span class="font_2 {{ isset($inverted) && $inverted ? 'color-primary' : 'color-white' }} font_2_grid"><i class="fa fa-instagram {{ isset($inverted) && $inverted ? 'color-primary' : 'color-white' }}"></i> {{ \App\Radio::get_subscription_title() }}</span>
        @if(isset($gradient) && $gradient)
            <div class="gradient float-right"></div>
        @endif
    </div>
    <div class="element-block element-block-no-height col-12">
        <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
        <iframe src="//lightwidget.com/widgets/1fc75e6302c95dcf8a02eac1488df57d.html" scrolling="no"
                allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div>
</div>