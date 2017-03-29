$(function() {
    $(".add").click(function() {
        var t = $(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val()) + 1)
        setTotal();
    })
    $(".min").click(function() {
        var t = $(this).parent().find('input[class*=text_box]');
        t.val(parseInt(t.val()) - 1)
        if (parseInt(t.val()) < 0) {
            t.val(0);
        }
        setTotal();
    })

    function setTotal() {
        var s = 0;
        $("#tab td").each(function() {
            s += parseInt($(this).find('input[class*=text_box]').val()) * parseInt($(this).find('span[class*=price]').text());
        });
        $("#total").html(s);
    }
    setTotal();

})

function check() {
    if (parseInt(document.getElementById('total').textContent) > 1) {
        alert('Get out! You poor man! You only have 1 RMB in your account!');
        return false;
    }
    return true;
}
