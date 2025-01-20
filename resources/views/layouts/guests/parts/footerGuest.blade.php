<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('imgs/logo_horizon_text2.png') }}" style="width: 170px; height: 55px; object-fit: contain;"></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">{{__('messages.homepage')}}</a></li>
                        <li><a href="#">{{__('messages.aboutus')}}</a></li>
                        <li><a href="#">{{__('messages.support')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://github.com/Jack3dApe/Horizon">Horizon 2025</a></p>
            </div>
        </div>
    </div>
</footer>
