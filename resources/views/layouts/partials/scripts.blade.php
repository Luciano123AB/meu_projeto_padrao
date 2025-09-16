<script>
    function ImagePreview(input) {
        if (input.files && input.files[0]) {
            
            var r = new FileReader();

            r.onload = function(e) {
                $("#img_preview").show();
                $("#img_preview").attr("src", e.target.result);
            }

            r.readAsDataURL(input.files[0]);
        }
    }

    $().ready(function() {

        hide_empty_image = false;
        set_blank_to_empty_image = false;
        set_image_border = true;

        if (hide_empty_image)
            $("#img_preview").hide();

        if (set_blank_to_empty_image)
            $("#img_preview").attr("src","data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=");

        if (set_image_border)
            $("#img_preview").css("border", "1px solid black");
            $("#img_preview").css("width", "100px");
            $("#img_preview").css("height", "100px");

        $("#img_input").change(function(){
            ImagePreview(this);
        });
    });

    function checa(e) {

        const mi = +e.min;
        const ma = +e.max;
        const va = e.value;

        if (va < mi) {

            e.value = mi;

        } else if (va > ma) {

            e.value = ma;

        }
    }
</script>