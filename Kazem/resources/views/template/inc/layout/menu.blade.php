<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span
                    class="font-sans-serif">falcon</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("") }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Básico
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <a class="nav-link" href="{{ url("antecedente")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Antecedentes</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("armadura")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Armaduras</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("arma")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Armas</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("classe")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Classes</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("continente")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Continente</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("cidade")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Cidades</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("divindade")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Divindades</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("equipamento")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Equipamento</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("escolamagia")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Escolas de Magia</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("jogador")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Jogador</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("magia")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Magias</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("personagem")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Personagens</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("raca")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Raças</span>
                        </div>
                    </a>

                    <a class="nav-link" href="{{ url("talento")}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-user"></span></span><span class="nav-link-text ps-1">Talentos</span>
                        </div>
                    </a>


                </li>
            </ul>
            
        </div>
    </div>
</nav>
