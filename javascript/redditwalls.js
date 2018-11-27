$(function() {
    // $(".fav").click(function () {
    //     //$(".fav").toggleClass("active");
    //     alert("Hello! I am an alert box!!");
    // });

    $('.favbutton').on('click', function(e){
        e.preventDefault();
        $parent = $(this).parent(".fav");
        $parent.addClass("favorited");
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                if(response<1){
                    window.location.href = 'login';
                    return;
                }
                console.log("wallpaper saved successfully");
                $parent.html('Saved');
            }
        });
    });
  
});