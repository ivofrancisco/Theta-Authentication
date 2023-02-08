@if (session()->has('message_success'))
    <!-- Begin: Alert Success -->
    <div class="alert alert-success" role="alert" style="background-color: #def4e8; border-color: #e6f8ee;">
        <h6 style="color: #257b50; font-weight: 400">{{ session()->get('message_success') }}</h6>
    </div>
    <!-- End: Alert Success -->
@endif