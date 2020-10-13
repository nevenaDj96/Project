
<footer id="gtco-footer" role="contentinfo">
    <div class="gtco-container">
        <div class="row copyright">
            <div class="col-md-12">
                <p class="pull-left">
                    <strong>Nevena Djakovic</strong> <br>
                    <strong>Contact: gally@gally.com</strong>
                    <small class="block">&copy; 2018 Gally. All Rights Reserved.</small>
                </p>

                <p class="pull-right">
                <ul class="gtco-social-icons pull-right">
                    @foreach($data['network'] as $network)
                    <li><a target="_blank" href="{{$network['url']}}"><i class="icon-{{$network['name']}}"></i></a></li>
                    @endforeach
                </ul>
                </p>
            </div>
        </div>
    </div>
</footer>
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>