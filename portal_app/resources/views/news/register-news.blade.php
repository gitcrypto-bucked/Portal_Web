<!DOCTYPE html>
<html lang="pt_BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ti team &amp; Low Cost contributors">
    <meta name="generator" content="Pedro Henrique & Washington">
    <title>Portal LowCost V.34</title>
    <!--  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/news.css')}}">
    <style>
        ::placeholder ,select, option, label{
            color: lightslategray !important;
            opacity: 1; /* Firefox */
            font-family: 'Poppins', sans-serif; !important;
            font-size: 14px !important;
        }

        input[type=file]
        {
            color: lightslategray !important;
            font-family: 'Poppins', sans-serif; !important;
            font-size: 14px !important;
        }

        ::-ms-input-placeholder { /* Edge 12 -18 */
            color: lightslategray;
            font-family: 'Poppins', sans-serif;
            font-size: 14px !important;
        }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
    <!--sidebar-->
    @include('components.sidebar')

    <!--sidebar-->
    <!--navbar -->
    @include('components.navwrapper')

    <!--navbar -->
    <!--content-->
    <div class="container-fluid px-4 mt-4 ">
        <h2 class="content-title pageName">Cadastrar noticias</h2>
        <p class="pageText"></p>
        <div class="row mt-4 gx-3 ">
            <div class="col-6 gx-3 px-2">
                <form id="registerForm" method="POST" enctype="multipart/form-data" autocomplete="off" action="{{route('add-news')}}" class="form-floating">
                    @if(Session::has('error'))
                        <div class="alert alert-success bg-danger text-white" id="error">
                            {{ Session::get('error')}}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-white bg-success" id="sucess">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" required  minlength="8">
                            <label for="title">Titulo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control"  id="sinopse"  name="sinopse" style="height: 100px" required minlength="20"></textarea>
                            <label for="sinopse">Resumo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="webrul" name="webrul" required >
                            <label for="webrul">Url do artigo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="thumb" name="thumb" required accept="image/*" >
                            <label for="thumb">Foto</label>
                        </div>

                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary mb-2"  >Cadastrar</button>
                            <button type="button" class="btn btn-danger btn-lg-danger bg-danger mb-2" onclick="limpaTela()" >Cancelar</button>
                        </div>
                </form>
            </div>
            <div class="col-5 px-2 mx-2">
                <small>Exibição como ficará</small>
                <ul class="list-unstyled">
                    <li>
                        <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-0" href="#">
                            <div class="col-2">
                                <img src="{{asset('/thumb/news_1.jpg')}}"
                                     class="thumb img-fluid shadow-1-strong rounded" alt="" id="image" />
                            </div>
                            <div class="col-12">
                                <p class="mb-3">
                                    <small class="newsDate">{{Date('d/m/y')}} &nbsp;</small><strong class="newsHeader" style="font-size: 14px !important;" id="newsHeader">Locação de equipamento...</strong>
                                    <p class="lh-0 newsText" id="resumo">Em dúvida se a locação de equip...</p>
                                </p>
                                <p class=" link mt-1"  id="link" >...Continuar Lendo...</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!--content-->


</div>
<!-- partial -->
<script  src="{{asset('assets/js/script.js')}}"></script>
<script  src="{{asset('assets/js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.12.1/polyfill.min.js"
        integrity="sha512-uzOpZ74myvXTYZ+mXUsPhDF+/iL/n32GDxdryI2SJronkEyKC8FBFRLiBQ7l7U/PTYebDbgTtbqTa6/vGtU23A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- v6 <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script> -->
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<script type="text/javascript">

    //show labels into select for mobile



    function limpaTela()
    {
        document.getElementById('registerForm').reset();
        document.getElementById('newsHeader').innerHTML='Locação de equipamento...';
        document.getElementById('resumo').innerHTML='Em dúvida se a locação de equip...';
        document.getElementById('image').src = "{{'/thumb/news_1.jpg'}}";
    }
</script>
<script type="text/babel">
    const thumb = document.getElementById('thumb');
    thumb.onchange = evt => {
        const [file] = thumb.files
        if (file) {
            document.getElementById('image').src = URL.createObjectURL(file)
        }
    }

    let title = document.getElementById('title');
    let newsHeader = document.getElementById('newsHeader');
    title.onkeyup = function()
    {
        newsHeader.innerHTML = title.value;
    }


    let sinopse = document.getElementById('sinopse');
    let resumo = document.getElementById('resumo');
    sinopse.onkeyup = function()
    {
        resumo.innerHTML = sinopse.value;
    }


    let webrul = document.getElementById('webrul');
    let link = document.getElementById('link');
    webrul.onblur= function ()
    {
        link.onclick = function (){
            window.open(webrul.value,'_blank');
        }
    }

</script>


</body>
</html>
