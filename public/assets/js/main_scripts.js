$(document).ready(function() {
    $('#cpf').mask('000.000.000-00');
    $('#celular').mask('(00)00000-0000');
    $('#data').mask('00/00/0000');
    $('#cep').mask('00000-000');
    $('#cnpj').mask('00.000.000/0000-00');
    $('#data, #data_inicial, #data_final').mask('00/00/0000');
    $('#mes, #mes_inicial_cadastros, #mes_final_cadastros').mask('00');
});

function ImagePreview(input) {
    if (input.files && input.files[0]) {
        
        var r = new FileReader();

        r.onload = function(e) {
            $('#img_preview').show();
            $('#img_preview').attr('src', e.target.result);
        }

        r.readAsDataURL(input.files[0]);
    }
}

$().ready(function() {

    hide_empty_image = false;
    set_blank_to_empty_image = false;
    set_image_border = true;

    if (hide_empty_image)
        $('#img_preview').hide();

    if (set_blank_to_empty_image)
        $('#img_preview').attr('src','data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=');

    if (set_image_border)
        $('#img_preview').css('border', '1px solid black');
        $('#img_preview').css('width', '100px');
        $('#img_preview').css('height', '100px');

    $('#img_input').change(function(){
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

document.addEventListener('click', function(e){
    if(e.target && e.target.id === 'ok'){
        Swal.close();
    }
});

const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const toggleBtn = document.getElementById('sidebarToggle');
const openSidebar = () => {
    sidebar.style.transform = 'translateX(0)';
    overlay.style.display = 'block';
};
const closeSidebar = () => {
    sidebar.style.transform = 'translateX(-100%)';
    overlay.style.display = 'none';
};

$(function() {
    $('#data, #data_inicial, #data_final').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        autoclose: true,
        todayHighlight: true
    });
});

toggleBtn.addEventListener('click', () => {
    if (sidebar.style.transform === 'translateX(0)') {
        closeSidebar();
    } else {
        openSidebar();
    }
});

overlay.addEventListener('click', closeSidebar);

window.addEventListener('load', () => {
    if(window.innerWidth < 768){
        sidebar.style.transform = 'translateX(-100%)';
        sidebar.style.position = 'absolute';
        sidebar.style.zIndex = '1100';
    }
});

window.addEventListener('resize', () => {
    if(window.innerWidth >= 768){
        sidebar.style.transform = 'translateX(0)';
        sidebar.style.position = 'relative';
        overlay.style.display = 'none';
    } else {
        sidebar.style.transform = 'translateX(-100%)';
        sidebar.style.position = 'absolute';
    }
});

function mostrarOcultarSenha() {

    const senha = document.getElementById('senha');
    const botaoIcone = document.querySelector('#mostrar_ocultar_senha i');

    if (senha.type === 'password') {

        senha.type = 'text';

        botaoIcone.classList.remove('bi-eye');
        botaoIcone.classList.add('bi-eye-slash');
    } else {

        senha.type = 'password';

        botaoIcone.classList.remove('bi-eye-slash');
        botaoIcone.classList.add('bi-eye');
    }
}

function mostrarOcultarSenhaAtual() {

    const senha_atual = document.getElementById('senha_atual');
    const botaoIcone = document.querySelector('#mostrar_ocultar_senha_atual i');

    if (senha_atual.type === 'password') {

        senha_atual.type = 'text';

        botaoIcone.classList.remove('bi-eye');
        botaoIcone.classList.add('bi-eye-slash');
    } else {

        senha_atual.type = 'password';

        botaoIcone.classList.remove('bi-eye-slash');
        botaoIcone.classList.add('bi-eye');
    }
}

function mostrarOcultarConfirmarSenha() {

    const confirmarSenha = document.getElementById('confirmar_senha');
    const botaoIcone = document.querySelector('#mostrar_ocultar_confirmar_senha i');

    if (confirmarSenha.type === 'password') {

        confirmarSenha.type = 'text';
            
        botaoIcone.classList.remove('bi-eye');
        botaoIcone.classList.add('bi-eye-slash');
    } else {

        confirmarSenha.type = 'password';
            
        botaoIcone.classList.remove('bi-eye-slash');
        botaoIcone.classList.add('bi-eye');
    }
}