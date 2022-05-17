@include('frontend.header')
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
                    <p class="fst-italic text-center">{{ $event->tgl_event }} at {{ $event->jam_event }}</p>
                    <p class="card-text">{{ $event->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
</section><!-- End Events Section -->
    @include('frontend.footer')