<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
                <div id="footingdvd" class="divider"></div>
            </div>
        </div>
        <!-- End Main Content -->

        <!-- Footer -->
        <!-- Wave Footer -->
        <footer class="footer" id="wavefooter"></footer>
        <!-- Info Footer -->
        <footer class="footer" id="infofooter">
            <div class="container">
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4" id="footinfo">
                    <p>© 2015. Torino group.<br/>
                        Разработка сайта: «Интеллектуальные системы».</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" id="footlogo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/torin_41.png" alt="Torino" class="img-responsive">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4" id="footersocs">
                    <div class="pull-right" id="socbuttons">
                        <a class="btn btn-social-icon btn-facebook" onclick="socialClick(5);//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>
                        <a class="btn btn-social-icon btn-google" onclick="//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google-plus"></span></a>
                        <a class="btn btn-social-icon btn-instagram" onclick="//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-instagram']);"><span class="fa fa-instagram"></span></a>
                        <a class="btn btn-social-icon btn-linkedin" onclick="//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-linkedin']);"><span class="fa fa-linkedin"></span></a>
                        <a class="btn btn-social-icon btn-odnoklassniki" onclick="socialClick(2);//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-odnoklassniki']);"><span class="fa fa-odnoklassniki"></span></a>
                        <a class="btn btn-social-icon btn-pinterest" onclick="//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-pinterest']);"><span class="fa fa-pinterest"></span></a>
                        <a class="btn btn-social-icon btn-twitter" onclick="socialClick(4);//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-twitter']);"><span class="fa fa-twitter"></span></a>
                        <a class="btn btn-social-icon btn-vk" onclick="socialClick(1);//_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-vk']);"><span class="fa fa-vk"></span></a>
                    </div>
                </div>
            </div>

            <script language="javascript">
                function socialClick(a) {
                    h = encodeURIComponent(window.location.href + window.location.hash);
                    t = encodeURIComponent(document.title);
                    if (a == 1)h = 'vkontakte.ru/share.php?url=' + h + '&title=' + t;
                    else if (a == 2)h = 'odnoklassniki.ru/dk?st.cmd=addShare&st.s=1000&st._surl=' + h + '&tkn=3009';
                    else if (a == 3)h = 'www.livejournal.com/update.bml?mode=full&subject=' + t + '&event=' + h;
                    else if (a == 4)h = 'twitter.com/timeline/home?status=' + t + '%20' + h;
                    else if (a == 5)h = 'www.facebook.com/share.php?u=' + h;
                    else if (a == 6)h = 'wow.ya.ru/posts_share_link.xml?url=' + h + '&title=' + t;
                    else if (a == 7)h = 'connect.mail.ru/share?url=' + h + '&title=' + t + '&description=&imageurl=';
                    else if (a == 8)h = 'moikrug.ru/share?ie=utf-8&url=' + h + '&title=' + t + '&description=';
                    else return;
                    window.open('http://' + h, 'Soc', 'screenX=100,screenY=100,height=500,width=500,location=no,toolbar=no,directories=no,menubar=no,status=no');
                    return false;
                }
            </script>

        </footer>
        <!-- Pizza Footer -->
        <footer class="footer" id="pizfooter"></footer>
        <!-- End Footer -->



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(function() {
                var win_w = $(window).width();

                if ((win_w < 768) && (win_w > 480)) {
                    $(".daughterslide_3").remove();
                }
                else if (win_w < 480) {
                    $(".daughterslide_2").remove();
                    $(".daughterslide_3").remove();
                }

                Cart.Init();
            });

            //======================================
            /*if (win_w > 768) {
             $('.carousel .item').each(function() {
             var next = $(this).next();
             if (!next.length) {
             next = $(this).siblings(':first');
             }
             next.children(':first-child').clone().appendTo($(this));

             if (next.next().length > 0) {
             next.next().children(':first-child').clone().appendTo($(this));
             }
             else {
             $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
             }
             });
             } else if (win_w > 480) {
             $('.carousel .item').each(function() {
             var next = $(this).next();
             if (!next.length) {
             next = $(this).siblings(':first');
             }
             next.children(':first-child').clone().appendTo($(this));
             });
             }
             else {
             return;
             }*/

            //======================================

            /* $('.carousel .item').each(function(){
             var win_w = $(window).width();

             if (win_w > 480) {
             var next = $(this).next();
             if (!next.length) {
             next = $(this).siblings(':first');
             }
             next.children(':first-child').clone().appendTo($(this));
             } else { return; }
             if (win_w > 768) {
             if (next.next().length > 0) {
             next.next().children(':first-child').clone().appendTo($(this));
             }
             else {
             $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
             }
             }
             });*/

            /*$('.carousel .item').each(function(){
             var next = $(this).next();
             if (!next.length) {
             next = $(this).siblings(':first');
             }
             next.children(':first-child').clone().appendTo($(this));

             if (next.next().length>0) {
             next.next().children(':first-child').clone().appendTo($(this));
             }
             else {
             $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
             }
             });*/
        </script>


    </BODY>
</HTML>
