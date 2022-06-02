@include('frontend.header')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="{{ url('/login') }}" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <!-- <embed src="https://www.youtube.com/embed/prDsdioSoOc" style="width: 636px; height: 477px;" type=""> -->
            <img src="{{ asset('frontend/assets/img/about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Creative Academy</h3>
            <p class="fst-italic" style="text-align:justify;">
              Creative Academy merupakan Start Up baru dari Creative Media, Creative Media merupakan perusahaan Digital Agency & IT Consultant di Surabaya. Kami merupakan Lembaga Pendidikan Non Formal yang Resmi mendapat izin penyelenggaraan, apresiasi dan dukungan penuh dari Dinas Pendidikan Kota Surabaya. Kami hadir di Kota Surabaya menjawab kebutuhan generasi millennial yang tidak lepas dari Kebutuhan IT dan Multimedia. Kami berfokus pada : 
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <a href="https://creativemedia.id/profil-kursus-komputer-surabaya/"> Computer Course & Trainings</a> </li>
              <li><i class="bi bi-check-circle"></i> <a href="https://creativemedia.id/jasa-desain-grafis-surabaya/"> Branding & Desain</a> </li>
              <li><i class="bi bi-check-circle"></i><a href="https://creativemedia.id/web-development-cara-membuat-website-powerfull/"> Web Development</a> </li>
              <li><i class="bi bi-check-circle"></i><a href="https://creativemedia.id/jasa-pembuatan-program-dan-aplikasi-android-surabaya/"> Mobile Apps Development</a> </li>
            </ul>
            <p class="fst-italic" style="text-align:justify;">
            Mereka datang dari berbagai kalangan, mulai dari Pelajar, Mahasiswa, Staff Perusahaan, Pegawasi Swasta, PNS, Pegawai Bank, Wirausaha, Owner Perusahaan, Pebisnis Online, dll. Mereka berdatangan dari berbagai kota dan wilayah yang tersebar di Indonesia & Mancanegara. Semua itu didasari karena mereka tau, bahwa kami adalah pilihan terbaik untuk mengembangkan skill melalui jalur Pendidikan Non Formal. Mereka datang dari berbagai daerah untuk belajar secara langsung ditempat kami.
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\User::count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\Kelas::count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\Event::count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\Tentor::count() }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Kenapa Creative Academy Berbeda?</h3>
              <p>
                Sudah saatnya anda bijak memilih sumber belajar terbaik. Tak hanya materi yang terjamin, Creative Academy juga memiliki Trainer yang berpengalaman di Bidangnya.
              </p>
              <div class="text-center">
                <a href="{{ url('/') }}#about" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Belajar Fleksibel Sesuai Jadwal Anda</h4>
                    <p>Belajar kapan pun, di mana pun, secara mandiri. Bebas memilih kelas sesuai minat belajar. Akses seumur hidup ke kelas dan forum diskusi setelah membeli kelas.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Materi Pembelajaran</h4>
                    <p>Materi kelas langsung kepada end-point sesuai studi kasus. Diajarkan dari awal hingga akhir sesuai studi kasus.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Setelah pembelajaran</h4>
                    <p>Setelah pembelajaran anda bisa mengerjakan project sesuai dengan kelas yang telah diambil</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>15 Bidang Studi</h2>
        <p>Creative Academy memiliki 15 Bidang Studi. Bidang Studi tersebut diantaranya dibawah ini</p>
      </div>
    </div><!-- End Breadcrumbs -->
    <br>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-macbook-line" style="color: #0F00A2;"></i>
              <h3><a href="">Komputer Umum dan Internet</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-folders-line" style="color: #ffbb2c;"></i>
              <h3><a href="">Administrasi Perkantoran</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-mac-line" style="color: #e80368;"></i>
              <h3><a href="">Komputer Akuntansi</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-ball-pen-fill" style="color: #A23100;"></i>
              <h3><a href="">Animasi</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-vidicon-2-fill" style="color: #060202;"></i>
              <h3><a href="">Editing Video</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-camera-3-line" style="color: #D30006;"></i>
              <h3><a href="">Photography</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-bar-chart-grouped-fill" style="color: #11dbcf;"></i>
              <h3><a href="">Digital Marketing</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-mark-pen-line" style="color: #4233ff;"></i>
              <h3><a href="">Desain Grafis</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #E80252;"></i>
              <h3><a href="">Desain Interior</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-pencil-ruler-2-line" style="color: #b20969;"></i>
              <h3><a href="">Desain Arsitektur</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-html5-line" style="color: #ff5828;"></i>
              <h3><a href="">Website Design CMS</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-terminal-box-line" style="color: #29cc61;"></i>
              <h3><a href="">Pemrograman Dasar</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-code-box-line" style="color: #E87802;"></i>
              <h3><a href="">Pemrograman Web</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-braces-line" style="color: #060202;"></i>
              <h3><a href="">Pemrograman Java Android</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Courses</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Courses</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach($kelas as $kelas)
          <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{ asset('uploads/kelas/' . $kelas->foto_kelas ) }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>{{ $kelas->kategorikelas->nama_kategori }}</h4>
                  <p class="price">{{ rupiah($kelas->nominal) }}</p>
                  <!-- <span style="text-decoration: line-through red;"> rupiah($kelas->nominal) </span> -->
                </div>

                <h3><a href="{{ url('/detailkelas/'. $kelas->id) }}">{{ $kelas->nama_kelas }}</a></h3>
                <p>{{ $kelas->deskripsi }}</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('uploads/tentor/' . $kelas->tentor->profil ) }}" class="img-fluid" alt="">
                    <span>{{ $kelas->tentor->nama_tentor }}</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <br>
                    <!-- <i class="bx bx-user"></i>&nbsp;50 -->
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          @endforeach
        </div>

      </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach($tentor as $ten)
              <div class="col-lg-3 col-md-3 d-flex align-items-stretch">
                <div class="member">
                  <img src="{{ asset('uploads/tentor/'.$ten->profil) }}" class="img-fluid" alt="">
                  <div class="member-content">
                    <h4>{{ $ten->nama_tentor }}</h4>
                    <span>{{ $ten->kategorikelas->nama_kategori}}</span>
                    <p>{{ $ten->deskripsi }}</p>
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
      </div>
    </section><!-- End Trainers Section -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Events</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

      <div class="row">
        @foreach($event as $event)
        <div class="col-md-6 d-flex align-items-stretch">
            <div class="card">
                <div class="card-img">
                    <img src="{{ asset('uploads/event/' . $event->foto_event ) }}" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url('/detailevent/'. $event->id) }}">{{ $event->nama_event }}</a></h5>
                    <p class="fst-italic text-center">{{ tanggal($event->tgl_event) }} jam {{ $event->jam_event }}</p>
                    <p class="fst-italic text-center">Lokasi : {{ $event->lokasi }}</p>
                    <p class="card-text">{{ $event->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
      </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
      <br><br><br><br><br>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4566665620127!2d112.76780421450378!3d-7.302480573815449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa5691112989%3A0xfa01325a6e99771!2sCREATIVE%20MEDIA%20KCP%20NGINDEN!5e0!3m2!1sid!2sid!4v1653029457393!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <h6>&nbsp;&nbsp;&nbsp; <strong>Creative Media Surabaya Timur:</strong> </h6>
                <p>Jl. Nginden Intan Timur XVIII No.A3-10, Nginden Jangkungan, Kec. Sukolilo, Kota SBY, Jawa Timur 60118</p>
                <br>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Creative Media Surabaya Barat:</strong></h6>
                <p>Kawasan Darmo Satelit, Jl. Raya Tubanan Baru No.10 Blok K-15, Tanjungsari, Kec. Sukomanunggal, Kota SBY, Jawa Timur 60188</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <h6>&nbsp;&nbsp;&nbsp; <strong> Creative Media Surabaya Timur:</strong></h6>
                <p>nginden@creativemedia.id</p>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> Creative Media Surabaya Barat:</strong></h6>
                <p>care@creativemedia.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <h6>&nbsp;&nbsp;&nbsp; <strong> Creative Media Surabaya Timur:</strong></h6>
                <p>p. 031 5917 3739 | m. 0821 3131 0210</p>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> Creative Media Surabaya Barat:</strong></h6>
                <p>p. 031 7328 540 | m. 0821 3131 4040</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ url('/contact') }}" method="POST" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="content" rows="5" placeholder="Pesan - No WA/TELP" required></textarea>
              </div>
              <div class="my-3">
                        @if(Session::has("success"))
                            <div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success')}}</div>
                        @elseif(Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                        @endif
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
@include('frontend.footer')