<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");?>


    <div class="row">
        <h2 class="sechead supersechead text-right">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."included/about/abhead.php",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );?>
        </h2>
    </div>
    <div class="divider"></div>
    <div class="row htext">
        <p class="col-md-12">Пиццерия «Торино» отличается просторным уютным залом, с европейским дизайном, а слабый неяркий свет в помещении располагает к тишине и спокойствию. Музыка плавно сменяется одна на другую, гармонично подыгрывая настроению. В Дагестане очень веселый и шумный народ, который любит отмечать праздники с размахом, посему, будь это большое семейное торжество или маленькая вечеринка, «Торино» примет и вместит в себя всех желающих хорошо провести время.</p>

        <p class="col-md-6 text-center">
            <a href="/upload/bazzardesign4.jpg" data-toggle="lightbox" data-title="Torino: Самая быстрая доставка!" data-footer="Быстрая доставка пиццы, чуду и других блюд!">
                <img class="img-responsive img-rounded img-thumbnail" src="/upload/bazzardesign4.jpg" alt="Torino: Самая быстрая доставка!" title="Torino: Самая быстрая доставка!" />
            </a>
        </p>

        <p class="col-md-6">
            Двери этого гостеприимного заведения открыты для своих гостей ежедневно с 10-00 утра до часу ночи. Сочетание гостеприимной обстановки, комфорта, уюта,вежливого обслуживание привлекают сюда гостей и жителей других городов республики Дагестана. Серьезный разговор, который желательно провести в неформальной обстановке? Деловые встречи, свидания, чашка кофе в одиночестве, пицца с друзьями. Что для этого нужно? Мы предоставляем Вам уютные кабины, которые обеспечат Вам обстановку непринужденности и комфорта.
        </p>

        <p class="col-md-12">
            Тихое место, вежливый и чуткий персонал. Под все эти описания идеально подходит пиццерия «Торино». Вежливое обслуживание пленит с первого взгляда, а кулинарные творения шеф – повара съедается на одном дыхании. Нечасто в Махачкале найдешь заведение с несколькими спектрами услуг, которые очень удобны и привлекательны для каждого посетителя. В «Торино» вхожи как влиятельные люди, так и студенты. Приемлемые цены и немаленькие порции, которые очень по нраву и тем и другим.
            <br/>
            Мы обслужим на самом высоком уровне все Ваши праздничные мероприятия, от которых у Вас останутся только самые яркие и теплые впечатления! Уже сегодня мы имеем своих клиентов, которые однажды посетив нас стали нашими постоянными гостями. Последуйте их примеру, и Вы испытаете истинный вкус комфорта, уюта и разнообразия самых вкусных блюд.
            <br/>
        </p>


        <div class="col-md-12">
            <a class="col-sm-6" href="/upload/bazzardesign1.jpg" data-toggle="lightbox" data-gallery="multiimages" data-title="Torino: Самая быстрая доставка!">
                <img src="/upload/bazzardesign1.jpg" class="img-responsive img-rounded img-thumbnail">
            </a>

            <a class="col-sm-6" href="/upload/bazzardesign2.jpg" data-toggle="lightbox" data-gallery="multiimages" data-title="Torino: Самая быстрая доставка!">
                <img src="/upload/bazzardesign2.jpg" class="img-responsive img-rounded img-thumbnail">
            </a>


            <a class="col-sm-6" href="/upload/bazzardesign5.jpg" data-toggle="lightbox" data-gallery="multiimages" data-title="Torino: Самая быстрая доставка!">
                <img src="/upload/bazzardesign5.jpg" class="img-responsive img-rounded img-thumbnail">
            </a>


            <a class="col-sm-6" href="/upload/bazzardesign6.jpg" data-toggle="lightbox" data-gallery="multiimages" data-title="Torino: Самая быстрая доставка!">
                <img src="/upload/bazzardesign6.jpg" class="img-responsive img-rounded img-thumbnail">
            </a>
        </div>


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