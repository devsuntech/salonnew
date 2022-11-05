<style type="text/css">
    .disabled{
        display: none!important;
    }
</style>
<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if (isset($paginator) && $paginator->lastPage() > 1)
<div class="f-pagination mb-30 mb-xl-0">
    <?php
        $interval = isset($interval) ? abs(intval($interval)) : 3 ;
        $from = $paginator->currentPage() - $interval;
        if($from < 1){
            $from = 1;
        }

        $to = $paginator->currentPage() + $interval;
        if($to > $paginator->lastPage()){
            $to = $paginator->lastPage();
        }
    ?>
    @if($paginator->currentPage() > 1)
    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}"><i class="fal fa-long-arrow-left"></i></a>
    @endif
    @for($i = $from; $i <= $to; $i++)
        <?php
            $isCurrentPage = $paginator->currentPage() == $i;
        ?>
    <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}" class="{{ $isCurrentPage ? 'active' : '' }}">{{ $i }}</a>
    @endfor
    {{-- <a href="small-grid.html">...</a> --}}
    @if($paginator->currentPage() < $paginator->lastPage())
    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}"><i class="fal fa-long-arrow-right"></i></a>
    @endif
</div>
@endif
