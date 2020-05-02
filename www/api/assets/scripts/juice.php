<script class="juice">
    $(document).ready(function() {

        /*           DETECTAMOS SI HAY SESION ALMACENADA               */
        setTimeout(function() {
            var userIntel = window.localStorage.getItem("userIntel");
            if (userIntel) {
                var jsonObj = $.parseJSON('[' + userIntel + ']');
                userIntel = jsonObj[0];
                setTimeout(function() {
                    showPanel(userIntel.panelUser, userIntel.id);
                }, 200);
            } else {
                showPanel();
            }
        }, 300);

        /*           INICIO DE SESION               */
        $(document).on('click', '#loginBtn', function(e) {
            e.preventDefault();
            console.log('point');
            var username = $(document).find('.username').val();
            var password = $(document).find('.password').val();

            /// VALIDAMOS QUE NO EXISTAN CAMPOS VACIOS ///
            if (username == '') {
                $.growl.warning({
                    message: "Ingrese su email para ingresar"
                });
                return false;
            }
            if (password == '') {
                $.growl.warning({
                    message: "Ingrese su contraseña"
                });
                return false;
            }

            if (validateEmail(username)) {

                $("#loading").fadeIn("slow", function() {
                    var formData = new FormData();
                    formData.append('username', username);
                    formData.append('password', password);
                    formData.append('apiuri', apiURI);
                    formData.append('meth', 'login');
                    $.ajax({
                        url: apiURI,
                        type: 'POST',
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            if (data.scriptResp == "noMatch") {
                                $("#loading").fadeOut("slow", function() {
                                    $.growl.error({
                                        message: "Usuario o contraseña incorrectos"
                                    })
                                });
                                //    $('.username').val('');
                                //    $('.password').val('');
                            }
                            if (data.scriptResp == "match") {
                                window.localStorage.setItem("userIntel", JSON.stringify(data.userIntel));
                                showPanel(data.userIntel.panelUser, data.userIntel.id);
                            }
                        },
                        error: function(error) {
                            console.log("Hubo un error de internet, intente de nuevo");
                            console.log(error);
                        }
                    });
                });
            } else {
                $.growl.warning({
                    message: "debe ingresar un email válido para ingresar"
                });
                return false;
            }
        });

        /*           CIERRE DE SESION               */
        $(document).on('click', '.logOutBtn', function(e) {
            $("#loading").fadeIn("slow", function() {
                window.localStorage.clear();
                $('body div.page-container').remove();
                $('body').prepend('<div class="page-container"><div class="page-content" style="height: 100vh!important;"> </div> </div>');
                $('body script.controller').remove();
                showPanel();
            });
        });

        /*           CAMBIAR DE PANEL MOSTRADO             */
        $(document).on('click', '.changePanel', function(e) {
            var self = this,
                panelToShow = $(self).attr('data-panel'),
                userId = $('#sidebarLoaded').attr('data-useridpanel');

            if (panelToShow == 'homeLogo') {
                panelToShow = 'ads'
            }
            $("#loading").fadeIn("slow", function() {
                showPanel(panelToShow, userId);
            });
        });

        $.supersized({

            // Functionality
            slide_interval: 2000, // Length between transitions
            transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
            transition_speed: 1000, // Speed of transition
            performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)

            // Size & Position
            min_width: 0, // Min width allowed (in pixels)
            min_height: 0, // Min height allowed (in pixels)
            vertical_center: 1, // Vertically center background
            horizontal_center: 1, // Horizontally center background
            fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
            fit_portrait: 1, // Portrait images will not exceed browser height
            fit_landscape: 0, // Landscape images will not exceed browser width

            // Components
            slide_links: 'blank', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
            slides: [ // Slideshow Images
                {
                    image: 'assets/img/backgrounds/1.jpg'
                },
                {
                    image: 'assets/img/backgrounds/2.jpg'
                },
                {
                    image: 'assets/img/backgrounds/3.jpg'
                }
            ]

        });

    });

    /** Mostramos el contenido del menu seleccionado, si no se ha seleccionado nigun menu retorna la ventana de Login */
    function showPanel(p, u) {
        console.log('obteniendo panel');
        var userIntel = window.localStorage.getItem("userIntel");
        var jsonObj = $.parseJSON('[' + userIntel + ']');
        userIntel = jsonObj[0];

        var formData = new FormData();
        formData.append('panel', p);
        formData.append('user', u);
        formData.append('meth', 'loadPanel');
        return $.ajax({
            url: apiURI,
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                if (data.scriptResp == "loaded") {
                    $('body div.page-container, .loginBox').remove();
                    $('body .loginSet').remove();
                    $('body script.controller').remove();
                    $('body').attr("class", data.panelName + ' ');
                    var view = populate(data.panelName, data.panel);
                    if (data.panelName != 'login') {
                        $('body').prepend('<div class="page-container"><div class="page-content" style="height: 100vh!important;"> </div> </div>');
                        loadSideBar();
                        $(document).find('.page-content').append(view);
                        $('body').append(data.control);
                    } else {
                        $('body').append('<div id="particles-js" class="loginSet"></div>');
                        $('body').prepend(view);
                        showLogin();
                    }
                }
            },
            error: function(error) {
                console.log("Hubo un error de internet, intente de nuevo");
                console.log(error);
            }
        });
    }

    /** EN STA FUNCION POBLAMOS LAS VARIABLES DE LAS PLANTILLAS HTML CON LOS DATOS DE NUESTRA APP */
    function populate(panel, code) {
        var derechos = 'TOSCANA Alimentos © 2020. Todos los derechos reservados. Factory:<a href="https://toscana.com.ec"> GO TRADE</a>',
            appname = 'Ventas y Comisiones',
            userIntel = window.localStorage.getItem("userIntel"),
            jsonObj = $.parseJSON('[' + userIntel + ']');

        userIntel = jsonObj[0];
        code = code.split("___DERECHOSDEAUTOR___").join(derechos);
        code = code.split("___APPNAME___").join(appname);
        code = code.split("___APIURI___").join(apiURI);
        if (panel == "home") {
            return code;
        }
        if (panel == "login") {
            return code;
        }
        if (panel == "sideBar") {
            code = code.split("___PATHTOPROFILEPIC___").join('api/assets/img/users/default.jpg');
            code = code.split("___NOMBRESUSUARIO___").join('Usuario de Pruebas');
            code = code.split("___ROLUSUARIO___").join('Administrador');
            code = code.split("___IDUSUARIO___").join('1');
            code = code.split("___EMAILUSER___").join('frank@burtonservers.com');
            return code;
        }
        if (panel == "usuarios") {
            return code;
        }
        if (panel == "userconfig") {
            code = code.split("___NOMBRESUSUARIO___").join("Usuario de Pruebas");
            code = code.split("___EMAILUSER___").join('frank@burtonservers.com');
            code = code.split("___PATHTOPROFILEPIC___").join('api/assets/img/users/default.jpg');
            return code;
        }
        return code;
    }

    /** EL USUARIO DEPENDINEDO DE SU ROL RECIBE UN SIDEBAR DIFERENTE */
    function loadSideBar(u) {
        console.log('obteniendo sidebar');
        var formData = new FormData();
        formData.append('user', u);
        formData.append('meth', 'showSideBar');
        return $.ajax({
            url: apiURI,
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                if (data.scriptResp == "loaded") {
                    var sideb = populate('sideBar', data.sideb);
                    var statusb = populate('sideBar', data.statusb);
                    $('.page-container').prepend(sideb);
                    $('.page-content').prepend(statusb);
                    $(".menuItem").removeClass("active");
                    $(document).find(".ads").addClass("active");
                    deployActions();
                    deployPlugins();
                    $("#loading").fadeOut("slow");
                } else {
                    console.log('hubo un error #45345345789754653');
                }
            },
            error: function(error) {
                console.log("Hubo un error de internet, intente de nuevo");
                console.log(error);
            }
        });

    }

    /** RESUMIMOS LAS LLAMADAS A LA API EN UNA MISMA FUNCION */
    function apiCall(postData, urlDest, onSuccess) {
        $.ajax({
            url: urlDest,
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: postData,
            success: function(data) {
                if (data.scriptResp == "done") {
                    onSuccess(data);
                } else {
                    console.log('hubo un error en al respuesta.');
                    console.log(data);
                }
            },
            error: function(error) {
                console.log("Hubo un error de internet, no hubo respuesta de la API");
                console.log(error);
            }
        });
    }

</script>