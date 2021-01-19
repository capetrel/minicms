<footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><p class="m-0 text-center text-white">Copyright &copy; 2020</p></div>
            <div class="col-sm-6">@include('blocks.bottomnav')</div>
        </div>
    </div>
</footer>
@stack('scripts')
<script src="{{ asset('/js/master.min.js') }}"></script>
