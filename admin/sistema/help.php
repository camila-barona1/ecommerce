<?php
session_start();


include "../conexion.php";

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Ayuda</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>


    <!-- SIDEBAR --->
    <?php include "includes/sidebar.php"; ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <!-- <a href="#" class="btn-block" data-toggle="modal" data-target="#Medium-modal" type="button">
                            </a> -->


        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Manual panel admin</h4>

                </div>
            </div>            
                
                    <div class="min-height-200px">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="title">
                                        <h4>Manual panel admin</h4>
                                    </div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active" a href="help.php" aria-current="page">Ayuda</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="faq-wrap">
                            <h1 style="text-align: center;">Manual del usuario</h1>
                            <br>
                            <p>Bienvenido al manual de usuario del panel de administrador de
                                Cavis HomeStore
                            </p>
                            <br>
                            <h3>Lista de contenido</h3>
                            <h1 id="tabla" style="font-size: 20pt;">TABLA DE CONTENIDO</h1>
                            <br>
                            <a href="#1">
                                <p>1. Pagina principal</p>
                            </a>
                            <a href="#2">
                                <p>2. Administrador</p>
                            </a>
                            <a href="#3">
                                <p>3. Categorias</p>
                            </a>
                            <a href="#4">
                                <p>4. Prodcutos</p>
                            </a>
                            <a href="#5">
                                <p>5. Usuarios</p>
                            </a>
                            <a href="#6">
                                <p>6. Ordenes</p>
                            </a>
                            <a href="#7">
                                <p>7. Contactos</p>
                            </a>
                            <a href="#8">
                                <p>8. Reportes</p>
                            </a>
                            <br>

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block" data-toggle="collapse" data-target="#faq1">
                                            <h1 id="1" style="font-size: 15pt;">1. Pagina principal</h1>
                                        </button>
                                    </div>
                                    <div id="faq1" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Cuando inicies sesión al panel administrador, esta será la primera interface de usuario que veas, como se muestra en la siguiente imagen.</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/7aae/b1poxbbz3s2c7xr6g.jpg" alt="">
                                            <br>
                                            <br>

                                            <p>1: Como usuario administrador tienes acceso a una lista de menú con distintas funcionalidades y servicios.</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/e54e/w5oc1dmbaioiosk6g.jpg" alt="">



                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
                                            <h1 id="2" style="font-size: 15pt;">2. Administrador</h1>
                                        </button>
                                    </div>
                                    <div id="faq2" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Para acceder a él, te dirigirás al menú y seleccionaras “administrador”</p>
                                            <img src="https://www.mediafire.com/convkey/3374/41vw81gyltyjtcg6g.jpg" alt="">
                                            <br>
                                            <br>
                                            <p>Se desplegará un sub menú con 2 opciones</p>

                                            <img src="https://www.mediafire.com/convkey/8e6e/pjlv5gzsijoz62z6g.jpg" alt="">

                                            <p>Nuevo administrador</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/dc37/zhuij4fiiyd6a4z6g.jpg" alt="">
                                            <br>
                                            <p>En nuevo administrador accederás a un formulario que te permitirá crear diferentes tipos de usuarios como clientes, empleados y administradores</p>
                                            <br>
                                            <p>Lista de administradores</p>
                                            <img src="https://www.mediafire.com/convkey/1622/yfv0qadny8g98g56g.jpg" alt="">
                                            <br>
                                            <p>En lista de administradores podrás visualizar todos los usuarios registrados del panel admin.</p>
                                            <br>
                                            <p>Acciones</p>
                                            <br>
                                            <p>En la parte de acciones hay 3 puntos los cuales desplegaran un sub menú el cual te permitirá realizar distintas acciones como “Editar”, “Eliminar” un usuario.</p>
                                            <img src="https://www.mediafire.com/convkey/e776/7jxg6x9lhiv2j1i6g.jpg" alt="">
                                            <p>Solo tienes que presionar clic sobre el usuario que quieras realizar una acción seleccionas los 3 puntos y se desplegara el menú que te permitirá manipular ese usuario.</p>
                                            <img src="https://www.mediafire.com/convkey/fa62/oeuv6ypjx8k48bh6g.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq3">
                                            <h1 id="3" style="font-size: 15pt;">3. Categorias</h1>
                                        </button>
                                    </div>
                                    <div id="faq3" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Para acceder a él te dirigirás a lo menú y seleccionaras “Categorías” y presionaras click.</p>
                                            <img src="https://www.mediafire.com/convkey/2185/cx6qercr8edw1lt6g.jpg" alt="">
                                            <br>
                                            <p>En categorías encontraras un sub menú con nueva categoría y lista de categorías.</p>
                                            <img src="https://www.mediafire.com/convkey/e52a/tw50s8wsfkmjcqo6g.jpg" alt="">
                                            <br>
                                            <p>Crear una nueva categoría</p>
                                            <img src="https://www.mediafire.com/convkey/284d/3hbcxchssfb1jkr6g.jpg" alt="">
                                            <br>
                                            <p>Cuando le des click te llevara a este formulario donde introducirás el nombre de la categoría que deseas crear.</p>
                                            <img src="https://www.mediafire.com/convkey/174d/staqdosvae7o5tx6g.jpg" alt="">
                                            <br>
                                            <p>Cuando este contento con el nombre que elijas le darás al botón de “guardar”, para salvar la nueva categoría que acabas de crear.</p>
                                            <img src="https://www.mediafire.com/convkey/2c11/yak401rm4qywvkv6g.jpg" alt="">
                                            <p>Cuando guardes el te llevara a la lista de categorías automáticamente.</p>
                                            <br>
                                            <p>Lista categorias</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/4a75/5sreuly6da4ob7q6g.jpg" alt="">

                                            <p>Para ingresar buscaras en el sub menú de categoría “lista de categorías”, y accederás en él.</p>
                                            <br>
                                            <p>Cuando hayas ingresado veras una tabla con la lista de categorías de la página.</p>
                                            <img src="https://www.mediafire.com/convkey/451d/wxq18b950moqyf56g.jpg" alt="">

                                            <p>En este tendrás el numero de categoría, su id, nombre y un menú de acciones.</p>
                                            <br>
                                            <p>Menú de acciones</p>
                                            <img src="https://www.mediafire.com/convkey/86a1/0ewf4loo94r4yw66g.jpg" alt="">
                                            <p>
                                                En este menú te permitirá realizar distintas acciones.

                                            </p>
                                            <br>
                                            <p>“Activo”.</p>
                                            <img src="https://www.mediafire.com/convkey/cb04/us5lx75foszyyl76g.jpg" alt="">
                                            <p>Este botón te permitirá cambiar el estado de una categoría en la página web con solo presionarlo una categoría pasará de estar en “activa”, a “desactivada”.</p>
                                            <br>
                                            <p>“Editar”</p>
                                            <img src="https://www.mediafire.com/convkey/fe35/j0yjcnpblyzhef26g.jpg" alt="">
                                            <p>Te permitirá cambiar el nombre de la categoría que selecciones.</p>
                                            <br>
                                            <p>En menú te dirigirás a la categoría que deseas.</p>
                                            <img src="https://www.mediafire.com/convkey/952d/yt6cpak3n08ryzs6g.jpg" alt="">
                                            <p>Y presionaras “editar”.</p>
                                            <br>
                                            <p>Te llevara a un formulario </p>
                                            <img src="https://www.mediafire.com/convkey/208c/if4xx8oihvq6wm56g.jpg" alt="">

                                            <p>En formulario veras el nombre de la categoría que deseas editar.</p>
                                            <br>
                                            <p>Cuando hayas editado solo presionaras el botón de “guardar”, para salvar los cambios que hayas hecho.</p>
                                            <img src="https://www.mediafire.com/convkey/d00d/xqyts7tnualh4m26g.jpg" alt="">

                                            <p>Posteriormente te redirigirá de nuevo a lista de categorías y podrás ver la categoría que acabas de editar con su cambio efectuado.</p>
                                            <img src="https://www.mediafire.com/convkey/1122/gixz3lt2fp58sv16g.jpg" alt="">









                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq4">
                                            <h1 id="4" style="font-size: 15pt;">4. Productos</h1>
                                        </button>
                                    </div>
                                    <div id="faq4" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <br>
                                            <p>Productos lo encontraras en el menú</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/a1d4/y4aoyl9rovvdvkv6g.jpg" alt="">
                                            <br>
                                            <p>Al presionar click sobre él, se desplegará un menú con 2 opciones “Nuevo producto” y “Lista de productos”.</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/dfc0/00lk5e3lw1ef8986g.jpg" alt="">
                                            <br>
                                            <p>Nuevo producto</p>
                                            <br>
                                            <p>Al presionar click sobre nuevo producto el te llevara a un formulario.</p>
                                            <img src="https://www.mediafire.com/convkey/5d83/d7ywoqkzr8mr09z6g.jpg" alt="">
                                            <br>
                                            <p>El formulario esta compuesto por varios campos que ayudan a definir correctamente la inserción de un nuevo producto con su respetiva imagen.</p>
                                            <br>
                                            <img src="https://www.mediafire.com/convkey/a65b/vrc944yywzve2nm6g.jpg" alt="">
                                            <p>insertar una imagen de un producto</p>
                                            <br>
                                            <p>Te dirigirás al botón de seleccionar archivo</p>
                                            <img src="https://www.mediafire.com/convkey/12f0/cpoj9w6ifqy5x3k6g.jpg" alt="">
                                            <p>Se abrirá el explorador de archivos de tu sistema operativo, en cual buscaras una imagen en el formato compatible (PNG,JPG) para el producto.</p>
                                            <img src="https://www.mediafire.com/convkey/b317/jwi578khg0ckd8u6g.jpg" alt="">
                                            <p>Cuando estés satisfecho con los datos y la imagen que hayas seleccionado podrás guardar este para que se almacene como un producto presionado el botón de “Guardar”</p>
                                            <img src="https://www.mediafire.com/convkey/fd12/z4foaxhcp1v82no6g.jpg" alt="">
                                            <br>
                                            <p>Lista de productos</p>
                                            <img src="https://www.mediafire.com/convkey/2a8e/0yuuso2sajzx11o6g.jpg" alt="">
                                            <p>Al presionar en lista de productos este te llevara a una tabla con todos los productos agregados. </p>

                                            <img src="https://www.mediafire.com/convkey/3318/sju61l1ll08zrj86g.jpg" alt="">
                                            <p>En cual podrás ver la descripción, cantidad y demás características del producto.</p>
                                            <br>
                                            <p>Acciones</p>
                                            <img src="https://www.mediafire.com/convkey/f0ca/6q3wctstowbfrby6g.jpg" alt="">
                                            <p>Las acciones son las que te permitirán manejar y editar y eliminar el producto como sea necesario incluso desactivarlo</p>
                                            <br>
                                            <p>El botón “Activo” es el que permite cambiar el estado un producto al estar activo este se mostrar en la página del negocio.</p>
                                            <img src="https://www.mediafire.com/convkey/c7b8/90418ye3fi3uz9v6g.jpg" alt="">
                                            <p>Al presionarlo lo veremos reflejado como inactivo</p>
                                            <img src="https://www.mediafire.com/convkey/3f0e/yihkpz1zwku0k7m6g.jpg" alt="">
                                            <p>Botón “Editar”, este botón no llevara a un formulario donde veremos los datos actuales y podremos cambiar y actualizar los datos que se consideren pertinentes.</p>
                                            <img src="https://www.mediafire.com/convkey/bd8e/jm7wy86ja8846136g.jpg" alt="">
                                            <p>Cuando estés satisfecho con los cambios o actualizaciones podrá presionar el botón “Guardar”
                                                Para salvar los nuevos cambios efectuados.
                                            </p>
                                            <img src="https://www.mediafire.com/convkey/fd12/jx5yj9rf27wlvat6g.jpg" alt="">
                                            <p>El botón “Eliminar nos permite borrar permanentemente un producto que ya no se requiera.</p>
                                            <img src="https://www.mediafire.com/convkey/7000/6ku989sq3tohqxm6g.jpg" alt="">


                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq5">
                                            <h1 id="5" style="font-size: 15pt;">5. Usuarios</h1>
                                        </button>
                                    </div>
                                    <div id="faq5" class="collapse" data-parent="#accordion">
                                        <div class="card-body">


                                            <img src="https://www.mediafire.com/convkey/d22f/b5xedjsouu2ctek6g.jpg" alt="">
                                            <p>Al presionar click sobre usuarios nos llevara a una tabla.</p>
                                            <img src="https://www.mediafire.com/convkey/8135/v3g6kz5k3m5h6c16g.jpg" alt="">
                                            <p>En la tabla podremos ver a los usuarios que están registrados en la tienda con sus respectivos datos.</p>
                                            <p>También tenemos la posibilidad de eliminar usuarios en caso de ser necesario con el botón “Eliminar”</p>
                                            <img src="https://www.mediafire.com/convkey/8fcf/6t7uby0ams2ki106g.jpg" alt="">





                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6">
                                            <h1 id="6" style="font-size: 15pt;">6. Ordenes</h1>
                                        </button>
                                    </div>
                                    <div id="faq6" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <img src="https://www.mediafire.com/convkey/2002/z11o7u45rs06r5g6g.jpg" alt="">
                                            <p>Al presionar click sobre órdenes nos llevara a una tabla donde tendremos un listado de todos lo pedidos realizados, y podremos ver y editar el estado de estos.</p>
                                            <img src="https://www.mediafire.com/convkey/bd18/85v2xrvquqoinmj6g.jpg" alt="">
                                            <p>Al posicionarnos sobre el numero de ID de la orden </p>
                                            <img src="https://www.mediafire.com/convkey/7481/strngld7uwh348u6g.jpg" alt="">
                                            <p>Accederemos a un formulario donde podemos ver detalles del pedido como cantidad, precio, nombre etc.</p>
                                            <img src="https://www.mediafire.com/convkey/3dfa/ps82w0o16aecl5d6g.jpg" alt="">
                                            <p>Para cambiar el status no dirigimos a “Selecciones status y se desplegaran estas opciones la cuales podremos elegir el estado del pedido y este reflejara en la cuenta del cliente.</p>
                                            <img src="http://www.mediafire.com/view/sqx863cz349h6s1/45.png/file" alt="">
                                            <p>Cuando hayas seleccionar el estado, para guardarlo simplemente presionaremos el botón enviar y estado cambiara automáticamente.</p>
                                            <img src="https://www.mediafire.com/convkey/88b9/im3q4wu0nxnx4xa6g.jpg" alt="">


                                        </div>
                                    </div>
                                </div>




                            </div>



                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block " data-toggle="collapse" data-target="#faq1-1">
                                        <h1 id="7" style="font-size: 15pt;">7. Contacto</h1>
                                    </button>
                                </div>
                                <div id="faq1-1" class="collapse">
                                    <div class="card-body">
                                        <img src="https://www.mediafire.com/convkey/1802/vazwji6lifnwzd86g.jpg" alt="">
                                        <p>En contactos encontraremos los datos que los clientes nos han suministrado para comunicarse con nosotros</p>
                                        <img src="https://www.mediafire.com/convkey/cfbe/47r2ioeptxmpxfi6g.jpg" alt="">
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2-2">
                                        <h1 id="8" style="font-size: 15pt;">8. Reportes</h1>
                                    </button>
                                </div>
                                <div id="faq2-2" class="collapse">
                                    <div class="card-body">
                                        <img src="https://www.mediafire.com/convkey/1588/z7l7v9mpurstbwq6g.jpg" alt="">
                                        <p>En reportes encontraremos las distintas listas que vimos anterior mente las cuales contienen la información que hará parte de los reportes que podremos generar con esta herramienta.</p>
                                        <br>
                                        <p>Al presionar clic sobre la sección de reporte que requerimos este nos llevara a un menú con los datos de esta lista </p>
                                        <img src="https://www.mediafire.com/convkey/7a5c/00w4i094g2pzbht6g.jpg" alt="">
                                        <p>Veremos 3 botones los cuales nos permitirán generar la lista en formatos como pdf y excel o imprimirlo</p>
                                        <img src="https://www.mediafire.com/convkey/1c8a/mmwn227wwift6e46g.jpg" alt="">
                                        <p>Dependiendo de nuestra necesidad seleccionaremos una de estas opciones y obtendremos nuestro reporte</p>
                                        <br>
                                        <p>EXCEL</p>
                                        <img src="https://www.mediafire.com/convkey/2450/t5c1z5n9qr62tth6g.jpg" alt="">
                                        <p>PDF</p>
                                        <img src="https://www.mediafire.com/convkey/2e51/xmb1feti8y0jen66g.jpg" alt="">
                                        <p>IMPRESION</p>

                                        <img src="https://www.mediafire.com/convkey/d065/kvueyd0aamgk91p6g.jpg" alt="">
                                    </div>
                                </div>
                            </div>









                           
                        </div>
                    </div>




        <div class="footer-wrap pd-20 mb-20 card-box">
                Admin Panel Cavis HomeStore 
                <a style="text-decoration: none; color: black">| Version 1.0</a>
                <!-- <a href="https://github.com/dropways" target="_blank">Version 1.0</a> -->
            </div>
        </div>
    </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="vendors/scripts/datatable-setting.js"></script>


</body>

</html>