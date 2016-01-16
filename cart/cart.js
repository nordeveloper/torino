
var Cart;
if (!Cart) Cart = {};
Cart.AddItem = function (id, quantity, done, fail)
{

    var jqxhr = $.post("cart/cart.php",
        {'action': 'add2basket', 'id': id, 'quantity': quantity})
        .done(function(data){
           if (typeof(done)=='function')
                done(data);
        })
        .fail(function(data){
           if (typeof(fail) == 'function')
               fail(data);
        });
    return jqxhr;
}

Cart.Init = function()
{
    $('a.addtocart').click(function(){
        console.log("adding to cart");
        //return;
        var id = this.getAttribute('data-item-id');
        Cart.AddItem(id,1,
            function(data)
            {
//					var dialogParams =
//					{
//						'title': 'Элемент добавлен',
//						'content': id,
//						'width': 500,
//						'height': 200
//					}
                //new BX.PopupWindow(dialogParams).Show();
                var oPopup = new BX.PopupWindow('call_feedback', window.body, {
                    autoHide : true,
                    offsetTop : 1,
                    offsetLeft : 0,
                    lightShadow : true,
                    closeIcon : true,
                    closeByEsc : true,
                    overlay: {
                        backgroundColor: 'red', opacity: '80'
                    }
                })
                oPopup.setContent('Элемент ' + id + ' добавлен в корзину');
                oPopup.show();
            },
            function(data)
            {

            }
        );
    });
}