@include('frontend.header')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
    <h2>Course Details</h2>
    <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-8">
        <!-- <img src="{{ asset('uploads/kelas/' . $kelas->foto_kelas ) }}" class="img-fluid" alt=""> -->
        <embed src="{{ $video->link }}"style="width: 800px; height: 415px;" type="">
        <h3>{{ $kelas->nama_kelas }} | {{ $video->judul }}</h3>
        <p>
            {{ $kelas->deskripsi}}
        </p>
        </div>
        <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Trainer</h5>
            <p><a href="#">{{ $kelas->tentor->nama_tentor}}</a></p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Course Fee</h5>
            <p>{{ rupiah($kelas->nominal) }}</p>
        </div>
        
        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Schedule</h5>
            <p>Lifetime Acces</p>
        </div>
        
        <div class="d-flex align-items-center">
        <p><a href="{{ url('/login') }}" class="get-started-btn"><i class='bx bx-cart'></i>&ensp; Beli</a></p>
        </div>

        </div>
    </div>

    </div>
</section><!-- End Cource Details Section -->

<!-- ======= Cource Details Tabs Section ======= -->
<section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Studi Kasus</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Konsultasi</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Lifetime Access</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
            </li>
        </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
            <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Studi Kasus</h3>
                <p class="fst-italic">Membuat / membangun project secara real dan paling dibutuhkan</p>
                <p>Kursus & Pelatihan Komputer IT Multimedia dengan biaya terjangkau serta bersaing meliputi bidang studi Digital Marketing, Animasi, Photography, Graphic Design, Interior Design, Arsitektur Design, Web Designer, Programming Web, Akuntansi, Video Editor, dll</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                </div>
            </div>
            </div>
            <div class="tab-pane" id="tab-2">
            <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Konsultasi</h3>
                <p class="fst-italic">Kursus & Pelatihan Komputer IT Multimedia dengan biaya terjangkau serta bersaing meliputi bidang studi Digital Marketing, Animasi, Photography, Graphic Design, Interior Design, Arsitektur Design, Web Designer, Programming Web, Akuntansi, Video Editor, dll</p>
                <p>Kursus & Pelatihan Komputer IT Multimedia dengan biaya terjangkau serta bersaing meliputi bidang studi Digital Marketing, Animasi, Photography, Graphic Design, Interior Design, Arsitektur Design, Web Designer, Programming Web, Akuntansi, Video Editor, dll</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                </div>
            </div>
            </div>
            <div class="tab-pane" id="tab-3">
            <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Lifetime Access</h3>
                <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                </div>
            </div>
            </div>
            <div class="tab-pane" id="tab-4">
            <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                </div>
            </div>
            </div>
            <div class="tab-pane" id="tab-5">
            <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
</section><!-- End Cource Details Tabs Section -->
@include('frontend.footer')