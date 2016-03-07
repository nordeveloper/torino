<div class="container text-center">

        <?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

        ShowMessage($arParams["~AUTH_RESULT"]);

        ?>
        <form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
        <?
        if (strlen($arResult["BACKURL"]) > 0)
        {
        ?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?
        }
        ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">
            <br>
            <h4 class="hed text-center">
                <b><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></b>
            </h4>

        <table class="data-table bx-forgotpass-table table-responsive" id="forgottable">
            <thead>
                <tr>
                    <td colspan="2"><h2 class="hed text-center">
                            <?=GetMessage("AUTH_GET_CHECK_STRING")?>
                        </h2>
                        <br>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b><?=GetMessage("AUTH_LOGIN")?></b></td>
                    <td><input type="text" name="USER_LOGIN" style="vertical-align: middle" class="col-md-12" value="<?=$arResult["LAST_LOGIN"]?>" /><?//=GetMessage("AUTH_OR")?>
                    </td>
                </tr>
                <tr>
                    <td><b><?=GetMessage("AUTH_EMAIL")?></b></td>
                    <td>
                        <input type="text" name="USER_EMAIL" class="col-md-12" />
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" class="btn btn-success btn-lg" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>"/>
                        <br>
                    </td>
                </tr>
            </tfoot>
        </table>
        <p>
            После получения регистрационных данных, вы можете перейти к <a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b>Авторизации<?//=GetMessage("AUTH_AUTH")?></b></a>.
        </p>
        </form>
        <script type="text/javascript">
        document.bform.USER_LOGIN.focus();
        </script>
    </div>


</div>