@extends("theme.$theme.layout")
@section('contenido')
<section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/thebigboss/images/fotos/grupo1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h2 class="mb-0 bread">Conocenos</h2>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Inicio <i class="ion-ios-arrow-round-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Conocenos <i class="ion-ios-arrow-forward"></i></a></span> <span>Conocenos<i class="ion-ios-arrow-round-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  
  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">#1. Una BARBERIA Que Piensa En El Cliente</h2>
          <p>La imagen personal cobra una especial importancia en una sociedad como la actual,
             en donde el éxito debe ir acompañado de un look impecable. No se trata únicamente de una 
             cuestión de moda, sino de un imperativo social. </p>
          <p>
            <img src="{{asset("assets/$theme/images/fotos/logothebigboss.png")}}" alt="" class="img-fluid">
          </p>
          <p>THE BIG BOSS BARBER SHOP quiere prestarle sus servicios para ayudarle a que tenga esa imagen acorde
             a sus características, mediante el adecuado tratamiento de su cabello. 
            Desde THE BIG BOSS queremos ofrecerle nuestros servicios para atenderle 
            de una forma personalizada, manteniendo en todo momento la confianza y 
            discreción que tradicionalmente ha caracterizado a este servicio. </p>
          <h2 class="mb-3 mt-5">#2. Un Equipo De Trabajo Comprometido</h2>
          <p>Tenemos un excelente equipo de trabajo comprometido con todos nuestros cliente, para asi 
            entregar un servicio de alta calidad con utensilios de primera, consejos y asesorias de nuevos look,
            conocemientos en tendencias actuales y profesionales Especializados en cada area.
          </p>
          <p>
            <img src="{{asset("assets/$theme/images/fotos/color.jpg")}}" alt="" class="img-fluid">
          </p>
          <p>Ponemos a su disposición los servicios de corte de pelo (tijera y navaja), modelados,
             manicura, limpieza de cutis, difuminados, y posticería. 
            Confiamos en poder atenderle y tenerle entre nuestros clientes. </p>
          <div class="tag-widget post-tag-container mb-5 mt-5">
            {{-- <div class="tagcloud">
              <a href="#" class="tag-cloud-link">child</a>
              <a href="#" class="tag-cloud-link">help</a>
              <a href="#" class="tag-cloud-link">give</a>
              <a href="#" class="tag-cloud-link">charity</a>
            </div> --}}
          </div>
          
          <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <img src="{{asset("assets/$theme/images/fotos/logothebigboss.png")}}" alt="Image placeholder" class="img-fluid mb-4">
            </div>
            <div class="desc">
              <h3>The Big Boss Virtudes </h3>
              <p>Elegir la barba según el rostro del cliente
                 - Brindar más que un corte de barba
                 - Conocer los cuidados para cada barba
                 - Estar al día con las tendencias
                 - Seguir los consejos de los expertos.
              </p>
            </div>
          </div>


          <div class="pt-5 mt-5">
            {{-- <h3 class="mb-5">6 Comments</h3> --}}
            <ul class="comment-list">
              <li class="comment">
                {{-- <div class="vcard bio">
                  <img src="{{asset("assets/$theme/images/person_1.jpg")}}" alt="Image placeholder">
                </div> --}}
                {{-- <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div> --}}
              </li>

              <li class="comment">
                {{-- <div class="vcard bio">
                  <img src="{{asset("assets/$theme/images/person_1.jpg")}}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div> --}}

                <ul class="children">
                  <li class="comment">
                    {{-- <div class="vcard bio">
                      <img src="{{asset("assets/$theme/images/person_1.jpg")}}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>John Doe</h3>
                      <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div> --}}


                    <ul class="children">
                      <li class="comment">
                        {{-- <div class="vcard bio">
                          <img src="{{asset("assets/$theme/images/person_1.jpg")}}" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>John Doe</h3>
                          <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                          <p><a href="#" class="reply">Reply</a></p>
                        </div> --}}

                          <ul class="children">
                            <li class="comment">
                              {{-- <div class="vcard bio">
                                <img src="{{asset("assets/$theme/images/person_1.jpg")}}" alt="Image placeholder">
                              </div>
                              <div class="comment-body">
                                <h3>John Doe</h3>
                                <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply">Reply</a></p>
                              </div> --}}
                            </li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="comment">
                {{-- <div class="vcard bio">
                  <img src="{{asset("assets/$theme/images/work-3.jpg")}}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                  <h3>John Doe</h3>
                  <div class="meta">Sept. 12, 2019 at 2:21pm</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                  <p><a href="#" class="reply">Reply</a></p>
                </div> --}}
              </li>
            </ul>
            <!-- END comment-list -->
            
            {{-- <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
              <form action="#" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

              </form>
            </div> --}}
          </div>

        </div> <!-- .col-md-8 -->

        <div class="col-lg-4 sidebar ftco-animate">
          {{-- <div class="sidebar-box bg-light">
            <form action="#" class="search-form bg-light">
              <div class="form-group">
                <span class="icon ion-ios-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </form>
          </div> --}}
          <div class="sidebar-box bg-light ftco-animate">
              <h3 class="heading-2">Horarios</h3>
            <ul class="categories">
              <li><a href="#">Lunes<span>10:00 - 19:00</span></a></li>
              <li><a href="#">Martes<span>10:00 - 19:00</span></a></li>
              <li><a href="#">Miercoles<span>10:00 - 19:00</span></a></li>
              <li><a href="#">Jueves<span>10:00 - 19:00</span></a></li>
              <li><a href="#">Viernes<span>10:00 - 19:00</span></a></li>
              <li><a href="#">Sabado<span>10:00 - 19:00</span></a></li>
            </ul>
          </div>

          <div class="sidebar-box bg-light ftco-animate">
            <h3 class="heading-2">Otros</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../assets/thebigboss/images/fotos/maquinas.JPG);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Equipamiento y Productos De Primera Calidad.</a></h3>
                {{-- <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Sept. 12, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div> --}}
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../assets/thebigboss/images/fotos/unas.JPG);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#"> manicura, limpieza de cutis, difuminados, y posticería. </a></h3>
                {{-- <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Sept. 12, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div> --}}
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(../assets/thebigboss/images/fotos/pelo.JPG);"></a>
              <div class="text">
                <h3 class="heading-1"><a href="#">Limpieza del cuero cabelludo y el cabello con Productos De Primera Calidad</a></h3>
                {{-- <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> Sept. 12, 2019</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div> --}}
              </div>
            </div>
          </div>

          <div class="sidebar-box bg-light ftco-animate">
            {{-- <h3 class="heading-2">Tag Cloud</h3>
            <div class="tagcloud">
              <a href="#" class="tag-cloud-link">donate</a>
              <a href="#" class="tag-cloud-link">charity</a>
              <a href="#" class="tag-cloud-link">non-profit</a>
              <a href="#" class="tag-cloud-link">organization</a>
              <a href="#" class="tag-cloud-link">child</a>
              <a href="#" class="tag-cloud-link">abuse</a>
              <a href="#" class="tag-cloud-link">help</a>
              <a href="#" class="tag-cloud-link">volunteer</a>
            </div> --}}
          </div>

          {{-- <div class="sidebar-box bg-light ftco-animate">
            <h3 class="heading-2">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div> --}}
        </div>

      </div>
    </div>
  </section> <!-- .section -->
 

@endsection


    