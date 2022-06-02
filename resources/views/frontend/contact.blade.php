@include('frontend.header')
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
                <h6>&nbsp;&nbsp;&nbsp; Creative Media Surabaya Timur:</h6>
                <p>Jl. Nginden Intan Timur XVIII No.A3-10, Nginden Jangkungan, Kec. Sukolilo, Kota SBY, Jawa Timur 60118</p>
                <br>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Creative Media Surabaya Barat:</h6>
                <p>Kawasan Darmo Satelit, Jl. Raya Tubanan Baru No.10 Blok K-15, Tanjungsari, Kec. Sukomanunggal, Kota SBY, Jawa Timur 60188</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <h6>&nbsp;&nbsp;&nbsp; Creative Media Surabaya Timur:</h6>
                <p>nginden@creativemedia.id</p>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Creative Media Surabaya Barat:</h6>
                <p>care@creativemedia.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <h6>&nbsp;&nbsp;&nbsp; Creative Media Surabaya Timur:</h6>
                <p>p. 031 5917 3739 | m. 0821 3131 0210</p>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Creative Media Surabaya Barat:</h6>
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
    @include('frontend.footer')