
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
