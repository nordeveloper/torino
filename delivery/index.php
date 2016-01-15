<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");?><div class="row">
	<h2 class="sechead supersechead text-right">
	<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."included/delivery/delhead.php"
	)
);?> </h2>
</div>
<div class="divider"></div>
<div class="row htext">
	<p class="col-md-6">
        <a href="/upload/bazzardish2.jpg" data-toggle="lightbox" data-title="Torino: Самая быстрая доставка!" data-footer="Быстрая доставка пиццы, чуду и других блюд!">
            <img class="img-responsive img-rounded img-thumbnail" src="/upload/bazzardish2.jpg" alt="Torino: Самая быстрая доставка!" title="Torino: Самая быстрая доставка!" />
        </a>
	</p>
	<p class="col-md-6">
		 Доставка еды – это спасение для тех, к кому неожиданно нагрянули гости или усталость после рабочего дня повалила Вас на диван, что силы остаются лишь на то, чтобы щелкать по кнопкам пульта.
	<br />
        Вся прелесть доставки еды в том, что можно сделать заказ всего чего захочешь: шашлыки, пицца, даргинское чуду, любое горячее блюдо! «Торино» очень ценят и любят за то, что еда у нас всегда горячая и по-домашнему вкусная!
    </p>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.3.0/ekko-lightbox.min.js"></script>
<script type="text/javascript">
    $(document).ready(function ($) {

        // delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    if (window.console) {
                        return console.log('onShown event fired');
                    }
                },
                onContentLoaded: function() {
                    if (window.console) {
                        return console.log('onContentLoaded event fired');
                    }
                },
                onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
                }
            });
        });

        //Programatically call
        $('#open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

        $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function() {
                    var lb = this;
                    $(lb.modal_content).on('click', '.modal-footer a', function(e) {
                        e.preventDefault();
                        lb.navigateTo(2);
                    });
                }
            });
        });

    });
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>