<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                            {{ $title }}
                        </p>
                        <h5 class="font-weight-bolder">
                            {{ $count }}
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div {{ $attributes->merge(['class' => 'icon icon-shape bg-gradient-primary shadow-primary
                        text-center rounded-circle']) }}>
                        <i class="ni {{ $icon }} text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
