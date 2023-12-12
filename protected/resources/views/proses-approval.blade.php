<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>


.timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    /*.timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    } */  /*buat garis */
}

.timeline-steps .timeline-content {
    width: 10rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #f5f6f7
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
}

.circle {
    background: #1B1742;
    border-radius: 50%;
    color: black;
    display: inline-block;
    height: 130px;
    line-height: 4em;
    font-weight: bold;
    font-size: 1.2em;
    width: 130px;
    margin: 0 auto;
}

.circle span {
    display: table-cell;
    vertical-align: middle;
    height: 145px;
    width: 150px;
    text-align: center;
    padding: 0 15px;
}

</style>

<div class="container">                      
   
    <?php $mo = App\Models\HistoriApproval::histori($token_applicant, 27)?>
    <?php $return_sales = App\Models\HistoriApproval::return_sales($token_applicant) ?>

    <div class="row">
        <div class="col">
            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                
                <div class="timeline-step">
                    <div>
                        <span class="circle"><span><i class="fa fa-upload fa-5x" style="color:white" aria-hidden="true"></i></span></span>    
                    </div>
                   
                    <?php $user_satu = \App\Models\User::username($data['data']->user_id); ?>
                    <p class="h6 mt-3 mb-1">{{ $user_satu->name ?? '' }}</p>
                    <p class="h6 text-muted mb-0 mb-lg-0">{{ ($user_satu->privilege_user_id == 1) ? 'Merchant' : 'Sales Officer' }}</p>
                    <p class="h6 mt-3 mb-1">{{ date('d-m-Y', strtotime($data['data']->created_at)) }}</p>
                </div>

                @if(isset($return_sales))
                    <div class="timeline-step">
                        <div>
                            <span class="circle"><span><i class="fa fa-reply fa-5x" style="color:white" aria-hidden="true"></i></span></span>    
                        </div>
                
                        <p class="h6 mt-3 mb-1">{{ \App\Models\User::username($return_sales->user_id)->name ?? '' }}</p>
                        <p class="h6 text-muted mb-0 mb-lg-0">Return Sales Officer</p>
                        <p class="h6 mt-3 mb-1">{{ date('d-m-Y', strtotime($return_sales->waktu ?? '')) }}</p>
                    </div>
                @endif

                @if(isset($mo))
                    <div class="timeline-step">
                        <div>
                            <span class="circle"><span><i class="fa fa-tasks fa-5x" style="color:white" aria-hidden="true"></i></span></span>    
                        </div>

                        <p class="h6 mt-3 mb-1">{{ \App\Models\User::username($mo->user_id)->name ?? '' }}</p>
                        <p class="h6 text-muted mb-0 mb-lg-0">Merchant Operation</p>
                        <p class="h6 mt-3 mb-1">{{ date('d-m-Y', strtotime($mo->waktu)) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div style="height:30px"></div>