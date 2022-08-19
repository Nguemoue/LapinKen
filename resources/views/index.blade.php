@extends("template")

@section("main")
<!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider slider_bg_1 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="slider_text">
                            <h3>Bienvenue Chez <br> <span style="font-size: 17px;" >LAPIN-KEN</span></h3>
                            <p>Ici trouvez la solutions pour vos lapins</p>
                            <a href="contact.html" class="boxed-btn4">Nous Contacter</a>
                        </div>
                    </div>
                </div>
            </div>
            <img src="img/lapinken.jpg" width="50%" style="filter: hue-rotate(12deg) invert(10%) "  alt="">
            <div class="dog_thumb d-none d-lg-block">
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Nos Services</h3>
                        <p>Voici ci dessous nos differentes prestations de services.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/lapin.png" class="img-fluid" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Ventes Des Lapins</h3>
                            <p> nous vous fournissonts des lapins de chair de differentes categories  </p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service active">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/volaille.jpg" width="50%" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Ventes des Volailles</h3>
                            <p>vous avez ici a votre dispositions des poulets et aussi des cailles</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/prestation.jpg" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Perstations de Services</h3>
                            <p>Nous mettons a dispositions nos services a vous cout par jour</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- pet_care_area_start  -->
    <div class="pet_care_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="pet_thumb">
                        <img src="img/logo.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6">
                    <div class="pet_info">
                        <div class="section_title">
                            <h3><span>Votre Satisfactions notre objectif </span> <br>
                                Soyez Satisfait</h3>
                            <p>
                                Notre Objectif est qu'au travers de nos produits vous soyez satisfait en tout point <br>
                                Que se soit en matiere de Lapin , de Chiens , de volaille ou de Prestations de services

                            </p>
                            <a href="about.html" class="boxed-btn3">A Propos de Nous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pet_care_area_end  -->

    <!-- adapt_area_start  -->
    <div class="adapt_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="adapt_help">
                        <div class="section_title">
                            <h3><span>Oupps !!</span>
                               Notre Statistique </h3>
                            <p>Ci desous nous avons notre statistique journalieres</p>
                            <a href="contact.html" class="boxed-btn3">Nous Contacter</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="adapt_about">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/lapin.jpg" alt="">
                                    <div class="adapt_content">
                                        <h3 class="_counter">{{$totalCount->lapin}}</h3>
                                        <p>Lapins Disponibles</p>
                                    </div>
                                </div>
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/chien.jpg" alt="">
                                    <div class="adapt_content">
                                        <h3 class="_counter">{{$totalCount->lapin}}</h3>
                                        <p>Chiens Disponoble</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/caille.jpg" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="_counter">{{$totalCount->caille}}</span>+</h3>
                                        <p>Cailles Disponibles</p>
                                    </div>
                                </div>
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/cochon.jpg" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="_counter">{{$totalCount->cochon}}</span>+</h3>
                                        <p>Cochons D'indes Disponible</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- adapt_area_end  -->

    <!-- testmonial_area_start  -->
    {{-- <div class="testmonial_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="textmonial_active owl-carousel">
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="img/testmonial/1.png" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="img/testmonial/1.png" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="img/testmonial/1.png" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- testmonial_area_end  -->

    <!-- team_area_start  -->
    <div class="team_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Notre Equipe</h3>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="img/team/stephane.jpg" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>K. Stephane</h4>
                                <p>Producteur</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="img/team/ristelle.jpg" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>K. Ristelle</h4>
                                <p>Productrice</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="img/team/luc.jpg" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>N.Luc</h4>
                                <p>Partenaire</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team_area_start  -->

@endsection