@include('frontend.header')
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
    @include('frontend.footer')