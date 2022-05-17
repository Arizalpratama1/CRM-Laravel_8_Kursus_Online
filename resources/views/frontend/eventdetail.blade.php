@include('frontend.header')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
    <h2>Event Details</h2>
    <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
    </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

    <div class="row">
        <div class="col-lg-8">
        <img src="{{ asset('uploads/event/' . $event->foto_event ) }}" style="width: 800px; height: 415px;" class="img-fluid" alt="">
        <h3>{{ $event->nama_event }}</h3>
        <p>
            {{ $event->deskripsi}}
        </p>
        </div>
        <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Lokasi Event</h5>
            <p><a href="#">{{ $event->lokasi }}</a></p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Jadwal Event</h5>
            <p>{{ tanggal($event->tgl_event) }}</p>
        </div>
        
        <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Jam Event</h5>
            <p>{{ $event->jam_event }}</p>
        </div>
        
        <div class="d-flex align-items-center">
            <a href="{{ $event->link_event }}" target="_blank" class="get-started-btn"><i class='bx bx-run'></i>&ensp; Daftar</a>
        </div>

        </div>
    </div>

    </div>
</section><!-- End Cource Details Section -->
@include('frontend.footer')