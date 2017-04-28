$(document).ready(function () {
    totalheight = $(window).height();
    totalheight = totalheight - 50;
    $(".sidebar").css("height", totalheight + "px");

    $('.my-select').on('click', function (e) {
        e.stopPropagation();
    });

    $(window).resize(function () {

        totalheight = $(window).height();
        totalheight = totalheight - 50;
        $(".sidebar").css("height", totalheight + "px");
    });
    $('.input-text-area').autosize();
   
    $('#cnbs').click(function (e) {
        e.preventDefault();
        target_controller = $('#cnbt').val();
        book_name = $('#cnbn').val();
        book_desc = $('#cnbd').val();
        submit_value = $('#cnbs').val();


        $.ajax({
            method: "POST",
            url: target_controller,
            data: {new_book_name: book_name, new_book_desc: book_desc, submit: submit_value}
        })
            .done(function(cnb_msg){
                if(cnb_msg =='positive'){
                    refresh_book_list();
                }
                
            });

    });



});

/*function refresh_book_list(){
    
    target = $('#gab').val();
    $.ajax({
        method: "GET",
        url: target,
        data: {get_param:'value'},
        dataType: 'json'
    })
        .done(function (rnb_msg){
            if(rnb_msg!=0){
                $('#books-name').remove();
                .each(rnb_msg).function(index, element){
                    .('#gab').after($(<li id="book-name"><a href="#">{element.book_name}</a></li>));
                }
            }

        });
}*/

function redirect_to_home(redirect_to) {
    window.location.href = redirect_to;
}