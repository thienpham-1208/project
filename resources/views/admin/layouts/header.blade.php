<div class="header">
    <div class="row">
        <div class="col-md-3 col-lg-3 page-name">
            @yield('pageName')
        </div>
        <div class="col-md-9 col-lg-9 date-now">
            <img src="{{ asset('images/icons/calendar.jpg') }}" alt="">
            <span class="date"></span>
            <img src="{{ asset('images/icons/clock.jpg') }}" alt="">
            <span class="time"></span>
        </div>
    </div>
</div>
