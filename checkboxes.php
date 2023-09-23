<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="js/jquery-latest1.js"></script>

</head>
<body>
    <div class="my-form">
            <p class="text-box">
                <label for="box1">Medicine <span class="box-number">1</span></label>
		<select name="select[]" id="select"><option value="Medicine">Medicine</option> </select>
                <input type="text" name="boxes[]" value="" id="box1" />
                <input type="text" name="boxes1[]" value="" id="box11" />
                <input type="text" name="boxes1[]" value="" id="box11" />
                <a class="add-box" href="">Add More</a>
            </p>
            <p><input type="submit" value="Submit" /></p>
 
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        if( 15 < n ) {
            alert('Stop it!');
            return false;
        }
        var box_html = $('<p class="text-box"><label for="box' + n + '">Medicine <span class="box-number">' + n + '</span></label> <select name="select[]" id="select' + n + '"><option value="Medicine">Medicine</option> </select> <input type="text" name="boxes[]" value="" id="box" ' + n + ' "/> <input type="text" name="boxes1[]" value="" id="boxe' + n + '" /> <input type="text" name="boxes[]" value="" id="box ' + n + '"/><a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
    $('.my-form').on('click', '.remove-box', function(){
        $(this).parent().css( '', '' );
        $(this).parent().fadeOut("slow", function() {
            $(this).remove();
            $('.box-number').each(function(index){
                $(this).text( index + 1 );
            });
        });
        return false;
    });
});
</script>
</body>
</html>
