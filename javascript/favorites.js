$(function() {
    $('.favbutton').on('click', function(e){
        e.preventDefault();
        $parent = $(this).parents(".container");
        $parent.remove();
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                console.log("wallpaper unfavorited successfully");
            }
        });
    });
  
});