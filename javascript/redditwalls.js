$(function() {
    // $(".fav").click(function () {
    //     //$(".fav").toggleClass("active");
    //     alert("Hello! I am an alert box!!");
    // });

    $('.favbutton').on('click', function(e){
        e.preventDefault();
        $parent = $(this).parent(".fav");
        $parent.html('Favorited');
        $parent.addClass("favorited");
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                console.log("wallpaper favorited successfully");
            }
        });
    });
  
});