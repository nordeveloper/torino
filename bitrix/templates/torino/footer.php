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
                    <p>© 2016. Torino group.<br/>
                        Разработка сайта: «Интеллектуальные системы».</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4" id="footlogo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/torin_41.png" alt="Torino" class="img-responsive">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4" id="footersocs">
                    <div class="pull-right" id="socbuttons">
                        <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>
                        <a class="btn btn-social-icon btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-google']);"><span class="fa fa-google-plus"></span></a>
                        <a class="btn btn-social-icon btn-instagram" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-instagram']);"><span class="fa fa-instagram"></span></a>
                        <a class="btn btn-social-icon btn-linkedin" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-linkedin']);"><span class="fa fa-linkedin"></span></a>
                        <a class="btn btn-social-icon btn-odnoklassniki" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-odnoklassniki']);"><span class="fa fa-odnoklassniki"></span></a>
                        <a class="btn btn-social-icon btn-pinterest" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-pinterest']);"><span class="fa fa-pinterest"></span></a>
                        <a class="btn btn-social-icon btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-twitter']);"><span class="fa fa-twitter"></span></a>
                        <a class="btn btn-social-icon btn-vk" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-vk']);"><span class="fa fa-vk"></span></a>
                    </div>
                </div>
            </div>
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
        </script>


    </BODY>
</HTML>
