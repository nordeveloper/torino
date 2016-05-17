var Cart;
if (!Cart) Cart = {};
Cart.AddItem = function (id, quantity)
{
    var jqxhr = $.post("/cart/cart.php",
        {'action': 'add2basket', 'id': id, 'quantity': quantity});
    return jqxhr;
}

Cart.Init = function()
{
    $('a.addtocart').click(function(){
        var addLink = this;
        $(addLink).addClass("adding");
        var id = this.getAttribute('data-item-id');
        var quantid = this.getAttribute('data-item-quantity');
        var quantity = $("#"+quantid).val();
        console.log(id);
        console.log(quantity);
        if ((quantity == null) || (typeof quantity === 'undefined') || (quantity == "")) { quantity = 1; }
        Cart.AddItem(id, quantity)
            .done(function(data)
            {
                console.log("success");
                console.log(data);
                $(addLink).tooltip({title: "Добавлено в корзину", html: false, placement: "right", trigger: "manual", container: "body"}).tooltip('show');
                setTimeout(function() {$(addLink).tooltip('destroy')},1000);
            })
            .fail(function(data)
            {
                console.log("fail");
                console.log(data);
                $(addLink).tooltip({title: "Ошибка добавления в корзину", html: false, placement: "right", trigger: "manual", container: "body"}).tooltip('show');
                setTimeout(function() {$(addLink).tooltip('destroy')},1000);
            })
            .always(function(data){
                $(addLink).removeClass("adding");
                $(addLink).blur();
            });
    });
}


// Popup window
//					var dialogParams =
//					{
//						'title': 'Элемент добавлен',
//						'content': id,
//						'width': 500,
//						'height': 200
//					}
//new BX.PopupWindow(dialogParams).Show();
//var oPopup = new BX.PopupWindow('add_to_basket', window.body, {
//    autoHide : true,
//    offsetTop : 1,
//    offsetLeft : 0,
//    lightShadow : true,
//    closeIcon : true,
//    closeByEsc : true,
//    overlay: {
//        backgroundColor: 'gray', opacity: '80'
//    }
//})
//oPopup.setContent('<div class="add-to-basket-popup">Элемент ' + id + ' добавлен в корзину</div>');
//oPopup.show();
