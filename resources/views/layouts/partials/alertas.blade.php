@if(session("alerta"))
    <script>
        Swal.fire({
            draggable: true,
            showCloseButton: true,
            icon: "{{ session('alerta.icon') }}",
            title: "<label class='py-2'>{{ session('alerta.title') }}</label>",
            text: "{{ session('alerta.text') }}",
            showConfirmButton: false,
            footer: "<button style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' id='ok' class='btn btn-{{ session('alerta.cor') }} btn-sm rounded-pill border border-black icon-link icon-link-hover'>" +
                        "<svg xmlns='{{ asset('http://www.w3.org/2000/svg') }}' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>" +
                            "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>" +
                            "<path d='m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05'/>" +
                        "</svg>" +
                        "OK" +
                    "</button>",
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                `
            },
            backdrop: `
                rgba(0, 0, 0, 0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `,
            timer: 3000
        });
    </script>
@endif

@if(session("alertaConfirmacao"))
    <script>
        Swal.fire({
            draggable: true,
            showCloseButton: true,
            icon: "{{ session('alertaConfirmacao.icon') }}",
            title: "<label class='py-2'>{{ session('alertaConfirmacao.title') }}</label>",
            text: "{{ session('alertaConfirmacao.text') }}",
            showConfirmButton: false,
            footer: "<a href='' style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' id='cancelar' class='btn btn-{{ session('alertaConfirmacao.cor02') }} btn-sm rounded-pill border border-black icon-link icon-link-hover me-1' type='button'>" +
                        "<svg xmlns='{{ asset('http://www.w3.org/2000/svg') }}' width='16' height='16' fill='currentColor' class='bi bi-x-circle' viewBox='0 0 16 16'>" +
                            "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>" +
                            "<path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708'/>" +
                        "</svg>" +
                        "CANCELAR" +
                    "</a>" +
                    "<a href='{{ route(session('alertaConfirmacao.rota'), ['id' => Crypt::encrypt(session('id'))]) }}' style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' id='confirmar' class='btn btn-{{ session('alertaConfirmacao.cor01') }} btn-sm rounded-pill border border-black icon-link icon-link-hover' type='button'>" +
                        "<svg xmlns='{{ asset('http://www.w3.org/2000/svg') }}' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>" +
                            "<path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>" +
                            "<path d='m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05'/>" +
                        "</svg>" +
                        "CONFIRMAR" +
                    "</a>",
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                `
            },
            backdrop: `
                rgba(0, 0, 0, 0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `,
        });
    </script>
@endif

@if(session("alertaOiTchau"))
    <script>
        Swal.fire({
            draggable: true,
            showCloseButton: true,
            icon: "info",
            title: "<label class='py-2'>{{ session('alertaOiTchau.title') }}</label>",
            text: "{{ session('alertaOiTchau.text') }}",
            showConfirmButton: false,
            footer: "<footer></footer>",
            showClass: {
                popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                `
            },
            hideClass: {
                popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                `
            },
            backdrop: `
                rgba(0, 0, 0, 0.4)
                url("/images/nyan-cat.gif")
                left top
                no-repeat
            `,
            timer: 3000
        });
    </script>
@endif