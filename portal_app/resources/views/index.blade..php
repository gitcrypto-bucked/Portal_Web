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
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./dropdown.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
<!--sidebar-->
  <aside id="sidebar-wrapper" >
    <div class="sidebar-brand">
      <!--desktop display -->
      <a href="#" class="m-0" ><img src="logo/icone.svg" width="137" class=" ml-2 logo_desktop"></a>
      <p class="text-black lh-1  m-1 userDesktop">
          <strong class="text-black ml-2">Pedro Henrique</strong>
          <br>
          <strong class="text-black mt-0 lh-1">LowCost</strong>
      </p>
      <!--desktop display end-->
      <!--user display on mobile -->
      <div class="mobile_user">
        <div class="">
          <a  class="userDisplay" aria-expanded="false">
            <div style="float: left">
              <img src="empresas/gerdau.png" alt="" width="32" height="32"  id="userComapny"  >
            </div>
            &nbsp;<strong class="userName">Pedro Henrique</strong><br>Gerdau
          </a>
        </div>
      </div>
      <!--user display on mobile end-->
    </div>
    <ul class="sidebar-nav">
      <li class="active">
<!--        <a href="#" class=""><i class="fa fa-home"></i>Dashboard</a>-->
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <i class="fa fa-home" style="font-size: 24px; padding-right:8px; "></i> Dashboard
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                  <ul id="accordion_list">
                     <li>Xpto</li>
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <a href="#"><i class="fa fa-plug"></i>Plugins</a>
      </li>
      <li>
        <a href="#"><i class="fa fa-user"></i>Users</a>
      </li>
    </ul>
    <br>
  </aside>
  <!--sidebar-->
  <!--navbar -->
  <div id="navbar-wrapper" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item d-sm-flex">
              <a class="nav-link d-sm-flex mt-2 " aria-current="page" ><img src="logo/logo.png"  class="logo  d-sm-flex " width="137"></a>
            </li>
          </ul>
          <form class="d-flex ml-4 d-none d-lg-flex">
            <div class="dropdown  mx-2 px-2">
              <button data-mdb-button-init
                      data-mdb-ripple-init data-mdb-dropdown-init class="btn "
                      type="button"
                      id="dropdownMenuButton"
                      data-mdb-toggle="dropdown"
                      aria-expanded="false"
              >
                <i class="fa fa-bell" aria-hidden="true"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenuButton" >
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </div>

            <a class="btn  btn text-dark fw-bolder fs-6 px-5" type="submit">Sair</a>
          </form>

      </div>
    </nav>
  </div>
  <!--navbar -->
  <!--content-->
  <div class="container-fluid px-4 mt-4 ">
    <h2 class="content-title pageName">Inventário de Equipamentos e Serviços</h2>
    <p class="pageText">Veja abaixo todos os equipamentos e serviços que você possui com a LowCost. Utilzie a busca para encontrar os itens especificos!</p>
    <div class="row gx-5 gy-3 mt-3 ">

      <div class="col-md-6">
        <label for="cliente" class="form-label d-none d-lg-block">Cliente</label>
        <select  class="form-select" id="cliente" name="cliente">
          <option value="0" >Cliente</option>
          <option class="text-muted">Open this select menu</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="localidade" class="form-label d-none d-lg-block">Localidade</label>
        <select  class="form-select" id="localidade" name="localidade">
          <option value="0" >Localidade</option>
          <option class="text-muted">Open this select menu</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="modelo" class="form-label d-none d-lg-block">Modelo</label>
        <select  class="form-select" id="modelo" name="modelo">
          <option value="0" >Modelo</option>
          <option class="text-muted">Open this select menu</option>
        </select>
      </div>
      <div class="col-sm-3">
        <label for="serial" class="form-label d-none d-lg-block">Serial</label>
        <select  class="form-select" id="serial" name="serial">
          <option value="0" >Serial</option>
          <option class="text-muted">Open this select menu</option>
        </select>
      </div>
      <div class="col-sm-3">
        <label for="ced" class="form-label d-none d-lg-block">Centro de Custo</label>
        <select  class="form-select" id="ced" name="ced" >
          <option value="0">Centro de Custo</option>
          <option class="text-muted">Open this select menu</option>
        </select>
      </div>
    </div>
  </div>
  <!--content-->


</div>
<!-- partial -->
<script  src="./script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

  //show labels into select for mobile

  function showFirstOptionOnMobile() {
    // Detecta se o dispositivo é móvel (simplificado)
    const isMobile = window.innerWidth <= 768;

    if (isMobile)
    {
        document.getElementById("serial").options.selectedIndex= 0;
        $('#serial').children('option[value="0"]').css('display','block');
        document.getElementById("localidade").options.selectedIndex= 0;
        $('#localidade').children('option[value="0"]').css('display','block');
        document.getElementById("modelo").options.selectedIndex= 0;
        $('#modelo').children('option[value="0"]').css('display','block');
        document.getElementById("cliente").options.selectedIndex= 0;
        $('#cliente').children('option[value="0"]').css('display','block');
        document.getElementById("ced").options.selectedIndex= 0;
        $('#ced').children('option[value="0"]').css('display','block');
    }
    else
    {
       document.getElementById("serial").options.selectedIndex= 1;
       $('#serial').children('option[value="0"]').css('display','none');
       document.getElementById("localidade").options.selectedIndex= 1;
       $('#localidade').children('option[value="0"]').css('display','none');
       document.getElementById("modelo").options.selectedIndex= 1;
       $('#modelo').children('option[value="0"]').css('display','none');
       document.getElementById("cliente").options.selectedIndex= 1;
       $('#cliente').children('option[value="0"]').css('display','none');
       document.getElementById("ced").options.selectedIndex= 1;
       $('#ced').children('option[value="0"]').css('display','none');

    }

  }

  window.onload= function(){
    showFirstOptionOnMobile();
  };

  window.addEventListener('resize', function(event) {
    showFirstOptionOnMobile();
  }, true);



</script>
</body>
</html>
