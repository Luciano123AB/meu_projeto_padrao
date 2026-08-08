@extends("layouts.main_layout")

@section("content")
    <div class="container-fluid px-2 px-md-3">
        <div class="row flex-wrap">
            @include("layouts.opcoes")

            <div style="min-height: 700px;" class="col-12 col-md-10 py-3">
                <div class="row text-center text-md-start align-items-center">
                    <div class="col-12 col-md-6 text-center mb-4 mb-md-0">
                        <h1 class="fs-md-4 fs-lg-5">Seja BEM VINDO ao Nosso Site!</h1>
                    </div>

                    <div class="col-12 col-md-6 text-center">
                        <h2 class="fs-4 fs-md-3 mb-3 fw-bold {{ Cache::get('tema') === 'escuro' ? "text-white" : "text-black" }}">Sobre:</h2>
                        
                        <p class="{{ Cache::get('tema') === 'escuro' ? "text-white" : "text-black" }}">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint, odit quam mollitia architecto dolore minus dolorum incidunt eum reiciendis delectus eius molestiae repellat suscipit id laudantium, nostrum perferendis est quia.</p>
                        <p class="{{ Cache::get('tema') === 'escuro' ? "text-white" : "text-black" }}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi beatae odio labore, corporis in debitis? Tempore tempora necessitatibus, libero, dolorum maiores autem molestias officia natus sunt ab, facilis suscipit accusantium.</p>
                        <p class="{{ Cache::get('tema') === 'escuro' ? "text-white" : "text-black" }}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus sint quae delectus molestias deleniti, dignissimos qui quam voluptatem laborum sit, recusandae ab fugit mollitia porro. Vitae unde ad magni aspernatur.</p>
                        <p class="{{ Cache::get('tema') === 'escuro' ? "text-white" : "text-black" }}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, fugit totam necessitatibus ab dicta laudantium quibusdam deleniti dolorum accusamus cum voluptatem nobis architecto exercitationem optio id blanditiis placeat. Neque, exercitationem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection