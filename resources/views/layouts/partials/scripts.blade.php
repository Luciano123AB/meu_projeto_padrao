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

    document.addEventListener("click", function(e){
        if(e.target && e.target.id === "ok"){
            Swal.close();
        }
    });

    function copiarTexto() {

        const input = document.getElementById("link");

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(input.value)
                .then(() => {
                    Swal.fire({
                        position: "top",
                        draggable: true,
                        showCloseButton: true,
                        icon: "success",
                        title: "Link Copiado!",
                        text: "Link: " + input.value,
                        showConfirmButton: false,
                        footer: "<div></div>",
                        showClass: {
                            popup: `
                                animate__animated
                                animate__fadeInDown
                                animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                                animate__animated
                                animate__fadeOutUp
                                animate__faster
                            `
                        },
                        backdrop: `
                            rgba(0, 0, 0, 0.4)
                            url("/images/nyan-cat.gif")
                            left top
                            no-repeat
                        `,
                        timer: 2000
                    });
                })
                .catch(err => {
                    console.error("Erro ao copiar: ", err);
                    Swal.fire({
                        position: "top",
                        draggable: true,
                        showCloseButton: true,
                        icon: "error",
                        title: "Erro!",
                        text: "Falha ao Copiar o Link! Tente novamente.",
                        showConfirmButton: false,
                        footer: "<div></div>",
                        showClass: {
                            popup: `
                                animate__animated
                                animate__fadeInDown
                                animate__faster
                            `
                        },
                        hideClass: {
                            popup: `
                                animate__animated
                                animate__fadeOutUp
                                animate__faster
                            `
                        },
                        backdrop: `
                            rgba(0, 0, 0, 0.4)
                            url("/images/nyan-cat.gif")
                            left top
                            no-repeat
                        `,
                        timer: 2000
                    });
                });
        } else {
            input.removeAttribute("readonly");
            input.select();
            document.execCommand("copy");
            input.setAttribute("readonly", true);

            Swal.fire({
                position: "top",
                draggable: true,
                showCloseButton: true,
                icon: "success",
                title: "Link Copiado!",
                text: "Link: " + input.value,
                showConfirmButton: false,
                footer: "<div></div>",
                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInDown
                        animate__faster
                    `
                },
                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutUp
                        animate__faster
                    `
                },
                backdrop: `
                    rgba(0, 0, 0, 0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                `,
                timer: 2000
            });
        }
    }
</script>