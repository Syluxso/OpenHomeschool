@if(!empty($style))
    @if($style == 'simple')
        <div class="widget">
            <div class="widget--number">
                <h3>{{ $primary }}</h3>
                <h6>{{ $label }}</h6>
            </div>
        </div>
    @endif
@else
<div class="row">
    <div class="col-sm-12 col-md-4 offset-md-4">
        <div class="widget">
            <div class="widget--number">
                <h3>{{ $primary }}</h3>
                <h6>{{ $label }}</h6>
            </div>
        </div>
    </div>
</div>
@endif
